<?php

App::uses('AppModel', 'Model');

class Permission extends AppModel {
    public $name = 'Permission';
    public $belongsTo = array(
        'Profile' => array(
            'className' => 'Profile',
            'foreignKey' => 'permiso_perfil'
        )
    );
    public $validate = array(
        'permiso_perfil' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_user' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_client' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_historico' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_archivo' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_profile' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_plataforma' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_proyecto' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_tipo' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            ),
            'permiso_actividades' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Este campo es requerido'
                )
            )
    );
}
?>