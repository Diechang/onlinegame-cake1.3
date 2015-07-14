<?php
class LettersController extends AppController {

	var $name = 'Letters';
	var $components = array("Email" , "Common");
	var $helpers = array("Text");

	function add()
	{
		if (!empty($this->data)) {

			//認証番号チェック
			if($this->Common->spamCheck($this->data["Letter"]["spam_num"]))
			{
				$this->data["Letter"]["ip"]	= $this->ip;
				$this->data["Letter"]["host"]	= $this->host;
				$this->Letter->create();
				if ($this->Letter->save($this->data)) {
					$this->Email->from			= $this->data["Letter"]["name"] . " <" . $this->data["Letter"]["mail"] . ">";
					$this->Email->to			= 'zilow@dz-life.net';
					$this->Email->subject		= '[DZ]お問合せ';
					$this->Email->lineLength	= 1000;
					$this->Email->send($this->data["Letter"]["body"]);
					//
					$this->Session->setFlash("お問合せありがとうございました");
					$this->redirect(array('action' => 'add'));
				} else {
					$this->Session->setFlash("入力エラーです");
				}
			}
			else
			{
				$this->Session->setFlash("認証番号が不正です");
			}
		}
		//Layout vars
		$this->set("title_for_layout" , "お問合せ");
		$this->set("keywords_for_layout" , "お問合せ");
		$this->set("description_for_layout" , "オンラインゲームライフへのお問い合わせはこちらからお願いします。");
		$this->set("h1_for_layout" , "お問合せ");
		$this->set("pankuz_for_layout" , "お問合せ");
	}

	/**
	 * Sys
	 */
	function sys_index() {
		$this->Letter->recursive = 0;
		$this->set('letters', $this->Letter->find("all" , array("order" => "created DESC")));
		//
		$this->set("pankuz_for_layout" , "問い合わせ一覧");
	}

	function sys_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('letter', $this->Letter->read(null, $id));
		//
		$this->set("pankuz_for_layout" , array(
			array("str" => "問い合わせ一覧" , "url" => array("action" => "index")),
			"確認",
		));
	}

//	function sys_add() {
//		if (!empty($this->data)) {
//			$this->Letter->create();
//			if ($this->Letter->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'letter'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'letter'));
//			}
//		}
//	}
//
//	function sys_edit($id = null) {
//		if (!$id && empty($this->data)) {
//			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'letter'));
//			$this->redirect(array('action' => 'index'));
//		}
//		if (!empty($this->data)) {
//			if ($this->Letter->save($this->data)) {
//				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'letter'));
//				$this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'letter'));
//			}
//		}
//		if (empty($this->data)) {
//			$this->data = $this->Letter->read(null, $id);
//		}
//	}

	function sys_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(Configure::read("Error.id"));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Letter->delete($id)) {
			$this->Session->setFlash(Configure::read("Success.delete"));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		$this->redirect(array('action' => 'index'));
	}
}
?>