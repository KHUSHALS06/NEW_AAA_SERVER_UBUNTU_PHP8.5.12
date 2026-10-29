<?php

/** CheckInsController class
 * 
 * This class consists of methods for check-in(occupancy) of guests
 * 
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 * @author Preeti Joseph<preeti@wifonic.com>
 */
?>

<?php

class CheckInsController extends AppController {

    public $uses = array('CheckIn', 'LocationsUser', 'Room');
    public $helpers = array('Js'); //var $helpers = array('Js','Csv', 'xls', 'PhpExcel');
    public $components = array('Paginator', 'RequestHandler');

    /**
     * This is the default method for the CheckIns controller.
     * If a particular location is set then it fetches the checked-in guests details associated to that particular location.
     * 
     * @return void
     */
    public function index() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $conditions = array();
        if ($this->request->is('post') && isset($this->request->data['check_ins']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['check_ins']['locations_id']);
        }
	
	$this->_deleteCheckedOutGuest($this->Session->read('choosed_location_id'));
        # Search
        if ($this->request->is('post') && isset($this->request->data['search']) && $this->request->data['search'] != '' && $this->request->data[$this->request->data['search']] != '') {
            $condition[] = array('CheckIn.' . $this->request->data['search'] . ' LIKE' => '%' . trim($this->request->data[$this->request->data['search']]) . '%');
        }
        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
            $condition[] = array('CheckIn.location_id' => $this->Session->read('choosed_location_id'));
        } else {
            $condition[] = array('CheckIn.location_id' => $this->LocationsUser->find('list', array(
                    'fields' => array('LocationsUser.location_id'),
                    'conditions' => array('LocationsUser.user_id' => '')
            )));
        }

        $this->set('room_numbers', $this->Room->find('list', array(
                    'fields' => array('Room.room_no', 'Room.room_no'),
                    'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id'))
        )));

        $this->set('name_title', array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'));

        $this->Paginator->settings = array(
            'limit' => Configure::read('Application.rowLimit'), //Limit of records 
            'order' => array('CheckIn.last_name' => 'ASC'),
            'conditions' => $condition
        );
        $this->CheckIn->recursive = 0;
        $this->set('checkInDatas', $this->paginate('CheckIn'));
        $this->set('label', 'Occupancy');
        $this->set('breadcrumbLabel', 'Occupancy List');
        $this->Session->write('link', 'checkInList');
    }

    /**
     * Add the check-in details for a particular guest
     * 
     * @return void
     */
    public function add() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if (count($this->request->data) == 0 && $this->Session->read('choosed_location_id') == '') {
            $this->Session->setFlash(__('Please select a location first'), 'flash_fail');
            $this->redirect(array('action' => 'index'));
        }

        $this->Room->recursive = 1;
        $roomCheckinsDetails = $this->Room->find('all', array(
            'fields' => array('Room.id', 'Room.room_no'),
            'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id'),),
            'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
        ));
        $roomDetails = array();
        foreach ($roomCheckinsDetails as $key => $value) {
            if (count($value['CheckIn']) == 0) {
                $ky = $value['Room']['id'];
                $kyValue = $value['Room']['room_no'];
                $roomDetails[$ky] = $kyValue;
            }
        }
        //$roomDetails = $roomCheckinsDetails;
        if ($this->request->is('post') && isset($this->request->data['check_ins']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['check_ins']['locations_id']);
            if ($this->request->data['check_ins']['locations_id'] == '') {
                $this->Session->setFlash(__('Please select a location first'), 'flash_fail');
            }
        } else {
            if ($this->request->is('post') && count($this->request->data) > 0 && count($this->request->data['CheckIn']) > 3) {
//                $isValidRoom = $this->_isValidRoom($this->request->data['CheckIn']['room_no'], '');
//                if ($isValidRoom == 'no') {
//                    $this->Session->setFlash(__('Invalid Room' . $this->request->data['CheckIn']['room_no']), 'flash_fail');
//                    $this->redirect(array('action' => 'add'));
//                } else {
//                    $this->request->data['CheckIn']['room_id'] = $isValidRoom;
//                }
                $this->request->data['CheckIn']['room_id'] = $this->request->data['CheckIn']['room_no'];
                $this->request->data['CheckIn']['room_no'] = $roomDetails[$this->request->data['CheckIn']['room_no']];

                $this->request->data['CheckIn']['pin'] = rand(1000, 9999);
                if ($this->Session->read('choosed_location_id') != '') {
                    $this->request->data['CheckIn']['location_id'] = $this->Session->read('choosed_location_id');
                    if (array_key_exists('checkout_date', $this->request->data['CheckIn']) && $this->request->data['CheckIn']['checkout_date'] != '') {
                        $this->request->data['CheckIn']['checkout_date'] = date('Y-m-d', strtotime($this->request->data['CheckIn']['checkout_date']));
                    }
		$this->request->data['CheckIn']['last_name'] = trim($this->request->data['CheckIn']['last_name']);
                    $this->CheckIn->create();
                    if ($this->CheckIn->save($this->request->data)) {
                        $this->log("Guest or Room added", 'info');
                        $this->Session->setFlash(__('Guest successfully added to room no: ' . $this->request->data['CheckIn']['room_no']), 'flash_success');
                        if (isset($this->request->data['CheckIn']['calling_page']) && $this->request->data['CheckIn']['calling_page'] == 'rooms') {
                            $this->redirect(array('action' => 'rooms'));
                        } else {
                            $this->redirect(array('action' => 'index'));
                        }
                    }
                } else {
                    $this->Session->setFlash(__('Please select a location first'), 'flash_fail');
                }
            } else {
                if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') == '') {
                    $this->Session->setFlash(__('Please select a location first'), 'flash_fail');
                    $this->redirect(array('action' => 'index'));
                }
            }
            if (array_key_exists('CheckIn', $this->request->data) && array_key_exists('calling_page', $this->request->data['CheckIn']) && $this->request->data['CheckIn']['calling_page'] = 'rooms') {
                $this->set('calling_page', $this->request->data['CheckIn']['calling_page']);
            } else {
                $this->set('calling_page', '');
            }
        }
        //if(isset($this->Session->read('choosed_location_id'))){

        if (array_key_exists('CheckIn', $this->request->data) && array_key_exists('room_no', $this->request->data['CheckIn'])) {
            $this->set('choosen_room_id', $this->request->data['CheckIn']['room_id']);
            $this->Session->write('link', 'occupancy_management');
        } else {
            $this->Session->write('link', 'checkInList');
            $this->set('choosen_room_id', '');
        }

        $this->set('available_rooooms', $roomDetails);
        //}
        $this->set('label', 'Add Guest');
        $this->set('breadcrumbLabel', 'Add Guest');
    }

    /**
     * View the check-in details for a particular guest
     * 
     * @return void
     */
    public function view() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('POST') && count($this->request->data) > 0) {
            $checkInData = $this->CheckIn->findById($this->request->data['CheckIn']['id']);
            $this->set('checkInData', $checkInData);
        } else {
            $this->redirect(array('action' => 'index'));
        }
        $this->set('label', 'View Guest');
        $this->set('breadcrumbLabel', 'View Guest');
        $this->Session->write('link', 'viewGuest');
    }

    /**
     * Edit the check-in details for a particular guest
     * 
     * @return void
     */
    public function edit() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action'])) {
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
        }

