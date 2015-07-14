<?php
//レビュー
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , $title["Title"]["title_official"] . "レビュー・評価投稿");
$this->set("keywords_for_layout" , "");
$this->set("description_for_layout" , "");
$this->set("h1_for_layout" , $title["Title"]["title_official"] . "レビュー・評価投稿");
$this->set("pankuz_for_layout" , array(array("str" => $title["Title"]["title_official"] , "url" => array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "レビュー・評価投稿"));
?>
<?php echo $session->flash()?>
<?php
	echo $this->element("form_vote" , array(
	"title"		=> $title["Title"]["title_official"],
	"titleId"	=> $title["Title"]["id"],
	"votable"	=> $title["Title"]["votable"],
))?>