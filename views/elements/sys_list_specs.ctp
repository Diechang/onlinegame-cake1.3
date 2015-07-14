<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">タイトルID</th>
			<th nowrap="nowrap">キャプション</th>
			<th nowrap="nowrap">表示順</th>
			<th nowrap="nowrap">更新日</th>
			<th nowrap="nowrap">複製</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($specs as $key => $spec):?>
		<tr class="title_id_<?php echo $spec["Spec"]["title_id"]?>">
			<td class="tCenter" nowrap="nowrap">
				<?php echo $html->link("編集" , array("controller" => "specs" , "action" => "edit" , $spec["Spec"]["id"]) , array("class" => "btn"))?>
				<?php echo $form->hidden("Spec." . $key . ".id" , array("value" => $spec["Spec"]["id"]))?>
			</td>
			<td class="tRight"><?php echo $spec["Spec"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $spec["Spec"]["title_id"]?>
<?php if(!isset($changer) or $changer == true):?>
				<a href="javascript:LT.narrowTitleId(<?php echo $spec["Spec"]["title_id"]?>)"><?php echo $spec["Title"]["title_official"]?></a>
<?php elseif($changer == false):?>
				<?php echo $html->link($spec["Title"]["title_official"] , array("controller" => "specs" , "action" => "index" , $spec["Spec"]["title_id"]))?>
<?php endif?>
			</td>
			<td class="title">
				<?php echo $spec["Spec"]["caption"]?>
			</td>
			<td><?php echo $form->text("Spec" . "." . $key . ".sort" , array("value" => $spec["Spec"]["sort"] , "size" => 2 , "maxLength" => 1 , "class" => "input-mini"))?></td>
			<td><?php echo $spec["Spec"]["modified"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-repeat icon-white'></i> 複製" , array("controller" => "specs" , "action" => "copy" , $spec["Spec"]["id"]) , array("class" => "btn btn-info btn-small" , "escape" => false) , $spec["Spec"]["id"] . " を複製しますか?")?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "specs" , "action" => "delete" , $spec["Spec"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $spec["Spec"]["id"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>