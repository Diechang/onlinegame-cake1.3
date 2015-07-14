<?php
class Linkcategory extends AppModel {
	var $name = 'Linkcategory';
	var $displayField = 'str';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Link' => array(
			'className' => 'Link',
			'foreignKey' => 'linkcategory_id',
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