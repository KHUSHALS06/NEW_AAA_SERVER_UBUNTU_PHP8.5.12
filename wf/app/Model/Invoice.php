<?php
App::uses('AppModel', 'Model');
/**
 * LocationsUser Model
 *
 */
class Invoice extends AppModel {
    public $hasOne = array(
        'InvoiceTrack' => array(
            'className'     => 'InvoiceTrack',
            'foreignKey'    => false,
            'conditions' => array('Invoice.id = InvoiceTrack.invoice_id')  
        ));
}
