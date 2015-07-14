<h2>ACR - ページランクテキスト</h2>
<div>
<textarea style="width:100%; height:500px" class="focusSelect">
<?php foreach($titles as $title):?>
/titles/<?php echo $title["Title"]["url_str"]?>/,<?php echo $html->link($title["Title"]["title_official"] , array("controller" => "titles" , "action" => "index" , "path" => $title["Title"]["url_str"] , "sys" => false , "ext" => "html"))?>,c<?php echo "\n"?>
<?php endforeach;?>
</textarea>
</div>