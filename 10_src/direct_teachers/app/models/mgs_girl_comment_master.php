<?php
class MgsGirlCommentMaster extends AppModel {
	var $name = 'MgsGirlCommentMaster';
	var $useDbConfig = 'manygirls';
	var $displayField = 'girl_id';
	var $validate = array(
		'comment' => array(
			'maxlength' => array(
				'rule' => array('maxlength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
