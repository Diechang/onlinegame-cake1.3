<!-- Footer -->
<div id="footer">
	<!-- Footer Nav -->
	<ul id="footerNav">
		<li><?php echo $html->link("当サイトについて" , array("controller" => "pages" , "action" => "about" , "ext" => "html"))?></li>
		<li><?php echo $html->link("リンク集" , array("controller" => "links" , "path" => "index" , "ext" => "html"))?></li>
		<li><?php echo $html->link("サイトマップ" , array("controller" => "pages" , "action" => "sitemap" , "ext" => "html"))?></li>
		<li><?php echo $html->link("お問合せ" , array("controller" => "pages" , "action" => "contact" , "ext" => "html"))?></li>
<!--		<li><a href="http://mmorpg.naviewn.jp/" title="ＭＭＯＲＰＧサーチエンジン" target="_blank"><img src="http://mmorpg.naviewn.jp/banner/10446" border="0" alt="ＭＭＯＲＰＧサーチエンジン" /></a></li>-->
	</ul>
	<!-- Footer Rank -->
	<div id="footerRank">
		<div class="pageRank">
			<h3 class="head"><img src="/img/design/footer_title_pagerank.gif" alt="注目のオンラインゲームランキング" /></h3>
			<div class="rankBox">
				<script type="text/javascript" src="http://pranking8.ziyu.net/js/diechang.js" charset="utf-8"></script>
			</div>
		</div>
		<div class="accessRank">
			<h3 class="head"><img src="/img/design/footer_title_accessrank.gif" alt="アクセスランキング" /></h3>
			<div class="rankBox">
				<script type="text/javascript" src="http://rranking12.ziyu.net/js/diechang.js" charset="utf-8"></script>
			</div>
		</div>
	</div>
	<!-- Footer Text -->
	<p id="footerText">
		Copyright (c) オンラインゲームライフ All rights reserved.<br />
		画像や文章の無断転載はお断り致します。<br />
		当サイトにおける一部の画像・データの著作権は各コンテンツ開発元・運営会社に帰属します。<br />
		<script type="text/javascript" src="http://rranking12.ziyu.net/rank.php?diechang"></script>
		<a href="http://www.ziyu.net/" target="_blank"><img src="http://file.ziyu.net/rranking.gif" alt="アクセスランキング" border="0" width="35" height="11" /></a>
		<a href="http://www.ziyu.net/" target="_blank"><img src="http://pranking8.ziyu.net/img.php?diechang" alt="ブログパーツ" border="0" width="35" height="11" /></a>
	</p>
</div>
<!--RA Lite-->
<script type="text/javascript" src="<?php echo Configure::read("Site.url")?>ra/script.php"></script><noscript><p><img src="<?php echo Configure::read("Site.url")?>ra/track.php" alt="" width="1" height="1" /></p></noscript>