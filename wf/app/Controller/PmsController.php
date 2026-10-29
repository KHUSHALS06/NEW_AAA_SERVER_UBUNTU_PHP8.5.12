<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::import('Core', 'ConnectionManager');
class PmsController extends AppController {

    public $uses = array('Location', 'Pms', 'PmsCheckIn','Loginattempt');
    public $components = array('Paginator', 'RequestHandler');

    public function index() {
        
    }

    //remote server log
    public function logs() {

        if ($this->request->is('POST') && isset($this->request->data['pms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['pms']['locations_id']);
        }
        $domain = $this->Session->read('choosed_location_id');
        $pms = $this->Location->find('list', array('fields' => array('pms'),
            'conditions' => array('id' => $this->Session->read('choosed_location_id'))
        ));
        $location = $this->Location->find('list', array('fields' => array('router_address'),
            'conditions' => array('id' => $this->Session->read('choosed_location_id'))
        ));
        $locations = "localhost";//$location[$domain];
        // pr($locations);
        if (isset($this->request->data['Pms']['target'])) {
            if ($this->request->is('POST')) {
                $var = $this->request->data['Pms']['target'];
                $connection = ssh2_connect($locations, 22);
                if (ssh2_auth_password($connection, 'root', 'TechnoWN@2022')) {
                    //$msg = "Authentication Successful";
                    $stream = ssh2_exec($connection, 'ps -ef | grep  WifonicPmsInf');
                    stream_set_blocking($stream, true);
                    $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
                    $processInfo = stream_get_contents($stream_out);
                    $infoArray = explode("root", $processInfo);
                    $infoString = "";
                    foreach ($infoArray as $info) {
                        //echo $info;
                        //$this->set('info', $info);
                        if (strstr($info, "WifonicPmsInf.jar")) {
                            $infoString = $info;
                            break;
                        }
                    }
                    $expstring = explode(" ", $infoString);

                    $pid = "";
                    for ($i = 0; $i < count($expstring); $i++) {
                        if ($expstring[$i] != "") {
                            $pid = $expstring[$i];
                            // echo $pid . "-" . $i;
                            break;
                        }
                    }
                    $stream = ssh2_exec($connection, 'kill -9 ' . $pid);
                    $stream = ssh2_exec($connection, 'java -jar /usr/pms/WifonicPmsInf.jar');
                    $stream = ssh2_exec($connection, 'ps -ef | grep  WifonicPmsInf');
                    stream_set_blocking($stream, true);
                    $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
                    $processInfo = stream_get_contents($stream_out);
                    $infoArray = explode("root", $processInfo);
                    $infoString = "";
                    foreach ($infoArray as $info) {
                        //echo $info;
                        //$this->set('info', $info);
                       if (strstr($info, "WifonicPmsInf.jar")) {
                            $infoString = $info;
                            break;
                        }
                    }
                    $expstring = explode(" ", $infoString);
                    $pid = "";
                    for ($i = 0; $i < count($expstring); $i++) {
                        if ($expstring[$i] != "") {
                            $pid = $expstring[$i];
                            // echo $pid . "-" . $i;
                            break;
                        }
                    }
                    $this->Pms->create();
                    $time = date('Y-m-d H:i:s');
                    $user = $this->Auth->user('username');
                    // pr($user);
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $data = array('Pms' => array(
                            //'id' => 111,
                            'ip_address' => $ip,
                            'user' => $user,
                            'message' => 'Server restarted succesfully',
                            'created' => $time
                    ));
                    if ($this->Pms->save($data)) {

                        $this->Session->setFlash(__('Server Restarted'), 'flash_success');
                    } else {
                        $this->Session->setFlash(__('Could not restart'), 'flash_fail');
                    }
                }
            } else {
                $this->Session->setFlash(__('Could not restart'), 'flash_fail');
            }
        }
        $conditions = array();

//        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
//            $conditions[] = array('Pms.location_id' => $this->Session->read('choosed_location_id'));
//        } elseif (!$this->Session->check('choosed_location_id') || $this->Session->read('choosed_location_id') == '') {
//            $conditions[] = array('Pms.location_id' => $this->Session->read('locations_id'));
//            $this->Session->setFlash(__('To view Pms records, please select location first.'), 'flash_info');
//        }

        if (CakeSession::read('Auth.User.Group.name') != Configure::read('Application.wf_admin')) {
            $conditions[] = array('Pms.type' => 0);
        }
        $this->Pms->recursive = -1;
        $this->Paginator->settings = array(
            'limit' => Configure::read('Application.rowLimit'),
            'order' => array('Pms.id' => 'DESC'),
            'conditions' => $conditions,
        );
        $this->set('pms', $this->Paginator->paginate('Pms'));
    }

    public function checkin() {

        if ($this->request->is('POST') && isset($this->request->data['pms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['pms']['locations_id']);
        }
        $conditions = array();
        if (count($this->passedArgs) == 0) {
            if ($this->Session->check('search_conditions')) {
                $this->Session->delete('search_conditions');
            }

            if ($this->request->is('post') && isset($this->request->data['search']) && ($this->request->data['search'] != '') && ($this->request->data[$this->request->data['search']] != '')) {
                if ($this->request->data['search'] == '') {
                    $conditions[] = array('PmsCheckIn.' . $this->request->data['search'] => $this->request->data[$this->request->data['search']]);
                } else {
                    $conditions[] = array('PmsCheckIn.' . $this->request->data['search'] . ' LIKE' => '%' . trim($this->request->data[$this->request->data['search']]) . '%');
                }

                $this->Session->write('search_conditions', $conditions);
            }
        }
        if (!$this->Session->check('choosed_location_id') || $this->Session->read('choosed_location_id') == '') {
            $conditions[] = array('PmsCheckIn.location_id' => $this->Session->read('locations_list'));
            $this->Session->setFlash(__('To view Pms records, please select location first.'), 'flash_info');
        }
        if ($this->Session->check('search_conditions') && count($this->Session->read('search_conditions')) > 0) {
            //unset($conditions);
            $conditions[] = $this->Session->read('search_conditions');
        }
        $this->PmsCheckIn->recursive = 0;
        if (count($conditions) > 0) {
            $this->Paginator->settings = array(
                'limit' => Configure::read('Application.rowLimit'),
                'order' => array('PmsCheckIn.id' => 'ASC'),
                'conditions' => $conditions,
            );
        } else {
            $this->Paginator->settings = array(
                'limit' => Configure::read('Application.rowLimit'),
                'order' => array('PmsCheckIn.id' => 'ASC'),
            );
        }
        $this->set('checkin', $this->Paginator->paginate('PmsCheckIn'));
    }


        public function loginattempt() {
                $this->Session->write('link', 'loginattempt');
                if ($this->request->is('POST') && isset($this->request->data['pms']['locations_id'])) {
                        $this->Session->write('choosed_location_id', $this->request->data['pms']['locations_id']);
                }
                $conditions = array();
                if (count($this->passedArgs) == 0) {
                        if ($this->Session->check('search_conditions')) {
                                $this->Session->delete('search_conditions');
                        }

                        if ($this->request->is('post') && isset($this->request->data['search']) && ($this->request->data['search'] != '') && ($this->request->data[$this->request->data['search']] != '')) {
                                if ($this->request->data['search'] == '') {
                                        $conditions[] = array('Loginattempt.' . $this->request->data['search'] => $this->request->data[$this->request->data['search']]);
                                } else {
                                        $conditions[] = array('Loginattempt.' . $this->request->data['search'] . ' LIKE' => '%' . trim($this->request->data[$this->request->data['search']]) . '%');
                                }

                                $this->Session->write('search_conditions', $conditions);
                        }
                }
                if (!$this->Session->check('choosed_location_id') || $this->Session->read('choosed_location_id') == '') {
                        $conditions[] = array('Loginattempt.location_id' => $this->Session->read('locations_list'));
                        $this->Session->setFlash(__('To view Pms records, please select location first.'), 'flash_info');
                }
                if ($this->Session->check('search_conditions') && count($this->Session->read('search_conditions')) > 0) {
                        //unset($conditions);
                        $conditions[] = $this->Session->read('search_conditions');
                    }
   /*
                   $propertyId = array(284=>2,285=>12, 287=>3, 286=>1);
                   if($this->Session->read('choosed_location_id')!=''){
                   $conditions[] = array('PmsCheckIn.property_id' => $propertyId[$this->Session->read('choosed_location_id')]);
                   }
                 */
                $this->Loginattempt->recursive = 0;
                //      pr($conditions);
                if (count($conditions) > 1) {
                        $this->Paginator->settings = array(
                                        'limit' => Configure::read('Application.rowLimit'),
                                        'order' => array('Loginattempt.id' => 'DESC'),
                                        'conditions' => $conditions,
                                        );
                } else {
                        $this->Paginator->settings = array(
                                        'limit' => Configure::read('Application.rowLimit'),
                                        'conditions' => $conditions,
                                        'order' => array('Loginattempt.id' => 'DESC'),
                                        );
                }
                $this->set('checkin', $this->Paginator->paginate('Loginattempt'));
        }



}
