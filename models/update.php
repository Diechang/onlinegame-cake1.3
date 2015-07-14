<?php
class Update extends AppModel {
	var $name = 'Update';
	var $displayField = 'text';
	var $validate = array(
		'text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須項目',
			),
		),
	);
}
?>