<div class="packages form">
<?php echo $this->Form->create('Package');?>
	<fieldset>
		<legend><?php __('Sys Add Package'); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('title_id');
		echo $this->Form->input('url');
		echo $this->Form->input('name');
		echo $this->Form->input('img_src');
		echo $this->Form->input('count_src');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Packages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Titles', true), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Title', true), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>