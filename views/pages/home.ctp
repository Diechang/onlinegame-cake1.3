<!-- Information -->
<div class="content information">
	<h2 class="image"><?php echo $html->image("design/index_information_title.gif" , array("alt" => "Information：オンラインゲームライフへようこそ！"))?></h2>
	<div class="body">
		<p><strong>【オンラインゲームライフ】-無料オンラインゲーム情報-</strong>では、無料で遊べるオンラインゲーム情報やレビューなど、オンラインゲーム好きのあなたのために、MMORPGをはじめ、アクションやスポーツなど、無料のオンラインゲームだけではなく、月額課金制の本格オンラインゲームまで幅広く紹介していきます。</p>
		<p><span class="wBold">レビューや評価点数の投稿</span>もドンドンお待ちしています。<br />
		あなたの投稿で面白い人気オンラインゲームランキングが出来ていきます。<br />
		さらには気になるあのオンラインゲームの<span class="wBold">プレイムービー(動画)や、ブログ記事</span>も検索できますので、まずは左のジャンル・スタイルリスト等から探してみてください。</p>
		<p>是非、あなた好みの面白いオンラインゲームを見つけてくださいね。</p>

		<p class="tCenter"><?php echo $this->Gads->both468()?></p>
	</div>
</div>


<!-- Ranking -->
<div class="content ranking">
	<h2 class="image"><?php echo $html->image("design/content_ranking_title_new.gif" , array("alt" => "今が旬のおすすめ人気オンラインゲームランキング：正式サービス・各種テスト開始から2年以内のオンラインゲームランキングです"))?></h2>
	<div class="body">
		<!--AllCategory-->
		<div class="rankingWide">
			<div class="top">
				<div class="body">

<?php echo $this->element("loop_ranking_data" , array("rankings" => $rankings))?>

				</div>
			</div>
		</div>
		<!--Categories-->
		<ul class="rankingSmalls clearfix">
<?php foreach($categoryRankings as $categoryRanking):?>
			<li>
				<h3><?php echo $html->link($categoryRanking["Category"]["str"] . "ランキング" , array("controller" => "ranking" , "action" => "index" , "path" => $categoryRanking["Category"]["path"] , "ext" => "html"))?></h3>
				<p><?php echo $this->Common->titleLinkText(
						$this->Common->titleWithSpan($categoryRanking["Ranking"][0]["Title"]["title_official"] , $categoryRanking["Ranking"][0]["Title"]["title_read"]),
						$categoryRanking["Ranking"][0]["Title"]["url_str"])?></p>
			</li>
<?php endforeach;?>
		</ul>
		<!--MoreLink-->
		<p class="rankMore"><?php echo $html->link("人気オンラインゲームランキング詳細はこちら" , array("controller" => "ranking" , "action" => "index" , "path" => "index" , "ext" => "html"))?></p>
	</div>
</div>


<!-- Votes -->
<div class="content votes">
	<div class="body">
		<h2 class="image"><?php echo $html->image("design/index_votes_recent_title.gif" , array("alt" => "最近投稿されたレビュー"))?></h2>
		<div class="recent">
			<dl>
