<?php
// Logic to start or stop file debug.
function debug_line($fp, $line) {
	$write = fputs($fp, $line);
}
$DEBUG_ON = 1;
$filename = 'pms-portal.log';
if($DEBUG_ON) {
        $fp = fopen($filename, "a");
}
// Configure the varible to change portal 
$localPath = "/var/www/workspace/fias-template/plogin";
$linkPath = "plogin";
$headerText  = "Welcome to Sterling Holidays";
$titleText = "Welcome to WIFONIC";
$roomNoText = "Enter Room No.";
$lastNameText = "Type Last Name";
$couponNoText = "Enter Coupon No.";
$passwordText = "Type Password";
$tncText = "By logging in to the service, I agree to the <a href='tmc.html' target='_blank' style='color: #09090a;'>Terms & conditions</a>";
$footerText = "Powered by WIFONIC NETWORKS.";
$footerHelpText = "Call “Reception” for any assistance";
$firstTabText = "Room Login";
$secondTabText = "Coupon Login";
$leftLogo = "logo1.png";
$rightLogo = "logo2.png";
$backgroundImg = "bg-2.jpg";
$footerImg = "logo3.png";

