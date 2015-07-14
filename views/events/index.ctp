<?php
//スタイル
$html->css(array('event'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "イベント・キャンペーン情報一覧 " . $this->params["page"] . "ページ目");
$this->set("keywords_for_layout" , "イベント,キャンペーン,オンラインゲーム");
$this->set("description_for_layout" , "イベント・キャンペーン情報一覧の" . $this->params["page"] . "ページ目です。");
$this->set("h1_for_layout" , "イベント・キャンペーン情報一覧" . $this->params["page"] . "ページ目");
$this->set("pankuz_for_layout" , "イベント・キャンペーン情報一覧" . $this->params["page"] . "ページ目");
?>
<div class="content events">
	<h2 class="headimage"><?php echo $html->image("design/headline_title_events.gif" , array("alt" => "イベント・キャンペーン情報一覧：期間限定イベントやお得なキャンペーン情報"))?></h2>
	<p class="icon_feed16"><?php echo $html->link("新着イベント・キャンペーン情報をRSSで！" , "http://feeds.feedburner.com/dz-game/events")?></p>
	<p><?php echo $paginator->counter(array("format" => "イベント・キャンペーン総数<span class=\"wBold\">%count%件中</span> %start%件目 ～ %end%件表示"))?></p>
	<p class="paging">
		<?php echo $paginator->prev("≪前へ")?>
		<?php echo $paginator->numbers()?>
		<?php echo $paginator->next("次へ≫")?>
	</p>
	<ul class="eventList">
<?php foreach($events as $event):?>
		<li>
			<h3 class="<?php echo $this->Common->checkTerm($event["Event"]["start"] , $event["Event"]["end"])?>"><?php echo $html->link($event["Event"]["name"] , array("controller" => "titles" , "action" => "event" , "path" => $event["Title"]["url_str"] , "eventid" => $event["Event"]["id"] , "ext" => "html"))?></h3>
			<div class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($event["Title"]["thumb_name"]),
					$this->Common->titleWithCase($event["Title"]["title_official"] , $event["Title"]["title_read"]),
					$event["Title"]["url_str"], 120 , "events")?>
			</div>
			<p class="text"><?php echo $event["Event"]["summary"]?></p>
			<p class="title">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleWithCase($event["Title"]["title_official"] , $event["Title"]["title_read"]) . "のイベント・キャンペーン情報一覧",
					$event["Title"]["url_str"] , "events")?>
			</p>
			<div class="footer">
				<table>
					<tr>
						<th>投稿日時</th>
						<td><?php echo $this->Common->termFormat($event["Event"]["start"] , $event["Event"]["end"])?></td>
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