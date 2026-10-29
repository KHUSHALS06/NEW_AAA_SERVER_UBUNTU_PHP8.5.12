<?php

$DB_HOST = 'localhost';
$DB_NAME = 'hotspot';
$DB_USER = 'hotspot';
$DB_PASS = 'hotspot@00WF';

$API_USER    = 'api';
$API_PASS    = 'wfapi@2007';
$API_PORT    = 8728;
$API_TIMEOUT = 8;

$LOG_FILE   = '/var/log/suspend_check.log';
$STATE_FILE = '/root/suspend_state.json';
$LOCK_FILE  = '/tmp/suspend_check.lock';
$DROP_TAG   = 'SUSPEND-DROP';
$LOGIN_TAG  = 'SUSPEND-LOGIN';
$WG_MARK    = '[SUSPENDED-BY-SCRIPT]';
$SERVER_IPS_EXTRA = array();

date_default_timezone_set('Asia/Kolkata');

function logmsg($msg)
{
    global $LOG_FILE;
    @file_put_contents($LOG_FILE, date('Y-m-d H:i:s') . ' ' . $msg . "\n", FILE_APPEND);
}

function load_state($file)
{
    $d = @json_decode(@file_get_contents($file), true);
    return is_array($d) ? array_map('intval', $d) : array();
}

function save_state($file, $ids)
{
    @file_put_contents($file, json_encode(array_values(array_unique($ids))), LOCK_EX);
}

class RouterOsApi
{
    private $sock = null;

    public function connect($host, $port, $user, $pass, $timeout)
    {
        $errno = 0;
        $errstr = '';
        $this->sock = @fsockopen($host, $port, $errno, $errstr, $timeout);
        if (!$this->sock) {
            throw new Exception("cannot connect to $host:$port ($errstr)");
        }
        stream_set_timeout($this->sock, $timeout);

        $r = $this->talk('/login', array('name' => $user, 'password' => $pass));

        if (isset($r[0]['ret'])) {
            $challenge = pack('H*', $r[0]['ret']);
            $response  = '00' . md5(chr(0) . $pass . $challenge);
            $this->talk('/login', array('name' => $user, 'response' => $response));
        }
    }

    public function close()
    {
        if ($this->sock) {
            @fclose($this->sock);
            $this->sock = null;
        }
    }

    public function talk($command, $attrs = array(), $queries = array())
    {
        $this->writeWord($command);
        foreach ($attrs as $k => $v) {
            $this->writeWord('=' . $k . '=' . $v);
        }
        foreach ($queries as $k => $v) {
            $this->writeWord('?' . $k . '=' . $v);
        }
        $this->writeWord('');

        $rows  = array();
        $error = null;
        while (true) {
            $s    = $this->readSentence();
            $type = $s['type'];
            if ($type == '!re') {
                $rows[] = $s['attrs'];
            } elseif ($type == '!trap') {
                $error = isset($s['attrs']['message']) ? $s['attrs']['message'] : 'unknown API error';
            } elseif ($type == '!fatal') {
                throw new Exception('router closed the connection');
            } elseif ($type == '!done') {
                if (count($s['attrs']) > 0) {
                    $rows[] = $s['attrs'];
                }
                break;
            }
        }
        if ($error !== null) {
            throw new Exception($error);
        }
        return $rows;
    }

    private function readSentence()
    {
        $type  = null;
        $attrs = array();
        while (true) {
            $w = $this->readWord();
            if ($w === '') {
                if ($type !== null) {
                    break;
                }
                continue;
            }
            if ($type === null) {
                $type = $w;
            } elseif ($w[0] == '=') {
                $pos = strpos($w, '=', 1);
                if ($pos === false) {
                    $attrs[substr($w, 1)] = '';
                } else {
                    $attrs[substr($w, 1, $pos - 1)] = substr($w, $pos + 1);
                }
            }
        }
        return array('type' => $type, 'attrs' => $attrs);
    }

    private function readWord()
    {
        $len = $this->readLen();
        if ($len == 0) {
            return '';
        }
        return $this->readBytes($len);
    }

