<h3><?php echo $html->link("タイトル新規登録" , array("action" => "add") , array("class" => "btn btn-success"))?></h3>
<?php echo $form->create("Title" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $form->text("w" , array("size" => 10 , "onfocus" => "this.select()"))?>
	<?php echo $form->select("category" , $categories , null , array("empty" => "-カテゴリ-"))?>
	<?php echo $form->select("service" , $services , null , array("empty" => "-サービス-"))?>
	<?php echo $form->submit("タイトル検索" , array("div" => false , "class" => "btn"))?>
<?php echo $form->end()?>
<?php echo $form->create("Title" , array("action" => "lump"))?>
	<h2>タイトル一覧</h2>
	<p id="results"></p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
	</div>
<?php echo $this->element("sys_list_titles" , array("titles" => $titles))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>