<?php
set_time_limit(0);
ini_set('memory_limit', '-1');
function debug_line($fp, $line) {
	$write = fputs($fp, $line);
}
$DEBUG_ON = 1;
$dt = date('Y-m-d H:i:s');
$ldt = date('Y-m-d');
$filename = '/var/tmp/mysqldeletelogs_'.$ldt.'.log';

if($DEBUG_ON) {
	$fp = fopen($filename, "a");
}
$lastLogDate = '2026-08-14 23:59:59';
//$limitClause = 'LIMIT 5';
$limitClause = '';
if($DEBUG_ON) { debug_line($fp, "\n\n\n\n----------------------- Started: $dt ----------------------"); }

if($DEBUG_ON) { debug_line($fp, "\nFile Started\n"); }

$conn = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
$conn1 = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
$conn2 = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
$conn3 = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
$conn4 = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
//var_dump($conn);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$cDate = date('Y-m-d', strtotime("-15 days"));

$sql = "SELECT username,cr_date FROM coupons WHERE cr_date < '$lastLogDate' $limitClause";
//$sql = "SELECT username,cr_date FROM coupons WHERE cr_date < '$lastLogDate' $limitClause AND activated = 0";
//$sql = "SELECT username,modified FROM radacct WHERE modified < '$lastLogDate' $limitClause";
if($DEBUG_ON) { debug_line($fp, "\nsql :: $sql\n"); }

     // echo $sql;
//exit;
if ($result = $conn->query($sql)) {
	//print_r($result);
	$user_arr = array();
	$lCount = 0;
	while ($obj = $result->fetch_object()) {

		$lCount++;
		$username = $obj->username;
		$cr_date = $obj->cr_date;
		$user_arr[] = $username; 
	}
}
echo "count => ".count($user_arr);
foreach($user_arr as $username){
	echo "\n username :: $username, cr_date : $cr_date";
	// print_r($obj);
	$sql1 = "DELETE FROM radcheck WHERE username = '$username' $limitClause;";
	echo "\n$sql1";
	if($DEBUG_ON) { debug_line($fp, "\nradcheck :: $sql1\n"); }
	$conn1->query($sql1);

	$sql2 = "DELETE FROM radreply WHERE username = '$username' $limitClause;";
	echo "\n$sql2";
	if($DEBUG_ON) { debug_line($fp, "\nradreply :: $sql2\n"); }
	$conn2->query($sql2);

	$sql3 = "DELETE FROM radacct WHERE username = '$username' $limitClause;";
	echo "\n$sql3";
	if($DEBUG_ON) { debug_line($fp, "\nradacct :: $sql3\n"); }
	$conn3->query($sql3);

	$sql4 = "DELETE FROM coupons WHERE username = '$username' $limitClause;";
	echo "\n$sql4";
	if($DEBUG_ON) { debug_line($fp, "\nradacct :: $sql4\n"); }
	$conn4->query($sql4);
	//echo $sql1."\n";
	//echo $sql1."\n";
}
echo "\n  Count:".$lCount;

$conn1->close();
$conn2->close();
$conn3->close();
$conn4->close();
?>
