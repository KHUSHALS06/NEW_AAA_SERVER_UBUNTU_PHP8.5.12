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

function do_restore($api, $dropTag, $mark)
{
    foreach (fw_find($api, $dropTag) as $row) {
        fw_set($api, $row['.id'], true);
    }
    wg_enable_marked($api, $mark);
    return !is_paused($api, $dropTag);
}

function wg_enable_for_ips($api, $ips, $mark)
{
    $n   = 0;
    $len = strlen($mark);
    foreach (wg_menus() as $path) {
        foreach ($api->talk($path . '/print') as $row) {
            if (isset($row['dynamic']) && $row['dynamic'] == 'true') {
                continue;
            }
            if (isset($row['action']) && in_array($row['action'], array('deny', 'drop', 'reject'))) {
                continue;
            }
            if (!isset($row['disabled']) || $row['disabled'] != 'true') {
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
            $c = isset($row['comment']) ? $row['comment'] : '';
            if ($c !== '' && substr($c, -$len) === $mark) {
                $c = rtrim(substr($c, 0, strlen($c) - $len));
            }
            $api->talk($path . '/set', array('.id' => $row['.id'], 'disabled' => 'no', 'comment' => $c));
            $n++;
        }
    }
    return $n;
}

$all = false;
$ids = array();
for ($i = 1; $i < count($argv); $i++) {
    if ($argv[$i] == 'all') {
        $all = true;
    } elseif (ctype_digit($argv[$i])) {
        $ids[] = (int)$argv[$i];
    }
}
if (!$all && count($ids) == 0) {
    echo "Usage: php force_restore.php <location_id> [<location_id> ...]\n";
    echo "       php force_restore.php all\n";
    exit(1);
}

$lock = fopen($LOCK_FILE, 'c');
if (!$lock) {
    echo "cannot open lock file\n";
    exit(1);
}
flock($lock, LOCK_EX);

$db = @new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($db->connect_errno) {
    echo 'DB connection failed: ' . $db->connect_error . "\n";
    exit(1);
}
$sql = 'SELECT l.id, l.location_name, n.nasname FROM locations l JOIN nas n ON n.location_id = l.id';
if (!$all) {
    $sql .= ' WHERE l.id IN (' . implode(',', $ids) . ')';
}
$res = $db->query($sql);
if (!$res) {
    echo 'Query failed: ' . $db->error . "\n";
    exit(1);
}
$rows = array();
while ($r = $res->fetch_assoc()) {
    $rows[] = $r;
}
$res->free();
$db->close();

if (count($rows) == 0) {
    echo "No matching location / nas row found\n";
    exit(1);
}

$serverIps = server_ips($SERVER_IPS_EXTRA);
$state     = load_state($STATE_FILE);
$restored  = array();
$failed    = array();

foreach ($rows as $r) {
    $id   = (int)$r['id'];
    $name = $r['location_name'];
    $ip   = $r['nasname'];

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        echo "id=$id ($name) invalid nasname '$ip', skipped\n";
        $failed[$id] = true;
        continue;
    }

    $api = new RouterOsApi();
    try {
        $api->connect($ip, $API_PORT, $API_USER, $API_PASS, $API_TIMEOUT);
        $ok = do_restore($api, $DROP_TAG, $WG_MARK);
        $n  = wg_enable_for_ips($api, $serverIps, $WG_MARK);
        $msg = "id=$id ($name) $ip FORCE RESTORE " . ($ok ? 'OK' : 'FAILED') . ", extra walled-garden entries enabled: $n";
        echo $msg . "\n";
        logmsg($msg);
        if ($ok) {
            $restored[$id] = true;
        } else {
            $failed[$id] = true;
        }
    } catch (Exception $e) {
        $msg = "id=$id ($name) $ip ERROR: " . $e->getMessage();
        echo $msg . "\n";
        logmsg($msg);
        $failed[$id] = true;
    }
    $api->close();
}

$newState = array();
foreach ($state as $id) {
    if (!isset($restored[$id]) || isset($failed[$id])) {
        $newState[] = $id;
    }
}
save_state($STATE_FILE, $newState);
