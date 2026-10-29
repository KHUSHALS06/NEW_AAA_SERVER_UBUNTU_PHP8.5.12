<?php
declare(strict_types=1);

error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '0');
date_default_timezone_set('Asia/Kolkata');

function readProc(string $path): string
{
    if (!is_readable($path)) {
        return '';
    }
    $data = @file_get_contents($path);
    return $data === false ? '' : $data;
}

function canExec(): bool
{
    if (!function_exists('shell_exec')) {
        return false;
    }
    $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
    return !in_array('shell_exec', $disabled, true);
}

function shellRun(string $cmd): string
{
    if (!canExec()) {
        return '';
    }
    $out = @shell_exec($cmd . ' 2>/dev/null');
    return is_string($out) ? $out : '';
}

function osName(): string
{
    $osRelease = readProc('/etc/os-release');
    if ($osRelease !== '' && preg_match('/^PRETTY_NAME="?([^"\n]+)"?/m', $osRelease, $m)) {
        return trim($m[1]);
    }
    return php_uname('s');
}

function getUptime(): string
{
    $raw = readProc('/proc/uptime');
    if ($raw === '') {
        $raw = shellRun('cat /proc/uptime');
    }
    if ($raw === '') {
        return 'N/A';
    }
    $s = (int) explode(' ', trim($raw))[0];
    $d = intdiv($s, 86400);
    $h = intdiv($s % 86400, 3600);
    $m = intdiv($s % 3600, 60);
    return "{$d}d {$h}h {$m}m";
}

function diskStat(string $path = '/'): array
{
    $t = (float) (@disk_total_space($path) ?: 0);
    $f = (float) (@disk_free_space($path) ?: 0);
    $u = $t - $f;
    $gb = 1024 ** 3;
    return [
        'total' => round($t / $gb, 2),
        'used'  => round($u / $gb, 2),
        'free'  => round($f / $gb, 2),
        'pct'   => $t > 0 ? round(($u / $t) * 100, 2) : 0,
    ];
}

function ramStat(): array
{
    $empty = ['total' => 0, 'used' => 0, 'free' => 0, 'pct' => 0];
    $kb = 1024 * 1024;

    $raw = readProc('/proc/meminfo');
    if ($raw !== '') {
        $m = [];
        foreach (explode("\n", $raw) as $line) {
            if (preg_match('/^(\w+):\s+(\d+)/', $line, $x)) {
                $m[$x[1]] = (int) $x[2];
            }
        }
        $total = $m['MemTotal'] ?? 0;
        if ($total > 0) {
            $available = $m['MemAvailable'] ?? (($m['MemFree'] ?? 0) + ($m['Buffers'] ?? 0) + ($m['Cached'] ?? 0));
            $used = max(0, $total - $available);
            return [
                'total' => round($total / $kb, 2),
                'used'  => round($used / $kb, 2),
                'free'  => round($available / $kb, 2),
                'pct'   => round(($used / $total) * 100, 2),
            ];
        }
    }

    $free = shellRun('free -k');
    if ($free !== '' && preg_match('/^Mem:\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/m', $free, $x)) {
        $total = (int) $x[1];
        $available = (int) $x[6];
        if ($total > 0) {
            $used = max(0, $total - $available);
            return [
                'total' => round($total / $kb, 2),
                'used'  => round($used / $kb, 2),
                'free'  => round($available / $kb, 2),
                'pct'   => round(($used / $total) * 100, 2),
            ];
        }
    }

    return $empty;
}

function getLoadAvg(): array
{
    if (function_exists('sys_getloadavg')) {
        $l = sys_getloadavg();
        if (is_array($l) && count($l) === 3) {
            return array_map(fn($v) => number_format((float) $v, 2, '.', ''), $l);
        }
    }
    $raw = readProc('/proc/loadavg');
    if ($raw !== '') {
        return array_slice(explode(' ', trim($raw)), 0, 3);
    }
    return ['N/A', 'N/A', 'N/A'];
}

