<div class="form">
	<h2>問い合わせ一覧</h2>
	<table class="list tablesorter table table-bordered">
		<thead>
			<tr>
				<th nowrap="nowrap">確認</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">名前</th>
				<th nowrap="nowrap">メール</th>
				<th nowrap="nowrap">本文</th>
				<th nowrap="nowrap">日時</th>
				<th nowrap="nowrap">削除</th>
			</tr>
		</thead>
		<tbody>
<?php foreach($letters as $key => $letter):?>
			<tr>
				<td class="tCenter" nowrap="nowrap"><?php echo $html->link("確認" , array("action" => "view" , $letter["Letter"]["id"]) , array("class" => "btn btn-info"))?></td>
				<td><?php echo $letter["Letter"]["id"]?></td>
				<td><?php echo h($letter["Letter"]["name"])?></td>
				<td><?php echo h($letter["Letter"]["mail"])?></td>
				<td><?php echo mb_strimwidth(h($letter["Letter"]["body"]) , 0 , 50)?></td>
				<td><?php echo $letter["Letter"]["created"]?></td>
				<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("action" => "delete" , $letter["Letter"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $letter["Letter"]["id"] . " を削除しますか?")?></td>
			</tr>
<?php endforeach;?>
		</tbody>
	</table>
</div>