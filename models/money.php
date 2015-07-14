<?php
class Money extends AppModel {
	var $name = 'Money';
	var $displayField = 'title';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目',
			),
		),
		'url_str' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => '英数字',
			),
		),
		'moneycategory_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '数値',
			),
		),
		'ad_use' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'official_url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'URL形式',
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Moneycategory' => array(
			'className' => 'Moneycategory',
			'foreignKey' => 'moneycategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>