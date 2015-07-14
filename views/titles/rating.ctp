<?php
$html->css(array('titles'), 'stylesheet', array('inline' => false));
$html->script(array('tcc', 'rac'), false);
//Title vars
$titleWithStr["Case"]	= $this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Span"]	= $this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]);
$titleWithStr["Abbr"]	= $this->Common->titleWithAbbr($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"]);
$titleWithStr["Sub"]	= $this->Common->titleWithSub($title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_sub"]);
//Set
$this->set("title_for_layout" , $titleWithStr["Abbr"] . " 評価点数");
$this->set("keywords_for_layout" , $this->TitlePage->metaKeywords($this->params["action"] , $title["Title"]["title_official"] , $title["Title"]["title_read"] , $title["Title"]["title_abbr"] , $title["Title"]["title_sub"]));
$this->set("description_for_layout" , $titleWithStr["Sub"] . "の評価点数です。投票期間・項目別にプレイヤーの評価を見ることができるのでオンラインゲーム選びの参考にどうぞ！");
$this->set("h1_for_layout" , $titleWithStr["Abbr"] . " 評価点数");
$this->set("pankuz_for_layout" , array(array("str" => $titleWithStr["Case"] , "url" => array("action" => "index" , "path" => $title["Title"]["url_str"] , "ext" => "html")) , "評価点数"));
//OGP
$this->element("title_ogp" , array("titleWithStr" => $titleWithStr));
?>
<?php echo $session->flash()?>
<?php echo $this->element("title_head_title")?>

<?php echo $this->element("title_head_menu")?>

<!--Rating-->
<div class="content ratings">
	<h2><?php echo $html->image("design/titles_ratings_title.gif" , array("alt" => "ユーザーの評価"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のユーザー評価</p>
<?php if($ratings["all"]["ratings"]["vote_count_vote"] > 0):?>
	<ul class="termTabs tccTabs">
		<li class="all"><a href="javascript:void(0)"><?php echo $html->image("design/titles_ratings_termtab_all.gif" , array("alt" => "全期間"))?></a></li>
		<li class="year"><a href="javascript:void(0)"><?php echo $html->image("design/titles_ratings_termtab_1year.gif" , array("alt" => "過去1年"))?></a></li>
		<li class="days"><a href="javascript:void(0)"><?php echo $html->image("design/titles_ratings_termtab_90days.gif" , array("alt" => "過去90日"))?></a></li>
	</ul>
<?php endif;?>
	<div class="points tccContents">
<?php foreach($ratings as $key => $rating):?>
	<?php if($key == "all" or $ratings["all"]["ratings"]["vote_count_vote"] > 0):?>
		<div class="tccContent<?php echo ($key != "all") ? " dispNone" : ""?>">
			<div class="left">
				<div class="total">
					<div class="label"><?php echo $html->image("design/titles_ratings_total_label.gif" , array("alt" => "総合評価"))?></div>
					<p class="point"><?php echo (!empty($rating["ratings"]["vote_avg_all"])) ? $this->Common->pointFormat($rating["ratings"]["vote_avg_all"]) : "--"?><span>pt</span></p>
					<?php echo $this->Common->starBlock(200 , $rating["ratings"]["vote_avg_all"] , "総合評価")?>
				</div>
				<ul class="counts">
					<li class="reviewCount">：<?php echo $rating["ratings"]["vote_count_review"]?>件</li>
					<li class="ratingCount">：<?php echo $rating["ratings"]["vote_count_vote"]?>件</li>
				</ul>
			</div>
			<div class="right">
				<table class="itemStars">
		<?php foreach($rating["details"] as $detKey => $detail):?>
					<tr>
						<th><?php echo $detail["label"]?></th>
						<td>
							<?php echo $this->Common->starBlock(100 , $rating["ratings"]["vote_avg_" . $detKey] , $detail["label"])?>
						</td>
					</tr>
		<?php endforeach;?>
				</table>
			</div>
		</div>
	<?php endif;?>
<?php endforeach;?>
	</div>
	<p class="officialLink clBoth">
		<?php echo $this->Common->officialLinkText(
		$title["Title"]["title_official"],
		$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
	</p>
<?php if($ratings["all"]["ratings"]["vote_count_vote"] > 0):?>
	<div class="items tccContents">
	<?php foreach($ratings as $key => $rating):?>
		<?php if($key == "all" or $ratings["all"]["ratings"]["vote_count_vote"] > 0):?>
		<div class="tccContent<?php echo ($key != "all") ? " dispNone" : ""?>">
			<?php foreach($rating["details"] as $detail):?>
			<div class="itemChart">
				<h3><?php echo $detail["label"]?></h3>
				<div class="body">
					<table>
				<?php for($i = 5; $i > 0 ; $i--):?>
						<tr>
							<th>
								<?php echo $this->Common->starBlock(100 , $i , $i . "点評価")?>
							</th>
							<td><?php echo $detail[$i . "pt"]?>件</td>
						</tr>
				<?php endfor;?>
					</table>
				</div>
			</div>
			<?php endforeach;?>
			<p class="officialLink clBoth">
				<?php echo $this->Common->officialLinkText(
				$title["Title"]["title_official"],
				$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
			</p>
		</div>
		<?php endif;?>
	<?php endforeach;?>
	</div>
<?php endif;?>
</div>

<?php echo $this->element("form_vote" , array(
	"title"		=> $titleWithStr["Case"],
	"titleId"	=> $title["Title"]["id"],
	"votable"	=> $title["Title"]["votable"],
	"voteItems"	=> $voteItems,
))?>

<?php echo $this->element("title_details_rich_snippets" , array("titleWithStr" => $titleWithStr))?>

<?php echo $this->element("title_share")?>

<?php echo $this->element("title_relations" , array($relations))?>

<?php echo $this->Common->copyright($title["Title"]["copyright"])?>
