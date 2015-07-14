<?php if(!empty($rightVoted)):?>
<!-- 最近の投稿 -->
<div class="rightBox rightMyreview">
	<h2><?php echo $html->image("design/rightbox_myreview_title.gif" , array("alt" => "最近投稿したレビュー・評価"))?></h2>
	<div class="comment"><?php echo $html->image("design/rightbox_myreview_comment.gif" , array("alt" => "パスワードがあればいつでも編集できます"))?></div>
	<div class="body">
<?php foreach($rightVoted as $rightVote):?>
		<div class="item">
			<h3>
				<?php echo $this->Common->titleLinkText(
				$this->Common->titleWithSpan($rightVote["Title"]["title_official"] , $rightVote["Title"]["title_read"]),
				$rightVote["Title"]["url_str"])?>
			</h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($rightVote["Title"]["thumb_name"]),
					$this->Common->titleWithCase($rightVote["Title"]["title_official"] , $rightVote["Title"]["title_read"]),
					$rightVote["Title"]["url_str"] , 60)?>
			</div>
	<?php if(!empty($rightVote["Vote"]["pass"])):?>
			<p class="edit"><?php echo $html->link("投稿を編集する" , array("controller" => "votes" , "action" => "edit" , $rightVote["Vote"]["id"]) , array("rel" => "nofollow"))?></p>
	<?php endif;?>
			<p class="date">最終更新：<?php echo $this->Common->dateFormat($rightVote["Vote"]["modified"])?></p>
		</div>
<?php endforeach;?>
	</div>
</div>
<?php endif;?>