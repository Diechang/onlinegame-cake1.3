<ul class="rankingList">
<?php foreach($rankings as $key => $rank):?>
<?php if(is_numeric($key)):?>
	<?php $rankNum = $key + 1?>
		<!-- <?php echo $rankNum?> -->
		<li class="rankNo<?php echo ($rankNum == 1) ? $rankNum : (($rankNum <= 5) ? "Top" : "X")?> clearfix">

			<table class="head">
				<tr>
		<?php if($rankNum <= 5):?>
					<td class="icon"><?php echo $html->image("design/icon_rank_no" . $rankNum . ".gif" , array("alt"=>"総合人気ランキング第" . $rankNum . "位"))?></td>
		<?php else:?>
					<td class="iconS">No.<?php echo $rankNum?></td>
		<?php endif;?>

					<td class="title">
						<?php echo $this->Common->titleLinkText(
							$this->Common->titleWithSpan($rank["Title"]["title_official"] , $rank["Title"]["title_read"]),
							$rank["Title"]["url_str"])?>
					</td>
				</tr>
			</table>

			<div class="images">
				<div class="thumb">
					<?php echo $this->Common->titleLinkThumb(
						$this->Common->thumbName($rank["Title"]["thumb_name"]),
						$this->Common->titleWithCase($rank["Title"]["title_official"] , $rank["Title"]["title_read"]),
						$rank["Title"]["url_str"] , ($rankNum == 1) ? 160 : (($rankNum <= 5) ? 100 : 80))?>
				</div>
				<?php if($rankNum == 1){ echo $this->Common->starBlock(100 , $rank["Titlesummary"]["vote_avg_all"] , "総合評価：");}?>
			</div>

			<div class="data">
		<?php if($rankNum == 1):?>
				<div class="description"><?php echo $rank["Title"]["description"]?></div>
		<?php endif;?>

				<table class="numsTable">
					<tr>
						<th>総合評価</th>
						<td><?php echo $this->Common->pointFormat($rank["Titlesummary"]["vote_avg_all"])?>点</td>
						<th>面白さ</th>
						<td><?php echo $this->Common->pointFormat($rank["Titlesummary"]["vote_avg_item1"])?>点</td>
					</tr>
					<tr>
						<th>レビュー数</th>
						<td><?php echo $this->Common->titleLinkText($rank["Titlesummary"]["vote_count_review"] . "件" , $rank["Title"]["url_str"] , "review")?></td>
						<th>評価投稿数</th>
						<td><?php echo $this->Common->titleLinkText($rank["Titlesummary"]["vote_count_vote"] . "件" , $rank["Title"]["url_str"] , "rating")?></td>
					</tr>
				</table>
		<?php if($rankNum <= 5):?>
				<p class="icon_official">
					<?php echo $this->Common->officialLinkText($rank["Title"]["title_official"] , $rank["Title"]["ad_use"] , $rank["Title"]["ad_text"] , $rank["Title"]["official_url"] , $rank["Title"]["service_id"])?>
				</p>
		<?php endif;?>
			</div>
		</li>
<?php endif;?>
<?php endforeach;?>
</ul>