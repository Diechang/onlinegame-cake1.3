<?php
class AdRightBottom extends AppModel {
	var $name = 'AdRightBottom';
	var $validate = array(
		'public' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ad_src_image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sort' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["AdRightBottom"]))
		{
			if($this->data["AdRightBottom"]["public"] == 0)
			{
				$this->data["AdRightBottom"]["sort"] = 0;
			}
		}
		return true;
	}

	function afterSave()
	{
		$this->clearElementCache("ad_right_bottoms");
	}
}
?>