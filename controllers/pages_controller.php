<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/958/The-Pages-Controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array("SearchPage");

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array("Vote" , "Fansite" , "Link" , "Update" , "Portal" , "Money" , "Pc" , "Package" /*, "Event"*/);

/**
 * Components
 */
	var $components = array();


/**
 * Document root action - Index view
 */
	function home()
	{
		$date = date("Y-m-d");
		//Use layout
		$this->layout = "home";

		//Layout vars
		$this->set("title_for_layout" , "【オンラインゲームライフ】-無料オンラインゲームの人気ランキング・レビュー");
		$this->set("keywords_for_layout" , "オンラインゲーム,無料,オンライン,ゲーム,人気,ランキング,レビュー");
		$this->set("description_for_layout" , "無料オンラインゲーム情報サイト。ユーザーによるレビュー・評価の投稿による人気オンラインゲームランキングや攻略サイトリンク集、ムービー検索も可能。");
		$this->set("h1_for_layout" , "【オンラインゲームライフ】レビュー・評価投稿で人気のオンラインゲーム、注目の最新無料オンラインゲームがすぐわかる！");


		/**
		 * New Games
		 */
		//Get
		$this->Title->unbindAll(array("Titlesummary"));
		$newGames = $this->Title->find("all" , array(
//			"recursive" => -1,
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => 2,
				"NOT" => array("Title.thumb_name" => NULL),
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.description",
				"Titlesummary.vote_avg_all"
			),
			"order" => array("Title.service_start DESC" , "Title.id DESC"),
			"limit" => 10
		));
//		pr($newGames);
//		exit;
		//
		//Set
		$this->set("newGames" , $newGames);


		/**
		 * Ranking
		 */
		//Get
		$rankings = $this->Title->getRanking(array(
//			"category_id" => 2,
//			"style_id" => array(1,2),
//			"service_id" => array(2,3),
			"limit" => 5,
//			"term" => "-1year",
//			"start_year" => 2009,
		));
//		pr($rankings);
//		exit;
		$categoryRankings = $this->Title->Category->find("all" , array(
			"recursive" => -1,
			"order" => "Category.sort",
		));
		foreach($categoryRankings as &$categoryRanking)
		{
			$categoryRanking["Ranking"] = $this->Title->getRanking(array(
				"category_id" => $categoryRanking["Category"]["id"],
				"limit" => 1,
			));
		}
//		pr($categoryRankings);
//		exit;
		//
		//Set
		$this->set("rankings" , $rankings);
		$this->set("categoryRankings" , $categoryRankings);


		/**
		 * Recent Review
		 */
		//Get
		$recents	= $this->Title->Vote->getNewer(NULL , true , 10);
		$this->Title->unbindAll(array("Titlesummary"));
		$waits		= $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => array(2,3),
				"Titlesummary.vote_count_vote" => 0,
			),
			"order" => "Title.ad_use DESC , Title.service_start DESC",
			"limit" => 10
		));
//		pr($recents);
//		pr($waits);
//		exit;
		//
		//Set
		$this->set("recents" , $recents);
		$this->set("waits" , $waits);

		/**
		 * Tests
		 */
		$this->Title->unbindAll(array("Service"));
		$testCurrents =$this->Title->find("all" , array(
			"conditions" => array(
				"OR" => array(
					array(//open
						"Title.service_id" => 3,
						"Title.test_start <=" => $date,
						"Title.test_start >" => date("Y-m-d" , strtotime("-60days")),
						"OR" => array(
							"Title.test_end" => null,
							"Title.test_end >=" => $date,
						),
					),
					array(//closed
						"Title.service_id" => 4,
						"Title.test_start <=" => $date,
						"Title.test_end >=" => $date,
					),
				),
				"Title.public" => 1,
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.description",
				"Title.test_start",
				"Title.test_end",
				"Title.ad_use",
				"Title.ad_text",
				"Title.official_url",
				"Service.str",
				"Service.path",
			),
			"order" => "Title.test_start DESC"
		));
