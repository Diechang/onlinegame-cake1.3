<?php
/**
 * Google Adsense用ヘルパー
 */
class GadsHelper extends AppHelper
{
/**
 * Both 468x60
 *
 * @param	bool	$withdiv
 * @return	html
 * @access	public
 */
	//468x60
	function ads468($withdiv = true)
	{
		$src = "";
		$src .= ($withdiv) ?  "<div class=\"tCenter\">\n" : "";
		
		$src .= $this->both468();
		
		$src .= ($withdiv) ? "</div>\n" : "";

		return $this->output($src);
	}

/**
 * Text 336x280
 *
 * @return	html
 * @access	public
 */
	function text336()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame text336 */
google_ad_slot = "2678606057";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Both 250x250
 *
 * @return	html
 * @access	public
 */
	function both250()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame both250 */
google_ad_slot = "7936952978";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Image 250x250
 *
 * @return	html
 * @access	public
 */
	function image250()
	{
		$src = <<< HIRE
<!-- Google Adsense 250 -->
<script type="text/javascript"><!--
google_ad_client = "pub-5378944923532596";
/* [DZ]onlinegame image250 */
google_ad_slot = "9970475856";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}

/**
 * Both 468x60
 *
 * @return	html
 * @access	public
 */
	function both468()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame both468 */
google_ad_slot = "9479232132";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}


/**
 * Linkunit 160x90
 *
 * @return	html
 * @access	public
 */
	function link160()
	{
		$src = <<< HIRE
<script type="text/javascript"><!--
google_ad_client = "ca-pub-5378944923532596";
/* [DZ]onlinegame link160 */
google_ad_slot = "9937819886";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HIRE;
		return $src;
	}
}
?>