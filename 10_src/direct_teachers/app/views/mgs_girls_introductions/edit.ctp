<div class="mgsGirlsIntroductions form">
<?php echo $this->Form->create('MgsGirlsIntroduction');?>
	<fieldset>
		<legend><?php __('Edit Mgs Girls Introduction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('girl_id');
		echo $this->Form->input('from_user_id');
		echo $this->Form->input('to_user_id');
		echo $this->Form->input('result');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MgsGirlsIntroduction.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MgsGirlsIntroduction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mgs Girls Introductions', true), array('action' => 'index'));?></li>
	</ul>
</div>