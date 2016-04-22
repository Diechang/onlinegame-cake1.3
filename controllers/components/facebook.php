<?php
/*
 * Facebook連携コンポーネント
 */


class FacebookComponent extends Object
{
	var $name		= "Facebook";
	var $components	= array('Email');
	var $controller;
		
	var $facebook;	//Facebook object
	//
	var $user		= null;

	var $appId		= "293306697370465";
	var $appSecret	= "345930065c85d7221150fdb56b665363";
	var $appToken	= "293306697370465|oZWkaWqacvnS60uEmSpmMM8TF1c";

	var $pageId		= "386549498021855";
	var $pageToken	= "EAAEKwsmBy2EBAK7AUs5Tu5zRbZBkXiNpyOnDRj8do32axKbfEL7mY2KgvEOvzXolt9n7mRLjNsB0ZCaWM9rHZAzuCYcEcHAZAayi8WUQQa12Vpwg2ZBBaPtUZCuvP46ACNfzJpILWYvksHs7Oxz7ulIzwOcakzV3ZBW8mGNRfpIfgZDZD";
	
	var $tokenExpiration	= false;	//↑トークン期限切れ
	
	// var $loginScope		= "status_update,publish_stream,manage_pages";
	var $loginScope		= "manage_pages";
	var $loginRedirect	= "http://onlinegame.dz-life.net/sys/shares";
	
	var $errorMessage	= "";
	
	/**
	 * initialize
	 *
	 * @params	controller	controller
	 */
	function initialize(&$controller)
	{
		$this->controller =& $controller;
	}
	/**
	 * 初期化
	 *
	 * @params	bool	login
	 */
	function init($login = false)
	{
		//Import
		App::Import('Vendor', 'facebook'.DS.'src'.DS.'facebook');
		//Create object
		$this->facebook = new Facebook(array(
			"appId" => $this->appId,
			"secret" => $this->appSecret,
		));
		//Login and get page data
		if($login)
		{
			$this->user = $this->facebook->getUser();
			if(empty($this->user))
			{
				$this->login();
			}
			$pages = $this->facebook->api("/me/accounts");
//			pr($pages);
	
			foreach($pages["data"] as $page)
			{
				if($page["id"] == $this->pageId)
				{
//					pr($page);
					if($this->pageToken != $page["access_token"])
					{
						$this->tokenExpiration = true;
						$this->pageToken = $page["access_token"];
					}
				}
			}
		}
	}

	/**
	 * ログイン
	 */
	function login()
	{
		$params = array(
			'scope' => $this->loginScope,
			'redirect_uri' => $this->loginRedirect,
		);
		$loginUrl = $this->facebook->getLoginUrl($params);
		$this->controller->redirect($loginUrl);
		exit();
	}

	/**
	 * 投稿
	 *
	 * @params	array	options
	 * @options	string	link
	 * @options	string	message
	 * 
	 * @params	bool	errorMail
	 */
	function post($options = array() , $errorMail = false)
	{
		$this->facebook->setAccessToken($this->pageToken);
		$default = array(
			"link" => null,
			"message" => null
		);
		$post = array_merge($default , $options);

		try
		{
			$this->facebook->api("/" . $this->pageId . "/feed" , "post" , array(
				"link" => $post["link"],
				"message" => $post["message"],
			));
			return true;
		}
		catch(FacebookApiException $e)
		{
			$this->errorMessage = $e->getMessage();
			if($errorMail)
			{
				$this->Email->from			= 'zilow@dz-life.net';
				$this->Email->to			= 'zilow@dz-life.net';
				$this->Email->subject		= '[DZ]Facebook投稿エラー';
				$this->Email->send("
■エラーメッセージ
{$this->errorMessage}

■編集URL
http://onlinegame.dz-life.net/sys/shares
				");
			}
			return false;
		}
	}
}