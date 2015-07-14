<?php
class Pcshop extends AppModel {
	var $name = 'Pcshop';
	var $displayField = 'shop_name';
	var $validate = array(
		'public' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'shop_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須',
			),
		),
		'url_str' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => '英数字',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須',
			),
		),
		'shop_url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'URL形式',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須',
			),
		),
		'ad_use' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Pc' => array(
			'className' => 'Pc',
			'foreignKey' => 'pcshop_id',
			'dependent' => true,	//同時削除 = delete($id , $cascade = true)
			'conditions' => array('Pc.public' => 1),
			'fields' => '',
			'order' => 'Pc.modified DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Pcshop"]))
		{
			$clumns = array(
				"shop_name",
				"url_str",
				"shop_url",
				"ad_text",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Pcshop"][$clumn]))
				{
					$this->data["Pcshop"][$clumn]		= $this->trim($this->data["Pcshop"][$clumn]);
					$this->data["Pcshop"][$clumn]		= $this->emptyToNull($this->data["Pcshop"][$clumn]);
				}
			}
		}
		return true;
	}

	//Callbacks
	function afterSave()
	{
		$this->clearElementCache("left_" . strtolower($this->name));
	}

	function afterDelete()
	{
		$this->clearElementCache("left_" . strtolower($this->name));
	}
}
?>