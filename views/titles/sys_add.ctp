<?php echo $form->create("Title" , array("action" => "add" , "type" => "file" , "inputDefaults" => array("div" => false , "label" => false , "monthNames" => false , "dateFormat" => "YMD" , "minYear" => 1990 , "maxYear" => date("Y") + 2)))?>
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
			<td>
				<?php echo $form->input("title_official")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">読み</th>
			<td>
				<?php echo $form->input("title_read")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サブタイトル</th>
			<td>
				<?php echo $form->input("title_sub")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">省略タイトル</th>
			<td>
				<?php echo $form->input("title_abbr")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">検索キーワード</th>
			<td>
				<?php echo $form->input("keyword")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">URL文字列</th>
			<td>
				<?php echo $form->input("url_str")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サムネイル</th>
			<td>
				<?php echo $form->file("thumb_image")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">概要</th>
			<td>
				<?php echo $form->textarea("description" , array("class" => "editor"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">サービス状態</th>
			<td>
				<?php echo $form->input("service_id" , array("default" => 2))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">正式サービス開始日</th>
			<td>
				<?php echo $form->input("service_start" , array("empty" => true , "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">テスト開始日</th>
			<td>
				<?php echo $form->input("test_start" , array("empty" => true , "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">テスト終了日</th>
			<td>
				<?php echo $form->input("test_end" , array("empty" => true , "class" => "input-mini"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ文字</th>
			<td>
				<?php echo $form->input("category_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">カテゴリ</th>
			<td>
				<?php echo $form->input("Category" , array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">スタイル</th>
			<td>
				<?php echo $form->input("Style" , array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">ポータル</th>
			<td>
				<?php echo $form->input("Portal" , array(
					"multiple" => "checkbox",
				))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">課金方式</th>
			<td>
				<?php echo $form->input("fee_id")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">料金</th>
			<td>
				<?php echo $form->text("fee_text")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告利用</th>
			<td>
				<?php echo $form->checkbox("ad_use")?> 広告を利用する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告テキスト</th>
			<td>
				<?php echo $form->textarea("ad_text" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーS120</th>
			<td>
				<?php echo $form->textarea("ad_banner_s" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーM234</th>
			<td>
				<?php echo $form->textarea("ad_banner_m" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーL468</th>
			<td>
				<?php echo $form->textarea("ad_banner_l" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Copyright</th>
			<td><?php echo $form->textarea("copyright")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公式URL</th>
			<td>
				<?php echo $form->input("official_url")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Video</th>
			<td>
				<?php echo $form->input("video")?>
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