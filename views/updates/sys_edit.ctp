<?php echo $form->create("Update" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<h2>更新履歴編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td>
				<?php echo $this->data["Update"]["id"]?> <?php echo $form->input("id")?>
			</td>
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