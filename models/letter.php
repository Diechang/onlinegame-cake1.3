<?php
class Letter extends AppModel {
	var $name = 'Letter';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目です',
			),
		),
		'mail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目です',
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'アドレス形式が不正です',
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目です',
			),
		),
	);
}
?>