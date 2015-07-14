<?php
	if(isset($voteId))
	{//編集時
		$text			= "編集";
		$desc			= "への投稿を編集します";
		$headImageSrc	= "design/titles_vote_title_edit.gif";
		$formUrl		= array(
			"controller"	=> "votes",
			"action"		=> "edit",
		);
	}
	else
	{//投稿時
		$text			= "投稿";
		$desc			= "プレイヤーはぜひレビュー・評価の投稿をお願いします";
		$headImageSrc	= "design/titles_vote_title_add.gif";
		$formUrl		= array(
			"controller"	=> "votes",
			"action"		=> "add",
		);
	}
?>
<!--Post-->
<div class="content post" id="voteform">
	<h2><?php echo $html->image($headImageSrc , array("alt" => "レビュー・評価を" . $text . "する"))?></h2>
	<p class="description"><?php echo $title . $desc?></p>
<?php if(!empty($votable)):?>
	<?php echo $form->create("Vote" , array(
		"url" => $formUrl,
		"inputDefaults" => array(
			"div" => false,
			"label" => false,
			"legend" => false
		)
	))?>
	<table class="formTable">
		<tr class="head">
			<th>評価ポイント</th>
			<td class="tCenter"><span class="cRed">悪い</span>　≪　普通　≫　<span class="cBlue">良い</span></td>
		</tr>
	<?php foreach($voteItems as $key => $voteItem):?>
		<tr>
			<th><?php echo $voteItem["ask"]?></th>
			<td class="tCenter radios">
				<?php echo $form->input($key , array(
					"type" => "radio",
					"options" => array(
						"1" => "",
						"2" => "",
						"3" => "",
						"4" => "",
						"5" => ""),
					"default" => 3))?>
			</td>
		</tr>
	<?php endforeach;?>
		<tr>
			<th>編集用パスワード</th>
			<td>
				<?php echo $form->text("pass" , array(
					"value" => "",
					"size" => 8,
					"maxLength" => 8))?><br />
				<span class="attention">※2～8文字の半角英数字のみです。</span>
			</td>
		</tr>
		<tr>
			<th>認証番号</th>
			<td><?php echo $html->image("design/spamnum.gif" , array("alt" => "スパム防止番号"))?></td>
		</tr>
		<tr>
			<th class="cRed">認証</th>
			<td><span class="attention">スパム防止のため上記認証番号を半角で入力してください。</span><br />
				<?php echo $form->text("spam_num" , array(
					"value" => "",
					"size" => 4,
					"maxLength" => 4))?>
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td>
				<?php echo $form->button("評価点数を投稿！" , array(
					"type" => "submit",
					"id" => "rateSubmit",
					"class" => "button"))?><br />
				<span class="attention">※レビューも書きたい場合は下のフォームに入力してください</span>
			</td>
		</tr>
		<tr class="head">
			<th colspan="2">レビューも書く（必須ではありません）</th>
		</tr>
		<tr>
			<th>投稿者名（HN）</th>
			<td>
				<?php echo $form->text("poster_name" , array(
					"class" => "formText"))?><br />
				<span class="attention">未入力の場合は「名無しさん」と表示されます</span></td>
		</tr>
		<tr>
			<th>タイトル</th>
			<td>
				<?php echo $form->text("title" , array(
					"class" => "formText"))?><br />
				<span class="attention">一言で言うと？</span></td>
		</tr>
		<tr>
			<th>レビュー</th>
			<td>
				<?php echo $form->input("review" , array(
					"class" => "formText",
					"cols" => false,
					"rows" => 10))?>
			</td>
		</tr>
		<tr>
			<th class="cRed">注意事項</th>
			<td><span class="attention">※レビューは「ゲームに対する個人的感想」として投稿してください。<br />
			他の方に対するレス等はトラブルの原因となり得ます。<br />
			ご理解の上、ご利用くださいますようお願いします。</span></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td>
				<?php echo $form->hidden("title_id" , array(
					"value" => $titleId))?>

				<?php echo $form->button("レビュー・評価を投稿！" , array(
					"type" => "submit",
					"id" => "reviewSubmit",
					"class" => "button"))?><br />
				<span class="attention">※一度投稿したタイトルには投稿できません。<br />
				（点数のみ、レビュー付関わらず）</span>
			</td>
		</tr>
	</table>
	<?php echo $form->end()?>
<?php else:?>
	<p class="voteWait">現在評価・レビューの投稿は受け付けておりません。</p>
<?php endif;?>
</div>