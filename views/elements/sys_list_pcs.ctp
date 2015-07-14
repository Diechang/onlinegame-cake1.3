<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap" title="Pickup">PU</th>
			<th nowrap="nowrap" title="No Redirece">NR</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">商品名 / タイトル</th>
			<th nowrap="nowrap">画像</th>
			<th nowrap="nowrap">ショップ</th>
			<th nowrap="nowrap">タイプ / グレード</th>
			<th nowrap="nowrap">価格</th>
			<th nowrap="nowrap">登録日</th>
			<th nowrap="nowrap">複製</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($pcs as $key => $pc):?>
		<tr>
			<td class="tCenter" nowrap="nowrap">
				<?php echo $html->link("編集" , array("controller" => "pcs" , "action" => "edit" , $pc["Pc"]["id"]) , array("class" => "btn"))?>
				<?php echo $form->hidden("Pc." . $key . ".id" , array("value" => $pc["Pc"]["id"]))?>
				<?php echo $form->hidden("Pc." . $key . ".title_id" , array("value" => $pc["Pc"]["title_id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Pc." . $key . ".public" , array("checked" => (!empty($pc["Pc"]["public"]))))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Pc." . $key . ".pickup" , array("checked" => (!empty($pc["Pc"]["pickup"]))))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Pc." . $key . ".ad_noredirect" , array("checked" => (!empty($package["Pc"]["ad_noredirect"]))))?>
			</td>
			<td class="tRight"><?php echo $pc["Pc"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $pc["Pc"]["ad_part_text"]?>
				<?php echo $html->link($pc["Title"]["title_official"] , array("controller" => "pcs" , "action" => "index" , "title_id" => $pc["Pc"]["title_id"]))?>
			</td>
			<td class="adImage">
				<?php echo (!empty($pc["Pc"]["ad_part_img_src"])) ? $this->Common->adLinkImage($pc["Pc"] , "pc") : "none"?>
			</td>
			<td>
				<?php echo $html->link($pc["Pcshop"]["shop_name"] , array("controller" => "pcs" , "action" => "index" , "pcshop_id" => $pc["Pc"]["pcshop_id"]))?>
			</td>
			<td nowrap="nowrap">
				<?php echo $html->link($pc["Pctype"]["str"] , array("controller" => "pcs" , "action" => "index" , "pctype_id" => $pc["Pc"]["pctype_id"]))?><br />
				<?php echo $html->link($pc["Pcgrade"]["str"] , array("controller" => "pcs" , "action" => "index" , "pcgrade_id" => $pc["Pc"]["pcgrade_id"]))?>
			</td>
			<td class="tRight" nowrap="nowrap">
				¥ <?php echo number_format($pc["Pc"]["price"])?>
			</td>
			<td><?php echo $pc["Pc"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-repeat icon-white'></i> 複製" , array("controller" => "pcs" , "action" => "copy" , $pc["Pc"]["id"]) , array("class" => "btn btn-info btn-small" , "escape" => false) , $pc["Pc"]["id"] . " を複製しますか?")?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "pcs" , "action" => "delete" , $pc["Pc"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $pc["Pc"]["id"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>