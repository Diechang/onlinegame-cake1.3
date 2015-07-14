<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"],
				"link" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "index", "path" => $item["Title"]["url_str"], "ext" => "html"),
				"description" => "【" . $item["Service"]["str"] . "】<br />" . $item["Title"]["test_start"] . " ～ " . $item["Title"]["test_end"] . "<br /><br />" . strip_tags($item["Title"]["description"]),
				"pubDate" => $item["Title"]["test_start"],
				);
}
$this->set("items", $rss->items($titles, "rss_transform"));
?>