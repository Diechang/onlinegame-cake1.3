<?php
class Vote extends AppModel {
	var $name = 'Vote';
	var $displayField = 'id';
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

	var $virtualFields = array(
		"single_avg" => "(Vote.item1 + Vote.item2 + Vote.item3 + Vote.item4 + Vote.item5 + Vote.item6 + Vote.item7 + Vote.item8 + Vote.item9 + Vote.item10) /10",
	);

	var $validate = array(
		'review' =>array(
			"japaneseOnly" => array(
				'rule' => array('japaneseOnly'),//custom
				'message' => 'Sorry... please enter Japanese.',
				'allowEmpty' => true,
			),
		),
		'pass' => array(
			"alphaNumeric" => array(
				'rule' => array('alphaNumeric'),
				'message' => 'パスワードは半角英数字で入力してください',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			"minLength" => array(
				'rule' => array('minLength' , '2'),
				'message' => 'パスワードは2～8文字の半角英数字で入力してください',
				'allowEmpty' => true,
			),
			"maxLength" => array(
				'rule' => array('maxLength' , '8'),
				'message' => 'パスワードは2～8文字の半角英数字で入力してください',
				'allowEmpty' => true,
			),
		),
	);
	function japaneseOnly($data)
	{
		return !(strlen($data["review"]) == mb_strlen($data["review"]));
	}

	//Callbacks
	function beforeValidate()
	{
		if(!empty($this->data["Vote"]))
		{
			$clumns = array(
				"poster_name",
				"title",
				"review",
				"pass",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Vote"][$clumn]))
				{
					$this->data["Vote"][$clumn]		= $this->trim($this->data["Vote"][$clumn]);
					$this->data["Vote"][$clumn]		= $this->emptyToNull($this->data["Vote"][$clumn]);
				}
			}
		}
		return true;
	}

	function afterSave($create)
	{
		$this->clearElementCache("global_header");
		$this->clearElementCache("left_ranking");

		if(!empty($this->data["Vote"]["title_id"]))
		{
			return $this->Title->summaryUpdateVotes($this->data["Vote"]["title_id"]);
		}

		return true;
	}

	function afterDelete()
	{
		$this->clearElementCache("global_header");
		$this->clearElementCache("left_ranking");
		return $this->Title->summaryUpdateVotes();
	}


/** Properties
------------------------------ **/

/**
 * 最大点数
 *
 * @var		number
 * @access	public
 */
	var $maxpoint = 5;

/**
 * 評価項目 array("item" => array("label","abbr","ask");)
 *
 * @var		array
 * @access	public
 */
	var $voteItems = array(
		"item1" => array(
			"label"	=> "単純に面白さ",
			"abbr"	=> "面白さ",
			"ask"	=> "ぶっちゃけ面白い？",
		),
		"item2" => array(
			"label"	=> "オリジナリティ",
			"abbr"	=> "オリ",
			"ask"	=> "オリジナリティは？",
		),
		"item3" => array(
			"label"	=> "難易度",
			"abbr"	=> "難易度",
			"ask"	=> "わかりやすい？簡単？",
		),
		"item4" => array(
			"label"	=> "グラフィック",
			"abbr"	=> "グラ",
			"ask"	=> "グラフィックは好き？",
		),
		"item5" => array(
			"label"	=> "音楽",
			"abbr"	=> "音楽",
			"ask"	=> "音楽・BGMは好き？",
		),
		"item6" => array(
			"label"	=> "世界観・ストーリー",
			"abbr"	=> "スト",
			"ask"	=> "世界観はどう？",
		),
		"item7" => array(
			"label"	=> "キャラメイクの個性",
			"abbr"	=> "キャラ",
			"ask"	=> "自キャラに個性出せる？",
		),
		"item8" => array(
			"label"	=> "コミュニケーション性",
			"abbr"	=> "コミュ",
			"ask"	=> "みんなで楽しめる？",
		),
		"item9" => array(
			"label"	=> "イベントの充実",
			"abbr"	=> "イベ",
			"ask"	=> "イベントはよくやってる？",
		),
		"item10" => array(
			"label"	=> "料金設定",
			"abbr"	=> "料金",
			"ask"	=> "料金設定は？",
		),
	);


/** Methods
------------------------------ **/

/**
 * 新着順投稿取得
 *
 * @param	number	$title_id
 * @param	bool	$review
 * @param	number	$limit
 * @return	array
 * @access	public
 */
	function getNewer($title_id = null , $review = false , $limit = null)
	{
		$conditions = array("Vote.public" => 1);
		if($title_id != null)
		{
			$conditions += array("Vote.title_id" => $title_id);
		}
		if($review == true)
		{
			$conditions += array("NOT" => array("Vote.review" => NULL));
		}
		return $this->find('all' , array(
			"conditions" => $conditions,
			"fields" => array(
				"Vote.id",
				"Vote.public",
				"Vote.title_id",
				"Vote.item1",
				"Vote.poster_name",
				"Vote.title",
				"Vote.review",
				"Vote.pass",
				"Vote.created",
				"Vote.single_avg",
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name"
				),
			"order" => "Vote.id DESC",
			"limit" => $limit
		));
	}

/**
 * タイトル評価点数
 *
 * @param	number	$title_id
 * @param	string	$term (null == "all") or "-90days" or "-1year"
 * @param	bool	$details Details of items
 * @return	array
 * @access	public
 */
	function titleRatings($title_id , $term = null , $details = false)
	{
		$ret = array();
		/** 評価集計
		------------------------------ **/
		$conditions = array(
			"Vote.title_id" => $title_id,
			"Vote.public" => 1,
		);
		if(!empty($term))
		{
			$conditions["Vote.modified >"] = date("Y-m-d", strtotime($term));
		}
		$ratings = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"COUNT(Vote.item1) AS vote_count_vote",
				"COUNT(Vote.review) AS vote_count_review",
				"AVG(Vote.item1) AS vote_avg_item1",
				"AVG(Vote.item2) AS vote_avg_item2",
				"AVG(Vote.item3) AS vote_avg_item3",
				"AVG(Vote.item4) AS vote_avg_item4",
				"AVG(Vote.item5) AS vote_avg_item5",
				"AVG(Vote.item6) AS vote_avg_item6",
				"AVG(Vote.item7) AS vote_avg_item7",
				"AVG(Vote.item8) AS vote_avg_item8",
				"AVG(Vote.item9) AS vote_avg_item9",
				"AVG(Vote.item10) AS vote_avg_item10",
				"AVG((Vote.item1 + Vote.item2 + Vote.item3 + Vote.item4 + Vote.item5 + Vote.item6 + Vote.item7 + Vote.item8 + Vote.item9 + Vote.item10) / 10) AS vote_avg_all",
			),
			"group" => "Vote.title_id",
		));
		//
