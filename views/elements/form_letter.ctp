<div class="content pages">
	<h2>お問合せ</h2>
	<p>当サイトへのお問い合わせは、こちらのフォームよりお願いします。<br />
	<span class="cRed">すべての項目にご記入ください。</span></p>
<?php echo $form->create("Letter" , array("action" =>"add" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<table class="formTable">
		<tr>
			<th>お名前（HN）</th>
			<td><?php echo $form->input("name" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>メールアドレス</th>
			<td><?php echo $form->input("mail" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>本文</th>
			<td><?php echo $form->input("body" , array("rows" => "6" , "class" => "formText"))?></td>
		</tr>
		<tr>
			<th>認証番号</th>
			<td><?php echo $html->image("design/spamnum.gif" , array("alt" => "スパム防止番号"))?></td>
		</tr>
		<tr>
			<th class="cRed">認証</th>
			<td><span class="attention">スパム防止のため上記認証番号を半角で入力してください。</span><br />
			<?php echo $form->text("spam_num" , array(
				"size" => 4,
				"maxLength" => 4))?></td>
		</tr>
		<tr>
			<td colspan="2" class="tCenter">
			<?php echo $form->button("お問合せ送信" , array(
				"type" => "submit",
				"class" => "button"))?></td>
		</tr>
	</table>
<?php echo $form->end()?>
</div>