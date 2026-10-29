<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

class PmsCheckIn extends AppModel {
   //public $useDbConfig = 'remotedatasource';
    var $specific = true;
    public $name = 'PmsCheckIn';
    public $useTable = 'check_ins';
    
}