<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap" title="No Redirect">NR</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">パッケージ名 / タイトル</th>
			<th nowrap="nowrap">画像</th>
			<th nowrap="nowrap">価格</th>
			<th nowrap="nowrap">登録日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($packages as $key => $package):?>
		<tr class="title_id_<?php echo $package["Package"]["title_id"]?>">
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("編集" , array("controller" => "packages" , "action" => "edit" , $package["Package"]["id"]) , array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $form->checkbox("Package." . $key . ".public" , array("checked" => (!empty($package["Package"]["public"]))))?>
				<?php echo $form->hidden("Package." . $key . ".id" , array("value" => $package["Package"]["id"]))?>
				<?php echo $form->hidden("Package." . $key . ".title_id" , array("value" => $package["Package"]["title_id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Package." . $key . ".ad_noredirect" , array("checked" => (!empty($package["Package"]["ad_noredirect"]))))?>
			</td>
			<td class="tRight"><?php echo $package["Package"]["id"]?></td>
			<td class="title" nowrap="nowrap" title="<?php echo $package["Package"]["ad_part_text"]?>">
				<?php echo mb_strimwidth($package["Package"]["ad_part_text"], 0, 60, "...", "UTF-8")?>
				<?php echo $html->link($package["Title"]["title_official"] , array("controller" => "packages" , "action" => "index" , "title_id" => $package["Package"]["title_id"]))?>
			</td>
			<td class="adImage">
				<?php echo (!empty($package["Package"]["ad_part_img_src"])) ? $html->image($package["Package"]["ad_part_img_src"]) : " "?>
			</td>
			<td nowrap="nowrap">¥ <?php echo number_format($package["Package"]["price"])?></td>
			<td><?php echo $package["Package"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "packages" , "action" => "delete" , $package["Package"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $package["Package"]["ad_part_text"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>