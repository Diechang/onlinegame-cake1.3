<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Vote vars
$voteType		= (!empty($vote["Vote"]["review"]) ? "レビュー" : "評価");
$voteTitle		= (!empty($vote["Vote"]["title"])) ? "「" . h($vote["Vote"]["title"]) . "」 " : "【" . $this->Common->pointFormat($vote["Vote"]["single_avg"]) . "点】";
$posterName		= $this->Common->posterName($vote["Vote"]["poster_name"]);
$nameWithType	= $posterName . "の" . $voteType;
$postDate		= $this->Common->dateFormat($vote["Vote"]["created"] , "datetime");
//Set
$this->set("title_for_layout" , $voteTitle . $nameWithType . "(" . $postDate . ") | " . $titleWithStr["Abbr"]);
$this->set("keywords_for_layout" , $posterName . "," . $postDate . "," . $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , (!empty($vote["Vote"]["review"]) ? "" : "【" . $this->Common->pointFormat($vote["Vote"]["single_avg"]) . "点】") . $posterName . "が" . $titleWithStr["Case"] . "に投稿した" . $voteType . "です。投稿日：" . $postDate);
$this->set("h1_for_layout" , $voteTitle . $nameWithType . " " . $titleWithStr["Case"]);
$this->set("pankuz_for_layout" , array(
	array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")),
	(!empty($vote["Vote"]["review"]))
	? array("str" => "ユーザーレビュー" , "url" => array("action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html"))
	: array("str" => "評価点数" , "url" => array("action" => "rating" , "path" => $title["Title"]["url_str"] , "ext" => "html")),
	$nameWithType,
));
//OGP
$this->element("title_ogp" , array(
	"ogpTitle" => $this->viewVars["title_for_layout"],
	"ogpUrl" => $this->here,
	"ogpDescription" => (!empty($vote["Vote"]["review"])) ? mb_strimwidth($vote["Vote"]["review"], 0, 120, " …", "UTF-8") : $titleWithStr["Case"] . "の評価",
));
?>

<div<?php echo $this->RichSnippets->ns("Review")?>>

<?php echo $session->flash()?>

<div<?php echo $this->RichSnippets->property("itemreviewed")?>>
<?php echo $this->element("title_head_title")?>
</div>

<?php echo $this->element("title_head_menu")?>
<!--Single-->
<div class="content single">
	<h2<?php echo $this->RichSnippets->property("summary")?>><?php echo $this->Common->voteTitle($vote["Vote"])?></h2>
	<table class="data">
		<tr>
			<th><?php echo $html->image("design/icon_poster20.gif" , array("alt" => "投稿者"))?></th>
			<td<?php echo $this->RichSnippets->property("reviewer")?>><?php echo $this->Common->posterName($vote["Vote"]["poster_name"])?></td>
			<th><?php echo $html->image("design/icon_date20.gif" , array("alt" => "投稿日"))?></th>
			<td<?php echo $this->RichSnippets->property("dtreviewed")?><?php echo $this->RichSnippets->content($vote["Vote"]["created"])?>><?php echo $postDate?></td>
<?php if(!empty($vote["Vote"]["pass"])):?>
			<th><?php echo $html->image("design/icon_edit20.gif" , array("alt" => "編集"))?></th>
			<td><?php echo $html->link("編集" , array("controller" => "votes" , "action" => "edit" , $vote["Vote"]["id"]) , array("rel" => "nofollow"))?></td>
<?php endif;?>
		</tr>
	</table>
	<p class="review"<?php echo $this->RichSnippets->property("description")?>>
		<?php echo (!empty($vote["Vote"]["review"]) ? nl2br(h($vote["Vote"]["review"])) : "<span class=\"cGray9\">（評価点数のみ）</span>")?>
	</p>

	<?php echo (!empty($vote["Vote"]["review"]) ? '<p>' . $this->Gads->text336() . '</p>' : "")?>
	<div class="points">
		<div class="top">
			<table class="total">
				<tr>
					<th>総合評価</th>
					<td class="star">
						<?php echo $this->Common->starBlock(100 , $vote["Vote"]["single_avg"])?>
					</td>
					<td class="point"<?php echo $this->RichSnippets->property("rating")?>><?php echo $this->Common->pointFormat($vote["Vote"]["single_avg"])?></td>
				</tr>
			</table>
		</div>
		<div class="body">
			<table class="items">
				<tr>
<?php foreach($voteItems as $voteItem):?>
					<th title="<?php echo $voteItem["label"]?>"><?php echo $voteItem["abbr"]?></th>
<?php endforeach;?>
				</tr>
				<tr>
<?php foreach($voteItems as $key => $voteItem):?>
					<td><?php echo $vote["Vote"][$key]?></td>
<?php endforeach;?>
				</tr>
			</table>
		</div>
	</div>

<?php echo $this->element("title_share_single")?>

	<div class="officialLinkFrame">
		<p class="officialLink">
			<?php echo $this->Common->officialLinkText(
			$title["Title"]["title_official"],
			$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
		</p>
	</div>
<?php if(!empty($neighbors["prev"]) or !empty($neighbors["next"])):?>
	<div class="neighbors clearfix">
	<?php foreach($neighbors as $key => $neighbor):?>
		<?php $neighborStr = array("prev" => "前" , "next" => "次")?>
		<div class="neighbor <?php echo $key?>">
		<?php if(!empty($neighbor)):?>
			<h3><?php echo $html->image("design/titles_reviews_neighbor_" . $key . ".gif" , array("alt" => $neighborStr[$key] . "のレビュー"))?></h3>
			<div class="body">
				<h4 class="title"><?php echo $html->link($this->Common->voteTitle($neighbor["Vote"]) , array("path" => $title["Title"]["url_str"] , "voteid" => $neighbor["Vote"]["id"] , "ext" => "html"))?></h4>
				<table class="total">
					<tr>
						<th>評価</th>
						<td class="star">
							<?php echo $this->Common->starBlock(50 , $neighbor["Vote"]["single_avg"])?>
						</td>
						<td class="point"><?php echo $this->Common->pointFormat($neighbor["Vote"]["single_avg"])?></td>
					</tr>
				</table>
				<p class="review">
					<?php echo mb_strimwidth(h($neighbor["Vote"]["review"]), 0, 200, " … " . $html->link("続き" , array("path" => $title["Title"]["url_str"] , "voteid" => $neighbor["Vote"]["id"] , "ext" => "html")))?>
				</p>
				<table class="footer">
					<tr>
						<th><?php echo $html->image("design/icon_poster20.gif" , array("alt" => "投稿者"))?></th>
						<td><?php echo $this->Common->posterName($neighbor["Vote"]["poster_name"])?></td>
					</tr>
					<tr>
						<th><?php echo $html->image("design/icon_date20.gif" , array("alt" => "投稿日"))?></th>
						<td><?php echo $this->Common->dateFormat($neighbor["Vote"]["created"] , "datetime")?></td>
					</tr>
				</table>
			</div>
		<?php else:?>
			<?php echo $this->Gads->both250()?>
		<?php endif;?>
		</div>
	<?php endforeach;?>
	</div>
<?php endif;?>
</div>
</div>
<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr))?>

<?php //echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
