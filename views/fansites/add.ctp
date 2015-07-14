<?php
//レビュー
$html->css(array('titles' , 'review'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set - Layout vars
$this->set("title_for_layout" , $titleWithStr["Abbr"] . "攻略・ファンサイト登録");
$this->set("keywords_for_layout" , "");
$this->set("description_for_layout" , "");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . "攻略・ファンサイト登録");
$this->set("pankuz_for_layout" , array(
	array("str" => $titleWithStr["Case"] , "url" => array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")),
	array("str" => "攻略・ファンサイト" , "url" => array("controller" => "titles" , "action" => "link" , "path" => $title["Title"]["url_str"] , "ext" => "html")),
	"登録申込",
));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>
<?php echo $this->element("title_head_menu")?>
<?php echo $this->element("form_fansite" , array("title" => $title, "id" => $title["Title"]["id"]))?>
<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr))?>