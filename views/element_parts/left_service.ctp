<!-- サービス状態 -->
<div class="leftBox leftGray">
	<h2><?php echo $html->image("design/leftbox_gray_title_service.gif" , array("alt" => "サービス状態"))?></h2>
	<div class="comment"><?php echo $html->image("design/leftbox_gray_comment_service.gif" , array("alt" => "新作ゲームもチェック"))?></div>
	<div class="body">
		<ul>
<?php foreach($leftServices as $service):?>
			<li><?php echo $html->link($service["Service"]["str"] , array("controller" => "services" , "action" => "index" , "path" => $service["Service"]["path"] , "ext" => "html"))?></li>
<?php endforeach;?>
		</ul>
	</div>
</div>
