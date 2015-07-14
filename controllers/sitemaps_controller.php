<?php
class SitemapsController extends AppController {

	var $name = 'Sitemaps';
	var $uses = array("Vote" , "Fansite" , "Link" , "Update" , "Portal" , "Money" , "Event");

	function index()
	{
		$files = array("pages" , "votes" , /*"events"*/);
		$this->set("files" , $files);
	}

	function pages()
	{
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
		$this->Title->unbindAll(array("Titlesummary"));
		$titles = $this->Title->find("all" , array(
			"conditions" => array("public" => 1),
			"fields" => array(
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Titlesummary.*",
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

	function votes()
	{
		$votes = $this->Vote->find("all" , array(
			"conditions" => array(
				"Vote.public" => 1,
				"NOT" => array(
					"Vote.review" => NULL,
				),
			),
 			"order" => "Vote.id DESC",
		));
//		pr($votes);
		//
		//Set
		$this->set("votes" , $votes);
	}
	
	function _events()
	{
		$events = $this->Event->find("all" , array(
			"conditions" => array("Event.public" => 1),
			"order" => "Event.id DESC",
		));
//		pr($events);
		//
		//Set
		$this->set("events" , $events);
	}
}
?>