<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $uses = array('User');

	function beforeFilter() {
		$this->Auth->allow('add');
		$this->Auth->fields = array(
			'username' => 'mail_address',
			'password'  => 'password'
		);
		$this->Auth->loginError = "メールアドレスもしくはパスワードが正しくありません。";
        	$this->Auth->authenticate = $this->NoHash;
	}

	function add() {
		$now = time();
		if($this->Auth->user('id')) {
			$this->Cookie->delete(Configure::read('cookie_name'));
			$this->Auth->logout();
		}
		if (!empty($this->data)) {
			#Data for user
			$user_data = array();
			$user_data["mail_address"] = $this->data["User"]["mail_address"];
			$user_data["password"] = $this->data["User"]["password"];
			$user_data["last_login_date"] = $now;
			$this->User->create();
			if($user_result = $this->User->save($user_data)) {
				$cookie = array();
				$cookie["mail_address"] = $user_data["mail_address"];
				$cookie["password"] = $user_data["password"];
				$this->Cookie->write(Configure::read('cookie_name'), $cookie, true, Configure::read('cookie_timeout'));
				$this->redirect('/tops/register/');
			}
		}
	}
	
	function login() {
		if (empty($this->data)) {
			$cookie = $this->Cookie->read(Configure::read('cookie_name'));
			if(!is_null($cookie)) {
				if($this->Auth->login($cookie)) {
					$this->redirect($this->Auth->redirect());
				}
			}
		} else {
			$cookie = array();
			$cookie["mail_address"] = $user_data["mail_address"];
			$cookie["password"] = $user_data["password"];
			$this->Cookie->write(Configure::read('cookie_name'), $cookie, true, Configure::read('cookie_timeout'));
		}
	}
	
	function logout() {
		$this->Cookie->delete(Configure::read('cookie_name'));
		$this->Auth->logout();
		$this->redirect('/users/login');
	}

}
