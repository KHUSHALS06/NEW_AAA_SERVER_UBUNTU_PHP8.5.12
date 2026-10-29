<?php

App::uses('AppModel', 'Model');

class Nas extends AppModel {

    public $name = 'Nas';
    public $useTable = 'nas';
//var $specific = true;
    public $validate = array(
        'nasname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'unique' => array(
                'rule' => array('isUnique'),
            ),
        ),
        'shortname' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'type' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        //'unique' => array(
        //   'rule'=> array('isUnique'),
        // )
        ),
        'ports' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'secret' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
/*
        'server' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
*/
        'community' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'description' => array(
            'alphaNumericUnderscoreBlankspace' => array(
                'rule' => array('alphaNumericUnderscoreBlankspace'),
                'message' => 'only consist of alphanumeric',
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


