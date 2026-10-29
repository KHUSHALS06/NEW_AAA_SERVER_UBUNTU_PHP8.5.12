<?php

/**
 * This is the default page which displays the list of billing plans
 * 
 * @copyright     Copyright 2013-2016, WiFonic Technologies Pvt. Ltd. (http://wifonic.com)
 * @link          http://wifonic.com
 * @license       WiFonic Technologies Pvt. Ltd.
 * 
 * @author Abhaya Patel<abhayapatel@wifonic.com>
 */
$vPath = App::path('Vendor');
$rApiPath = $vPath[0] . DS . 'rapi' . DS . 'routeros_api.class.php';
require_once ($rApiPath);

class NetworkManagementsController extends AppController {

	public $uses = array('Nas', 'Coupon', 'Apmonitor');
	public $components = array('Paginator', 'RequestHandler');
	public $helpers = array('Js',);

	private $apiLogin='api';
	private $apiPass ='wfapi@2007';
	// public  $helpers = array('Html','Ajax','Javascript');
	public function beforeFilter() {
		parent::beforeFilter();

		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
		}
	}

	public function index() {
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}
		if ($this->Session->read('choosed_location_id') == '') {
			$this->Session->setFlash(__("You have been redirected from Mac Binding, because location was not selected correctly"), 'flash_info');
			$this->redirect(array('controller' => 'pages', 'action' => 'index'));
		}

		$this->Session->write('link', 'index');
		//          set_time_limit(20);
		//        pr($this->Session->read('locations_domain_list'));
		//        pr($this->Session->read('choosed_location_id'));
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$hostIp = $this->Nas->find('all', array(
					'fields' => array('nasname'),
					'conditions' => array('shortname' => $choosedDomain)
					));
		//  $hostIp = $hostIp[0]['Nas']['nasname']; 
		// pr($hostIp);
		$API = new RouterosAPI();

		$API->debug = true;
		try {
			$count = count($hostIp);
			for ($i = 0; $i < $count; $i++) {
				$flag = 0;
				$isConnected = $API->connect($hostIp[$i]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
				if ($isConnected) {
					$flag = 1;
					$API->write('/ip/hotspot/ip-binding/getall');

					$READ = $API->read(false);
					$ARRAY = $API->parseResponse($READ);
					$this->set('ipBinding', $ARRAY);
					$this->set('connection', 'Yes');
				} else {
					$this->set('ipBinding', array());
					if ($i + 1 == $count) {
						$this->Session->setFlash(__("Could not connect"), 'flash_fail');
					}
				}
				if ($flag == 1) {
					break;
				}
			}
		} catch (Exception $ex) {
			echo $ex;
		}
	}

	/*     * *********** ADD Apmonitor record ************************ */

	public function addapmonitor() {

		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		if ($this->request->is('post') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}

		$user = $this->Auth->user('username');
		$this->set('user', $user);
		if ($this->request->is('Post')) {
			$this->Apmonitor->create();
			$this->request->data['Apmonitor']['location_id'] = $this->Session->read('choosed_location_id');
			$quest = $this->request->data;

			if ($this->Apmonitor->save($quest)) {

				$this->Session->setFlash(__('Access point added' . '&nbsp' . $this->request->data['Apmonitor']['mac_address']), 'flash_success');
			} else {
				$this->Session->setFlash(__('post cudnt add, enter valid Ip'), 'flash_fail');
			}
			//  $this->redirect(array('action' => 'apmonitor'));
		}
	}

	public function add() {
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}
		$this->Session->write('link', 'nwIndex');
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$hostIp = $this->Nas->find('all', array(
					'fields' => array('nasname'),
					'conditions' => array('shortname' => $choosedDomain),
					));

		if ($this->request->is('POST')) {
			$API = new RouterosAPI();
			$API->debug = true;
			try {
				$count = count($hostIp);
				for ($i = 0; $i < $count; $i++) {
					$flag = 0;
					$isConnected = $API->connect($hostIp[$i]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
					if ($isConnected) {
						$ARRAY = $API->comm("/ip/hotspot/ip-binding/add", array(
									"mac-address" => $this->request->data['MACBind']['mac-address'],
									"type" => $this->request->data['MACBind']['type'],
									"comment" => $this->request->data['MACBind']['comment']
									//"server" => $hostIp
									));
						if ($ARRAY != '') {
							$this->Session->setFlash(__("MAC - " . $this->request->data['MACBind']['mac-address'] . ' is ' . $this->request->data['MACBind']['type'] . ' successfully.'), 'flash_success');
						} else {
							$this->Session->setFlash(__("Unable to add, try again"), 'flash_fail');
						}

						//$this->Session->setFlash(__("Could not connect"), 'flash_fail');
					} else {
						if ($i + 1 == $count) {
							$this->Session->setFlash(__("Could not connect"), 'flash_fail');
						}
					}
					if ($flag == 1) {
						break;
					}
				}
			} catch (Exception $ex) {
				echo $ex;
			}
			$this->redirect(array('action' => 'index'));
		}
	}

	/*     * *********** Edit apmonitor record ************************ */

	public function editapmonitor() {

		if ($this->request->is('post')) {
			if (isset($this->request->data['NetworkManagement']['target'])) {
				$var = $this->request->data['NetworkManagement']['target'];
				// pr($var);
			} else {
				$this->Apmonitor->id = $this->request->data['NetworkManagement']['id'];
				// pr($this->Apmonitor->id);
				$id = $this->Apmonitor->id;
				$macaddress = $this->request->data['NetworkManagement']['mac_address'];
				$ip = $this->request->data['NetworkManagement']['Ip'];
				$location = $this->request->data['NetworkManagement']['location'];
				$Ap = $this->request->data['NetworkManagement']['Ap'];
				$time = date('Y-m-d H:i:s');
				$quest['Apmonitor'] = array('mac_address' => "'$macaddress'",
						'Ip' => "'$ip'",
						'modified' => "'$time'",
						'location' => "'$location'",
						'Ap' => "'$Ap'"
						);

				if ($this->Apmonitor->updateAll($quest['Apmonitor'], array('Apmonitor.id' => $id))) {
					$this->Session->setFlash(__('Record updated'), 'flash_success');
					$this->redirect(array('action' => 'apmonitor'));
				}
			}
		}
	}

	public function deleteAp() {
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
		if ($this->request->is('POST')) {
			$this->Apmonitor->id = $this->request->data['NetworkManagement']['id'];
			$this->Apmonitor->delete($this->Apmonitor->id);
			$this->Session->setFlash(__('record deleted'), 'flash_success');
			$this->redirect(array('action' => 'apmonitor'));
		}
	}

	public function delete() {
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}
		$this->Session->write('link', 'nwIndex');
		//        pr($this->request->data['network_managements']['id']);
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		//        pr($choosedDomain);
		$hostIp = $this->Nas->find('all', array(
					'fields' => array('nasname'),
					'conditions' => array('shortname' => $choosedDomain),
					// 'limit' => 1
					));

		//   $hostIp = $hostIp[0]['Nas']['nasname'];
		$API = new RouterosAPI();

		$API->debug = true;
		try {
			$count = count($hostIp);
			for ($i = 0; $i < $count; $i++) {
				$flag = 0;
				$isConnected = $API->connect($hostIp[$i]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
				if ($isConnected) {
					$ARRAY = $API->comm("/ip/hotspot/ip-binding/remove", array(
								"numbers" => $this->request->data['network_managements']['id'],
								));
					if ($ARRAY != '') {
						$this->Session->setFlash(__("MAC-" . $this->request->data['network_managements']['mac'] . " removed successfully"), 'flash_success');
					} else {
						$this->Session->setFlash(__("Unable to add, try again"), 'flash_fail');
					}
				} else {
					$this->set('ipBinding', array());
					if ($i + 1 == $count) {
						$this->Session->setFlash(__("Could not connect"), 'flash_fail');
					}
				}
				if ($flag == 1) {
					break;
				}
			}
		} catch (Exception $ex) {
			echo $ex;
		}
		$this->redirect(array('action' => 'index'));
	}

	public function loggedInUser() {
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}
		if ($this->Session->read('choosed_location_id') == '') {
			$this->Session->setFlash(__("You have been redirected from Logged-in user, because location was not selected correctly"), 'flash_info');
			$this->redirect(array('controller' => 'pages', 'action' => 'index'));
		}
		$this->Session->write('link', 'loged_in_user');
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$hostIp = $this->Nas->find('all', array(
					'fields' => array('nasname'),
					'conditions' => array('shortname' => $choosedDomain)
					));
		$speed = array('0' => 'unlimited', '128k' => '128 Kbps', '256k' => '256kbps', '512k' => '512 kbps', '1M' => '1Mbps', '2M' => '2Mbps', '3M' => '3Mbps', '4M' => '4Mbps', '5M' => '5Mbps', '10M' => '10Mbps');
		$this->set('speed', $speed);

		$API = new RouterosAPI();

		$API->debug = true;
		try {
			$count = count($hostIp);
			for ($j = 0; $j < $count; $j++) {
				$flag = 0;
				$isConnected = $API->connect($hostIp[$j]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
				if ($isConnected) {
					$flag = 1;
					$API->write('/ip/hotspot/active/getall');

					$READ = $API->read(false);

					$hosts = $API->parseResponse($READ);

					$queues = $this->_getSpeedLimit($hostIp[$j]['Nas']['nasname']);

					$i = 0;
					//  pr($hosts);
					$val = count($hosts);
					for ($k = 0; $k < $val; $k++) {
						$remove = $this->_removeuser($hostIp[$j]['Nas']['nasname'], $hosts[$k]['user']);
					}
					foreach ($hosts as $value) {

						$tmp = $this->_getRoomDetails($value['user']);

						if ($tmp != '') {
							$hosts[$i]['room'] = $tmp['Coupon']['cust_id'];
							$hosts[$i]['name'] = $tmp['Coupon']['firstname'] . ' ' . $tmp['Coupon']['lastname'];
						} else {
							$hosts[$i]['room'] = '';
							$hosts[$i]['name'] = '';
						}

						if (count($queues) > 0 && key_exists($value['address'], $queues)) {
							$speedlimit = $queues[$value['address']]['speed'];
							$speedlimit = explode('/', $speedlimit);
							$speedlimit = $speedlimit[0];
							if ($speedlimit <= 768000) {
								$speedlimit = $speedlimit / 1000;
								$speedlimit = $speedlimit . ' Kbps';
							} else {
								$speedlimit = $speedlimit / 1000000;
								$speedlimit = $speedlimit . ' Mbps';
							}
							$hosts[$i]['speedlimit'] = $speedlimit;
							$hosts[$i]['qId'] = $queues[$value['address']]['qId'];
						} else {
							$hosts[$i]['speedlimit'] = '-n/a-';
							$hosts[$i]['qId'] = '~';
						}
						$i++;
					}
					$this->set('liveHosts', $hosts);
					$this->set('routerIp', $hostIp[$j]['Nas']['nasname']);
					$this->set('connection', 'Yes');
				} else {
					$this->set('liveHosts', array());
					if ($j + 1 == $count) {
						$this->Session->setFlash(__("Could not connect"), 'flash_fail');
					}
				}
				if ($flag == 1) {
					break;
				}
			}
		} catch (Exception $ex) {
			echo $ex;
		}
	}

	public function removeuser() {
		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}
		$this->Session->write('link', 'nwIndex');
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$hostIp = $this->Nas->find('all', array(
					'fields' => array('nasname'),
					'conditions' => array('shortname' => $choosedDomain),
					));
		$API = new RouterosAPI();
		$API->debug = true;
		try {
			$count = count($hostIp);
			for ($i = 0; $i < $count; $i++) {
				$flag = 0;
				$isConnected = $API->connect($hostIp[$i]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
				if ($isConnected) {
					$flag = 1;
					$ARRAY = $API->comm("/ip/hotspot/active/remove", array(
								"numbers" => $this->request->data['network_managements']['id'],
								));
					if ($ARRAY != '') {
						$this->Session->setFlash(__($this->request->data['network_managements']['name'] . " Active user removed successfully"), 'flash_success');
					} else {
						$this->Session->setFlash(__("Unable to add, try again"), 'flash_fail');
					}
				} else {
					$this->set('ipBinding', array());
					if ($i + 1 == $count) {
						$this->Session->setFlash(__("Could not connect"), 'flash_fail');
					}
				}
				if ($flag == 1) {
					break;
				}
			}
		} catch (Exception $ex) {
			echo $ex;
		}
		// return $ARRAY ;
		$this->redirect(array('action' => 'loggedInUser'));
	}


	/*     * *********** Apmonitor ************************ */

	public function apmonitor() {
		//        
		if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
			$this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));
		//                

		if ($this->request->is('POST') && isset($this->request->data['network_managements']['locations_id'])) {
			$this->Session->write('choosed_location_id', $this->request->data['network_managements']['locations_id']);
		}

		//pr($hostIp);
		$this->Session->write('link', 'apmonitor');
