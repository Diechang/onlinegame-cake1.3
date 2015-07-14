<div class="content propPickup">
	<h2>【<?php echo $mainStr?>】おすすめタイトル</h2>
	<ul class="clearfix">
<?php $count = 0;?>
<?php foreach($pickups as $pickup):?>
<?php $count++;?>
		<li<?php if($count == 4):?> class="tail"<?php endif;?>>
			<h3 class="thumb"><?php echo $this->Common->titleLinkThumb(
											$this->Common->thumbName($pickup["Title"]["thumb_name"]),
											$this->Common->titleWithCase($pickup["Title"]["title_official"] , $pickup["Title"]["title_read"]) ,
											$pickup["Title"]["url_str"] , 120)?></h3>
			<div class="rating">
				<?php echo $this->Common->starBlock(100 , $pickup["Titlesummary"]["vote_avg_all"])?>
			</div>
			<p class="title"><?php echo $this->Common->titleLinkText($pickup["Title"]["title_official"] , $pickup["Title"]["url_str"])?></p>
		</li>
<?php endforeach;?>
	</ul>
</div>