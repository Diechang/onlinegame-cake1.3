<div class="adRightTops view">
<h2><?php  __('Ad Right Top');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightTop['AdRightTop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightTop['AdRightTop']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Src'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightTop['AdRightTop']['src']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightTop['AdRightTop']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Right Top', true), array('action' => 'edit', $adRightTop['AdRightTop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Right Top', true), array('action' => 'delete', $adRightTop['AdRightTop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adRightTop['AdRightTop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Right Tops', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Right Top', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
