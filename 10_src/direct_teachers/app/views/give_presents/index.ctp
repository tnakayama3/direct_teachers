----Gold or Coin---- <br>
<?php echo $html->link('Gold', array('controller'=>'give_presents', 'action'=>'index','?' => array( 'type' => 1, 'girl_id'=>$girl_id),array(),'')); ?> <br>
<?php echo $html->link('Coin', array('controller'=>'give_presents', 'action'=>'index','?' => array( 'type' => 2, 'girl_id'=>$girl_id),array(),'')); ?> <br>

--Invntory List---

<?php 
	foreach($inventory_list as $inventory) {
		echo $inventory['id'];
		echo '<br>';
		echo $inventory['name'];
		echo '<br>';
		echo $inventory['effect'];
		echo '<br>';
		echo $inventory['description'];
		echo '<br>';
		echo $html->link('贈る', array('controller'=>'give_presents', 'action'=>'confirm','?' => array( 'present_data_id' => $inventory['id'], 'girl_id'=>$girl_id),array(),''));
		echo '<br>';
	}
?>
