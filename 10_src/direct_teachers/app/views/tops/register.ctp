<?php
	echo $form->create('Top', array('action' => 'register'));
	echo $form->input('MgsUser.name');
	echo $form->submit('Register');
	echo $form->end();
?>
