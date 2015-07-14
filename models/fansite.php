<?php
class Fansite extends AppModel {
	var $name = 'Fansite';
	var $displayField = 'site_name';
	var $validate = array(
		"site_name" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "必須項目です",
			)
		),
		"site_url" => array(
			"url" => array(
				"rule" => "url",
				"message" => "URL形式が不正です",
			),
			"overlap" => array(
				"rule" => array("validateOverlap"),
				"message"=> "URLがすでに登録されています。",
			),
		),
		"link_url" => array(
			"url" => array(
				"rule" => "url",
				"message" => "URL形式が不正です",
				"allowEmpty" => true,
			),
		),
		"admin_mail" => array(
			"email" => array(
				"rule" => "email",
				"message" => "アドレス形式が不正です",
				"allowEmpty" => true,
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
		if(!empty($this->data["Fansite"]))
		{
			$clumns = array(
				"site_name",
				"site_url",
				"link_url",
				"admin_mail",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Fansite"][$clumn]))
				{
					$this->data["Fansite"][$clumn]		= $this->trim($this->data["Fansite"][$clumn]);
					$this->data["Fansite"][$clumn]		= $this->emptyToNull($this->data["Fansite"][$clumn]);
				}
			}
			//Trim
//			$this->data["Fansite"]["site_name"]		= $this->trim($this->data["Fansite"]["site_name"]);
//			$this->data["Fansite"]["site_url"]		= $this->trim($this->data["Fansite"]["site_url"]);
//			$this->data["Fansite"]["link_url"]		= $this->trim($this->data["Fansite"]["link_url"]);
//			$this->data["Fansite"]["admin_mail"]	= $this->trim($this->data["Fansite"]["admin_mail"]);
			//Empty to Null
//			$this->data["Fansite"]["description"]	= $this->emptyToNull($this->data["Fansite"]["description"]);
//			$this->data["Fansite"]["link_url"]		= $this->emptyToNull($this->data["Fansite"]["link_url"]);
//			$this->data["Fansite"]["admin_mail"]	= $this->emptyToNull($this->data["Fansite"]["admin_mail"]);
		}
		return true;
	}

	function afterSave($create)
	{
		if(!empty($this->data["Fansite"]["title_id"]))
		{
			return $this->Title->summaryUpdateFansites($this->data["Fansite"]["title_id"]);
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
			$this->Title->summaryUpdateFansites($this->deleteSummaryTitleId);
		}
	}


/** Methods
------------------------------ **/

/**
 * 重複チェック
 *
 * $param	mixed	$data
 */
	function validateOverlap($data)
	{
		if(isset($this->data["Fansite"]["id"]))
		{//編集時
			return true;
		}
		else
		{
			$overlapCount = $this->find("count" , array(
				"conditions" => array(
					"title_id" => $this->data["Fansite"]["title_id"],
					"site_url" => $data["site_url"],
				),
			));
			return $overlapCount < 1;
		}
	}

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
			$conditions["Fansite.title_id"] = $title_id;
		}
		$ret = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"Title.id",
				"Fansite.title_id",
				"IFNULL( COUNT(Fansite.site_url) , 0) AS fansite_count",
			),
			"group" => "Title.id",
			"joins" => array(
				array(
					"table" => "titles",
					"alias" => "Title",
					"conditions" => "Title.id = Fansite.title_id AND Fansite.public = 1",
					"type" => "right",
				),
			),
		));
		if(!empty($title_id) && empty($ret))
		{
			$ret[0]["Title"]["id"]	= $title_id;
			$ret[0]["Fansite"]["title_id"]	= $title_id;
			$ret[0][0]["fansite_count"]		= 0;
		}
//		pr($ret);
//		exit;
		return $ret;
	}
}
?>