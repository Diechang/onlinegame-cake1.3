<?php
//スタイル
$html->css(array('portals'), 'stylesheet', array('inline' => false));
?>
<!--Description-->
<div class="content description">
	<h2 class="headimage"><?php echo $html->image("design/headline_title_portals.gif" , array("alt" => "オンラインゲームポータルサイト：窓口ひとつでいろんなゲームが楽しめる"))?></h2>
	<h3>オンラインゲームポータルサイトとは</h3>
	<div class="thumb"><img src="http://capture.heartrails.com/200x300?http://wwww.hangame.co.jp/" alt="ハンゲーム" width="200" /></div>
	<p> オンラインゲームポータルサイトとは複数のゲームを提供しているサイトのことです。</p>
	<p>一般的に言われるポータルサイトとは、YahooやGoogleなどのように、インターネットの入り口となるような巨大なWebサイトのことで、「インターネットを始めるならまずはここから」と言われるようなサイトのことですね。</p>
	<p>オンラインゲームポータルサイトはそのオンラインゲーム版です。<br />
	つまり、「オンラインゲームを始めるならまずはここから」と言われるサイトのことです。<br />
	オンラインゲームポータルサイトでは、自社のゲームはもちろん、他社とも提携し、たくさんのゲームを扱っています。</p>
	<p>同じタイトルのゲームであっても、特定のポータルサイトのみでのイベントやキャンペーンなどが行われる場合もあります。。各オンラインゲームのアカウントの管理もポータルサイトからの登録になればわかりやすいですね。</p>
	<h3>友達の輪を広げよう</h3>
	<p>オンラインゲームポータルサイトでは、ハンゲームや@gamesのように、<strong>アバター</strong>と呼ばれる「オンライン上の自分の分身」を持つことができるサービスもあります。<br />
	オシャレな服を着せて、ペットを連れて街を歩いて、アバター同士で会話して。</p>
	<p>ゲームの世界を超えた新しい友情や出会いがあるかもしれません。</p>
<?php echo $this->Gads->ads468()?>
</div>
<!--Portals-->
<div class="content items">
	<h2>オンラインゲームポータル一覧</h2>
<?php foreach($portals as $portal):?>
	<div class="item clearfix">
		<h3><?php echo $html->link(
				$this->Common->titleWithCase($portal["Portal"]["title_official"] , $portal["Portal"]["title_read"]),
				array("controller" => "portals" , "action" => "view" , "path" => $portal["Portal"]["url_str"] , "ext" => "html"))?></h3>
		<div class="thumb">
			<a href="<?php echo $html->url(array("controller" => "portals" , "action" => "view" , "path" => $portal["Portal"]["url_str"] , "ext" => "html"))?>">
				<img src="http://capture.heartrails.com/small?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $this->Common->titleWithCase($portal["Portal"]["title_official"] , $portal["Portal"]["title_read"])?>" width="120" />
			</a>
		</div>
		<div class="data">
				<p class="description"><?php echo strip_tags($portal["Portal"]["description"])?></p>
				<p class="icon_official"><?php echo $this->Common->officialLinkText($portal["Portal"]["title_official"] , $portal["Portal"]["ad_use"] , $portal["Portal"]["ad_text"] , $portal["Portal"]["official_url"])?></p>
		</div>
	</div>
<?php endforeach;?>
</div>