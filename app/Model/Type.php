<?php

App::uses('AppModel', 'Model');

class Type extends AppModel {
	public $name = 'Type';
    public $validate = array(
        'type_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			)
    );
}
?>