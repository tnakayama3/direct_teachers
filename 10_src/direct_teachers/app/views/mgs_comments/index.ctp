<div class="mgsComments index">
	<h2><?php __('Mgs Comments');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('from_user_id');?></th>
			<th><?php echo $this->Paginator->sort('to_user_id');?></th>
			<th><?php echo $this->Paginator->sort('comment');?></th>
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
	foreach ($mgsComments as $mgsComment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsComment['MgsComment']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['from_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['to_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['comment']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['deleted']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsComment['MgsComment']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsComment['MgsComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsComment['MgsComment']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsComment['MgsComment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsComment['MgsComment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Comment', true), array('action' => 'add')); ?></li>
	</ul>
</div>