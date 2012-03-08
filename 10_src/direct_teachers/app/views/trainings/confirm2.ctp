----Training Data-----<br>
<?php	echo $training['MgsTrainingMaster']['id']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['name']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['price']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['effect']; ?> <br>
<?php	echo $html->link('購入', array('controller'=>'trainings', 'action'=>'buy2','?' => array( 'id' => $training['MgsTrainingMaster']['id'])),array(),'');  ?>
