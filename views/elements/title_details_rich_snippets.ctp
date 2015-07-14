<?php if(!empty($title["Title"]["votable"])):?>
<!--Details-->
<div class="content details"<?php echo $this->RichSnippets->ns("Reviews")?>>
	<h2><?php echo $html->image("design/titles_details_title.gif" , array("alt" => "ゲーム紹介"))?></h2>
	<div class="body">
		<p class="title"<?php echo $this->RichSnippets->property("itemreviewed")?>>
			<?php echo $this->Common->officialLinkText(
			$titleWithStr["Span"],
			$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"] , true)?>
		</p>
		<div class="thumb">
			<?php echo $html->image($this->Common->thumbName($title["Title"]["thumb_name"]),
				array("width" => 160 , "alt" => $titleWithStr["Case"] , "rel" => $this->RichSnippets->rels["photo"]))?>
		</div>
		<div class="description"><?php echo $title["Title"]["description"]?></div>
		<table class="properties">
			<tr>
				<th><?php echo $html->image("design/icon_fee.gif" , array("alt" => "料金"))?></th>
				<td><?php echo $this->Common->feeData($title["Title"]["fee_text"] , $title["Title"]["fee_id"] , $title["Fee"]["str"] , $title["Title"]["service_id"] , $title["Service"]["str"])?></td>
			</tr>
			<tr>
				<th><?php echo $html->image("design/icon_genre.gif" , array("alt" => "ジャンル"))?></th>
				<td>
					<?php echo $this->Common->categoriesLink($title["Category"])?>
				</td>
			</tr>
			<tr>
				<th><?php echo $html->image("design/icon_style.gif" , array("alt" => "スタイル"))?></th>
				<td>
					<?php echo $this->Common->stylesLink($title["Style"])?>
				</td>
			</tr>
<?php if($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
			<tr>
				<th><?php echo $html->image("design/icon_" . $title["Service"]["path"] . ".gif" , array("alt" => $title["Service"]["str"]))?></th>
				<td><?php echo $this->Common->termFormat($title["Title"]["test_start"] , $title["Title"]["test_end"])?></td>
			</tr>
<?php endif;?>
<?php if($title["Title"]["votable"]):?>
			<tr>
				<th><?php echo $html->image("design/icon_rating_total.gif" , array("alt" => "総合評価"))?></th>
				<td>
					<span class="point cRed"<?php echo $this->RichSnippets->property("rating")?>><?php echo $this->Common->pointFormat($title["Titlesummary"]["vote_avg_all"] , " -- ")?>点</span>
					/ <a href="<?php echo $html->url(array("action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>">レビュー：<span<?php echo $this->RichSnippets->property("count")?>><?php echo $this->Common->countFormat($title["Titlesummary"]["vote_count_review"])?></span>件</a>
					/ <a href="<?php echo $html->url(array("action" => "rating" , "path" => $title["Title"]["url_str"] , "ext" => "html"))?>">評価：<span<?php echo $this->RichSnippets->property("votes")?>><?php echo $this->Common->countFormat($title["Titlesummary"]["vote_count_vote"])?></span>件</a>
				</td>
			</tr>
<?php endif;?>
		</table>
<?php if($title["Title"]["votable"]):?>
		<ul class="buttons">
			<li class="votes"><a href="<?php echo $html->url(array("action" => "review" , "path" => $title["Title"]["url_str"] , "ext" => "html" , "#" => "voteform"))?>"><?php echo $html->image("design/titles_details_button_votes.gif" , array("alt" => "評価・レビューを投稿"))?></a></li>
			<li class="links"><a href="<?php echo $html->url(array("controller" => "fansites" , "action" => "add" , $title["Title"]["id"]))?>"><?php echo $html->image("design/titles_details_button_links.gif" , array("alt" => "攻略・ファンサイトを登録"))?></a></li>
		</ul>
<?php endif;?>
		<p class="officialLink">
			<?php echo $this->Common->officialLinkText(
			$title["Title"]["title_official"],
			$title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
		</p>
	</div>
</div>
<?php else:?>
<?php echo $this->element("title_details" , array("titleWithStr" => $titleWithStr)) //投稿不可時はリッチスニペットなし?>
<?php endif;?>