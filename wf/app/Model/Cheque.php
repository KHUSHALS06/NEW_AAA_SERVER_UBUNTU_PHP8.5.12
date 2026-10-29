<?php

App::uses('AppModel', 'Model');

/**
 * LocationsUser Model
 *
 */
class Cheque extends AppModel {

    public $validate = array(
        'instrument_number' => array(
            array(
                'rule' => array('notEmpty'),
                'message' => 'Instrument number is required.'
            ),
            array(
                'rule' => 'isUnique',
                'message' => 'This instrument number already exists.'
            ),
            array(
                //'rule' => array('alphanumeric'),
            //'message' => 'Only alphabets and numbers are allowed',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        )
    );
    
    public $hasOne = array(
        'InvoiceTrack' => array(
            'className'     => 'InvoiceTrack',
            'foreignKey'    => false,
            'conditions' => array('Cheque.invoice_id = InvoiceTrack.invoice_id')  
        ));

}
