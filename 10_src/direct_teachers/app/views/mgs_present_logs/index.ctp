<div class="mgsPresentLogs index">
	<h2><?php __('Mgs Present Logs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('from_user_id');?></th>
			<th><?php echo $this->Paginator->sort('to_user_id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('present_id');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg1');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg2');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg3');?></th>
			<th><?php echo $this->Paginator->sort('misc_data1');?></th>
			<th><?php echo $this->Paginator->sort('misc_data2');?></th>
			<th><?php echo $this->Paginator->sort('misc_data3');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mgsPresentLogs as $mgsPresentLog):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['from_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['to_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['item_id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['present_id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentLog['MgsPresentLog']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsPresentLog['MgsPresentLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsPresentLog['MgsPresentLog']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsPresentLog['MgsPresentLog']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsPresentLog['MgsPresentLog']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mgs Present Log', true), array('action' => 'add')); ?></li>
	</ul>
</div>