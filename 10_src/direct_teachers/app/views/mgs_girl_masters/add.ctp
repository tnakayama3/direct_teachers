<div class="mgsGirlMasters form">
<?php echo $this->Form->create('MgsGirlMaster');?>
	<fieldset>
		<legend><?php __('Add Mgs Girl Master'); ?></legend>
	<?php
		echo $this->Form->input('stage_id');
		echo $this->Form->input('princess_flg');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('required_point');
		echo $this->Form->input('favorite_item_id1');
		echo $this->Form->input('favorite_item_id2');
		echo $this->Form->input('favorite_item_id3');
		echo $this->Form->input('favorite_item_id4');
		echo $this->Form->input('favorite_item_id5');
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

		<li><?php echo $this->Html->link(__('List Mgs Girl Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>