<?php

App::uses('AppModel', 'Model');

class Activity extends AppModel {
	public $name = 'Activity';
	
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'activity_user'
        ),
        'Proyect' => array(
            'className' => 'Proyect',
            'foreignKey' => 'activity_proyect'
        ),
        'Platform' => array(
            'className' => 'Platform',
            'foreignKey' => 'activity_platform'
        ),
        'Type' => array(
            'className' => 'Type',
            'foreignKey' => 'activity_type'
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
		/*	'activity_description' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),*/
			'activity_state' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                ),
            'max' => array(
				'rule'=> array('comparison','<=',100),
				'message' => 'Este campo no debe ser mayor a 100'
				),
			'min' => array(
				'rule'=> array('comparison','>=',0),
				'message' => 'Este campo debe ser mayor a 0')
            ),
			'activity_user' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
			/*'activity_update' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),*/
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