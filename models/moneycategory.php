<?php
class Moneycategory extends AppModel {
	var $name = 'Moneycategory';
	var $displayField = 'str';
	var $validate = array(
		'str' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目',
			),
		),
		'path' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => '英数字',
			),
		),
		'sort' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '数値',
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Money' => array(
			'className' => 'Money',
			'foreignKey' => 'moneycategory_id',
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

	//Callbacks
	function afterSave()
	{
		$this->clearElementCache("global_header");
	}

	function afterDelete()
	{
		$this->clearElementCache("global_header");
	}
}
?>