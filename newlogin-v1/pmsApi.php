<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'db.php';
require_once 'inc.php';
require './rapi/routeros_api.php';

function removeuser($locationId, $coupons) {
    $flag = 0;
    try {
        $db = new Db();
        $Nas = $db->getNas($locationId);
        ///$log = $db->insertToTestLogs('Coupon no ');
        $db->insertToTestLogs('Coupon Count :' . count($coupons));

        $API = new RouterosAPI();
        $API->debug = FALSE;
        $count = count($Nas);
        if ($count > 0) {
            foreach ($Nas as $value) {

                $isConnected = $API->connect($value->nasname, 'api', 'wfapi@2007');
                if ($isConnected) {

                    $API->write('/ip/hotspot/active/getall');
                    $READ = $API->read(false);
                    $ARRAY = $API->parseResponse($READ);
                    //var_dump($ARRAY);
                    $users = array();
                    $userIds = array();
                    foreach ($ARRAY as $usr) {
                        $users[] = $usr["user"];
                        $userIds[] = $usr['.id'];
                    }
                    for ($cp = 0; $cp < count($coupons); $cp++) {
                        $idx = array_search($coupons[$cp], $users);
                        if ($idx !== false) {
                            $API->comm("/ip/hotspot/active/remove", array(
                                "numbers" => $userIds[$idx],
                            ));
                        }
                    }
                    $API->disconnect();
                    $flag = 1;
                }
                if ($flag == 1) {
                    break;
                }
            }
        }
    } catch (Exception $ex) {
        $flag = 0;
        echo $ex;
    }
    return $flag;
}

if (isset($_POST['auth']) && $_POST['auth'] == "abwf123123abwf") {

	$dt = date('Y-m-d H:i:s');
	if($DEBUG_ON) { debug_line($fp, "\n\n\n\n----------------------- PMSAPI Started: $dt ----------------------"); }
	if($DEBUG_ON) { debug_line($fp, "\nPMS API POST DATA:\n".print_r($_POST,1)); }
	$action = $_POST['action'] ?? '';
	if($DEBUG_ON) { debug_line($fp, "\nAction : $action"); }

	switch ($action) {
	case 'O':
		$flag = 'fail';
		$locationId = $_POST['lc'] ?? '';
		$roomNo = $_POST['rn'] ?? '';
		$lastName = $_POST['ln'] ?? '';
		$checkInDate = $_POST['cd'] ?? '';
		$noOfCoupons = $_POST['nd'] ?? '';
		//echo $_POST['nd'] ?? '';
		if($DEBUG_ON) { debug_line($fp, "\nIn Case O\n"); }
		if ($noOfCoupons > 0) {
			$db = new Db();
			//echo $locationId, $roomNo, $lastName, $checkInDate, $noOfCoupons;
			if($DEBUG_ON) { debug_line($fp, "\nCalling getCoupons\n"); }
			$coupons = $db->getCoupons($locationId, $roomNo, $lastName, $checkInDate, $noOfCoupons);
			//var_dump($coupons); 
			//$log = $db->insertToTestLogs("WHAT");
			if (is_array($coupons) && count($coupons) > 0) {
				$rs = "";
				foreach ($coupons as $value) {
					$rs = $db->expairPmsCoupon($value);
					if ($rs == '1') {
						$flag = 'fail';
					} else {
						$flag = 'success';
					}
				}
				$routerFlag = removeuser($locationId, $coupons);
			}
		} else {
			$flag = 'success';
		}
		echo $flag;
		break;
	case 'C':
		$flag = 'success';
		$locationId = $_POST['lc'] ?? '';
		$roomNo = $_POST['rn'] ?? '';
		$checkInDate = $_POST['cd'] ?? '';
		$noOfCoupons = $_POST['nd'] ?? '';
		$title = $_POST['tl'] ?? '';
		$firstName = $_POST['fn'] ?? '';
		$middleName = $_POST['mn'] ?? '';
		$lastName = $_POST['ln'] ?? '';
		$lastNameOld = $_POST['oln'] ?? '';
		if($DEBUG_ON) { debug_line($fp, "\nIn Case P\n"); }
		//if ($noOfCoupons > 0) {
			$db = new Db();
			$coupons = $db->changeGuestDetails($locationId, $roomNo, $lastName, $firstName, $title, $checkInDate, $noOfCoupons, $lastNameOld);
		//}
		echo $flag;
		break;
	case 'T':
		$locationId = $_POST['lc'] ?? '';
		$oldRoomNo = $_POST['orn'] ?? '';
		$newRoomNo = $_POST['nrn'] ?? '';
		$checkInDate = $_POST['cd'] ?? '';
		$noOfDevice = $_POST['nd'] ?? '';
		$firstName = $_POST['fn'] ?? '';
		$lastName = $_POST['ln'] ?? '';
		$noOfCoupons = $_POST['nd'] ?? '';
		$regId = $_POST['rgn'] ?? '';
		if($DEBUG_ON) { debug_line($fp, "\nIn Case T\n"); }
		if ($noOfCoupons > 0) {
			$db = new Db();
			$coupons = $db->roomTransfer($locationId, $newRoomNo, $regId, $oldRoomNo, $lastName, $firstName, $checkInDate, $noOfCoupons);
		}
		echo 'success';
		break;
	default :
		echo "fail";
		break;
	}
	//$_POST['lc'].$_POST['rn'].$_POST['ln'].$_POST['cd'].$_POST['nd'] ?? '';
}
