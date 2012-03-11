<div class="payments form">
<?php echo $this->Form->create('Payment');?>
	<fieldset>
		<legend><?php __('Add Payment'); ?></legend>
	<?php
		echo $this->Form->input('fb_id');
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

		<li><?php echo $this->Html->link(__('List Payments', true), array('action' => 'index'));?></li>
	</ul>
</div>