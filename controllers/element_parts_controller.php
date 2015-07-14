<?php
class ElementPartsController extends AppController {

	var $name		= 'ElementParts';
	var $uses		= array("Title" , "Category" , "Style" , "Service" , "Pcshop" , "Moneycategory",
							"AdCenterBottom" , "AdLeftBottom" , "AdLeftTop" , "AdRightBottom" , "AdRightTop");
	var $helpers	= array("SearchPage");
	var $components	= array("Auth");

	function beforeFilter()
	{
		//Auth allow
		$this->Auth->allow("*");
	}
	
	/**
	 * Global parts
	 */
	function global_header()
	{
		//Menu
		$headerCategories = $this->Category->find("all" , array(
			"conditions" => array("Category.public" => 1),
			"recursive" => -1,
			"order" => "Category.sort"
		));
		$headerMoneycategories = $this->Moneycategory->find("all" , array(
			"conditions" => array("Moneycategory.public" => 1),
			"recursive" => -1,
			"order" => "Moneycategory.sort"
		));
		//
		$this->set("headerCategories" , $headerCategories);
		$this->set("headerMoneycategories" , $headerMoneycategories);

		//Counts
		$headCountTitle = $this->Title->find("count" , array(
			"recursive" => -1,
			"conditions" => array("Title.public" => 1),
			"fields" => "DISTINCT Title.id",
		));
		$headCountReview = $this->Title->Vote->find("count" , array(
			"recursive" => -1,
			"conditions" => array(
				"Vote.public" => 1,
				"NOT" => array("Vote.review" => null),
			),
			"fields" => "DISTINCT Vote.id",
		));
		$headCountVote = $this->Title->Vote->find("count" , array(
			"recursive" => -1,
			"conditions" => array("Vote.public" => 1),
			"fields" => "DISTINCT Vote.id",
		));
		//
		$this->set("headCountTitle" , $headCountTitle);
		$this->set("headCountReview" , $headCountReview);
		$this->set("headCountVote" , $headCountVote);
	}

	/**
	 * Left parts
	 */
	function left_category()
	{
		$leftCategories = $this->Category->find("all" , array(
			"conditions" => array("Category.public" => 1),
			"recursive" => -1,
			"order" => "Category.sort"
		));
		//
		$this->set("leftCategories" , $leftCategories);
	}

	function left_style()
	{
		$leftStyles = $this->Style->find("all" , array(
			"conditions" => array("Style.public" => 1),
			"recursive" => -1,
			"order" => "Style.sort"
		));
		//
		$this->set("leftStyles" , $leftStyles);
	}

	function left_service()
	{
		$leftServices = $this->Service->find("all" , array(
			"conditions" => array("Service.public" => 1),
			"recursive" => -1,
			"order" => "Service.sort"
		));
		//
		$this->set("leftServices" , $leftServices);
	}

	function left_pcshop()
	{
		$leftPcshops = $this->Pcshop->find("all" , array(
			"conditions" => array("Pcshop.public" => 1),
			"recursive" => -1,
			"order" => "Pcshop.sort"
		));
		//
		$this->set("leftPcshops" , $leftPcshops);
	}

	function left_ranking()
	{
		$leftRankings = $this->Title->getRanking(array(
			"limit" => 10,
		));
//		pr($leftRankings);
//		exit;
		$this->set("leftRankings" , $leftRankings);
	}


	/**
	 * Right parts
	 */
	function right_test()
	{
		$this->Title->unbindAll(array("Service"));
		$rightTests = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => array(3,4),
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
				"Service.*"
			),
			"order" => array(
				"Title.ad_use DESC",
				"Title.test_start DESC"
			),
			"limit" => 5
		));
		//
		$this->set("rightTests" , $rightTests);
	}

	function right_pickup()
	{
		$rightPickups = $this->Title->find("all" , array(
			"conditions" => array(
				"Title.public" => 1,
				"Title.service_id" => 2,
				"Title.ad_use" => 1,
			),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.thumb_name",
				"Title.description",
				"Title.service_id",
				"Title.service_start",
				"Title.fee_id",
				"Title.fee_text",
				"Title.ad_use",
				"Title.ad_text",
				"Title.official_url",
				"Fee.*",
				"Service.*",
			),
			"contain" => array("Category" , "Fee" , "Service"),
			"order" => array("Title.service_start DESC"),
			"limit" => 5
		));
		//
		$this->set("rightPickups" , $rightPickups);
	}

	/**
	 * Ads
	 */
	function ad_center_bottoms()
	{
		$adCenterBottoms = $this->AdCenterBottom->find("first" , array(
			"conditions" => array("AdCenterBottom.public" => 1),
			"order" => "id DESC",
		));
//		pr($adCenterBottoms);
//		exit;
		$this->set("adCenterBottoms" , $adCenterBottoms);
	}

	function ad_left_bottoms()
	{
		$adLeftBottoms = $this->AdLeftBottom->find("first" , array(
			"conditions" => array("AdLeftBottom.public" => 1),
			"order" => "id DESC",
		));
//		pr($adLeftBottoms);
//		exit;
		$this->set("adLeftBottoms" , $adLeftBottoms);
	}

	function ad_left_tops()
	{
		$adLeftTops = $this->AdLeftTop->find("first" , array(
			"conditions" => array("AdLeftTop.public" => 1),
			"fields" => array(
				"AdLeftTop.*",
				"Title.id",
				"Title.title_official",
				"Title.title_read",
				"Title.title_abbr",
				"Title.url_str",
			),
			"order" => "AdLeftTop.id DESC",
		));
//		pr($adLeftTops);
//		exit;
		$this->set("adLeftTops" , $adLeftTops);
	}

	function ad_right_bottoms()
	{
		$adRightBottoms = $this->AdRightBottom->find("all" , array(
			"conditions" => array("AdRightBottom.public" => 1),
			"order" => "AdRightBottom.sort, AdRightBottom.id DESC",
		));
//		pr($adRightBottoms);
//		exit;
		$this->set("adRightBottoms" , $adRightBottoms);
	}

	function ad_right_tops()
	{
		$adRightTops = $this->AdRightTop->find("first" , array(
			"conditions" => array("AdRightTop.public" => 1),
			"order" => "id DESC",
		));
//		pr($adRightTops);
//		exit;
		$this->set("adRightTops" , $adRightTops);
	}

	/**
	 * Index
	 */
	 function index_new_games()
	 {
	 }
	 
	 function index_rankings()
	 {
	 }
	 
	 function index_reviews()
	 {
	 }
	 
	 function index_newers()
	 {
	 }
	 
	 function index_fansites()
	 {
	 }
	 
	 function index_updates()
	 {
	 }
	 

	/**
	 * Other
	 */
	function search_title_form()
	{

		/** Categories **/
		$mstCategories = $this->Title->Category->find("all" , array(
			"recursive" => -1,
			"fields" => array("id", "str", "path"),
			"order" => "Category.sort"
		));
		/** Styles **/
		$mstStyles = $this->Title->Style->find("all" , array(
			"recursive" => -1,
			"fields" => array("id", "str", "path"),
			"order" => "Style.sort"
		));
		/** Services **/
		$mstServices = $this->Title->Service->find("all" , array(
			"recursive" => -1,
			"fields" => array("id", "str", "path"),
			"order" => "Service.sort"
		));
		//
		return array(
		"Categories" => $mstCategories,
		"Styles" => $mstStyles,
		"Services" => $mstServices);
	}
}
?>