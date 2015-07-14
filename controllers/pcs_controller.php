<?php
class PcsController extends AppController {

	var $name = 'Pcs';
	var $components	= array("LumpEdit");

	function index() {
		$this->Pc->Title->unbindAll(array("Titlesummary"));
		$titles = $this->Pc->Title->find("all" , array(
			"conditions" => array(
				"Titlesummary.pc_count >" => 0,
			),
			"order" => array("Title.service_start DESC" , "Title.service_id DESC"),
		));
		foreach($titles as &$title)
		{
			$title["lowestPrice"] = $this->Pc->field("price",
				array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"]
				),
				"Pc.price"
			);
			$title["desktopCount"] = $this->Pc->find("count" , array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 1,
				),
			));
			$title["noteCount"] = $this->Pc->find("count" , array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.title_id" => $title["Title"]["id"],
					"Pc.pctype_id" => 2,
				),
			));
		}
//		pr($titles);
//		exit;

		$this->set("titles" , $titles);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		//リダイレクト
		if(!empty($this->params["url"]["w"])
			or !empty($this->params["url"]["title_id"])
			or !empty($this->params["url"]["pcshop_id"])
			or !empty($this->params["url"]["pctype_id"])
			or !empty($this->params["url"]["pcgrade_id"]))
		{
			$url = array();
			if(!empty($this->params["url"]["w"]))			{ $url["w"]			= $this->params["url"]["w"]; }
			if(!empty($this->params["url"]["title_id"]))	{ $url["title_id"]	= $this->params["url"]["title_id"]; }
			if(!empty($this->params["url"]["pcshop_id"]))	{ $url["pcshop_id"]	= $this->params["url"]["pcshop_id"]; }
			if(!empty($this->params["url"]["pctype_id"]))	{ $url["pctype_id"]	= $this->params["url"]["pctype_id"]; }
			if(!empty($this->params["url"]["pcgrade_id"]))	{ $url["pcgrade_id"]	= $this->params["url"]["pcgrade_id"]; }
			$this->redirect($url);
		}
		//
		$conditions = array();

		//タイトルID
		$title_id = &$this->passedArgs["title_id"];
		if(isset($title_id))
		{
			$conditions += array("Pc.title_id" => $title_id);
			//title data
			$titleAddData = $this->Title->find("first" , array(
				"recursive" => -1,
				"conditions" => array("Title.id" => $title_id),
				"fields" => array("Title.title_official" , "Title.id"),
			));
//			pr($titleData);
//			exit;
			$this->set("titleAddData" , $titleAddData);
		}
		//ショップID
		$pcshop_id = &$this->passedArgs["pcshop_id"];
		if(isset($pcshop_id))
		{
			$conditions += array("Pc.pcshop_id" => $pcshop_id);
		}
		//検索ワード
		$w = &$this->passedArgs["w"];
		if(isset($w) && !empty($w))
		{
			$conditions += array("OR" => $this->Pc->wConditions(urldecode($w)));
		}
		//タイプ
		$pctype_id		= &$this->passedArgs["pctype_id"];
		if(isset($pctype_id) && !empty($pctype_id))
		{
			$conditions += array("Pc.pctype_id" => $pctype_id);
		}
		//グレード
		$pcgrade_id	= &$this->passedArgs["pcgrade_id"];
		if(isset($pcgrade_id) && !empty($pcgrade_id))
		{
			$conditions += array("Pc.pcgrade_id" => $pcgrade_id);
		}

		$this->set("pcs" , $this->Pc->find("all" , array(
			"conditions" => $conditions,
			"fields" => array(
				"Pc.*",
				"Pctype.*",
				"Pcgrade.*",
				"Pcshop.shop_name",
				"Title.title_official",
			),
			"order" => "Pc.id DESC",
		)));
		//
		$this->set("pankuz_for_layout" , "PC一覧");
		$this->set("titles" , $this->Pc->Title->find("list" , array(
			"conditions" => array(
				"Title.id" => $this->Pc->find("list" , array(
					"fields" => "Pc.title_id",
				))
			),
		)));
		$this->set("pcshops" , $this->Pc->Pcshop->find("list"));
		$this->set("pctypes" , $this->Pc->Pctype->find("list"));
		$this->set("pcgrades" , $this->Pc->Pcgrade->find("list"));
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'pc'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('pc', $this->Pc->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Pc->create();
			if ($this->Pc->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				if(!empty($this->data["Pc"]["title_id"]))
				{
					$this->redirect(array('action' => 'index' , 'title_id' => $this->data["Pc"]["title_id"]));
				}
				else
				{
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//タイトルID
		if(isset($this->passedArgs["title_id"]))
		{
			$conditions = array("Title.id" => $this->passedArgs["title_id"]);
			$this->set("withTitle" , true);
		}
		else
		{
			$conditions = array();
		}
		$titles = $this->Pc->Title->find('list' , array(
			"conditions" => $conditions,
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "PC一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pc->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pc->read(null, $id);
		}
		$titles = $this->Pc->Title->find('list' , array(
			"order" => "Title.title_official",
		));

		$pcshops = $this->Pc->Pcshop->find('list');
		$pctypes = $this->Pc->Pctype->find('list');
		$pcgrades = $this->Pc->Pcgrade->find('list');
		$this->set(compact('titles', 'pcshops', 'pctypes', 'pcgrades'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "PC一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Pc"] , $this->Pc))
			{
//				pr($this->data["Pc"]);
//				exit;
				if ($this->Pc->saveAll($this->data["Pc"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdatePcs()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
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
		$this->redirect($this->referer());
	}

	function sys_copy($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Pc->recursive = -1;
		$this->data = $this->Pc->read(null , $id);
//		pr($this->data);
//		exit;
		$this->data["Pc"]["public"] = 0;
		unset($this->data["Pc"]["id"]);
		$this->Pc->create();
		if ($this->Pc->save($this->data)) {
			$this->Session->setFlash(Configure::read("Success.copy"));
			$this->redirect(array('action' => 'index' , $this->data["Pc"]["title_id"]));
		}
		$this->Session->setFlash(Configure::read("Error.copy"));
		$this->redirect($this->referer());
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pc->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect($this->referer());
	}
}
?>