function getCpuInfo(): array
{
    $raw = readProc('/proc/cpuinfo');
    if ($raw === '') {
        $raw = shellRun('cat /proc/cpuinfo');
    }
    if ($raw === '') {
        $n = (int) trim(shellRun('nproc'));
        return ['count' => max(1, $n), 'model' => 'Unknown'];
    }
    $count = preg_match_all('/^processor\s*:/m', $raw);
    $model = 'Unknown';
    if (preg_match('/^model name\s*:\s*(.+)$/m', $raw, $m)) {
        $model = trim($m[1]);
    } elseif (preg_match('/^(?:Hardware|Model)\s*:\s*(.+)$/m', $raw, $m)) {
        $model = trim($m[1]);
    }
    return ['count' => max(1, (int) $count), 'model' => $model];
}

function cpuTimes(): ?array
{
    $raw = readProc('/proc/stat');
    if (!preg_match('/^cpu\s+(.+)$/m', $raw, $m)) {
        return null;
    }
    $p = array_map('intval', preg_split('/\s+/', trim($m[1])));
    $idle = ($p[3] ?? 0) + ($p[4] ?? 0);
    return ['idle' => $idle, 'total' => array_sum($p)];
}

function cpuUsage(int $cores): float
{
    $a = cpuTimes();
    if ($a !== null) {
        usleep(200000);
        $b = cpuTimes();
        if ($b !== null) {
            $total = $b['total'] - $a['total'];
            $idle = $b['idle'] - $a['idle'];
            if ($total > 0) {
                return round((1 - $idle / $total) * 100, 1);
            }
        }
    }
    if (function_exists('sys_getloadavg')) {
        $l = sys_getloadavg();
        if (is_array($l)) {
            return round(min(100, ($l[0] / max(1, $cores)) * 100), 1);
        }
    }
    return 0.0;
}

if (isset($_GET['diag'])) {
    header('Content-Type: application/json; charset=utf-8');
    $files = ['/proc/meminfo', '/proc/stat', '/proc/loadavg', '/proc/uptime', '/proc/cpuinfo'];
    $readable = [];
    foreach ($files as $f) {
        $readable[$f] = is_readable($f);
    }
    echo json_encode([
        'php'               => PHP_VERSION,
        'sapi'              => PHP_SAPI,
        'user'              => function_exists('posix_getpwuid') ? (posix_getpwuid(posix_geteuid())['name'] ?? '') : get_current_user(),
        'open_basedir'      => (string) ini_get('open_basedir'),
        'disable_functions' => (string) ini_get('disable_functions'),
        'shell_exec'        => canExec(),
        'proc_readable'     => $readable,
    ], JSON_PRETTY_PRINT);
    exit;
}

if (isset($_GET['json'])) {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    $cpuInfo = getCpuInfo();
    echo json_encode([
        'disk'      => diskStat(),
        'ram'       => ramStat(),
        'uptime'    => getUptime(),
        'time'      => date('H:i:s'),
        'load'      => getLoadAvg(),
        'cpu'       => $cpuInfo,
        'cpu_usage' => cpuUsage($cpuInfo['count']),
    ]);
    exit;
}

header('Content-Type: text/html; charset=utf-8');

$hostname = gethostname() ?: php_uname('n');
$serverIp = $_SERVER['SERVER_ADDR'] ?? 'N/A';
$clientIp = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
$kernel   = php_uname('r');
$phpVer   = PHP_VERSION;
$osLabel  = osName();

$d = diskStat();
$r = ramStat();
$load = getLoadAvg();
$cpu = getCpuInfo();
$cpuUsage = cpuUsage($cpu['count']);

function level(float $pct): string
{
    return $pct > 80 ? 'danger' : ($pct > 60 ? 'warning' : '');
}

function label(float $pct, array $names): string
{
    return $pct > 80 ? $names[0] : ($pct > 60 ? $names[1] : $names[2]);
}

