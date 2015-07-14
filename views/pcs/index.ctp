<?php
//スタイル
$html->css(array('pcs'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "オンラインゲーム用PC（パソコン）");
$this->set("keywords_for_layout" , "オンラインゲーム,PC,パソコン,推奨,BTO");
$this->set("description_for_layout" , "オンラインゲーム用PC（パソコン）についてのページです。ゲームに特化したBTOパソコンで快適にプレイを楽しみたい方は参考にどうぞ。");
$this->set("h1_for_layout" , "オンラインゲーム用PC");
$this->set("pankuz_for_layout" , "オンラインゲーム用PC");
?>
<div class="content titles">
	<h2 class="headimage"><?php echo $html->image("design/headline_title_pcs.gif" , array("alt" => "オンラインゲーム用PCを探す：ゲームに特化したPCで快適プレイ！"))?></h2>
	<p>派手な演出や、美しいグラフィックスが楽しめる3Dオンラインゲームなどでは、BTOパソコンショップなどからそれぞれのゲームの動作スペックを満たす推奨PCが販売されています。中にはPCを買うことで特典としてゲーム内アイテムや、非売品グッズがもらえるショップもありますので、ゲームをより楽しみたい方はオンラインゲーム用PCを一度チェックしてみてください。</p>
	<p class="tCenter">
		<?php echo $this->Gads->both468()?>
	</p>
	<h3>ゲーム別推奨PCを探す</h3>
	<table>
<?php foreach($titles as $title):?>
		<tr>
			<td rowspan="3" class="thumb">
				<?php echo $this->Common->titleLinkThumb(
					$this->Common->thumbName($title["Title"]["thumb_name"]),
					$this->Common->titleWithCase($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"], 120 , "pc")?>
			</td>
			<th colspan="3" class="head">
				<?php echo $this->Common->titleLinkText(
					$this->Common->titleWithSpan($title["Title"]["title_official"] , $title["Title"]["title_read"]),
					$title["Title"]["url_str"] , "pc")?>
			</th>
		</tr>
		<tr>
			<th class="<?php echo $this->Common->addClassZero($title["desktopCount"] , "desktop")?>">デスクトップPC</th>
			<td class="<?php echo $this->Common->addClassZero($title["desktopCount"])?>"><?php echo $title["desktopCount"]?>件</td>
			<td rowspan="2" class="price">価格：<span><?php echo number_format($title["lowestPrice"])?>円～</span></td>
		</tr>
		<tr>
			<th class="<?php echo $this->Common->addClassZero($title["noteCount"] , "note")?>">ノートPC</th>
			<td class="<?php echo $this->Common->addClassZero($title["noteCount"])?>"><?php echo $title["noteCount"]?>件</td>
		</tr>
<?php endforeach;?>
	</table>
</div>