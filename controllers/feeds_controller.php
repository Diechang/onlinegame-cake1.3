<?php
class FeedsController extends AppController {

	var $name		= 'Feeds';
	var $uses		= array("Title","Vote"/*,"Event"*/);
	var $helpers	= array("Rss");

	function index()
	{
	}

	//イベント
	function _events()
	{
		$channelData = array("title" => "イベント・キャンペーン情報 - オンラインゲームライフ",
						"link" => array("controller" => "feeds", "action" => "events", "ext" => "rss"),
						"url" => array("controller" => "feeds", "action" => "events", "ext" => "rss"),
						"description" => "イベント・キャンペーン情報です。",
						"language" => "ja"
						);
		$events = $this->Event->find("all", array(
			"conditions" => array(
				"Event.public" => 1,
			),
			"limit" => 10,
			"order" => array("Event.start DESC"),
		));
//		pr($titles);
		$this->set(compact("channelData", "events"));
	}
	//新着レビュー
	function review()
	{
		$channelData = array("title" => "新着レビュー - オンラインゲームライフ",
						"link" => array("controller" => "feeds", "action" => "review", "ext" => "rss"),
						"url" => array("controller" => "feeds", "action" => "review", "ext" => "rss"),
						"description" => "オンラインゲームライフに投稿された最新レビュー10件です。",
						"language" => "ja"
						);
		$votes = $this->Vote->find("all", array(
			"conditions" => array(
				"Vote.public" => 1,
				"NOT" => array(
					"Vote.review",
				),
			),
			"limit" => 10,
			"order" => "Vote.created DESC",
		));
//		pr($votes);
		$this->set(compact("channelData", "votes"));
	}
	//新着
	function newgames()
	{
		$channelData = array("title" => "新着オンラインゲーム情報 - オンラインゲームライフ",
						"link" => array("controller" => "feeds", "action" => "newgames", "ext" => "rss"),
						"url" => array("controller" => "feeds", "action" => "newgames", "ext" => "rss"),
						"description" => "新しくオンラインゲームライフに登録されたゲーム情報です。",
						"language" => "ja"
						);
		$titles = $this->Title->find("all", array(
			"recursive" => -1,
			"conditions" => array(
				"Title.public" => 1,
			),
			"limit" => 10,
			"order" => array(
				"Title.created DESC",
				"Title.id DESC",
			),
		));
//		pr($titles);
		$this->set(compact("channelData", "titles"));
	}
	//新作
	function newstart()
	{
		$channelData = array("title" => "最新オンラインゲーム情報 - オンラインゲームライフ",
						"link" => array("controller" => "feeds", "action" => "newgames", "ext" => "rss"),
						"url" => array("controller" => "feeds", "action" => "newgames", "ext" => "rss"),
						"description" => "新しくサービスが開始された新作オンラインゲーム情報です。",
						"language" => "ja"
						);
		$titles = $this->Title->find("all", array(
			"recursive" => -1,
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => 2,
			),
			"limit" => 10,
			"order" => "Title.service_start DESC",
		));
//		pr($titles);
		$this->set(compact("channelData", "titles"));
	}
	//テスト
	function test()
	{
		$channelData = array("title" => "無料テスト情報 - オンラインゲームライフ",
						"link" => array("controller" => "feeds", "action" => "test", "ext" => "rss"),
						"url" => array("controller" => "feeds", "action" => "test", "ext" => "rss"),
						"description" => "オープンβテスト、クローズドβテスト情報です。",
						"language" => "ja"
						);
		$this->Title->unbindAll(array("Service"));
		$titles = $this->Title->find("all", array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => array(3,4),
			),
//			"limit" => 10,
			"order" => array("Title.test_start DESC" , "Title.test_end DESC"),
		));
//		pr($titles);
		$this->set(compact("channelData", "titles"));
	}
}
?>