    private function readLen()
    {
        $c = ord($this->readBytes(1));
        if ($c < 0x80) {
            return $c;
        }
        if (($c & 0xC0) == 0x80) {
            return (($c & 0x3F) << 8) + ord($this->readBytes(1));
        }
        if (($c & 0xE0) == 0xC0) {
            $b = $this->readBytes(2);
            return (($c & 0x1F) << 16) + (ord($b[0]) << 8) + ord($b[1]);
        }
        if (($c & 0xF0) == 0xE0) {
            $b = $this->readBytes(3);
            return (($c & 0x0F) << 24) + (ord($b[0]) << 16) + (ord($b[1]) << 8) + ord($b[2]);
        }
        $b = $this->readBytes(4);
        return (ord($b[0]) << 24) + (ord($b[1]) << 16) + (ord($b[2]) << 8) + ord($b[3]);
    }

    private function readBytes($n)
    {
        $data = '';
        while (strlen($data) < $n) {
            $chunk = fread($this->sock, $n - strlen($data));
            if ($chunk === false || $chunk === '') {
                $meta = stream_get_meta_data($this->sock);
                throw new Exception($meta['timed_out'] ? 'router read timed out' : 'connection lost');
            }
            $data .= $chunk;
        }
        return $data;
    }

    private function writeWord($w)
    {
        $len = strlen($w);
        if ($len < 0x80) {
            $enc = chr($len);
        } elseif ($len < 0x4000) {
            $l   = $len | 0x8000;
            $enc = chr(($l >> 8) & 0xFF) . chr($l & 0xFF);
        } elseif ($len < 0x200000) {
            $l   = $len | 0xC00000;
            $enc = chr(($l >> 16) & 0xFF) . chr(($l >> 8) & 0xFF) . chr($l & 0xFF);
        } else {
            throw new Exception('word too long');
        }
        fwrite($this->sock, $enc . $w);
    }
}

function fw_find($api, $tag, $path = '/ip/firewall/filter')
{
    return $api->talk($path . '/print', array(), array('comment' => $tag));
}

function fw_ensure($api, $tag, $chain, $extra)
{
    $rows = fw_find($api, $tag);
    if (count($rows) > 0) {
        return $rows[0]['.id'];
    }
    $attrs = array_merge(
        array('chain' => $chain, 'action' => 'drop', 'comment' => $tag, 'disabled' => 'yes'),
        $extra
    );

    $all = $api->talk('/ip/firewall/filter/print');
    foreach ($all as $row) {
        if (!isset($row['dynamic']) || $row['dynamic'] != 'true') {
            $attrs['place-before'] = $row['.id'];
            break;
        }
    }
    $res = $api->talk('/ip/firewall/filter/add', $attrs);
    return $res[0]['ret'];
}

function fw_set($api, $id, $disabled, $path = '/ip/firewall/filter')
{
    $api->talk($path . '/set', array('.id' => $id, 'disabled' => $disabled ? 'yes' : 'no'));
}

function is_paused($api, $dropTag)
{
    foreach (fw_find($api, $dropTag) as $row) {
        if (isset($row['disabled']) && $row['disabled'] == 'false') {
            return true;
        }
    }
    return false;
}

function server_ips($extra)
{
    $ips = array();
    $out = @shell_exec('PATH=/sbin:/usr/sbin:/bin:/usr/bin ip -4 -o addr show 2>/dev/null');
    if ($out && preg_match_all('/inet\s+(\d+\.\d+\.\d+\.\d+)/', $out, $m)) {
        foreach ($m[1] as $ip) {
            if (strpos($ip, '127.') !== 0) {
                $ips[] = $ip;
            }
        }
    }
    foreach ($extra as $ip) {
        $ips[] = $ip;
    }
    return array_values(array_unique($ips));
}

function ip_matches($ip, $target)
{
    $ipl = ip2long($ip);
    if ($ipl === false) {
        return false;
    }
    $target = trim($target);
    if (strpos($target, '/') === false) {
        return $target === $ip;
    }
    $parts = explode('/', $target, 2);
    $netl  = ip2long($parts[0]);
    $bits  = (int)$parts[1];
    if ($netl === false || $bits < 16 || $bits > 32) {
        return false;
    }
    $mask = (0xFFFFFFFF << (32 - $bits)) & 0xFFFFFFFF;
    return (($ipl & $mask) == ($netl & $mask));
}