<?php foreach($recents as $recent): ?>
				<dt><?php echo $html->link($this->Common->voteTitle($recent["Vote"]) , array("controller" => "titles" , "action" => "single" , "path" => $recent["Title"]["url_str"] , "voteid" => $recent["Vote"]["id"] , "ext" => "html"))?></dt>
				<dd>
					<div class="thumb">
						<?php echo $this->Common->titleLinkThumb(
							$this->Common->thumbName($recent["Title"]["thumb_name"]),
							$this->Common->titleWithCase($recent["Title"]["title_official"] , $recent["Title"]["title_read"]),
							$recent["Title"]["url_str"] , 60 , "review") ?>
					</div>
					<div class="review">
						<p><?php echo (!empty($recent["Vote"]["review"])) ?
							mb_strimwidth(h($recent["Vote"]["review"]), 0, 240, " … " . $html->link("続き" , array("controller" => "titles" , "action" => "single" , "path" => $recent["Title"]["url_str"] , "voteid" => $recent["Vote"]["id"] , "ext" => "html"))) :
							"(評価投稿のみ)" ?></p>
					</div>
					<p class="title"><?php echo $this->Common->titleLinkText(
						$recent["Title"]["title_official"],
						$recent["Title"]["url_str"] , "review")?></p>
					<table class="data">
						<tr>
							<th class="total">総合評価</th>
							<td class="star">
								<?php echo $this->Common->starBlock(50 , $recent["Vote"]["single_avg"] , "総合評価：")?>
							</td>
							<th>面白さ</th>
							<td class="star">
								<?php echo $this->Common->starBlock(50 , $recent["Vote"]["item1"] , "面白さ：")?>
							</td>
							<th>投稿日</th>
							<td><?php echo $this->Common->dateFormat($recent["Vote"]["created"])?></td>
						</tr>
					</table>
				</dd>
<?php endforeach; ?>
			</dl>
			<p class="icon_feed16"><?php echo $html->link("新着レビューをRSSで！" , "http://feeds.feedburner.com/dz-game/review")?></p>
		</div>
		<h2 class="image"><?php echo $html->image("design/index_votes_wait_title.gif" , array("alt" => "レビュー・評価投稿募集中！：まだ投稿がされていないオンラインゲームの一部です"))?></h2>
		<div class="wait">
			<table>
<?php for($i = 0; $i < 2; $i++):?>
				<tr>
	<?php for($th = $i * 5; $th < ($i + 1) * 5; $th++):?>
					<th>
						<?php echo (!empty($waits[$th])) ? $this->Common->titleLinkThumb(
							$this->Common->thumbName($waits[$th]["Title"]["thumb_name"]),
							$this->Common->titleWithCase($waits[$th]["Title"]["title_official"] , $waits[$th]["Title"]["title_read"]),
							$waits[$th]["Title"]["url_str"] , 80) : "&nbsp;"?>
					</th>
	<?php endfor;?>
				</tr>
				<tr>
	<?php for($te = $i * 5; $te < ($i + 1) * 5; $te++):?>
					<td>
						<?php echo (!empty($waits[$te])) ? $this->Common->titleLinkText(
							$waits[$te]["Title"]["title_official"] , $waits[$te]["Title"]["url_str"]) : "&nbsp;"?>
					</td>
	<?php endfor;?>
				</tr>
<?php endfor;?>
			</table>
		</div>
	</div>
</div>

<!-- Tests -->
<div class="content tests">
	<div class="body">
		<h2 class="image"><?php echo $html->image("design/index_tests_current_title.gif" , array("alt" => "無料テスト実施中タイトル：無料でゲームが体験できるテスト実施中タイトルです"))?></h2>
		<div class="current">
			<dl>
<?php if(empty($testCurrents)):?>
				<dt class="none">現在実施中のテスト情報がありません</dt>
<?php else:?>
	<?php foreach($testCurrents as $test):?>
				<dt class="<?php echo $test["Service"]["path"]?>">
					<?php echo $this->Common->titleLinkText(
						$this->Common->titleWithSpan($test["Title"]["title_official"] , $test["Title"]["title_read"]),
						$test["Title"]["url_str"])?>
				</dt>
				<dd>
					<div class="thumb">
						<?php echo $this->Common->titleLinkThumb(
							$this->Common->thumbName($test["Title"]["thumb_name"]),
							$this->Common->titleWithCase($test["Title"]["title_official"] , $test["Title"]["title_read"]),
							$test["Title"]["url_str"] , 120)?>
					</div>
					<div class="summary">
						<p><?php echo nl2br(strip_tags($test["Title"]["description"]))?></p>
					</div>
					<table class="data">
						<tr>
							<th>実施期間</th>
							<td><?php echo $this->Common->dateFormat($test["Title"]["test_start"] , "date")?> 〜 <?php echo $this->Common->dateFormat($test["Title"]["test_end"] , "date")?></td>
						</tr>
					</table>
				</dd>
	<?php endforeach;?>
