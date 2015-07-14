<?php
class Event extends AppModel {
	var $name = 'Event';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'summary' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//Callbacks
	function beforeValidate()
	{
//		pr($this->data);
//		exit;
		if(!empty($this->data["Event"]))
		{
			$clumns = array(
				"name",
				"summary",
				"details",
				"press",
				"copyright",
//				"start",
//				"end",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Event"][$clumn]))
				{
					$this->data["Event"][$clumn]	= $this->mbSpaceReplace($this->data["Event"][$clumn]);
					$this->data["Event"][$clumn]	= $this->trim($this->data["Event"][$clumn]);
					$this->data["Event"][$clumn]	= $this->emptyToNull($this->data["Event"][$clumn]);
				}
			}
		}
		return true;
	}

	function afterSave($create)
	{
		if(!empty($this->data["Event"]["title_id"]))
		{
			return $this->Title->summaryUpdateEvents($this->data["Event"]["title_id"]);
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
			$this->Title->summaryUpdateEvents($this->deleteSummaryTitleId);
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
			$conditions["Event.title_id"] = $title_id;
		}
		$ret = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"Title.id",
				"Event.title_id",
				"IFNULL( COUNT(Event.name) , 0) AS event_count",
			),
			"group" => "Title.id",
			"joins" => array(
				array(
					"table" => "titles",
					"alias" => "Title",
					"conditions" => "Title.id = Event.title_id AND Event.public = 1",
					"type" => "right",
				),
			),
		));
		if(!empty($title_id) && empty($ret))
		{
			$ret[0]["Title"]["id"]	= $title_id;
			$ret[0]["Event"]["title_id"]	= $title_id;
			$ret[0][0]["event_count"]		= 0;
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
					"Event.name LIKE '%" . $val . "%'",
					"Event.summary LIKE '%" . $val . "%'",
					"Event.details LIKE '%" . $val . "%'",
			));
		}
		return $wConditions;
	}
}
?>