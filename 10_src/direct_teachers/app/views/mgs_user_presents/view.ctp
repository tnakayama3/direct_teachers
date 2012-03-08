<div class="mgsUserPresents view">
<h2><?php  __('Mgs User Present');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Present Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['present_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sent Flg'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['sent_flg']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_flg1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_flg2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Flg3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_flg3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_data1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_data2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Misc Data3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['misc_data3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mgsUserPresent['MgsUserPresent']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mgs User Present', true), array('action' => 'edit', $mgsUserPresent['MgsUserPresent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mgs User Present', true), array('action' => 'delete', $mgsUserPresent['MgsUserPresent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mgsUserPresent['MgsUserPresent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mgs User Presents', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mgs User Present', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
