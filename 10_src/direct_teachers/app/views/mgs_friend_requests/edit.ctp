<div class="mgsFriendRequests form">
<?php echo $this->Form->create('MgsFriendRequest');?>
	<fieldset>
		<legend><?php __('Edit Mgs Friend Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MgsFriendRequest.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MgsFriendRequest.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mgs Friend Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>