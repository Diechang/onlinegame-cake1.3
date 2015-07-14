<?php echo $form->create("Package" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "monthNames" => false , "dateFormat" => "YMD" , "minYear" => 1990 , "maxYear" => date("Y") + 2)))?>
	<h2>パッケージ編集</h2>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->data["Package"]["id"]?><?php echo $form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトルID</th>
			<td><?php echo $form->input("title_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<div class="adText"><?php echo $this->data["Package"]["ad_src_text"]?></div>
				<?php echo $form->textarea("ad_src_text" , array("class" => "adText focusSelect"))?>
				<div><input type="button" onclick="ET.getAdText()" value="GetAdText" class="btn btn-info" /></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告イメージ</th>
			<td>
				<div class="adImage"><?php echo $this->data["Package"]["ad_src_image"]?></div>
				<?php echo $form->textarea("ad_src_image" , array("class" => "adImage focusSelect"))?>
				<div><input type="button" onclick="ET.getAdImage()" value="GetAdImage" class="btn btn-info" /></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">リダイレクト</th>
			<td>
				<?php echo $form->checkbox("ad_noredirect")?> しない
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL</th>
			<td>
				<?php echo $form->input("ad_part_url" , array("class" => "adPartUrl"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">パッケージ名</th>
			<td><?php echo $form->input("ad_part_text" , array("class" => "adPartText"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">画像src</th>
			<td>
				<?php echo $form->input("ad_part_img_src" , array("class" => "adPartImg"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カウントsrc</th>
			<td>
				<?php echo $form->input("ad_part_track_src" , array("class" => "adPartTrack"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">価格</th>
			<td>
				<?php echo $form->input("price")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">発売日</th>
			<td>
				<?php echo $form->input("release" , array("empty" => true , "class" => "input-mini"))?>
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