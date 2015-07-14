<h3>
	<?php echo $html->link("イベント新規登録" , array("action" => "add") , array("class" => "btn btn-success"))?>
	<?php
		if(isset($titleAddData))
		{
			echo $html->link($titleAddData["Title"]["title_official"] . "のイベントを登録" , array("action" => "add" , "title_id" => $titleAddData["Title"]["id"]) , array("class" => "btn btn-success"));
		}
	?>
</h3>
<?php echo $form->create("Event" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $form->text("w" , array("size" => 10 , "onfocus" => "this.select()"))?>
	<?php echo $form->select("title_id" , $titles)?>
	<?php echo $form->submit("イベント検索" , array("div" => false , "class" => "btn"))?>
<?php echo $form->end()?>

<?php echo $form->create("Event" , array("action" => "lump"))?>
	<h2>イベント一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
	</div>
	<?php echo $this->element("sys_list_events" , array("events" => $events))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>