<?php
$html->css(array('titles' , 'shadowbox/shadowbox'), 'stylesheet', array('inline' => false));
$html->script(array('http://www.google.com/jsapi' , 'shadowbox/shadowbox' , 'mbs'), false);
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " 動画（ムービー）・ブログ記事検索");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "の動画（ムービー）・ブログ記事検索です。");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " 動画・ブログ検索");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "動画・ブログ検索"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>

<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<?php echo $this->TitlePage->voteLinkButton($title["Title"]["url_str"])?>

<ul id="searchTabs">
	<li class="movie"><a href="javascript:void(0)"><img src="/img/design/titles_search_tabs_movie_normal.gif" alt="ムービー" /></a></li>
	<li class="blog"><a href="javascript:void(0)"><img src="/img/design/titles_search_tabs_blog_normal.gif" alt="ブログ" /></a></li>
</ul>
<div id="titlesSearchContainer" class="content">
	<div id="movie" class="searchs">
		<h2><img src="/img/design/titles_searchs_title_movie.gif" alt="動画（ムービー）検索" /></h2>
		<p class="description"><?php echo $title["Title"]["title_official"]?>の動画（ムービー）検索</p>
		<p>
			<input type="text" id="movieSearchWord" value="<?php echo $title["Title"]["title_official"]?>" />
			<input type="button" id="movieSearchButton" class="buttonS" value="キーワード検索" />
		</p>
		<div id="movieResult" class="searchResult">
<?php
//			<p class="paging">
//				<span><a href="javascript:void(0)">≪前の10件</a></span>
//				<span><a href="javascript:void(0)">次の10件≫</a></span>
//			</p>
//			<table>
//				<tr>
//					<td class="thumb">
//						<a href="http://www.youtube.com/v/FJkZTL68Me0&amp;fs=1&amp;source=uds&amp;autoplay=1"><img width="80" alt="LUNA SEA - ROSIER 【LIVE・高画質/HQ】" src="http://1.gvt0.com/vi/FJkZTL68Me0/default.jpg"></a>
//						<div style="margin: 5px auto;" class="star50Back">
//							<div style="width: 40px;" class="star50"><img alt="評価：0点" src="/img/design/rating_star50.gif"></div>
//						</div>
//					</td>
//					<td class="data">
//						<p class="title"><a href="http://www.youtube.com/v/FJkZTL68Me0&amp;fs=1&amp;source=uds&amp;autoplay=1">LUNA SEA</a></p>
//						<p class="description">LUNA SEA GOD BLESS YOU</p>
//						<p class="data">[再生時間]6分17秒</p>
//					</td>
//				</tr>
//			</table>
//			<p class="paging">
//				<span><a href="javascript:void(0)">≪前の10件</a></span>
//				<span><a href="javascript:void(0)">次の10件≫</a></span>
//			</p>
?>
		</div>
		<p id="moviePowered" class="tRight wBold"><a href="http://jp.youtube.com/results?search_type=&search_query=<?php echo urlencode($title["Title"]["title_official"])?>&aq=f" target="_blank">Powered by Youtube（<?php echo $title["Title"]["title_official"]?>）</a></p>
	</div>
	<div id="blog" class="searchs">
		<h2><img src="/img/design/titles_searchs_title_blog.gif" alt="ブログ記事検索" /></h2>
		<p class="description"><?php echo $title["Title"]["title_official"]?>のブログ記事検索</p>
		<p>
			<input type="text" id="blogSearchWord" value="<?php echo $title["Title"]["title_official"]?>" />
			<input type="button" id="blogSearchButton" class="buttonS" value="キーワード検索" />
		</p>
		<div id="blogResult" class="searchResult">
<?php
//			<p class="paging">
//				<span><a href="javascript:void(0)">≪前の10件</a></span>
//				<span><a href="javascript:void(0)">次の10件≫</a></span>
//			</p>
//			<table>
//				<tr>
//					<td class="thumb"><a href="' + blog.blogUrl + '" target="_blank"><img src="http://capture.heartrails.com/small?' + blog.blogUrl + '" width="80" /></a></td>
//					<td class="data">
//						<p class="title"><a href="#" target="_blank">今日のSUN</a></p>
//						<p class="description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
//						<p class="option">[投稿日]2010年7月7日<br />
//					[ブログ]<a href="#" target="_blank">SUNの毎日</a>
//					</td>
//				</tr>
//			</table>
//			<p class="paging">
//				<span><a href="javascript:void(0)">≪前の10件</a></span>
//				<span><a href="javascript:void(0)">次の10件≫</a></span>
//			</p>
?>
		</div>
		<p id="blogPowered" class="tRight wBold"><a href="http://blogsearch.google.co.jp/blogsearch?hl=ja&ie=UTF-8&q=<?php echo urlencode($title["Title"]["title_official"])?>&lr=lang_ja" target="_blank">Powered by Googleブログ検索（<?php echo $title["Title"]["title_official"]?>）</a></p>
	</div>
	<div class="tCenter">
		<!--Google Adsense 468-->
	</div>
</div>

<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>