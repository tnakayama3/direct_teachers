<?php
	echo $session->flash();
	echo $session->flash('auth');
	echo $form->create('User', array('action' => 'login'));
	echo $form->input('mail_address');
	echo $form->input('password');
	echo $form->submit('Login');
	echo $form->end();
?>
