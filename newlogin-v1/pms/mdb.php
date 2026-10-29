<?php
// Author: Khushal Singh <Super Admin>
// mdb.php - database connection using mysqli

$host = 'localhost';
$username = 'hotspot';
$password = 'hotspot@00WF';
$database = 'hotspot';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

