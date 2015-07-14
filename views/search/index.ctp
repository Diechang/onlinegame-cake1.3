<?php
//スタイル
$html->css(array('search'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "オンラインゲーム検索");
$this->set("keywords_for_layout" , "検索,サーチ,オンラインゲーム");
$this->set("description_for_layout" , "オンラインゲーム検索フォームです。条件を設定して自分好みのオンラインゲームを探してください。");
$this->set("h1_for_layout" , "オンラインゲーム検索");
$this->set("pankuz_for_layout" , "オンラインゲーム検索");
?>

<?php echo $this->element("search_title_form")?>
<div class="tCenter"><?php echo $this->Gads->both468()?></div>