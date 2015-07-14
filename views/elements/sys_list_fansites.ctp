<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">タイトルID</th>
			<th nowrap="nowrap">サイトURL</th>
			<th nowrap="nowrap">タイプ</th>
			<th nowrap="nowrap">相互</th>
			<th nowrap="nowrap">登録日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($fansites as $key => $fansite):?>
<?php
switch($fansite["Fansite"]["type"])
{
	case 1:
		$type = "攻略";
		break;
	case 2:
		$type = "ファン";
		break;
}
?>
		<tr class="title_id_<?php echo $fansite["Fansite"]["title_id"]?>">
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("編集" , array("controller" => "fansites" , "action" => "edit" , $fansite["Fansite"]["id"]) , array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $form->checkbox("Fansite." . $key . ".public" , array("checked" => (!empty($fansite["Fansite"]["public"]))))?>
				<?php echo $form->hidden("Fansite." . $key . ".id" , array("value" => $fansite["Fansite"]["id"]))?>
				<?php echo $form->hidden("Fansite." . $key . ".title_id" , array("value" => $fansite["Fansite"]["title_id"]))?>
			</td>
			<td class="tRight"><?php echo $fansite["Fansite"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $fansite["Fansite"]["title_id"]?>
				<?php echo $html->link($fansite["Title"]["title_official"] . " (" . $fansite["Title"]["Titlesummary"]["fansite_count"] . ")" , array("controller" => "fansites" , "action" => "index" , "title_id" => $fansite["Fansite"]["title_id"]))?>
			</td>
			<td class="title">
				<?php echo $fansite["Fansite"]["site_name"]?>
				<?php echo $this->Common->linkConf($fansite["Fansite"]["site_url"])?>
			</td>
			<td><?php echo $type?></td>
			<td><?php echo (!empty($fansite["Fansite"]["link_url"]) ? $this->Common->linkConf($fansite["Fansite"]["link_url"] , "○") : " ")?></td>
			<td><?php echo $fansite["Fansite"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "fansites" , "action" => "delete" , $fansite["Fansite"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $fansite["Fansite"]["site_name"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>