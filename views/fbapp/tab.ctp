<?php
//スタイル
//$html->css(array('fbapp'), 'stylesheet', array('inline' => false));
//$html->script(array('fbapp'), array('inline' => false));
?>
<h1><?php echo $pageInfo["id"]?> にアプリをインストールしました！</h1>
<h2><?php echo $userInfo["name"]?> さんにお勧めのオンラインゲームはこちら</h2>

<dl>
<?php foreach($titles as $title):?>
<dt><h3><?php echo $title["Title"]["title_official"]?></h3></dt>
<dd>
<p style="float:left; margin-right:10px;"><?php echo $html->image("thumb/" . $title["Title"]["thumb_name"] , array("width" => 120))?></p>
<p><?php echo strip_tags($title["Title"]["description"])?></p>
<p style="clear:both"><strong>公式サイト</strong>⇒<?php echo $title["Title"]["ad_text"]?></p>
</dd>
<?php endforeach;?>
</dl>