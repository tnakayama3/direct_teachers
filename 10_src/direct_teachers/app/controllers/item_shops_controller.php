<?php
class ItemShopsController extends AppController {
	var $uses = array('MgsUser', 'MgsItemMaster', 'MgsUserItem', 'MgsRealcoin');
	var $helpers = array('Html', 'Form');

	function index() {
		$user_id = $this->Auth->user('id');
		$type = $this->params['url']['type'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		#Get all of items
		$item_list= array();
		$item_list = $this->MgsItemMaster->find('all', array('conditions' => array(
			'MgsItemMaster.type'             => $type,
			)));
		#Set values to be displayed on the page
		$this->set('item_list',$item_list);
		$this->set('type',$type);
		$this->set('my_gold',$game_user_data['MgsUser']['gold']);
		$this->set('my_coin',$real_coin['MgsRealcoin']['amount']);
	}

	function confirm1() {
		$user_id = $this->Auth->user('id');
		$item_id = $this->params['url']['id'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get item data
		$item = array();
		$item = $this->MgsItemMaster->find('first', array('conditions' => array(
			'MgsItemMaster.id'         => $item_id,
			)));
		if($item['MgsItemMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('item', $item);
	}

	function buy1() {
		$item_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get item data
		$item = $this->MgsItemMaster->find('first', array('conditions' => array(
			'MgsItemMaster.id'         => $item_id,
			)));

		if($item['MgsItemMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$game_user_data_updated = array();
		$game_user_data_updated['id'] = $game_user_data['MgsUser']['id'];
		$game_user_data_updated['gold'] = $game_user_data['MgsUser']['gold'] - $item['MgsItemMaster']['price'];

		#new item data
		$user_item_data = array();
		$user_item_data['user_id']    = $game_user_data['MgsUser']['id'];
		$user_item_data['item_id']    = $item['MgsItemMaster']['id'];
		$user_item_data['use_remain'] = $item['MgsItemMaster']['use_num'];
	
		#Start trunsaction
		$this->MgsUser->begin();

		#Save item data
		$result_item_data = $this->MgsUserItem->save($user_item_data);

		#Save updated user data
		$result_user_data = $this->MgsUser->save($game_user_data_updated);

		#Commit saved data
		if($result_user_data && $result_item_data) {
			$this->MgsUser->commit();
		} else {
			$this->MgsUser->rollback();
		}
	}

	function confirm2() {
		$user_id = $this->Auth->user('id');
		$item_id = $this->params['url']['id'];
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		#Get item data
		$item = array();
		$item = $this->MgsItemMaster->find('first', array('conditions' => array(
			'MgsItemMaster.id'         => $item_id,
			)));
		if($item['MgsItemMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('item', $item);
	}

	function buy2() {
		$item_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get item data
		$item = $this->MgsItemMaster->find('first', array('conditions' => array(
			'MgsItemMaster.id'         => $item_id,
			)));

		if($item['MgsItemMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$realcoin_updated = array();
		$realcoin_updated['id'] = $user_id;
		$realcoin_updated['amount'] = $real_coin['MgsRealcoin']['amount'] - $item['MgsItemMaster']['price'];

		#new item data
		$user_item_data = array();
		$user_item_data['user_id'] = $game_user_data['MgsUser']['id'];
		$user_item_data['item_id'] = $item['MgsItemMaster']['id'];

		#Start trunsaction
		$this->MgsUser->begin();
		$this->MgsRealcoin->begin();

		#Save item data
		$result_item_data = $this->MgsUserItem->save($user_item_data);

		#Save coin data
		$result_realcoin = $this->MgsRealcoin->save($realcoin_updated);

		#Commit saved data
		if($result_item_data && $result_realcoin) {
			$this->MgsUser->commit();
			$this->MgsRealcoin->commit();
		} else {
			$this->MgsUser->rollback();
			$this->MgsRealcoin->rollback();
		}
	}


}
