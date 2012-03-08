<?php
	echo $present['id'];
	echo '<br>';
	echo $present['present_id'];
	echo '<br>';
	echo $present['name'];
	echo '<br>';
	echo $present['effect'];
	echo '<br>';
	echo $present['description'];
	echo '<br>';
	echo $html->link('贈る', array('controller'=>'give_presents', 'action'=>'finish','?' => array( 'present_data_id' => $present['id'], 'girl_id'=>$girl_id),array(),''));
?>
