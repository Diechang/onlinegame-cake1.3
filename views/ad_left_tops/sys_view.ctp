<div class="adLeftTops view">
<h2><?php  __('Ad Left Top');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftTop['AdLeftTop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftTop['AdLeftTop']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Src'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftTop['AdLeftTop']['src']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($adLeftTop['Title']['title_official'], array('controller' => 'titles', 'action' => 'view', $adLeftTop['Title']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adLeftTop['AdLeftTop']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Left Top', true), array('action' => 'edit', $adLeftTop['AdLeftTop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Left Top', true), array('action' => 'delete', $adLeftTop['AdLeftTop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adLeftTop['AdLeftTop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Left Tops', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Left Top', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Titles', true), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Title', true), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>
