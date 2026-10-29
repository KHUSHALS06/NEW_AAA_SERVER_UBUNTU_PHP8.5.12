<?php

/**
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 */
?>


<?php

App::uses('AppModel', 'Model');

/**
 * Group Model
 *
 */
class Group extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    var $actsAs = array('Acl' => array('type' => 'requester'));

    function parentNode() {
        return null;
    }

//    public $hasMany = array(
//        'User' => array(
//            'className' => 'User',
//            'foreignKey' => 'group_id'
//        ),
//    );


//    var $actsAs = array('Acl' => array('requester'));
//
//    function parentNode() {
//        return null;
//    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'created' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'modified' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
