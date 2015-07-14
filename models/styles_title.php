<?php
class StylesTitle extends AppModel {
	var $name = 'StylesTitle';
//	var $primaryKey = 'title_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Style' => array(
			'className' => 'Style',
			'foreignKey' => 'style_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>