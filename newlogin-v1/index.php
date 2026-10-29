<?php
require_once 'db.php';
require_once 'inc.php';
session_start();

if (
    $_SERVER['REQUEST_METHOD'] !== "POST" ||
    !isset($_POST['mac']) ||
    !isset($_POST['ip']) ||
    !isset($_POST['server-name'])
) {
    echo "<h1 style='color:red'><center>Please Connect to SSID to enjoy WiFi Service!</center></h1>";
    exit;
}


$dt = date('Y-m-d H:i:s');

if($DEBUG_ON) { debug_line($fp, "\n\n\n\n----------------------- Indext Started: $dt ----------------------"); }

if($DEBUG_ON) { debug_line($fp, "\nPOST DATA:\n".print_r($_POST,1)); }

$defaultservername = 'f6b5fce8de98451';
//$servermethod = 'POST';
$servername = (isset($_POST['server-name']) && $_POST['server-name'] !== '') ? $_POST['server-name'] : $defaultservername;

if($DEBUG_ON) { debug_line($fp, "\nServername : $servername"); }

if ($servermethod == "POST" && $servername != '') {
	$mac = $_POST['mac'] ?? '';
	$ip = $_POST['ip'] ?? '';
	$username = $_POST['username'] ?? '';
	$linklogin = $_POST['link-login'] ?? '';
	$linkorig = $_POST['link-orig'] ?? '';
	$error = $_POST['error'] ?? '';
	$chapid = $_POST['chap-id'] ?? '';
	$chapchallenge = $_POST['chap-challenge'] ?? '';
	$linkloginonly = $_POST['link-login-only'] ?? '';
	$linkorigesc = $_POST['link-orig-esc'] ?? '';
	$macesc = $_POST['mac-esc'] ?? '';
	$pin = '';
	$roomNo = $username;
	$lName = $_POST['password'] ?? '';
	$domain = $servername;
	$mydb = new Db();

	if($DEBUG_ON) { debug_line($fp, "\nCalling getLocationAndLoginCms function"); }

	$location = $mydb->getLocationAndLoginCms($servername, $DEBUG_ON, $fp);

	if (!is_object($location)) {
		http_response_code(404);
		echo 'Unknown location';
		exit;
	}

	$ispin = $location->roompin;
	$routerAddress = $location->router_address;
	$locationId = $location->id;
	$isPosting = $location->posting;

	if($DEBUG_ON) { debug_line($fp, "\nData recived from getLocationAndLoginCms Function:\n".print_r($location,1)); }

	$_SESSION['font_color'] = $location->font_color;
	$_SESSION['bg_color'] = '';
	$_SESSION['background_type'] = $location->background_type;
	$_SESSION['background'] = $location->background_name;
	$_SESSION['logo_type'] = $location->logo_type;
	$_SESSION['logo'] = $location->logo_name;
	$_SESSION['footer'] = $location->footer;

	if ($location->pms == '1') {
		if($DEBUG_ON) { debug_line($fp, "\nCalling PMS index.php. Isposting : $isPosting");}
		switch ($servername) {
			case 'xyz':
				break;
			default:
				include 'pms/index.php';
				break;
		}
	} else {
		switch ($servername) {
			case 'f6b5fce8de98451':
				include 'gold1/index.php';
				break;
			default:
				include 'gold/index.php';
				break;
		}
	}
} else {
	header('Location: http://www.yahoo.com');
	echo "<h1 style='color:red'><center>Please Connect to SSID to enjoy WiFi Service!</center></h1>";
    exit;

}
