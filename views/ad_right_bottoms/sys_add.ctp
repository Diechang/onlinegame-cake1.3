<div class="adRightBottoms form">
<?php echo $this->Form->create('AdRightBottom');?>
	<fieldset>
		<legend><?php __('Sys Add Ad Right Bottom'); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('src');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ad Right Bottoms', true), array('action' => 'index'));?></li>
	</ul>
</div>