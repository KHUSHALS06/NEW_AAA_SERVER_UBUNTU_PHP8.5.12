<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');

class Policy extends AppModel {
        var $specific = true;
        public $name = 'Policy';
        public $useTable = 'policies';
        public $belongsTo = array('BillingPlan' => array(
                        'className' => 'BillingPlan',
                        'foreignKey' => 'billingplan_id'
                ));
        public $validate = array(
        'room_no' => array(
                array(
                        'rule' => array('notEmpty'),
                        'message' => 'A username is required.'
                ),
                array(
                        'rule' => 'isUnique',
                         'message' => 'This user already exists.'
                )
        ));
}
?>
