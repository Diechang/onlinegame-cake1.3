<ul class="titlesMenu">
	<li<?php if($this->params["action"] == "index"):?> class="active"<?php endif;?>><?php echo $html->link("トップ" , array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
	<li<?php if($this->params["action"] == "rating"):?> class="active"<?php endif;?>><?php echo $html->link("評価" , array("controller" => "titles" , "action" => "rating" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
	<li<?php if($this->params["action"] == "review" or $this->params["action"] == "single"):?> class="active"<?php endif;?>><?php echo $html->link("レビュー" , array("controller" => "titles" , "action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
<?php
/* events
	<?php if(!empty($title["Titlesummary"]["event_count"])):?>
	<li<?php if($this->params["action"] == "events" or $this->params["action"] == "event"):?> class="active"<?php endif;?>><?php echo $html->link("イベント" , array("action" => "events" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
	<?php endif;?>
*/
?>
	<?php if(!empty($title["Titlesummary"]["pc_count"])):?>
	<li<?php if($this->params["action"] == "pc"):?> class="active"<?php endif;?>><?php echo $html->link("推奨PC" , array("controller" => "titles" , "action" => "pc" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
	<?php endif;?>
	<li<?php if($this->params["action"] == "link"):?> class="active"<?php endif;?>><?php echo $html->link("攻略リンク" , array("controller" => "titles" , "action" => "link" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
	<li<?php if($this->params["action"] == "search"):?> class="active"<?php endif;?>><?php echo $html->link("動画・ブログ" , array("controller" => "titles" , "action" => "search" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?></li>
</ul>