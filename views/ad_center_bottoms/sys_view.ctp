<div class="adCenterBottoms view">
<h2><?php  __('Ad Center Bottom');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adCenterBottom['AdCenterBottom']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adCenterBottom['AdCenterBottom']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Src'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adCenterBottom['AdCenterBottom']['src']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adCenterBottom['AdCenterBottom']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ad Center Bottom', true), array('action' => 'edit', $adCenterBottom['AdCenterBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ad Center Bottom', true), array('action' => 'delete', $adCenterBottom['AdCenterBottom']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adCenterBottom['AdCenterBottom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Center Bottoms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad Center Bottom', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
