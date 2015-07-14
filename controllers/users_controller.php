<?php
class UsersController extends AppController {

	var $name = 'Users';

/**
 * System login/logout
 */
	function sys_login()
	{
		$this->set("pankuz_for_layout" , "ログイン");
	}
	function sys_logout()
	{
		$this->redirect($this->Auth->logout());
	}
}
?>