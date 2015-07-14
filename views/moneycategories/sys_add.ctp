<div class="moneycategories form">
<?php echo $this->Form->create('Moneycategory');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s', true), __('Moneycategory', true)); ?></legend>
	<?php
		echo $this->Form->input('str');
		echo $this->Form->input('path');
		echo $this->Form->input('summary');
		echo $this->Form->input('body');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Moneycategories', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Monies', true)), array('controller' => 'monies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Money', true)), array('controller' => 'monies', 'action' => 'add')); ?> </li>
	</ul>
</div>