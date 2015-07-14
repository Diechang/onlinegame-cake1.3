<?php
class PortalsController extends AppController {

	var $name = 'Portals';
	var $components = array("TitleData" , "LumpEdit");

	function index()
	{
		//Get
		$portals = $this->Portal->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Portal.public" => 1
			),
		));
//		pr($portals);
		//
		//Set
		$this->set("portals" , $portals);
		//Set - Layout vars
		$this->set("title_for_layout" , "オンラインゲームポータルサイト");
		$this->set("keywords_for_layout" , "オンラインゲーム,ポータルサイト,アバター");
		$this->set("description_for_layout" , "オンラインゲームポータルサイトについてのページです。");
		$this->set("h1_for_layout" , "オンラインゲームポータル");
		$this->set("pankuz_for_layout" , "オンラインゲームポータル");
	}

	function view($path = null)
	{
		$this->_emptyToURL($path , array("action" => "index" , "ext" => "html"));
		//Get
		$this->Portal->Title->unbindAll(array("Category" , "Titlesummary"));

//		$defPortalTitleConditions = $this->Portal->hasAndBelongsToMany["Title"]["conditions"];
		$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = array(
			"Title.public" => 1,
			"NOT" => array(
				"Title.service_id" => 1
			)
		);
//		$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = $defPortalTitleConditions;

		$portal = $this->Portal->find("first" , array(
			"recursive" => 2,
			"conditions" => array(
				"Portal.public" => 1,
				"Portal.url_str" => $path,
			),
		));
//		pr($portal);
//		exit;
		$portals = $this->Portal->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Portal.public" => 1,
				"NOT" => array(
					"Portal.id" => $portal["Portal"]["id"],
				),
			),
		));
//		pr($this->Portal->hasAndBelongsToMany["Title"]["conditions"]);
//		exit;
		$this->_emptyToURL($portal , array("action" => "index" , "ext" => "html"));
//		pr($portal);
		//Create - meta Keywords
		$keywords_for_layout[]	= $portal["Portal"]["title_official"];
		if(!empty($portal["Portal"]["title_read"]))
		{
			$keywords_for_layout[] = $portal["Portal"]["title_read"];
		}
		$keywords_for_layout[]	= "オンラインゲーム";
		$keywords_for_layout[]	= "ポータルサイト";
		//
		//Set
		$this->set("portal" , $portal);
		$this->set("portals" , $portals);
		//Set - Layout vars
		$titleTag = $this->TitleData->titleTag($portal["Portal"]["title_official"] , $portal["Portal"]["title_read"]);
		$this->set("title_for_layout" , $titleTag);
		$this->set("keywords_for_layout" , implode(',', $keywords_for_layout));
		$this->set("description_for_layout" , "オンラインゲームポータル【" . $titleTag . "】についてのページです。");
		$this->set("h1_for_layout" , $titleTag);
		$this->set("pankuz_for_layout" , array(
			array("str" => "オンラインゲームポータル" , "url" => array("action" => "index" , "ext" => "html")),
			$titleTag,
		));
	}

	/**
	 * Sys
	 */
	function sys_index() {
		$this->Portal->recursive = 0;
		$this->set('portals', $this->Portal->find("all" , array("order" => "id DESC")));
		//
		$this->set("pankuz_for_layout" , "ポータルマスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'portal'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('portal', $this->Portal->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Portal->create();
			if ($this->Portal->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		$titles = $this->Portal->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "ポータルマスタ" , "url" => array("action" => "index")),
			"新規登録",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//コンディションなし - Title.publicが見つからない…
			$this->Portal->hasAndBelongsToMany["Title"]["conditions"] = "";
			if ($this->Portal->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Portal->read(null, $id);
		}
		$titles = $this->Portal->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "ポータルマスタ" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Portal"] , $this->Portal))
			{
//				pr($this->data["Portal"]);
//				exit;
				if ($this->Portal->saveAll($this->data["Portal"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
				} else {
					$this->Session->setFlash(Configure::read("Error.lump"));
					$this->redirect($this->referer(array('action' => 'index')));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		$this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Portal->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>