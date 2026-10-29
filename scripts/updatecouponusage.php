<?php
        function debug_line($fp, $line) {
               $write = fputs($fp, $line);
        }
        $DEBUG_ON = 0;
        $filename = '/tmp/script.log';

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
        $sql = "Select distinct username from radacct where modified  > DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
//	 $sql = "select distinct rd.username from radacct rd JOIN coupons c on rd.username = c.username AND rd.acctinputoctets > 0 AND c.acct_input_octets <= 0 AND rd.acctoutputoctets > 0 AND c.acct_output_octets <= 0";
        if($DEBUG_ON) { debug_line($fp, "\n1st SQL : $sql\n"); }
	echo $sql;
	if ($result = $conn->query($sql)) {
		while ($obj = $result->fetch_object()) {
			print_r($obj);
			$sql1 = "select sum(acctinputoctets) as download, sum(acctoutputoctets) as upload, sum(acctsessiontime) as session from radacct where username ='".$obj->username."'";
			if($DEBUG_ON) { debug_line($fp, "\n2nd SQL : $sql1\n"); }
			//echo $sql1;
			if($result1 = $conn->query($sql1)){
				while($obj1 = $result1->fetch_object()){
					//                                print_r($obj1);
					if(isset($obj1->download) && isset($obj1->upload)){
						$sql2 = "update coupons set acct_input_octets =".$obj1->download.", acct_output_octets=".$obj1->upload.", total_session_time=".$obj1->session."  where username ='".$obj->username."'";
						if($DEBUG_ON) { debug_line($fp, "\n3rd SQL : $sql2\n"); }
						$conn->query($sql2);
						echo $sql2."\n";

					}
				}
			}
		}
	}
?>
