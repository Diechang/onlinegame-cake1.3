<?php
class TitlesController extends AppController {

	var $name		= 'Titles';
	var $components	= array("TitleData" , "LumpEdit");
	var $helpers	= array("TitlePage" , "VotePage");

	function index()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee" , "Spec" , "Portal" , "Package"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		//投稿データ
//		$ratings = $this->Title->Vote->titleRatings($title["Title"]["id"]);
//		pr($ratings);
//		exit;

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("relations" , $relations);
	}

	function rating()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//期間別評価
		$ratings["all"]		= $this->Title->Vote->titleRatings($title["Title"]["id"] , null , true);
		$ratings["year"]	= $this->Title->Vote->titleRatings($title["Title"]["id"] , "-1year" , true);
		$ratings["days"]	= $this->Title->Vote->titleRatings($title["Title"]["id"] , "-90days" , true);
//		pr($ratings);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("ratings" , $ratings);
		$this->set("voteItems" , $this->Title->Vote->voteItems);
		$this->set("relations" , $relations);
	}

	function review()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//レビュー
		$reviews = $this->Title->Vote->getNewer($title["Title"]["id"] , true);
//		pr($reviews);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("reviews" , $reviews);
		$this->set("voteItems" , $this->Title->Vote->voteItems);
		$this->set("relations" , $relations);
	}

	function allvotes()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//レビュー
		$votes = $this->Title->Vote->getNewer($title["Title"]["id"]);
//		pr($votes);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("votes" , $votes);
		$this->set("voteItems" , $this->Title->Vote->voteItems);
		$this->set("relations" , $relations);
	}

	function single()
	{
		$this->_checkParams();
		if(empty($this->params["voteid"]))
		{
			$this->redirect(array("controller" => "titles" , "action" => "review" , "path" => $this->params["path"] , "ext" => "html"));
		}

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//投稿データ
		$vote = $this->Title->Vote->find("first" , array(
			"recursive" => -1,
			"conditions" => array(
				"Vote.public" => 1,
				"Vote.id" => $this->params["voteid"],
				"Vote.title_id" => $title["Title"]["id"],
			),
		));
		$this->_emptyToHome($vote);
//		pr($vote);
//		exit;

		//前後
		$neighbors = $this->Title->Vote->find("neighbors" , array(
			"recursive" => -1,
			"conditions" => array(
				"Vote.public" => 1,
				"Vote.title_id" => $title["Title"]["id"],
				"NOT" => array("Vote.review" => null),
			),
			"field" => "Vote.id",
			"value" => $vote["Vote"]["id"],
		));
//		pr($neighbors);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("vote" , $vote);
		$this->set("neighbors" , $neighbors);
		$this->set("voteItems" , $this->Title->Vote->voteItems);
		$this->set("relations" , $relations);
		//評価のみはnoindex
		if(empty($vote["Vote"]["review"]))
		{
			$this->set("metaTags" , array("noindex"));
		}
	}

	function _events()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);

		/**
		 * イベントデータ
		 */
		if(!empty($title["Titlesummary"]["event_count"]))
		{
			$now = date("Y-m-d H:i:s");
			//開催中
			$events["current"] = $this->Title->Event->find("all" , array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.start <=" => $now,
					"Event.end >=" => $now,
				),
				"order" => "Event.start DESC"
			));
			//開催予定
			$events["future"] = $this->Title->Event->find("all" , array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.start >=" => $now,
				),
				"order" => "Event.start DESC"
			));
			//開催済み
			$events["back"] = $this->Title->Event->find("all" , array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.end <=" => $now,
				),
				"order" => "Event.start DESC"
			));
		}
		else
		{
			$events = null;
		}
//		pr($events);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("events" , $events);
		$this->set("relations" , $relations);
	}

	function _event()
	{
		$this->_checkParams();
		if(empty($this->params["eventid"]))
		{
			$this->redirect(array("controller" => "titles" , "action" => "events" , "path" => $this->params["path"] , "ext" => "html"));
		}

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//イベントデータ
		$event = $this->Title->Event->find("first" , array(
			"recursive" => -1,
			"conditions" => array(
				"Event.public" => 1,
				"Event.id" => $this->params["eventid"],
				"Event.title_id" => $title["Title"]["id"],
			),
		));
//		pr($event);
//		exit;
		$this->_emptyToHome($event);

		//一覧
		$events = $this->Title->Event->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Event.public" => 1,
				"Event.title_id" => $title["Title"]["id"],
			),
			"order" => "Event.start DESC",
		));
