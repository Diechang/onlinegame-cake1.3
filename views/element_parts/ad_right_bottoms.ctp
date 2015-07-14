<!-- Ads234 -->
<?php foreach($adRightBottoms as $ad):?>
<!--<?php echo $ad["AdRightBottom"]["note"]?>-->
<div class="rightAds234">
	<?php echo $this->Common->adLinkImage($ad["AdRightBottom"] , "adrb")?>
</div>
<?php endforeach;?>