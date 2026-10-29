<?php

/*
 *  @copyright     Copyright (c) WiFonic Tech. Pvt. Ltd. (http://www.wifonic.com)
 *  @link          http://admin.wifonic.net
 *  @package
 *  @since
 */

/**
 * Description of DatabaseLog
 *
 * @author Nachiketa Rajpurohit <nachiketa@wifonic.com>
 */

App::uses('BaseLog', 'Log/Engine');

class DatabaseLog extends BaseLog{
    public function __construct($options = array()) {
       parent::__construct($options);
        App::import('Model', 'Log');
        $this->Log = new Log;        
    }

    public function write($type, $message) {
        $log['type'] = ucfirst($type);
        $log['timestamp'] = date('Y-m-d H:i:s');
        $log['message'] = $message;
        
        $this->Log->create();
        return $this->Log->save($log);        
    }
}
