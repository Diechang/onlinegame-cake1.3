<?php
class Fee extends AppModel {
	var $name = 'Fee';
	var $displayField = 'str';
	var $validate = array(
		'str' => 'notEmpty',
		'path' => array(
			"alphaNumeric" => array(
				"rule" => "alphaNumeric",
			),
			"isUnique" => array(
				"rule" => "isUnique",
			),
		),
		'sort' => 'numeric',
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'fee_id',
			'dependent' => false,
			'conditions' => array('Title.public' => 1),
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