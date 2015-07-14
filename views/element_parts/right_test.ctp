<!-- テスト -->
<div class="rightBox rightTest">
	<h2><?php echo $html->image("design/rightbox_test_title.gif" , array("alt" => "無料テスト中オンラインゲーム"))?></h2>
	<div class="comment"><?php echo $html->image("design/rightbox_test_comment.gif" , array("alt" => "完全無料のテスト中タイトル"))?></div>
	<div class="body">
<?php foreach($rightTests as $rightTest):?>
		<div class="item">
			<h3>
				<?php echo $this->Common->titleLinkText(
				$this->Common->titleWithSpan($rightTest["Title"]["title_official"] , $rightTest["Title"]["title_read"]),
				$rightTest["Title"]["url_str"])?>
			</h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($rightTest["Title"]["thumb_name"]),
					$this->Common->titleWithCase($rightTest["Title"]["title_official"] , $rightTest["Title"]["title_read"]),
					$rightTest["Title"]["url_str"] , 60)?>
			</div>
			<p class="description">
				<?php echo mb_strimwidth(strip_tags($rightTest["Title"]["description"]), 0, 120, " …", "UTF-8")?>
			</p>
			<p class="icon_<?php echo $rightTest["Service"]["path"]?>">
				<?php echo $this->Common->dateFormat($rightTest["Title"]["test_start"] , "date") . "～" . $this->Common->dateFormat($rightTest["Title"]["test_end"] , "date")?>
			</p>
			<p class="icon_official">
				<?php echo $this->Common->officialLinkText($rightTest["Title"]["title_official"] , $rightTest["Title"]["ad_use"] , $rightTest["Title"]["ad_text"] , $rightTest["Title"]["official_url"])?>
			</p>
		</div>
<?php endforeach;?>
		<p class="icon_feed16"><?php echo $html->link("無料テスト情報RSS" , "http://feeds.feedburner.com/dz-game/test")?></p>
	</div>
</div>
