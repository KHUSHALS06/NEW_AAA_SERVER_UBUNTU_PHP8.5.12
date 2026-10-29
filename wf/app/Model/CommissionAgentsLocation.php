<?php

App::uses('AppModel', 'Model');

/**
 * LocationsUser Model
 *
 */
class CommissionAgentsLocation extends AppModel {

    public $belongsTo = array(
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id'
        ),
        'CommissionAgent' => array(
            'className' => 'CommissionAgent',
            'foreignKey' => 'commission_agent_id'
        ),
        /*'CommissionAgent' => array(
            'className' => 'CommissionAgent',
            'foreignKey' => 'commission_agent_id'
        )*/
    );

}
