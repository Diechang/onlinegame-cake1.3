<?php
//スタイル
//$html->css(array('fbapp'), 'stylesheet', array('inline' => false));
//$html->script(array('fbapp'), array('inline' => false));
?>
<h1>Welcome, <?php echo $userInfo["name"]?> <a href="<?php echo $addPageUrl?>" target="_blank" class="btn">アプリを追加</a></h1>
<h2>あなたにお勧めのオンラインゲームはこちら</h2>

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