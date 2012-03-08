<div class="mgsPresentMasters index">
	<h2><?php __('Mgs Present Masters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('category');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('effect');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
			<th><?php echo $this->Paginator->sort('stage_id_from');?></th>
			<th><?php echo $this->Paginator->sort('stage_id_to');?></th>
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
	foreach ($mgsPresentMasters as $mgsPresentMaster):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['name']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['category']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['type']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['price']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['effect']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['deleted']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['stage_id_from']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['stage_id_to']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsPresentMaster['MgsPresentMaster']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsPresentMaster['MgsPresentMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsPresentMaster['MgsPresentMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsPresentMaster['MgsPresentMaster']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsPresentMaster['MgsPresentMaster']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Present Master', true), array('action' => 'add')); ?></li>
	</ul>
</div>