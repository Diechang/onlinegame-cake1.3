<?php
//レビュー
//$html->css(array('titles' , 'review'), 'stylesheet', array('inline' => false));
//Set - Layout vars
$this->set("title_for_layout" , $vote["Title"]["title_official"] . "レビュー・評価投稿完了");
$this->set("keywords_for_layout" , "");
$this->set("description_for_layout" , "");
$this->set("h1_for_layout" , $vote["Title"]["title_official"] . "レビュー・評価投稿完了");
$this->set("pankuz_for_layout" , array(array("str" => $vote["Title"]["title_official"] , "url" => array("controller" => "titles" , "action" => "index" , "path" => $vote["Title"]["url_str"] , "ext" => "html")) , "投稿完了"));
?>
<?php echo $session->flash()?>
<div class="content">
	<p><?php echo $vote["Title"]["title_official"]?>への投稿ありがとうございました！</p>
	<p class="wBold">
		<?php echo $html->link("≪" . $vote["Title"]["title_official"] . "のトップページに戻る",
			array("controller" => "titles" , "action" => "index" , "path" => $vote["Title"]["url_str"] , "ext" => "html"))?>
	</p>
	<p><?php echo $html->link("投稿したページを見る" , array("controller" => "titles" , "action" => "single" , "path" => $vote["Title"]["url_str"] , "voteid" => $vote["Vote"]["id"] , "ext" => "html"))?></p>
	<h2>投稿を共有しませんか？</h2>
	<?php $url = "http://onlinegame.dz-life.net" . $html->url(array("controller" => "titles" , "action" => "single" , "path" => $vote["Title"]["url_str"] , "voteid" => $vote["Vote"]["id"] , "ext" => "html"))?>
	<div class="singleShare">
		<fb:comments href="<?php echo $url?>" num_posts="2" width="510"></fb:comments>
		<table>
			<tr>
				<td><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url?>" data-text="<?php echo $vote["Title"]["title_official"] . "の" . ((!empty($vote["Vote"]["review"])) ? "レビュー書いて" : "評価して") . "みた"?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></td>
				<td><fb:like href="<?php echo $url?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></fb:like></td>
				<td><div data-plugins-type="mixi-favorite" data-service-key="07a7f5521b36a765d5898f07c3b0e867a380434c" data-href="<?php echo $url?>" data-show-faces="false" data-show-count="true" data-show-comment="true" data-width="100"></div><script type="text/javascript">(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = 'http://static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script></td>
				<td><g:plusone size="medium" href="<?php echo $url?>"></g:plusone></td>
			</tr>
		</table>
	</div>
</div>
<div class="content">
	<?php echo $this->Gads->ads468()?>
</div>
<?php if(!empty($noneTitles)):?>
<div class="content moreList">
	<h2>まだ評価が投稿されていないタイトル</h2>
	<p>プレイしたことがあるタイトルには是非投稿をお願いします！</p>
	<ul>
	<?php foreach($noneTitles as $none):?>
		<li>
			<?php echo $this->Common->titleLinkText(
				$this->Common->titleWithSpan($none["Title"]["title_official"] , $none["Title"]["title_read"]),
				$none["Title"]["url_str"])?>
		</li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif;?>