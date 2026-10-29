<?php
require_once 'db.php';
require_once 'rdb.php';
require_once 'inc.php';

$dt = date('Y-m-d H:i:s');
if($DEBUG_ON) { debug_line($fp, "\n\n\n\n----------------------- roomlogin Started: $dt ----------------------"); }
if($DEBUG_ON) { debug_line($fp, "\nRoom Login Post Data:\n".print_r($_POST,1)); }

$mac = $_POST['mac'];
$ip = $_POST['ip'];
$username = $_POST['username'];
$linklogin = $_POST['link-login'];
$linkorig = $_POST['link-orig'];
$error = $_POST['error'];
$chapid = $_POST['chap-id'];
$chapchallenge = $_POST['chap-challenge'];
$linkloginonly = $_POST['link-login-only'];
$linkorigesc = $_POST['link-orig-esc'];
$macesc = $_POST['mac-esc'];
$servername = $_POST['server-name'];
$locationId = $_POST['location-id'];
$roomNo = $_POST['username'];
$lName = $_POST['password'];
$domain = $servername;
$dpo = $_POST["dpo"];
$pin = '';
if (isset($_POST['pin'])) {
    $pin = $_POST['pin'];
}
$pinStat = $_POST['pinStat'];
$pms = $_POST['pms'];
$host = $_POST['host'];

$checkinCycle = $_POST['checkincycle'];

$billingPlanId = $_POST['billing_plan_id'];


