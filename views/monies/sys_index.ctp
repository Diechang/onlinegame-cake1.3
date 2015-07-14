<h3><?php echo $html->link("小遣いサイト新規登録" , array("action" => "add") , array("class" => "btn btn-success"))?></a></h3>
<?php echo $form->create("Money" , array("action" => "lump"))?>
	<h2>小遣いサイト一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
	</div>
	<table class="list tablesorter table table-bordered">
		<thead>
			<tr>
				<th nowrap="nowrap">編集</th>
				<th nowrap="nowrap">公開</th>
				<th nowrap="nowrap">広告</th>
				<th nowrap="nowrap">ID</th>
				<th nowrap="nowrap">タイトル</th>
				<th nowrap="nowrap">パス</th>
				<th nowrap="nowrap">カテゴリ</th>
				<th nowrap="nowrap">削除</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($monies as $key => $money):?>
			<tr>
				<td class="tCenter"><?php echo $html->link("編集" , array("action" => "edit" , $money["Money"]["id"]) , array("class" => "btn"))?></td>
				<td class="tCenter">
					<?php echo $form->checkbox("Money." . $key . ".public" , array("checked" => (!empty($money["Money"]["public"]))))?>
					<?php echo $form->hidden("Money." . $key . ".id" , array("value" => $money["Money"]["id"]))?>
				</td>
				<td class="tCenter">
					<?php echo $form->checkbox("Money." . $key . ".ad_use" , array("checked" => (!empty($money["Money"]["ad_use"]))))?>
				</td>
				<td class="tRight"><?php echo $money["Money"]["id"]?></td>
				<td class="title" nowrap="nowrap"><?php echo $money["Money"]["title"]?></td>
				<td><?php echo $money["Money"]["url_str"]?></td>
				<td class="categories"><?php echo $money["Moneycategory"]["str"]?></td>
				<td class="tCenter"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("action" => "delete" , $money["Money"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $money["Money"]["id"] . " を削除しますか?")?></td>
			</tr>
	<?php endforeach;?>
		</tbody>
	</table>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>