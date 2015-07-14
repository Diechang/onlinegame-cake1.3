<div class="pcshops view">
<h2><?php  __('Pcshop');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shop Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['shop_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url Str'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['url_str']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shop Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['shop_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad Use'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['ad_use']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ad Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pcshop['Pcshop']['ad_text']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Pcshop', true)), array('action' => 'edit', $pcshop['Pcshop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Pcshop', true)), array('action' => 'delete', $pcshop['Pcshop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pcshop['Pcshop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pcshops', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Pcshop', true)), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pcs', true)), array('controller' => 'pcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Pc', true)), array('controller' => 'pcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s', true), __('Pcs', true));?></h3>
	<?php if (!empty($pcshop['Pc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Public'); ?></th>
		<th><?php __('Title Id'); ?></th>
		<th><?php __('Pcshop Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Cpu'); ?></th>
		<th><?php __('Graphic'); ?></th>
		<th><?php __('Memory'); ?></th>
		<th><?php __('Hdd'); ?></th>
		<th><?php __('Drive'); ?></th>
		<th><?php __('Os'); ?></th>
		<th><?php __('Display'); ?></th>
		<th><?php __('Other'); ?></th>
		<th><?php __('Present'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Create'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pcshop['Pc'] as $pc):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $pc['id'];?></td>
			<td><?php echo $pc['public'];?></td>
			<td><?php echo $pc['title_id'];?></td>
			<td><?php echo $pc['pcshop_id'];?></td>
			<td><?php echo $pc['name'];?></td>
			<td><?php echo $pc['price'];?></td>
			<td><?php echo $pc['cpu'];?></td>
			<td><?php echo $pc['graphic'];?></td>
			<td><?php echo $pc['memory'];?></td>
			<td><?php echo $pc['hdd'];?></td>
			<td><?php echo $pc['drive'];?></td>
			<td><?php echo $pc['os'];?></td>
			<td><?php echo $pc['display'];?></td>
			<td><?php echo $pc['other'];?></td>
			<td><?php echo $pc['present'];?></td>
			<td><?php echo $pc['url'];?></td>
			<td><?php echo $pc['create'];?></td>
			<td><?php echo $pc['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pcs', 'action' => 'view', $pc['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pcs', 'action' => 'edit', $pc['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pcs', 'action' => 'delete', $pc['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Pc', true)), array('controller' => 'pcs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
