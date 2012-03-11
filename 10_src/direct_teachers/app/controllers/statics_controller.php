<?php
class StaticsController extends AppController {

	var $name = 'Statics';
	var $uses = array('Teachers');
	var $helpers = array('Formhidden');
	function b_rule() {
		$this->render('b_rule');
	}
	function b_fee() {
		$this->render('b_fee');
	}
	function b_contract() {
		$this->render('b_contract');
	}
	function b_aboutus() {
		$this->render('b_aboutus');
	}


}
