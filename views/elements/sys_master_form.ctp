<?php echo $form->create($model , array("action" => "add" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<h2><?php echo $str?>新規登録</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public" , array("checked" => true))?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">文字列</th>
			<td>
				<?php echo $form->input("str")?>
			</td>
		</tr>
<?php if($this->params["controller"] == ("categories" or "styles" or "services")):?>
		<tr>
			<th nowrap="nowrap">サブ文字列</th>
			<td>
				<?php echo $form->input("str_sub")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $form->input("description" , array("class" => "editor"))?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">パス</th>
			<td>
				<?php echo $form->input("path")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $form->input("sort" , array("value" => count($items)+1 , "maxLength" => 4 , "size" => 4 , "class" => "input-mini"))?>
			</td>
		</tr>
<?php if(isset($titles)):?>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td>
				<?php echo $form->input("Title" , array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>