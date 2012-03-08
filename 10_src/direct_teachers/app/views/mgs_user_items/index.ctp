<div class="mgsUserItems index">
	<h2><?php __('Mgs User Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('use_remain');?></th>
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
	foreach ($mgsUserItems as $mgsUserItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsUserItem['MgsUserItem']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['item_id']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['use_remain']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsUserItem['MgsUserItem']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsUserItem['MgsUserItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsUserItem['MgsUserItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsUserItem['MgsUserItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsUserItem['MgsUserItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs User Item', true), array('action' => 'add')); ?></li>
	</ul>
</div>