/*
		$conditions = array();

		if ($this->Session->check('choosed_location_id') && $this->Session->read('choosed_location_id') != '') {
			$conditions[] = array('Apmonitor.location_id' => $this->Session->read('choosed_location_id'));
		} elseif (!$this->Session->check('choosed_location_id') || $this->Session->read('choosed_location_id') == '') {
			$conditions[] = array('Apmonitor.location_id' => $this->Session->read('locations_id'));
			$this->Session->setFlash(__('To view apmonitoring records, please select location first.'), 'flash_info');
		}
*/
		/*
		$choosedDomain = $this->Session->read('choosed_location_id');
		$hostIp = $this->Nas->find('all', array('fields' => array('nasname'),
					'conditions' => array('location_id' => $choosedDomain)
					));
		$Ip = $this->Apmonitor->find('all', array('fields' => array('Ip', 'status', 'modified', 'id'),
					'conditions' => array('location_id' => $choosedDomain),
					));
		*/
		$this->Apmonitor->recursive = 0;
                $this->Paginator->settings = array(
	        // 'limit' => Configure::read('Application.rowLimit'),
        	      'order' => array('Apmonitor.mac_address d' => 'Desc'),
                      //'conditions' => $conditions,
                );
                $this->set('apmonitoring', $this->Paginator->paginate('Apmonitor'));
		// pr($Ip);
		/*
		//$API = new RouterosAPI();
		//$API->debug = false;
		try {
		/*
			$pingStatusArray = array();
			$count = count($hostIp);
			for ($i = 0; $i < $count; $i++) {
				$flag = 0;
				$isConnected = $API->connect($hostIp[$i]['Nas']['nasname'], $this->apiLogin, $this->apiPass);
				foreach ($Ip as $ip) {
					if ($isConnected) {
						$flag = 1;
						$API->write('/ping ', false);
						$API->write('=address=' . $ip['Apmonitor']['Ip'], false);
						$API->write('=count=2', false);
						$API->write('=interval=2');
						$READ = $API->read(false);

						$hosts = $API->parseResponse($READ);
						foreach ($hosts as $value) {
							//  pr($value);
							if (array_key_exists('packet-loss', $value)) {
								$packet = $value['packet-loss'];
								$this->set('packet', $packet);
							}
							if (array_key_exists('packet-loss', $value)) {
								$packet1[$ip['Apmonitor']['Ip']] = $value['packet-loss'];
								$this->set('packet1', $packet1);
							}
							if (array_key_exists('sent', $value)) {
								$sent[$ip['Apmonitor']['Ip']] = $value['sent'];
								$this->set('sent', $sent);
							}
							if (array_key_exists('received', $value)) {
								$received[$ip['Apmonitor']['Ip']] = $value['received'];
								$this->set('received', $received);
							}
							if (array_key_exists('avg-rtt', $value)) {
								$avg_rtt[$ip['Apmonitor']['Ip']] = $value['avg-rtt'];
								$this->set('avg_rtt', $avg_rtt);
							}
						}

						switch ($packet) {
							case 0 :
								$pingStatusArray[$ip['Apmonitor']['Ip']] = "Success";
								break;
							case 100:
								$pingStatusArray[$ip['Apmonitor']['Ip']] = "fail";
								break;
							case 50:
								$pingStatusArray[$ip['Apmonitor']['Ip']] = "Success";
								break;
							default:
								$pingStatusArray[$ip['Apmonitor']['Ip']] = "fail";
								break;
						}
						$this->set('pingarray', $pingStatusArray);

						// pr($pingStatusArray);
						$status = $ip['Apmonitor']['status'];
						$this->set('status', $status);
						$modified1 = ($ip['Apmonitor']['modified']);
						//  pr($modified1);
						if ($status != $pingStatusArray[$ip['Apmonitor']['Ip']]) {
							// pr($pingStatusArray[$Ip]);
							$id = $ip['Apmonitor']['id'];
							if ($status == 'fail') {
								$data['Apmonitor'] = array(
										'status' => "Success",
										'id' => $id
										);
								if ($this->Apmonitor->save($data['Apmonitor'])) {

								}
							} else {
								$data['Apmonitor'] = array(
										'status' => "fail",
										'id' => $id
										);

								if ($this->Apmonitor->save($data['Apmonitor'])) {

								}
							}
							$modified = date('Y-m-d H:i:s');

							$time = strtotime($modified) - strtotime($modified1);
							$duration = '';
							$day = floor($time / (3600 * 24));
							if ($day > 0) {
								$time = $time - $day * (3600 * 24);
								if ($day > 1) {
									$duration = $duration . $day . ' days ';
								} else {
									$duration = $duration . $day . ' day ';
								}
							}
							$hours = floor($time / 3600);
							if ($hours > 0) {
								$time = $time - $hours * 3600;
								if ($hours > 1) {
									$duration = $duration . $hours . ' hours ';
								} else {
									$duration = $duration . $hours . ' hour ';
								}
							}
							$mins = floor(($time / 60));
							if ($mins > 0) {
								$time = $time - $mins * 60;
								if ($mins > 1) {
									$duration = $duration . $mins . ' mins ';
								} else {
									$duration = $duration . $mins . ' min ';
								}
							}
							$secs = $time;
							if ($secs > 0) {
								if ($secs > 1) {
									$duration = $duration . $secs . ' secs ';
								} else {
									$duration = $duration . $secs . ' sec ';
								}
							}
							// pr($duration);

							$data['Apmonitor'] = array(
									'duration' => $duration,
									'id' => $id
									);
							$quest = $this->Apmonitor->save($data['Apmonitor']);
							$this->set('duration', $duration);
						}
					} else {
						//$this->Session->setFlash(__("attempt fail"), 'flash_fail');
						if ($i + 1 == $count) {
							$this->Session->setFlash(__("Could not connect"), 'flash_fail');
						}
					}
				}
				if ($flag == 1) {
					break;
				}
			}
			
			$this->Apmonitor->recursive = 0;
			$this->Paginator->settings = array(
					// 'limit' => Configure::read('Application.rowLimit'),
					'order' => array('Apmonitor.mac_address' => 'Desc'),
					'conditions' => $conditions,
					);
			$this->set('apmonitoring', $this->Paginator->paginate('Apmonitor'));
			//pr($data);      	
			
		}
		
		//pr($pingStatusArray);
		catch (Exception $ex) {
			var_dump("mmmm");
		}
		*/
	}
	public function mrtg(){
		$this->Session->write('link', 'mrtg');

	}

	private function _removeuser($hostIp, $user) {
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$API = new RouterosAPI();
		$API->debug = true;
		try {
			$isConnected = $API->connect($hostIp, $this->apiLogin, $this->apiPass);
			if ($isConnected) {
				$API->write('/ip/hotspot/active/getall');
				$READ = $API->read(false);
				$ARRAY = $API->parseResponse($READ);
				foreach ($ARRAY as $value) {
					if ($user == $value['user']) {
						//                        for($k = 0; $k < count($user); $k++ ){
						//                        }
						//$this->set('ipBinding', $ARRAY);
						//                        $API->comm("/ip/hotspot/active/remove", array(
						//                            "numbers" => $ARRAY[0]['.id'],
						//                        ));    
					}
				}

				return 1;
			} else {

				return 0;
			}
		} catch (Exception $ex) {
			echo $ex;
		}
	}

	public function speedlimit() {
		//        if (!$this->Acl->check(AuthComponent::user('Group.name'), Inflector::camelize($this->params['controller']) . "/" . $this->request->params['action']))
		//            $this->redirect(array('controller' => 'permission_errors', 'action' => 'unauthorized'));

		// if ($this->request->is($_POST)) {
		$this->Session->write('val', $this->request->data);
		$API = new RouterosAPI();

		$API->debug = true;
		$data = $this->request->data;
		$name = explode("/", $data['name']);
		$this->Session->write('name', $name);
		$isConnected = $API->connect($name[2], $this->apiLogin, $this->apiPass);
		if ($isConnected) {
			if (isset($name[1]) && $name[1] != "~") {
				$hosts = $API->comm("/queue/simple/set", array(
							"name" => "<api-" . $name[0] . ">",
							".id" => $name[1],
							"target" => $data['pk'],
							"max-limit" => $data['value'] . '/' . $data['value'],
							"limit-at" => $data['value'] . '/' . $data['value']
							));

				return $data['value'];
			} else {
				$hosts = $API->comm("/queue/simple/add", array(
							"name" => "<api-" . $name[0] . ">",
							"target" => $data['pk'],
							"max-limit" => $data['value'] . '/' . $data['value'],
							"limit-at" => $data['value'] . '/' . $data['value']
							));

				return $data['value'];
			}            
		}
		return $data['value'];
		//}
	}

	private function _getRoomDetails($username) {
		$this->Coupon->recursive = -1;
		$data = $this->Coupon->find('all', array(
					'fields' => array('Coupon.cust_id', 'Coupon.firstname', 'Coupon.lastname'),
					'conditions' => array('username' => $username)
					));
		if (count($data) > 0) {
			return $data[0];
		} else {
			return '';
		}
	}

	private function _getSpeedLimit($hostIp) {
		$domains = $this->Session->read('locations_domain_list');
		$choosedDomain = $domains[$this->Session->read('choosed_location_id')];
		$API = new RouterosAPI();

		$API->debug = true;
		try {
			$isConnected = $API->connect($hostIp, $this->apiLogin, $this->apiPass);
			if ($isConnected) {
				$API->write('/queue/simple/getall');
				$READ = $API->read(false);
				$ARRAY = $API->parseResponse($READ);
				$queue = array();
				foreach ($ARRAY as $value) {
					if (array_key_exists('target', $value)) {
						$trget = $value['target'];
					} else if (array_key_exists('target-addresses', $value)) {
						$trget = $value['target-addresses'];
					}

					$trget = explode('/', $trget);
					$queue[$trget[0]]['speed'] = $value['max-limit'];
					$queue[$trget[0]]['qId'] = $value['.id'];
				}

				return $queue;
			} else {
				return 1;
			}
		} catch (Exception $ex) {
			echo $ex;
		}
	}

}

