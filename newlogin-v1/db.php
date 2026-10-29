<?php

class Db {

    public $conn;

    function __construct() {
	    mysqli_report(MYSQLI_REPORT_OFF);
	    $this->conn = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
	    if (!$this->conn) {
		    die("Connection failed: " . mysqli_connect_error());
	    }
    }

    private function _createSerialNumber($id) {
        return 'SN/WF/0' . date('Y') . '0' . date('m') . '0' . $id;
    }

    function mKey($len = 12, $type = 'ALNUM') {
        $alpha = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
            'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
            'y', 'z');

        $ALPHA = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W',
            'X', 'Y', 'Z');

        $num = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');

        $keyVals = array();

        $key = array();

        switch ($type) {
            case 'lower' :
                $keyVals = $alpha;
                break;
            case 'upper' :
                $keyVals = $ALPHA;
                break;
            case 'numeric' :
                $keyVals = $num;
                break;
            case 'ALPHA' :
                $keyVals = array_merge($alpha, $ALPHA);
                break;
            case 'ALNUM' :
                $keyVals = array_merge($alpha, $ALPHA, $num);
                break;
        }
        for ($i = 0; $i <= $len - 1; $i++) {
            $r = rand(0, count($keyVals) - 1);
            $key[$i] = $keyVals[$r];
        }
        return join("", $key);
    }

    function genuser() {
        $rvalue = '';
        for ($i = 0; $i < 4; $i++) {
            $rvalue .= $this->mKey(4, 'numeric');
            $rvalue .= "-";
        }
        $rvalue = preg_replace('/\-$/', "", $rvalue);
        return $rvalue;
    }

    function keygen() {
        $rvalue = "";
        do {
            $result = '';
            $rvalue = $this->genuser();
            $sql = "SELECT id FROM coupons where username ='$rvalue'";
            $result = $this->conn->query($sql);
            $noOfRows = 0;
            while ($result && $obj = $result->fetch_object()) {
                $noOfRows = 1;
                break;
            }
        } while ($noOfRows != 0);
        return $rvalue;
    }

    function insertToRadCkeckTable($userName, $attribute, $operation, $value, $DEBUG_ON, $fp) {
	    if($DEBUG_ON) { debug_line($fp, "\nIn insertToRadCkeckTable"); }

	    $sql = "INSERT INTO radcheck (username, attribute, op, value) VALUES('$userName', '$attribute', '$operation', '$value')";

	    if($DEBUG_ON) { debug_line($fp, "\nradcheckQuery :- $sql"); }

	    //return $sql;
	    $this->conn->query($sql);
    }

    function insertToRadReplyTable($userName, $attribute, $operation, $value,$DEBUG_ON, $fp) {

	    if($DEBUG_ON) { debug_line($fp, "\nIn insertToRadReplyTable"); }

	    $sql = "INSERT INTO radreply (username, attribute, op, value) VALUES('$userName', '$attribute', '$operation', '$value')";
	    if($DEBUG_ON) { debug_line($fp, "\nradreplyQuery :- $sql"); }
	    $this->conn->query($sql);
    }

    function log() {
        $sql = "INSERT INTO logs (message) VALUES('is reacheble')";
        if ($this->conn->query($sql) === TRUE) {
            return "success";
        } else {
            return 'fail';
        }
    }

    function insertToTestLogs($message) {
        $sql = "INSERT INTO testlogs (message) VALUES('$message')";
        if ($this->conn->query($sql) === TRUE) {
            return "success";
        } else {
            return 'fail';
        }
    }

    function getUsernameAndPassword($locationId, $roomNo, $registation_id, $mac, $created_date,$billingPlanId, $DEBUG_ON, $fp){

	    if($DEBUG_ON) { debug_line($fp, "\n In getUsernameAndPassword Function\n Parameter Recived is :\n locationid :- $locationId, Room No :- $roomNo,registation_id :- $registation_id, mac :-$mac,created_date :- $created_date,billingPlanId:-$billingPlanId, debug:- $DEBUG_ON, File Name:- $fp"); }

	    $sql = "SELECT username, password FROM coupons WHERE location_id = '$locationId' AND cust_id = '$roomNo' AND billing_plan_id = $billingPlanId AND cr_date > '$created_date'  AND calling_station_id  = '$mac'";
	    if($DEBUG_ON) { debug_line($fp, "\n getUsernameAndPasswordQuery :- $sql");}

	    $result = $this->conn->query($sql);
	    if ($result && $result->num_rows > 0) {
		    while ($obj = $result->fetch_object()) {
			    return $obj;
		    }
	    }
	    return 'fail';
	    }

    function getLocationAndLoginCms($locationDomain,$DEBUG_ON, $fp) {

	    if($DEBUG_ON) { debug_line($fp, "\nIn getLocationAndLoginCms function"); }

	    //return "fsdfasdf";
	    $sql = "SELECT locations.id, locations.location_domain, locations.location_name, locations.router_address,locations.username_length,locations.customer_id, locations.pms,locations.posting,locations.checkincycle, locations.business_plan_id, locations.devices_per_occupancy, locations.roompin, locations.sms_gateway, locations.sms_gateway_auth_key, locations.sms_gateway_user, locations.sms_gateway_pass, locations.sms_gateway_senderid, locations.sms_gateway_template,"
		    . " cms_loginpages.location_id, cms_loginpages.location_domain, cms_loginpages.logo_name, cms_loginpages.logo_size, cms_loginpages.logo_type, cms_loginpages.logo_url, cms_loginpages.footer,  cms_loginpages.tariff_display, cms_loginpages.background_type, cms_loginpages.background_size, cms_loginpages.background_name, cms_loginpages.bg_color, cms_loginpages.font_color, cms_loginpages.login_url, cms_loginpages.visibility, cms_loginpages.created, cms_loginpages.modified, cms_loginpages.opacity, cms_loginpages.promotional_ad, cms_loginpages.right_box_status, cms_loginpages.right_box_text"
		    . " FROM locations INNER JOIN cms_loginpages where locations.id = cms_loginpages.location_id AND locations.location_domain='$locationDomain'";

	    if($DEBUG_ON) { debug_line($fp, "\ngetLocationAndLoginCmsQuery : $sql\n"); }


	    if ($result = $this->conn->query($sql)) {
		    while ($obj = $result->fetch_object()) {
			    return $obj;
		    }
	    }
	    return '1';
    }

	    function updateDiveicePerOcupancy($noOfDevice, $locationId, $roomNo, $lname) {
		    $sql = "UPDATE check_ins SET total_coupon ='$noOfDevice' WHERE location_id=$locationId AND room_no='$roomNo' AND last_name='$lname'";
		    // $sql;
		    if ($result = $this->conn->query($sql)) {
			    return $result;
			    //return $roomNo.'s';
		    }
	    }

	    public function getGustDetails($locationId, $roomNo, $lastName, $pin, $pinStat) {
		    if ($pinStat == '1') {
			    $sql = "Select * from check_ins where location_id = $locationId AND room_no = '$roomNo' AND last_name LIKE '$lastName' AND pin=$pin LIMIT 1";
		    } else {
			    $sql = "Select * from check_ins where location_id = $locationId AND room_no='$roomNo' AND last_name LIKE '$lastName' LIMIT 1";
		    }
		    $this->log($locationId . '-' . $roomNo . '-' . $lastName . '-' . $pin);
		    //return $sql;
		    //echo $sql."<br/>";
		    if ($result = $this->conn->query($sql)) {
			    while ($obj = $result->fetch_object()) {
				    return $obj;
			    }
		    }
		    return '1';
	    }

	    /*
	     * This function is used for fatching all the coppons assigned to a single room
	     */

	    public function getCoupons($lid, $roomNo, $lastName, $checkInDate, $numbersOfCoupons) {
		    $roompin = '';
		    $sql = "Select username from coupons where location_id = $lid AND cust_id ='$roomNo' AND lastname LIKE '$lastName' and cr_date > '$checkInDate' AND password = '$roompin' LIMIT  $numbersOfCoupons";
		    //var_dump($sql);
		    //return $sql;
		    $coupons = array();
		    if ($result = $this->conn->query($sql)) {
			    while ($obj = $result->fetch_object()) {
				    $coupons[] = $obj->username;
			    }

			    return $coupons;
		    }
		    return '1';
	    }

	    public function changeGuestDetails($lId, $roomNo, $lastName, $firstName, $title, $checkInDate, $noOfDevice, $lastNameOld) {
		    $sql = "UPDATE coupons set lastname='$lastName', firstname='$firstName' where location_id = $lId AND cust_id ='$roomNo' AND lastname LIKE '$lastNameOld' and cr_date > '$checkInDate' LIMIT  $noOfDevice";
		    return $result = $this->conn->query($sql);
	    }

	    public function roomTransfer($lId, $newRoomNo, $regId, $oldRoomNo, $lastName, $firstName, $checkInDate, $noOfDevices) {
		    $sql = "UPDATE coupons set cust_id='$newRoomNo', lastname='$lastName', firstname='$firstName' where location_id = $lId AND cust_id ='$oldRoomNo' AND cr_date > '$checkInDate' AND creator = '$regId' LIMIT  $noOfDevices";
		    //   return $sql;
		    return $result = $this->conn->query($sql);
	    }

	    /*
	     * This function is used for fatching the coppons assigned to a single room and a particular mac id
	     */

	    public function getCoupon($locationId, $roomNo, $lName, $mac, $checkIndate, $roompin, $billingPlanId,$DEBUG_ON, $fp) {
		    if($DEBUG_ON) { debug_line($fp, "\nIn getCoupon function \n "); }

		    $sql = "Select username, password, activated from coupons where location_id = $locationId "
			    . " AND cust_id ='$roomNo' AND lastname LIKE '$lName' AND password = '$roompin' AND billing_plan_id = $billingPlanId AND cr_date > '$checkIndate' AND calling_station_id = '$mac' LIMIT 1";

		    if($DEBUG_ON) { debug_line($fp, "\ngetCoupnQuery :- $sql\n "); }

		    if ($result = $this->conn->query($sql)) {
			    while ($obj = $result->fetch_object()) {
				    return $obj;
			    }
		    }
		    return '1';
	    }

	    public function expairPmsCoupon($username) {
		    $currentDate = date('d M Y H:i:s');
		    $sql = "INSERT INTO radcheck (username, attribute, op, value) VALUES('$username', 'Expiration', ':=', '$currentDate')";
		    if ($this->conn->query($sql) === TRUE) {
			    return "0";
		    } else {
			    if ($this->conn->errno == '1062') {
				    return "0";
			    }
			    return '1';
		    }
	    }
	    public function captureMobileNumber($username, $mobile) {
		    $currentDate = date('d M Y H:i:s');
		    $sql = "UPDATE coupons set mobile = '$mobile' where username = '$username'  and activated = 0 limit 1";
		    if ($this->conn->query($sql) === TRUE) {
			    return "0";
		    } else {
			    if ($this->conn->errno == '1062') {
				    return "0";
			    }
			    return '1';
		    }
	    }

	    public function getBillingPlan($locationId, $planName, $billingId, $DEBUG_ON, $fp) {

		    //if($DEBUG_ON) { debug_line($fp, "\n In getBillingPlan Function\n Parameter Recived is :\n locationid :- $locationId,planName :- $planName, billingId:$billingId, Debug:- $DEBUG_ON, File Name:- $fp"); }

		    if ($billingId != '') {
			    $sql = "Select * from billing_plans where location_id = $locationId AND id ='$billingId' LIMIT 1";
		    } else {
			    $sql = "Select * from billing_plans where location_id = $locationId AND name_bp ='$planName' LIMIT 1";
		    }
		    
		    if($DEBUG_ON) { debug_line($fp, "\n getBillingPlanQuery :- $sql"); }
		    
		    if ($result = $this->conn->query($sql)) {
			    while ($obj = $result->fetch_object()) {
				    return $obj;
			    }
		    }
		    return '1';
	    }

	    public function getBillingPlans($locationId, $cat) {
		    //$sql = "Select * from billing_plans where location_id = $locationId AND cat_bp = '$cat' AND name_bp <> 'complimentary' AND name_bp <> 'PLATINUM'";
		    //$sql = "Select * from billing_plans where location_id = $locationId AND cat_bp = '$cat' AND name_bp <> 'PLATINUM'  AND  name_bp <> 'complimentary' order by price_bp ASC";
		$sql = "Select * from billing_plans where location_id = $locationId AND cat_bp = '$cat' AND name_bp <> 'PLATINUM'  AND  name_bp <> 'complimentary' order by CAST(price_bp AS UNSIGNED) ASC";
		    //        var_dump($sql);
		    if ($result = $this->conn->query($sql)) {
			    $bp = array();
			    while ($obj = $result->fetch_object()) {
				    $bp[] = $obj;
			    }
			    return $bp;
		    }
		    return '1';
	    }

	    public function createCoupon($domain, $locationId, $roomNo, $fName, $lName, $cod, $mac, $pin, $billingPlanId, $billingPlanName, $checkinCycle, $checkIndate, $regId, $mobileNumber, $DEBUG_ON, $fp) {
		   
		    //if($DEBUG_ON) { debug_line($fp, "\n In createCoupon Function\n Parameter Recived is :\n locationid :- $locationId, Room No :- $roomNo, Last Name :- $lName,fname: $fName, domain:$domain,  mac:$mac, pin:$pin, checkIndate : $checkIndate, checkOutdate : $cod, billingPlanName : $billingPlanName, checkinCycle : $checkinCycle, regId : $regId, Debug:- $DEBUG_ON, File Name:- $fp"); }
 
		    $username = $this->keygen();
		    $password = $pin;
		    $crDate = date('Y-m-d H:i:s');

		    $billingPlanDetails = '';

		    if($DEBUG_ON) { debug_line($fp, "\nCreated Username : $username, Password : $password, crDate : $crDate\n "); }		
		    if($DEBUG_ON) { debug_line($fp, "\n3rd Calling function getBillingPlan\n "); }

		    $billingPlanDetails = $this->getBillingPlan($locationId, $billingPlanName, $billingPlanId,$DEBUG_ON, $fp);

		    if($DEBUG_ON) { debug_line($fp, "\n3rd call to getBillingPlan function recived details :- ".print_r($billingPlanDetails,1)); }

		    if (!is_object($billingPlanDetails)) {
			    return '1';
		    }

		    $checkOutDate = '';
		    if ($cod != '') {
			    if ($checkinCycle == 24) {
				    $ctime = explode(' ', $checkIndate);
				    $coDate = $cod . ' ' . ($ctime[1] ?? '00:00:00');
				    $checkOutDate = date('d M Y H:i:s', strtotime($coDate));
			    } else {
				    $checkOutDate = date('d M Y 12:00:00', strtotime($cod));
			    }
		    }
		   
		    if($DEBUG_ON) { debug_line($fp, "\nCreated checkoutdate is : $checkOutDate\n "); }
		    $loginInfo = array();

		    $loginInfo['expire'] = date('Y-m-d H:i:s', time() + ($billingPlanDetails->maximum_time_bp * 60));
		    $plan_expiry = $loginInfo['expire'];
		    $loginInfo['price'] = $billingPlanDetails->price_bp;
		    $isused = 1;

		    //        var_dump($checkOutDate);
		    //	$sql1 = "SELECT id from coupons WHERE cust_id = '$roomNo' AND isused ";

		    $sql = "INSERT INTO coupons (cust_id, firstname, lastname, username, location_id, cr_date, creator, time_to_finish, password, called_station_id, calling_station_id, billing_plan_id, duration, upload_limit, download_limit, price, expiry_date , isused, mobile)"
			    . " VALUES('$roomNo', '$fName' ,'$lName', '$username', $locationId, '$crDate', '$regId', 1, '$password', '$domain', '$mac', $billingPlanDetails->id, '$billingPlanDetails->name_bp', '$billingPlanDetails->bandwidth_upload_bp', '$billingPlanDetails->bandwidth_download_bp', $billingPlanDetails->price_bp, '$plan_expiry', $isused, '$mobileNumber')";
		    
		    if($DEBUG_ON) { debug_line($fp, "\ncreateCouponQuery :- $sql"); }

		    if ($this->conn->query($sql) === TRUE) {
			    if($DEBUG_ON) { debug_line($fp, "\nInserting radius attributes to radcheck and radreply"); }

			    $this->insertToRadCkeckTable($username, 'Cleartext-Password', ':=', $password,$DEBUG_ON, $fp);
			    $this->insertToRadCkeckTable($username, 'Called-Station-Id', '==', $domain,$DEBUG_ON, $fp);

			    $this->insertToRadReplyTable($username, 'Acct-Interim-Interval', ':=', '900',$DEBUG_ON, $fp);
			    if (isset($billingPlanDetails->bandwidth_upload_bp) && $billingPlanDetails->bandwidth_upload_bp != '0') {
				    //                var_dump($billingPlanDetails->bandwidth_upload_bp);
				    $this->insertToRadReplyTable($username, 'WISPr-Bandwidth-Max-Up', ':=', "" . ($billingPlanDetails->bandwidth_upload_bp * 1000),$DEBUG_ON, $fp);
			    }
			    if (isset($billingPlanDetails->bandwidth_download_bp) && $billingPlanDetails->bandwidth_download_bp != '0') {
				    //                var_dump($billingPlanDetails->bandwidth_download_bp);
				    $this->insertToRadReplyTable($username, 'WISPr-Bandwidth-Max-Down', ':=', "" . ($billingPlanDetails->bandwidth_download_bp * 1000),$DEBUG_ON, $fp);
			    }

			    if ($billingPlanId == '' && strtolower($billingPlanDetails->name_bp) == 'platinum') {
				    //$this->insertToRadCkeckTable($username, 'Expiration', ':=', $checkOutDate);
			    } else if ($billingPlanId == '' && strtolower($billingPlanDetails->name_bp) == 'gold') {
				    $this->insertToRadCkeckTable($username, 'Expiration', ':=', $checkOutDate,$DEBUG_ON, $fp);
			    } else {
				    if ($billingPlanDetails->time_bp != 0) {
					    $this->insertToRadCkeckTable($username, 'Max-All-Session', ':=', $billingPlanDetails->time_bp * 60,$DEBUG_ON, $fp);
				    }
				    if ($billingPlanDetails->maximum_time_bp != 0) {
					    $this->insertToRadCkeckTable($username, 'Expire-After', ':=', $billingPlanDetails->maximum_time_bp * 60,$DEBUG_ON, $fp);
				    }
				    $plan_exp_for_expiration = date('d M Y H:i:s', strtotime($plan_expiry));
				   if(strtolower($billingPlanDetails->name_bp) != 'free'){
				     $this->insertToRadCkeckTable($username, 'Expiration', ':=', $plan_exp_for_expiration,$DEBUG_ON, $fp);
					}
			    }
			    $loginInfo['username'] = $username;
			    $loginInfo['password'] = $password;
			    
			    if($DEBUG_ON) { debug_line($fp, "\nExiting create Coupon function. username : $username, password : $password\n"); }

			    return $loginInfo;
		    } else {
			    return '1';
		    }
	    }

	    public function getLoginInfo($roomNo, $lName, $fName, $locationId, $domain, $noOfCoupons, $mac, $roompin, $pinStat, $checkIndate, $checkOutdate, $dpOccupancy, $billingPlanId, $billingPlanName, $checkinCycle, $loginType, $regId,$mobileNumber, $DEBUG_ON, $fp) {
		    //echo "hey here is getloginifo";exit();
		    if($DEBUG_ON) { debug_line($fp, "\n In getLoginInfo Function\n Parameter Recived is :\n locationid :- $locationId, Room No :- $roomNo, Last Name :- $lName, domain:$domain, noOfCoupons : $noOfCoupons, mac:$mac, roompin:$roompin, PinStat :- $pinStat,checkIndate : $checkIndate, checkOutdate : $checkOutdate, dpOccupancy :$dpOccupancy, billingPlanId : $billingPlanId, billingPlanName : ".print_r($billingPlanName,1).", checkinCycle : $checkinCycle, loginType : $loginType, regId : $regId,Mobile: $mobileNumber Debug:- $DEBUG_ON"); }
if($DEBUG_ON) { debug_line($fp, "\n In getLoginInfo Function\n");}
		    $loginInfo = array();

		    if ($loginType == 'F') {
			    
			    if($DEBUG_ON) { debug_line($fp, "\nIn Case LoginType  === F \n 1st Checking coupons Formula is :- $noOfCoupons > 0 && $noOfCoupons <= $dpOccupancy "); }	



			    if($DEBUG_ON) { debug_line($fp, "\nIn Case LoginType  === F \n 2nd Checking coupons Formula is :- $noOfCoupons <= $dpOccupancy "); }

			    if ($noOfCoupons <= $dpOccupancy) {
				    
				    if($DEBUG_ON) { debug_line($fp, "\nIn 2nd if loop Calling createCoupon funtion \n "); }

				    //echo "<br/>Creating new coupon...";
				    $userinfo = $this->createCoupon($domain, $locationId, $roomNo, $fName, $lName, $checkOutdate, $mac, $roompin, $billingPlanId, $billingPlanName, $checkinCycle, $checkIndate, $regId, $mobileNumber, $DEBUG_ON, $fp);

				    if($DEBUG_ON) { debug_line($fp, "\n createCoupon function recived details  :- ".print_r($userinfo,1)); }

				    if (is_array($userinfo)) {
					    $loginInfo[0] = $userinfo['username'];
					    $loginInfo[1] = $userinfo['password'];
					    $loginInfo[2] = 1;
					    $loginInfo[3] = $userinfo['expire'];
					    $loginInfo[4] = $userinfo['price'];

					    return $loginInfo;
				    }
			    }
		    } else if ($loginType == 'N') {
			    
			    if($DEBUG_ON) { debug_line($fp, "\nIn Case LoginType  === N \n Calling to createCoupon function "); }

			    $userinfo = $this->createCoupon($domain, $locationId, $roomNo, $fName, $lName, $checkOutdate, $mac, $roompin, $billingPlanId, $billingPlanName, $checkinCycle, $checkIndate, $regId, $mobileNumber, $DEBUG_ON, $fp);

			    if($DEBUG_ON) { debug_line($fp, "\n createCoupon function recived details  :- ".print_r($userinfo,1)); }
			    if (is_array($userinfo)) {
				    $loginInfo[0] = $userinfo['username'];
				    $loginInfo[1] = $userinfo['password'];
				    $loginInfo[2] = 1;
				    $loginInfo[3] = $userinfo['expire'];
				    $loginInfo[4] = $userinfo['price'];
				    return $loginInfo;
			    }
		    } else if ($loginType == 'P') {
		 
			    if($DEBUG_ON) { debug_line($fp, "\nIn Case LoginType  === P \n Calling to getCoupon function "); }

			    $userinfo = $this->getCoupon($locationId, $roomNo, $lName, $mac, $checkIndate, $roompin, $billingPlanId, $DEBUG_ON, $fp);
			    if($DEBUG_ON) { debug_line($fp, "\n getCoupon function recived details  :- ".print_r($userinfo,1)); }
			    if (is_object($userinfo)) {
				    $loginInfo[0] = $userinfo->username;
				    $loginInfo[1] = $userinfo->password;
				    $loginInfo[2] = 0;
				    return $loginInfo;
			    }
		    }
		    return '1';
	    }

	    function getNas($location) {
		    $sql = "SELECT nasname From nas where location_id= '$location'";
		    //return $sql;
		    $hostIp = array();
		    if ($result = $this->conn->query($sql)) {
			    while ($obj = $result->fetch_object()) {
				    $hostIp[] = $obj;
			    }
		    }
		    return $hostIp;
	    }

    }
