<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " レビュー・評価全投稿");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "のレビュー・評価の全投稿です。オンラインゲーム選びの参考にプレイヤーのみなさんの評価点数、レビューをどうぞ。");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " レビュー・評価全投稿");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "レビュー・評価全投稿"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<!--Review-->
<div class="content reviews">
	<h2><?php echo $html->image("design/titles_reviews_title_all.gif" , array("alt" => "レビュー・評価全投稿一覧"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のレビュー・評価全投稿一覧
	<?php if(!empty($votes)):?>
	：<?php echo sizeof($votes)?>件の投稿
	<?php endif;?>
	</p>
	<ul class="voteTabs">
		<li><a href="<?php echo $html->url(array("action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>"><?php echo $html->image("design/titles_reviews_tabs_list_normal.gif" , array("alt" => "レビュー一覧を表示"))?></a></li>
		<li><a href="<?php echo $html->url(array("action" => "allvotes" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>"><?php echo $html->image("design/titles_reviews_tabs_all_active.gif" , array("alt" => "すべての投稿を表示"))?></a></li>
	</ul>

<?php echo $this->element("title_votes" , array("votes" => $votes , "titlePath" => $title["Title"]["url_str"] , "all" => true))?>

	<p class="officialLink">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
	</p>
</div>

<?php echo $this->element("form_vote" , array(
	"title"		=> $titleWithStr["Case"],
	"titleId"	=> $title["Title"]["id"],
	"votable"	=> $title["Title"]["votable"],
	"voteItems"	=> $voteItems,
))?>

<?php echo $this->element("title_details_rich_snippets" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
