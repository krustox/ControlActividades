<?php

App::uses('AppModel', 'Model');

class Profile extends AppModel {
	public $name = 'Profile';
	
    public $validate = array(
        'profile_name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
			));
}
?>