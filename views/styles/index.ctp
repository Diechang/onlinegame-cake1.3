<?php
//スタイル
$html->css(array('list'), 'stylesheet', array('inline' => false));
$html->script(array('lc'), array('inline' => false));

$this->set("title_for_layout" , $this->Common->titleWithCase($pageData["Style"]["str"] , $pageData["Style"]["str_sub"]));
$this->set("keywords_for_layout" , $pageData["Style"]["str"] .((!empty($pageData["Style"]["str_sub"])) ? "," . $pageData["Style"]["str_sub"] : "") . ",オンラインゲーム");
$this->set("description_for_layout" , "【" . $this->Common->titleWithCase($pageData["Style"]["str"] , $pageData["Style"]["str_sub"]) . "】オンラインゲームの一覧です。同じスタイル・プレイ環境のオンラインゲームが探せます。");
$this->set("h1_for_layout" , "【" . $this->Common->titleWithCase($pageData["Style"]["str"] , $pageData["Style"]["str_sub"]) . "】オンラインゲーム一覧");
$this->set("pankuz_for_layout" , $pageData["Style"]["str"]);
?>

<?php
	if(!empty($pageData["Style"]["description"]))
	{
		echo $this->element('prop_summary' , array('pageData' => $pageData["Style"]));
	}
?>

<?php
	if(!empty($pickups))
	{
		echo $this->element('prop_pickups' , array('pickups' => $pickups , "mainStr" => $pageData["Style"]["str"]));
	}
?>

<div class="content titles">
	<h2>【<?php echo $pageData["Style"]["str"]?>】オンラインゲーム一覧</h2>
	<ul class="listChangeTabs">
		<li class="details"><a href="javascript:void(0)"><?php echo $html->image("design/list_tabs_details_normal.gif" , array("alt" => "詳細表示"))?></a></li>
		<li class="thumb"><a href="javascript:void(0)"><?php echo $html->image("design/list_tabs_thumb_normal.gif" , array("alt" => "画像表示"))?></a></li>
	</ul>
	<!--<ul id="titlesList" class="thumbList clearfix">-->
	<ul id="titlesList" class="detailsList clearfix">
<?php echo $this->element('loop_general_data' , array("titles" => $titles))?>
	</ul>
	<ul class="listChangeTabs">
		<li class="details"><a href="javascript:void(0)"><?php echo $html->image("design/list_tabs_details_normal.gif" , array("alt" => "詳細表示"))?></a></li>
		<li class="thumb"><a href="javascript:void(0)"><?php echo $html->image("design/list_tabs_thumb_normal.gif" , array("alt" => "画像表示"))?></a></li>
	</ul>
<?php echo $this->Gads->ads468()?>
</div>
