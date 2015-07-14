<?php $url = "http://onlinegame.dz-life.net" . $html->url(array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>
<!--Bookmark & Share-->
<?php if($this->action == "index"):?>
<fb:comments href="<?php echo $url?>" num_posts="2" width="510"></fb:comments>
<?php endif;?>
<div class="content">
	<!--Bookmark & Share-->
	<div class="bmShare">
		<h3><?php echo $html->image("design/content_bmshare_title.gif" , array("alt" => "Bookmark & Share"))?></h3>
		<p class="comment"><?php echo $html->image("design/content_bmshare_comment.gif" , array("alt" => "このタイトルの評価・レビューを共有しよう！"))?></p>
		<div class="body">
			<ul class="share clearfix">
				<li><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>" data-count="horizontal" data-lang="ja">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
				<li><div class="fb-like" data-href="<?php echo $url?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
				<li><iframe scrolling="no" frameborder="0" allowTransparency="true" style="overflow:hidden; border:0; width:120px; height:20px" src="http://plugins.mixi.jp/favorite.pl?href=<?php echo urlencode($url)?>&amp;service_key=07a7f5521b36a765d5898f07c3b0e867a380434c&show_faces=false&width=120"></iframe></li>
				<!--<li><a href="http://mixi.jp/share.pl" class="mixi-check-button" data-key="07a7f5521b36a765d5898f07c3b0e867a380434c
" data-url="<?php echo $url?>" data-button="button-2">Check</a><script type="text/javascript" src="http://static.mixi.jp/js/share.js"></script></li> -->
				<li><g:plusone size="medium" href="<?php echo $url?>"></g:plusone></li>
			</ul>
		</div>
	</div>
</div>