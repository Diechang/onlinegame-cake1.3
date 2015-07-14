<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
$html->script(array(
	'http://www.google.com/jsapi',
	'http://widgets.twimg.com/j/2/widget.js',
	'imu'
), false);
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $this->Common->titleAll($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "のトップページです。動作環境や関連動画、" . $titleWithStr["Case"] . "の評価点数やレビューページへもこちらからどうぞ");
$this->set("h1_for_layout" , $titleWithStr["Abbr"]);
$this->set("pankuz_for_layout" , array($titleWithStr["Case"]));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<?php echo $this->element("title_details_rich_snippets" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php if(!empty($title["Titlesummary"]["package_count"])):?>
<!-- Packages -->
<div class="content packages">
	<h2><?php echo $html->image("design/titles_packages_title.gif" , array("alt" => "パッケージ製品 - ダウンロード不要で特典アイテム付（かも）！"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のパッケージ製品</p>
	<?php foreach($title["Package"] as $package):?>
	<div class="items clearfix">
		<h3><?php echo $this->Common->adLinkText($package , "package")?></h3>
		<div class="thumb">
			<?php echo $this->Common->adLinkImage($package , "package")?>
			<?php echo $this->Common->adTrackImg($package)?>
		</div>
		<div class="data">
			<p>発売日：<?php echo $this->Common->dateFormat($package["release"] , "date")?></p>
			<p class="price"><?php echo number_format($package["price"])?>円</p>
			<p class="rakuten"><?php echo $this->Common->adLinkRakutenSearch($package["ad_part_text"])?></p>
		</div>
	</div>
	<?php endforeach;?>
</div>
<?php endif;?>

<!--Specs-->
<div class="content specs">
	<h2><?php echo $html->image("design/titles_specs_title.gif" , array("alt" => "動作環境※動作環境は必ず公式サイトで確認をお願いします"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>の動作環境/PCスペック</p>
	<?php echo $this->element("title_specs" , array("specs" => $title["Spec"]))?>
	<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
	<p class="pcsLink"><?php echo $html->link("快適動作の推奨PCをチェックしてみる" , array("action" => "pc" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></p>
	<?php endif;?>
</div>

<!--Video-->
<div class="content video">
	<h2><?php echo $html->image("design/titles_video_title.gif" , array("alt" => "関連動画"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>関連動画</p>
<?php echo $this->TitlePage->videoEmbed($title["Title"]["video"])?>
	<p class="search"><?php echo $html->link($title["Title"]["title_official"] . "の動画を探す" , array("action" => "search" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></p>
	<p class="officialLink">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
	</p>
</div>

<?php $word = (!empty($title["Title"]["keyword"]))
				? $title["Title"]["keyword"]
				: (!empty($title["Title"]["title_read"])
					? $title["Title"]["title_read"]
					: $title["Title"]["title_official"])?>
<!--Mashup-->
<!--<div class="content mashup clearfix">
	<div class="tweet">
		<h3>関連ツイート<span>（かもしれない）</span></h3>
		<a class="twitter-timeline" href="https://twitter.com/search?q=<?php echo urlencode($word)?>" data-widget-id="352291710346354688"><?php echo $word?> に関するツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	</div>
</div>-->

<div class="content mashup clearfix">
	<div class="news">
		<h3>関連ニュース<span>（かもしれない）</span></h3>
		<input type="hidden" id="newsSearchWord" value="<?php echo $word?>" />
		<div id="newsResult">
<?php
//			<h4><a href="#">記事タイトル</a></h4>
//			<p class="body">記事本文</p>
//			<p class="publish">記事元</p>
?>
		</div>
		<p id="newsPowered" class="tRight wBold"><a href="http://news.google.co.jp/news/search?pz=1&cf=all&ned=jp&hl=ja&q=<?php echo urlencode($word)?>" target="_blank">Powered by Google</a></p>
	</div>
</div>

<!--Official Link-->
<div class="content officialLinkFrame">
	<p class="officialLink">
			<?php echo $this->Common->officialLinkText(
			$title["Title"]["title_official"],
			$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
	</p>
</div>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
