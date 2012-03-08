----Item Data-----<br>
<?php	echo $item['MgsItemMaster']['id']; ?> <br>
<?php	echo $item['MgsItemMaster']['name']; ?> <br>
<?php	echo $item['MgsItemMaster']['price']; ?> <br>
<?php	echo $html->link('購入', array('controller'=>'item_shops', 'action'=>'buy2','?' => array( 'id' => $item['MgsItemMaster']['id'])),array(),'');  ?>
