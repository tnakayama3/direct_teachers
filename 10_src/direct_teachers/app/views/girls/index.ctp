<?php foreach($girls_displayed as $girl_detail_data) { ?>
-----Girl Info----<br>
名前:<?php echo $girl_detail_data['name'];?> <br>
属性:<?php echo $girl_detail_data['type_name'];?> <br>
攻略:<?php echo $girl_detail_data['point'];?>/<?php echo $girl_detail_data['required_point'];?><br>
精霊:<?php echo $girl_detail_data['guard_num'];?> <br>
表情:<?php echo $girl_detail_data['face_id'];?> <br>
コメント:<?php echo $girl_detail_data['comment'];?> <br>
<?php echo $html->link('詳細', array('controller'=>'girls', 'action'=>'top','?' => array( 'girl_id' => $girl_detail_data['girl_id'])),array(),''); ?>      <br>
<?php }?>