function wg_menus()
{
    return array('/ip/hotspot/walled-garden', '/ip/hotspot/walled-garden/ip');
}

function wg_disable_for_ips($api, $ips, $mark)
{
    $matched = 0;
    $changed = 0;
    foreach (wg_menus() as $path) {
        foreach ($api->talk($path . '/print') as $row) {
            if (isset($row['dynamic']) && $row['dynamic'] == 'true') {
                continue;
            }
            if (isset($row['action']) && in_array($row['action'], array('deny', 'drop', 'reject'))) {
                continue;
            }
            $hit = false;
            foreach (array('dst-address', 'dst-host') as $f) {
                if (!isset($row[$f]) || $row[$f] == '') {
                    continue;
                }
                foreach ($ips as $ip) {
                    if (ip_matches($ip, $row[$f])) {
                        $hit = true;
                    }
                }
            }
            if (!$hit) {
                continue;
            }
            $matched++;
            if (isset($row['disabled']) && $row['disabled'] == 'true') {
                continue;
            }
            $comment = isset($row['comment']) ? $row['comment'] : '';
            $api->talk($path . '/set', array(
                '.id'      => $row['.id'],
                'disabled' => 'yes',
                'comment'  => ($comment != '' ? $comment . ' ' : '') . $mark
            ));
            $changed++;
        }
    }
    return array($matched, $changed);
}

function wg_enable_marked($api, $mark)
{
    $n   = 0;
    $len = strlen($mark);
    foreach (wg_menus() as $path) {
        foreach ($api->talk($path . '/print') as $row) {
            $c = isset($row['comment']) ? $row['comment'] : '';
            if ($c === '' || substr($c, -$len) !== $mark) {
                continue;
            }
            $orig = rtrim(substr($c, 0, strlen($c) - $len));
            $api->talk($path . '/set', array('.id' => $row['.id'], 'disabled' => 'no', 'comment' => $orig));
            $n++;
        }
    }
    return $n;
}

function fw_remove_tagged($api, $tag, $path)
{
    foreach (fw_find($api, $tag, $path) as $row) {
        $api->talk($path . '/remove', array('.id' => $row['.id']));
    }
}

function do_pause($api, $dropTag, $oldLoginTag, $ips, $mark, $label)
{

    fw_remove_tagged($api, $oldLoginTag, '/ip/firewall/filter');
    try {
        fw_remove_tagged($api, $oldLoginTag, '/ip/firewall/raw');
    } catch (Exception $e) {

    }

    $r = wg_disable_for_ips($api, $ips, $mark);
    if ($r[0] == 0) {
        logmsg("$label no walled-garden entry matches server IPs (" . implode(',', $ips) . "), login page NOT blocked");
    } elseif ($r[1] > 0) {
        logmsg("$label disabled " . $r[1] . " walled-garden entr" . ($r[1] == 1 ? 'y' : 'ies'));
    }

    $dropId = fw_ensure($api, $dropTag, 'forward', array());
    fw_set($api, $dropId, false);
    return is_paused($api, $dropTag);
}

function do_restore($api, $dropTag, $mark)
{
    foreach (fw_find($api, $dropTag) as $row) {
        fw_set($api, $row['.id'], true);
    }
    wg_enable_marked($api, $mark);
    return !is_paused($api, $dropTag);
}

$mode = isset($argv[1]) ? $argv[1] : '';
if ($mode != 'pause' && $mode != 'restore') {
    echo "Usage: php suspend_check.php pause|restore\n";
    exit(1);
}

$lock = fopen($LOCK_FILE, 'c');
if (!$lock) {
    logmsg('cannot open lock file');
    exit(1);
}
if ($mode == 'restore') {
    if (!flock($lock, LOCK_EX | LOCK_NB)) {
        exit(0);
    }
} else {
    flock($lock, LOCK_EX);
}

$oldState = load_state($STATE_FILE);

