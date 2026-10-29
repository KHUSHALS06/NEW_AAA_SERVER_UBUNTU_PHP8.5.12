<?php
App::uses('AppModel', 'Model');
/**
 * DeliveryChallan Model
 *
 * @property Location $Location
 * @property CommissionLAgentLocation $CommissionLgentLocation
 */
class DeliveryChallan extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CommissionLgentLocation' => array(
			'className' => 'CommissionLAgentLocation',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
