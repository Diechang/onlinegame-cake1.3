<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " ユーザーレビュー");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "のユーザーレビューです。プレイヤーのみなさんのレビュー（口コミ）を読んで" . $titleWithStr["Sub"] . "の評判をチェック！");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " ユーザーレビュー");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "ユーザーレビュー"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<!--Review-->
<div class="content reviews">
	<h2><?php echo $html->image("design/titles_reviews_title.gif" , array("alt" => "ユーザーレビュー一覧"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のレビュー一覧
	<?php if(!empty($reviews)):?>
	：<?php echo sizeof($reviews)?>件のレビュー
	<?php endif;?>
	</p>
	<ul class="voteTabs">
		<li><a href="<?php echo $html->url(array("action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>"><?php echo $html->image("design/titles_reviews_tabs_list_active.gif" , array("alt" => "レビュー一覧を表示"))?></a></li>
		<li><a href="<?php echo $html->url(array("action" => "allvotes" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>"><?php echo $html->image("design/titles_reviews_tabs_all_normal.gif" , array("alt" => "すべての投稿を表示"))?></a></li>
	</ul>

<?php echo $this->element("title_votes" , array("votes" => $reviews , "titlePath" => $title["Title"]["url_str"] , "all" => false))?>

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
