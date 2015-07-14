<div class="adCenterBottoms form">
<?php echo $this->Form->create('AdCenterBottom');?>
	<fieldset>
		<legend><?php __('Sys Add Ad Center Bottom'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Ad Center Bottoms', true), array('action' => 'index'));?></li>
	</ul>
</div>