<div class="mgsUsers index">
	<h2><?php __('Mgs Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('last_login_date');?></th>
			<th><?php echo $this->Paginator->sort('exp');?></th>
			<th><?php echo $this->Paginator->sort('skill_remain');?></th>
			<th><?php echo $this->Paginator->sort('skill_cloth');?></th>
			<th><?php echo $this->Paginator->sort('skill_social');?></th>
			<th><?php echo $this->Paginator->sort('skill_health');?></th>
			<th><?php echo $this->Paginator->sort('power_cloth');?></th>
			<th><?php echo $this->Paginator->sort('power_social');?></th>
			<th><?php echo $this->Paginator->sort('power_health');?></th>
			<th><?php echo $this->Paginator->sort('stage_id');?></th>
			<th><?php echo $this->Paginator->sort('ban_flg');?></th>
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
	foreach ($mgsUsers as $mgsUser):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mgsUser['MgsUser']['id']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['name']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['last_login_date']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['exp']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['skill_remain']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['skill_cloth']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['skill_social']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['skill_health']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['power_cloth']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['power_social']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['power_health']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['stage_id']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['ban_flg']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_flg1']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_flg2']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_flg3']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_data1']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_data2']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['misc_data3']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['created']; ?>&nbsp;</td>
		<td><?php echo $mgsUser['MgsUser']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mgsUser['MgsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mgsUser['MgsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mgsUser['MgsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsUser['MgsUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mgs User', true), array('action' => 'add')); ?></li>
	</ul>
</div>