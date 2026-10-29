<?php

/*
author=Khushal
*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPMailer\PHPMailer\PHPMailer;

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '1600M');
ini_set('max_execution_time', 3000);
date_default_timezone_set('Asia/Kolkata');

require_once __DIR__ . '/vendor/autoload.php';

$host   = 'localhost';
$dbname = 'hotspot';
$dbuser = 'hotspot';
$dbpass = 'hotspot@00WF';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $dbuser,
        $dbpass,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

$Client = "CitiResidenciBanskopa";

$smtpHost = "smtp.gmail.com";
$smtpPort = 587;
$smtpUser = "wifonicalertsup@gmail.com";
$smtpPass = "lodcwmfvjywbndks";

$recipients = array(
    'wifonicalertsup@gmail.com',
    'khushalsingh059@gmail.com'
);

$fromDate = date('Y-m-01 00:00:00', strtotime('first day of last month'));
$toDate   = date('Y-m-d 00:00:00', strtotime('first day of this month'));

$displayFrom = date('d-m-Y', strtotime('first day of last month'));
$displayTo   = date('d-m-Y', strtotime('last day of last month'));

$sql = "
SELECT username,cust_id,lastname,price,mail,active_date,duration,calling_station_id,acct_input_octets,acct_output_octets,total_session_time
FROM coupons WHERE activated = 1
AND active_date >= :fromDate
AND active_date <  :toDate";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':fromDate' => $fromDate,
    ':toDate'   => $toDate
));

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$data) {
    exit("No data found\n");
}

$headers = array(
    'Username',
    'Room No',
    'Name',
    'Price',
    'Email',
    'Activation Date',
    'Billing Plan',
    'MAC Address',
    'Upload (MB)',
    'Download (MB)',
    'Total Time (Hours)'
);

$rows = array($headers);

foreach ($data as $row) {
    $secs = (int)$row['total_session_time'];
    $rows[] = array(
        $row['username'],
        $row['cust_id'],
        $row['lastname'],
        $row['price'],
        $row['mail'] ?: '-',
        $row['active_date'],
        $row['duration'],
        $row['calling_station_id'],
        round((float)$row['acct_input_octets'] / (1024 * 1024), 2),
        round((float)$row['acct_output_octets'] / (1024 * 1024), 2),
        sprintf('%02d.%02d', intdiv($secs, 3600), intdiv($secs % 3600, 60))
    );
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Coupon Usage');
$sheet->fromArray($rows, null, 'A1');

$xlsxFile = __DIR__ . "/{$Client} Coupon_Usage_{$displayFrom}_to_{$displayTo}.xlsx";

$writer = new Xlsx($spreadsheet);
$writer->save($xlsxFile);

$spreadsheet->disconnectWorksheets();
unset($spreadsheet);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtpPort;
    $mail->SMTPDebug  = 0;

    $mail->setFrom($smtpUser, 'WiFonic Usage Reports');

    foreach ($recipients as $email) {
        $mail->addAddress($email);
    }

    $mail->Subject = "$Client Wifi Data Usage Report ($displayFrom to $displayTo)";
    $mail->Body    = "Attached is the WiFi usage report for last month.";

    $mail->addAttachment($xlsxFile);
    $mail->send();

} catch (\Exception $e) {
    echo "Mail Error: " . $mail->ErrorInfo . "\n";
}

@unlink($xlsxFile);
