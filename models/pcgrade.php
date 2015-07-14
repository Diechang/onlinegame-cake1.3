<?php
class Pcgrade extends AppModel {
	var $name = 'Pcgrade';
	var $displayField = 'str';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Pc' => array(
			'className' => 'Pc',
			'foreignKey' => 'pcgrade_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>