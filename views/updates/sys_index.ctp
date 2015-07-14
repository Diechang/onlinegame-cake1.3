<?php echo $form->create("Update" , array("action" => "index" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<h2>更新履歴登録</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">本文</th>
			<td>
				<?php echo $form->input("text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>
<div class="form">
	<h2>更新履歴一覧</h2>
	<table class="list tablesorter table table-bordered">
		<thead>
			<tr>
				<th nowrap="nowrap">編集</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">本文</th>
				<th nowrap="nowrap">更新</th>
				<th nowrap="nowrap">作成</th>
				<th nowrap="nowrap">削除</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($updates as $key => $update):?>
			<tr>
				<td class="tCenter"><?php echo $html->link("編集" , array("action" => "edit" , $update["Update"]["id"]) , array("class" => "btn"))?></td>
				<td><?php echo $update["Update"]["id"]?></td>
				<td><?php echo $update["Update"]["text"]?></td>
				<td><?php echo $update["Update"]["modified"]?></td>
				<td><?php echo $update["Update"]["created"]?></td>
				<td class="tCenter"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("action" => "delete" , $update["Update"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $update["Update"]["id"] . " を削除しますか?")?></td>
			</tr>
<?php endforeach;?>
		</tbody>
	</table>
</div>