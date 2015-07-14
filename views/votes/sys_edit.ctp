<?php echo $form->create("Vote" , array("action" => "edit"))?>
	<h2>投稿編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->data["Vote"]["id"]?>
			<?php echo $form->hidden("id")?>
			<?php echo $form->hidden("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public" , array("checked" => (!empty($this->data["Vote"]["public"]))))?> 公開する
			</td>
		</tr>
<?php foreach($voteItems as $key => $voteItem):?>
		<tr>
			<th><?php echo $voteItem["label"]?></th>
			<td>
				<?php echo $form->text($key , array("class" => "input-mini"))?>
			</td>
		</tr>
<?php endforeach;?>
		<tr>
			<th>投稿者</th>
			<td>
				<?php echo $form->text("poster_name")?>
			</td>
		</tr>
		<tr>
			<th>タイトル</th>
			<td>
				<?php echo $form->text("title")?>
			</td>
		</tr>
		<tr>
			<th>レビュー</th>
			<td>
				<?php echo $form->textarea("review" , array("rows" => 10))?>
			</td>
		</tr>
		<tr>
			<th>編集パス</th>
			<td>
				<?php echo $form->text("pass")?>
			</td>
		</tr>
		<tr>
			<th>IP</th>
			<td>
				<?php echo $this->data["Vote"]["ip"]?>
			</td>
		</tr>
		<tr>
			<th>cookey</th>
			<td>
				<?php echo $this->data["Vote"]["cookey"]?>
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