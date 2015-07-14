<?php
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {

	var $helpers	= array("Html", "Form", "Javascript", "Session", "Common", "Gads" , "Ogp" , "RichSnippets");
	var $uses		= array("Title" , "User");
	var $components	= array("Session" ,/* "Security" , */"Cookie" , "RequestHandler" , "Auth");

	var $ip			= null;
	var $host		= null;
	var $cookey		= null;

	function beforeFilter()
	{
		/**
		 * System maintenance
		 */
		if(!empty($this->params["sys"]))
		{
			//デバッグ
//			Configure::write('debug', 2);
			
			//Basic認証
//			$this->Security->loginOptions = array(
//				"type"=>"basic",
//				"realm"=>"System Maintenance"
//			);
//			$this->Security->loginUsers = array(
//				"daisuke"=>"daisuke"
//			);
//			$this->Security->requireLogin();

			//Auth認証
//			$this->Auth->userModel = "User";
//			$this->Auth->fields = array(
//				"username"=>"name",
//				"password"=>"passwd"
//			);
			$this->Auth->loginAction = array(
				"controller" => "users",
				"action" => "login",
				"sys" => true,
			);
			$this->Auth->loginRedirect = array(
				"controller" => "pages",
				"action" => "home",
				"sys" => true,
			);
			$this->Auth->logoutRedirect = array(
				"controller" => "users",
				"action" => "login",
				"sys" => true,
			);
//			$this->Auth->allow("login", "logout");
			$this->Auth->loginError = "ユーザ名もしくはパスワードが違います。";
			$this->Auth->authError = "管理者としてログインする必要があります";
			$this->set("loginUser" , $this->Auth->user());
//			pr($this->Auth);
//			exit;

			//Use layout
			$this->layout = "sys";
			$this->set("params" , $this->params);

			/**
			 * Cookie
			 */
			$this->Cookie->name = "sys";
			$this->Cookie->path = "/";
			$this->Cookie->write("sys_login" , "true" , false);

			/**
			 * Flashメッセージ定数
			 */
			//成功
			Configure::write(
				"Success" , array(
					"create" => "登録完了",
					"modify" => "編集完了",
					"lump" => "一括編集完了",
					"summary" => "集計完了",
					"summary_update" => "集計更新完了",
					"summary_update_all" => "全集計更新完了",
					"copy" => "コピー完了",
					"delete" => "削除完了",
				)
			);
			//失敗
			Configure::write(
				"Error" , array(
					"error" => "エラー",
					"id" => "IDが不正です",
					"input" => "入力エラー",
					"create" => "登録エラー",
					"modify" => "編集エラー",
					"lump" => "一括編集エラー",
					"summary" => "集計エラー",
					"summary_update" => "集計更新エラー",
					"summary_update_all" => "全集計更新エラー",
					"upload" => "アップロードエラー",
					"copy" => "コピーエラー",
					"delete" => "削除エラー",
					"lump_empty" => "一括修正項目なし",
				)
			);
		}
		else
		{
			/**
			 * Cookie & Session
			 */
			$this->Cookie->name = "game";
			$this->Cookie->time = "90 Days";
			$this->Cookie->path = "/";
			$this->cookey = $this->Cookie->read("cookey");

			$this->Title->Behaviors->attach("Containable");


			/**
			 * Sidebar - Right
			 */

			/** Voted **/
			if($this->cookey)
			{
				//Get
				$rightVoted = $this->Title->Vote->find("all" , array(
					"conditions" => array(
						"Vote.public" => 1,
						"Title.public" => 1,
//						"Vote.ip" => $this->ip,
//						"Vote.host" => $this->host,
						"Vote.cookey" => $this->cookey,
					),
					"fields" => array(
						"Vote.id",
						"Vote.pass",
						"Vote.modified",
						"Title.title_official",
						"Title.title_read",
						"Title.url_str",
						"Title.thumb_name",
					),
					"order" => "Vote.modified DESC",
					"limit" => 3,
				));
//				pr($rightVoted);
				//
				//Set
				$this->set("rightVoted" , $rightVoted);
			}

			//Auth allow
			$this->Auth->allow("*");

		}
	}


/** Private methods
------------------------------ **/

/**
 * データがemptyならホームへリダイレクト
 *
 * @param	$data
 * @return	void
 * @access private
 */
	function _emptyToHome(&$data)
	{
		if(empty($data))
		{
			$this->redirect("/");
		}
	}

/**
 * データがemptyならURLへリダイレクト
 *
 * @param	$data
 * @param	$url
 * @return	void
 * @access private
 */
	function _emptyToURL(&$data , $url = "/")
	{
		if(empty($data))
		{
			$this->redirect($url);
		}
	}

/**
 * データ取得前のパラメタチェック
 *
 * @return void
 * @access private
 */
	function _checkParams($param = null)
	{
		if(!empty($param))
		{
			$this->_emptyToHome($param);
		}
		else
		{
			$this->_emptyToHome($this->params["path"]);
		}
	}
}
?>