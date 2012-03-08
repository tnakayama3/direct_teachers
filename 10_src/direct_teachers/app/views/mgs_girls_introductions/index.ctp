<div class="mgsGirlsIntroductions index">
	<h2><?php __('Mgs Girls Introductions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('girl_id');?></th>
			<th><?php echo $this->Paginator->sort('from_user_id');?></th>
			<th><?php echo $this->Paginator->sort('to_user_id');?></th>
			<th><?php echo $this->Paginator->sort('result');?></th>
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
	foreach ($mgsGirlsIntroductions as $mgsGirlsIntroduction):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['girl_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['from_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['to_user_id']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['result']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsGirlsIntroduction['MgsGirlsIntroduction']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsGirlsIntroduction['MgsGirlsIntroduction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsGirlsIntroduction['MgsGirlsIntroduction']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsGirlsIntroduction['MgsGirlsIntroduction']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsGirlsIntroduction['MgsGirlsIntroduction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs Girls Introduction', true), array('action' => 'add')); ?></li>
	</ul>
</div>