//		pr($events);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("event" , $event);
		$this->set("events" , $events);
		$this->set("relations" , $relations);
	}

	function pc()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		/**
		 * PCデータ
		 */
		if(!empty($title["Titlesummary"]["pc_count"]))
		{
			$pcFields	= array("Pc.*" , "Pcshop.*" , "Pctype.*" , "Pcgrade.*");
			$pcOrder	= "Pc.price";
			//pc type
			$pctypes = $this->Title->Pc->Pctype->find("all" , array(
				"recursive" => -1,
				"order" => "Pctype.sort",
			));
//			pr($pctypes);
//			exit;
			//pc grade
			$pcgrades = $this->Title->Pc->Pcgrade->find("all" , array(
				"recursive" => -1,
				"order" => "Pcgrade.sort",
			));
//			pr($pcgrades);
//			exit;

			//pickup
			$pcs["pickups"] = $this->Title->Pc->find("all" , array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.pickup" => 1,
					"Pc.title_id" => $title["Title"]["id"],
				),
				"fields" => $pcFields,
				"order" => $pcOrder,
			));
			//types
			foreach($pctypes as $pctype)
			{
				$typePcs = $this->Title->Pc->find("all" , array(
					"conditions" => array(
						"Pc.public" => 1,
						"Pc.title_id" => $title["Title"]["id"],
						"Pc.pctype_id" => $pctype["Pctype"]["id"],
					),
					"fields" => $pcFields,
					"order" => $pcOrder,
				));
				//グレード
				foreach($typePcs as $typePc)
				{
					$pcs[$pctype["Pctype"]["path"]][$typePc["Pcgrade"]["path"]][] = $typePc;
				}
			}
		}
		else
		{
			$pcs = null;
		}
//		pr($pcs);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("pcs" , $pcs);
		$this->set("pctypes" , $pctypes);
		$this->set("pcgrades" , $pcgrades);
		$this->set("relations" , $relations);
	}

	function link()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee" , "Fansite"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//サイトデータ振り分け
		$sites = array("Caps" => array() , "Fans" => array());
		foreach($title["Fansite"] as $key => $val)
		{
			switch($val["type"])
			{
				case 1 : //攻略
				array_push($sites["Caps"] , $val);
					break;
				case 2 : //ファン
				array_push($sites["Fans"] , $val);
					break;
			}
		}
		unset($title["Fansite"]);
//		pr($sites);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("sites" , $sites);
		$this->set("relations" , $relations);
	}

	function search()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary" , "Category" , "Style" , "Service" , "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id' , $title["Category"]) , $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title" , $title);
		$this->set("relations" , $relations);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		//リダイレクト
		if(!empty($this->params["url"]["w"]) or !empty($this->params["url"]["category"]) or !empty($this->params["url"]["service"]))
		{
			$url = array();
			if(!empty($this->params["url"]["w"]))			{ $url["w"]			= $this->params["url"]["w"]; }
			if(!empty($this->params["url"]["category"]))	{ $url["category"]	= $this->params["url"]["category"]; }
			if(!empty($this->params["url"]["service"]))		{ $url["service"]	= $this->params["url"]["service"]; }
			$this->redirect($url);
		}

		//SanitizepassedArgs
		App::import('Sanitize');
		$url = Sanitize::clean($this->passedArgs , Configure::read("UseDbConfig"));
//		pr($url);
//		exit;

		//
		$conditions = array();
		$title_ids	= array();
		//カテゴリ
		if(isset($this->passedArgs["category"]))
		{
			$title_ids = $this->Title->idListByCategory($this->passedArgs["category"]);
		}
		//スタイル

		//タイトルID
		if(!empty($title_ids)){ $conditions += array("Title.id" => $title_ids); }
		//
		//サービス
		if(isset($this->passedArgs["service"]))
		{
			$conditions += array("Title.service_id" => $this->passedArgs["service"]);
		}
		//検索ワード
		$w			= (isset($this->passedArgs["w"])) ? urldecode($this->passedArgs["w"]) : null;
		if(!empty($w))
		{
//			$w			= trim(str_replace("　", " ", $w));
//			$w			= explode(" ", $w);
//			$wConditions	= array();
//			foreach($w as $val)
//			{
//				$wConditions = array_merge($wConditions , array(
//						"Title.title_official LIKE '%" . $val . "%'",
//						"Title.title_read LIKE '%" . $val . "%'",
//						"Title.title_sub LIKE '%" . $val . "%'",
//						"Title.title_abbr LIKE '%" . $val . "%'",
//						"Title.url_str LIKE '%" . $val . "%'",
//						"Title.description LIKE '%" . $val . "%'",
//				));
//			}
			//
			$conditions += array("OR" => $this->Title->wConditions($w));
		}
		//
		$titles = $this->Title->find("all" , array(
			"conditions" => $conditions,
			"order" => "Title.id DESC"
		));
