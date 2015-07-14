<?php $searchMst = $this->requestAction(array("controller" => "element_parts" , "action" => "search_title_form"))?>
<!-- Search -->
<div class="content search">
	<h2 class="image"><?php echo $html->image("design/content_search_title.gif", array("alt" => "オンラインゲーム検索：自分好みのオンラインゲームを探そう"))?></h2>
	<div class="body">
		<form name="SearchTitle" action="<?php echo $html->url(array("controller" => "search" , "action" => "result"))?>" method="get">
		<div class="frameWide">
			<h3><?php echo $html->image("design/content_search_title_keyword.gif" , array("alt" => "キーワード"))?></h3>
			<div class="body">
				<input type="text" name="keyword" value="<?php if(isset($this->params["url"]["keyword"])){echo h($this->params["url"]["keyword"]);}?>" class="text" />
			</div>
		</div>
		<div class="frameHalf flLeft">
			<h3><?php echo $html->image("design/content_search_title_genre.gif" , array("alt" => "ジャンル"))?></h3>
			<div class="body">
				<ul>
<?php foreach($searchMst["Categories"] as $mstCategory):?>
					<?php echo $this->SearchPage->checkList($mstCategory , "Category" , "categories")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="frameHalf flRight">
			<h3><?php echo $html->image("design/content_search_title_style.gif" , array("alt" => "スタイル・環境"))?></h3>
			<div class="body">
				<ul>
<?php foreach($searchMst["Styles"] as $mstStyle):?>
					<?php echo $this->SearchPage->checkList($mstStyle , "Style" , "styles")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="frameWide">
			<h3><?php echo $html->image("design/content_search_title_service.gif" , array("alt" => "サービス状態"))?></h3>
			<div class="body">
				<ul class="tile clearfix">
<?php foreach($searchMst["Services"] as $mstService):?>
					<?php echo $this->SearchPage->checkList($mstService , "Service" , "services")?>
<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="frameWide">
			<h3><?php echo $html->image("design/content_search_title_other.gif" , array("alt" => "ついでに"))?></h3>
			<div class="body">
				<ul>
					<?php echo $this->SearchPage->otherCheckList()?>
				</ul>
			</div>
		</div>
		<div class="frameWide">
			<h3><?php echo $html->image("design/content_search_title_order.gif" , array("alt" => "並び順"))?></h3>
			<div class="body">
				<ul>
					<?php echo $this->SearchPage->orderCheckList()?>
				</ul>
			</div>
		</div>
		<div class="buttons"><input type="submit" value="この条件で検索" class="button" /></div>
		</form>
	</div>
</div>