//        $roomDetails = $this->Room->find('list', array(
//            'fields' => array('Room.id', 'Room.room_no'),
//            'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id'),),
//            'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
//        ));
        $this->Room->recursive = 1;
        $roomCheckinsDetails = $this->Room->find('all', array(
            'fields' => array('Room.id', 'Room.room_no'),
            'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id'),),
            'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
        ));
        $roomDetails = array();
        if (isset($this->request->data['CheckIn']['room_id'])) {
            $cky = $this->request->data['CheckIn']['room_id'];
            $ckyValue = $this->request->data['CheckIn']['room_no'];
            $roomDetails[$cky] = $ckyValue;
            //pr($roomDetails);
            $this->set('prv_room_no', $ckyValue);
            $this->set('prv_room_iid', $cky);
        }else{
            $cky = $this->request->data['CheckIn']['prv_room_iid'];
            $ckyValue = $this->request->data['CheckIn']['prv_room_no'];
            $roomDetails[$cky] = $ckyValue;
//            
            $this->set('prv_room_no', $ckyValue);
            $this->set('prv_room_iid', $cky);
        }


        foreach ($roomCheckinsDetails as $key => $value) {
            if (count($value['CheckIn']) == 0) {
                $ky = $value['Room']['id'];
                $kyValue = $value['Room']['room_no'];
                $roomDetails[$ky] = $kyValue;
            }
        }

