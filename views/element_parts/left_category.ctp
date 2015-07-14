<!-- ジャンル -->
<div class="leftBox leftGray">
	<h2><?php echo $html->image("design/leftbox_gray_title_genre.gif" , array("alt" => "ジャンル"))?></h2>
	<div class="comment"><?php echo $html->image("design/leftbox_gray_comment_genre.gif" , array("alt" => "まずはゲームジャンルから"))?></div>
	<div class="body">
		<ul>
<?php foreach($leftCategories as $category):?>
			<li><?php echo $html->link($category["Category"]["str"] , array("controller" => "categories" , "action" => "index" , "path" => $category["Category"]["path"] , "ext" => "html"))?></li>
<?php endforeach;?>
		</ul>
	</div>
</div>
