<?php
class Link extends AppModel {
	var $name = 'Link';
	var $displayField = 'site_name';
	var $validate = array(
		"site_name" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			),
		),
		"site_url" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			),
			"url" => array(
				"rule" => "url",
				"message" => "URL形式が不正です",
			),
		),
		"link_url" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			),
			"url" => array(
				"rule" => "url",
				"message" => "URL形式が不正です",
			),
		),
		"admin_name" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			),
		),
		"admin_mail" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			),
			"email" => array(
				"rule" => "email",
				"message" => "アドレス形式が不正です"
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Linkcategory' => array(
			'className' => 'Linkcategory',
			'foreignKey' => 'linkcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Link"]))
		{
			$clumns = array(
				"site_name",
				"site_url",
				"link_url",
				"admin_name",
				"admin_mail",
				"site_info",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Link"][$clumn]))
				{
					$this->data["Link"][$clumn]		= $this->trim($this->data["Link"][$clumn]);
					$this->data["Link"][$clumn]		= $this->emptyToNull($this->data["Link"][$clumn]);
				}
			}
			//Trim
//			$this->data["Link"]["site_name"]	= $this->trim($this->data["Link"]["site_name"]);
//			$this->data["Link"]["site_url"]		= $this->trim($this->data["Link"]["site_url"]);
//			$this->data["Link"]["link_url"]		= $this->trim($this->data["Link"]["link_url"]);
//			$this->data["Link"]["admin_name"]	= $this->trim($this->data["Link"]["admin_name"]);
//			$this->data["Link"]["admin_mail"]	= $this->trim($this->data["Link"]["admin_mail"]);
			//Empty to Null
//			$this->data["Link"]["site_info"]	= $this->emptyToNull($this->data["Link"]["site_info"]);
		}
		return true;
	}
}
?>