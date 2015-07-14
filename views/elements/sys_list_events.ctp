<table class="list events table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">イベント名 / タイトル</th>
			<th nowrap="nowrap">開始 / 終了</th>
			<th nowrap="nowrap">更新 / 登録</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($events as $key => $event):?>
		<tr class="<?php echo $this->Common->checkTerm($event["Event"]["start"] , $event["Event"]["end"])?>">
			<td class="tCenter" nowrap="nowrap">
				<?php echo $html->link("編集" , array("controller" => "events" , "action" => "edit" , $event["Event"]["id"]) , array("class" => "btn"))?>
				<?php echo $form->hidden("Event." . $key . ".id" , array("value" => $event["Event"]["id"]))?>
				<?php echo $form->hidden("Event." . $key . ".title_id" , array("value" => $event["Event"]["title_id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Event." . $key . ".public" , array("checked" => (!empty($event["Event"]["public"]))))?>
			</td>
			<td class="tRight"><?php echo $event["Event"]["id"]?></td>
			<td class="title" title="<?php echo $event["Event"]["name"]?>" nowrap="nowrap">
				<?php echo mb_strimwidth($event["Event"]["name"], 0, 60, "...", "UTF-8")?>
				<?php echo $html->link($event["Title"]["title_official"] , array("controller" => "events" , "action" => "index" , "title_id" => $event["Event"]["title_id"]))?>
			</td>
			<td nowrap="nowrap">
				<?php echo $common->dateFormat($event["Event"]["start"] , "term")?> -<br />
				- <?php echo $common->dateFormat($event["Event"]["end"] , "term")?>
			</td>
			<td nowrap="nowrap">
				<?php echo $common->dateFormat($event["Event"]["modified"])?><br />
				<?php echo $common->dateFormat($event["Event"]["created"])?>
			</td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i>削除" , array("controller" => "events" , "action" => "delete" , $event["Event"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $event["Event"]["id"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>