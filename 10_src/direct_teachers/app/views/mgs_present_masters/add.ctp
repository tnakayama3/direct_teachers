<div class="mgsPresentMasters form">
<?php echo $this->Form->create('MgsPresentMaster');?>
	<fieldset>
		<legend><?php __('Add Mgs Present Master'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('category');
		echo $this->Form->input('type');
		echo $this->Form->input('price');
		echo $this->Form->input('effect');
		echo $this->Form->input('deleted');
		echo $this->Form->input('stage_id_from');
		echo $this->Form->input('stage_id_to');
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

		<li><?php echo $this->Html->link(__('List Mgs Present Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>