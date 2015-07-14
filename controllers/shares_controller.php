<?php
class SharesController extends AppController {

	var $name = 'Shares';
	var $uses = null;
	var $components = array("Facebook" , "Twitter");


	/**
	 * Sys
	 */
	function sys_index() {
		//Facebook
		$this->Facebook->init(true);
		//
		if($this->Facebook->tokenExpiration)
		{
			$this->Session->setFlash("Facebook token 有効期限切れ");
		}
		$this->set("fbPageToken" , $this->Facebook->pageToken);
		
		$this->set("pankuz_for_layout" , "SNS投稿");
	}

	function sys_post()	{
		if(!empty($this->data))
		{
			$return		= "";
			$fbReturn	= null;
			$twReturn	= null;

			//Facebook
			$this->Facebook->init();
			$fbReturn = $this->Facebook->post(array(
				"link" => $this->data["Share"]["link"],
				"message" => $this->data["Share"]["body"],
			));
			//
			if(!$fbReturn)
			{
				$return .= "Facebook：" . $this->Facebook->errorMessage . "\n";
			}

			//Flash message
			if(!empty($return))
			{
				$this->Session->setFlash(nl2br($return));
			}
			else
			{
				$this->Session->setFlash("SNS投稿成功");
			}
		}
		$this->redirect(array('action' => 'index'));
	}
}
?>