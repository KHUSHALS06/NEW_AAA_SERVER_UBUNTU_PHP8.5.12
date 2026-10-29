
<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('SN'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Username'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Pwd'), 'width' => 'auto', 'filter' => true, 'type' => 'text')
    //array('label' => __('Description'), 'width' => 50, 'wrap' => true),
    //array('label' => __('Modified'), 'width' => 'auto')
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
$this->PhpExcel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode('0000');

// data
foreach ($users as $d) {
    $this->PhpExcel->addTableRow(array(
        $d['Coupon']['sn'],
        $d['Coupon']['username'],
        $d['Coupon']['password'],
        //$d['Coupon']['created'],
        //$d['Coupon']['modified']
    ));
}

$this->PhpExcel->addTableFooter();
//ob_end_clean();
$this->PhpExcel->output(); 
?> 