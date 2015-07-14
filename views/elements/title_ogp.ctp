<?php
//OGP
$this->Ogp->options = array(
	"type" => (isset($ogpType)) ? $ogpType : "article",
	"title" => (isset($ogpTitle)) ? $ogpTitle : $this->Common->titleAll($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]),
	"url" => "http://onlinegame.dz-life.net" . ((isset($ogpUrl)) ? $ogpUrl : $html->url(array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html"))),
	"image" => "http://onlinegame.dz-life.net/img/" . ((isset($ogpImage)) ? $ogpImage : $this->Common->thumbName($title["Title"]["thumb_name"])),
	"description" => (isset($ogpDescription)) ? $ogpDescription : $titleWithStr["Sub"] . "のトップページです。動作環境や関連動画、評価点数やレビューページへもこちらからどうぞ",
);
?>