<div class="mgsGirlsPresents form">
<?php echo $this->Form->create('MgsGirlsPresent');?>
	<fieldset>
		<legend><?php __('Add Mgs Girls Present'); ?></legend>
	<?php
		echo $this->Form->input('girl_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('present_id');
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

		<li><?php echo $this->Html->link(__('List Mgs Girls Presents', true), array('action' => 'index'));?></li>
	</ul>
</div>