<?php endif;?>
			</dl>
			<p class="icon_feed16"><?php echo $html->link("無料テスト情報をRSSで！" , "http://feeds.feedburner.com/dz-game/test")?></p>
		</div>
		<h2 class="image"><?php echo $html->image("design/index_tests_future_title.gif" , array("alt" => "もうすぐ実施予定！：これから実施される予定のテスト情報です"))?></h2>
		<div class="future">
<?php if(empty($testFutures)):?>
			<p class="none">実施予定のテスト情報がありません</p>
<?php else:?>
			<table>
	<?php foreach($testFutures as $test):?>
				<tr>
					<th class="<?php echo $test["Service"]["path"]?>">
						<?php echo $this->Common->titleLinkThumb(
							$this->Common->thumbName($test["Title"]["thumb_name"]),
							$this->Common->titleWithCase($test["Title"]["title_official"] , $test["Title"]["title_read"]),
							$test["Title"]["url_str"] , 60)?>
					</th>
					<td>
						<h3>
							<?php echo $this->Common->titleLinkText(
								$this->Common->titleWithSpan($test["Title"]["title_official"] , $test["Title"]["title_read"]),
								$test["Title"]["url_str"])?>
						</h3>
						<p class="term"><span class="wBold">実施期間</span> <?php echo $this->Common->dateFormat($test["Title"]["test_start"] , "date")?> 〜 <?php echo $this->Common->dateFormat($test["Title"]["test_end"] , "date")?></p>
					</td>
				</tr>
	<?php endforeach;?>
			</table>
<?php endif;?>
		</div>
	</div>
</div>

<?php echo $this->element("search_title_form" , array("cache" => array("time" => "999days" , "key" => null)))?>

<!-- Newer -->
<div class="content newer">
	<h2 class="image"><?php echo $html->image("design/index_newer_title.gif" , array("alt" => "新着オンラインゲーム"))?></h2>
	<ul class="clearfix">
<?php $newerCount = 0?>
<?php foreach($newers as $newer): ?>
		<?php $newerCount++?>
		<li class="<?php echo ($newerCount % 2 == 1) ? "odd" : "even"?>">
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($newer["Title"]["thumb_name"]),
					$this->Common->titleWithCase($newer["Title"]["title_official"] , $newer["Title"]["title_read"]),
					$newer["Title"]["url_str"] , 40) ?></div>
			<p class="title">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleWithSpan($newer["Title"]["title_official"] , $newer["Title"]["title_read"]) , $newer["Title"]["url_str"])?>
			</p>
		</li>
<?php endforeach; ?>
	</ul>
	<p class="icon_feed16"><?php echo $html->link("新着オンラインゲームをRSSで！" , "http://feeds.feedburner.com/dz-game/newgames")?></p>
</div>


<!-- News -->
<div class="content clearfix">
	<!-- Fansite -->
	<div class="fansite">
	<h2 class="image"><?php echo $html->image("design/index_fansite_title.gif" , array("alt" => "新着ファンサイト"))?></h2>
		<dl>
<?php foreach($fansites as $fansite):?>
			<dt><?php echo $html->link($fansite["Fansite"]["site_name"] , $fansite["Fansite"]["site_url"] , array("target" => "_blank"))?></dt>
			<dd><?php echo $html->link($fansite["Title"]["title_official"] , array("controller" => "titles" , "action" => "link" , "path" => $fansite["Title"]["url_str"] , "ext" => "html"))?></dd>
<?php endforeach;?>
		</dl>
	</div>
	<!-- Whats New -->
	<div class="whats">
	<h2 class="image"><?php echo $html->image("design/index_whats_title.gif" , array("alt" => "更新履歴"))?></h2>
		<dl>
<?php foreach($updates as $update):?>
			<dt><?php echo $this->Common->dateFormat($update["Update"]["created"] , "date")?></dt>
			<dd><?php echo $update["Update"]["text"]?></dd>
<?php endforeach;?>
		</dl>
	</div>
</div>