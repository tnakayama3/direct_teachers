---Shop types--- <br>
<?php echo $html->link('Item', array('controller'=>'item_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('Present', array('controller'=>'present_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
----Coin types ----<br>
<?php echo $html->link('Gold', array('controller'=>'item_shops', 'action'=>'index','?' => array('type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('Coin', array('controller'=>'item_shops', 'action'=>'index','?' => array('type' => 2)),array(),''); ?>      <br>

----Item List-----<br>
<?php foreach ($item_list as $item){ ?>
<?php	echo $item['MgsItemMaster']['id']; ?> <br>
<?php	echo $item['MgsItemMaster']['name']; ?> <br>
<?php	echo $item['MgsItemMaster']['price']; ?> <br>
<?php 
if($type == 1) {
	if($item['MgsItemMaster']['price'] > $my_gold) { 
		echo "not enough money!!";
	} else {
		echo $html->link('購入', array('controller'=>'item_shops', 'action'=>'confirm1','?' => array( 'id' => $item['MgsItemMaster']['id'])),array(),'');
	}
} else {
	if($item['MgsItemMaster']['price'] > $my_coin) { 
		echo 'not enough money!!';
	} else {
	echo $html->link('購入', array('controller'=>'item_shops', 'action'=>'confirm2','?' => array( 'id' => $item['MgsItemMaster']['id'])),array(),'');
	}
}
?>
<br>
<?php } ?>



