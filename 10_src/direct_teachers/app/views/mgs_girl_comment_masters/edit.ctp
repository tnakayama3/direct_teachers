<div class="mgsGirlCommentMasters form">
<?php echo $this->Form->create('MgsGirlCommentMaster');?>
	<fieldset>
		<legend><?php __('Edit Mgs Girl Comment Master'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('girl_id');
		echo $this->Form->input('point_from');
		echo $this->Form->input('point_to');
		echo $this->Form->input('comment');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MgsGirlCommentMaster.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MgsGirlCommentMaster.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mgs Girl Comment Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>