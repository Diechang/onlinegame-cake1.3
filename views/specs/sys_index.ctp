<?php echo $form->create("Spec" , array("action" => "add" , "inputDefaults" => array("div" => false , "label" => false , "cols" => null , "rows" => null)))?>
	<h2>動作環境新規登録</h2>
	<table class="edit spec table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td colspan="2"> </td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトル</th>
			<td colspan="2"><?php echo $form->input("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">キャプション</th>
			<td colspan="2"><?php echo $form->input("caption")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap"> </th>
			<th nowrap="nowrap">必須</th>
			<th nowrap="nowrap">推奨</th>
		</tr>
		<tr>
			<th nowrap="nowrap">OS</th>
			<td>
				<?php echo $form->input("os_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("os_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">CPU</th>
			<td>
				<?php echo $form->input("cpu_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("cpu_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">メモリ</th>
			<td>
				<?php echo $form->input("memory_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("memory_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ディスク容量</th>
			<td>
				<?php echo $form->input("disc_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("disc_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">グラフィック</th>
			<td>
				<?php echo $form->input("graphic_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("graphic_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サウンド</th>
			<td>
				<?php echo $form->input("sound_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("sound_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">通信環境</th>
			<td>
				<?php echo $form->input("network_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("network_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ディスプレイ</th>
			<td>
				<?php echo $form->input("display_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("display_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">DirectX</th>
			<td>
				<?php echo $form->input("directx_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("directx_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">その他</th>
			<td>
				<?php echo $form->input("other_low" , array("class" => "focusSelect"))?>
			</td>
			<td>
				<?php echo $form->input("other_high" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">表示順</th>
			<td colspan="2">
				<?php echo $form->input("sort" , array("default" => 0 , "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td colspan="2">
				<?php echo $form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>

<?php echo $form->create("Spec" , array("action" => "lump"))?>
	<h2>動作環境一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
		<select id="narrow_changer" class="category" onchange="LT.narrowTitleId(this.value)">
			<option value="all" selected="selected">すべて</option>
	<?php foreach($titlesCount as $title):?>
			<option value="<?php echo $title["Title"]["id"]?>"><?php echo $title["Title"]["title_official"]?>(<?php echo count($title["Spec"])?>)</option>
	<?php endforeach;?>
		</select>
	</div>
<?php echo $this->element("sys_list_specs" , array("specs" => $specs))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>