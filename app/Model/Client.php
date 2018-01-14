<?php

App::uses('AppModel', 'Model');

class Client extends AppModel {
	public $name = 'Client';
    public $validate = array(
        'client_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			)
    );
}
?>