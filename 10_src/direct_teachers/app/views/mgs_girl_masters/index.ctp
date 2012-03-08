<div class="mgsGirlMasters index">
	<h2><?php __('Mgs Girl Masters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('stage_id');?></th>
			<th><?php echo $this->Paginator->sort('princess_flg');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('required_point');?></th>
			<th><?php echo $this->Paginator->sort('favorite_item_id1');?></th>
			<th><?php echo $this->Paginator->sort('favorite_item_id2');?></th>
			<th><?php echo $this->Paginator->sort('favorite_item_id3');?></th>
			<th><?php echo $this->Paginator->sort('favorite_item_id4');?></th>
			<th><?php echo $this->Paginator->sort('favorite_item_id5');?></th>
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
	foreach ($mgsGirlMasters as $mgsGirlMaster):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['stage_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['princess_flg']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['name']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['type']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['required_point']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['favorite_item_id1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['favorite_item_id2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['favorite_item_id3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['favorite_item_id4']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['favorite_item_id5']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['deleted']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlMaster['MgsGirlMaster']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsGirlMaster['MgsGirlMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsGirlMaster['MgsGirlMaster']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsGirlMaster['MgsGirlMaster']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsGirlMaster['MgsGirlMaster']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Girl Master', true), array('action' => 'add')); ?></li>
	</ul>
</div>