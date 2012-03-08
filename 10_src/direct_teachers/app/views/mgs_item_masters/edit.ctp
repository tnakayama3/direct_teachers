<div class="mgsItemMasters form">
<?php echo $this->Form->create('MgsItemMaster');?>
	<fieldset>
		<legend><?php __('Edit Mgs Item Master'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('category');
		echo $this->Form->input('type');
		echo $this->Form->input('price');
		echo $this->Form->input('effect');
		echo $this->Form->input('durability');
		echo $this->Form->input('deleted');
		echo $this->Form->input('stage_id_from');
		echo $this->Form->input('stage_id_to');
		echo $this->Form->input('misc_flg1');
		echo $this->Form->input('misc_flg2');
		echo $this->Form->input('misc_data1');
		echo $this->Form->input('misc_data2');
		echo $this->Form->input('misc_data3');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MgsItemMaster.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MgsItemMaster.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mgs Item Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>