<div class="mgsGirlsDatas index">
	<h2><?php __('Mgs Girls Datas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('girl_id');?></th>
			<th><?php echo $this->Paginator->sort('player_user_id');?></th>
			<th><?php echo $this->Paginator->sort('owner_user_id');?></th>
			<th><?php echo $this->Paginator->sort('current_date_id');?></th>
			<th><?php echo $this->Paginator->sort('current_date_percent');?></th>
			<th><?php echo $this->Paginator->sort('point');?></th>
			<th><?php echo $this->Paginator->sort('point_updated');?></th>
			<th><?php echo $this->Paginator->sort('fav_item_given_date');?></th>
			<th><?php echo $this->Paginator->sort('fav_item_given_id');?></th>
			<th><?php echo $this->Paginator->sort('guard_num');?></th>
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
	foreach ($mgsGirlsDatas as $mgsGirlsData):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['girl_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['player_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['owner_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['current_date_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['current_date_percent']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['point']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['point_updated']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['fav_item_given_date']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['fav_item_given_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['guard_num']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['deleted']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsData['MgsGirlsData']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsGirlsData['MgsGirlsData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsGirlsData['MgsGirlsData']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsGirlsData['MgsGirlsData']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsGirlsData['MgsGirlsData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Girls Data', true), array('action' => 'add')); ?></li>
	</ul>
</div>