<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $components	= array("LumpEdit");
	var $helpers	= array("Paginator");

	var $paginate = array(
		"Event" => array(
			"limit" => 10,
			"order" => "Event.created DESC",
			"conditions" => array(
				"Event.public" => 1,
			),
			"fields" => array(
				"Event.*",
				"Title.title_official",
				"Title.title_read",
				"Title.thumb_name",
				"Title.url_str",
			),
		),
	);

	function _index() {
		$page = (!empty($this->params["page"])) ? $this->params["page"] : 1;
		$this->params["page"] = $page;

		/**
		 * Review Data
		 */
		//Get
		$events = $this->paginate("Event");
//		pr($events);
		//
		//Set - data
		$this->set("events" , $events);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		//リダイレクト
		if(!empty($this->params["url"]["w"])
			or !empty($this->params["url"]["title_id"]))
		{
			$url = array();
			if(!empty($this->params["url"]["w"]))			{ $url["w"]			= $this->params["url"]["w"]; }
			if(!empty($this->params["url"]["title_id"]))	{ $url["title_id"]	= $this->params["url"]["title_id"]; }
			$this->redirect($url);
		}
		//
		$conditions = array();

		//タイトルID
		$title_id = &$this->passedArgs["title_id"];
		if(isset($title_id))
		{
			$conditions += array("Event.title_id" => $title_id);
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
		//検索ワード
		$w = &$this->passedArgs["w"];
		if(isset($w) && !empty($w))
		{
			$conditions += array("OR" => $this->Event->wConditions(urldecode($w)));
		}

		//find
		$this->set("events" , $this->Event->find("all" , array(
			"conditions" => $conditions,
			"fields" => array(
				"Event.*",
				"Title.title_official",
				"Title.url_str",
			),
			"order" => "Event.id DESC",
		)));
		//
		$this->set("pankuz_for_layout" , "イベント一覧");
		$this->set("titles" , $this->Event->Title->find("list" , array(
			"conditions" => array(
				"Title.id" => $this->Event->find("list" , array(
					"fields" => "Event.title_id",
				))
			),
		)));
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'event'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('event', $this->Event->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				if(!empty($this->data["Event"]["title_id"]))
				{
					$this->redirect(array('action' => 'index' , 'title_id' => $this->data["Event"]["title_id"]));
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
		$titles = $this->Event->Title->find('list' , array(
			"conditions" => $conditions,
			"order" => "Title.title_official",
		));

		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "イベント一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$titles = $this->Event->Title->find('list' , array(
			"order" => "Title.title_official",
		));

		$this->set(compact('titles'));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "イベント一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Event"] , $this->Event))
			{
//				pr($this->data["Event"]);
//				exit;
				if ($this->Event->saveAll($this->data["Event"])) {
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdateEvents()){}
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
		$this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>