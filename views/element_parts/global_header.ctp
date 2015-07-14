<!-- Header -->
<div id="header">
	<div class="logo"><?php echo $html->image("design/logo_top.gif" , array("alt" => "【オンラインゲームライフ】-無料オンラインゲーム情報-" , "url" => "/"));?></div>
	<!-- Main Nav -->
	<ul id="mainNav" class="mainNav">
		<li class="hasChild">
			<?php echo $html->link("人気ランキング" , array("controller" => "ranking" , "action" => "index" , "path" => "index" , "ext" => "html"))?>
			<ul>
	<?php foreach($headerCategories as $category):?>
				<li><?php echo $html->link($category["Category"]["str"] , array("controller" => "ranking" , "action" => "index" , "path" => $category["Category"]["path"] , "ext" => "html"))?></li>
	<?php endforeach;?>
			</ul>
		</li>
		<li><?php echo $html->link("レビュー" , array("controller" => "review" , "action" => "index" , "page" => 1))?></li>
<?php /* events
		<li><?php echo $html->link("イベント" , array("controller" => "events" , "action" => "index" , "page" => 1))?></li>
*/ ?>
		<li><?php echo $html->link("ゲームポータル" , array("controller" => "portals" , "action" => "index" , "ext" => "html"))?></li>
		<li class="hasChild">
			<?php echo $html->link("ゲーム代を稼ぐ" , array("controller" => "monies" , "action" => "index" , "ext" => "html"))?>
			<ul>
	<?php foreach($headerMoneycategories as $category):?>
				<li><?php echo $html->link($category["Moneycategory"]["str"] , array("controller" => "monies" , "action" => "view" , "path" => $category["Moneycategory"]["path"] , "ext" => "html"))?></li>
	<?php endforeach;?>
			</ul>
		</li>
		<li><?php echo $html->link("ゲーム用PC" , array("controller" => "pcs" , "action" => "index" , "ext" => "html"))?></li>
		<li class="search"><?php echo $html->link("検索" , array("controller" => "search" , "action" => "index"))?></li>
	</ul>
	<ul id="addBookmark">
		<li><a href="javascript:void(0)" onclick="SBM.browser()"><?php echo $html->image("design/addbookmark_browser.gif" , array("alt" => "お気に入りに追加"))?></a></li>
		<li><a href="javascript:void(0)" onclick="SBM.yahoo()"><?php echo $html->image("design/addbookmark_yahoo.gif" , array("alt" => "Yahooブックマーク"))?></a></li>
		<li><a href="javascript:void(0)" onclick="SBM.hatena()"><?php echo $html->image("design/addbookmark_hatena.gif" , array("alt" => "はてなブックマーク"))?></a></li>
	</ul>
	<div id="googleSearch">
		<form action="http://www.google.co.jp/cse" id="cse-search-box">
		  <div>
			<input type="hidden" name="cx" value="partner-pub-5378944923532596:hrh39ml3dzq" />
			<input type="hidden" name="ie" value="UTF-8" />
			<input type="text" class="text" name="q" size="31" />
			<input type="submit" class="button" name="sa" value="" />
		  </div>
		</form>
		<script type="text/javascript" src="http://www.google.co.jp/coop/cse/brand?form=cse-search-box&amp;lang=ja"></script>
	</div>
	<dl id="headCount">
		<dt class="title">タイトル数：</dt><dd><?php echo $headCountTitle?>件</dd>
		<dt class="review">レビュー：</dt><dd><?php echo $headCountReview?>件</dd>
		<dt class="vote">評価：</dt><dd><?php echo $headCountVote?>件</dd>
	</dl>
</div>