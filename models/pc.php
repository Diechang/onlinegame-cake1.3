<?php
class Pc extends AppModel {
	var $name = 'Pc';
	var $displayField = 'ad_part_text';
	var $validate = array(
		'public' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
				'message' => 'URL形式',
			),
		),
		'ad_part_text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '必須',
			),
		),
		'price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => '数値',
				'allowEmpty' => true,
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
		),
		'Pcshop' => array(
			'className' => 'Pcshop',
			'foreignKey' => 'pcshop_id',
			'conditions' => array('Pcshop.public' => 1),
			'fields' => '',
			'order' => ''
		),
		'Pctype' => array(
			'className' => 'Pctype',
			'foreignKey' => 'pctype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pcgrade' => array(
			'className' => 'Pcgrade',
			'foreignKey' => 'pcgrade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Pc"]))
		{
			$clumns = array(
				"ad_src_text",
				"ad_src_image",
				"ad_part_url",
				"ad_part_text",
				"ad_part_img_src",
				"ad_part_track_src",
				"price",
				"cpu",
				"graphic",
				"memory",
				"hdd",
				"drive",
				"os",
				"display",
				"other",
				"present",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Pc"][$clumn]))
				{
					$this->data["Pc"][$clumn]	= $this->mbSpaceReplace($this->data["Pc"][$clumn]);
					$this->data["Pc"][$clumn]	= $this->trim($this->data["Pc"][$clumn]);
					$this->data["Pc"][$clumn]	= $this->emptyToNull($this->data["Pc"][$clumn]);
				}
			}
		}
		return true;
	}

	function afterSave($create)
	{
		if(!empty($this->data["Pc"]["title_id"]))
		{
			return $this->Title->summaryUpdatePcs($this->data["Pc"]["title_id"]);
		}
		return true;
	}

	/**
	 * 削除後集計用タイトルID
	 *
	 * @var id
	 */
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
			$this->Title->summaryUpdatePcs($this->deleteSummaryTitleId);
		}
	}


/**
 *
 * Methods
 *
 */

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
			$conditions["Pc.title_id"] = $title_id;
		}
		$ret = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"Title.id",
				"Pc.title_id",
				"IFNULL( COUNT(Pc.name) , 0) AS pc_count",
			),
			"group" => "Title.id",
			"joins" => array(
				array(
					"table" => "titles",
					"alias" => "Title",
					"conditions" => "Title.id = Pc.title_id AND Pc.public = 1",
					"type" => "right",
				),
			),
		));
		if(!empty($title_id) && empty($ret))
		{
			$ret[0]["Title"]["id"]	= $title_id;
			$ret[0]["Pc"]["title_id"]	= $title_id;
			$ret[0][0]["pc_count"]		= 0;
		}
//		pr($ret);
//		exit;
		return $ret;
	}

/**
 * キーワードから検索conditions
 *
 * @param	string w
 * @return array
 * @access	public
 */
	function wConditions($w)
	{
		$w			= trim(str_replace("　", " ", $w));
		$w			= explode(" ", $w);
		$wConditions	= array();
		foreach($w as $val)
		{
			$wConditions = array_merge($wConditions , array(
					"Pc.name LIKE '%" . $val . "%'",
					"Pc.cpu LIKE '%" . $val . "%'",
					"Pc.graphic LIKE '%" . $val . "%'",
					"Pc.memory LIKE '%" . $val . "%'",
					"Pc.hdd LIKE '%" . $val . "%'",
					"Pc.drive LIKE '%" . $val . "%'",
					"Pc.os LIKE '%" . $val . "%'",
					"Pc.display LIKE '%" . $val . "%'",
					"Pc.other LIKE '%" . $val . "%'",
					"Pc.present LIKE '%" . $val . "%'",
			));
		}
		return $wConditions;
	}
}
?>