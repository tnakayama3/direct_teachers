<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="">
<meta name="keywords" content="">

<title>Direct teachers | 家庭教師探し</title>
<link href="/styles/common.css" rel="stylesheet" type="text/css">
<link href="/styles/tutor_register.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="scripts/swapImg_tutor.js"></script>
<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<div id="container">
<div id="header">
<span class="tutro_log"><img src="/images/tutor_logo.jpg" width="266" height="58" alt="Direct Teachers" class="logo" />
<span class="ad"><img src="/images/ad/tutor_google.jpg" width="482" height="67" /></span>
</span>
</div>
<?php $attributes = array("legend" => false, 'label' => true); ?>
<?php 
	$years_array = range(1950,2010);
	$years_long = array();
	foreach($years_array as $key => $value) {
		$years_long{$value} = $value;
	}
?>	
<?php 
	$years_short_array = range(2012,2013);
	$years_short = array();
	foreach($years_short_array as $key => $value) {
		$years_short{$value} = $value;
	}
?>	
<?php 
	$months_array = range(1,12);
	$months = array();
	foreach($months_array as $key => $value) {
		$months{$value} = $value;
	}
?>	
<?php 
	$days_array = range(1,31);
	$days = array();
	foreach($days_array as $key => $value) {
		$days{$value} = $value;
	}
?>	
<?php 
	$fees_array = array(1000,1500,2000,2500,3000,3500,4000,4500,5000,5500,6000,6500,7000,7500,8000,8500,9000,9500,10000);
	$fees = array();
	foreach($fees_array as $key => $value) {
		$fees{$value} = $value;
	}
?>	
<?php 
	$prefectures_array = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'); 
	$prefectures = array();
	foreach($prefectures_array as $key => $value) {
		$prefectures{$value} = $value;
	}
?>
  

<!-- Header //-->
<span class="crumbs"><a href="tutor_index.html" target="_self">TOP</a>>家庭教師登録</span>

<div id="main">
<h2>あなたの情報を入力してください<br />※は必須項目になります。</h2>
<?php echo $this->Form->create('Teacher', array(
	'action' => 'add3',
	'inputDefaults' => array(
		'label' => false,
		'div'   => false
	))
);?>
<?php if(!isset($errorMessages)) { $errorMessages = array();} ?>
<table width="950" border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">指導開始希望日<span style="color:#FF0000">※</span>
	<br><span style="color:#FF0000"><?php if(array_key_exists('start_date', $errorMessages)) { echo $errorMessages['start_date'] ;} ?></span>
    </td>
    <td height="60" align="left" valign="middle">
	<?php echo $this->Form->select('start_year',$years_short, '2012'); ?>年
	<?php echo $this->Form->select('start_month',$months, '1'); ?>月
	<?php echo $this->Form->select('start_day',$days, '1'); ?>日
    </td>
    <td height="60" align="left" valign="middle">例）2012年6月5日</td>
  </tr>
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">大学名<span style="color:#FF0000">※</span>
	<br><span style="color:#FF0000"><?php if(array_key_exists('university', $errorMessages)) { echo $errorMessages['university'] ;} ?></span>
    </td>
    <td height="60" align="left" valign="middle">
	<?php echo $this->Form->input('university',array('label'=>false)); ?>
    </td>
    <td height="60" align="left" valign="middle">例）　早稲田大学</td>
  </tr>
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">学部名<span style="color:#FF0000">※</span>
    <br><span style="color:#FF0000"><?php if(array_key_exists('department', $errorMessages)) { echo $errorMessages['department'] ;} ?></span>
    </td>
    <td height="60" align="left" valign="middle"><?php echo $this->Form->input('department', array('label'=>false)); ?></td>
    <td height="60" align="left" valign="middle">例）　政治経済学部</td>
  </tr>
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">在籍状況</td>
    <td height="60" align="left" valign="middle">
