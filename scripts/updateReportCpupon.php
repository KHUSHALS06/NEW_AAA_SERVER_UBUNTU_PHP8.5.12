<?php
mysqli_report(MYSQLI_REPORT_OFF);

        function debug_line($fp, $line) {
               $write = fputs($fp, $line);
        }
        $DEBUG_ON = 0;
        $filename = '/tmp/reportCoupon.log';

        if($DEBUG_ON) {
               $fp = fopen($filename, "a");
        }

        $dt = date('Y-m-d H:i:s');
        if($DEBUG_ON) { debug_line($fp, "\n\n\n\n----------------------- Started: $dt ----------------------"); }

        if($DEBUG_ON) { debug_line($fp, "\nFile Started\n"); }

        $conn = mysqli_connect("localhost", "hotspot", "hotspot@00WF", "hotspot");
        //var_dump($conn);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "select location_id, count(id) as total_coupons, COALESCE(sum(acct_output_octets),0) as uploads, COALESCE(sum(acct_input_octets),0) as downloads, COALESCE(sum(price),0) as revanue, COALESCE(sum(total_session_time),0) as duration from coupons where activated=1 and active_date >='".date('Y-m-01')."' group by location_id ";

//echo $sql;
        if ($result = $conn->query($sql)) {
            while ($obj = $result->fetch_object()) {
                $sql1 = "INSERT INTO report_coupons (location_id, month, year, total_coupon, total_upload, total_download, total_duration, total_price, created) VALUES (".$obj->location_id.", '".date('m')."', '".date('Y')."', ".$obj->total_coupons.", ".$obj->uploads." , ".$obj->downloads." ,  ".$obj->duration.",  ".$obj->revanue.", NOW()) ON DUPLICATE KEY UPDATE  total_coupon=".$obj->total_coupons.", total_upload=".$obj->uploads.", total_download=".$obj->downloads.", total_duration=".$obj->duration.", total_price=".$obj->revanue;
                echo $sql1;
                if (!$conn->query($sql1)) {
                    echo "\nInsert failed: " . $conn->error . "\n";
                }
            }
        } else {
            echo "Query failed: " . $conn->error . "\n";
        }
?>
