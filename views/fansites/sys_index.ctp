<?php echo $form->create("Fansite" , array("action" => "add" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<h2>ファンサイト新規登録</h2>
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
			<th nowrap="nowrap">タイトル</th>
			<td><?php echo $form->input("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイプ</th>
			<td>
				<?php echo $form->input("type" , array(
					"options" => array(
						"1" => "攻略",
						"2" => "ファン",
					)))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイト名</th>
			<td>
				<?php echo $form->text("site_name")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サイトURL</th>
			<td>
				<?php echo $form->text("site_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リンクURL</th>
			<td>
				<?php echo $form->text("link_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">紹介文</th>
			<td>
				<?php echo $form->textarea("description")?>
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

<h2>ファンサイト一覧</h2>
<?php echo $form->create("Fansite" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $form->text("w" , array("size" => 10))?>
	<select name="title_id"  class="title">
		<option value="" selected="selected">すべて</option>
	<?php foreach($titlesCount as $title):?>
		<option value="<?php echo $title["Title"]["id"]?>"><?php echo $title["Title"]["title_official"]?>(<?php echo $title["Titlesummary"]["fansite_count"]?>)</option>
	<?php endforeach;?>
	</select>
	<?php echo $form->submit("検索" , array("div" => false , "class" => "btn"))?>
<?php echo $form->end()?>
<?php echo $form->create("Fansite" , array("action" => "lump"))?>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
	</div>
<?php echo $this->element("sys_list_fansites" , array("fansites" => $fansites))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>