<?php $options = array('学部在学中'=>'学部在学中', '大学院在学中'=>'大学院在学中', '学部卒'=>'学部卒', '大学院卒'=>'大学院卒'); ?>
<?php $attributes = array("legend" => false, 'label' => true, 'value'=>'学部在学中'); ?>
<?php echo $this->Form->radio('study_status', $options, $attributes); ?>
</td>
    <td height="60" align="left" valign="middle">例）　小学校</td>
  </tr>
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">希望時給
    <br><span style="color:#FF0000"><?php if(array_key_exists('fee', $errorMessages)) { echo $errorMessages['fee'] ;} ?></span>
    </td>
    <td height="60" align="left" valign="middle">
	<?php echo $this->Form->select('fee',$fees, '2000'); ?>円</td>
    <td height="60" align="left" valign="middle">例）　2000円</td>
  </tr>
  <tr>
    <td height="60" align="right" valign="middle" bgcolor="#FFEEFC">居住都道府県
    	<br><span style="color:#FF0000"><?php if(array_key_exists('prefecture', $errorMessages)) { echo $errorMessages['prefecture'] ;} ?></span>
    </td>
    <td height="60" align="left" valign="middle">
    <?php echo $this->Form->select('prefecture',$prefectures, '東京都');?>
    </td>
    <td height="60" align="left" valign="middle">例）　東京都</td>
  </tr>
  <tr>
    <td height="170" align="right" valign="middle" bgcolor="#FFEEFC">指導可能地域
    </td>
    <td height="170" align="left" valign="middle"><?php echo $this->Form->textarea('area_description',array('cols'=>45,'rows'=>8));?></td>
    <td height="170" align="left" valign="middle">例）　東京23区内<br />
    例）　大田区、目黒区、渋谷</td>
  </tr>
  <tr>
    <td height="150" colspan="3" align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" rowspan="3" align="right" valign="middle" bgcolor="#FFEEFC">指導可能教科<span style="color:#FF0000">※</span><br />
          <span style="color:#FF9900">複数チェックできます。</span>
    	  <br><span style="color:#FF0000"><?php if(array_key_exists('subjects', $errorMessages)) { echo $errorMessages['subjects'] ;} ?></span>
        </td>
        <td width="90" height="50" align="center" valign="middle" bgcolor="#E1EBFF">小学生</td>
        <td width="339" height="50" align="left" valign="middle">
<input type="checkbox" name="data[Teacher][elementary][]" value="ele_math" id="TeacherElementaryEleMath" />算数
<input type="checkbox" name="data[Teacher][elementary][]" value="ele_lang" id="TeacherElementaryEleLang" />国語
<input type="checkbox" name="data[Teacher][elementary][]" value="ele_science" id="TeacherElementaryEleScience" />理科
<input type="checkbox" name="data[Teacher][elementary][]" value="ele_society" id="TeacherElementaryEleSociety" />社会
<input type="checkbox" name="data[Teacher][elementary][]" value="ele_english" id="TeacherElementaryEleEnglish" />英語
	</td>
        <td width="284" height="50">例）　算数、理科</td>
      </tr>
      <tr>
        <td height="50" align="center" valign="middle" bgcolor="#E1EBFF">中学生</td>
        <td height="50">
<input type="checkbox" name="data[Teacher][junior][]" value="junior_math" id="TeacherJuniorMath" />算数
<input type="checkbox" name="data[Teacher][junior][]" value="junior_lang" id="TeacherJuniorLang" />国語
<input type="checkbox" name="data[Teacher][junior][]" value="junior_science" id="TeacherJuniorScience" />理科
<input type="checkbox" name="data[Teacher][junior][]" value="junior_society" id="TeacherJuniorSociety" />社会
<input type="checkbox" name="data[Teacher][junior][]" value="junior_english" id="TeacherJuniorEnglish" />英語
	</td>
        <td height="50">例）　数学、英語</td>
      </tr>
      <tr>
        <td height="50" align="center" valign="middle" bgcolor="#E1EBFF">高校生</td>
        <td height="50">
