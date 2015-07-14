<?php
class PcshopsController extends AppController {

	var $name = 'Pcshops';
	var $components	= array("LumpEdit");

//	function index() {
//		$this->Pcshop->recursive = 0;
//		$this->set('pcshops', $this->paginate());
//	}
	/**
	 * Sys
	 */
	function sys_index() {
		$this->set('pcshops', $this->Pcshop->find("all"));
		//
		$this->set("pankuz_for_layout" , "ショップ一覧");
	}

//	function sys_view($id = null) {
//		if (!$id) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'pcshop'));
//			$this->redirect(array('action' => 'index'));
//		}
//		$this->set('pcshop', $this->Pcshop->read(null, $id));
//	}

	function sys_add() {
		if (!empty($this->data)) {
			$this->Pcshop->create();
			if ($this->Pcshop->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.create"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.create"));
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
			if ($this->Pcshop->save($this->data)) {
				$this->Session->setFlash(Configure::read("Success.modify"));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(Configure::read("Error.modify"));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pcshop->read(null, $id);
		}
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "ショップ一覧" , "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump() {
		if (!empty($this->data)) {
			//変更チェック
			if($this->LumpEdit->changeCheck($this->data["Pcshop"] , $this->Pcshop))
			{
//				pr($this->data["Pcshop"]);
//				exit;
				if ($this->Pcshop->saveAll($this->data["Pcshop"])) {
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
		if ($this->Pcshop->delete($id , true)) {//pc同時削除 delete($id , $cascade = true)
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>