<?php $count = 0?>
<?php foreach($titles as $title):?>
	<?php $count++?>
	<?php if($count % 4 == 0):?>
		<li class="fourth">
	<?php else:?>
		<li>
	<?php endif;?>
			<h3><?php echo $this->Common->titleLinkText(
					$this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"])?></h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($title["Title"]["thumb_name"]),
					$this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"] , 120)?>
			</div>
			<div class="description"><?php echo $title["Title"]["description"]?></div>
			<table class="properties">
				<tr>
					<th><?php echo $html->image("design/icon_fee.gif" , array("alt" => "料金"))?></th>
					<td><?php echo $this->Common->feeData($title["Title"]["fee_text"] , $title["Title"]["fee_id"] , $title["Fee"]["str"] , $title["Title"]["service_id"] , $title["Service"]["str"])?></td>
					<th><?php echo $html->image("design/icon_genre.gif" , array("alt" => "ジャンル"))?></th>
					<td>
						<?php echo $this->Common->categoriesLink($title["Category"])?>
					</td>
				</tr>
			</table>
	<?php if($title["Service"]["id"] == 3 or $title["Service"]["id"] == 4):?>
			<table class="properties">
				<tr>
					<th><?php echo $html->image("design/icon_" . $title["Service"]["path"] . ".gif" , array("alt" => $title["Service"]["str"]))?></th>
					<td><?php echo $this->Common->termFormat($title["Title"]["test_start"] , $title["Title"]["test_end"])?></td>
				</tr>
			</table>
	<?php endif;?>
<?php /** 公式サイト
			<table class="properties">
				<tr>
					<th><?php echo $html->image("design/icon_official.gif" , array("alt" => "公式サイト"))?></th>
					<td class="official">
					<?php echo $this->Common->officialLinkText($title["Title"]["title_official"] , $title["Title"]["ad_use"] , $title["Title"]["ad_text"] , $title["Title"]["official_url"] , $title["Title"]["service_id"])?>
					</td>
				</tr>
			</table>
**/?>
		</li>
<?php endforeach;?>