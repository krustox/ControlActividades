<?php

App::uses('AppModel', 'Model');

class Proyect extends AppModel {
	public $name = 'Proyect';
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'proyect_admin'
        ),
        'Client' => array(
            'className' => 'Client',
            'foreignKey' => 'proyect_client'
        )
    );
    public $validate = array(
        'proyect_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'proyect_start' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'proyect_end' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'proyect_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			),
			'proyect_admin' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'proyect_client' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			)
    );
}
?>