//		pr($titles);
		$this->set('titles', $titles);
		//
		$this->set("pankuz_for_layout" , "タイトル一覧");
		$this->set("categories" , $this->Title->Category->find("list"));
		$this->set("services" , $this->Title->Service->find("list"));
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'title'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('title', $this->Title->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			//File upload
			if(!empty($this->data["Title"]["thumb_image"]["name"]))
			{
				//アップロードするファイルの場所
				$uploadprefix	= "thumb_";
				$uploaddir		= WWW_ROOT . "img" . DS . "thumb";
				$uploadfile		= $uploaddir . DS . basename($this->data["Title"]["thumb_image"]["name"]);

				$pathinfo		= pathinfo($uploadfile);
				$filename		= $uploadprefix . $this->data["Title"]["url_str"] . "." . $pathinfo["extension"];
				$uploadfile		= $pathinfo['dirname'] . DS . $filename;
				$this->data["Title"]["thumb_image"]["name"] = $filename;
				//画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
				if(move_uploaded_file($this->data["Title"]["thumb_image"]["tmp_name"], $uploadfile))
				{
					//成功
				}
				else
				{
					//失敗したら、errorを表示
					$this->Session->setFlash(Configure::read("Error.upload"));
				}
				$this->data["Title"]["thumb_name"]	= $filename;
			}
			$this->data["Title"]["thumb_image"]	= NULL;
			//
			$this->Title->create();
			if($this->Title->save($this->data))
			{
				$this->data["Titlesummary"]["id"]		= $this->Title->id;
				$this->data["Titlesummary"]["title_id"] = $this->Title->id;
//				pr($this->Title);
				$this->Title->Titlesummary->create();
				if($this->Title->Titlesummary->save($this->data))
				{
					$this->Session->setFlash(Configure::read("Success.create"));
					$this->redirect('/sys');
				}
				else
				{
					$this->Session->setFlash(Configure::read("Error.summary"));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		$services = $this->Title->Service->find('list');
		$fees = $this->Title->Fee->find('list');
		$categories = $this->Title->Category->find('list');
		$styles = $this->Title->Style->find('list');
		$portals = $this->Title->Portal->find('list');
		$this->set(compact('services', 'fees', 'categories', 'styles', 'portals'));
		//
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "タイトル一覧" , "url" => array("action" => "index")),
			"新規登録",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//File upload
			if(!empty($this->data["Title"]["thumb_image"]["name"]))
			{
				//アップロードするファイルの場所
				$uploadprefix	= "thumb_";
				$uploaddir		= WWW_ROOT . "img" . DS . "thumb";
				$uploadfile		= $uploaddir . DS . basename($this->data["Title"]["thumb_image"]["name"]);

				$pathinfo		= pathinfo($uploadfile);
				$filename		= $uploadprefix . $this->data["Title"]["url_str"] . "." . $pathinfo["extension"];
				$uploadfile		= $pathinfo['dirname'] . DS . $filename;
				$this->data["Title"]["thumb_image"]["name"] = $filename;
				//画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
				if(move_uploaded_file($this->data["Title"]["thumb_image"]["tmp_name"], $uploadfile))
				{
					//成功
				}
				else
				{
					//失敗したら、errorを表示
					$this->Session->setFlash(Configure::read("Error.upload"));
				}
				$this->data["Title"]["thumb_name"]	= $filename;
			}
			$this->data["Title"]["thumb_image"]	= NULL;
			//
			if ($this->Title->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect('/sys');
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Title->read(null, $id);
		}
		$services = $this->Title->Service->find('list');
		$fees = $this->Title->Fee->find('list');
		$categories = $this->Title->Category->find('list');
		$styles = $this->Title->Style->find('list');
		$portals = $this->Title->Portal->find('list');
		$this->set(compact('services', 'fees', 'categories', 'styles', 'portals'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "タイトル一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Title"] , $this->Title))
			{
//				pr($this->data["Title"]);
//				exit;
				if ($this->Title->saveAll($this->data["Title"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdateAll()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
				} else {
					$this->Session->setFlash(Configure::read("Error.lump"));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		$this->redirect($this->referer('/sys'));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Title->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}

	function sys_update($id = null)
	{
		if(!empty($id))
		{
			$this->Session->setFlash(Configure::read(($this->Title->summaryUpdateTitle($id)) ? "Success.summary_update" : "Error.summary_update" ));
		}
		else
		{
			$this->Session->setFlash(Configure::read("Error.id"));
		}
			//
			$this->set("pankuz_for_layout" , array(
				array("str" => "タイトル一覧" , "url" => array("action" => "index")),
				"タイトル集計更新",
			));
	}

	function sys_updateall()
	{
		$this->Session->setFlash(Configure::read(($this->Title->summaryUpdateAll()) ? "Success.summary_update_all" : "Error.summary_update_all" ));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "タイトル一覧" , "url" => array("action" => "index")),
			"全タイトル集計更新",
		));
	}


/** Private methods
------------------------------ **/

/**
 * タイトルデータ取得
 *
 * @return	array
 * @access	private
 */
	function _getTitleData()
	{
		return $this->Title->find("first", array(
			"conditions" => array(
				"Title.url_str" => $this->params["path"],
			)
		));
	}

/**
 * タイトルデータ取得後のデータ有無チェック＆投稿可否
 *
 * @param	array	$title Title data
 * @return	void
 * @access	private
 */
	function _afterGetTitleData(&$title)
	{
		//リダイレクト
		$this->_emptyToHome($title["Title"]["public"]);
		//Check votable
		$title["Title"]["votable"] = $this->TitleData->votable($title["Title"]["service_id"] , $title["Title"]["test_start"]);
	}
}
?>