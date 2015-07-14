<?php
class PackagesController extends AppController {

	var $name = 'Packages';
	var $components = array("LumpEdit");

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
		//Package data
		$this->Package->recursive = 0;
		$pConditions = array();
		if(isset($w))
		{
			$pConditions["OR"] = array(
					"Package.name LIKE '%" . $w . "%'",
					"Package.url LIKE '%" . $w . "%'",
			);
		}
		if(isset($title_id))
		{
			$pConditions["Package.title_id"] = $title_id;
		}
		$this->set('packages', $this->Package->find("all" , array(
			"conditions" => $pConditions,
			"fields" => array(
				"Package.*",
				"Title.title_official",
			),
			"order" => "Package.id DESC"
		)));
		//
		//Title data
		$this->Package->Title->unbindAll(array("Titlesummary") , false);
		$tConditions = (!empty($title_id)) ? array("Title.id" => $title_id) : null;
		$this->set("titles" , $this->Package->Title->find("list" , array(
			"conditions" => $tConditions,
			"order" => "Title.title_official",
		)));
		$this->set("titlesCount" , $this->Package->Title->titleListWithSummaryCount("package_count" , "Package"));
		//
		if(!empty($title_id))
		{
			$this->set("pankuz_for_layout" , array(
				array("str" => "パッケージ一覧" , "url" => array("action" => "index")),
				$this->Package->Title->field("title_official" , array("Title.id" => $title_id)),
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
//			$this->Session->setFlash(__('Invalid package', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('package', $this->Package->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Package->create();
			if ($this->Package->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index' , "title_id" => $this->data["Package"]["title_id"]));
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
			if ($this->Package->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index' , "title_id" => $this->data["Package"]["title_id"]));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Package->read(null, $id);
		}
		//
		$this->set("titles" , $this->Package->Title->find('list'));
		$this->set("pankuz_for_layout" , array(
			array("str" => "パッケージ一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Package"] , $this->Package))
			{
				if ($this->Package->saveAll($this->data["Package"])) {
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
		if ($this->Package->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
