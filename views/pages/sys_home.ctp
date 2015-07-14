<!-- Titles -->
<h3>
	<?php echo $html->link("タイトル新規登録" , array("controller" => "titles" , "action" => "add") , array("class" => "btn btn-success"))?>
	<?php echo $form->create("Title" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
		<?php echo $form->text("w" , array("size" => 10))?>
		<?php echo $form->select("category", $categories , null , array("empty" => "-カテゴリ-"))?>
		<?php echo $form->select("service", $services , null , array("empty" => "-サービス-"))?>
		<?php echo $form->submit("タイトル検索" , array("div" => false , "class" => "btn"))?>
	<?php echo $form->end()?>
</h3>

<?php echo $form->create("Title" , array("controller" => "titles" , "action" => "lump"))?>
	<h2>タイトル10件 <?php echo $html->link("一覧" , array("controller" => "titles" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_titles" , array("titles" => $titles))?>
	<div class="controll"><input type="submit" value="タイトル一括修正" class="btn" /></div>
<?php echo $form->end()?>
<!--  -->
<?php
/* events
<!-- Events -->
<?php echo $form->create("Event" , array("controller" => "events" , "action" => "lump"))?>
	<h2>イベント10件 <?php echo $html->link("一覧" , array("controller" => "events" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_events" , array("events" => $events , "changer" => false))?>
	<div class="controll"><input type="submit" value="イベント一括修正" class="btn" /></div>
<?php echo $form->end()?>
*/
?>
<!-- Votes -->
<?php echo $form->create("Vote" , array("controller" => "votes" , "action" => "lump"))?>
	<h2>投稿10件 <?php echo $html->link("一覧" , array("controller" => "votes" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_votes" , array("votes" => $votes , "changer" => false))?>
	<div class="controll"><input type="submit" value="投稿一括修正" class="btn" /></div>
<?php echo $form->end()?>
<!--  -->
<!-- Fansites -->
<?php echo $form->create("Fansite" , array("controller" => "fansites" , "action" => "lump"))?>
	<h2>ファンサイト10件 <?php echo $html->link("一覧" , array("controller" => "fansites" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_fansites" , array("fansites" => $fansites , "changer" => false))?>
	<div class="controll"><input type="submit" value="ファンサイト一括修正" class="btn" /></div>
<?php echo $form->end()?>
<!--  -->
<!-- Packages -->
<?php echo $form->create("Package" , array("controller" => "packages" , "action" => "lump"))?>
	<h2>パッケージ10件 <?php echo $html->link("一覧" , array("controller" => "packages" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_packages" , array("packages" => $packages , "changer" => false))?>
	<div class="controll"><input type="submit" value="パッケージ一括修正" class="btn" /></div>
<?php echo $form->end()?>
<!--  -->
<!-- Pcs -->
<?php echo $form->create("Pc" , array("controller" => "pcs" , "action" => "lump"))?>
	<h2>PC10件 <?php echo $html->link("一覧" , array("controller" => "pcs" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_pcs" , array("pcs" => $pcs , "changer" => false))?>
	<div class="controll"><input type="submit" value="PC一括修正" class="btn" /></div>
<?php echo $form->end()?>
<!--  -->
<!-- Links -->
<?php echo $form->create("Link" , array("controller" => "links" , "action" => "lump"))?>
	<h2>相互リンク10件 <?php echo $html->link("一覧" , array("controller" => "links" , "action" => "index"))?></h2>
	<?php echo $this->element("sys_list_links" , array("links" => $links))?>
	<div class="controll"><input type="submit" value="相互リンク一括修正" class="btn" /></div>
<?php echo $form->end()?>