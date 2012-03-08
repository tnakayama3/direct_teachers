-----Girl Info----<br>
<?php foreach($girl_detail_data_list as $girl_detail_data) { ?>
名前:<?php echo $girl_detail_data['name'];?> <br>
属性:<?php echo $girl_detail_data['type_name'];?> <br>
攻略:<?php echo $girl_detail_data['point'];?>/<?php echo $girl_detail_data['required_point'];?><br>
表情:<?php echo $girl_detail_data['face_id'];?> <br>
girl_id:<?php echo $girl_detail_data['girl_id'];?> <br>
<?php echo $html->link('詳細', array('controller'=>'girls', 'action'=>'top','?' => array( 'girl_id' => $girl_detail_data['id'])),array(),''); ?>      <br>
<?php } ?>
