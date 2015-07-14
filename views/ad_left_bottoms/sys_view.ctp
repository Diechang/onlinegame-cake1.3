<div class="adLeftBottoms view">
<h2><?php  __('Ad Left Bottom');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftBottom['AdLeftBottom']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftBottom['AdLeftBottom']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Src'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftBottom['AdLeftBottom']['src']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftBottom['AdLeftBottom']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Left Bottom', true), array('action' => 'edit', $adLeftBottom['AdLeftBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Left Bottom', true), array('action' => 'delete', $adLeftBottom['AdLeftBottom']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adLeftBottom['AdLeftBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Left Bottoms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Left Bottom', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
