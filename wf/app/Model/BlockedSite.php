<?php 


App::uses('AppModel', 'Model');

class BlockedSite extends AppModel {
   //public $useDbConfig = 'remotedatasource';
    //var $specific = true;
    public $name = 'BlockedSite';
    public $useTable = 'blocked_sites';

}
?>
