<div class="mgsFriendDatas form">
<?php echo $this->Form->create('MgsFriendData');?>
	<fieldset>
		<legend><?php __('Add Mgs Friend Data'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('friend_user_id');
		echo $this->Form->input('canceled');
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

		<li><?php echo $this->Html->link(__('List Mgs Friend Datas', true), array('action' => 'index'));?></li>
	</ul>
</div>