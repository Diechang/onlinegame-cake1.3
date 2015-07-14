<?php
	if(isset($this->passedArgs["title_id"]))	{ $url["title_id"]	= $this->passedArgs["title_id"]; }
	if(isset($this->passedArgs["w"]))			{ $url["w"]			= $this->passedArgs["w"]; }
	if(!empty($url))							{ $paginator->options(array('url' => $url)); }
?>
<?php echo $form->create("Vote" , array("action" => "index" , "type" => "get" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<?php echo $form->text("w" , array("size" => 10))?>
	<select name="title_id"  class="title">
		<option value="" selected="selected">すべて</option>
	<?php foreach($titlesCount as $title):?>
		<option value="<?php echo $title["Title"]["id"]?>"><?php echo $title["Title"]["title_official"]?>(<?php echo $title["Titlesummary"]["vote_count_vote"]?>)</option>
	<?php endforeach;?>
	</select>
	<?php echo $form->submit("検索" , array("div" => false , "class" => "btn"))?>
<?php echo $form->end()?>
<?php echo $form->create("Vote" , array("action" => "lump"))?>
	<h2>投稿一覧</h2>
	<p><?php echo $paginator->counter(array("format" => "<strong>%count%件中</strong> %start%件目 ～ %end%件表示"))?></p>
	<p class="paging">
		<?php echo $paginator->prev("≪前へ")?>
		<?php echo $paginator->numbers()?>
		<?php echo $paginator->next("次へ≫")?>
	</p>
	<div class="controll">
		<input type="submit" value="一括修正" class="btn" />
		<input type="text" id="word_searcher" />
	</div>
<?php echo $this->element("sys_list_votes" , array("votes" => $votes))?>
	<div class="controll"><input type="submit" value="一括修正" class="btn" /></div>
<?php echo $form->end()?>