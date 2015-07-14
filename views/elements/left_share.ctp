<!-- Share -->
<div class="leftBox leftBlue">
	<h2><?php echo $html->image("design/leftbox_blue_title_share.gif" , array("alt" => "Share"))?></h2>
	<div class="comment"><?php echo $html->image("design/leftbox_blue_comment_share.gif" , array("alt" => "共有しよう！してください！"))?></div>
	<div class="body">
		<ul class="share">
			<!--Hatena-->
			<li class="hatena"><a href="http://b.hatena.ne.jp/entry/add/<?php echo Configure::read("Site.url")?>" target="_blank">はてブ</a></li>
			<!--Yahoo!-->
			<li class="yahoo"><a href="javascript:void window.open('http://bookmarks.yahoo.co.jp/bookmarklet/showpopup?t='+encodeURIComponent(document.title)+'&amp;u='+encodeURIComponent(location.href)+'&amp;ei=UTF-8','_blank','width=550,height=480,left=100,top=50,scrollbars=1,resizable=1',0);">Yahoo!</a></li>
			<!--Twitter-->
			<li><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo Configure::read("Site.url")?>" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
			<!--Facebook-->
			<li><div class="fb-like" data-href="<?php echo Configure::read("Site.url")?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
			<!--Google+1-->
			<li><g:plusone size="medium" href="<?php echo Configure::read("Site.url")?>"></g:plusone></li>
			<!--mixi-->
			<li><iframe scrolling="no" frameborder="0" allowTransparency="true" style="overflow:hidden; border:0; width:120px; height:20px" src="http://plugins.mixi.jp/favorite.pl?href=<?php echo urlencode(Configure::read("Site.url"))?>&service_key=07a7f5521b36a765d5898f07c3b0e867a380434c&show_faces=false&width=120"></iframe></li>
			<li><a href="http://mixi.jp/share.pl" class="mixi-check-button" data-key="07a7f5521b36a765d5898f07c3b0e867a380434c" data-url="<?php echo Configure::read("Site.url")?>" data-button="button-4">Check</a>
<script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script></li>
		</ul>
	</div>
</div>