<!--Links Form-->
<div class="content linksForm" id="linkForm">
	<a name="entry"></a>
	<h2>相互リンク集登録依頼フォーム</h2>
	<p class="cRed">※は必須項目です。</p>
<?php echo $form->create("Link" , array("action" => "add" , "inputDefaults" => array("div" => false , "label" => false , "legend" => false)))?>
	<table class="formTable">
		<tr>
			<th>サイト名※</th>
			<td><?php echo $form->input("site_name" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>サイトURL※</th>
			<td><?php echo $form->input("site_url" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>リンク設置URL※</th>
			<td><?php echo $form->input("link_url" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>サイト紹介文<br />
				（全角100文字まで）</th>
			<td><?php echo $form->input("site_info" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>登録カテゴリ</th>
			<td><?php echo $form->input("linkcategory_id")?></td>
		</tr>
		<tr>
			<th>管理者のお名前※</th>
			<td><?php echo $form->input("admin_name" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>メールアドレス※</th>
			<td><?php echo $form->input("admin_mail" , array("class" => "formText"))?></td>
		</tr>
		<tr>
			<th>メッセージ<br />
				（ありましたらどうぞ）</th>
			<td><?php echo $form->input("message" , array("maxLength" => 255 , "rows" => 4 , "cols" => null , "class" => "formText"))?></td>
		</tr>
		<tr>
			<th>認証番号</th>
			<td><?php echo $html->image("design/spamnum.gif" , array("alt" => "スパム防止番号"))?></td>
		</tr>
		<tr>
			<th>認証※</th>
			<td><span class="attention">スパム防止のため上記認証番号を半角で入力してください。</span><br />
			<?php echo $form->text("spam_num" , array(
				"size" => 4,
				"maxLength" => 4))?></td>
		</tr>
		<tr>
			<th class="cRed">（※）は必須入力</th>
			<td><?php echo $form->button("相互リンク申込" , array(
					"type" => "submit",
					"class" => "button"))?></td>
		</tr>
		<tr>
			<td colspan="2" class="formMessage">
				<h3>ご依頼内容が必ず掲載されるとは限りません</h3>
				<p>ご依頼頂いたURLを確認し、登録内容を修正する場合があります。<br />
				また、更新の滞っているサイト様、当サイトのリンク掲載に不適切だと判断した場合はリンク掲載を中止する場合があります。</p>
				<h3>クオリティの高いサイト様を募集しています</h3>
				<p>当サイトでは、クオリティの高いサイト様のリンク掲載に努めています。<br />
				作りたてのサイト様や、内容の薄いサイト様など、当サイトのリンク掲載基準に達していないサイト様はリンクを掲載できない場合があります。</p>	
<?php /*
				<h3>検索エンジンをブロックしています</h3>
				<p>Google検索エンジンのアルゴリズム変更に伴い、リンク集ディレクトリ（/links/）へのクローラーアクセスをブロックしています。<br />
				SEO目的の相互リンクとしては意味をなさないものになっていますので、何卒ご理解頂けますようお願い致します。</p>
*/ ?>
			</td>
		</tr>
	</table>
<?php echo $form->end()?>
</div>