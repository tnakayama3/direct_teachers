<div class="mgsGirlsDatas form">
<?php echo $this->Form->create('MgsGirlsData');?>
	<fieldset>
		<legend><?php __('Edit Mgs Girls Data'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('girl_id');
		echo $this->Form->input('player_user_id');
		echo $this->Form->input('owner_user_id');
		echo $this->Form->input('current_date_id');
		echo $this->Form->input('current_date_percent');
		echo $this->Form->input('point');
		echo $this->Form->input('point_updated');
		echo $this->Form->input('fav_item_given_date');
		echo $this->Form->input('fav_item_given_id');
		echo $this->Form->input('guard_num');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MgsGirlsData.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MgsGirlsData.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mgs Girls Datas', true), array('action' => 'index'));?></li>
	</ul>
</div>