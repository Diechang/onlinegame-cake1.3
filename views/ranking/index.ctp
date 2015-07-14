<?php
//スタイル
$html->css(array('ranking'), 'stylesheet', array('inline' => false));
?>
<div class="content ranking">
	<h2 class="image common">【<?php echo $mainStr?>】人気オンラインゲームランキング</h2>
	<div class="body">
		<div class="rankingWide">
			<div class="top">
				<div class="body">
<!--
					<ul class="rankChangeTabs clearfix">
						<li<?php if($path == "index"){ echo " class=\"active\"";}?>><?php echo $html->link("総合" , array("controller" => "ranking" , "path" => "index" , "ext" => "html"))?></li>
						<?php foreach($categories as $category):?>
						<li<?php if($path == $category["Category"]["path"]){ echo " class=\"active\"";}?>><?php echo $html->link($category["Category"]["str"] , array("controller" => "ranking" , "path" => $category["Category"]["path"] , "ext" => "html"))?></li>
						<?php endforeach;?>
					</ul>
-->
<?php echo $this->element("loop_ranking_data" , $rankings)?>

					<ul class="rankChangeTabs clearfix">
						<li<?php if($path == "index"){ echo " class=\"active\"";}?>><?php echo $html->link("総合" , array("controller" => "ranking" , "path" => "index" , "ext" => "html"))?></li>
						<?php foreach($categories as $category):?>
						<li<?php if($path == $category["Category"]["path"]){ echo " class=\"active\"";}?>><?php echo $html->link($category["Category"]["str"] , array("controller" => "ranking" , "path" => $category["Category"]["path"] , "ext" => "html"))?></li>
						<?php endforeach;?>
					</ul>

<?php //echo $this->Gads->both468()?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($norankings)):?>
<div class="content moreList">
	<h2>評価がまだ投稿されていないゲーム</h2>
	<p>プレイしたことがあるタイトルには是非投稿を！<br />
	あなたの投稿でランクインされます！</p>
	<ul>
	<?php foreach($norankings as $norank):?>
		<li><?php echo $this->Common->titleLinkText(
				$this->Common->titleWithSpan($norank["Title"]["title_official"] , $norank["Title"]["title_read"]),
				$norank["Title"]["url_str"])?></li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif;?>