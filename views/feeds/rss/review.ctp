<?php
function rss_transform($item)
{
	return array("title" => $item["Title"]["title_official"] . "のレビュー",
				"link" => array("controller" => "titles", "action" => "single", "path" => $item["Title"]["url_str"], "voteid" => $item["Vote"]["id"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "single", "path" => $item["Title"]["url_str"], "voteid" => $item["Vote"]["id"], "ext" => "html"),
				"description" => ((!empty($item["Vote"]["title"])) ? "「" . h(strip_tags($item["Vote"]["title"])) . "」<br /><br />" : "") . h(strip_tags($item["Vote"]["review"])),
				"pubDate" => $item["Vote"]["created"],
				);
}
$this->set("items", $rss->items($votes, "rss_transform"));
?>