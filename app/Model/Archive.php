<?php

App::uses('AppModel', 'Model');

class Archive extends AppModel {
	public $name = 'Archive';
    public $belongsTo = array(
        'Activity' => array(
            'className' => 'Activity',
            'foreignKey' => 'archive_activity'
        ));
}
?>