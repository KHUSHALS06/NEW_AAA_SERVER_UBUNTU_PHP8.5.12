<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @copyright     Copyright 2013-2014, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhaya@wifonicnetworks.com>
 * @author Supriya<supriya@wifonicnetworks.com>
 */
?>
<?php

class NasManagementsController extends AppController {

    public $uses = array('Location', 'User', 'Group', 'Nas');
    public $components = array('Paginator', 'RequestHandler');
    public $paginate = array(
        'limit' => 1,
        'contain' => array('index')
    );

    public function index() {
if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
/*
        if ($this->request->is('POST') && isset($this->request->data['nas_managements']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['nas_managements']['locations_id']);
        }
        $conditions = array();
        if (count($this->passedArgs) == 0) {
            if ($this->Session->check('search_conditions')) {
                $this->Session->delete('search_conditions');
            }

            if ($this->request->is('post') && isset($this->request->data['search']) && ($this->request->data['search'] != '') && ($this->request->data[$this->request->data['search']] != '')) {
                if ($this->request->data['search'] == '') {
                    $conditions[] = array('Nas.' . $this->request->data['search'] => $this->request->data[$this->request->data['search']]);
                } else {
                    $conditions[] = array('Nas.' . $this->request->data['search'] . ' LIKE' => '%' . trim($this->request->data[$this->request->data['search']]) . '%');
                }

                $this->Session->write('search_conditions', $conditions);
            }
        }
        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
            $conditions[] = array('Nas.location_id' => $this->Session->read('choosed_location_id'));
        }

        if ($this->Session->check('search_conditions') && count($this->Session->read('search_conditions')) > 0) {
            //unset($conditions);
            $conditions[] = $this->Session->read('search_conditions');
        }
        $this->Nas->recursive = 0;
        if (count($conditions) > 0) {
            $this->Paginator->settings = array(
                'limit' => Configure::read('Application.rowLimit'),
                'order' => array('Nas.shortname' => 'ASC'),
                'conditions' => $conditions,
            );
        } else {
           $this->Paginator->settings = array(
               'limit' => Configure::read('Application.rowLimit'),
                'order' => array('Nas.shortname' => 'ASC'),
            ); 
        }
        $this->set('nas', $this->Paginator->paginate('Nas'));
*/
if ($this->request->is('POST') && isset($this->request->data['nas_managements']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['nas_managements']['locations_id']);
        }
        $conditions = array();
        if (count($this->passedArgs) == 0) {
            if ($this->Session->check('search_conditions')) {
                $this->Session->delete('search_conditions');
            }

            if ($this->request->is('post') && isset($this->request->data['search']) && ($this->request->data['search'] != '') && ($this->request->data[$this->request->data['search']] != '')) {
                if ($this->request->data['search'] == '') {
                    $conditions[] = array('Nas.' . $this->request->data['search'] => $this->request->data[$this->request->data['search']]);
                } else {
                    $conditions[] = array('Nas.' . $this->request->data['search'] . ' LIKE' => '%' . trim($this->request->data[$this->request->data['search']]) . '%');
                }

                $this->Session->write('search_conditions', $conditions);
            }
        }
        if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
            $conditions[] = array('Nas.location_id' => $this->Session->read('choosed_location_id'));
        }

        if ($this->Session->check('search_conditions') && count($this->Session->read('search_conditions')) > 0) {
            //unset($conditions);
            $conditions[] = $this->Session->read('search_conditions');
        }

        $this->Nas->recursive = 0;
        if (count($conditions) > 0) { 
            $this->Paginator->settings = array(
                'limit' => Configure::read('Application.rowLimit'),
                'order' => array('Nas.shortname' => 'ASC'),
                'conditions' => $conditions,
            );
               $nas = $this->Paginator->paginate('Nas');
            $pingresult = array();
            foreach ($nas as $value) {
                $ip = $value['Nas']['nasname'];
                $pingresult[$ip] = exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($ip)), $res, $rval);
            }
              $this->set('pings', $pingresult); 
               $this->set('nas', $nas);
        } else {
            $this->Paginator->settings = array(
                'limit' => 200, //Configure::read('Application.rowLimit'),
                'order' => array('Nas.shortname' => 'ASC'),
            );
        }   
          $nas = $this->Paginator->paginate('Nas');
        $this->set('nas', $nas);
    }


/************* ADD record *************************/
public function add() {
if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));


        $this->loadmodel('Nas');
        //  $locationdomain = $this->Location->find('list', array('fields' => array('location_id', 'location_name')));
        $locationdomain = $this->Session->read('locations_list');
        $this->set('locationdomain', $locationdomain);
        if ($this->request->is('Post')) {
            $this->Nas->create();
            //unset($this->request->data['Nas']['server']);
            $quest = $this->request->data;
            //pr($quest);
            if ($this->Nas->save($quest)) {
                $this->Session->setFlash(__('post added'), 'flash_success');
            }else{
                 $this->Session->setFlash(__('post cudnt add, enter valid nasname'), 'flash_fail');
            }
            $this->redirect(array('action' => 'index'));
        }
    }
/************* view record *************************/
public function view() {
if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $this->loadmodel('Nas');
        if ($this->request->is('post')) {
            if ($this->request->data['NasManagements']['id']) {

                $options = array('conditions' => array('Nas.' . $this->Nas->primaryKey => $this->request->data['NasManagements']['id']));
                $this->set('nas', $this->Nas->find('first', $options));
                //$data =  $this->Nas->find('first',array('conditions'=>array($this->request->data['Nas']['nasname'])));
                // $this->set('nas',$data);
                //$this->session->write($nas,$data);
            } else {
//            $this->set('nas', '');
                //$this->redirect(array('action' => 'index'));
            }
        }
    }
/************* EDIT record *************************/
public function edit() {

if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));


        if ($this->request->is('post')) {
            if (isset($this->request->data['NasManagement']['target'])) {
                $var = $this->request->data['NasManagement']['target'];
                //pr($var);
            } else {
                $this->Nas->id = $this->request->data['NasManagement']['id'];
                $id = $this->Nas->id;
                $nasname = $this->request->data['NasManagement']['nasname'];
                $community = $this->request->data['NasManagement']['community'];
                $description = $this->request->data['NasManagement']['description'];
                $quest['Nas'] = array('nasname' => "'$nasname'",
                    'community' => "'$community'",
                    'description' => "'$description'"
                );
                if ($this->Nas->updateAll($quest['Nas'], array('Nas.id' => $id))) {
                    $this->Session->setFlash(__('Record updated'), 'flash_success');
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
    }
/************* DELETE record *************************/
public function delete() {
if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
        if ($this->request->is('post')) {
            $this->Nas->id = $this->request->data['NasManagements']['id'];
            $id = $this->Nas->id;
            $data = $this->Nas->delete($id);
            // $this->set('data',$data);
            $this->Session->setFlash(__('record deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
            
        }
    }

}

