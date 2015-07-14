<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"],
				"link" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"description" => "【正式サービス開始】<br />" . $item["Title"]["service_start"] . "<br /><br />" . strip_tags($item["Title"]["description"]),
				"pubDate" => $item["Title"]["service_start"],
				);
}
$this->set("items", $rss->items($titles, "rss_transform"));
?>