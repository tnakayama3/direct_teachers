----Girls List -----<br>
<?php 
for ($i = 1; $i <= Configure::read('girls_type_num'); $i++) { 
	if(empty($my_girls_displayed[$i])) {
		continue;
	}
?>
	<?php echo $my_girls_displayed[$i]['girl_id'];        ?> <br>
	<?php echo $my_girls_displayed[$i]['name'];           ?> <br>
	<?php echo $my_girls_displayed[$i]['type'];           ?> <br>
	<?php echo $my_girls_displayed[$i]['type_name'];      ?> <br>
	<?php echo $my_girls_displayed[$i]['required_point']; ?> <br>
	<?php echo $my_girls_displayed[$i]['point'];          ?> <br>
	<?php echo $my_girls_displayed[$i]['point_percent'];  ?> <br>
	<?php echo $my_girls_displayed[$i]['face_id'];        ?> <br>
	<?php echo $my_girls_displayed[$i]['comment'];        ?> <br>
	<?php echo $html->link('詳細', array('controller'=>'girls', 'action'=>'top','?' => array( 'girl_id' => $my_girls_displayed[$i]['girl_id'])),array(),''); ?>      <br>

------------------<br>
<?php
}
?>

<?php echo $html->link('全て見る', array('controller'=>'girls', 'action'=>'index','?' => array( 'p' => 1)),array(),''); ?>      <br>

---------Links--------<br>
<?php echo $html->link('社交界', array('controller'=>'playgrounds', 'action'=>'top'),array(),''); ?>      <br>
<?php echo $html->link('お気に入り', array('controller'=>'girls', 'action'=>'favorite','?' => array( 'p' => 1)),array(),''); ?>      <br>
<?php echo $html->link('訓練', array('controller'=>'trainings', 'action'=>'index', '?' => array('type' => 1, 'category' => 1),'')); ?> <br>
<?php echo $html->link('雑貨屋', array('controller'=>'item_shops', 'action'=>'index', '?' => array('type' => 1),'')); ?> <br>
<?php echo $html->link('所持品', array('controller'=>'inventories', 'action'=>'index', '?' => array('category' => 'item','type'=>1),'')); ?> <br>
<?php echo $html->link('友達', array('controller'=>'friend', 'action'=>'top'),array(),''); ?> <br>
<?php echo $html->link('戦歴', array('controller'=>'history', 'action'=>'top'),array(),''); ?> <br>
<?php echo $html->link('ランキング', array('controller'=>'ranking', 'action'=>'top'),array(),''); ?> <br>
<?php echo $html->link('ヘルプ', array('controller'=>'help', 'action'=>'top'),array(),''); ?> <br>
