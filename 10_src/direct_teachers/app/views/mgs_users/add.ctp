<div class="mgsUsers form">
<?php echo $this->Form->create('MgsUser');?>
	<fieldset>
		<legend><?php __('Add Mgs User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('last_login_date');
		echo $this->Form->input('exp');
		echo $this->Form->input('skill_remain');
		echo $this->Form->input('skill_cloth');
		echo $this->Form->input('skill_social');
		echo $this->Form->input('skill_health');
		echo $this->Form->input('power_cloth');
		echo $this->Form->input('power_social');
		echo $this->Form->input('power_health');
		echo $this->Form->input('stage_id');
		echo $this->Form->input('ban_flg');
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

		<li><?php echo $this->Html->link(__('List Mgs Users', true), array('action' => 'index'));?></li>
	</ul>
</div>