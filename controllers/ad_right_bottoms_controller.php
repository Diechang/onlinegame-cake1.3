<?php
class AdRightBottomsController extends AppController {

	var $name = 'AdRightBottoms';

	function sys_index($public = null) {
		$this->AdRightBottom->recursive = 0;
		$conditions = ($public == "all") ? null : array("public" => 1);
		$this->set('adRightBottoms', $this->AdRightBottom->find("all" , array(
			"conditions" => $conditions,
			"order" => "id DESC"
		)));
		$this->set("pankuz_for_layout" , "右サイドバー下バナー");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid ad right bottom', true));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('adRightBottom', $this->AdRightBottom->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->AdRightBottom->create();
			if ($this->AdRightBottom->save($this->data)) {
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
			if ($this->AdRightBottom->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.input"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdRightBottom->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array(
			array("str" => "右サイドバー下バナー" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->AdRightBottom->saveAll($this->data["AdRightBottom"])) {
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
		if ($this->AdRightBottom->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