//        pr($roomDetails);

        if ($this->request->is('post')) {
//            pr($this->request->data);
            if (count($this->request->data['CheckIn']) > 4) {
                if($this->request->data['CheckIn']['room_no'] == $this->request->data['CheckIn']['prv_room_iid']){
                    $this->request->data['CheckIn']['room_no'] = $this->request->data['CheckIn']['prv_room_no'];
                    $this->request->data['CheckIn']['room_id'] = $this->request->data['CheckIn']['prv_room_iid'];
                }else{
                    $this->request->data['CheckIn']['room_id'] = $this->request->data['CheckIn']['room_no'];
                    $this->request->data['CheckIn']['room_no'] = $roomDetails[$this->request->data['CheckIn']['room_no']];
                }
//                pr($this->request->data);
//                pr($this->request->data);
//                $isValidRoom = $this->_isValidRoom($this->request->data['CheckIn']['room_no'], $this->request->data['CheckIn']['id']);
//                if ($isValidRoom == 'no') {
//                    $this->Session->setFlash(__('Invalid Room' . $this->request->data['CheckIn']['room_no']), 'flash_fail');
//                    $checkInData = $this->CheckIn->findById($this->request->data['CheckIn']['id']);
//                    $this->set('checkInData', $checkInData); //$this->redirect(array('action' => 'edit'));
//                } else {
//                $this->request->data['CheckIn']['room_id'] = $isValidRoom;
//                $this->request->data['CheckIn']['room_id'] = $this->request->data['CheckIn']['room_no'];
//                $this->request->data['CheckIn']['room_no'] = $roomDetails[$this->request->data['CheckIn']['room_no']];
                if (array_key_exists('checkout_date', $this->request->data['CheckIn']) && $this->request->data['CheckIn']['checkout_date'] != '') {
                    $this->request->data['CheckIn']['checkout_date'] = date('Y-m-d', strtotime($this->request->data['CheckIn']['checkout_date']));
                }
                if ($this->CheckIn->save($this->request->data)) {
                    $this->log("Guest: " . $this->request->data['CheckIn']['title'] . "." . $this->request->data['CheckIn']['last_name'] . " with check-in ID: " . $this->request->data['CheckIn']['id'] . " in Room No." . $this->request->data['CheckIn']['room_no'] . " updated", 'info');
                    $this->Session->setFlash(__('Guest <strong>' . $this->request->data['CheckIn']['title'] . "." . $this->request->data['CheckIn']['last_name'] . '</strong> updated successfully'), 'flash_success');
                    if ($this->request->data['CheckIn']['calling_page'] == 'rooms') {
                        return $this->redirect(array('action' => 'rooms'));
                    } else {
                        return $this->redirect(array('action' => 'index'));
                    }
                } else {
                    $this->Session->setFlash(__('The guest details could not be saved. Please, try again.'));
                }
                $checkInData = $this->CheckIn->findById($this->request->data['CheckIn']['id']);

                $this->set('checkInData', $checkInData);
//                }
            } else {
                $checkInData = $this->CheckIn->findById($this->request->data['CheckIn']['id']);
                $this->set('checkInData', $checkInData);
            }

//            $availableRooms = $this->Room->find('list', array(
//                'fields' => array('Room.room_no', 'Room.room_no'),
//                'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id'), 'NOT' => array(
//                        'Room.room_no' => $this->CheckIn->find('list', array(
//                            'fields' => array('CheckIn.room_id', 'CheckIn.room_no'),
//                            'conditions' => array('CheckIn.location_id' => $this->Session->read('choosed_location_id'))
//                        )))),
//                'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
//            ));
//            if (array_key_exists('CheckIn', $this->request->data) && array_key_exists('room_no', $this->request->data['CheckIn'])) {
//                //pr($this->request->data);
//                $this->set('choosen_room_id', $this->request->data['CheckIn']['room_no']);
//                $availableRooms[$this->request->data['CheckIn']['room_no']] = $this->request->data['CheckIn']['room_no'];
//            } else {
//                // $this->set('choosen_room_id', '');
//            }
//            pr($this->request->data);

//            pr($roomDetails);
            $this->set('choosen_room_id', $this->request->data['CheckIn']['room_id']);
            $this->set('available_rooooms', $roomDetails);
            $this->set('label', 'Edit Guest');
            $this->set('breadcrumbLabel', 'Edit Guest');
            if ($this->request->data['CheckIn']['calling_page'] == 'rooms') {
                $this->Session->write('link', 'occupancy_management');
            } else {
                $this->Session->write('link', 'index');
            }
            $this->set('calling_page', $this->request->data['CheckIn']['calling_page']);
//            $this->set('label', 'Edit Guest');
//            $this->set('breadcrumbLabel', 'Edit Guest');
//            $this->Session->write('link', 'editGuest');
        } else {
            return $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Inline edit the room number of the user
     *
     * @return void
     */
    public function update_room_no() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pr($data);
            $this->CheckIn->read(null, $data['pk']);
            if ($this->CheckIn->validates(array('fieldList' => array('room_no')))) {
                if ($this->CheckIn->saveField($data['name'], $data['value'])) {
                    $this->CheckIn->set($data['name'], $data['value']);
                    $this->log("Room number updated, ID =" . $data['pk'] . ' ' . $data['name'] . ' ' . $data['value'], 'info');
                }
            } else {
                //$errors = $this->User->validationErrors;
            }
        }
    }

    /**
     * Inline edit the title of the user
     *
     * @return void
     */
    public function update_title() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->CheckIn->read(null, $data['pk']);

            if ($this->CheckIn->validates(array('fieldList' => array('title')))) {
                if ($this->CheckIn->saveField($data['name'], $data['value'])) {
                    $this->CheckIn->set($data['name'], $data['value']);
                    $this->log("Guest title updated, ID =" . $data['pk'], 'info');
                }
            } else {
                //$errors = $this->User->validationErrors;
            }
        }
    }

    /**
     * Inline edit the guest name of the user
     *
     * @return void
     */
    public function update_name() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pr($data);
            $this->CheckIn->read(null, $data['pk']);

            if ($this->CheckIn->validates(array('fieldList' => array('name')))) {
                if ($this->CheckIn->saveField($data['name'], $data['value'])) {
                    $this->CheckIn->set($data['name'], $data['value']);
                    $this->log("Guest First Name updated, ID =" . $data['pk'], 'info');
                }
            } else {
                //$errors = $this->User->validationErrors;
            }
        }
    }

    /**
     * Inline edit the middle name of the user
     *
     * @return void
     */
    public function update_middle_name() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->CheckIn->read(null, $data['pk']);

            if ($this->CheckIn->validates(array('fieldList' => array('middle_name')))) {
                if ($this->CheckIn->saveField($data['name'], $data['value'])) {
                    $this->CheckIn->set($data['name'], $data['value']);
                    $this->log("Guest Middle Name updated, ID =" . $data['pk'], 'info');
                }
            } else {
                //$errors = $this->User->validationErrors;
            }
        }
    }

    /**
     * Inline edit the last name of the user
     *
     * @return void
     */
    public function update_last_name() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->CheckIn->read(null, $data['pk']);

            if ($this->CheckIn->validates(array('fieldList' => array('middle_name')))) {
                try {
                    if ($this->CheckIn->saveField($data['name'], $data['value'])) {
                        $this->CheckIn->set($data['name'], $data['value']);
                        $this->log("Guest Middle Name updated, ID =" . $data['pk'], 'info');
                    }
                } catch (Exception $e) {
                    
                }
            } else {
                //$errors = $this->User->validationErrors;
            }
        }
    }

    /**
     * Delete the user
     *
     * @return void
     */
    public function delete() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('POST') && $this->request->data['CheckIn']['id'] != '') {
            if ($this->CheckIn->delete($this->request->data['CheckIn']['id'])) {
                $this->log("Guest deleted, ID =" . $data['pk'], 'info');
                $this->Session->setFlash(__('Guest <strong>' . $this->request->data['CheckIn']['last_name'] . '</strong> in room no. <strong>' . $this->request->data['CheckIn']['room_no'] . '</strong> deleted successfully.'), 'flash_success');
                if (array_key_exists('calling_page', $this->request->data['CheckIn']) && $this->request->data['CheckIn']['calling_page'] == 'rooms') {
                    $this->redirect(array('action' => 'rooms'));
                }
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function rooms() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
	
	//$this->redirect(array('controller' => 'check_ins', 'action' => 'index'));

        $this->_deleteCheckedOutGuest($this->Session->read('choosed_location_id'));
        $this->Session->write('link', 'occupancy_management');
        if ($this->request->is('post') && isset($this->request->data['check_ins']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['check_ins']['locations_id']);
        }

        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
            $roomDetails = $this->Room->find('all', array(
               // 'fields' => array('Room.id', 'Room.location_id', 'Room.floor',  'Room.room_no'),
                'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id')),
                'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
            ));
            if (count($roomDetails) > 0) {
                $this->set('room_details', $roomDetails);
            } else {
                $this->set('room_details', '');
                $this->Session->setFlash(__('No rooms. First you need to add some rooms. For that go to room management and add room.'), 'flash_info');
                //$this->redirect(array('action'=>'add_rooms'));
            }
        } else {
            $this->set('room_details', '');
            $this->Session->setFlash(__('Please select a location first!'), 'flash_info');
        }

        //$this->set('occupancy_details', $ocupaidRooms);
    }

    public function add_rooms() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $this->Session->write('link', 'room_management');
        if ($this->request->is('post') && isset($this->request->data['check_ins']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['check_ins']['locations_id']);
        } else if ($this->request->is('post') && array_key_exists('room', $this->request->data['CheckIn'])) {
            $data = array();
            $data = explode(',', $this->request->data['CheckIn']['room']);
            $duplicateRoomList = '';
            if (count($data) > 0 && $data != '') {
                foreach ($data as $value) {
                    if ($value != '') {
                        $roomdata = array();
                        $roomdata['Room']['room_no'] = trim($value);
                        $roomdata['Room']['location_id'] = $this->Session->read('choosed_location_id');
                        try {
                            $this->Room->create();
                            if ($this->Room->save($roomdata)) {
                                $this->log("Rooms added", 'info');
                                $this->Session->setFlash(__('Rooms added successfully'), 'flash_success');
                            }
                            $this->Room->create();
                        } catch (Exception $exc) {
                            //$this->Session->setFlash(__('Duplicate entry ditected "' . $value . '"'), 'flash_fail');
                            //break;
                        }
                    }
                }
            }
            //$this->redirect(array('action' => 'room_manage_list'));
        }
        $this->Room->recursive = -1;
        $roomlist = $this->Room->find('all', array(
            'fields' => array('room_no'),
            'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id')),
            'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
        ));
        $roomListString = '';
        if (count($roomlist) > 0 && $roomlist != '') {
            foreach ($roomlist as $key => $value) {
                $roomListString = $roomListString . $value['Room']['room_no'] . ', ';
            }
        }
        $this->set('room_list', $roomListString);
        if (!$this->Session->check('choosed_location_id') || $this->Session->read('choosed_location_id') == '') {
            $this->Session->setFlash(__('Please select a location first!'), 'flash_info');
            $this->redirect(array('action' => 'room_manage_list'));
        }
    }

    public function room_manage_list() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        //$this->rooms();
        $this->Session->write('link', 'room_management');
        if ($this->request->is('post') && isset($this->request->data['check_ins']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['check_ins']['locations_id']);
        }
        $roomDetails = $this->Room->find('all', array(
            //'fields' => array('id', 'location_id', 'floor',  'room'),
            'conditions' => array('Room.location_id' => $this->Session->read('choosed_location_id')),
            'order' => array('convert (`Room`.`room_no`,decimal)' => 'ASC')
        ));
        $this->set('room_details', $roomDetails);
    }

    public function room_manage_edit() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
    }

    public function room_manage_delete() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        //pr($this->request->data);
        if ($this->request->is('POST') && $this->request->data['CheckIn']['id'] != '') {
            //$data['Room'] = $this->request->data['CheckIn'];
            //pr($data);
            if ($this->Room->delete($this->request->data['CheckIn']['id'])) {
                $this->log("Room deleted :" . $this->request->data['CheckIn']['room_no'], 'info');
                $this->Session->setFlash(__('Room <strong>' . $this->request->data['CheckIn']['room_no'] . '</strong> deleted successfully.'), 'flash_success');
                //if ($this->request->data['CheckIn']['calling_page'] == 'rooms') {
                //$this->redirect(array('action' => 'rooms'));
                //}
                $this->redirect(array('action' => 'room_manage_list'));
            }
        }
    }

    private function _isValidRoom($newRoomNo, $occupancyId = null) {

        //pr($newRoomNo);
        //pr($occupancyId);
        $roomData = array();
        if ($occupancyId == '') {
            $this->Room->recursive = 0;
            $roomData = $this->Room->find('all', array(
                'fields' => array('CheckIn.id', 'Room.id', 'Room.room_no'),
                'conditions' => array('Room.room_no' => $newRoomNo, 'Room.location_id' => $this->Session->read('choosed_location_id')),
            ));
            if (array_key_exists('0', $roomData) && $roomData['0']['Room']['room_no'] == $newRoomNo) {
                if ($roomData['0']['CheckIn']['id'] == '') {
                    return $roomData['0']['Room']['id'];
                } else {
                    return 'no';
                }
            } else {
                return 'no';
            }
        } else {
            $this->Room->recursive = 0;
            $roomData = $this->Room->find('all', array(
                'fields' => array('Room.id', 'Room.room_no', 'CheckIn.id'),
                'conditions' => array('Room.room_no' => $newRoomNo, 'Room.location_id' => $this->Session->read('choosed_location_id')),
            ));
            //pr($roomData);
            if (array_key_exists('0', $roomData)) {
                if ($roomData['0']['CheckIn']['id'] == $occupancyId && $roomData['0']['Room']['room_no'] == $newRoomNo) {
                    return $roomData['0']['Room']['id'];
                } else if ($roomData['0']['CheckIn']['id'] == '') {
                    return $roomData['0']['Room']['id'];
                } else {
                    return $roomData['0']['Room']['id'];
                    //return 'no';
                }
            } else {
                //return $roomData['0']['Room']['id'];
                return 'no';
            }
        }
    }

