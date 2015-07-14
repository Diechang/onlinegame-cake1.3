<!-- スタイル -->
<div class="leftBox leftGray">
	<h2><?php echo $html->image("design/leftbox_gray_title_style.gif" , array("alt" => "スタイル・環境"))?></h2>
	<div class="comment"><?php echo $html->image("design/leftbox_gray_comment_style.gif" , array("alt" => "自分に合ったゲームを探そう"))?></div>
	<div class="body">
		<ul>
<?php foreach($leftStyles as $style):?>
			<li><?php echo $html->link($style["Style"]["str"] , array("controller" => "styles" , "action" => "index" , "path" => $style["Style"]["path"] , "ext" => "html"))?></li>
<?php endforeach;?>
		</ul>
	</div>
</div>
