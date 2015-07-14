<div class="form">
	<h2>問い合わせ内容確認</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $letter["Letter"]["id"]?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">名前</th>
			<td><?php echo h($letter["Letter"]["name"])?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">メール</th>
			<td><?php echo $text->autoLinkEmails($letter["Letter"]["mail"])?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">本文</th>
			<td><?php echo nl2br(h($letter["Letter"]["body"]))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">戻る</th>
			<td>
				<?php echo $html->link("戻る" , array("action" => "index") , array("class" => "btn btn-info"))?>
			</td>
		</tr>
	</table>
</div>