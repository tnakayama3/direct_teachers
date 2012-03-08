<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('mail_address');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('del_flg');?></th>
			<th><?php echo $this->Paginator->sort('ban_flg');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg1');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg2');?></th>
			<th><?php echo $this->Paginator->sort('misc_flg3');?></th>
			<th><?php echo $this->Paginator->sort('misc_data1');?></th>
			<th><?php echo $this->Paginator->sort('misc_data2');?></th>
			<th><?php echo $this->Paginator->sort('misc_data3');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('last_login_date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['mail_address']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['User']['del_flg']; ?>&nbsp;</td>
		<td><?php echo $user['User']['ban_flg']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $user['User']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['updated']; ?>&nbsp;</td>
		<td><?php echo $user['User']['last_login_date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
	</ul>
</div>