<div class="fansites index">
	<h2><?php __('Fansites');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('public');?></th>
			<th><?php echo $this->Paginator->sort('title_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('site_name');?></th>
			<th><?php echo $this->Paginator->sort('site_url');?></th>
			<th><?php echo $this->Paginator->sort('link_url');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fansites as $fansite):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $fansite['Fansite']['id']; ?>&nbsp;</td>
		<td><?php echo $fansite['Fansite']['public']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($fansite['Title']['title_official'], array('controller' => 'titles', 'action' => 'view', $fansite['Title']['id'])); ?>
		</td>
		<td><?php echo $fansite['Fansite']['type']; ?>&nbsp;</td>
		<td><?php echo $fansite['Fansite']['site_name']; ?>&nbsp;</td>
		<td><?php echo $fansite['Fansite']['site_url']; ?>&nbsp;</td>
		<td><?php echo $fansite['Fansite']['link_url']; ?>&nbsp;</td>
		<td><?php echo $fansite['Fansite']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $fansite['Fansite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $fansite['Fansite']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $fansite['Fansite']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fansite['Fansite']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Fansite', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Titles', true)), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>