<?php
//スタイル
$html->css(array('review'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "オンラインゲームレビュー一覧 " . $this->params["page"] . "ページ目");
$this->set("keywords_for_layout" , "レビュー,評価,オンラインゲーム");
$this->set("description_for_layout" , "当サイトに投稿されたオンラインゲームレビュー一覧の" . $this->params["page"] . "ページ目です。");
$this->set("h1_for_layout" , "オンラインゲームレビュー一覧" . $this->params["page"] . "ページ目");
$this->set("pankuz_for_layout" , "レビュー一覧" . $this->params["page"] . "ページ目");
?>
<div class="content review">
	<h2 class="headimage"><?php echo $html->image("design/headline_title_reviews.gif" , array("alt" => "レビュー投稿一覧：プレイヤーのみなさんの声を参考に"))?></h2>
	<p class="icon_feed16"><?php echo $html->link("新着レビューをRSSで！" , "http://feeds.feedburner.com/dz-game/review")?></p>
	<p><?php echo $paginator->counter(array("format" => "レビュー総数<span class=\"wBold\">%count%件中</span> %start%件目 ～ %end%件表示"))?></p>
	<p class="paging">
		<?php echo $paginator->prev("≪前へ")?>
		<?php echo $paginator->numbers()?>
		<?php echo $paginator->next("次へ≫")?>
	</p>
	<ul class="reviewList">
<?php foreach($reviews as $review):?>
		<li>
			<h3><?php echo $html->link($this->Common->voteTitle($review["Vote"]) , array("controller" => "titles" , "action" => "single" , "path" => $review["Title"]["url_str"] , "voteid" => $review["Vote"]["id"] , "ext" => "html"))?></h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($review["Title"]["thumb_name"]),
					$this->Common->titleWithCase($review["Title"]["title_official"] , $review["Title"]["title_read"]),
					$review["Title"]["url_str"], 120 , "review")?>
			</div>
			<p class="text"><?php echo mb_strimwidth(h($review["Vote"]["review"]), 0, 250, " … " . $this->Common->titleLinkText("続き" , $review["Title"]["url_str"] , "review" , "v".$review["Vote"]["id"]), "UTF-8")?></p>
			<p class="title">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleWithCase($review["Title"]["title_official"] , $review["Title"]["title_read"]) . "のレビュー一覧",
					$review["Title"]["url_str"] , "review")?>
			</p>
			<div class="footer">
				<table class="voteData">
					<tr>
						<th class="total">総合評価</th>
						<td class="total"><?php echo $this->Common->pointFormat($review["Vote"]["single_avg"])?>点</td>
						<th>投稿日時</th>
						<td><?php echo $this->Common->dateFormat($review["Vote"]["created"])?></td>
						<?php if(!empty($review["Vote"]["pass"])):?>
						<td><?php echo $html->link("編集" , array("controller" => "votes" , "action" => "edit" , $review["Vote"]["id"]) , array("rel" => "nofollow"))?></td>
						<?php endif;?>
					</tr>
				</table>
			</div>
		</li>
<?php endforeach;?>
	</ul>
	<p class="paging">
		<?php echo $paginator->prev("≪前の10件" , null , null , "li")?>
		<?php echo $paginator->numbers()?>
		<?php echo $paginator->next("次の10件≫" , null , null , "li")?>
	</p>
<?php echo $this->Gads->ads468()?>
</div>