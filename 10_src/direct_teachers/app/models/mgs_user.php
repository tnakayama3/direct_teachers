<?php
class MgsUser extends AppModel {
	var $name = 'MgsUser';
	var $useDbConfig = 'manygirls';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'maxlength' => array(
				'rule' => array('maxlength',20),
				'message' => '全角10文字以内で入力してください。',
			),
			'minlength' => array(
				'rule' => array('minlength',2),
				'message' => '全角1文字以上で入力してください。',
			),
		),
	);
}
