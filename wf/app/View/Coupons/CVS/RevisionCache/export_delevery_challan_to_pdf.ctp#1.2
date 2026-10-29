<?php

//list($r, $b, $g) = $this->xheadercolor;
//$this->header();

$this->Pdf->core->SetLeftMargin(10);
$this->Pdf->core->SetRightMargin(10);
$this->Pdf->core->SetTopMargin(10);
$this->Pdf->core->addPage('', 'WiFonic');
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
<table width="100%" height="232" border="0">
  <tr>
    <td width="40%" height="108" align="left" valign="top">&nbsp;</td>
    <td width="20%" align="left" valign="top">&nbsp;</td>
    <td width="40%" align="left">WiFonic Technologies Pvt. Ltd. <br/>
    238, 2nd Floor, IJMIMA Commercial Complex <br/>
    Off Link Road, Malad (West)<br/>
    Mumbai-400064 <br/>
    Tel: 022-66077300<br/>
    email: info@wifonic.com<br/></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>Scratch Cards Delivery Details Challan </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">'.$locationAddress.'</td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">' . date('d F Y H:i:s') . '</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">';

$html = $html . '<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
      <tr>
        <td width="5%">&nbsp;#</td>
        <td width="15%">&nbsp;Duration</td>
        <td width="25%">&nbsp;Sl. From </td>
        <td width="25%">&nbsp;Sl. To </td>
        <td width="8%">&nbsp;Quantity</td>
        <td width="9%">&nbsp;Price(Rs.)</td>
        <td width="13%">&nbsp;Total Ammount(Rs.) </td>
      </tr>
      <tr>';
if (count($data) > 0) {
    $quintityTotal = 0;
    $priceTotal = 0;
    $tax=0;
    for ($i = 0; $i < count($data); $i++) {
        $price = 0;
        if ($locationType = 1) {
            $price = $data[$i]['price'];
        } else {
            $price = $scratchCardPrice;
        }
        $quintityTotal = $quintityTotal + count($data[$i]['BillingPlan']);
        $priceTotal = $priceTotal + (count($data[$i]['BillingPlan']) * $price);
        
        $html = $html . '<td >&nbsp;' . ($i + 1) . '</td>';
        $html = $html . '<td >&nbsp;' . $data[$i]['planName'] . '</td>';
        $html = $html . '<td >&nbsp;' . $data[$i]['firstSN'] . '</td>';
        $html = $html . '<td >&nbsp;' . $data[$i]['lastSN'] . '</td>';
        $html = $html . '<td >&nbsp;' . count($data[$i]['BillingPlan']) . '</td>';
        $html = $html . '<td >&nbsp;' . $price . '</td>';
        $html = $html . '<td >&nbsp;' . (count($data[$i]['BillingPlan']) * $price) . '</td>';
        //$html = $html . $data[$i]['firstSN'];
    }
    if($locationType = 0){
        $tax= (float)($priceTotal*5)/100;
    }
    

$html = $html . '</tr>';
$html = $html . '<tr>
        <td colspan="4"><div align="center"><strong>&nbsp;Total</strong></div></td>
        <td>&nbsp;'.$quintityTotal.'</td>
        <td>&nbsp;</td>
        <td>'.$priceTotal.'</td>
      </tr>';
if($locationType = 0){
      $html = $html.'<tr>
        <td colspan="6"><div align="center">&nbsp;Vat on '.$priceTotal.' @ 5% </div></td>
        <td>';
$html = $html.$tax.'</td>
      </tr>';
      }
$html = $html.'<tr>
        <td colspan="6"><div align="center">&nbsp;Net Payment</div></td>
        <td>&nbsp;';
$html = $html.($tax+$priceTotal).'</td>
      </tr>
      </table>';
}
//$html = $html . count($data);

$html = $html . '</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">For: Wifonic Technologies Pvt. Ltd.</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">Signature:________________________</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">Name:________________________</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr><tr>
    <td colspan="3" align="left" valign="top">&nbsp;</td>
  </tr><tr>
    <td colspan="3" align="left" valign="top">Note: This is not invoice, Please do not make separate payment. Actual payble will be reflected in the monthly invoice.</td>
  </tr>
</table>
</body>
</html>
';
$this->Pdf->core->writeHTML($html, true, false, true, false, '');
ob_end_clean();
//=$this->Session->read('locations_list')[$locationId].date('d_m_Y_H_i_s');
//$xyz = $this->Pdf->core->Output('','S');
//$this->Session->write('challan_pdf', $this->Pdf->core->Output('','S'));
//pr($dumPdf);
$this->Pdf->core->Output('./Challans/'.$fileName.'.pdf', 'F');
$this->Pdf->core->Close(); 	
//ob_end_clean();
?>