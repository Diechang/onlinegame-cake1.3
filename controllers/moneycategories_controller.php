<?php
class MoneycategoriesController extends AppController {

	var $name = 'Moneycategories';

	function sys_index() {
		$this->Moneycategory->recursive = 0;
		$this->set('moneycategories', $this->Moneycategory->find("all"));
		//
		$this->set("pankuz_for_layout" , "小遣いカテゴリ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'moneycategory'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('moneycategory', $this->Moneycategory->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Moneycategory->create();
			if ($this->Moneycategory->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
				$this->redirect(array("actioin" => "index"));
			}
		}
		else
		{
			$this->redirect(array("actioin" => "index"));
		}
	}

	function sys_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Moneycategory->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Moneycategory->read(null, $id);
		}
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "小遣いカテゴリ" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->Moneycategory->saveAll($this->data["Moneycategory"])) {
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
		if ($this->Moneycategory->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>