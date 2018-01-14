<?php

App::uses('AppModel', 'Model');

class Historico extends AppModel {
	public $name = 'Historico';
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'historico_user'
        ),
        'Activity' => array(
            'className' => 'Activity',
            'foreignKey' => 'historico_actividad'
        )
    );
    public $validate = array(
        'activity_start' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'activity_platform' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'activity_tema' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'activity_description' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'activity_state' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
			'activity_user' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
			'activity_update' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
			'activity_proyect' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
			'activity_type' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            )
    );
}
?>