//		pr($ratings);
		if(empty($ratings))
		{
			$ratings[0][0] = array(
				"vote_count_vote" => 0,
				"vote_count_review" => 0,
				"vote_avg_item1" => 0,
				"vote_avg_item2" => 0,
				"vote_avg_item3" => 0,
				"vote_avg_item4" => 0,
				"vote_avg_item5" => 0,
				"vote_avg_item6" => 0,
				"vote_avg_item7" => 0,
				"vote_avg_item8" => 0,
				"vote_avg_item9" => 0,
				"vote_avg_item10" => 0,
				"vote_avg_all" => 0,
			);
		}
		//
		$ret["ratings"] = $ratings[0][0];

		/** 評価内訳
		------------------------------ **/
		if($details == true)
		{
			$votes = $this->find("all" , array(
				"recursive" => -1,
				"conditions" => $conditions,
				"fields" => array(
					"item1",
					"item2",
					"item3",
					"item4",
					"item5",
					"item6",
					"item7",
					"item8",
					"item9",
					"item10",
				),
			));
			/** 振り分け
			------------------------------ **/
			$details = $this->voteItems;
			foreach($details as &$detail)
			{
				$detail += array(
					"5pt" => 0,
					"4pt" => 0,
					"3pt" => 0,
					"2pt" => 0,
					"1pt" => 0,
				);
			}
			foreach($votes as $vote)
			{
				foreach($details as $key => $val)
				{
					$details[$key][$vote["Vote"][$key] . "pt"]++;
				}
			}
			$ret["details"] = $details;
		}
		//
//		pr($ret);
//		pr($this->voteItems);
		return $ret;
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
			$conditions["Vote.title_id"] = $title_id;
		}
		$ret = $this->find("all" , array(
			"recursive" => -1,
			"conditions" => $conditions,
			"fields" => array(
				"Title.id",
				"Vote.title_id",
				"IFNULL( COUNT(Vote.item1) , 0 ) AS vote_count_vote",
				"IFNULL( COUNT(Vote.review) , 0 ) AS vote_count_review",
				'IFNULL( AVG(Vote.item1) , 0 ) AS vote_avg_item1',
				'IFNULL( AVG(Vote.item2) , 0 ) AS vote_avg_item2',
				'IFNULL( AVG(Vote.item3) , 0 ) AS vote_avg_item3',
				'IFNULL( AVG(Vote.item4) , 0 ) AS vote_avg_item4',
				'IFNULL( AVG(Vote.item5) , 0 ) AS vote_avg_item5',
				'IFNULL( AVG(Vote.item6) , 0 ) AS vote_avg_item6',
				'IFNULL( AVG(Vote.item7) , 0 ) AS vote_avg_item7',
				'IFNULL( AVG(Vote.item8) , 0 ) AS vote_avg_item8',
				'IFNULL( AVG(Vote.item9) , 0 ) AS vote_avg_item9',
				'IFNULL( AVG(Vote.item10) , 0 ) AS vote_avg_item10',
				'IFNULL( AVG( (Vote.item1 + Vote.item2 + Vote.item3 + Vote.item4 + Vote.item5 + Vote.item6 + Vote.item7 + Vote.item8 + Vote.item9 + Vote.item10) /10 ) , 0 ) AS vote_avg_all',
			),
			"group" => "Title.id",
			"joins" => array(
				array(
					"table" => "titles",
					"alias" => "Title",
					"conditions" => "Title.id = Vote.title_id AND Vote.public = 1",
					"type" => "right",
				),
			),
		));
		if(!empty($title_id) && empty($ret))
		{
			$ret[0]["Title"]["id"]		= $title_id;
			$ret[0]["Vote"]["title_id"]	= $title_id;
			$ret[0][0] = array(
				"fansite_count"		=> 0,
				"vote_count_vote"	=> 0,
				"vote_count_review"	=> 0,
				"vote_avg_item1"	=> 0,
				"vote_avg_item2"	=> 0,
				"vote_avg_item3"	=> 0,
				"vote_avg_item4"	=> 0,
				"vote_avg_item5"	=> 0,
				"vote_avg_item6"	=> 0,
				"vote_avg_item7"	=> 0,
				"vote_avg_item8"	=> 0,
				"vote_avg_item9"	=> 0,
				"vote_avg_item10"	=> 0,
				"vote_avg_all"		=> 0,
			);
		}
//		pr($ret);
//		exit;
		return $ret;
	}
}
?>