$initial = json_encode([
    'disk' => $d['pct'],
    'ram'  => $r['pct'],
    'cpu'  => $cpuUsage,
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Monitor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --mint: #74ebd5;
            --lavender: #acb6e5;
            --ink: #12304a;
            --muted: rgba(18, 48, 74, 0.7);
            --accent: #2bb9a0;
            --accent-2: #6b7fd0;
            --warning: #d97706;
            --danger: #e11d48;
            --glass: rgba(255, 255, 255, 0.28);
            --glass-inner: rgba(255, 255, 255, 0.3);
            --glass-border: rgba(255, 255, 255, 0.6);
            --glass-shadow: 0 8px 32px rgba(70, 90, 160, 0.22);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ink);
            height: 100vh;
            height: 100dvh;
            padding: 12px;
            overflow: hidden;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            background-attachment: fixed;
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(70px);
            z-index: 0;
            pointer-events: none;
        }

        body::before {
            width: 360px;
            height: 360px;
            top: -90px;
            left: -90px;
            background: rgba(255, 255, 255, 0.55);
        }

        body::after {
            width: 420px;
            height: 420px;
            bottom: -120px;
            right: -100px;
            background: rgba(255, 255, 255, 0.4);
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            height: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            grid-template-rows: repeat(2, minmax(0, 1fr));
            gap: 12px;
            flex: 1;
            min-height: 0;
        }

        .monitor-card {
            background: var(--glass);
            -webkit-backdrop-filter: blur(18px) saturate(160%);
            backdrop-filter: blur(18px) saturate(160%);
            border: 1px solid var(--glass-border);
            border-radius: 18px;
            padding: 14px;
            box-shadow: var(--glass-shadow), inset 0 1px 0 rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            min-height: 0;
            min-width: 0;
            overflow: hidden;
        }

        .monitor-card.server-card {
            grid-column: span 2;
            grid-row: span 2;
        }

        .monitor-card.cpu-card {
            grid-column: span 2;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.55);
            flex: none;
        }

        .card-title {
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--ink);
        }

        .card-title i {
            font-size: 16px;
            color: var(--accent-2);
        }

        .server-info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            grid-auto-rows: minmax(0, 1fr);
            gap: 10px;
            flex: 1;
            min-height: 0;
        }

        .server-info-item {
            background: var(--glass-inner);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 12px;
            padding: 10px 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 0;
        }

        .server-info-label {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 4px;
            display: block;
        }

        .server-info-value {
            font-weight: 600;
            font-size: 13px;
            color: var(--ink);
            word-break: break-all;
        }

        .uptime-display {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 6px 14px;
            text-align: center;
        }

        .uptime-value {
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
        }

        .uptime-label {
            font-size: 11px;
            color: var(--muted);
        }

        .gauge-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            min-height: 0;
            margin: 4px 0;
        }

        .gauge-wrapper {
            position: relative;
            height: 100%;
            max-height: 150px;
            aspect-ratio: 1 / 1;
        }

        .gauge-canvas {
            width: 100%;
            height: 100%;
            display: block;
        }

        .gauge-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 100%;
        }

        .gauge-number {
            font-size: clamp(16px, 3.4vh, 26px);
            font-weight: 700;
            line-height: 1;
            margin-bottom: 3px;
        }

        .gauge-label {
            font-size: 11px;
            color: var(--muted);
        }

        .progress-container {
            flex: none;
            margin-top: 6px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
            font-size: 12px;
            color: var(--muted);
        }

        .progress-info strong {
            color: var(--ink);
        }

        .progress-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 8px;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            box-shadow: 0 0 8px rgba(107, 127, 208, 0.45);
            transition: width 1s ease;
        }

        .ram-info-grid {
            flex: none;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
            margin-top: 6px;
        }

        .ram-info-item {
            background: var(--glass-inner);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 10px;
            padding: 6px;
            text-align: center;
        }

        .ram-info-value {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 1px;
        }

        .ram-info-label {
            font-size: 11px;
            color: var(--muted);
        }

        .cpu-body {
            display: flex;
            gap: 14px;
            flex: 1;
            min-height: 0;
        }

        .cpu-body .gauge-container {
            flex: 1;
            margin: 0;
        }

        .cpu-side {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            min-width: 0;
        }

        .cpu-model {
            font-size: 12px;
            color: var(--muted);
            padding: 8px;
            background: var(--glass-inner);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 10px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .load-avg {
            display: flex;
            gap: 8px;
        }

        .load-item {
            text-align: center;
            flex: 1;
            background: var(--glass-inner);
            border: 1px solid rgba(255, 255, 255, 0.55);
            border-radius: 10px;
            padding: 8px 4px;
        }

        .load-value {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 1px;
        }

        .load-label {
            font-size: 11px;
            color: var(--muted);
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.7);
            padding: 3px 10px;
            border-radius: 999px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 8px var(--accent);
        }

        .status-dot.warning {
            background: var(--warning);
            box-shadow: 0 0 8px var(--warning);
        }

        .status-dot.danger {
            background: var(--danger);
            box-shadow: 0 0 8px var(--danger);
        }

        .footer {
            flex: none;
            text-align: center;
            padding-top: 8px;
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 900px), (max-height: 560px) {
            body {
                height: auto;
                min-height: 100vh;
                overflow-y: auto;
            }

            .container {
                height: auto;
            }

            .dashboard-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                grid-template-rows: none;
                grid-auto-rows: auto;
            }

            .monitor-card.server-card,
            .monitor-card.cpu-card {
                grid-column: span 2;
                grid-row: auto;
            }

            .gauge-container {
                min-height: 150px;
            }

            .server-info-grid {
                grid-auto-rows: auto;
            }
        }

        @media (max-width: 600px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .monitor-card.server-card,
            .monitor-card.cpu-card,
            .monitor-card.disk-card,
            .monitor-card.ram-card {
                grid-column: span 1;
            }

            .server-info-grid {
                grid-template-columns: 1fr;
            }

            .cpu-body {
                flex-direction: column;
            }
        }

        @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
            .monitor-card {
                background: rgba(255, 255, 255, 0.6);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .progress-fill {
                transition: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard-grid">
            <div class="monitor-card server-card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-server"></i> Server information
                    </div>
                    <div class="uptime-display">
                        <div class="uptime-value" id="uptime-display"><?= htmlspecialchars(getUptime()) ?></div>
                        <div class="uptime-label">Uptime</div>
                    </div>
                </div>

                <div class="server-info-grid">
                    <div class="server-info-item">
                        <span class="server-info-label">Hostname</span>
                        <span class="server-info-value"><?= htmlspecialchars($hostname) ?></span>
                    </div>
                    <div class="server-info-item">
                        <span class="server-info-label">Server IP</span>
                        <span class="server-info-value"><?= htmlspecialchars($serverIp) ?></span>
                    </div>
                    <div class="server-info-item">
                        <span class="server-info-label">Client IP</span>
                        <span class="server-info-value"><?= htmlspecialchars($clientIp) ?></span>
                    </div>
                    <div class="server-info-item">
                        <span class="server-info-label">Operating system</span>
                        <span class="server-info-value"><?= htmlspecialchars(mb_substr($osLabel, 0, 40)) ?></span>
                    </div>
                    <div class="server-info-item">
                        <span class="server-info-label">Kernel</span>
                        <span class="server-info-value"><?= htmlspecialchars($kernel) ?></span>
                    </div>
                    <div class="server-info-item">
                        <span class="server-info-label">PHP version</span>
                        <span class="server-info-value"><?= htmlspecialchars($phpVer) ?></span>
                    </div>
                </div>
            </div>

            <div class="monitor-card disk-card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-hdd"></i> Disk
                    </div>
                    <div class="status-indicator">
                        <div class="status-dot <?= level($d['pct']) ?>" id="disk-dot"></div>
                        <span id="disk-status"><?= label($d['pct'], ['Critical', 'Moderate', 'Healthy']) ?></span>
                    </div>
                </div>

                <div class="gauge-container">
                    <div class="gauge-wrapper">
                        <canvas id="diskGauge" class="gauge-canvas"></canvas>
                        <div class="gauge-value">
                            <div class="gauge-number" id="disk-percent"><?= $d['pct'] ?>%</div>
                            <div class="gauge-label">Used</div>
                        </div>
                    </div>
                </div>

                <div class="progress-container">
                    <div class="progress-info">
                        <span>Total: <strong id="disk-total"><?= $d['total'] ?>G</strong></span>
                        <span>Free: <strong id="disk-free"><?= $d['free'] ?>G</strong></span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="disk-progress" style="width: <?= $d['pct'] ?>%"></div>
                    </div>
                </div>
            </div>

            <div class="monitor-card ram-card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-memory"></i> Memory
                    </div>
                    <div class="status-indicator">
                        <div class="status-dot <?= level($r['pct']) ?>" id="ram-dot"></div>
                        <span id="ram-status"><?= label($r['pct'], ['Critical', 'Moderate', 'Healthy']) ?></span>
                    </div>
                </div>

                <div class="gauge-container">
                    <div class="gauge-wrapper">
                        <canvas id="ramGauge" class="gauge-canvas"></canvas>
                        <div class="gauge-value">
                            <div class="gauge-number" id="ram-percent"><?= $r['pct'] ?>%</div>
                            <div class="gauge-label">Used</div>
                        </div>
                    </div>
                </div>

                <div class="ram-info-grid">
                    <div class="ram-info-item">
                        <div class="ram-info-value" id="ram-total"><?= $r['total'] ?>G</div>
                        <div class="ram-info-label">Total</div>
                    </div>
                    <div class="ram-info-item">
                        <div class="ram-info-value" id="ram-used"><?= $r['used'] ?>G</div>
                        <div class="ram-info-label">Used</div>
                    </div>
                    <div class="ram-info-item">
                        <div class="ram-info-value" id="ram-free"><?= $r['free'] ?>G</div>
                        <div class="ram-info-label">Available</div>
                    </div>
                </div>
            </div>

            <div class="monitor-card cpu-card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-microchip"></i> CPU
                    </div>
                    <div class="status-indicator">
                        <div class="status-dot <?= level($cpuUsage) ?>" id="cpu-dot"></div>
                        <span id="cpu-status"><?= label($cpuUsage, ['High load', 'Moderate', 'Normal']) ?></span>
                    </div>
                </div>

                <div class="cpu-body">
                    <div class="gauge-container">
                        <div class="gauge-wrapper">
                            <canvas id="cpuGauge" class="gauge-canvas"></canvas>
                            <div class="gauge-value">
                                <div class="gauge-number" id="cpu-percent"><?= $cpuUsage ?>%</div>
                                <div class="gauge-label">Usage</div>
                            </div>
                        </div>
                    </div>

                    <div class="cpu-side">
                        <div class="cpu-model" title="<?= htmlspecialchars($cpu['model']) ?>">
                            <?= htmlspecialchars(mb_substr($cpu['model'], 0, 40)) ?> | <?= (int) $cpu['count'] ?> cores
                        </div>

                        <div class="load-avg">
                            <div class="load-item">
                                <div class="load-value" id="load-1"><?= htmlspecialchars((string) $load[0]) ?></div>
                                <div class="load-label">1 min</div>
                            </div>
                            <div class="load-item">
                                <div class="load-value" id="load-5"><?= htmlspecialchars((string) $load[1]) ?></div>
                                <div class="load-label">5 min</div>
                            </div>
                            <div class="load-item">
                                <div class="load-value" id="load-15"><?= htmlspecialchars((string) $load[2]) ?></div>
                                <div class="load-label">15 min</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>System Monitor | Auto-refresh: 3s</p>
        </div>
    </div>

    <script>
        const state = {
            diskGauge: <?= json_encode($d['pct']) ?>,
            ramGauge: <?= json_encode($r['pct']) ?>,
            cpuGauge: <?= json_encode($cpuUsage) ?>
        };

        function setStatus(prefix, pct, names) {
            const dot = document.getElementById(prefix + '-dot');
            const text = document.getElementById(prefix + '-status');
            dot.className = 'status-dot';
            if (pct > 80) {
                dot.classList.add('danger');
                text.textContent = names[0];
            } else if (pct > 60) {
                dot.classList.add('warning');
                text.textContent = names[1];
            } else {
                text.textContent = names[2];
            }
        }

        function drawGauge(canvasId, percentage) {
            const canvas = document.getElementById(canvasId);
            if (!canvas) return;

            state[canvasId] = percentage;

            const size = Math.max(60, Math.round(canvas.clientWidth || 140));
            const dpr = window.devicePixelRatio || 1;
            canvas.width = size * dpr;
            canvas.height = size * dpr;

            const ctx = canvas.getContext('2d');
            ctx.scale(dpr, dpr);
            ctx.clearRect(0, 0, size, size);

            const c = size / 2;
            const line = Math.max(7, size * 0.07);
            const radius = c - line - 2;

            ctx.beginPath();
            ctx.arc(c, c, radius, 0, Math.PI * 2);
            ctx.strokeStyle = 'rgba(255, 255, 255, 0.55)';
            ctx.lineWidth = line;
            ctx.stroke();

            let stroke;
            if (percentage > 80) {
                stroke = '#e11d48';
            } else if (percentage > 60) {
                stroke = '#d97706';
            } else {
                stroke = ctx.createLinearGradient(0, 0, size, 0);
                stroke.addColorStop(0, '#3ed6bb');
                stroke.addColorStop(1, '#7f90dc');
            }

            const start = -Math.PI / 2;
            const end = start + (Math.max(0, Math.min(100, percentage)) / 100) * Math.PI * 2;

            ctx.save();
            ctx.shadowColor = 'rgba(107, 127, 208, 0.45)';
            ctx.shadowBlur = 10;
            ctx.beginPath();
            ctx.arc(c, c, radius, start, end);
            ctx.strokeStyle = stroke;
            ctx.lineWidth = line;
            ctx.lineCap = 'round';
            ctx.stroke();
            ctx.restore();

            ctx.beginPath();
            ctx.arc(c, c, radius - line / 2 - 2, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255, 255, 255, 0.3)';
            ctx.fill();
        }

        function redrawAll() {
            drawGauge('diskGauge', state.diskGauge);
            drawGauge('ramGauge', state.ramGauge);
            drawGauge('cpuGauge', state.cpuGauge);
        }

        function fetchData() {
            fetch('?json=1', { cache: 'no-store' })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('uptime-display').textContent = data.uptime;

                    document.getElementById('disk-percent').textContent = data.disk.pct.toFixed(1) + '%';
                    document.getElementById('disk-total').textContent = data.disk.total.toFixed(1) + 'G';
                    document.getElementById('disk-free').textContent = data.disk.free.toFixed(1) + 'G';
                    document.getElementById('disk-progress').style.width = data.disk.pct + '%';
                    drawGauge('diskGauge', data.disk.pct);
                    setStatus('disk', data.disk.pct, ['Critical', 'Moderate', 'Healthy']);

                    document.getElementById('ram-percent').textContent = data.ram.pct.toFixed(1) + '%';
                    document.getElementById('ram-total').textContent = data.ram.total.toFixed(2) + 'G';
                    document.getElementById('ram-used').textContent = data.ram.used.toFixed(2) + 'G';
                    document.getElementById('ram-free').textContent = data.ram.free.toFixed(2) + 'G';
                    drawGauge('ramGauge', data.ram.pct);
                    setStatus('ram', data.ram.pct, ['Critical', 'Moderate', 'Healthy']);

                    document.getElementById('cpu-percent').textContent = data.cpu_usage.toFixed(1) + '%';
                    drawGauge('cpuGauge', data.cpu_usage);
                    setStatus('cpu', data.cpu_usage, ['High load', 'Moderate', 'Normal']);

                    document.getElementById('load-1').textContent = data.load[0];
                    document.getElementById('load-5').textContent = data.load[1];
                    document.getElementById('load-15').textContent = data.load[2];
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            redrawAll();
            window.addEventListener('resize', redrawAll);
            setInterval(fetchData, 3000);
        });
    </script>
</body>
</html>
