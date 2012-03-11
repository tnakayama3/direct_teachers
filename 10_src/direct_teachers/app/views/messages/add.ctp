<div class="messages form">
<?php echo $this->Form->create('Message');?>
	<fieldset>
		<legend><?php __('Add Message'); ?></legend>
	<?php
		echo $this->Form->input('from_id');
		echo $this->Form->input('to_id');
		echo $this->Form->input('message');
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

		<li><?php echo $this->Html->link(__('List Messages', true), array('action' => 'index'));?></li>
	</ul>
</div>