<?php

/**
 * PdfHelper - gives views access to an XTCPDF instance via $this->Pdf->core
 */
App::uses('AppHelper', 'View/Helper');
App::import('Vendor', 'XTCPDF');

class PdfHelper extends AppHelper {

    /**
     * @var XTCPDF
     */
    public $core;

    /**
     * PHP 8 no longer treats a method named after the class as the constructor,
     * so this must be __construct() and must call the parent constructor.
     */
    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
        if (ob_get_level() > 0) {
            ob_end_clean();
        }
        $this->core = new XTCPDF();
    }

}
