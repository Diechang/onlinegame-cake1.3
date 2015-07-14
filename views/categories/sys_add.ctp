<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s', true), __('Category', true)); ?></legend>
	<?php
		echo $this->Form->input('str');
		echo $this->Form->input('path');
		echo $this->Form->input('sort');
		echo $this->Form->input('Title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Categories', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Titles', true)), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>