<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " 攻略・ファンサイトリンク集");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "の攻略・ファンサイトリンク集です。");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " 攻略・ファンサイトリンク集");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "攻略・ファンサイト"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<?php echo $this->TitlePage->voteLinkButton($title["Title"]["url_str"])?>

<div class="content links">
	<h2><?php echo $html->image("design/titles_links_title_cap.gif" , array("alt" => "攻略リンク集"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>攻略サイト</p>
<?php if(!empty($sites["Caps"])):?>
	<ul class="linksList">
	<?php foreach($sites["Caps"] as $site):?>
		<li class="clearfix">
			<h3><?php echo $html->link($site["site_name"] , $site["site_url"] , array("target" => "_blank"))?></h3>
			<div class="thumb"><?php echo $html->link($html->image("http://capture.heartrails.com/small?" . $site["site_url"] , array("width" => 120 , "alt" => $site["site_name"])) , $site["site_url"] , array("target" => "_blank" , "escape" => false))?></div>
			<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
			<p class="report"><?php echo $html->link("×リンク切れ報告" , "javascript:void(0)" ,
								array("onclick" => "if(confirm('リンク切れ報告を送信しますか？')) location.href='" . $html->url(array("controller" => "fansites" , "action" => "report" , $site["id"])) . "'" , "rel" => "nofollow"))?></p>
		</li>
	<?php endforeach;?>
	</ul>
<?php else:?>
	<p class="noLinks"><?php echo $titleWithStr["Case"]?>の攻略サイト情報が登録されていません。攻略サイト、Wikiサイト等を運営、またはご存知の方はぜひご登録をお願いします。</p>
<?php endif;?>
	<div class="entryButton"><a href="<?php echo $html->url(array("controller" => "fansites" , "action" => "add" , $title["Title"]["id"]))?>"><?php echo $html->image("design/titles_links_button_entry.gif" , array("alt" => "攻略・ファンサイトリンク集に登録・推薦する"))?></a></div>
</div>

<div class="content tCenter"><?php echo $this->Gads->both468()?></div>

<div class="content links">
	<h2><?php echo $html->image("design/titles_links_title_fan.gif" , array("alt" => "ファンサイトリンク集"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>ファンサイト</p>
<?php if(!empty($sites["Fans"])):?>
	<ul class="linksList">
	<?php foreach($sites["Fans"] as $site):?>
		<li class="clearfix">
			<h3><?php echo $html->link($site["site_name"] , $site["site_url"] , array("target" => "_blank"))?></h3>
			<div class="thumb"><?php echo $html->link($html->image("http://capture.heartrails.com/small?" . $site["site_url"] , array("width" => 120 , "alt" => $site["site_name"])) , $site["site_url"] , array("target" => "_blank" , "escape" => false))?></div>
			<p class="description"><?php echo (!empty($site["description"])) ? nl2br(h($site["description"])) : $site["site_url"]?></p>
			<p class="report"><?php echo $html->link("×リンク切れ報告" , "javascript:void(0)" ,
								array("onclick" => "if(confirm('リンク切れ報告を送信しますか？')) location.href='" . $html->url(array("controller" => "fansites" , "action" => "report" , $site["id"])) . "'" , "rel" => "nofollow"))?></p>
		</li>
	<?php endforeach;?>
	</ul>
<?php else:?>
	<p class="noLinks"><?php echo $titleWithStr["Case"]?>のファンサイト情報が登録されていません。ファンサイト、プレイブログ等を運営、またはご存知の方はぜひご登録をお願いします。</p>
<?php endif;?>
	<div class="entryButton"><a href="<?php echo $html->url(array("controller" => "fansites" , "action" => "add" , $title["Title"]["id"]))?>"><?php echo $html->image("design/titles_links_button_entry.gif" , array("alt" => "攻略・ファンサイトリンク集に登録・推薦する"))?></a></div>
</div>

<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php //echo $this->element("form_fansite" , array("title" => $title , "id" => $title["Title"]["id"]))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
