<?php if(!empty($votes)):?>
<div class="items">
	<?php foreach($votes as $vote):?>
	<div class="item">
		<?php $url = array("controller" => "titles" , "action" => "single" , "path" => $titlePath , "voteid" => $vote["Vote"]["id"] , "ext" => "html")?>
		<h3><?php echo $html->link($this->Common->voteTitle($vote["Vote"]) , $url, (empty($vote["Vote"]["review"]) ? array("rel" => "nofollow") : null))?></h3>
		<div class="body">
			<div class="total">
				<p class="label">総合評価</p>
				<p class="point"><?php echo $this->Common->pointFormat($vote["Vote"]["single_avg"])?><span>pt</span></p>
				<?php echo $this->Common->starBlock(100 , $vote["Vote"]["single_avg"])?>
			</div>
			<p class="text">
				<?php echo (!empty($vote["Vote"]["review"])
					? ($all)
						? nl2br(h($vote["Vote"]["review"]))
						: mb_strimwidth(h($vote["Vote"]["review"]), 0, 200, " … " . $html->link("続き" , array("action" => "single" , "path" => $titlePath , "voteid" => $vote["Vote"]["id"] , "ext" => "html")))
					: "<span class=\"cGray9\">（評価点数のみ）</span>")?>
			</p>
			<table class="footer">
				<tr>
					<th><?php echo $html->image("design/icon_poster20.gif" , array("alt" => "投稿者"))?></th>
					<td><?php echo $this->Common->posterName($vote["Vote"]["poster_name"])?></td>
					<th><?php echo $html->image("design/icon_date20.gif" , array("alt" => "投稿日"))?></th>
					<td><?php echo $this->Common->dateFormat($vote["Vote"]["created"] , "datetime")?></td>
				<?php if(!empty($vote["Vote"]["pass"])):?>
					<th><?php echo $html->image("design/icon_edit20.gif" , array("alt" => "編集"))?></th>
					<td><?php echo $html->link("編集" , array("controller" => "votes" , "action" => "edit" , $vote["Vote"]["id"]) , array("rel" => "nofollow"))?></td>
				<?php endif;?>
				</tr>
			</table>
		</div>
	</div>
	<?php endforeach;?>
</div>
<?php else:?>
<p class="noVotes">投稿がありません。<br />
プレイヤーの方はぜひ投稿をお願いします。</p>
<?php endif;?>