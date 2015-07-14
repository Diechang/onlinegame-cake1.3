<?php
class Service extends AppModel {
	var $name = 'Service';
	var $displayField = 'str';
	var $validate = array(
		'str' => 'notEmpty',
		'path' => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
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
			'foreignKey' => 'service_id',
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

	//Callbacks
	function afterSave()
	{
		$this->clearElementCache("left_" . strtolower($this->name));
		$this->clearElementCache("search_title_form");
	}

	function afterDelete()
	{
		$this->clearElementCache("left_" . strtolower($this->name));
		$this->clearElementCache("search_title_form");
	}
}
?>