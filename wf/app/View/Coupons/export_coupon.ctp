
<?php
ini_set('memory_limit','1600M');
ini_set('max_execution_time', 3000);

//$this->PhpExcel->setReadDataOnly(true);
//$this->PhpExcel->setLoadSheetsOnly(array("1"));
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Username'), 'width' => 'auto', 'type' => 'text'),
    /*
    array('label' => __('Pwd'), 'width' => 'auto', 'type' => 'text'),
    array('label' => __('SN'), 'width' => 'auto'),
	*/
    array('label' => __('Room No'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Name'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Price'), 'width' => 'auto', 'type' => 'money'),
    array('label' => __('Email'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Activation Date'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Billing Plan'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('MAC Address'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Upload (In MB)'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Download (In MB)'), 'width' => 'auto', 'wrap' => true),
    array('label' => __('Total Time (In Hours)'), 'width' => 'auto', 'wrap' => true),
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
$this->PhpExcel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode('0000');
if ($userNameLength == '4') {
    $this->PhpExcel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode('0000');
}


// data
foreach ($coupons as $d) {
    if ($userNameLength == '4') {
        $tmpUserName = explode('-', $d['Coupon']['username']);
        $d['Coupon']['username'] = $tmpUserName[0];
    }

    $this->PhpExcel->addTableRow(array(
      	$d['Coupon']['username'],
        /*$d['Coupon']['password'],
        $d['Coupon']['sn'],
	*/
	$d['Coupon']['cust_id'],
	$d['Coupon']['lastname'],
        $d['Coupon']['price'],
	($d['Coupon']['mail']) ? ($d['Coupon']['mail']) : '-',
	$d['Coupon']['active_date'],
        $d['Coupon']['duration'],
        $d['Coupon']['calling_station_id'],
	round($d['Coupon']['acct_input_octets']/(1024*1024),2),
	round($d['Coupon']['acct_output_octets']/(1024*1024),2),
	gmdate('H.i', $d['Coupon']['total_session_time']),
    ));
}

$this->PhpExcel->addTableFooter();
//ob_end_clean();
//$this->PhpExcel->output();
$filename = "BlueCountryResort(" . $fromDateForFile . ")-(" . $toDateForFile . ").xlsx";
$this->PhpExcel->output($filename);
?> 
