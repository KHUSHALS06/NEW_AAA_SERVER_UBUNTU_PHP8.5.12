<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Rdb{
    function __construct($host, $user, $pwd) {
        //echo $host;
        $this->conn = mysqli_connect($host, $user, $pwd, "pmsinterfacing");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    public function getGustDetails($locationId,$roomNo, $lastName, $pin, $pinStat,$DEBUG_ON, $fp){

	    if($DEBUG_ON) { debug_line($fp, "\n In getGuestDetails Function\n Parameter Recived is :\n locationid :- $locationId, Room No :- $roomNo, Last Name :- $lastName, Pin :- $pin, PinStat :- $pinStat,Debug:- $DEBUG_ON, File Name:- $fp"); }

	    if($pinStat == '1'){
		    $sql = "Select * from check_ins where location_id = '$locationId' AND room_no='$roomNo' AND last_name LIKE '$lastName' AND pin=$pin LIMIT 1" ;
	    }else{
		    $sql = "Select * from check_ins where location_id = '$locationId' AND room_no='$roomNo' AND last_name LIKE '$lastName'  LIMIT 1";
	    }
	    
	    if($DEBUG_ON) { debug_line($fp, "\nPinStat = $pinStat \n getGuestDetailsQuery :- $sql"); }

	    if ($result = $this->conn->query($sql)) {
		    while ($obj = $result->fetch_object()) {
			    return $obj;
		    }
	    }
	    return '1';
    }
    
    function updateDiveicePerOcupancy($noOfDevice, $roomNo, $regId, $DEBUG_ON, $fp) {

	    if($DEBUG_ON) { debug_line($fp, "\n In updateDiveicePerOcupancy Function\n Parameter Recived is :\n Room No :- $roomNo, noOfDevice:$noOfDevice,regId:$regId, Debug:- $DEBUG_ON, File Name:- $fp"); }

	    $sql = "UPDATE check_ins SET total_coupon ='$noOfDevice' WHERE room_no LIKE '$roomNo' AND registation_id = $regId";

	    if($DEBUG_ON) { debug_line($fp, "\nPinStat = $pinStat \n updateDiveicePerOcupancyQuery :- $sql"); } 

	    if ($this->conn->query($sql) === TRUE) {
		    return "success";
	    } else {
		    return 'fail';
	    }
    }
    
    public function updateRoomBillingInfo($roomNo, $lastName, $pin, $regId, $price, $expire, $billingPlanId,  $oldPrice, $oldCouponCount, $DEBUG_ON, $fp){
	    $sql = "UPDATE check_ins "
		    . "SET paid_coupons =".($oldCouponCount+1).","
		    . "total_price =".$price.","
		    . "billing_plan_id = ".$billingPlanId.","
		    . "expiry_date ='".$expire."',"
		    . "posting_status = 0 "
		    . "WHERE room_no LIKE '$roomNo' "
		    . "AND last_name LIKE '$lastName' "
		    . "AND pin= $pin "
		    . "AND registation_id = $regId";

	    if($DEBUG_ON) { debug_line($fp, "\nupdateRoomBillingInfoQuery :- $sql"); }
	    if ($this->conn->query($sql) === TRUE) {
		    return "success";
	    } else {
		    return 'fail';
	    }
    }
    
    
}
