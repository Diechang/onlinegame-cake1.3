<div class="specs index">
	<h2><?php __('Specs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title_id');?></th>
			<th><?php echo $this->Paginator->sort('caption');?></th>
			<th><?php echo $this->Paginator->sort('os_low');?></th>
			<th><?php echo $this->Paginator->sort('os_high');?></th>
			<th><?php echo $this->Paginator->sort('cpu_low');?></th>
			<th><?php echo $this->Paginator->sort('cpu_high');?></th>
			<th><?php echo $this->Paginator->sort('memory_low');?></th>
			<th><?php echo $this->Paginator->sort('memory_high');?></th>
			<th><?php echo $this->Paginator->sort('disc_low');?></th>
			<th><?php echo $this->Paginator->sort('disc_high');?></th>
			<th><?php echo $this->Paginator->sort('graphic_low');?></th>
			<th><?php echo $this->Paginator->sort('graphic_high');?></th>
			<th><?php echo $this->Paginator->sort('sound_low');?></th>
			<th><?php echo $this->Paginator->sort('sound_high');?></th>
			<th><?php echo $this->Paginator->sort('network_low');?></th>
			<th><?php echo $this->Paginator->sort('network_high');?></th>
			<th><?php echo $this->Paginator->sort('display_low');?></th>
			<th><?php echo $this->Paginator->sort('display_high');?></th>
			<th><?php echo $this->Paginator->sort('directx_low');?></th>
			<th><?php echo $this->Paginator->sort('directx_high');?></th>
			<th><?php echo $this->Paginator->sort('other_low');?></th>
			<th><?php echo $this->Paginator->sort('other_high');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($specs as $spec):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $spec['Spec']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($spec['Title']['title_official'], array('controller' => 'titles', 'action' => 'view', $spec['Title']['id'])); ?>
		</td>
		<td><?php echo $spec['Spec']['caption']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['os_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['os_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['cpu_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['cpu_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['memory_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['memory_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['disc_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['disc_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['graphic_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['graphic_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['sound_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['sound_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['network_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['network_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['display_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['display_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['directx_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['directx_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['other_low']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['other_high']; ?>&nbsp;</td>
		<td><?php echo $spec['Spec']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $spec['Spec']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $spec['Spec']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $spec['Spec']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $spec['Spec']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Spec', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Titles', true)), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>