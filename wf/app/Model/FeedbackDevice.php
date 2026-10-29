<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of device
 *
 * @author dev001
 */
class FeedbackDevice extends AppModel {
    public $belongsTo = array(
        'Location' => array(
            'className' => 'locations',
            'foreignKey' => 'location_id',
            'fields' => array('id', 'location_name'),
            'order' => ''
        )
    );
    //put your code here
}
