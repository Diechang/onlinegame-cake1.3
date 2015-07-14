<div class="updates form">
<?php echo $this->Form->create('Update');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s', true), __('Update', true)); ?></legend>
	<?php
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Updates', true)), array('action' => 'index'));?></li>
	</ul>
</div>