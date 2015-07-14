<?php
$html->css(array('pages'), 'stylesheet', array('inline' => false));
//
$this->set("title_for_layout" , "お問合せ");
$this->set("keywords_for_layout" , "お問合せ");
$this->set("description_for_layout" , "オンラインゲームライフへのお問い合わせはこちらからお願いします。");
$this->set("h1_for_layout" , "お問合せ");
$this->set("pankuz_for_layout" , "お問合せ");
?>
<?php echo $this->element("form_letter")?>
<?php echo $this->Gads->ads468()?>