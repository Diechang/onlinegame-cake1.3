<?php echo $form->create("Moneycategory" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<h2>小遣いカテゴリ編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->data["Moneycategory"]["id"]?><?php echo $form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">文字列</th>
			<td>
				<?php echo $form->input("str")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">パス</th>
			<td>
				<?php echo $form->input("path")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $form->input("summary" , array("rows" => 3))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">本文</th>
			<td>
				<?php echo $form->input("body" , array("class" => "editor"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $form->input("sort" , array("maxLength" => 4 , "size" => 4 , "class" => "input-mini"))?>
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