<?php
class Package extends AppModel {
	var $name = 'Package';
	var $displayField = 'ad_part_text';
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
		'ad_noredirect' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'ad_part_url' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ad_part_text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
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
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => array('Title.public' => 1),
			'fields' => '',
			'order' => ''
		)
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Package"]))
		{
			$clumns = array(
				"ad_src_text",
				"ad_src_image",
				"ad_part_url",
				"ad_part_text",
				"ad_part_img_src",
				"ad_part_track_src",
				"price",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Package"][$clumn]))
				{
					$this->data["Package"][$clumn]		= $this->trim($this->data["Package"][$clumn]);
					$this->data["Package"][$clumn]		= $this->emptyToNull($this->data["Package"][$clumn]);
				}
			}
		}
		return true;
	}

	function afterSave($create)
	{
		if(!empty($this->data["Package"]["title_id"]))
		{
			return $this->Title->summaryUpdatePackages($this->data["Package"]["title_id"]);
		}
		return true;
	}

	//削除後集計用タイトルID
	var $deleteSummaryTitleId = null;
	function beforeDelete()
	{
		$this->deleteSummaryTitleId = $this->field("title_id");
		return true;
	}

	function afterDelete()
	{
		if(!empty($this->deleteSummaryTitleId))
		{
			$this->Title->summaryUpdatePackages($this->deleteSummaryTitleId);
		}
	}


/** Methods
------------------------------ **/

/**
 * 集計値取得
 *
 * @param	number	$title_id
 * @return	array
 */
	function summary($title_id = null)
	{
		$conditions = array();
		if(!empty($title_id))
		{
			$conditions["Title.id"] = $title_id;
			$conditions["Package.title_id"] = $title_id;
		}
		$ret = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"Title.id",
				"Package.title_id",
				"IFNULL( COUNT(Package.id) , 0) AS package_count",
			),
			"group" => "Title.id",
			"joins" => array(
				array(
					"table" => "titles",
					"alias" => "Title",
					"conditions" => "Title.id = Package.title_id AND Package.public = 1",
					"type" => "right",
				),
			),
		));
		if(!empty($title_id) && empty($ret))
		{
			$ret[0]["Title"]["id"]	= $title_id;
			$ret[0]["Package"]["title_id"]	= $title_id;
			$ret[0][0]["package_count"]		= 0;
		}
//		pr($ret);
//		exit;
		return $ret;
	}
}
