<?php
date_default_timezone_set('Asia/Kolkata');

// Database connection
$host = 'localhost';
$dbname = 'hotspot';
$username = 'hotspot';
$password = 'hotspot@00WF';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$server_a_url = 'https://cloud.wifonicnetworks.com/klice/get_licenses.php';
$log_file = '/var/log/sync_valid_till.log';
$timestamp = date('[Y-m-d H:i:s] ');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server_a_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "X-API-KEY: WiFonicK@5B2A06SoMePr"
));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

if ($response === false) {
    error_log($timestamp . " cURL error: $curl_error\n", 3, $log_file);
    exit;
}

$data = json_decode($response, true);
if (!isset($data['licenses'])) {
    error_log($timestamp . " Invalid JSON or 'licenses' missing\n", 3, $log_file);
    exit;
}

foreach ($data['licenses'] as $license) {
    $mac = $license['mac_address'];
    $remote_valid_till = $license['valid_till'];

    $stmt = $conn->prepare("SELECT valid_till, location_domain FROM servers_data WHERE mac = :mac LIMIT 1");
    $stmt->execute([':mac' => $mac]);
    $row = $stmt->fetch();

    if ($row) {
        $local_valid_till = $row['valid_till'];
        $location_domain = $row['location_domain'];

        if ($local_valid_till != $remote_valid_till) {
            $update_server = $conn->prepare("UPDATE servers_data SET valid_till = :valid_till WHERE mac = :mac");
            $update_server->execute([':valid_till' => $remote_valid_till, ':mac' => $mac]);

            if (!empty($location_domain)) {
                $update_location = $conn->prepare("
                    UPDATE locations l
                    JOIN servers_data s ON l.location_domain = s.location_domain
                    SET l.valid_till = s.valid_till
                    WHERE s.mac = :mac
                ");
                $update_location->execute([':mac' => $mac]);
            }
        }
    }
}

$conn = null;
?>
