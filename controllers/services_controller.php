<?php
class ServicesController extends AppController {

	var $name = 'Services';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Service->find("first" , array(
			"recursive" => -1,
			"conditions" => array("Service.path" => $path)
		));
		//リダイレクト
		$this->_emptyToHome($pageData);
//		pr($pageData);
		//
		//Set
		$this->set("pageData" , $pageData);

		/**
		 * Title Data
		 */
		//Get
		$this->Title->Behaviors->attach('Containable');
		$titles = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Service.id" => $pageData["Service"]["id"],
			),
			"fields" => array(
				"title_official",
				"title_read",
				"url_str",
				"thumb_name",
				"description",
				"service_id",
				"service_start",
				"test_start",
				"test_end",
				"category_text",
				"fee_id",
				"fee_text",
				"ad_use",
				"ad_text",
				"official_url",
				"Service.*",
				"Fee.*",
			),
			"order" => array("Title.service_start DESC" , "Title.test_start DESC" , "Title.test_end DESC"),
			"contain" => array("Category", "Service", "Fee"),
		));
//		pr($titles);
		//
		//Set
		$this->set("titles" , $titles);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		$this->Service->recursive = 0;
		$this->set('services', $this->Service->find("all"));

		$this->set("pankuz_for_layout" , "サービス状態マスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'service'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('service', $this->Service->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Service->create();
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
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
			if ($this->Service->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->Service->recursive = -1;
			$this->data = $this->Service->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array("サービス状態マスタ" , "編集"));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->Service->saveAll($this->data["Service"])) {
				$this->Session->setFlash(Configure::read("Success.lump"));
			} else {
				$this->Session->setFlash(Configure::read("Error.lump"));
				$this->redirect($this->referer(array('action' => 'index')));
			}
		}
		$this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Service->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>