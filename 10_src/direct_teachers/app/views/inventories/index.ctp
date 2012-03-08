----Inventory Type---<br>
<?php	echo $html->link('Training', array('controller'=>'inventories', 'action'=>'index','?' => array( 'type' => 1, 'category'=>'training')),array(),''); ?> <br>
<?php	echo $html->link('Present', array('controller'=>'inventories', 'action'=>'index','?' => array( 'type' => 1, 'category'=>'present')),array(),''); ?><br>
<?php	echo $html->link('Item', array('controller'=>'inventories', 'action'=>'index','?' => array( 'type' => 1, 'category'=>'item')),array(),''); ?><br>

----Gold or Coin ----<br>
<?php	echo $html->link('Gold', array('controller'=>'inventories', 'action'=>'index','?' => array( 'type' => 1, 'category'=>$category)),array(),''); ?><br>
<?php	echo $html->link('Coin', array('controller'=>'inventories', 'action'=>'index','?' => array( 'type' => 2, 'category'=>$category)),array(),''); ?><br>
-----Inventory List----<br>
<?php 
	if($type == 'training') {
		foreach ($inventory_list as $inventory){
			echo $inventory['id'];
			echo '<br>';
			echo $inventory['name'];
			echo '<br>';
			echo $inventory['effect'];
			echo '<br>';
			echo $inventory['use_remain']/$inventory['use_num'];
			echo '<br>';
			echo $inventory['description'];
			echo '<br>';
			echo $html->link('詳細', array('controller'=>'inventories', 'action'=>'detail','?' => array( 'category' => $category, 'id'=>$inventory['id'])),array(),'');
			echo '<br>';
		}
	} elseif($type == 'present') {
		foreach ($inventory_list as $inventory){
			echo $inventory['id'];
			echo '<br>';
			echo $inventory['name'];
			echo '<br>';
			echo $inventory['effect'];
			echo '<br>';
			echo $inventory['description'];
			echo '<br>';
			echo $html->link('詳細', array('controller'=>'inventories', 'action'=>'detail','?' => array( 'category' => $category, 'id'=>$inventory['id'])),array(),'');
			echo '<br>';
		}
	} else {
		foreach ($inventory_list as $inventory){
			echo $inventory['id'];
			echo '<br>';
			echo $inventory['name'];
			echo '<br>';
			echo $inventory['description'];
			echo '<br>';
			echo $html->link('詳細', array('controller'=>'inventories', 'action'=>'detail','?' => array( 'category' => $category, 'id'=>$inventory['id'])),array(),'');
			echo '<br>';
		}
	}

?>
