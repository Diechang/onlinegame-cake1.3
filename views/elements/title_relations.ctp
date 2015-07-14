<?php if(!empty($relations)):?>
<!--Relation-->
<div class="content relations">
	<h2><?php echo $html->image("design/titles_relations_title.gif" , array("alt" => "このゲームのユーザーにおすすめ"))?></h2>
	<p class="description"><?php echo $title["Title"]["title_official"]?>のユーザーにはこちらのゲームがおすすめ</p>
	<div class="body">
		<ul>
	<?php foreach($relations as $relation):?>
			<li>
				<div class="top">
					<div class="bottom clearfix">
						<h3>
							<?php echo $this->Common->titleLinkText(
							$this->Common->titleWithSpan($relation["Title"]["title_official"] , $relation["Title"]["title_read"]),
							$relation["Title"]["url_str"])?>
						</h3>
						<div class="thumb">
							<?php echo $this->Common->titleLinkThumb(
								$this->Common->thumbName($relation["Title"]["thumb_name"]),
								$this->Common->titleWithCase($relation["Title"]["title_official"] , $relation["Title"]["title_read"]),
								$relation["Title"]["url_str"] , 100)?>
						</div>
						<div class="data">
							<table>
								<tr>
									<th>総合評価</th>
									<td><?php echo $this->Common->pointFormat($relation["Titlesummary"]["vote_avg_all"])?>点</td>
									<th>面白さ</th>
									<td><?php echo $this->Common->pointFormat($relation["Titlesummary"]["vote_avg_item1"])?>点</td>
								</tr>
								<tr>
									<th>レビュー</th>
									<td><?php echo $this->Common->titleLinkText($relation["Titlesummary"]["vote_count_review"] . "件" , $relation["Title"]["url_str"] , "review")?></td>
									<th>評価投稿</th>
									<td><?php echo $this->Common->titleLinkText($relation["Titlesummary"]["vote_count_vote"] . "件" , $relation["Title"]["url_str"] , "review")?></td>
								</tr>
							</table>
						</div>
<?php /** 公式サイト
						<p class="icon_official"><?php echo $this->Common->officialLinkText($relation["Title"]["title_official"] , $relation["Title"]["ad_use"] , $relation["Title"]["ad_text"] , $relation["Title"]["official_url"])?></p>
**/?>
					</div>
				</div>
			</li>
	<?php endforeach;?>
		</ul>
	</div>
</div>
<?php endif;?>
