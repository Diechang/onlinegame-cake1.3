<?php
//contact
$html->css(array('pages'), 'stylesheet', array('inline' => false));
?>
<?php echo $session->flash()?>
<?php echo $this->element("form_letter")?>
<?php echo $this->Gads->ads468()?>