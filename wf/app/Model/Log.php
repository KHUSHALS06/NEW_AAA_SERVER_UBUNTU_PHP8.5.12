<?php

/*
 *  @copyright     Copyright (c) WiFonic Tech. Pvt. Ltd. (http://www.wifonic.com)
 *  @link          http://admin.wifonic.net
 *  @package
 *  @since
 */

/**
 * Description of Log
 *
 * @author Nachiketa Rajpurohit <nachiketa@wifonic.com>
 */
App::uses('CakeSession', 'Model/Datasource');

class Log extends AppModel{
   
    function beforeSave($options = array()) {
        parent::beforeSave($options);
        
        if(empty($this->data['Log']['id'])) {    
            $this->data['Log']['url'] = Router::url('', true);
            $this->data['Log']['ip'] = ip2long($_SERVER['REMOTE_ADDR']);
            $this->data['Log']['user_agent']=$_SERVER['HTTP_USER_AGENT'];
            $this->data['Log']['user'] = CakeSession::read('Auth.User.username');         
        }
    }
    
}
