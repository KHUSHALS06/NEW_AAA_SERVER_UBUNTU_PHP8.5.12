<?php
App::import('Vendor','tcpdf/tcpdf');

class XTCPDF  extends TCPDF
{
    var $xheadertext  = 'PDF created using CakePHP and TCPDF';
    var $xheadercolor = array(254,204,254);
    var $xfootertext  = 'Copyright © %d WiFonic Technologies Pvt. Ltd.. All rights reserved.';
    var $xfooterfont  = PDF_FONT_NAME_MAIN ;
    var $xfooterfontsize = 8 ;


    /**
    * Overwrites the default header
    * set the text in the view using
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION';
    * set the fill color in the view using
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b)
    * set the font in the view using
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize));
    */
    function Header()
    {
        list($r, $b, $g) = $this->xheadercolor;
        $this->setHeaderMargin(0);
        $this->setY(0); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top
        $this->SetFillColor(255,255, 255);
        $this->SetDrawColor(5, 156, 27);
        //$this->RoundedRect(10, 3, 191, 10, 0, '1111', 'DF');
        $this->setY(3.5);
        $this->setX(139);
        //$this->SetFontSize(6);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        //$this->Cell(60, 3, "238, Second Floor",0,2,'R');
        //$this->Cell(60, 3, "IJMIMA Commertial Complex",0,2,'R');
        //$this->Cell(60, 3, "Malad(W), Mumbai-67",0,2,'R');
        $this->Image('img/logo.png', 12, 4, 30,8, 'PNG', 'http://www.wifonic.com', '', true, 150, '', false, false, 0, false, false, false);
        //$this->Cell(206,20,'',3);
        //$this->Text(15,26,$this->xheadertext );
    }

    /**
    * Overwrites the default footer
    * set the text in the view using
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.';
    */
    function Footer()
    {
        $year = date('Y');
        $footertext = sprintf($this->xfootertext, $year);
        $this->SetY(-12);
        $pageHight = $this->getPageHeight();
        $this->SetDrawColor(5, 156, 27);
        $this->SetFillColor(255, 255, 255);
        //$this->RoundedRect(10, 283, 191, 10, 0, '1111', 'DF');
        //$this->RoundedRect(10, $pageHight-14, 196, 10, 0, '1111', 'DF');
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        $this->Cell(0,4, $footertext,'',0,'C');
        
    }
}
?> 