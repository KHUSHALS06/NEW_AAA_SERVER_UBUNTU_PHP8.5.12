<?php
function debug_line($fp, $line) {
	if (is_resource($fp)) {
		fputs($fp, $line);
	}
}
function h($v) {
	return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}
$DEBUG_ON = 1;
$filename = __DIR__ . '/pms-portal.log';
$fp = false;
if($DEBUG_ON) {
	$fp = @fopen($filename, "a");
}
$localPath = "/var/www/plogin";
$linkPath = "plogin";
$headerText  = "Welcome to Blue Country Resort";
$titleText = "Welcome to Blue Country Resort";
$roomNoText = "Enter Room No.";
$lastNameText = "Type Last Name";
$couponNoText = "Enter Coupon No.";
$passwordText = "Type Password";
$tncText = "By logging in to the service, I agree to the <a href='tmc.html' target='_blank' style='color: #09090a;'>Terms & conditions</a>";
$footerText = "Powered by WIFONIC NETWORKS.";
$footerHelpText = "Call “Reception” for any assistance";
$firstTabText = "Room Login";
$secondTabText = "Coupon Login";
$leftLogo = "WhatsApp Image 2026-01-09 at 8.15.11 PM.jpeg";
$rightLogo = "WhatsApp Image 2026-01-09 at 8.15.11 PM.jpeg";
$backgroundImg = "WhatsApp Image 2026-01-09 at 7.00.18 PM.jpeg";
$footerImg = "wifonic-logo.png";
$btleftimg = "ajit_img1.jpg";
$btrghimg = "ajit_img2.jpg";
$btmidimg = "SPA.jpg";
