<table class="list table table-bordered table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">編集</th>
			<th nowrap="nowrap">公開</th>
			<th nowrap="nowrap">PU</th>
			<th nowrap="nowrap">ID</th>
			<th nowrap="nowrap">サイトURL</th>
			<th nowrap="nowrap">リンクURL</th>
			<th nowrap="nowrap">カテゴリ</th>
			<th nowrap="nowrap">管理者</th>
			<th nowrap="nowrap">登録日</th>
			<th nowrap="nowrap">削除</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($links as $key => $link):?>
		<tr>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("編集" , array("controller" => "links" , "action" => "edit" , $link["Link"]["id"]) , array("class" => "btn"))?></td>
			<td class="tCenter">
				<?php echo $form->checkbox("Link." . $key . ".public" , array("checked" => (!empty($link["Link"]["public"]))))?>
				<?php echo $form->hidden("Link." . $key . ".id" , array("value" => $link["Link"]["id"]))?>
			</td>
			<td class="tCenter">
				<?php echo $form->checkbox("Link." . $key . ".pickup" , array("checked" => (!empty($link["Link"]["pickup"]))))?>
			</td>
			<td class="tRight"><?php echo $link["Link"]["id"]?></td>
			<td class="title" nowrap="nowrap">
				<?php echo $link["Link"]["site_name"]?>
				<?php echo $this->Common->linkConf($link["Link"]["site_url"])?>
			</td>
			<td nowrap="nowrap"><?php echo $this->Common->linkConf($link["Link"]["link_url"])?></td>
			<td class="categories">"<?php echo $link["Linkcategory"]["path"]?>"</td>
			<td><?php echo $html->link($link["Link"]["admin_name"] , "mailto:" . $link["Link"]["admin_mail"])?></td>
			<td><?php echo $link["Link"]["created"]?></td>
			<td class="tCenter" nowrap="nowrap"><?php echo $html->link("<i class='icon-remove icon-white'></i> 削除" , array("controller" => "links" , "action" => "delete" , $link["Link"]["id"]) , array("class" => "btn btn-danger btn-small" , "escape" => false) , $link["Link"]["site_name"] . " を削除しますか?")?></td>
		</tr>
<?php endforeach;?>
	</tbody>
</table>