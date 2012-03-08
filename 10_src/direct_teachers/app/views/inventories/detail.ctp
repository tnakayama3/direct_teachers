<?php
	if($category == 'training') {
		echo $inventory['id'];
		echo '<br>';
		echo $inventory['training_id'];
		echo '<br>';
		echo $inventory['name'];
		echo '<br>';
		echo $inventory['description'];
		echo '<br>';
		echo $inventory['effect'];
		echo '<br>';
		echo $inventory['use_remain'];
		echo '<br>';
		echo $inventory['use_num'];
		echo '<br>';
	} elseif($category == 'present') {
		echo $inventory['id'];
		echo '<br>';
		echo $inventory['present_id'];
		echo '<br>';
		echo $inventory['name'];
		echo '<br>';
		echo $inventory['effect'];
		echo '<br>';
		echo $inventory['description'];
		echo '<br>';
	} else {
		echo $inventory['id'];
		echo '<br>';
		echo $inventory['item_id'];
		echo '<br>';
		echo $inventory['name'];
		echo '<br>';
		echo $inventory['description'];
		echo '<br>';
	}
?>
