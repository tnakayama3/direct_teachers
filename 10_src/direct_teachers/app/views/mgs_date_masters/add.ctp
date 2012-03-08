<div class="mgsDateMasters form">
<?php echo $this->Form->create('MgsDateMaster');?>
	<fieldset>
		<legend><?php __('Add Mgs Date Master'); ?></legend>
	<?php
		echo $this->Form->input('stage_id');
		echo $this->Form->input('name');
		echo $this->Form->input('point_up_max');
		echo $this->Form->input('point_up_clear');
		echo $this->Form->input('exp_up');
		echo $this->Form->input('energy_spent');
		echo $this->Form->input('gold_spent');
		echo $this->Form->input('deleted');
		echo $this->Form->input('misc_flg1');
		echo $this->Form->input('misc_flg2');
		echo $this->Form->input('misc_flg3');
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

		<li><?php echo $this->Html->link(__('List Mgs Date Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>