if ($mode == 'restore') {
    if (count($oldState) == 0) {
        exit(0);
    }

    $db = @new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($db->connect_errno) {
        logmsg('DB connection failed: ' . $db->connect_error);
        exit(1);
    }
    $idlist = implode(',', array_map('intval', $oldState));
    $res = $db->query(
        'SELECT l.id, l.location_name, n.nasname '
      . 'FROM locations l JOIN nas n ON n.location_id = l.id '
      . "WHERE l.id IN ($idlist) AND l.status = 1 AND l.valid_till >= NOW()"
    );
    if (!$res) {
        logmsg('Query failed: ' . $db->error);
        exit(1);
    }
    $rows = array();
    while ($r = $res->fetch_assoc()) {
        $rows[] = $r;
    }
    $res->free();
    $db->close();

    $failed   = array();
    $touched  = array();
    $quietLog = ((int)date('i') % 15 != 0);

    foreach ($rows as $r) {
        $id   = (int)$r['id'];
        $name = $r['location_name'];
        $ip   = $r['nasname'];
        $touched[$id] = true;

        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            $failed[$id] = true;
            continue;
        }
        $api = new RouterOsApi();
        try {
            $api->connect($ip, $API_PORT, $API_USER, $API_PASS, $API_TIMEOUT);
            $ok = do_restore($api, $DROP_TAG, $WG_MARK);
            logmsg("id=$id ($name) $ip RESTORE " . ($ok ? 'OK' : 'FAILED'));
            if (!$ok) {
                $failed[$id] = true;
            }
        } catch (Exception $e) {
            $failed[$id] = true;
            if (!$quietLog) {
                logmsg("id=$id ($name) $ip ERROR: " . $e->getMessage() . ' (retrying every minute)');
            }
        }
        $api->close();
    }

    $newState = array();
    foreach ($oldState as $id) {
        if (!isset($touched[$id]) || isset($failed[$id])) {
            $newState[] = $id;
        }
    }
    if ($newState != $oldState) {
        save_state($STATE_FILE, $newState);
    }
    exit(0);
}

$db = @new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($db->connect_errno) {
    logmsg('DB connection failed: ' . $db->connect_error);
    exit(1);
}
$res = $db->query(
    'SELECT l.id, l.location_name, n.nasname, (l.valid_till < NOW()) AS expired '
  . 'FROM locations l JOIN nas n ON n.location_id = l.id '
  . 'WHERE l.status = 1'
);
if (!$res) {
    logmsg('Query failed: ' . $db->error);
    exit(1);
}
$rows = array();
while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
}
$res->free();
$db->close();

$newState   = array();
$serverIps = server_ips($SERVER_IPS_EXTRA);

foreach ($rows as $r) {
    $id      = (int)$r['id'];
    $name    = $r['location_name'];
    $ip      = $r['nasname'];
    $expired = (int)$r['expired'];
    $isPaused = null;

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        logmsg("id=$id ($name) invalid nasname '$ip', skipped");
        continue;
    }

    $api = new RouterOsApi();
    try {
        $api->connect($ip, $API_PORT, $API_USER, $API_PASS, $API_TIMEOUT);
        $isPaused = is_paused($api, $DROP_TAG);

        if ($expired) {
            $was      = $isPaused;
            $isPaused = do_pause($api, $DROP_TAG, $LOGIN_TAG, $serverIps, $WG_MARK, "id=$id ($name) $ip");
            if (!$was || !$isPaused) {
                logmsg("id=$id ($name) $ip PAUSE " . ($isPaused ? 'OK' : 'FAILED'));
            }
        } elseif (!$expired && $isPaused) {
            $isPaused = !do_restore($api, $DROP_TAG, $WG_MARK);
            logmsg("id=$id ($name) $ip RESTORE " . ($isPaused ? 'FAILED' : 'OK'));
        }
    } catch (Exception $e) {
        logmsg("id=$id ($name) $ip ERROR: " . $e->getMessage());
    }
    $api->close();

    if ($isPaused === true || ($isPaused === null && in_array($id, $oldState))) {
        $newState[] = $id;
    }
}

save_state($STATE_FILE, $newState);
