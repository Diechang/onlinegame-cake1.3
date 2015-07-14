<?php
class FeesController extends AppController {

	var $name = 'Fees';

	function sys_index() {
		$this->Fee->recursive = 0;
		$this->set('fees', $this->Fee->find("all"));
		//
		$this->set("pankuz_for_layout" , "料金マスタ");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'fee'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('fee', $this->Fee->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Fee->create();
			if ($this->Fee->save($this->data)) {
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
			if ($this->Fee->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if (empty($this->data)) {
			$this->Fee->recursive = -1;
			$this->data = $this->Fee->read(null, $id);
		}
		$this->set("pankuz_for_layout" , array("料金設定マスタ" , "編集"));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			if ($this->Fee->saveAll($this->data["Fee"])) {
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
		if ($this->Fee->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>