/*
    private function _deleteCheckedOutGuest($locationId) {
        //pr($locationId);
        //pr($this->CheckIn->find("all"));
        $this->CheckIn->deleteAll(
                array(
                    "CheckIn.location_id" => $locationId,
                    "CheckIn.checkout_date <" => date("Y-m-d H:i", strtotime("-12 hours"))
                )
        );
    }
*/

	private function _deleteCheckedOutGuest($locationId) {
        	$checkinArray = $this->Session->read('checkincycle');
       		$checkincycle = $checkinArray[$this->Session->read('choosed_location_id')];
        	if ($checkincycle == 24) {
           		$checkinsdates = $this->CheckIn->find('list', array(
               		'fields' => array('CheckIn.created'),
	                'conditions' => array('CheckIn.location_id' => $locationId, 'CheckIn.checkout_date' => date('Y-m-d'))
          	  	));
	            foreach ($checkinsdates as $value) {
        		$ckouttime = explode(" ", $value);
	                $ckouttime = explode(":", $ckouttime[1]);
        	        $ckmin = $ckouttime[0] * 60 + $ckouttime[1];
                	$this->CheckIn->deleteAll(
                        array(
                            "CheckIn.location_id" => $locationId,
                            "CheckIn.checkout_date <" => date("Y-m-d H:i", strtotime("-" . $ckmin . " mins "))
                        ));
            		}
        	} else {
	            $this->CheckIn->deleteAll(
                    array(
                        "CheckIn.location_id" => $locationId,
                        "CheckIn.checkout_date <" => date("Y-m-d H:i", strtotime("-12 hours"))
                    ));
        	}
    	}


    public function afterFilter() {
       	parent::afterFilter();
	$tmpbpl = $this->Session->read('locations_business_plan_list');
        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
            if ($tmpbpl[$this->Session->read('choosed_location_id')] != 'gold') {
                $this->redirect(array('controller' => 'PermissionErrors', 'action' => 'index'));
            }
        }else{
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

}

