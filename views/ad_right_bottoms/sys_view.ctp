<div class="adRightBottoms view">
<h2><?php  __('Ad Right Bottom');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightBottom['AdRightBottom']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightBottom['AdRightBottom']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Src'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightBottom['AdRightBottom']['src']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightBottom['AdRightBottom']['sort']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adRightBottom['AdRightBottom']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Right Bottom', true), array('action' => 'edit', $adRightBottom['AdRightBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Right Bottom', true), array('action' => 'delete', $adRightBottom['AdRightBottom']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adRightBottom['AdRightBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Right Bottoms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Right Bottom', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
