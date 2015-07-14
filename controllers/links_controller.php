<?php
class LinksController extends AppController {

	var $name = 'Links';
	var $uses = array("Link" , "Linkcategory");
	var $components = array("Email" , "Common");

	function index($path = null)
	{
		if(empty($path))
		{
			//Redirect
			$this->redirect(array("controller" => "links" , "path" => "index" , "ext" => "html"));
		}
		else
		{
			/*
			 * Category Data
			 */
			//Get
			$linkCategories = $this->Linkcategory->find("all" , array(
				"recursive" => -1,
				"order" => "Linkcategory.sort",
			));
//			pr($dataCategories);
			//
			//Set
			$this->set("linkCategories" , $linkCategories);

			//Category Pathes
			$pathes = array();
			foreach($linkCategories as $category)
			{
				array_push($pathes , $category["Linkcategory"]["path"]);
			}

			/**
			 * Page Data
			 */
			if(in_array($path , $pathes))
			{//$pathがCategory一致
				//Get
				$dataPage = $this->Linkcategory->find("first" , array(
					"conditions" => array("Linkcategory.path" => $path)
				));
//				pr($dataPage);
				$str = $dataPage["Linkcategory"]["str"];
				//Pankuz set
				$this->set("pankuz_for_layout" , array(
					array(
						"str" => "相互リンク集",
						"url" => array("controller" => "links" , "path" => "index" , "ext" => "html")
					),
					$str,
				));
				//Set
				$this->set("title_for_layout" , "【" . $str . "】相互リンク集");
				$this->set("keywords_for_layout" , "相互リンク," . $str);
				$this->set("description_for_layout" , "オンラインゲームライフと相互リンクしていただいている「" . $str . "」カテゴリのサイト集です。相互リンク依頼は専用フォームからどうぞ。");
				$this->set("h1_for_layout" , "【" . $str . "】相互リンク集");
				//
				//Conditions
				$conditions = array(
					"public" => 1,
					"Linkcategory.path" => $path
				);
			}
			elseif($path == "index")
			{//Index - 総合
				$str = "おすすめ";
				//Pankuz set
				$this->set("pankuz_for_layout" , "相互リンク集");
				//Set
				$this->set("title_for_layout" , "相互リンク集");
				$this->set("keywords_for_layout" , "相互リンク");
				$this->set("description_for_layout" , "オンラインゲームライフと相互リンクしていただいているおすすめサイト集です。相互リンク依頼は専用フォームからどうぞ。");
				$this->set("h1_for_layout" , "相互リンク集");
				//
				//Conditions
				$conditions = array(
					"public" => 1,
					"pickup" => 1,
				);
			}
			else
			{
				$this->cakeError("error404");
			}
			//
			$this->set("mainStr" , $str);
			$this->set("path" , $path);

			$this->set("metaTags" , array("noindex"));

			/**
			 * Link Data
			 */
			$links = $this->Link->find("all" , array(
				"conditions" => $conditions,
			));
//			pr($links);
			$this->set("links" , $links);
			$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		}
	}

	function add() {
		if (!empty($this->data))
		{
			//認証番号チェック
			if($this->Common->spamCheck($this->data["Link"]["spam_num"]))
			{
				$this->Link->create();
				if ($this->Link->save($this->data))
				{
					//Send mail
					$this->Email->from    = (!empty($this->data["Link"]["admin_mail"]) ? $this->data["Link"]["admin_mail"] : "zilow@dz-life.net");
					$this->Email->to      = 'zilow@dz-life.net';
					$this->Email->subject = '[DZ]相互リンク依頼';
					$this->Email->send("
■サイト名
{$this->data['Link']['site_name']}

■サイトURL
{$this->data['Link']['site_url']}

■リンクURL
{$this->data['Link']['link_url']}

■メッセージ
{$this->data['Link']['message']}
					");
					//
					$this->Session->setFlash("相互リンク申込ありがとうございます！<br />\n管理人の承認後に掲載されます。");
					$this->redirect(array('action' => 'index'));
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
			//
			$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
			//Set - Layout vars
			$this->set("title_for_layout" , "相互リンク登録申込");
			$this->set("keywords_for_layout" , "");
			$this->set("description_for_layout" , "");
			$this->set("h1_for_layout" , "相互リンク登録申込");
			$this->set("pankuz_for_layout" , array(
				array("str" => "相互リンク集" , "url" => array("controller" => "links" , "action" => "index" , "path" => "index" , "ext" => "html")),
				"登録申込",
			));

			$this->set("metaTags" , array("noindex"));
		}
		else
		{
			$this->redirect("/");
		}
	}


	/**
	 * Sys
	 */
	function sys_index() {
		$this->Link->recursive = 0;
		$this->set('links', $this->Link->find("all" , array("order" => "Link.id DESC")));
		$this->set("linkcategories" , $this->Link->Linkcategory->find("all" , array("recursive" => -1)));
		//
		$this->set("pankuz_for_layout" , "相互リンク一覧");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'link'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('link', $this->Link->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			if(empty($this->data["Link"]["admin_name"])){ $this->data["Link"]["admin_name"] = "zilow"; }
			if(empty($this->data["Link"]["admin_mail"])){ $this->data["Link"]["admin_mail"] = "zilow@dz-life.net"; }
			$this->Link->create();
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//
		$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		$this->set("pankuz_for_layout" , "相互リンク登録");
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Link->read(null, $id);
		}
		//
		$this->set("linkcategories" , $this->Link->Linkcategory->find("list"));
		$this->set("pankuz_for_layout" , array(
			array("str" => "相互リンク一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->Link->saveAll($this->data["Link"])) {
				$this->Session->setFlash(Configure::read("Success.lump"));
			} else {
				$this->Session->setFlash(Configure::read("Error.lump"));
				$this->redirect(array('action' => 'index'));
			}
		}
		$this->redirect(array('action' => 'index'));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Link->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>