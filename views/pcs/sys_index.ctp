<h3>
	<?php echo $html->link("PC新規登録" , array("action" => "add") , array("class" => "btn btn-success"))?>
	<?php
		if(isset($titleAddData))
		{
			echo $html->link($titleAddData["Title"]["title_official"] . "のPCを登録" , array("action" => "add" , "title_id" => $titleAddData["Title"]["id"]) , array("class" => "btn btn-success"));
		}
	?>
</h3>
<?php echo $form->create("Pc" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $form->text("w" , array("size" => 10 , "onfocus" => "this.select()"))?>
	<?php echo $form->select("title_id" , $titles)?>
	<?php echo $form->select("pcshop_id" , $pcshops)?><br />
	<?php echo $form->select("pctype_id" , $pctypes)?>
	<?php echo $form->select("pcgrade_id" , $pcgrades)?>
	<?php echo $form->submit("PC検索" , array("div" => false , "class" => "btn"))?>
<?php echo $form->end()?>

<?php echo $form->create("Pc" , array("action" => "lump"))?>
	<h2>PC一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
	<?php echo $this->element("sys_list_pcs" , array("pcs" => $pcs))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>