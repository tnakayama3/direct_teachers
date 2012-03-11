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
<!-- Header //-->
<span class="crumbs"><a href="tutor_index.html" target="_self">TOP</a>>家庭教師登録</span>
<div id="main">
<h2>入力した情報を確認してください</h2>
<?php $modelname = $this->name; ?>
<?php echo $this->Form->create('Teacher', array(
	'action' => 'add4',
	'inputDefaults' => array(
		'label' => false,
		'div'   => false
	))
);?>
<table width="950" border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td height="60" width= "209" align="right" valign="middle" bgcolor="#FFEEFC">指導開始希望日<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['start_year'] ?>年
	<?php echo $data['Teacher']['start_month'] ?>月
	<?php echo $data['Teacher']['start_day'] ?>日
    </td>
    <td height="60" width = "284" align="left" valign="middle">例）2012年6月5日</td>
  </tr>
  <tr>
    <td height="60"  width = "209" align="right" valign="middle" bgcolor="#FFEEFC">大学名<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['university'] ?>
    </td>
    <td height="60" width = "284" align="left" valign="middle">例）　早稲田大学</td>
  </tr>
  <tr>
    <td height="60" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">学部名<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['department'] ?>
    </td>

    <td height="60" width = "284" align="left" valign="middle">例）　政治経済学部</td>
  </tr>
  <tr>
    <td height="60" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">在籍状況<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['study_status'] ?>
</td>
    <td height="60" width = "284" align="left" valign="middle">例）　小学校</td>
  </tr>
  <tr>
    <td height="60" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">希望時給<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['fee'] ?>
    </td>
    <td height="60" width = "284" align="left" valign="middle">例）　2000円</td>
  </tr>
  <tr>
    <td height="60" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">居住都道府県<span style="color:#FF0000">※</span></td>
    <td height="60" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['prefecture'] ?>
    </td>
    <td height="60" width = "284" align="left" valign="middle">例）　東京都</td>
  </tr>
  <tr>
    <td height="170" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">指導可能地域<span style="color:#FF0000">※</span><br />
    <span style="color:#FF9900">東京23区内など訪問可能な<br />地区を入力してください。</span></td>
    <td height="170" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['area_description'] ?>
    </td>
    <td height="170" width = "284" align="left" valign="middle">例）　東京23区内<br />
    例）　大田区、目黒区、渋谷</td>
  </tr>
  <tr>
    <td height="150" colspan="3" align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="209" rowspan="3" align="right" valign="middle" bgcolor="#FFEEFC">指導可能教科<span style="color:#FF0000">※</span><br />
          <span style="color:#FF9900">複数チェックできます。</span></td>
        <td width="90" height="50" align="center" valign="middle" bgcolor="#E1EBFF">小学生</td>
        <td width="339" height="50" align="left" valign="middle">
	<?php 
		if(array_key_exists('elementary', $data['Teacher'])) { 
			foreach($data['Teacher']['elementary'] as $value) {
				if($value == 'ele_math') {
					echo '算数 ';
				}
				if($value == 'ele_lang') {
					echo '国語 ';
				}
				if($value == 'ele_science') {
					echo '理科 ';
				}
				if($value == 'ele_society') {
					echo '社会 ';
				}
				if($value == 'ele_english') {
					echo '英語 ';
				}
		     	}
		}
	?>
	</td>
        <td width="284" height="50">例）　算数、理科</td>
      </tr>
      <tr>
        <td height="50" align="center" valign="middle" bgcolor="#E1EBFF">中学生</td>
        <td height="50">
	<?php 
		if(array_key_exists('junior', $data['Teacher'])) { 
			foreach($data['Teacher']['junior'] as $value) {
				if($value == 'junior_math') {
					echo '数学 ';
				}
				if($value == 'junior_lang') {
					echo '国語 ';
				}
				if($value == 'junior_science') {
					echo '理科 ';
				}
				if($value == 'junior_society') {
					echo '社会 ';
				}
				if($value == 'junior_english') {
					echo '英語 ';
				}
		     	}
		}
	?>
	</td>
        <td height="50">例）　数学、英語</td>
      </tr>
      <tr>
        <td height="50" align="center" valign="middle" bgcolor="#E1EBFF">高校生</td>
        <td height="50">
	<?php 
		if(array_key_exists('high', $data['Teacher'])) { 
			foreach($data['Teacher']['high'] as $value) {
				if($value == 'high_math') {
					echo '数学 ';
				}
				if($value == 'high_lang') {
					echo '国語 ';
				}
				if($value == 'high_english') {
					echo '英語 ';
				}
				if($value == 'high_physics') {
					echo '物理 ';
				}
				if($value == 'high_chemistry') {
					echo '化学 ';
				}
				if($value == 'high_biology') {
					echo '生物 ';
				}
				if($value == 'high_geography') {
					echo '地理 ';
				}
				if($value == 'high_jp_history') {
					echo '日本史 ';
				}
				if($value == 'high_world_history') {
					echo '世界史 ';
				}
		     	}
		}
	?>
	</td>
        <td height="50">例）　数学、日本史</td>
      </tr>
    </table>  </td>
  </tr>
  <tr>
    <td height="70" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">受験指導可能教科<span style="color:#FF0000">※</span><br /><span style="color:#FF9900">複数チェックできます。</span></td>
    <td height="70" width = "429" align="left" valign="middle">
	<?php 
		foreach($data['Teacher']['juken'] as $value) {
			if($value == 'juken_junior') {
				echo '中学受験 ';
			}
			if($value == 'juken_high') {
				echo '高校受験 ';
			}
			if($value == 'juken_univ') {
				echo '大学受験 ';
			}
	     	}
	?>
    </td>
    <td height="70" width = "284" align="left" valign="middle">例）　大学受験</td>
  </tr>
