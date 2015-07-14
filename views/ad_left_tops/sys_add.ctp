<div class="adLeftTops form">
<?php echo $this->Form->create('AdLeftTop');?>
	<fieldset>
		<legend><?php __('Sys Add Ad Left Top'); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('src');
		echo $this->Form->input('title_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ad Left Tops', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Titles', true), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Title', true), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>