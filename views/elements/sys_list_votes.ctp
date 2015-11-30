<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">タイトルID</th>
			<th nowrap="nowrap">1</th>
			<th nowrap="nowrap">2</th>
			<th nowrap="nowrap">3</th>
			<th nowrap="nowrap">4</th>
			<th nowrap="nowrap">5</th>
			<th nowrap="nowrap">6</th>
			<th nowrap="nowrap">7</th>
			<th nowrap="nowrap">8</th>
			<th nowrap="nowrap">9</th>
			<th nowrap="nowrap">10</th>
			<th nowrap="nowrap">AVG</th>
			<th nowrap="nowrap">REV</th>
			<th nowrap="nowrap">投稿者</th>
			<th nowrap="nowrap">IP</th>
			<th nowrap="nowrap">cookey</th>
			<th nowrap="nowrap">更新日</th>
			<th nowrap="nowrap">投稿日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($votes as $key => $v):?>
		<tr class="title_id_<?php echo $v["Vote"]["title_id"]?>">
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("編集" , array("controller" => "votes" , "action" => "edit" , $v["Vote"]["id"]) , array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $form->checkbox("Vote." . $key . ".public" , array("checked" => (!empty($v["Vote"]["public"]))))?>
				<?php echo $form->hidden("Vote." . $key . ".id" , array("value" => $v["Vote"]["id"]))?>
				<?php echo $form->hidden("Vote." . $key . ".title_id" , array("value" => $v["Vote"]["title_id"]))?>
			</td>
			<td class="tRight"><?php echo $v["Vote"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $v["Vote"]["title_id"]?>
				<?php echo $html->link($v["Title"]["title_official"] . " (" . $v["Title"]["Titlesummary"]["vote_count_vote"] . ")" , array("controller" => "votes" , "action" => "index" , "title_id" => $v["Vote"]["title_id"]))?>
			</td>
			<td class="tRight"><?php echo $v["Vote"]["item1"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item2"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item3"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item4"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item5"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item6"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item7"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item8"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item9"]?></td>
			<td class="tRight"><?php echo $v["Vote"]["item10"]?></td>
			<td class="tRight"><?php echo $this->Common->pointFormat($v["Vote"]["single_avg"])?></td>
			<td class="tCenter"<?php if(!empty($v["Vote"]["review"])):?> title="<?php echo $v["Vote"]["review"] . " (" . mb_strlen($v["Vote"]["review"]) . ")"?>"<?php endif;?>><?php echo (!empty($v["Vote"]["review"])) ? "(" . mb_strlen($v["Vote"]["review"]) . ")" : " "?></td>
			<td><?php echo h($v["Vote"]["poster_name"])?></td>
			<td><?php echo $v["Vote"]["ip"]?></td>
			<td><?php echo $v["Vote"]["cookey"]?></td>
			<td><?php echo $v["Vote"]["modified"]?></td>
			<td><?php echo $v["Vote"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "votes" , "action" => "delete" , $v["Vote"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $v["Vote"]["id"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>