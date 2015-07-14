<!--ランキング-->
<div class="leftRanking leftBox leftPink">
	<h2><?php echo $html->image("design/leftbox_pink_title_ranking.gif" , array("alt" => "人気ランキング"))?></h2>
	<div class="comment"><?php echo $html->image("design/leftbox_pink_comment_ranking.gif" , array("alt" => "ゲーム選びの参考に"))?></div>
	<div class="body">
<?php $rankNum = 1?>
		<ul>
<?php foreach($leftRankings as $rank):?>
			<li class="clearfix">
				<h3>No.<?php echo ($rankNum++)?> <?php echo $this->Common->titleLinkText($rank["Title"]["title_official"] , $rank["Title"]["url_str"])?></h3>
				<p><?php echo $this->Common->titleLinkThumb(
						$this->Common->thumbName($rank["Title"]["thumb_name"]),
						$this->Common->titleWithCase($rank["Title"]["title_official"] , $rank["Title"]["title_read"]),
						$rank["Title"]["url_str"] , 40)?></p>
			</li>
<?php endforeach;?>
		</ul>
		<p class="more"><?php echo $html->link("≫ランキング詳細" , array("controller" => "ranking" , "action" => "index" , "path" => "index" , "ext" => "html"))?></p>
	</div>
</div>