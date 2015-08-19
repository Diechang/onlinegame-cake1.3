<?php
class Title extends AppModel {
	var $name = 'Title';

	//Virtual Fields
	var $VF = array(
		'vote_count_vote'	=> 'SELECT COUNT( v.item1 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_count_review'	=> 'SELECT COUNT( v.review ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item1'	=> 'SELECT AVG( v.item1 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item2'	=> 'SELECT AVG( v.item2 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item3'	=> 'SELECT AVG( v.item3 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item4'	=> 'SELECT AVG( v.item4 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item5'	=> 'SELECT AVG( v.item5 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item6'	=> 'SELECT AVG( v.item6 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item7'	=> 'SELECT AVG( v.item7 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item8'	=> 'SELECT AVG( v.item8 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item9'	=> 'SELECT AVG( v.item9 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_item10'	=> 'SELECT AVG( v.item10 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'vote_avg_all'		=> 'SELECT AVG( (v.item1 + v.item2 + v.item3 + v.item4 + v.item5 + v.item6 + v.item7 + v.item8 + v.item9 + v.item10) /10 ) FROM votes AS v WHERE v.title_id = Title.id AND v.public = 1 GROUP BY v.title_id',
		'fansite_count'		=> 'SELECT COUNT(f.site_url) FROM fansites AS f WHERE f.title_id = Title.id AND f.public = 4 GROUP BY f.title_id',
	);