<input type="checkbox" name="data[Teacher][high][]" value="high_math" id="TeacherHighMath" />数学
<input type="checkbox" name="data[Teacher][high][]" value="high_lang" id="TeacherHighLang" />国語
<input type="checkbox" name="data[Teacher][high][]" value="high_english" id="TeacherHighEnglish" />英語
<input type="checkbox" name="data[Teacher][high][]" value="high_physics" id="TeacherHighPhysics" />物理
<input type="checkbox" name="data[Teacher][high][]" value="high_chemistry" id="TeacherHighChemistry" />化学
<input type="checkbox" name="data[Teacher][high][]" value="high_biology" id="TeacherHighBiology" />生物
<input type="checkbox" name="data[Teacher][high][]" value="high_geography" id="TeacherHighGeography" />地理
<input type="checkbox" name="data[Teacher][high][]" value="high_jp_history" id="TeacherHighJpHistory" />日本史
<input type="checkbox" name="data[Teacher][high][]" value="high_world_history" id="TeacherHighWorldHistory" />世界史
	</td>
        <td height="50">例）　数学、日本史</td>
      </tr>
    </table>  </td>
  </tr>
  <tr>
    <td height="70" align="right" valign="middle" bgcolor="#FFEEFC">受験指導可能教科</td>
    <td height="70" align="left" valign="middle">
<input type="checkbox" name="data[Teacher][juken][]" value="juken_junior" id="TeacherJukenJunior" />中学受験
<input type="checkbox" name="data[Teacher][juken][]" value="juken_high" id="TeacherJukenHigh" />高校受験
<input type="checkbox" name="data[Teacher][juken][]" value="juken_univ" id="TeacherJukenUniv" />大学受験
</td>
    <td height="70" align="left" valign="middle">例）　大学受験</td>
  </tr>
<tr>
<td height="80" align="right" valign="middle" bgcolor="#FFEEFC">対応可能曜日
    	  <br><span style="color:#FF0000"><?php if(array_key_exists('day', $errorMessages)) { echo $errorMessages['day'] ;} ?></span>
</td>
<td height="70" align="left" valign="middle">
<input type="checkbox" name="data[Teacher][day][]" value="monday" id="TeacherDayMonday" />月
<input type="checkbox" name="data[Teacher][day][]" value="thuesday" id="TeacherDayThuesday" />火
<input type="checkbox" name="data[Teacher][day][]" value="wednesday" id="TeacherDayWednesday" />水
<input type="checkbox" name="data[Teacher][day][]" value="thursday" id="TeacherDayThursday" />木
<input type="checkbox" name="data[Teacher][day][]" value="friday" id="TeacherDayFriday" />金
<input type="checkbox" name="data[Teacher][day][]" value="saturday" id="TeacherDaySaturday" />土
<input type="checkbox" name="data[Teacher][day][]" value="sunday" id="TeacherDaySunday" />日
</td>
<td height="80" align="left" valign="middle">例）　月</td>
</tr>

  <tr>
    <td height="80" align="right" valign="middle" bgcolor="#FFEEFC">一ヶ月未満のスポット対応<br /></td>
    <td height="80" align="left" valign="middle">
<?php $options = array(1=>'対応可能',0=>'対応不可'); ?>
<?php $attributes = array("legend" => false, 'label' => true, 'value'=>1); ?>
<?php echo $this->Form->radio('spot', $options, $attributes); ?>
</td>
    <td height="80" align="left" valign="middle">例）　対応可能</td>
  </tr>
  <tr>
    <td height="200" align="right" valign="middle" bgcolor="#FFEEFC">自己アピール（200文字以内）<br /><span style="color:#FF9900">電話番号や本名などの個人情報は記載しないでください。</span></td>
    <td height="200" align="left" valign="middle">
<?php echo $this->Form->textarea('comment',array('cols'=>50,'rows'=>7));?>
</td>
    <td height="200" align="left" valign="middle">例）<br />今まで3人の学生を指導し、全員希望する学校に合格させた実績が亜ります。</td>
  </tr>
</table>
<center>
<?php echo $form->submit('/images/btn_tutor_register_prev.gif', array('div'=>false, 'name' => 'data[submit_back]')); ?>          　　  <?php echo $form->submit('/images/btn_tutor_register_next.gif',array('div'=>false)); ?>
</center>
<!-- Main //-->


<div id="footer">
<ul>
<li><a href="#" target="_self">利用規約</a></li>
<li>|</li>
<li><a href="#" target="_self">お問い合わせ</a></li>
<li>|</li>
<li><a href="#" target="_self">会社案内</a></li>
</ul>
<br class="clear" />
<span class="cr">Copyright (C) 2010 DirectTeachers All Rights Reserved</span>
</div>
<!-- Footer //-->


</div>
<!-- Container //-->

</body>
</html>
