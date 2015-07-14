<?php
	$titleLinkStr	= (!empty($adLeftTops["Title"]["title_abbr"])) ? $adLeftTops["Title"]["title_abbr"] : $adLeftTops["Title"]["title_official"];
?>
<!-- PR -->
<div class="leftBox leftAds">
	<h2><?php echo $html->image("design/leftbox_ads_title.gif" , array("alt" => "PR - sponsored link"))?></h2>
	<div class="body">
		<h3><?php echo $this->Common->titleLinkText($titleLinkStr , $adLeftTops["Title"]["url_str"])?></h3>
		<div class="banner">
			<?php echo $this->Common->adLinkImage($adLeftTops["AdLeftTop"] , "adlt")?>
		</div>
		<p><?php echo nl2br($adLeftTops["AdLeftTop"]["comment"])?></p>
	</div>
</div>
<div style="margin-bottom:5px"><a href="http://www.twitter.com/diechang1031"><img src="http://twitter-badges.s3.amazonaws.com/ja_follow_me-a.png" alt="diechang1031をフォローしましょう" /></a></div>
<?php
//<p class="tCenter"><a href="/pages/touhoku_eq20110311.html" class="cRed" rel="nofollow">【東北地方太平洋沖地震】<br />募金活動の呼びかけ</a></p>
?>