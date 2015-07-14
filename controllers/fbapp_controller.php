<?php
class FbappController extends AppController {

	var $name = 'Fbapp';
	var $uses = array("Title");

	var $facebook;	//Facebook object

	//app name = "オンラインゲームライフのデータを表示してオンラインゲームライフの窓口を増やすアプリのテスト";
	var $appId		= "256318981123457";
	var $secret		= "6f417af741bd630186edd8f67e7d13e7";
	//
	var $canvasPage	= "http://apps.facebook.com/onlinegamelife-data/";

	var $authUrl;
	var $addPageUrl;
	var $signed_request;

	var $userId;
	var $userInfo;

	function beforeFilter()
	{
		Configure::write('debug', 2);

		//Import
		App::Import('Vendor', 'facebook/src/facebook');
		$this->facebook = new Facebook(array(
			"appId" => $this->appId,
			"secret" => $this->secret,
		));

		//認証URL
		$this->authUrl = "http://www.facebook.com/dialog/oauth?client_id="
. $this->appId . "&redirect_uri=" . urlencode($this->canvasPage);
		//Facebookページに追加URL
		$this->addPageUrl	= "https://www.facebook.com/dialog/pagetab?app_id=" . $this->appId . "&display=popup&next=" . $this->canvasPage . "tab";

		//signed_request 取得 Facebook経由以外は404
		$this->signed_request = $this->facebook->getSignedRequest();
		if(empty($this->signed_request))
		{
			$this->cakeError("error404");
		}
//		pr($this->signed_request);

		$this->userId = $this->facebook->getUser();
//		pr($this->userId);

		if(empty($this->userId))
		{
			$this->redirect($this->authUrl);
		}
		else
		{
			try
			{
				$this->userInfo = $this->facebook->api('/me','GET');
			}
			catch(FacebookApiException $e)
			{
				$login_url = $this->facebook->getLoginUrl();
				echo 'Please <a href="' . $login_url . '">login.</a>';
				error_log($e->getType());
				error_log($e->getMessage());
			}
		}


		//Auth allow
		$this->Auth->allow("*");
		//Use layout
		$this->layout = "fbapp";
		//Set laytou vars
		$this->set("title_for_layout" , "Facebookアプリ");
	}

	function index()
	{
//		$this->autoRender = false;

		$this->set("titles" , $this->Title->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Title.ad_use" => 1,
			),
			"limit" => 10,
			"order" => "service_start DESC",
		)));
		$this->set("userInfo" , $this->userInfo);
		$this->set("addPageUrl" , $this->addPageUrl);
//		pr($this->signed_request);
	}

	function tab()
	{
		$this->set("titles" , $this->Title->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Title.ad_use" => 1,
			),
			"limit" => 10,
			"order" => "service_start DESC",
		)));
		$this->set("userInfo" , $this->userInfo);
		$this->set("pageInfo" , $this->signed_request["page"]);
		pr($_POST["signed_request"]);
		pr($this->signed_request);
	}
}
?>