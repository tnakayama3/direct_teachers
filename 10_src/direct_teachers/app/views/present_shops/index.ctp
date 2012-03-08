---Shop types--- <br>
<?php echo $html->link('Item', array('controller'=>'item_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('Present', array('controller'=>'present_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
----Coin types ----<br>
<?php echo $html->link('Gold', array('controller'=>'present_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('Coin', array('controller'=>'present_shops', 'action'=>'index','?' => array('type' => 2)),array(),''); ?>      <br>

----Present List-----<br>
<?php foreach ($present_list as $present){ ?>
<?php	echo $present['MgsPresentMaster']['id']; ?> <br>
<?php	echo $present['MgsPresentMaster']['name']; ?> <br>
<?php	echo $present['MgsPresentMaster']['price']; ?> <br>
<?php 
if($type == 1) {
	if($present['MgsPresentMaster']['price'] > $my_gold) { 
		echo "not enough money!!";
	} else {
		echo $html->link('購入', array('controller'=>'present_shops', 'action'=>'confirm1','?' => array( 'id' => $present['MgsPresentMaster']['id'])),array(),'');
	}
} else {
	if($present['MgsPresentMaster']['price'] > $my_coin) { 
		echo 'not enough money!!';
	} else {
	echo $html->link('購入', array('controller'=>'present_shops', 'action'=>'confirm2','?' => array( 'id' => $present['MgsPresentMaster']['id'])),array(),'');
	}
}
?>
<br>
<?php } ?>



