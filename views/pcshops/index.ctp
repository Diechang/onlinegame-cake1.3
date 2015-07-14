<div class="pcshops index">
	<h2><?php __('Pcshops');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('public');?></th>
			<th><?php echo $this->Paginator->sort('shop_name');?></th>
			<th><?php echo $this->Paginator->sort('url_str');?></th>
			<th><?php echo $this->Paginator->sort('shop_url');?></th>
			<th><?php echo $this->Paginator->sort('ad_use');?></th>
			<th><?php echo $this->Paginator->sort('ad_text');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pcshops as $pcshop):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pcshop['Pcshop']['id']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['public']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['shop_name']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['url_str']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['shop_url']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['ad_use']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['ad_text']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pcshop['Pcshop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pcshop['Pcshop']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pcshop['Pcshop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pcshop['Pcshop']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Pcshop', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pcs', true)), array('controller' => 'pcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Pc', true)), array('controller' => 'pcs', 'action' => 'add')); ?> </li>
	</ul>
</div>