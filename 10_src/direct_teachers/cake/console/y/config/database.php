<?php
class DATABASE_CONFIG {

	var $manygirls = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'game',
		'password' => '19840229',
		'database' => 'manygirls',
		'encoding' => 'utf8'
	);
	var $game = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'game',
		'password' => '19840229',
		'database' => 'game',
		'encoding' => 'utf8'
	);
}
?>