<?php
class PresentShopsController extends AppController {
	var $uses = array('MgsUser', 'MgsPresentMaster', 'MgsUserPresent', 'MgsRealcoin', 'MgsActualGirlsData');
	var $helpers = array('Html', 'Form');

	function index() {
		$user_id = $this->Auth->user('id');
		$type = $this->params['url']['type'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		#Get all of presents
		$present_list= array();
		$present_list = $this->MgsPresentMaster->find('all', array('conditions' => array(
			'MgsPresentMaster.type'             => $type,
			)));
		#Set values to be displayed on the page
		$this->set('present_list',$present_list);
		$this->set('type',$type);
		$this->set('my_gold',$game_user_data['MgsUser']['gold']);
		$this->set('my_coin',$real_coin['MgsRealcoin']['amount']);
	}

	function confirm1() {
		$user_id = $this->Auth->user('id');
		$present_id = $this->params['url']['id'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get present data
		$present = array();
		$present = $this->MgsPresentMaster->find('first', array('conditions' => array(
			'MgsPresentMaster.id'         => $present_id,
			)));
		if($present['MgsPresentMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('present', $present);
	}

	function buy1() {
		$present_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get present data
		$present = $this->MgsPresentMaster->find('first', array('conditions' => array(
			'MgsPresentMaster.id'         => $present_id,
			)));

		if($present['MgsPresentMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$game_user_data_updated = array();
		$game_user_data_updated['id'] = $game_user_data['MgsUser']['id'];
		$game_user_data_updated['gold'] = $game_user_data['MgsUser']['gold'] - $present['MgsPresentMaster']['price'];

		#new present data
		$user_present_data = array();
		$user_present_data['user_id'] = $game_user_data['MgsUser']['id'];
		$user_present_data['present_id'] = $present['MgsPresentMaster']['id'];
	
		#Start trunsaction
		$this->MgsUser->begin();

		#Save present data
		$result_present_data = $this->MgsUserPresent->save($user_present_data);

		#Save updated user data
		$result_user_data = $this->MgsUser->save($game_user_data_updated);

		#Commit saved data
		if($result_user_data && $result_present_data) {
			$this->MgsUser->commit();
		} else {
			$this->MgsUser->rollback();
		}
	}

	function confirm2() {
		$user_id = $this->Auth->user('id');
		$present_id = $this->params['url']['id'];
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		#Get present data
		$present = array();
		$present = $this->MgsPresentMaster->find('first', array('conditions' => array(
			'MgsPresentMaster.id'         => $present_id,
			)));
		if($present['MgsPresentMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('present', $present);
	}

	function buy2() {
		$present_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get present data
		$present = $this->MgsPresentMaster->find('first', array('conditions' => array(
			'MgsPresentMaster.id'         => $present_id,
			)));

		if($present['MgsPresentMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$realcoin_updated = array();
		$realcoin_updated['id'] = $user_id;
		$realcoin_updated['amount'] = $real_coin['MgsRealcoin']['amount'] - $present['MgsPresentMaster']['price'];

		#new present data
		$user_present_data = array();
		$user_present_data['user_id'] = $game_user_data['MgsUser']['id'];
		$user_present_data['present_id'] = $present['MgsPresentMaster']['id'];

		#Start trunsaction
		$this->MgsUser->begin();
		$this->MgsRealcoin->begin();

		#Save present data
		$result_present_data = $this->MgsUserPresent->save($user_present_data);

		#Save coin data
		$result_realcoin = $this->MgsRealcoin->save($realcoin_updated);

		#Commit saved data
		if($result_present_data && $result_realcoin) {
			$this->MgsUser->commit();
			$this->MgsRealcoin->commit();
		} else {
			$this->MgsUser->rollback();
			$this->MgsRealcoin->rollback();
		}
	}


}
