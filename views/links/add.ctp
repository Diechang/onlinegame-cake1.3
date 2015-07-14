<?php
//スタイル
$html->css(array('links'), 'stylesheet', array('inline' => false));
?>
<?php echo $session->flash()?>
<?php echo $this->element("form_link")?>