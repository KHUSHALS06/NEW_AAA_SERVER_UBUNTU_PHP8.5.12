<?php
App::uses('AppModel', 'Model');
/**
 * LocationsUser Model
 *
 */
class CommissionChallan extends AppModel {
    public $belongsTo = array(
        'CommissionAgent' => array(
            'className' => 'CommissionAgent',
            'foreignKey' => 'commission_agent_id'
        ),
        'Location' => array(
            'className' => 'Location',
            'foreignKey' => 'location_id'
        )
    );
}
