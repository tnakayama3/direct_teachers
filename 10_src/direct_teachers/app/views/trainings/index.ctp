
----Other types of trainings-----<br>
<?php echo $html->link('着こなし', array('controller'=>'trainings', 'action'=>'index','?' => array( 'category' => 1, 'type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('社交術', array('controller'=>'trainings', 'action'=>'index','?' => array( 'category' => 2, 'type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('肉体', array('controller'=>'trainings', 'action'=>'index','?' => array( 'category' => 3, 'type' => 1)),array(),''); ?>      <br>

----Coin types ----<br>
<?php echo $html->link('Gold', array('controller'=>'trainings', 'action'=>'index','?' => array( 'category' => $category, 'type' => 1)),array(),''); ?>      <br>
<?php echo $html->link('Coin', array('controller'=>'trainings', 'action'=>'index','?' => array( 'category' => $category, 'type' => 2)),array(),''); ?>      <br>

----Training List-----<br>
<?php foreach ($training_list as $training){ ?>
<?php	echo $training['MgsTrainingMaster']['id']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['name']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['price']; ?> <br>
<?php	echo $training['MgsTrainingMaster']['effect']; ?> <br>
<?php 
if($type == 1) {
	if($training['MgsTrainingMaster']['price'] > $my_gold) { 
		echo "not enough money!!";
	} else {
		echo $html->link('購入', array('controller'=>'trainings', 'action'=>'confirm1','?' => array( 'id' => $training['MgsTrainingMaster']['id'])),array(),'');
	}
} else {
	if($training['MgsTrainingMaster']['price'] > $my_coin) { 
		echo 'not enough money!!';
	} else {
	echo $html->link('購入', array('controller'=>'trainings', 'action'=>'confirm2','?' => array( 'id' => $training['MgsTrainingMaster']['id'])),array(),'');
	}
}
?>
<?php } ?>



