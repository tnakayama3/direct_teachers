<?php
class Teacher extends AppModel {
	var $name = 'Teacher';
	var $validate = array(
		'start_year' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'start_month' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'start_day' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'birth_year' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birth_month' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birth_day' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'university' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'department' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'study_status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fee' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prefecture' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'area_description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'start_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => '必須項目です',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
