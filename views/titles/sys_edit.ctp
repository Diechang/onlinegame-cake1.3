<?php echo $form->create("Title" , array("action" => "edit" , "type" => "file" , "inputDefaults" => array("div" => false , "label" => false , "monthNames" => false , "dateFormat" => "YMD" , "minYear" => 1990 , "maxYear" => date("Y") + 2)))?>
	<table class="edit table table-bordered">
		<tr>
			<th nowrap="nowrap">ID</th>
			<td><?php echo $this->data["Title"]["id"]?><?php echo $form->hidden("id")?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">公開</th>
			<td>
				<?php echo $form->checkbox("public" , array("checked" => (!empty($this->data["Title"]["public"]))))?> 公開する
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
				<?php echo $html->image($this->Common->thumbName($this->data["Title"]["thumb_name"]))?><br />
				<?php echo $form->file("thumb_image")?>
				<?php echo $form->hidden("thumb_name")?>
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
				<?php echo $form->input("service_id")?>
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
				<?php echo $form->input("fee_text")?>
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
				<div><?php echo $this->data["Title"]["ad_text"]?></div>
				<?php echo $form->textarea("ad_text" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーS120</th>
			<td>
				<div><?php echo $this->data["Title"]["ad_banner_s"]?></div>
				<?php echo $form->textarea("ad_banner_s" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーM234</th>
			<td>
				<div><?php echo $this->data["Title"]["ad_banner_m"]?></div>
				<?php echo $form->textarea("ad_banner_m" , array("class" => "focusSelect"))?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告バナーL468</th>
			<td>
				<div><?php echo $this->data["Title"]["ad_banner_l"]?></div>
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
				<?php if(!empty($this->data["Title"]["video"])):?>
				<div class="movie">
					<object width="320" height="180">
					<param name="movie" value="http://www.youtube.com/v/<?php echo $this->data["Title"]["video"]?>?fs=1&amp;hl=ja_JP"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/<?php echo $this->data["Title"]["video"]?>?fs=1&amp;hl=ja_JP" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="320" height="180"></embed>
					</object>
				</div>
				<?php endif;?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $form->hidden("id")?>
				<?php echo $form->submit("登録" , array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>