<h2 class="title">
	<a href="<?php echo $html->url(array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>">
	<?php echo $title["Title"]["title_official"]?>
	<?php echo (!empty($title["Title"]["title_sub"])) ? "<span class=\"subTitle\">" . $title["Title"]["title_sub"] . "</span>" : ""?>
	<?php echo (!empty($title["Title"]["title_read"])) ? "<span class=\"read\">" . $title["Title"]["title_read"] . "</span>" : ""?>
	</a>
</h2>