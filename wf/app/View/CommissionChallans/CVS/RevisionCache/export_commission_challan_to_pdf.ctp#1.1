<?php

//list($r, $b, $g) = $this->xheadercolor;
//$this->header();
$this->Pdf->core->setLeftMargin(20);
$this->Pdf->core->setRightMargin(20);
$this->Pdf->core->setTopMargin(10);
$this->Pdf->core->addPage('P', 'A4');
$this->Pdf->core->setFont('times', '', 10);

/*
  $this->Pdf->core->SetDrawColor(5, 156, 27); //Set the draw color
  $this->Pdf->core->RoundedRect(10, 25, 191, 248, 0, '1111', 'DD'); //The outer recrtangle
  //$this->Pdf->core->Cell(191, 3, $title,0,2,'C');
  $this->Pdf->core->SetFillColor(255, 255, 255);
  //$this->Pdf->core->setX(120);
  $this->Pdf->core->MultiCell(80, 2, __($wifonicAddress), 0, 'J', 1, 1, 125 ,25, true);
  $this->Pdf->core->setFont('times', 'B', 10);
  $this->Pdf->core->MultiCell(80, 2, __($title), 0, 'C', 1, 1, 60 ,60, true);
  $this->Pdf->core->setFont('times', '', 10);
  $this->Pdf->core->MultiCell(80, 2, __($locationAddress), 0, 'J', 1, 1, 12 ,70, true);
  $this->Pdf->core->MultiCell(80, 2, __($data['Coupon'][]), 0, 'J', 1, 1, 12 ,70, true);
  ob_end_clean();
  $this->Pdf->core->Output('example_001.pdf', 'D'); */

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%"><div align="left">&nbsp;</div></td>
    <td width="50%"><div align="right">&nbsp;</div></td>
  </tr><tr>
    <td ><div align="left">&nbsp;</div></td>
    <td ><div align="right">&nbsp;</div></td>
  </tr><tr>
    <td ><div align="left">&nbsp;</div></td>
    <td><div align="right">&nbsp;</div></td>
  </tr><tr>
    <td ><div align="left">&nbsp;</div></td>
    <td ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td width="50%"><div align="left">'.$commissionChallanData['address'].'</div></td>
    <td width="50%"><div align="right">'.$commissionChallanData['hotelAddress'].'</div></td>
  </tr>
  <tr>
    <td ><div align="left">&nbsp;</div></td>
    <td ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td ><div align="left">&nbsp;</div></td>
    <td ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td ><div align="left">&nbsp;</div></td>
    <td ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td colspan="2">';
$this->Pdf->core->writeHTML($html, true, false, true, false, '');
$html = '';
$count = 0;
$rowCount = 0;
$isTableEnded = 0;
$x='';
$html='';
while($count < count($commissionChallanData['period'])) {
    if ($rowCount == 0) {
        $html='';
        $isTableEnded = 0;
        if($this->Pdf->core->getPage()>1){
            $html = $html.'<br/><br/>';
        }
        $html = $html.'<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="5%"  bgcolor="#E0E0E0"><strong>#</strong></td>
        <td width="10%"  bgcolor="#E0E0E0"><strong>Month</strong></td>
        <td width="10%"  bgcolor="#E0E0E0"><strong>Year</strong></td>
        <td width="10%"  bgcolor="#E0E0E0"><strong>Net Revenue </strong></td>
        <td width="10%"  bgcolor="#E0E0E0"><strong>Tax @'.$commissionChallanData['taxPercentage'].'% </strong></td>
        <td width="10%"  bgcolor="#E0E0E0"><strong>Gross Shale </strong></td>
        <td width="15%"  bgcolor="#E0E0E0"><strong>Wifonic Share@'.$commissionChallanData['wifonicSharePercentage'].'% </strong></td>
        <td width="30%"  bgcolor="#E0E0E0"><strong>Commision @'.$commissionChallanData['comissionPercentage'].'% on WiFonic Share </strong></td>
      </tr>';
    }
    $html = $html . '<tr>
        <td >'.$count.'</td>
        <td >' . $commissionChallanData['period'][$count]['month'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['year'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['netRevenue'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['tax'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['grossSale'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['wifonicShare'] . '</td>
        <td >' . $commissionChallanData['period'][$count]['comission'] . '</td>
        </tr>';
    //$count++;
    if ($this->Pdf->core->getPage() <= 1) {
        if ($rowCount == 20) {
            if ($count == count($commissionChallanData['period'])-1) {
                $html = $html . '<tr>
                <td colspan="7" bordercolor="#333333"><div align="right"><strong>Total</strong></div></td>
                <td bordercolor="#333333">&nbsp;</td>
            </tr>';
            }
            $html = $html . '</table>';
            $this->Pdf->core->writeHTML($html, true, false, true, false, '');
            $rowCount = 0;
            $isTableEnded = 1;
            $this->Pdf->core->AddPage('P', 'A4');
        }else{
            $rowCount++;
        }
    } else {
        if ($rowCount == 28) {
            $this->Pdf->core->setY(50);
            if ($count == count($commissionChallanData['period'])-1) {
                $html = $html . '<tr>
                <td colspan="7" bordercolor="#333333"><div align="right"><strong>Total</strong></div></td>
                <td bordercolor="#333333">&nbsp;</td>
            </tr>';
            }
            $html = $html . '</table>';
            $this->Pdf->core->writeHTML($html, true, false, true, false, '');
            //unset($html);
            $rowCount = 0;
            $isTableEnded = 1;
            $this->Pdf->core->AddPage('P', 'A4');
            //$this->Pdf->core->AddPage('P', 'A4');
        }  else {
            $rowCount++;
        }
    }
    //$rowCount++;
    $count++;
}
if ($isTableEnded == 0) {
    $html = $html . '<tr>
            <td colspan = "7" bordercolor = "#333333"><div align = "right"><strong>Total</strong></div></td>
            <td bordercolor = "#333333">Rs.'.$commissionChallanData['totalCommission'].'
            </td>
            </tr>
            </table>';
    $this->Pdf->core->writeHTML($html, true, false, true, false, '');
}

$html = '</td>
            </tr>
            <tr>
            <td colspan = "2">&nbsp;
            </td>
            </tr>
            <tr>
            <td colspan = "2">For: </td>
            </tr>
            <tr>
            <td colspan = "2">Wifonic Technologies Pvt. Ltd. <br/>208, 2nd Floor, IJMIMA Commertial Complex<br/> Near Goregaon Sports Club, Off Link Road<br/>Malad (W), Mumbai-64 <br/>Ph: +91-22-66077300<br/>E-mail : info@wifonic.com</td>
            </tr>
            <tr>
            <td colspan = "2">&nbsp;
            </td>
            </tr>
            <tr>
            <td colspan = "2">Signature:_____________________________</td>
            </tr>
            <tr>
            <td colspan = "2">Name:____________________________ </td>
            </tr>
            </table>
            </body>
            </html>
            ';

$this->Pdf->core->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$this->Pdf->core->Output('./Temp/'.$commissionChallanData['fileName'], 'F');
$this->Pdf->core->Close();
?>