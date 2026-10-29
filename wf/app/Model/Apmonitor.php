<?php
App::uses('AppModel', 'Model');

class Apmonitor extends AppModel {
   //public $useDbConfig = 'remotedatasource';
   // var $specific = true;
    public $name = 'Apmonitor';
    public $useTable = 'ap_monitoring';
     public $validate = array(
          'mac_address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
              ),
          'Ip' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
              ),
          'location' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
              ),
     );
}
?>

