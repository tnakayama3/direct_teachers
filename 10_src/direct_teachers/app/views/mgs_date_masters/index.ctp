<div class="mgsDateMasters index">
	<h2><?php __('Mgs Date Masters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('stage_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('point_up_max');?></th>
			<th><?php echo $this->Paginator->sort('point_up_clear');?></th>
			<th><?php echo $this->Paginator->sort('exp_up');?></th>
			<th><?php echo $this->Paginator->sort('energy_spent');?></th>
			<th><?php echo $this->Paginator->sort('gold_spent');?></th>
			<th><?php echo $this->Paginator->sort('deleted');?></th>
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
	foreach ($mgsDateMasters as $mgsDateMaster):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['stage_id']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['name']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['point_up_max']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['point_up_clear']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['exp_up']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['energy_spent']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['gold_spent']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['deleted']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsDateMaster['MgsDateMaster']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsDateMaster['MgsDateMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsDateMaster['MgsDateMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsDateMaster['MgsDateMaster']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsDateMaster['MgsDateMaster']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Date Master', true), array('action' => 'add')); ?></li>
	</ul>
</div>