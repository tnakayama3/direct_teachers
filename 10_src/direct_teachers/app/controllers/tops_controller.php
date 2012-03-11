<?php
class TopsController extends AppController {

	var $name = 'Tops';
	var $uses = array('Teachers');
	var $helpers = array('Formhidden');

	function top() {
		$this->render('b_top');
	}
}
