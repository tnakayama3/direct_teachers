<div class="mgsFriendDatas index">
	<h2><?php __('Mgs Friend Datas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('friend_user_id');?></th>
			<th><?php echo $this->Paginator->sort('canceled');?></th>
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
	foreach ($mgsFriendDatas as $mgsFriendData):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsFriendData['MgsFriendData']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['friend_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['canceled']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsFriendData['MgsFriendData']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsFriendData['MgsFriendData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsFriendData['MgsFriendData']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsFriendData['MgsFriendData']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsFriendData['MgsFriendData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Friend Data', true), array('action' => 'add')); ?></li>
	</ul>
</div>