	var $displayField = 'title_official';
	var $validate = array(
		"public" => array(
			"boolean" => array(
				"rule" => array("boolean"),
				//"message" => "Your custom message here",
				//"allowEmpty" => false,
				//"required" => false,
				//"last" => false, // Stop validation after this rule
				//"on" => "create", // Limit validation to "create" or "update" operations
			),
		),
		"title_official" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "※必須",
			),
		),
		"url_str" => array(
			"isUnique" => array(
				"rule" => "isUnique",
				"message" => "重複しています"
			),
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "※必須",
			),
		),
		"service_id" => "numeric",
		"fee_id" => "numeric",
		"ad_use" => "boolean",
		"official_url" => array(
			"url" => array(
				"rule" => "url",
				"message" => "URL形式"
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fee' => array(
			'className' => 'Fee',
			'foreignKey' => 'fee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasOne = array(
		'Titlesummary' => array(
			'className' => 'Titlesummary',
			'foreignKey' => 'title_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => ''
		)
	);

	var $hasMany = array(
		'Fansite' => array(
			'className' => 'Fansite',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array('Fansite.public' => 1),
			'fields' => '',
			'order' => array('link_url is NULL ASC' , 'id'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Vote' => array(
			'className' => 'Vote',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array('Vote.public' => 1),
			'fields' => '',
			'order' => 'created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Spec' => array(
			'className' => 'Spec',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array(),
			'fields' => '',
			'order' => array('sort' , 'created DESC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pc' => array(
			'className' => 'Pc',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array('Pc.public' => 1),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array('Event.public' => 1),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Package' => array(
			'className' => 'Package',
			'foreignKey' => 'title_id',
			'dependent' => false,
			'conditions' => array('Package.public' => 1),
			'fields' => '',
			'order' => 'release DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'categories_titles',
			'foreignKey' => 'title_id',
			'associationForeignKey' => 'category_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'sort',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Style' => array(
			'className' => 'Style',
			'joinTable' => 'styles_titles',
			'foreignKey' => 'title_id',
			'associationForeignKey' => 'style_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'sort',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Portal' => array(
			'className' => 'Portal',
			'joinTable' => 'portals_titles',
			'foreignKey' => 'title_id',
			'associationForeignKey' => 'portal_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	//Callbacks
	function afterSave()
	{
		$this->clearElementCache("global_header");
		$this->clearElementCache("right_pickup");
		$this->clearElementCache("right_test");
		$this->clearElementCache("left_ranking");
	}

	function afterDelete()
	{
		$this->clearElementCache("global_header");
		$this->clearElementCache("right_pickup");
		$this->clearElementCache("right_test");
		$this->clearElementCache("left_ranking");
	}
	function beforeValidate()
	{
		if(!empty($this->data["Title"]))
		{
			$clumns = array(
				"title_official",
				"title_read",
				"title_sub",
				"title_abbr",
				"keyword",
				"url_str",
				"description",
				"category_text",
				"fee_text",
				"ad_text",
				"ad_banner_s",
				"ad_banner_m",
				"ad_banner_l",
				"official_url",
				"copyright",
				"video",
			);
			//
			foreach($clumns as $clumn)
			{
				if(isset($this->data["Title"][$clumn]))
				{
					$this->data["Title"][$clumn]		= $this->trim($this->data["Title"][$clumn]);
					$this->data["Title"][$clumn]		= $this->emptyToNull($this->data["Title"][$clumn]);
				}
			}
			//正式サービス or 終了ならテスト期間 null
			if(isset($this->data["Title"]["service_id"]) && ($this->data["Title"]["service_id"] == 1 or $this->data["Title"]["service_id"] == 2))
			{
				$this->data["Title"]["test_start"] = null;
				$this->data["Title"]["test_end"] = null;
			}
		}
		return true;
	}


	/**
	 *
	 * Methods
	 *
	 */

/**
 * カテゴリ内タイトルIDリスト
 *
 * @param	mixed	$category_id
 * @return	array
 * @access	public
 */
	function idListByCategory(&$category_id)
	{
		if(isset($category_id))
		{
			$ids = $this->CategoriesTitle->find("list" , array(
				"conditions" => array("CategoriesTitle.category_id" => $category_id),
				"fields" => "CategoriesTitle.title_id",
			));
		}
		else
		{
			$ids = null;
		}

		return $ids;
	}

/**
 * スタイル内タイトルIDリスト
 *
 * @param	mixed	$style_id
 * @return	array
 * @access	public
 */
	function idListByStyle(&$style_id)
	{
		if(isset($style_id))
		{
			$ids = $this->StylesTitle->find("list" , array(
				"conditions" => array("style_id" => $style_id),
				"fields" => "title_id",
			));
		}
		else
		{
			$ids = null;
		}

		return $ids;
	}

/**
 * 検索
 *
 * @param	mixed	$option to Extract
 * @option	array	$category_id
 * @option	array	$style_id
 * @option	array	$service_id
 * @option	number	$start_year
 * @option	bool	$fee_free
 * @param	number	$page
 * @return	array
 * @access	public
 */
	function search($option = array() , $page = 1)
	{

	}

/**
 * ランキング取得
 *
 * @param	mixed	$option to Extract
 * @option	string	$type "point" or "count"
 * @option	string	$term (null == "all") or "-90days" or "-1year"
 * @option	number	$limit
 * @option	array	$category_id
 * @option	array	$style_id
 * @option	array	$service_id
 * @option	number	$start_year
 * @option	bool	$idList
 * @return	array
 * @access	public
 */
	function getRanking($option = array())
	{
		//引数からオプション変数
		extract($option);
		if(!isset($type)) { $type = "point"; }	//デフォルト点数ランキング

		$titleIdList = $this->getRankTitleIdList($category_id , $style_id);

		/**
		 * Find
		 */
		//conditions
		$conditions = $this->setRankConditions($service_id , $start_year);
		//find
		$rankings = (isset($term))	? $this->findTermRank($conditions , $titleIdList , $term , $limit , $type)
									: $this->findSummaryRank($conditions , $titleIdList , $limit , $type);
		if(isset($idList)) { $rankings["idList"] = ($idList) ? $titleIdList : null; }
//		pr($rankings);
//		exit;
		return $rankings;
	}

/**
 * ランキング用タイトルID取得
 *
 * @param	array	$category_id
 * @param	array	$style_id
 * @return	array
 * @access	private
 */
	private function getRankTitleIdList(&$category_id , &$style_id)
	{
		$titleIdList = array();
		//カテゴリからタイトルID
		$idListByCategory	= (isset($category_id))	? $this->idListByCategory($category_id)	: null;
		//スタイルからタイトルID
		$idListByStyle		= (isset($style_id))	? $this->idListByStyle($style_id)		: null;
		//タイトルID
		if(!empty($idListByCategory) and !empty($idListByStyle))
		{//カテゴリとスタイル指定時
			$titleIdList	= array_intersect($idListByCategory , $idListByStyle);
		}
		elseif(!empty($idListByCategory))
		{//カテゴリのみ指定時
			$titleIdList	= $idListByCategory;
		}
		elseif(!empty($idListByStyle))
		{//スタイルのみ指定時
			$titleIdList	= $idListByStyle;
		}
		else
		{
			$titleIdList	= null;
		}
//		pr($titleIdList);
		return $titleIdList;
	}

/**
 * ランキング用初期コンディションセット
 *
 *
 */
	private function setRankConditions(&$service_id , &$start_year)
	{
		$conditions = array(
			"Title.public" => 1,
			"Title.service_id" => array(2,3),
		);
		if(isset($service_id)){		$conditions["Title.service_id"]			= $service_id; }
		if(isset($start_year))
		{
			$conditions["Title.service_start LIKE"]	= $start_year . "%";
		}
		else
		{
			$conditions["OR"] = array(
				"Title.service_start > " => date("Y-m-d", strtotime("-3year")),
				"Title.test_start > " => date("Y-m-d", strtotime("-3year"))
			);
		}
//		pr($conditions);
		return $conditions;
	}

/**
 * ランキングオーダーセット
 *
 * @param	string $type "point" or "count"
 * @return	array
 * @access	private
 */
	private function setRankOrder(&$type)
	{
		return ($type == "point")	? array("vote_avg_all DESC" , "vote_count_vote DESC" , "Title.title_official")
									: array("vote_count_vote DESC" , "vote_count_review DESC" , "Title.title_official");
	}

/**
 * 全期間ランキングfind
 *
 * @params	mixed	$conditions
 * @params	number	$limit
 * @params	string	$type "point" or "count"
 * @return	array
 * @access	private
 */
	private function findSummaryRank(&$conditions , &$titleIdList , &$limit , &$type)
	{
		$this->unbindAll(array("Titlesummary"));
		$conditions["vote_count_vote >"] = 0;
		if(isset($titleIdList)){ $conditions["Title.id"] = $titleIdList; }
		$ranking = $this->find("all" , array(
			"conditions" => $conditions,
			"order" => $this->setRankOrder($type),
			"limit" => (isset($limit)) ? $limit : null,
		));

		return $ranking;
	}


/**
 * 期間別ランキングfind
 *
 * @params	mixed	$conditions
 * @params	number	$limit
 * @params	string	$type "point" or "count"
 * @return	array
 * @access	private
 */
	private function findTermRank(&$conditions , &$titleIdList , &$term , &$limit , &$type)
	{
		$conditions["Vote.public"]			= 1;
		$conditions["vote_count_vote >"]	= 0;
		if(isset($titleIdList)){	$conditions["Vote.title_id"]			= $titleIdList; }
		if(isset($term)){			$conditions["Vote.modified >"]			= date("Y-m-d", strtotime($term)); }
		$ranking = $this->Vote->find("all" , array(
			"conditions" => $conditions,
			"fields" => array(
				"Title.*",
				"COUNT(Vote.item1) AS vote_count_vote",
				"COUNT(Vote.review) AS vote_count_review",
				"AVG(Vote.item1) AS vote_avg_item1",
				"AVG((Vote.item1 + Vote.item2 + Vote.item3 + Vote.item4 + Vote.item5 + Vote.item6 + Vote.item7 + Vote.item8 + Vote.item9 + Vote.item10) / 10) AS vote_avg_all",
			),
			"order" => $this->setRankOrder($type),
			"group" => "Vote.title_id",
			"limit" => (isset($limit)) ? $limit : null,
		));
		//集計キー[0]を["Titlesummary"]に
		foreach($ranking as &$rank)
		{
			$rank["Titlesummary"] = $rank[0];
			unset($rank[0]);
		}
		return $ranking;
	}

/**
 * カテゴリからおすすめタイトル
 *
 * @param	mixed	$categories Category id
 * @param	number	$title_id
 * @return	array
 * @access	public
 */
	function relations($categories , $title_id = null)
	{
		$titles = $this->idListByCategory($categories);
//		pr($titles);
		$this->unbindAll(array("Titlesummary"));
		$data = $this->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.id" => $titles,
				"Title.service_id" => 2,
				"Title.ad_use" => 1,
				"NOT" => array("Title.id" => $title_id),
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.service_id",
				"Title.ad_use",
				"Title.ad_text",
				"Title.official_url",
				"Titlesummary.*"
			),
			"limit" => 5,
			"order" => array("Titlesummary.vote_avg_all DESC , Titlesummary.vote_count_vote DESC"),
		));
		//
		return $data;
	}

/**
 * 集計アップデート投稿
 *
 * @param	number	$id
 * @return bool
 */
	function summaryUpdateVotes($id = null)
	{
		$summary = $this->Vote->summary($id);
		foreach($summary as $key => $val)
		{
			$data["Titlesummary"][$key]				= array_merge($val["Vote"] , $val[0]);
			$data["Titlesummary"][$key]["id"]		= $val["Title"]["id"];
			$data["Titlesummary"][$key]["title_id"]	= $val["Title"]["id"];
		}
//		pr($data);
//		exit;
		return $this->Titlesummary->saveAll($data["Titlesummary"]);
	}

/**
 * 集計アップデートファンサイト
 *
 * @param	number	$id
 * @return	bool
 */
	function summaryUpdateFansites($id = null)
	{
		$summary = $this->Fansite->summary($id);
		foreach($summary as $key => $val)
		{
			$data["Titlesummary"][$key]				= array_merge($val["Fansite"] , $val[0]);
			$data["Titlesummary"][$key]["id"]		= $val["Title"]["id"];
			$data["Titlesummary"][$key]["title_id"]	= $val["Title"]["id"];
		}
//		pr($data);
//		exit;
		return $this->Titlesummary->saveAll($data["Titlesummary"]);
	}

/**
 * 集計アップデートパッケージ
 *
 * @param	number	$id
 * @return	bool
 */
	function summaryUpdatePackages($id = null)
	{
		$summary = $this->Package->summary($id);
		foreach($summary as $key => $val)
		{
			$data["Titlesummary"][$key]				= array_merge($val["Package"] , $val[0]);
			$data["Titlesummary"][$key]["id"]		= $val["Title"]["id"];
			$data["Titlesummary"][$key]["title_id"]	= $val["Title"]["id"];
		}
//		pr($data);
//		exit;
		return $this->Titlesummary->saveAll($data["Titlesummary"]);
	}

/**
 * 集計アップデート推奨PC
 *
 * @param	number	$id
 * @return	bool
 */
	function summaryUpdatePcs($id = null)
	{
		$summary = $this->Pc->summary($id);
		foreach($summary as $key => $val)
		{
			$data["Titlesummary"][$key]				= array_merge($val["Pc"] , $val[0]);
			$data["Titlesummary"][$key]["id"]		= $val["Title"]["id"];
			$data["Titlesummary"][$key]["title_id"]	= $val["Title"]["id"];
		}
//		pr($data);
//		exit;
		return $this->Titlesummary->saveAll($data["Titlesummary"]);
	}

/**
 * 集計アップデートイベント
 *
 * @param	number	$id
 * @return	bool
 */
	function summaryUpdateEvents($id = null)
	{
		$summary = $this->Event->summary($id);
		foreach($summary as $key => $val)
		{
			$data["Titlesummary"][$key]				= array_merge($val["Event"] , $val[0]);
			$data["Titlesummary"][$key]["id"]		= $val["Title"]["id"];
			$data["Titlesummary"][$key]["title_id"]	= $val["Title"]["id"];
		}
//		pr($data);
//		exit;
		return $this->Titlesummary->saveAll($data["Titlesummary"]);
	}

/**
 * 集計アップデートタイトル
 *
 * @param	number	$id
 * @return	bool
 */
	function summaryUpdateTitle($id = null)
	{
		if($this->summaryUpdateVotes($id))
		{
			if($this->summaryUpdateFansites($id))
			{
				if($this->summaryUpdatePcs($id))
				{
					if($this->summaryUpdateEvents($id))
					{
						return $this->summaryUpdatePackages($id);
					}
				}
			}
		}
		return false;

	}

/**
 * 集計アップデート全タイトル
 *
 * @access	public
 * @return	bool
 */
	function summaryUpdateAll()
	{
		return $this->summaryUpdateTitle();

/* テスト用リセット
update titlesummaries
set vote_count_vote = 0,
vote_count_review = 0,
vote_avg_item1 = 0,
vote_avg_item2 = 0,
vote_avg_item3 = 0,
vote_avg_item4 = 0,
vote_avg_item5 = 0,
vote_avg_item6 = 0,
vote_avg_item7 = 0,
vote_avg_item8 = 0,
vote_avg_item9 = 0,
vote_avg_item10 = 0,
vote_avg_all = 0,
fansite_count = 0;
*/
/*
UPDATE titlesummaries AS ts SET
ts.count_votes = (SELECT COUNT(v.item1) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.count_reviews = (SELECT COUNT(v.review) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.count_fansites = (SELECT COUNT(f.site_url) FROM fansites AS f WHERE f.title_id = ts.title_id group by f.title_id),
ts.avg_votes_rating = (SELECT AVG((v.item1 + v.item2 + v.item3 + v.item4 + v.item5 + v.item6 + v.item7 + v.item8 + v.item9 + v.item10) / 10) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item1 = (SELECT AVG(v.item1) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item2 = (SELECT AVG(v.item2) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item3 = (SELECT AVG(v.item3) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item4 = (SELECT AVG(v.item4) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item5 = (SELECT AVG(v.item5) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item6 = (SELECT AVG(v.item6) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item7 = (SELECT AVG(v.item7) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item8 = (SELECT AVG(v.item8) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item9 = (SELECT AVG(v.item9) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id),
ts.avg_votes_item10 =(SELECT AVG(v.item10) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
*/
/*
UPDATE titlesummaries AS ts SET ts.count_votes = (SELECT COUNT(v.item1) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.count_reviews = (SELECT COUNT(v.review) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.count_fansites = (SELECT COUNT(f.site_url) FROM fansites AS f WHERE f.title_id = ts.title_id group by f.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_rating = (SELECT AVG((v.item1 + v.item2 + v.item3 + v.item4 + v.item5 + v.item6 + v.item7 + v.item8 + v.item9 + v.item10) / 10) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item1 = (SELECT AVG(v.item1) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item2 = (SELECT AVG(v.item2) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item3 = (SELECT AVG(v.item3) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item4 = (SELECT AVG(v.item4) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item5 = (SELECT AVG(v.item5) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item6 = (SELECT AVG(v.item6) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item7 = (SELECT AVG(v.item7) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item8 = (SELECT AVG(v.item8) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item9 = (SELECT AVG(v.item9) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
UPDATE titlesummaries AS ts SET ts.avg_votes_item10 =(SELECT AVG(v.item10) FROM votes AS v WHERE v.title_id = ts.title_id and v.public = 1 group by v.title_id);
*/
	}

	/**
	 * 集計カウント付タイトルリスト
	 *
	 * @param	string	summaryField Titlesummary.$
	 * @param	string	modelName
	 * @return	array
	 * @access	public
	 */
	function titleListWithSummaryCount($summaryField, $modelName)
	{
		$counts = $this->Titlesummary->find("all" , array(
			"conditions" => array(
				"Title.id" => array_unique($this->$modelName->find("list" , array("fields" => $modelName . ".title_id")))
			),
			"fields" => array(
				"Title.id",
				"Title.title_official",
				"Titlesummary." . $summaryField,
			),
			"order" => "Title.title_official",
		));
//		pr($counts);
//		exit;
		return $counts;
	}


	/**
	 * キーワードから検索conditions
	 *
	 * @param	string w
	 * @return	array
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
					"Title.title_official LIKE '%" . $val . "%'",
					"Title.title_read LIKE '%" . $val . "%'",
					"Title.title_sub LIKE '%" . $val . "%'",
					"Title.title_abbr LIKE '%" . $val . "%'",
					"Title.url_str LIKE '%" . $val . "%'",
					"Title.description LIKE '%" . $val . "%'",
			));
		}
		return $wConditions;
	}
}
?>