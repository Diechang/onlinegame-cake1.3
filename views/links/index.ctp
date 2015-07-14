<?php
//スタイル
$html->css(array('links'), 'stylesheet', array('inline' => false));
?>
<?php echo $session->flash()?>
<div class="content links">
	<h2><?php echo (!empty($mainStr)) ? "【" . $mainStr . "】" : ""?>相互リンク集</h2>

	<p>
		<?php if($path == "index"):?>
		<strong class="cBlue">おすすめ</strong>
		<?php else:?>
		<?php echo $html->link("おすすめ" , array("controller" => "links" , "path" => "index" , "ext" => "html"))?>
		<?php endif;?>

		<?php foreach($linkCategories as $category):?>
		<?php if($path == $category["Linkcategory"]["path"]):?>
		<strong class="cBlue"><?php echo $category["Linkcategory"]["str"]?></strong>
		<?php else:?>
		<?php echo $html->link($category["Linkcategory"]["str"] , array("controller" => "links" , "path" => $category["Linkcategory"]["path"] , "ext" => "html"))?>
		<?php endif;?>
		<?php endforeach;?>
	</p>
	<p><a href="#entry" class="wBold">≫リンク集に新規登録</a><br />
	当サイトでは相互リンク集に登録していただけるサイト様を募集中です。<br />
	下の依頼フォームより登録をお願いします。</p>
<?php if(!empty($links)):?>
	<ul class="linksList">
	<?php foreach($links as $link):?>
		<li class="clearfix">
			<h3><?php echo $html->link($link["Link"]["site_name"] , $link["Link"]["site_url"] , array("target" => "_blank"))?></h3>
			<div class="thumb"><?php echo $html->link($html->image("http://capture.heartrails.com/small?" . $link["Link"]["site_url"] , array("width" => 120 , "alt" => $link["Link"]["site_name"])) , $link["Link"]["site_url"] , array("target" => "_blank" , "escape" => false))?></div>
			<p class="description"><?php echo nl2br(h($link["Link"]["site_info"]))?></p>
		</li>
	<?php endforeach;?>
	</ul>
	<p class="tRight wBold"><a href="#entry">≫リンク集に新規登録</a></p>
<?php endif;?>
<?php echo $this->Gads->ads468()?>
</div>

<?php echo $this->element("form_link")?>