<div class="adRightTops form">
<?php echo $this->Form->create('AdRightTop');?>
	<fieldset>
		<legend><?php __('Sys Add Ad Right Top'); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('src');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ad Right Tops', true), array('action' => 'index'));?></li>
	</ul>
</div>