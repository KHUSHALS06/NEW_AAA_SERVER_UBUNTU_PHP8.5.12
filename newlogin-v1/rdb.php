<?php
class Rdb {

    public $conn;

    function __construct($host, $user, $pwd) {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->conn = mysqli_connect($host, $user, $pwd, "pmsinterfacing");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getGustDetails($locationId, $roomNo, $lastName, $pin, $pinStat, $DEBUG_ON, $fp) {

        if($DEBUG_ON) { debug_line($fp, "\n In getGuestDetails Function\n Parameter Recived is :\n locationid :- $locationId, Room No :- $roomNo, Last Name :- $lastName, Pin :- $pin, PinStat :- $pinStat,Debug:- $DEBUG_ON"); }

        if ($pinStat == '1') {
            if ($pin === '' || $pin === null) {
                return '1';
            }
            $sql = "Select * from check_ins where location_id = '$locationId' AND room_no='$roomNo' AND last_name LIKE '$lastName' AND pin=$pin LIMIT 1";
        } else {
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

        if($DEBUG_ON) { debug_line($fp, "\n In updateDiveicePerOcupancy Function\n Parameter Recived is :\n Room No :- $roomNo, noOfDevice:$noOfDevice,regId:$regId, Debug:- $DEBUG_ON"); }

        $sql = "UPDATE check_ins SET total_coupon ='$noOfDevice' WHERE room_no LIKE '$roomNo' AND registation_id = $regId";

        if($DEBUG_ON) { debug_line($fp, "\nupdateDiveicePerOcupancyQuery :- $sql"); }

        if ($this->conn->query($sql) === TRUE) {
            return "success";
        } else {
            return 'fail';
        }
    }

    private function getPostingStatus($regId) {
        $sql = "Select posting_status, total_price from check_ins where registation_id = '$regId' LIMIT 1";
        if ($result = $this->conn->query($sql)) {
            while ($obj = $result->fetch_object()) {
                return $obj;
            }
            return 'fail';
        } else {
            return 'fail';
        }
    }

    public function updateRoomBillingInfo($roomNo, $lastName, $pin, $regId, $price, $expire, $billingPlanId, $oldPrice, $oldCouponCount, $DEBUG_ON, $fp) {
        $postingStatus = $this->getPostingStatus($regId);
        if ($postingStatus != 'fail' && isset($postingStatus->posting_status) && $postingStatus->posting_status == 0) {
            $price = ($postingStatus->total_price + $price);
        }
        $sql = "UPDATE check_ins "
            . "SET paid_coupons =" . ((int)$oldCouponCount + 1) . ","
            . "total_price =" . (float)$price . ","
            . "billing_plan_id = " . (int)$billingPlanId . ","
            . "expiry_date ='" . $expire . "',"
            . "posting_status = 0 "
            . "WHERE room_no LIKE '$roomNo' "
            . "AND last_name LIKE '$lastName' "
            . "AND pin = '$pin' "
            . "AND registation_id = '$regId'";

        if($DEBUG_ON) { debug_line($fp, "\nupdateRoomBillingInfoQuery :- $sql"); }
        if ($this->conn->query($sql) === TRUE) {
            return "success";
        } else {
            return 'fail';
        }
    }




function updateUserLoginStatus($roomNo, $last_name, $regNo, $ip, $mac, $status, $pin, $locationId, $DEBUG_ON, $fp)
{
    if ($DEBUG_ON) { debug_line($fp, "\nIn updateUserLoginStatus Table"); }

    $sql = "INSERT INTO loginattempts (room_no,last_name,registation_id,ip,mac,status,attempt,created,pin,location_id) VALUES (?,?,?,?,?,?,1,NOW(),?,?)";

    if ($DEBUG_ON) { debug_line($fp, "\nloginattempts :- $sql"); }

    try {
        $stmt = $this->conn->prepare($sql);
        $roomNo = (string)$roomNo;
        $last_name = (string)$last_name;
        $regNo = (string)$regNo;
        $ip = (string)$ip;
        $mac = (string)$mac;
        $status = (string)$status;
        $pin = (string)$pin;
        $locationId = (string)$locationId;
        $stmt->bind_param('ssssssss', $roomNo, $last_name, $regNo, $ip, $mac, $status, $pin, $locationId);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    } catch (\Throwable $e) {
        if ($DEBUG_ON) { debug_line($fp, "\nupdateUserLoginStatus error: " . $e->getMessage()); }
        return false;
    }
}





}
