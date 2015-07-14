<?php
class AdLeftBottomsController extends AppController {

	var $name = 'AdLeftBottoms';

	function sys_index($public = null) {
		$this->AdLeftBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adLeftBottoms', $this->AdLeftBottom->find("all" , array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout" , "左サイドバー下バナー");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid ad left bottom', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('adLeftBottom', $this->AdLeftBottom->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->AdLeftBottom->create();
			if ($this->AdLeftBottom->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		$this->redirect(array('action' => 'index'));
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AdLeftBottom->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdLeftBottom->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array(
			array("str" => "左サイドバー下バナー" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->AdLeftBottom->saveAll($this->data["AdLeftBottom"])) {
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
		if ($this->AdLeftBottom->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
