<?php
function rss_transform($item)
{
	return array("title" => "【" . $item["Title"]["title_official"] . "】" . $item["Event"]["name"],
				"link" => array("controller" => "titles", "action" => "event", "path" => $item["Title"]["url_str"], "eventid" => $item["Event"]["id"], "ext" => "html"),
				"guid" => array("controller" => "titles", "action" => "event", "path" => $item["Title"]["url_str"], "eventid" => $item["Event"]["id"], "ext" => "html"),
				"description" => "【" . $item["Title"]["title_official"] . "】<br />" . $item["Event"]["start"] . " ～ " . $item["Event"]["end"] . "<br /><br />" . strip_tags($item["Event"]["summary"]),
				"pubDate" => $item["Event"]["modified"],
				);
}
$this->set("items", $rss->items($events, "rss_transform"));
?>