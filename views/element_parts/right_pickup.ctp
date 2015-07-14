<!-- 新作 -->
<div class="rightBox rightPickup">
	<h2><?php echo $html->image("design/rightbox_pickup_title.gif" , array("alt" => "新作ピックアップ"))?></h2>
	<div class="comment"><?php echo $html->image("design/rightbox_pickup_comment.gif" , array("alt" => "最近正式サービスが始まった注目タイトル"))?></div>
	<div class="body">
<?php foreach($rightPickups as $rightPickup):?>
		<div class="item">
			<h3>
				<?php echo $this->Common->titleLinkText(
				$this->Common->titleWithSpan($rightPickup["Title"]["title_official"] , $rightPickup["Title"]["title_read"]),
				$rightPickup["Title"]["url_str"])?>
			</h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($rightPickup["Title"]["thumb_name"]),
					$this->Common->titleWithCase($rightPickup["Title"]["title_official"] , $rightPickup["Title"]["title_read"]),
					$rightPickup["Title"]["url_str"] , 60)?>
			</div>
			<p class="description">
				<?php echo mb_strimwidth(strip_tags($rightPickup["Title"]["description"]), 0, 120, " …", "UTF-8")?>
			</p>
			<p class="icon_genre">
				<?php echo $this->Common->categoriesLink($rightPickup["Category"])?>
			</p>
			<p class="icon_fee">
				<?php echo $this->Common->feeData($rightPickup["Title"]["fee_text"] , $rightPickup["Title"]["fee_id"] , $rightPickup["Fee"]["str"] , $rightPickup["Title"]["service_id"] , $rightPickup["Service"]["str"])?>
			</p>
			<p class="icon_official">
				<?php echo $this->Common->officialLinkText($rightPickup["Title"]["title_official"] , $rightPickup["Title"]["ad_use"] , $rightPickup["Title"]["ad_text"] , $rightPickup["Title"]["official_url"])?>
			</p>
		</div>
<?php endforeach;?>
		<p class="icon_feed16"><?php echo $html->link("新作情報RSS" , "http://feeds.feedburner.com/dz-game/newstart")?></p>
	</div>
</div>
