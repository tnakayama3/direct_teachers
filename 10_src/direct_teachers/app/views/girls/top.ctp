-----Girl Info----<br>
名前:<?php echo $girl_detail_data['name'];?> <br>
属性:<?php echo $girl_detail_data['type_name'];?> <br>
攻略:<?php echo $girl_detail_data['point'];?>/<?php echo $girl_detail_data['required_point'];?><br>
精霊:<?php echo $girl_detail_data['guard_num'];?> <br>
表情:<?php echo $girl_detail_data['face_id'];?> <br>
コメント:<?php echo $girl_comment;?> <br>
<?php echo $html->link('プレゼント', array('controller'=>'give_presents', 'action'=>'index','?' => array( 'girl_id' => $girl_detail_data['girl_id'], 'type'=>1)),array(),'');?><br>

---Date Result----<br>
<?php if(!empty($level_up_flg)) { ?>
レベルがあがったよ！ <br>
<?php } ?>

<?php if(!empty($date_clear_flg)) { ?>
デートをクリアしたよ！<br>
<?php } ?>

<?php if(!empty($date_result)) { ?>
成果:<?php echo $date_result['output'];?> <br>
満足度:+<?php echo $date_result['point_up'];?> <br>
経験値:+<?php echo $date_result['ex_up'];?> <br>
体力:-<?php echo $date_result['energy_spent'];?> <br>
お金:-<?php echo $date_result['gold_spent'];?> <br>
<?php } ?>

----Current date data-----<br>
名称:<?php echo $date_data['MgsDateMaster']['name'];  ?> <br>
達成率:<?php echo $girl_detail_data['current_date_percent'];?>% <br>
満足度:〜+<?php echo $date_data['MgsDateMaster']['point_up_max'];?> <br>
経験値:〜+<?php echo $date_data['MgsDateMaster']['exp_up'];?> <br>
体力:〜-<?php echo $date_data['MgsDateMaster']['energy_spent'];?> <br>
お金:〜-<?php echo $date_data['MgsDateMaster']['gold_spent'];?> <br>

<?php if(!empty($energy_lack_flg)) { ?>
体力が足りないです。<br>
<?php } ?> 

<?php if(!empty($gold_lack_flg)) { ?>
お金が足りないです。<br>
<?php } ?> 

<?php 
if(empty($gold_lack_flg) && empty($energy_lack_flg)) {
echo $html->link('実行', array('controller'=>'girls', 'action'=>'date_execute','?' => array( 'girl_id' => $girl_detail_data['girl_id'])),array(),'');
} ?> 
