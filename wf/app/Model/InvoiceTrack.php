<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InvoiceTrack
 *
 * @author dev3
 */
class InvoiceTrack extends AppModel {
    public $belongsTo = array(
        'Invoice' => array(
            'className' => 'Invoice',
            'foreignKey' => 'invoice_id'
    ));
}
