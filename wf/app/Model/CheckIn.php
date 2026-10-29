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
class CheckIn extends AppModel{
    public $belongsTo = array(
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id',
            'conditions' => '',
            'fields' => array('id', 'location_name'),
            'order' => ''
        ),
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'room_id',
            //'conditions' => '',
            //'fields' => array('id', 'location_name'),
            //'order' => ''
        )
        /*
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'room_id',
            'conditions' => '',
            'order' => ''
        )
         * 
         */
    );
}
