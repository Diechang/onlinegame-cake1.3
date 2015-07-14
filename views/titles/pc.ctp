<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " 推奨PC（パソコン）");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "の推奨PC(パソコン)です。ショップが推奨するゲームモデルPCで快適プレイ！");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " 推奨PC（パソコン）");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "推奨PC"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<!--Pcs-->
<div class="content pcs">
	<h2><?php echo $html->image("design/titles_pcs_title.gif" , array("alt" => "推奨PC（パソコン）"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>の推奨モデルPC</p>
<?php if(empty($pcs)):?>
	<p class="noData">データがありません</p>
<?php else:?>
	<?php foreach($pcs["pickups"] as $pickup):?>
	<div class="pickup">
		<h3><?php echo $this->Common->adLinkText($pickup["Pc"] , "pc")?></h3>
		<table>
			<tr>
				<td class="image" rowspan="8"><?php echo $this->Common->adLinkImage($pickup["Pc"] , "pc")?></td>
				<th nowrap="nowrap">CPU</th>
				<td><?php echo nl2br($pickup["Pc"]["cpu"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">グラフィック</th>
				<td><?php echo nl2br($pickup["Pc"]["graphic"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">メモリ</th>
				<td><?php echo nl2br($pickup["Pc"]["memory"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">HDD</th>
				<td><?php echo nl2br($pickup["Pc"]["hdd"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">ドライブ</th>
				<td><?php echo nl2br($pickup["Pc"]["drive"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">OS</th>
				<td><?php echo nl2br($pickup["Pc"]["os"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">ショップ</th>
				<td><?php echo $pickup["Pcshop"]["ad_text"]?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">価格</th>
				<td class="price"><?php echo number_format($pickup["Pc"]["price"])?> 円</td>
			</tr>
		</table>
		<?php if(!empty($pickup["Pc"]["present"])):?>
		<div class="present">
			<h4>購入特典</h4>
			<div class="body">
				<?php echo $pickup["Pc"]["present"]?>
			</div>
		</div>
		<?php endif;?>
		<p class="detailsLink"><?php echo $this->Common->adLinkText($pickup["Pc"] , "pc")?></p>
	</div>
	<?php endforeach;?>
	<!--Types-->
	<?php foreach($pctypes as $pctype):?>
	<?php if(!empty($pcs[$pctype["Pctype"]["path"]])):?>
	<div class="list">
		<h3 class="<?php echo $pctype["Pctype"]["path"]?>"><?php echo $pctype["Pctype"]["str"]?>PC一覧</h3>
		<table>
			<?php foreach($pcgrades as $pcgrade):?>
			<?php if(!empty($pcs[$pctype["Pctype"]["path"]][$pcgrade["Pcgrade"]["path"]])):?>
			<tr class="grade">
				<th colspan="5" class="<?php echo $pcgrade["Pcgrade"]["path"]?>"><?php echo $pcgrade["Pcgrade"]["str"]?></th>
			</tr>
				<?php foreach($pcs[$pctype["Pctype"]["path"]][$pcgrade["Pcgrade"]["path"]] as $pc):?>
			<tr>
				<th colspan="5" class="name<?php echo (!empty($pc["Pc"]["pickup"])) ? " pickup" : ""?>"><?php echo $this->Common->adLinkText($pc["Pc"] , "pc")?></th>
			</tr>
			<tr>
				<td rowspan="8" class="image"><?php echo $this->Common->adLinkImage($pc["Pc"] , "pc")?></td>
				<th nowrap="nowrap">CPU</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["cpu"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">グラフィック</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["graphic"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">メモリ</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["memory"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">HDD</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["hdd"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">ドライブ</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["drive"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">OS</th>
				<td colspan="3"><?php echo nl2br($pc["Pc"]["os"])?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">購入特典</th>
				<td colspan="3"><?php echo (strlen(strip_tags($pc["Pc"]["present"])) > 0) ? "あり" : "なし"?></td>
			</tr>
			<tr>
				<th nowrap="nowrap">価格</th>
				<td class="price"><?php echo number_format($pc["Pc"]["price"])?> 円</td>
				<th nowrap="nowrap">ショップ</th>
				<td><?php echo $pc["Pcshop"]["ad_text"]?></td>
			</tr>
				<?php endforeach;?>
			<?php endif;?>
			<?php endforeach;?>
		</table>
	</div>
	<?php endif;?>
	<?php endforeach;?>
	<p class="shopPageCheck">掲載されている価格や購入特典等のデータは、登録時点のものです。<br />
	必ずショップページにて最新データの確認をお願いいたします。</p>
<?php endif;?>
</div>

<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
