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
				<?php echo $form->checkbox("public")?> 公開する
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">広告ソース</th>
			<td>
				<div class="adBanner"></div>
				<?php echo $form->textarea("ad_src_image" , array("class" => "adBanner focusSelect"))?>
				<div><input type="button" onclick="ET.getAdBanner()" value="GetAdBanner" class="btn btn-info btn-small" /></div>
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
			<th nowrap="nowrap">画像src</th>
			<td>
				<?php echo $form->input("ad_part_img_src" , array("class" => "adPartImg"))?>
			</td>
		</tr>
<?php if(isset($titles)):?>
		<tr>
			<th nowrap="nowrap">タイトルID</th>
			<td>
				<?php echo $form->input("title_id" , array("empty" => true))?>
			</td>
		</tr>
<?php endif;?>
<?php if(isset($comment)):?>
		<tr>
			<th nowrap="nowrap">コメント</th>
			<td>
				<?php echo $form->input("comment")?>
			</td>
		</tr>
<?php endif;?>
<?php if(isset($sort)):?>
		<tr>
			<th nowrap="nowrap">ソート番号</th>
			<td>
				<?php echo $form->input("sort" , array("value" => 0))?>
			</td>
		</tr>
<?php endif;?>
		<tr>
			<th nowrap="nowrap">備考</th>
			<td>
				<?php echo $form->input("note")?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">登録</th>
			<td>
				<?php echo $form->submit("登録" , array("class" => "btn"))?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>