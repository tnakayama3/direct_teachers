<div class="mgsGirlsPresents index">
	<h2><?php __('Mgs Girls Presents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('girl_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
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
	foreach ($mgsGirlsPresents as $mgsGirlsPresent):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['girl_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['present_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsPresent['MgsGirlsPresent']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsGirlsPresent['MgsGirlsPresent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsGirlsPresent['MgsGirlsPresent']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsGirlsPresent['MgsGirlsPresent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsGirlsPresent['MgsGirlsPresent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Girls Present', true), array('action' => 'add')); ?></li>
	</ul>
</div>