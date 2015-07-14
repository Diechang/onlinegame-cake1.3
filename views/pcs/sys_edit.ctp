<?php echo $form->create("Pc" , array("action" => "edit" , "inputDefaults" => array("div" => false , "label" => false , "cols" => null , "rows" => null)))?>
	<h2>PC編集</h2>
	<table class="edit pc table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->data["Pc"]["id"]?><?php echo $form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">オススメ</th>
			<td><?php echo $form->checkbox("pickup")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイトルID</th>
			<td><?php echo $form->input("title_id" , array("empty" => true))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">ショップID</th>
			<td><?php echo $form->input("pcshop_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">タイプ</th>
			<td><?php echo $form->input("pctype_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">グレード</th>
			<td><?php echo $form->input("pcgrade_id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<div class="adText"><?php echo $this->data["Pc"]["ad_src_text"]?></div>
				<?php echo $form->textarea("ad_src_text" , array("class" => "adText focusSelect"))?>
				<div><input type="button" onclick="ET.getAdText()" value="GetAdText" class="btn btn-info" /></div>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告イメージ</th>
			<td>
				<div class="adImage"><?php echo $this->data["Pc"]["ad_src_image"]?></div>
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
			<th nowrap="nowrap">商品名</th>
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

		<!--<tr>
			<th nowrap="nowrap">商品名</th>
			<td><?php echo $form->input("name")?></td>
		</tr>-->

		<tr>
			<th nowrap="nowrap">価格</th>
			<td><?php echo $form->input("price")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">CPU</th>
			<td>
				<?php echo $form->input("cpu")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">グラフィック</th>
			<td>
				<?php echo $form->input("graphic")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">メモリ</th>
			<td>
				<?php echo $form->input("memory")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">HDD</th>
			<td>
				<?php echo $form->input("hdd")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ドライブ</th>
			<td><?php echo $form->input("drive")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">OS</th>
			<td><?php echo $form->input("os")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">モニタ</th>
			<td><?php echo $form->input("display")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">備考</th>
			<td><?php echo $form->input("other")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">特典</th>
			<td><?php echo $form->input("present" , array("class" => "editor"))?></td>
		</tr>

		<!--<tr>
			<th nowrap="nowrap">URL</th>
			<td><?php echo $form->input("url")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">テキスト広告</th>
			<td>
				<div><?php echo $this->data["Pc"]["ad_text"]?></div>
				<?php echo $form->input("ad_text" , array("class" => "adField focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">画像広告</th>
			<td>
				<div><?php echo $this->data["Pc"]["ad_image"]?></div>
				<?php echo $form->input("ad_image" , array("class" => "adField focusSelect"))?>
			</td>
		</tr>-->

		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>