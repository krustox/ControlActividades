<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';
	public $belongsTo = array(
        'Profile' => array(
            'className' => 'Profile',
            'foreignKey' => 'user_perfil'
        ));
    public $validate = array(
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'La contraseña del usuario es requerida'
            )
        ),
        'password_repeat' => array(
        'compare' => array(
            'rule'    => array('validate_passwords'),
            'message' => 'Por favor verifique la contraseña',
        )
		),
    
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'La contraseña del usuario es requerida'
                )
			),
		'user_correo' => 'email'
    );
	
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
public function validate_passwords() { //password match check
    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_repeat'];
}
}
?>