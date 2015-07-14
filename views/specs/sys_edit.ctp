<?php echo $form->create("Spec" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "cols" => null , "rows" => null)))?>
	<h2>ファンサイト編集</h2>
	<table class="edit spec table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td colspan="2"><?php echo $this->data["Spec"]["id"]?><?php echo $form->hidden("id")?></td>
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
				<?php echo $form->input("sort" , array("class" => "input-mini"))?>
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