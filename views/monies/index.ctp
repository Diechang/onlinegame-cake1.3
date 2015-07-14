<?php
//スタイル
$html->css(array('monies'), 'stylesheet', array('inline' => false));
?>
<div class="content">
	<h2 class="headimage"><?php echo $html->image("design/headline_title_monies.gif" , array("alt" => "ゲーム代を無料で稼ぐ：ネットを使ってお小遣い稼ぎ"))?></h2>
	<p>オンラインゲームに夢中になってしまうと、月額課金制のオンラインゲームはもちろん、基本プレイ無料のオンラインゲームでもアイテム課金でお金かかりますよね。</p>
	<p>お小遣いも少ないし…でもオンラインゲームは楽しくてやめられないし…<br />
	そんな人はネットで、しかも無料で、せめてゲーム代くらいは稼いじゃおう！</p>
	<h3>そんなうまい話あるかい！と思うのは普通ですよ</h3>
	<p> 無料でお小遣いが稼げるなんてうまい話あるかい！と思うのは普通です。<br />
	でも、よく考えてみてください。</p>
	<p class="wBold">お金を稼ぐのにお金がかかる場合のほうが少ない。</p>
	<p>お金をかけてお金を稼ぐのは株などの「投資」です。</p>
	<p>コンビニでバイトするのにお金がかかりますか？<br />
	お母さんにお小遣いをもらうのにお金がかかりますか？</p>
	<p>仕事をしてお金を稼ぐということは「労力」をお金に換えるということ。<br />
	ネットでお小遣いを稼ぐのも同じだと思います。「労力」というより「作業」ですかね。</p>
	<p>職場に行くのにガソリン代がかかったり電車賃がかかるのは当然のことのように、<br />
	インターネットで稼ぐわけですから、プロバイダ料金や電気代は当然かかります。</p>
	<p>でも収入ゼロよりいいですよね？</p>
	<p>もちろん、ここで紹介する方法は管理人も実際にやってます。<br />
	子持ちパパは小遣い少ないんですよ…23歳でデキk(略</p>
<?php echo $this->Gads->ads468()?>
</div>
<div class="content">
	<h2>ネットで稼ぐ方法</h2>
	<p>ネットで稼ぐ方法はさまざまです。もちろん悪いことをして稼ぐ人もいます…<br />
	でも管理人は悪い人じゃないので普通にコツコツ稼いでます。<br />
	その方法をいくつか紹介しますね。</p>
<?php foreach($moneycategories as $category):?>
	<h3><?php echo $html->link($category["Moneycategory"]["str"] . "で稼ぐ" , array("action" => "view" , "path" => $category["Moneycategory"]["path"] , "ext" => "html"))?></h3>
	<p><?php echo nl2br($category["Moneycategory"]["summary"])?></p>
<?php endforeach;?>
</div>
<div class="content">
	<h2>貯めたポイント（報酬）はどうするの？</h2>
	<p>アンケート、アフィリエイトで貯めたポイント(報酬)の使い道はやはりゲーム料金などの「お金」として使うことが多いです。<br />
	ポイントを換金するときには、手数料がかかる場合があります。<br />
	普段使っている口座に振込むこともできますが、対応していないサイトもあったり、せっかくコツコツ貯めたポイントを高い手数料で無駄にしたくないですよね。<br />
	現金でお小遣いとして使いたい場合は「<a href="http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=2459226&pid=880123309" target="_blank" ><img src="http://ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=2459226&pid=880123309" height="1" width="1" border="0">楽天銀行</a>」へ、オンラインゲームなどネットでしか使わない場合は「<a href="http://www.webmoney.jp/" target="_blank">WebMoney(ウェブマネー)</a>」へ交換するのが手数料も安くおすすめです。</p>
	<h3>楽天銀行に振込む</h3>
	<p>ネットバンク(インターネット銀行)でおすすめと言えば楽天銀行（旧イーバンク銀行）です。<br />
	口座開設、口座維持費共に無料で口座を持つだけで費用がかかることは一切ありません。ほとんどのサイトが楽天銀行に対応していて、手数料も他の銀行に比べて安い場合が多いです。<br />
	管理人もココの口座を使っています。</p>
	<p>≫<a href="http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=2459226&pid=880123309" target="_blank" ><img src="http://ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=2459226&pid=880123309" height="1" width="1" border="0">楽天銀行</a></p>
	<h3>WebMoney(ウェブマネー)に交換する</h3>
	<p>WebMoney(ウェブマネー)は、オンラインゲームのほかに、音楽のダウンロードなど、様々なことに使えるインターネット決済で最も標準的なプリペイド電子マネーです。<br />
	個人情報不要でセキュリティ面でも安心です。<br />
	現金に交換するよりもさらに手数料が安い場合もあり、ネットでしか使わないのであればこちらをお勧めします。</p>
	<p>≫<a href="http://www.webmoney.jp/" target="_blank">WebMoney(ウェブマネー)</a></p>
</div>