// 		pr($testCurrents);
// 		exit;

		/**
		 * Future tests
		 */
		$this->Title->unbindAll(array("Service"));
		$testFutures =$this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => array(3,4),
				"Title.test_start >" => $date,
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.description",
				"Title.test_start",
				"Title.test_end",
				"Title.ad_use",
				"Title.ad_text",
				"Title.official_url",
				"Service.str",
				"Service.path",
			),
			"order" => "Title.test_start"
		));
// 		pr($testFutures);
// 		exit;
		//
		//set
		$this->set("testCurrents" , $testCurrents);
		$this->set("testFutures" , $testFutures);


		/**
		 * Newer
		 */
		//Get
		$newers = $this->Title->find("all" , array(
			"recursive" => -1,
			"conditions"	=> array("Title.public"	=> 1),
			"fields"		=> array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name"
			),
			"order" => array(
				"Title.created DESC",
				"Title.id DESC",
			),
			"limit"			=> 10
		));
//		pr($newers);
		//
		//Set
		$this->set("newers" , $newers);


		/**
		 * New Fansite
		 */
		//Get
		$fansites = $this->Title->Fansite->find("all" , array(
			"conditions" => array(
				"Fansite.public" => 1,
				"NOT" => array("Fansite.link_url" => NULL),
			),
			"fields" => array(
				"Fansite.*",
				"Title.title_official",
				"Title.title_read",
				"Title.url_str"
			),
			"order"	=> "Fansite.created DESC",
			"limit"	=> 10
		));
//		pr($fansites);
		//
		//Set
		$this->set("fansites" , $fansites);

		/**
		 * Update
		 */
		//Get
		$updates = $this->Update->find("all" , array(
			"order" => "id DESC",
			"limit" => 10,
		));
		//Create
		//
		//Set
		$this->set("updates" , $updates);
	}

/**
 * Sitemap
 */
	function sitemap()
	{
		//Layout vars
		$this->set("title_for_layout" , "サイトマップ");
		$this->set("keywords_for_layout" , "サイトマップ,オンラインゲームライフ");
		$this->set("description_for_layout" , "オンラインゲームライフのサイトマップページ。");
		$this->set("h1_for_layout" , "サイトマップ");
		$this->set("pankuz_for_layout" , "サイトマップ");

		//Get
		//Category
		$categories = $this->Title->Category->find("all" , array(
			"recursive" => -1,
			"order" => "Category.sort"
		));
//		pr($categories);
		//Style
		$styles = $this->Title->Style->find("all" , array(
			"recursive" => -1,
			"order" => "Style.sort"
		));
//		pr($styles);
		//Service
		$services = $this->Title->Service->find("all" , array(
			"recursive" => -1,
			"order" => "Service.sort"
		));
//		pr($services);
		//Title
		$this->Title->unbindAll(array("Service"));
		$titles = $this->Title->find("all" , array(
			"conditions" => array("Title.public" => 1),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Service.*"
			),
			"order" => "Title.title_official",
		));
//		pr($titles);
		$portals = $this->Portal->find("all" , array(
			"recursive" => -1,
			"conditions" => array("public" => 1),
			"fields" => array(
				"Portal.title_official",
				"Portal.title_read",
				"Portal.url_str",
			),
			"order" => "title_official",
		));
//		pr($portals);
		$moneycategories = $this->Money->Moneycategory->find("all" , array(
			"recursive" => -1,
			"conditions" => array("public" => 1),
		));
//		pr($moneycategories);
		//
		//Set
		$this->set("categories" , $categories);
		$this->set("styles" , $styles);
		$this->set("services" , $services);
		$this->set("titles" , $titles);
		$this->set("portals" , $portals);
		$this->set("moneycategories" , $moneycategories);
	}


