<div class="votes index">
	<h2><?php __('Votes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('public');?></th>
			<th><?php echo $this->Paginator->sort('title_id');?></th>
			<th><?php echo $this->Paginator->sort('item1');?></th>
			<th><?php echo $this->Paginator->sort('item2');?></th>
			<th><?php echo $this->Paginator->sort('item3');?></th>
			<th><?php echo $this->Paginator->sort('item4');?></th>
			<th><?php echo $this->Paginator->sort('item5');?></th>
			<th><?php echo $this->Paginator->sort('item6');?></th>
			<th><?php echo $this->Paginator->sort('item7');?></th>
			<th><?php echo $this->Paginator->sort('item8');?></th>
			<th><?php echo $this->Paginator->sort('item9');?></th>
			<th><?php echo $this->Paginator->sort('item10');?></th>
			<th><?php echo $this->Paginator->sort('poster_name');?></th>
			<th><?php echo $this->Paginator->sort('review');?></th>
			<th><?php echo $this->Paginator->sort('ip');?></th>
			<th><?php echo $this->Paginator->sort('host');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($votes as $vote):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $vote['Vote']['id']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['public']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vote['Title']['title_official'], array('controller' => 'titles', 'action' => 'view', $vote['Title']['id'])); ?>
		</td>
		<td><?php echo $vote['Vote']['item1']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item2']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item3']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item4']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item5']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item6']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item7']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item8']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item9']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['item10']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['poster_name']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['review']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['ip']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['host']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['created']; ?>&nbsp;</td>
		<td><?php echo $vote['Vote']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $vote['Vote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $vote['Vote']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $vote['Vote']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $vote['Vote']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Vote', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Titles', true)), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Title', true)), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>