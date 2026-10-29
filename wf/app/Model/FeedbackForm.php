<?php

/*
 @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 */


class FeedbackForm extends AppModel {
    public $belongsTo = array(
        'ElementType' => array(
            'className' => 'ElementType',
            'foreignKey' => 'element_type_id'
        ),
        'FeedbackHeader' => array(
            'className' => 'FeedbackHeader',
            'foreignKey' => 'header_id'
        )
    );
}
