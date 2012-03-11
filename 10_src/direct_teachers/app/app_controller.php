<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
App::import('Vendor', 'facebook/facebook');
class AppController extends Controller {
	var $facebook;
	function __construct() {
		parent::__construct();
		$this->facebook = new Facebook(array(
			'appId'  => '364789543551427',
			'secret' => '068537cd5e3e1ff48813898b7ed81105',
			'cookie' => true,
		));
		$my_user_id = $this->facebook->getUser();
		if(!$my_user_id) {
			$canvaspage = 'apps.facebook.com/direct_teachers/';	
			$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'
			? 'https://'
			: 'http://';
			$canvasUrl = $protocol.$canvaspage;
			$url = $this->facebook->getLoginUrl(array(
				'redirect_uri' => $canvasUrl,	
				'canvas' => 1,
				'fbconnect' => 0,
				'scope' => 'email,user_birthday'
			));
			#Redirect to facebook top page
			$this->redirect($url);
		} else {
			try {
				$this->me = $this->facebook->api('/me');
				$this->uid = $my_user_id;
			} catch (FacebookApiException $e) {
				$error = "Error : something is wrong , please try again later";
				exit();
			}
		}
	}
}
