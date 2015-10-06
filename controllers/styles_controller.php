<?php
class StylesController extends AppController {

	var $name = 'Styles';

	function index($path = null)
	{
		$this->_checkParams();
		/**
		 * Page Data
		 */
		//Get
		$pageData = $this->Style->find("first" , array(
			"recursive" => -1,
			"conditions" => array("Style.path" => $path)
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
				"Title.service_id NOT" => 1,
				"Style.id" => $pageData["Style"]["id"],
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
			"joins" => array(
				array(
					'table' => 'styles_titles',
					'alias' => 'StylesTitle',
					'type' => 'INNER',
					'conditions' => 'StylesTitle.title_id = Title.id'
				),
				array(
					'table' => 'styles',
					'alias' => 'Style',
					'type' => 'INNER',
					'conditions' => 'Style.id = StylesTitle.style_id'
				)
			),
			"group" => array("Title.id"),
			"order" => array("Service.sort" , "Title.service_start DESC" , "Title.test_start DESC" , "Title.test_end DESC"),
			"contain" => array("Category", "Service", "Fee"),
		));
//		pr($dataTitles);
//		exit;

		$this->Title->unbindAll(array("Titlesummary"));
		$pickups = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.id" => Set::extract($titles , "{n}.Title.id"),
				"NOT" => array("Title.service_id" => 1),
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.service_id",
				"Title.ad_use",
				"Titlesummary.*"
			),
			"limit" => 4,
			"order" => array("Title.ad_use DESC , Titlesummary.vote_avg_all DESC , Titlesummary.vote_count_vote DESC"),
		));
//		pr($relations);
//		exit();
		//
		//Set
		$this->set("titles" , $titles);
		$this->set('pickups' , $pickups);
	}


	/**
	 * Sys
	 */
	function sys_index() {
		$this->Style->recursive = 0;
		$this->set('styles', $this->Style->find("all"));
		//
		$this->set("pankuz_for_layout" , "スタイルマスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'style'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('style', $this->Style->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Style->create();
			if ($this->Style->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
				$this->redirect(array('action' => 'index'));
			}
		}
		$titles = $this->Style->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//コンディションなし - Title.publicが見つからない…
			$this->Style->hasAndBelongsToMany["Title"]["conditions"] = "";
			if ($this->Style->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
//			$this->Style->recursive = -1;
			$this->data = $this->Style->read(null, $id);
		}
		$titles = $this->Style->Title->find('list' , array("order" => "Title.title_official"));
		$this->set(compact('titles'));
		$this->set("pankuz_for_layout" , array("スタイルマスタ" , "編集"));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->Style->saveAll($this->data["Style"])) {
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
		if ($this->Style->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>