/**
 * Jump to other site
 */
	function jump()
	{
		if(isset($this->params["url"]["u"]))
		{
			$this->set("u" , $this->params["url"]["u"]);
			//Layout vars
			$this->set("title_for_layout" , "JUMP");
			$this->set("keywords_for_layout" , "");
			$this->set("description_for_layout" , "");
			$this->set("h1_for_layout" , "JUMP");
			$this->set("pankuz_for_layout" , "JUMP");
		}
		else
		{
			$this->redirect("/");
		}
	}

/**
 * System root action - Index view
 */
	function sys_home()
	{
		//Titles
		$this->set('titles', $this->Title->find("all" , array(
			"order" => "Title.id DESC",
			"limit" => 10,
		)));
		//
		//Events
//		$this->Event->recursive = 0;
//		$this->set('events', $this->Event->find("all" , array(
//			"fields" => array(
//				"Event.*",
//				"Title.title_official",
//			),
//			"order" => "Event.id DESC",
//			"limit" => 10,
//		)));
		//
		//Votes
		$this->Vote->recursive = 2;
		$this->Vote->Title->unbindAll(array("Titlesummary"));
		$this->set('votes', $this->Vote->find("all" , array(
			"fields" => array(
				"Vote.*",
				"Title.*",
			),
			"order" => "Vote.id DESC",
			"limit" => 10,
		)));
		//
		//Fansites
		$this->Fansite->recursive = 2;
		$this->Fansite->Title->unbindAll(array("Titlesummary"));
		$this->set('fansites', $this->Fansite->find("all" , array(
			"fields" => array(
				"Fansite.*",
				"Title.*",
			),
			"order" => "Fansite.id DESC",
			"limit" => 10,
		)));
		//
		//Packages
		$this->Package->recursive = 0;
		$this->set('packages', $this->Package->find("all" , array(
			"fields" => array(
				"Package.*",
				"Title.title_official",
			),
			"order" => "Package.id DESC",
			"limit" => 10,
		)));
		//
		//Pcs
		$this->Pc->recursive = 0;
		$this->set('pcs', $this->Pc->find("all" , array(
			"fields" => array(
				"Pc.*",
				"Pcgrade.*",
				"Pctype.*",
				"Pcshop.shop_name",
				"Title.title_official",
			),
			"order" => "Pc.id DESC",
			"limit" => 10,
		)));
		//
		//Links
		$this->Link->recursive = 0;
		$this->set('links', $this->Link->find("all" , array(
			"order" => "Link.id DESC",
			"limit" => 10,
		)));
		//
		$this->set("pankuz_for_layout" , "");
		$this->set("categories" , $this->Title->Category->find("list"));
		$this->set("services" , $this->Title->Service->find("list"));
	}

/**
 * ACR - Page rank text
 */
	function sys_acr_pr()
	{
		$titles = $this->Title->find("all" , array(
			"recursive" => -1,
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => array(2,3,4,5),
//				"Title.ad_use" => 1,
			)
		));
//		pr($titles);
		//
		//Set
		$this->set("titles" , $titles);
		//Set - Layout vars
		$this->set("pankuz_for_layout" , "ACR - ページランクテキスト");
	}


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();
//pr($path);
//exit;
		//homeだったらリダイレクト
		if($path[0] == "home")
		{
			$this->redirect("/");
		}
		//メソッドがあればそっちいってレンダリング
		if(array_search($path[0] , get_class_methods(get_class())))
		{
			$this->$path[0]();
		}
		else
		{
			$count = count($path);
			if (!$count) {
				$this->redirect('/');
			}
			$page = $subpage = $title_for_layout = null;

			if (!empty($path[0])) {
				$page = $path[0];
			}
			if (!empty($path[1])) {
				$subpage = $path[1];
			}
			if (!empty($path[$count - 1])) {
				$title_for_layout = Inflector::humanize($path[$count - 1]);
			}
			$this->set(compact('page', 'subpage', 'title_for_layout'));
		}
		$this->render(implode('/', $path));
	}
}

?>