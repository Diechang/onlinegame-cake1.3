<?php
//スタイル
$html->css(array('portals'), 'stylesheet', array('inline' => false));
?>
<!--Description-->
<div class="content description">
	<h2><?php echo $this->Common->titleWithCase($portal["Portal"]["title_official"] , $portal["Portal"]["title_read"])?></h2>
	<div class="thumb"><img src="http://capture.heartrails.com/medium?<?php echo $portal["Portal"]["official_url"]?>" alt="<?php echo $portal["Portal"]["title_official"]?>" width="200" /></div>
	<?php echo $portal["Portal"]["description"]?>
	<p class="icon_official clBoth"><?php echo $this->Common->officialLinkText($portal["Portal"]["title_official"] , $portal["Portal"]["ad_use"] , $portal["Portal"]["ad_text"] , $portal["Portal"]["official_url"])?></p>
<?php echo $this->Gads->ads468()?>
</div>

<?php echo $this->Common->copyright($portal["Portal"]["copyright"])?>

<!--Titles-->
<div class="content items">
	<h2><?php echo $portal["Portal"]["title_official"]?>で遊べるタイトル一覧</h2>
	<p class="cRed">※各タイトルページから公式サイトへのリンクは<?php echo $portal["Portal"]["title_official"]?>内のコンテンツではない場合がありますのでご注意ください。</p>
<?php foreach($portal["Title"] as $pTitle):?>
	<div class="item clearfix">
		<h3>
			<?php echo $this->Common->titleLinkText(
				$this->Common->titleWithCase($pTitle["title_official"] , $pTitle["title_read"]),
				$pTitle["url_str"]);?>
		</h3>
		<div class="thumb">
			<?php echo $this->Common->titleLinkThumb(
				$this->Common->thumbName($pTitle["thumb_name"]),
				$this->Common->titleWithCase($pTitle["title_official"] , $pTitle["title_read"]),
				$pTitle["url_str"] , 120)?>
		</div>
		<div class="data">
			<p class="description"><?php echo mb_strimwidth(strip_tags($pTitle["description"]), 0, 100, " …", "UTF-8")?></p>
			<table>
				<tr>
					<th><?php echo $html->image("design/icon_rating_total.gif" , array("alt" => "総合評価"))?></th>
					<td>
						<?php echo $this->Common->starBlock(100 , $pTitle["Titlesummary"]["vote_avg_all"] , "総合評価：")?>
					</td>
					<td class="cRed wBold"><?php echo $this->Common->pointFormat($pTitle["Titlesummary"]["vote_avg_all"] , "--")?>点</td>
				<tr>
				<tr>
					<th><?php echo $html->image("design/icon_genre.gif" , array("alt" => "ジャンル"))?></th>
					<td colspan="2">
						<?php echo $this->Common->categoriesLink($pTitle["Category"])?>
					</td>
				<tr>
			</table>
		</div>
	</div>
<?php endforeach;?>
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