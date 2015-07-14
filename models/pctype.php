<?php
class Pctype extends AppModel {
	var $name = 'Pctype';
	var $displayField = 'str';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Pc' => array(
			'className' => 'Pc',
			'foreignKey' => 'pctype_id',
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