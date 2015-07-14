<div class="styles view">
<h2><?php  __('Style');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $style['Style']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Str'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $style['Style']['str']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $style['Style']['path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $style['Style']['sort']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Style', true)), array('action' => 'edit', $style['Style']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Style', true)), array('action' => 'delete', $style['Style']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $style['Style']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Styles', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Style', true)), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Titles', true)), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s', true), __('Titles', true));?></h3>
	<?php if (!empty($style['Title'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Public'); ?></th>
		<th><?php __('Title Official'); ?></th>
		<th><?php __('Title Read'); ?></th>
		<th><?php __('Title Sub'); ?></th>
		<th><?php __('Title Abbr'); ?></th>
		<th><?php __('Url Str'); ?></th>
		<th><?php __('Thumb Image'); ?></th>
		<th><?php __('Thumb Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Service Id'); ?></th>
		<th><?php __('Service Start'); ?></th>
		<th><?php __('Test Start'); ?></th>
		<th><?php __('Test End'); ?></th>
		<th><?php __('Category Text'); ?></th>
		<th><?php __('Fee Id'); ?></th>
		<th><?php __('Fee Text'); ?></th>
		<th><?php __('Ad Use'); ?></th>
		<th><?php __('Ad Text'); ?></th>
		<th><?php __('Ad Banner S'); ?></th>
		<th><?php __('Ad Banner M'); ?></th>
		<th><?php __('Ad Banner L'); ?></th>
		<th><?php __('Official Url'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($style['Title'] as $title):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $title['id'];?></td>
			<td><?php echo $title['public'];?></td>
			<td><?php echo $title['title_official'];?></td>
			<td><?php echo $title['title_read'];?></td>
			<td><?php echo $title['title_sub'];?></td>
			<td><?php echo $title['title_abbr'];?></td>
			<td><?php echo $title['url_str'];?></td>
			<td><?php echo $title['thumb_image'];?></td>
			<td><?php echo $title['thumb_name'];?></td>
			<td><?php echo $title['description'];?></td>
			<td><?php echo $title['service_id'];?></td>
			<td><?php echo $title['service_start'];?></td>
			<td><?php echo $title['test_start'];?></td>
			<td><?php echo $title['test_end'];?></td>
			<td><?php echo $title['category_text'];?></td>
			<td><?php echo $title['fee_id'];?></td>
			<td><?php echo $title['fee_text'];?></td>
			<td><?php echo $title['ad_use'];?></td>
			<td><?php echo $title['ad_text'];?></td>
			<td><?php echo $title['ad_banner_s'];?></td>
			<td><?php echo $title['ad_banner_m'];?></td>
			<td><?php echo $title['ad_banner_l'];?></td>
			<td><?php echo $title['official_url'];?></td>
			<td><?php echo $title['created'];?></td>
			<td><?php echo $title['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'titles', 'action' => 'view', $title['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'titles', 'action' => 'edit', $title['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'titles', 'action' => 'delete', $title['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $title['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
