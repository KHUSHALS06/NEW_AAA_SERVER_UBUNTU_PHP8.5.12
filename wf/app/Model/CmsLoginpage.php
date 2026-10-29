<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CmsLoginpage
 *
 * @author dev3
 */
class CmsLoginpage extends AppModel {
    public $belongsTo = array(
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
            'fields' => array('id', 'location_name'),
        )
    );
}
