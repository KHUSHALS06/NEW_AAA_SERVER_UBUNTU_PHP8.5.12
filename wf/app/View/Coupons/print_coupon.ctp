<?php


$this->Pdf->core->setPrintHeader(false);
$this->Pdf->core->SetLeftMargin(20);
//$this->Pdf->core->SetRightMargin(10);

$this->Pdf->core->setFont('times', '', 10);
$this->Pdf->core->AddPage('P', '', false, false);
$cdetails = count($couponDetails);
for ($i = 0; $i < $cdetails; $i=$i+2) {
    
    $tCoupon = $couponDetails[$i]['Coupon']['username'];
    if($coupenLength==4){
        
       $tCoupon = substr($tCoupon, 0, $coupenLength);
    }

    //$this->Pdf->core->Image('img/wifonic_logo.png', 12, 24, '',10, 'PNG', 'http://www.wifonic.com', '', true, 150, '', false, false, 0, false, false, false);
    //if($logo!=''){
    //    $this->Pdf->core->Image($filename, $this->Pdf->core->getPageWidth($i)-30, 24, '',10, $logo_type, 'http://www.wifonic.com', 'right', true, 150, '', false, false, 0, false, false, false);
    //}
    $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Untitled Document</title>
            </head>';
    $html = $html.'<body>';
    
    $html = $html. '<table border="0" width="500px"><tr><td width="200px" style="border: 2px solid #999999">';
    $html = $html. '<table border="0" width=200px>';
    $html = $html. '<tr bgcolor="#19D2D5"><td colspan="3" align="center" >' . $location . '</td></tr>'.
                   '<tr><td colspan="3" align="left">'.$couponDetails[$i]['Coupon']['sn'].'</td></tr>'.
                   '<tr><td align="right" width="55px">Username</td><td width="5px"></td><td align="left" width="130px">' .$tCoupon.'</td></tr>'.
                   '<tr><td align="right" width="55px">Password </td><td width="5px"></td><td align="left" width="130px">' . $couponDetails[$i]['Coupon']['password'] . '</td></tr>'.
                   '<tr><td align="right" width="55px">Price </td><td width="5px"></td><td align="left" width="130px">Rs.' . $couponDetails[$i]['Coupon']['price'] . '/-</td></tr>'.
                   '<tr><td align="right" width="55px">Duration </td><td width="5px"></td><td align="left" width="130px">' . $couponDetails[$i]['Coupon']['duration']. '</td></tr>'.
                   '<tr><td align="right" width="55px">Validity </td><td width="5px"></td><td align="left" width="130px">' .$couponDetails[$i]['Coupon']['duration'].' from the time of activation(One device only)</td></tr>'.
                   '<tr><td colspan="3" align="center"><font color="blue"> WiFonic Technologies Pvt. Ltd</font></td></tr>';
    $html = $html. '</table></td>';
    $html = $html. '<td width="70px"></td>';
    
    $iPlusOne = $i+1;

    $tCoupon = $couponDetails[$iPlusOne]['Coupon']['username'];
    if($coupenLength==4){
       $tCoupon = substr($tCoupon, 0, $coupenLength);
    }

    if($iPlusOne < $cdetails){
        $html = $html. '<td width="200px" style="border: 2px solid #999999">';
        $html = $html. '<table border="0">';
        $html = $html. '<tr bgcolor="#19D2D5"><td colspan="3" align="center">' . $location . '</td></tr>'.
                   '<tr><td colspan="3" align="left">'.$couponDetails[$iPlusOne]['Coupon']['sn'].'</td></tr>'.
                   '<tr><td align="right" width="55px">Username</td><td width="5px"></td><td align="left" width="130px">' .$tCoupon.'</td></tr>'.
                   '<tr><td align="right" width="55px">Password </td><td width="5px"></td><td align="left" width="130px">' . $couponDetails[$iPlusOne]['Coupon']['password'] . '</td></tr>'.
                   '<tr><td align="right" width="55px">Price </td><td width="5px"></td><td align="left" width="130px">Rs.' . $couponDetails[$iPlusOne]['Coupon']['price'] . '/-</td></tr>'.
                   '<tr><td align="right" width="55px">Duration </td><td width="5px"></td><td align="left" width="130px">' . $couponDetails[$iPlusOne]['Coupon']['duration']. '</td></tr>'.
                   '<tr><td align="right" width="55px">Validity </td><td width="5px"></td><td align="left" width="130px">' .$couponDetails[$iPlusOne]['Coupon']['duration'].' from the time of activation(One device Only)</td></tr>'.
                   '<tr><td colspan="3" align="center"><font color="blue"> WiFonic Technologies Pvt. Ltd</font></td></tr>';
        $html = $html. '</table>';
        $html = $html. '</td>';
    }
    
    $html = $html.'</tr></table>';
    $html = $html.'</body>';
    $html = $html.'</html>';
    $this->Pdf->core->writeHTML($html, true, false, true, false, '');
    if($i>1 && ($i%10) == 0){
        $this->Pdf->core->AddPage('P', '', false, false);
    }
    
    
}
$js = <<<EOD
EOD;
$js .= 'print(true);';
  
$this->Pdf->core->IncludeJS($js);
ob_end_clean();
$this->Pdf->core->Output('coupon.pdf', 'I');
//$this->Pdf->core->Close(); 
//header('refresh: 2; url=""');
 exit(0);
?>
