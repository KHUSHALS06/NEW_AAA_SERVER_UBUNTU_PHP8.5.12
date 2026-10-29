<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRMsController
 *
 * @author dev3
 */
App::uses('CakeEmail', 'Network/Email');

class CRMsController extends AppController {

    public $uses = array('Location', 'RegisteredUser', 'SentMail', 'SentMessage');
    public $helpers = array('Js'); //var $helpers = array('Js','Csv', 'xls', 'PhpExcel');
    public $components = array('Paginator', 'RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
    }

    public function index() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $this->redirect(array('action' => 'emails'));
    }

    public function emails() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post') && isset($this->request->data['c_r_ms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['c_r_ms']['locations_id']);
        }

        $this->Session->write('link', 'emails');
        $hiddenEmailAddress = array();

        if (in_array($this->Auth->user('Group.name'), Configure::read('Application.wifonicGroups')) && $this->Session->read('choosed_location_id') == '') {
            $this->Location->recursive = -1;
            $emails = $this->Location->find('all', array(
                'fields' => array('DISTINCT email', 'contact_persons1'),
                'conditions' => array('email !=' => '')
            ));
            $emailAddress = array();
            foreach ($emails as $email) {
                $key = $email['Location']['email'];
                $value = $email['Location']['contact_persons1'];
                if ($value != '') {
                    $emailAddress[$key] = $key . '(' . $value . ')';
                } else {
                    $emailAddress[$key] = $key;
                }
                $hiddenEmailAddress[$key] = $key;
            }
        } else {
            $this->RegisteredUser->recursive = -1;
            $emails = $this->RegisteredUser->find('all', array(
                'fields' => array('DISTINCT email', 'name'),
                'conditions' => array('RegisteredUser.email !=' => '', 'RegisteredUser.location_id' => $this->Session->read('choosed_location_id'))
            ));
            $emailAddress = array();
            foreach ($emails as $email) {
                $key = $email['RegisteredUser']['email'];
                $value = $email['RegisteredUser']['name'];
                if ($value != '') {
                    $emailAddress[$key] = $key . '(' . $value . ')';
                } else {
                    $emailAddress[$key] = $key;
                }
                $hiddenEmailAddress[$key] = $key;
            }
        }
        if ($this->request->is('post') && !isset($this->request->data['c_r_ms']['locations_id'])) {
            $to = '';
            if (count($this->request->data['CRM']['to']) == 1 && $this->request->data['CRM']['to']['0'] == 'all') {
                $to = $this->request->data['CRM']['toAll'];
            } else {
                //unset($this->request->data['CRM']['to']['0']);
                if ($this->request->data['CRM']['to']['0'] == 'all') {
                    array_splice($this->request->data['CRM']['to'], 0, 1);
                }
                $to = $this->request->data['CRM']['to'];
            }
            $sent = $this->_sendEmail($to, $this->request->data['CRM']['subject'], $this->request->data['CRM']['message'], $this->Session->read('choosed_location_id'));
            if ($sent == 'sent') {
                $this->log("Email sent", 'info');
                $this->Session->setFlash(__('Email sent'), 'flash_success');
                $this->redirect(array('action' => 'emails'));
            } else {
                $this->Session->setFlash(__('Error while sending mail. Please try again'), 'flash_fail');
            }
        }
        $this->set('emailAddress', $emailAddress);
        $this->set('hiddenEmailAddress', $hiddenEmailAddress);

        if (array_key_exists('CRM', $this->request->data) && $this->request->data['CRM']['to'] != '') {
            $this->set('to', $this->request->data['CRM']['to']);
        } else {
            $this->set('to', '');
        }
        $this->set('smtpData', $this->Location->find('first', array(
                    'fields' => array('id', 'smtp_from', 'smtp_host', 'smtp_port', 'smtp_user', 'smtp_pass'),
                    'conditions' => array('Location.id' => $this->Session->read('choosed_location_id'))
        )));
    }

    public function smss() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        if ($this->request->is('post') && isset($this->request->data['c_r_ms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['c_r_ms']['locations_id']);
        }

        $this->Session->write('link', 'smss');
        $hiddenPhoneList = array();
        if (in_array($this->Auth->user('Group.name'), Configure::read('Application.wifonicGroups')) && $this->Session->read('choosed_location_id') == '') {

            $this->Location->recursive = -1;
            $phoneDetails = $this->Location->find('all', array(
                'fields' => array('DISTINCT contact_person_mob1', 'contact_persons1',),
                'conditions' => array('contact_person_mob1 !=' => '')
            ));
            $phoneList = array();
            foreach ($phoneDetails as $phone) {
                $key = $phone['Location']['contact_person_mob1'];
                $value = $phone['Location']['contact_persons1'];
                if ($value != '') {
                    $phoneList[$key] = $key . '(' . $value . ')';
                } else {
                    $phoneList[$key] = $key . '(' . $value . ')';
                }
                $hiddenPhoneList[$key] = $key;
            }
        } else {
            $this->Location->recursive = -1;
            $phoneDetails = $this->RegisteredUser->find('all', array(
                'fields' => array('name', 'contact_no', 'country_code'),
                'conditions' => array('contact_no !=' => '', 'RegisteredUser.location_id' => $this->Session->read('choosed_location_id'))
            ));
            $phoneList = array();
            foreach ($phoneDetails as $phone) {
                $key = '+' . $phone['RegisteredUser']['country_code'] . $phone['RegisteredUser']['contact_no'];
                $value = $phone['RegisteredUser']['name'];
                if ($value != '') {
                    $phoneList[$key] = $key . '(' . $value . ')';
                } else {
                    $phoneList[$key] = $key;
                }
                $hiddenPhoneList[$key] = $key;
            }
        }
        $this->set('phoneDetails', $phoneList);
        $this->set('hiddenPhoneList', $hiddenPhoneList);

        $this->set('smsGateWay', $this->Location->find('first', array(
                    'fields' => array('id', 'sms_gateway', 'sms_gateway_auth_key', 'sms_gateway_user', 'sms_gateway_pass', 'sms_gateway_senderid', 'sms_gateway_template'),
                    'conditions' => array('Location.id' => $this->Session->read('choosed_location_id'))
        )));
        if ($this->request->is('post')) {
            //send sms
            //$this->log("Billing Plan added", 'info');
        }
    }

    public function registeredUsers() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
           $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $this->Session->write('link', 'registered_users');
        if ($this->request->is('post') && isset($this->request->data['c_r_ms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['c_r_ms']['locations_id']);
        }
        $condition = array('location_id' => $this->Session->read('choosed_location_id'));
        $this->Paginator->settings = array(
            //'fields' => array('id', 'location_id', 'first_name', 'last_name', 'dob', 'email', 'phone'),
            'conditions' => $condition, //For facing the users undr the loged in user.
            'limit' => Configure::read('Application.rowLimit'), //Limit of records 
        );
        $this->RegisteredUser->recursive = -1;
        $this->set('registeredUsers', $this->paginate('RegisteredUser'));
    }

    public function emailLog() {
        if ($this->request->is('post') && isset($this->request->data['c_r_ms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['c_r_ms']['locations_id']);
        }
        if (in_array($this->Auth->user('Group.name'), Configure::read('Application.wifonicGroups')) && $this->Session->read('choosed_location_id') == '') {
            $conditions = array('SentMail.location_id' => '0');
        } else {
            $conditions = array('SentMail.location_id' => $this->Session->read('choosed_location_id'));
        }

        $this->Paginator->settings = array(
            'fields' => array('id', 'created', 'subject', 'location_id'),
            'limit' => Configure::read('Application.rowLimit'),
            'conditions' => $conditions,
            'order' => array('created' => 'DESC')
        );
        $this->SentMail->recursive = -1;
        $this->set('emails', $this->Paginator->paginate('SentMail'));
    }

    public function viewEmail() {
        if ($this->request->is('post')) {
            $this->set('emailDetails', $this->SentMail->find('first', array(
                        'conditions' => array('id' => $this->request->data['CRM']['id'])
            )));
        }
    }

    public function smsLog() {
        if ($this->request->is('post') && isset($this->request->data['c_r_ms']['locations_id'])) {
            $this->Session->write('choosed_location_id', $this->request->data['c_r_ms']['locations_id']);
        }
        $this->Paginator->settings = array(
            'limit' => Configure::read('Application.rowLimit'),
            'conditions' => array('SentMessage.location_id' => $this->Session->read('choosed_location_id')),
            'order' => array('created' => 'DESC')
        );
        $this->SentMessage->recursive = -1;
        $this->set('messages', $this->Paginator->paginate('SentMessage'));
    }

    public function view_user() {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

        $this->set('calling_action', '');
        if ($this->request->is('post')) {

            if (!$this->RegisteredUser->exists($this->request->data['CRM']['id'])) {
                throw new NotFoundException(__('Invalid billing plan'));
            }
            $options = array('conditions' => array('RegisteredUser.' . $this->RegisteredUser->primaryKey => $this->request->data['CRM']['id']));
            $this->set('registeredUser', $this->RegisteredUser->find('first', $options));
            if (isset($this->request->data['CRM']['calling_action'])) {
                $this->set('calling_action', $this->request->data['CRM']['calling_action']);
            }
        } else {
            $this->redirect(array('action' => 'registeredUser'));
        }
    }

    public function setSmtp() {
        if ($this->request->is('POST')) {
            $smtpData['Location'] = $this->request->data['CRM'];
            $smtpData['Location']['id'] = $this->Session->read('choosed_location_id');
            if ($this->Location->save($smtpData)) {
                $this->Session->setFlash(__('SMTP Configured successfuly'), 'flash_success');
                $this->redirect(array('action' => 'emails'));
            }
            $this->Session->setFlash(__('Error'), 'flash_fail');
            $this->redirect(array('action' => 'emails'));
        }
    }

    public function setSmsGetway() {
        if ($this->request->is('POST')) {
            $smsGatewayData['Location'] = $this->request->data['CRM'];
            $smsGatewayData['Location']['id'] = $this->Session->read('choosed_location_id');
            if ($this->Location->save($smsGatewayData)) {
                //pr($smtpData);
            }
        }
    }

    private function _sendEmail($to = null, $subject = null, $message = null, $locationId = null) {
        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
        //$this->set('sm', 'sending email');
        $from = '';
        try {
            $email = new CakeEmail('smtp');
            if (in_array($this->Auth->user('Group.name'), Configure::read('Application.clientGroups'))) {
                $this->Location->recursive = -1;
                $smtpData = $this->Location->find('first', array(
                    'fields' => array('id', 'smtp_from', 'smtp_host', 'smtp_port', 'smtp_user', 'smtp_pass'),
                    'conditions' => array('id' => $locationId)
                )); //Get smpt details ?? [smtp_from] => 
                if (count($smtpData) > 0 && $smtpData['Location']['smtp_host'] != '' && $smtpData['Location']['smtp_port'] != '' && $smtpData['Location']['smtp_user'] != '' && $smtpData['Location']['smtp_pass'] != '') {
                    $email->config(array(
                        'host' => $smtpData['Location']['smtp_host'],
                        'port' => $smtpData['Location']['smtp_port'],
                        'username' => $smtpData['Location']['smtp_user'],
                        'password' => $smtpData['Location']['smtp_pass'],
                    ));
                    $email->from(array($smtpData['Location']['smtp_pass'])); //Client email address
                    $from = $smtpData['Location']['smtp_pass'];
                    $email->to(array($smtpData['Location']['smtp_pass']));
                } else {
                    $this->Session->setFlash(__("Configure your SMTP"), 'flash_fail');
                    $this->redirect(array('action' => 'emails'));
                }
            } else {
                $email->from(array('info@wifonic.com' => 'WiFonic Technologies Pvt. Ltd.'));
                $from = 'info@wifonic.com';
                $email->to(array('info@wifonic.com' => 'WiFonic Technologies Pvt. Ltd.'));
            }
            $email->emailFormat('both');
            $email->bcc($to);
            $email->subject($subject);
            $email->send($message);
        } catch (Exception $ex) {
            //return 'error';
            //pr($ex);
        }
        $this->_saveEmail($to, $from, $subject, $message, $locationId);
        return 'sent';
    }

    private function _saveEmail($to, $from, $subject, $message, $locationId) {
        $toList = '';
        if (is_array($to)) {
            foreach ($to as $value) {
                $toList = $toList . $value . ', ';
            }
        } else {
            $toList = $to;
        }
        $data['SentMail']['to'] = $toList;
        $data['SentMail']['from'] = $from;
        $data['SentMail']['subject'] = $subject;
        $data['SentMail']['body'] = $message;
        $data['SentMail']['location_id'] = $locationId == '' ? '0' : $locationId;
        if ($this->SentMail->save($data)) {
            $this->log('Email sent and saved');
        }
    }

}
