<?php

App::uses('AppModel', 'Model');

class Platform extends AppModel {
	public $name = 'Platform';
    public $validate = array(
        'platform_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			)
    );
}
?>