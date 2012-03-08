----Present Data-----<br>
<?php	echo $present['MgsPresentMaster']['id']; ?> <br>
<?php	echo $present['MgsPresentMaster']['name']; ?> <br>
<?php	echo $present['MgsPresentMaster']['price']; ?> <br>
<?php   echo $html->link('購入', array('controller'=>'present_shops', 'action'=>'buy1','?' => array( 'id' => $present['MgsPresentMaster']['id'])),array(),'');  ?>


