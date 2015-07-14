<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"],
				"link" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"description" => strip_tags($item["Title"]["description"]),
				"pubDate" => $item["Title"]["created"],
				);
}
$this->set("items", $rss->items($titles, "rss_transform"));
?>