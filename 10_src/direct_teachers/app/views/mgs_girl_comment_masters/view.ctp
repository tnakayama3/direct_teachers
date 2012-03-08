<div class="mgsGirlCommentMasters view">
<h2><?php  __('Mgs Girl Comment Master');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Girl Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['girl_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Point From'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['point_from']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Point To'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['point_to']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['comment']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['deleted']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_flg1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_flg2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_flg3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_data1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_data2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['misc_data3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsGirlCommentMaster['MgsGirlCommentMaster']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mgs Girl Comment Master', true), array('action' => 'edit', $mgsGirlCommentMaster['MgsGirlCommentMaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mgs Girl Comment Master', true), array('action' => 'delete', $mgsGirlCommentMaster['MgsGirlCommentMaster']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsGirlCommentMaster['MgsGirlCommentMaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mgs Girl Comment Masters', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mgs Girl Comment Master', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
