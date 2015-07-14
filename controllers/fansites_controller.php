<?php
class FansitesController extends AppController {

	var $name = 'Fansites';
	var $components = array("Email", "LumpEdit" , "Common");

	function add($id)
	{
		/**
		 * Title data
		 */
		$title = $this->Title->find("first" , array(
			"conditions" => array(
				"Title.id" => $id,
			)
		));
// 		pr($title);
// 		exit;
		if(!empty($this->data))
		{
			//認証番号チェック
			if($this->Common->spamCheck($this->data["Fansite"]["spam_num"]))
			{
				//Save
				$this->Fansite->create();
				if($this->Fansite->save($this->data))
				{
					//Send mail
					$this->Email->from    = (!empty($this->data["Fansite"]["admin_mail"]) ? $this->data["Fansite"]["admin_mail"] : "zilow@dz-life.net");
					$this->Email->to      = 'zilow@dz-life.net';
					$this->Email->subject = '[DZ]ファンサイト登録依頼';
					$this->Email->send("
■サイト名
{$this->data['Fansite']['site_name']}

■サイトURL
{$this->data['Fansite']['site_url']}

■リンクURL
{$this->data['Fansite']['link_url']}

■メッセージ
{$this->data['Fansite']['message']}
					");
					//
					$this->Session->setFlash("サイト登録申込ありがとうございます！<br />\n管理人の承認後に掲載されます。");
					$this->redirect(array("controller" => "titles" , "action" => "link" , "path" => $title["Title"]["url_str"] , "ext" => "html"));
				}
				else
				{
					$this->Session->setFlash("登録できませんでした。<br />\n入力内容を確認してください。");
				}
			}
			else
			{
				$this->Session->setFlash("認証番号が不正です");
			}
		}
		//Set
		$this->set("title" , $title);

		$this->set("metaTags" , array("noindex"));
	}

	//リンク切れ報告
	function report($id = null)
	{
		$this->_emptyToHome($this->referer());
		$this->_emptyToHome($id);
		$this->data = $this->Fansite->find("first" , array(
			"conditions" => array(
				"Fansite.id" => $id,
			),
		));
		$reported = $this->data["Fansite"]["public"];
		if($reported)
		{
			$this->data["Fansite"]["public"] = false;
			if($this->Fansite->save($this->data))
			{
				//Send mail
				$this->Email->from    = "zilow@dz-life.net";
				$this->Email->to      = 'zilow@dz-life.net';
				$this->Email->subject = '[DZ]ファンサイトリンク切れ報告';
				$this->Email->send("
■サイト名
{$this->data['Fansite']['site_name']}

■サイトURL
{$this->data['Fansite']['site_url']}

■編集URL
http://onlinegame.dz-life.net/sys/fansites/edit/{$this->data['Fansite']['id']}

■{$this->data['Title']['title_official']}ファンサイト一覧
http://onlinegame.dz-life.net/sys/fansites/index/title_id:{$this->data['Fansite']['title_id']}

				");
				//
				$this->Session->setFlash("リンク切れ報告を受け付けました。<br />\nご協力ありがとうございます。");
			}
			else
			{
				$this->Session->setFlash("エラーが発生しました。");
			}
		}
		else
		{
			$this->Session->setFlash("すでに非公開リンクとなっています。<br />\nご協力ありがとうございます。");
		}
		$this->redirect($this->referer());
	}

	/**
	 * Sys
	 */
	function sys_index() {
		//リダイレクト
		if(!empty($this->params["url"]["title_id"]) or !empty($this->params["url"]["w"]))
		{
			$url = array();
			if(!empty($this->params["url"]["title_id"]))	{ $url["title_id"]	= $this->params["url"]["title_id"]; }
			if(!empty($this->params["url"]["w"]))			{ $url["w"]			= $this->params["url"]["w"]; }
			$this->redirect($url);
		}
		//
		$title_id	= isset($this->passedArgs["title_id"])	? $this->passedArgs["title_id"] : null;
		$w			= isset($this->passedArgs["w"])			? $this->passedArgs["w"] : null;
		//
		//Fansite data
		$this->Fansite->recursive = 0;
		$fConditions = array();
		if(isset($w))
		{
			$fConditions["OR"] = array(
					"Fansite.site_name LIKE '%" . $w . "%'",
					"Fansite.site_url LIKE '%" . $w . "%'",
					"Fansite.description LIKE '%" . $w . "%'",
			);
		}
		if(isset($title_id))
		{
			$fConditions["Fansite.title_id"] = $title_id;
		}
		$this->Fansite->recursive = 2;
		$this->Fansite->Title->unbindAll(array("Titlesummary") , false);
		$this->set('fansites', $this->Fansite->find("all" , array(
			"conditions" => $fConditions,
			"fields" => array(
				"Fansite.*",
				"Title.*",
			),
			"order" => "Fansite.id DESC"
		)));
		//
		//Title data
		$tConditions = (!empty($title_id)) ? array("Title.id" => $title_id) : null;
		$this->set("titles" , $this->Fansite->Title->find("list" , array(
			"conditions" => $tConditions,
			"order" => "Title.title_official",
		)));
		$this->set("titlesCount" , $this->Fansite->Title->titleListWithSummaryCount("fansite_count" , "Fansite"));
		//
		if(!empty($title_id))
		{
			$this->set("pankuz_for_layout" , array(
				array("str" => "ファンサイト一覧" , "url" => array("action" => "index")),
				$this->Fansite->Title->field("title_official" , array("Title.id" => $title_id)),
			));
			$this->set("title_id" , $title_id);
		}
		else
		{
			$this->set("pankuz_for_layout" , "ファンサイト一覧");
			$this->set("title_id" , 0);
		}
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'fansite'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('fansite', $this->Fansite->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Fansite->create();
			if ($this->Fansite->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index' , "title_id" => $this->data["Fansite"]["title_id"]));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fansite->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index' , "title_id" => $this->data["Fansite"]["title_id"]));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fansite->read(null, $id);
		}
		//
		$this->set("titles" , $this->Fansite->Title->find('list'));
		$this->set("pankuz_for_layout" , array(
			array("str" => "ファンサイト一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Fansite"] , $this->Fansite))
			{
				if ($this->Fansite->saveAll($this->data["Fansite"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
				} else {
					$this->Session->setFlash(Configure::read("Error.lump"));
					$this->redirect(array('action' => 'index'));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		$this->redirect(array('action' => 'index'));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Fansite->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>