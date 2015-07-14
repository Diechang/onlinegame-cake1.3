<?php
class SearchController extends AppController {

	var $name = 'Search';
	var $uses = array("Title");
	var $helpers = array("SearchPage");

	var $urlParamNames = array(
		"keyword",
		"category",
		"style",
		"service",
		"free",
		"vote",
		"fansite",
		"order",
	);

	//表示件数
	var $limit = 20;

	function index()
	{
		//Search form
	}

	function result()
	{
		App::import('Sanitize');
		
		$url = $this->params["url"];
		if(empty($url["page"]))
		{
			$url["page"] = 1;
		}
		$url = Sanitize::clean($url , Configure::read("UseDbConfig"));
//		pr($url);
//		exit;

		//category
		$idListByCategory = $this->Title->idListByCategory($url["category"]);
		//style
		$idListByStyle = $this->Title->idListByStyle($url["style"]);
		//ID list
		$idList = null;
		if(!empty($idListByCategory) && !empty($idListByStyle))
		{
//			$idList = array_merge($idListByCategory , $idListByStyle);
			$idList = array_intersect($idListByCategory , $idListByStyle);
		}
		else if(!empty($idListByCategory))
		{
			$idList = $idListByCategory;
		}
		else if(!empty($idListByStyle))
		{
			$idList = $idListByStyle;
		}
//		pr($idListByCategory);
//		pr($idListByStyle);
//		pr($idList);

		/**
		 * conditions
		 */
		$conditions = array();
		//keyword
		if(!empty($url["keyword"]))
		{
			$conditions += array("OR" => $this->Title->wConditions($url["keyword"]));
		}
		//id list
		if(!empty($idList))
		{
			$conditions += array("Title.id" => $idList);
		}
		//service
		if(!empty($url["service"]))
		{
			$conditions += array("Title.service_id" => $url["service"]);
		}
		else
		{
			$conditions += array("Title.service_id <>" => 1);
		}
		//others
		if(!empty($url["free"]))
		{
			$conditions += array("Title.fee_id" => array(1,2));
		}
		if(!empty($url["vote"]))
		{
			$conditions += array("Titlesummary.vote_count_vote >" => 0);
		}
		if(!empty($url["fansite"]))
		{
			$conditions += array("Titlesummary.fansite_count >" => 0);
		}
//		pr($conditions);

		/**
		 * order
		 */
		if(empty($url["order"])) $url["order"] = "rating";
		switch($url["order"])
		{
			case "rating":
				$order = "Titlesummary.vote_avg_all DESC";
				break;
			case "start":
				$order = "Title.service_start DESC";
				break;
			case "name":
				$order = "Title.title_official";
				break;
		}

		/**
		 * limit
		 */
		$limitStart = (($url["page"] - 1) * $this->limit);
		$limit = $limitStart . "," . $this->limit;
//		pr($limit);


		/**
		 * find
		 */
		$this->Title->unbindAll(array("Titlesummary"));
		$titles = $this->Title->find("all" , array(
			"conditions" => $conditions,
			"order" => $order,
			"limit" => $limit,
		));
//		pr($titles);

		/**
		 * paging
		 */
		$titlesCount = $this->Title->find("count" , array(
			"conditions" => $conditions,
			"fields" => "DISTINCT Title.id",
		));
//		pr($titlesCount);
		$paging = array(
			"count" => $titlesCount,
			"pages" => ceil($titlesCount / $this->limit),
			"page" => $url["page"],
			"start" => $limitStart + 1,
			"end" => ($limitStart + $this->limit < $titlesCount) ? $limitStart + $this->limit : $titlesCount,
			"limit" => $this->limit,
		);
//		pr($paging);

		/**
		 * URL params
		 */
		$urlParams = array();
		foreach($this->urlParamNames as $paramName)
		{
			if(isset($url[$paramName]) && !empty($url[$paramName]))
			{
				$urlParams[$paramName] = $url[$paramName];
			}
		}
//		pr($urlParams);

		//set
		$this->set("titles" , $titles);
		$this->set("paging" , $paging);
		$this->set("urlParams" , $urlParams);
	}
}
?>