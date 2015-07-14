<?php
class PortalsTitle extends AppModel {
	var $name = 'PortalsTitle';
//	var $primaryKey = 'title_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Portal' => array(
			'className' => 'Portal',
			'foreignKey' => 'portal_id',
			'conditions' => null,
			'fields' => '',
			'order' => ''
		),
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => null,
			'fields' => '',
			'order' => ''
		)
	);
}
?>