<?php
class User extends AppModel {
	var $name = 'User';
	var $useDbConfig = 'game';
	var $displayField = 'id';
	var $validate = array(
		'mail_address' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'e-mailアドレスを入力してください',
			),
			'maxlength' => array(
				'rule' => array('maxlength',100),
				'message' => '100文字以下で入力してください。',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'このメールアドレスは既に使われています。',
			),
		),

		'password' => array(
			'minlength' => array(
				'rule' => array('minlength',4),
				'message' => '4文字以上で入力してください。',
			),
			'maxlength' => array(
				'rule' => array('maxlength',10),
				'message' => '10文字以下で入力してください。',
			),
			'custom' => array(
				'rule' => array('custom','/^[a-z\d]*$/i'),
				'message' => '半角英数字で入力してください。',

			),
		),
	);
}