//echo "|" . $billingPlan[0] . "|";
$servcerDb = "";
$remoteDb = "";
$password = '';
if ($pms == 1) {// If PMS is enabled.
	if($DEBUG_ON) { debug_line($fp, "\nPMS : $pms"); }
	// Connection initialization 
	if($DEBUG_ON) { debug_line($fp, "\nInitializing Connection to Remote DB and Service DB \n"); }
	
	$servcerDb = new Db();

	//$remoteDb = new Rdb('localhost', 'pms', 'pms@00WF');
	$remoteDb = new Rdb('192.168.1.222', 'remoteuser','hotspot121');
	//  $remoteDb = new Rdb('localhost', 'remoteuser','hotspot121');
	
	if($DEBUG_ON) { debug_line($fp, "\nCalling getGustDetails Function. \n Sending Parameters to getGustDetails Function :- ($roomNo, $lName, $pin, $pinStat)\n"); }
	if($DEBUG_ON) { debug_line($fp, "\nbillingPlanId:-$billingPlanId \n"); }

	$guestDetails = $remoteDb->getGustDetails($locationId,$roomNo, $lName, $pin, $pinStat,$DEBUG_ON, $fp);

	if($DEBUG_ON) { debug_line($fp, "\nGuest Details recived from function getGustDetails:\n".print_r($guestDetails,1)); }

	if ($guestDetails != '1') {
		if($DEBUG_ON) { debug_line($fp, "\nguestDetails found"); }

		// Logic to Check user is old or new.
		// If user is old login with his old username and password directly.
		// If user is new the set logintype N, if it is Free set login type F.
		
		if($DEBUG_ON) { debug_line($fp, "\nCalling getUsernameAndPassword Function. \n Sending Parameters to getUsernameAndPassword Function :- ($locationId, $roomNo, ".$guestDetails->registation_id.", $mac,". $guestDetails->created.", $billingPlanId)\n"); }

		$guestCouponsDetails = $servcerDb->getUsernameAndPassword($locationId, $roomNo, $guestDetails->registation_id, $mac, $guestDetails->created, $billingPlanId,$DEBUG_ON, $fp);

		if($DEBUG_ON) { debug_line($fp, "\n getUsernameAndPassword function recived details:\n".print_r($guestCouponsDetails,1)); }

		if($guestCouponsDetails != 'fail'){
			// Old user foun logic. Login directly.

			if($DEBUG_ON) { debug_line($fp, "\nCase 1: fail not recived  \n This is old user \t username :$username, password :$password"); }

			$username = $guestCouponsDetails->username;
			$password = $guestCouponsDetails->password;

		}else{
			if($DEBUG_ON) { debug_line($fp, "\nCase 2 : Checking Paid or Free user case "); }
			if($DEBUG_ON) { debug_line($fp, "\nCalling function getBillingPlan\n Sending Parameters ($locationId,'',$billingPlanId) "); }

			$billingPlanName = $servcerDb->getBillingPlan($locationId,'',$billingPlanId,$DEBUG_ON, $fp);

			if($DEBUG_ON) { debug_line($fp, "\nFirst Call to getBillingPlan function recived details :- ".print_r($billingPlanName,1)); }
			
			if($billingPlanName->name_bp == 'free'){
				
				if($DEBUG_ON) { debug_line($fp, "\n Case 2.1 : This is Free billing plan setting login type : F "); }
				if($DEBUG_ON) { debug_line($fp, "\n dpo :-  $dpo ".'guesttotal coupn'.$guestDetails->total_coupon); }
				
				$loginType = 'F';
				if ($guestDetails->total_coupon <= $dpo) {
					$roompin = $guestDetails->pin;
					$firstName = $guestDetails->name;
					$checkIndate = $guestDetails->created;
					$checkOutdate = $guestDetails->checkout_date;
					$noOfCoupons = $guestDetails->total_coupon;

					if($DEBUG_ON) { debug_line($fp, "\nIn if loop after checking dpo \n roompin:$roompin,firstName:$firstName,checkIndate:$checkIndate,checkOutdate:$checkOutdate,noOfCoupons:$noOfCoupons "); }
					if($DEBUG_ON) { debug_line($fp, "\n2nd Calling function getBillingPlan\n Sending Parameters ($locationId,'',$billingPlanId) "); }

					$billingPlan = $servcerDb->getBillingPlan($locationId, "",$billingPlanId,$DEBUG_ON, $fp);
					
					if($DEBUG_ON) { debug_line($fp, "\nSecond call to getBillingPlan function recived details :- ".print_r($billingPlan,1)); }
					/*
					 *                  * Generate the coupon against the guest details and get the login info
					 *                                   */
					if($DEBUG_ON) { debug_line($fp, "\nCalling function getLoginInfo\n "); }

					$loginInfo = $servcerDb->getLoginInfo($roomNo, $guestDetails->last_name, $firstName, $locationId, $domain, $noOfCoupons, $mac, $roompin, $pinStat, $checkIndate, $checkOutdate, $dpo, $billingPlan->id, $billingPlanName, $checkinCycle, "F", $guestDetails->registation_id,$DEBUG_ON, $fp);

					if($DEBUG_ON) { debug_line($fp, "\n getLoginInfo function recived details  :- ".print_r($loginInfo,1)); }

					$username = $loginInfo[0];
					$password = $loginInfo[1];
					if (isset($loginInfo[2]) && $loginInfo[2] == 1) {
						
						if($DEBUG_ON) { debug_line($fp, "\n calling updateDiveicePerOcupancy"); }

						$remoteDb->updateDiveicePerOcupancy(($noOfCoupons + 1), $roomNo, $guestDetails->registation_id, $DEBUG_ON, $fp);
					}
				} else {
					$username = '-1';
				}
			}else{
				if($DEBUG_ON) { debug_line($fp, "\nCase 2.2 : New User"); }
				$loginType = 'N';
				$roompin = $guestDetails->pin;
				$firstName = $guestDetails->name;
				$checkIndate = $guestDetails->created;
				$checkOutdate = $guestDetails->checkout_date;
				$noOfCoupons = $guestDetails->total_coupon;
				/*
				 * Generate the coupon against the guest details and get the login info
				 */
				$loginInfo = $servcerDb->getLoginInfo($roomNo, $guestDetails->last_name, $firstName, $locationId, $domain, $noOfCoupons, $mac, $roompin, $pinStat, $checkIndate, $checkOutdate, $dpo, $billingPlanId, $billingPlanName, $checkinCycle, $loginType, $guestDetails->registation_id, $DEBUG_ON, $fp);

				if($DEBUG_ON) { debug_line($fp, "\n getLoginInfo function recived details  :- ".print_r($loginInfo,1)); }
				//Update the ocupancy  if new coupons is 
				$username = $loginInfo[0];
				$password = $loginInfo[1];
				if (isset($loginInfo[2]) && $loginInfo[2] == 1) {
					
					if($DEBUG_ON) { debug_line($fp, "\n calling updateRoomBillingInfo"); }

					$remoteDb->updateRoomBillingInfo($roomNo, $guestDetails->last_name, $roompin, $guestDetails->registation_id, $loginInfo[4], $loginInfo[3], $billingPlanId, $guestDetails->total_price, $guestDetails->paid_coupons, $DEBUG_ON, $fp);
				}
			}
		}
	} else {
		$username = '-2';
		if($DEBUG_ON) { debug_line($fp, "\nguestDetails not found, check location id"); }
		if($DEBUG_ON) { debug_line($fp, "\nCASE -2: username :$username"); }
	}
}
?>
<html>
    <head>
        <title>wifonic hotspot login</title>
        <meta http-equiv="Content-Type" content="hidden/html; charset=UTF-8" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="expires" content="-1" />
    </head>

    <body>Authenticating...<?php //echo $username."---".$roomNo ;                             ?>
        <?php
        if ($username != '-1' && $username != '-2') {
            	echo $linkloginonly;
	    ?>
            <form name="login" action="<?php echo $linkloginonly; ?>" method="post">
                <input   type="hidden" name="dst" value="<?php echo $linkorig; ?>"></input>
                <input   type="hidden" name="popup" value="true"></input>
                <input   type="text"   name="username"  value="<?php echo $username; ?>"></input>
                <input   type="text"   name="password"  value="<?php echo $password ?>"></input>
               <!--input   type="submit" value="continue"></input-->
            </form>
            <script language="JavaScript">
                //document.login.submit();
            </script>
            <?php
        } else {
            if ($username == '-2') {
                $error = "Invalid Guest details";
            }
            ?>
            <form name = "redirect" action = "index.php" method = "post">
                <input type = "hidden" name = "mac" value = "<?php echo $mac ?>"></input>
                <input type = "hidden" name = "ip" value = "<?php echo $ip ?>"></input>
                <input type = "hidden" name = "username" value = "<?php echo $roomNo ?>"></input>
                <input type = "hidden" name = "link-login" value = "<?php echo $linklogin ?>"></input>
                <input type = "hidden" name = "link-orig" value = "<?php echo $linkorig ?>"></input>
                <input type = "hidden" name = "error" value = "<?php echo $error ?>"></input>
                <input type = "hidden" name = "link-login-only" value = "<?php echo $linkloginonly ?>"></input>
                <!--<input type = "hidden" name = "link-orig-esc" value = "<?php //echo $linkorigesc    ?>"></input>-->
                <input type = "hidden" name = "mac-esc" value = "<?php echo $macesc ?>"></input>
                <input type = "hidden" name = "server-name" value = "<?php echo $servername ?>"></input>
                <!--input type = "submit" value = "continue"-->
            </form>
            <script language = "JavaScript">
                document.redirect.submit();
            </script>
            <?php
        }
        ?>
    </body>
</html>
