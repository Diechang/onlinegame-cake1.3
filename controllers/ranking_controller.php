<?php
class RankingController extends AppController {

	var $name = 'Ranking';
	var $uses = array("Title" , "Category");

	function index($path = null)
	{
		if(empty($path))
		{
			//Redirect
			$this->redirect(array("controller" => "ranking" , "path" => "index" , "ext" => "html"));
		}
		else
		{
			/*
			 * Category Data
			 */
			//Get
			$categories = $this->Category->find("all" , array(
				"recursive" => -1,
				"order" => "Category.sort",
			));
//			pr($categories);
			//
			//Set
			$this->set("categories" , $categories);

			//Category Pathes
			$pathes = array();
			foreach($categories as $category)
			{
				array_push($pathes , $category["Category"]["path"]);
			}

			/**
			 * Page Data
			 */
			if(in_array($path , $pathes))
			{//$pathがCategory一致
				//Get
				$pageData = $this->Category->find("first" , array(
					"conditions" => array("Category.path" => $path)
				));
//				pr($pageData);
				$str = $pageData["Category"]["str"];
				//Pankuz set
				$this->set("pankuz_for_layout" , array(
					array(
						"str" => "総合ランキング",
						"url" => array("controller" => "ranking" , "path" => "index" , "ext" => "html")
					),
					$str,
				));
			}
			elseif($path == "index")
			{//Index - 総合
				$str = "総合";
				//Pankuz set
				$this->set("pankuz_for_layout" , $str . "ランキング");
			}
			else
			{
				$this->redirect(array("controller" => "ranking" , "path" => "index" , "ext" => "html"));
			}
			//Create
			//
			//Set
			$this->set("title_for_layout" , "【" . $str . "】人気オンラインゲームランキング");
			$this->set("keywords_for_layout" , $str . ",人気,ランキング,オンラインゲーム");
			$this->set("description_for_layout" , "【" . $str . "】人気オンラインゲームランキングです。ジャンル別の人気オンラインゲームがすぐわかる！");
			$this->set("h1_for_layout" , "【" . $str . "】人気オンラインゲームランキング");
			//
			$this->set("mainStr" , $str);
			$this->set("path" , $path);

			/**
			 * Ranking Data
			 */
			//Get - Ranking
			if(in_array($path , $pathes))
			{//Category
				$rankings = $this->Title->getRanking(array(
					"category_id" => $pageData["Category"]["id"],
					"idList" => true,
				));
				$this->Title->unbindAll(array("Titlesummary"));
				$norankings = $this->Title->find("all" , array(
					"conditions" => array(
						"Title.public" => 1,
						"Title.id" => $rankings["idList"],
						"Title.service_id" => array(2,3),
						"Titlesummary.vote_count_vote" => 0,
					),
					"order" => "Title.title_official",
				));
			}
			else
			{//All
				$rankings = $this->Title->getRanking(array("idList" => true));
				$this->Title->unbindAll(array("Titlesummary"));
				$norankings = $this->Title->find("all" , array(
					"conditions" => array(
						"Title.public" => 1,
						"Title.service_id" => array(2,3),
						"Titlesummary.vote_count_vote" => 0,
					),
					"order" => "Title.title_official",
				));
			}
//			pr($rankings);
//			pr($norankings);
//			exit;
			//
			//Set
			$this->set("rankings" , $rankings);
			$this->set("norankings" , $norankings);
		}
	}
}
?>