<table class="list tablesorter table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">広告</th>
			<th nowrap="nowrap">ショップ名</th>
			<th nowrap="nowrap">パス</th>
			<th nowrap="nowrap">PC</th>
			<th nowrap="nowrap">表示順</th>
			<th nowrap="nowrap">登録日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($pcshops as $key => $pcshop):?>
		<tr>
			<td class="tCenter" nowrap="nowrap">
				<?php echo $html->link("編集" , array("controller" => "pcshops" , "action" => "edit" , $pcshop["Pcshop"]["id"]) , array("class" => "btn"))?>
				<?php echo $form->hidden("Pcshop." . $key . ".id" , array("value" => $pcshop["Pcshop"]["id"]))?>
			</td>
			<td class="tRight"><?php echo $pcshop["Pcshop"]["id"]?></td>
			<td class="tCenter">
				<?php echo $form->checkbox("Pcshop." . $key . ".public" , array("checked" => (!empty($pcshop["Pcshop"]["public"]))))?>
				<?php echo $form->hidden("Pcshop." . $key . ".id" , array("value" => $pcshop["Pcshop"]["id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Pcshop." . $key . ".ad_use" , array("checked" => (!empty($pcshop["Pcshop"]["ad_use"]))))?>
			</td>
			<td class="title">
				<?php echo $pcshop["Pcshop"]["shop_name"]?>
				<?php echo $this->Common->linkConf($pcshop["Pcshop"]["shop_url"])?>
			</td>
			<td>
				<?php echo $pcshop["Pcshop"]["url_str"]?>
			</td>
			<td class="<?php echo $this->Common->addClassZero(count($pcshop["Pc"]) , "tCenter")?>">
				<?php echo $html->link(count($pcshop["Pc"]) , array("controller" => "pcs" , "action" => "index" , "pcshop_id" => $pcshop["Pcshop"]["id"]) , array("class" => $this->Common->addClassZero(count($pcshop["Pc"]))))?>
			</td>
			<td><?php echo $form->text("Pcshop" . "." . $key . ".sort" , array("value" => $pcshop["Pcshop"]["sort"] , "size" => 2 , "maxLength" => 1 , "class" => "input-mini"))?></td>
			<td><?php echo $pcshop["Pcshop"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i>削除" , array("controller" => "pcshops" , "action" => "delete" , $pcshop["Pcshop"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $pcshop["Pcshop"]["id"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>