<tr>
<td height="80"  width = "209" align="right" valign="middle" bgcolor="#FFEEFC">対応可能曜日</td>
<td height="70" width = "429" align="left" valign="middle">
	<?php 
		foreach($data['Teacher']['day'] as $value) {
			if($value == 'monday') {
				echo '月 ';
			}
			if($value == 'thuesday') {
				echo '火 ';
			}
			if($value == 'wednesday') {
				echo '水 ';
			}
			if($value == 'thursday') {
				echo '木 ';
			}
			if($value == 'friday') {
				echo '金 ';
			}
			if($value == 'saturday') {
				echo '土 ';
			}
			if($value == 'sunday') {
				echo '日 ';
			}
	     	}
	?>
</td>
<td height="80" width = "284" align="left" valign="middle">例）　月</td>
</tr>

  <tr>
    <td height="80" width = "209" align="right" valign="middle" bgcolor="#FFEEFC">一ヶ月未満のスポット対応<span style="color:#FF0000">※</span><br /><span style="color:#FF9900">中間・期末対策などのことです。</span></td>
    <td height="80" width = "429" align="left" valign="middle">
	<?php if($data['Teacher']['spot']) {
			echo '可能';
		} else {
			echo '不可';
		}
	?>
</td>
    <td height="80" width = "284" align="left" valign="middle">例）　対応可能</td>
  </tr>
  <tr>
    <td height="200" width = "209" align="right" valign="middle" bgcolor="#FFEEFC"><span style="color:#FF0000">※</span>自己アピール（200文字以内）<br /><span style="color:#FF9900">サイト上に公開されるので電話番号や本名<br />などの個人情報は記載しないでください。</span></td>
    <td height="200" width = "429" align="left" valign="middle">
	<?php echo $data['Teacher']['comment'];?>
</td>
    <td height="200" width = "284" align="left" valign="middle">例）<br />今まで3人の学生を指導し、全員希望する学校に合格させた実績が亜ります。</td>
  </tr>
</table>
<?php echo $formhidden->hiddenVars('Teacher'); ?>
<center>
<?php echo $form->submit('/images/btn_tutor_register_prev.gif', array('div'=>false, 'name'=>'data[submit_back]')); ?>          　　  <?php echo $form->submit('/images/btn_tutor_register_next.gif',array('div'=>false)); ?>
<?php echo $this->Form->end();?>
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
