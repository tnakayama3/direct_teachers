<?php
class InventoriesController extends AppController {
	var $uses = array('MgsUser', 'MgsItemMaster', 'MgsPresentMaster', 'MgsTrainingMaster', 'MgsUserItem', 'MgsUserPresent', 'MgsUserTraining');
	var $helpers = array('Html', 'Form');

	function index() {
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$category = $this->params['url']['category'];
		$type = $this->params['url']['type'];
		$inventory_list = array();
		if($category == 'training') {
			$inventory_list = $this->MgsUserTraining->find('all', array('conditions' => array(
				'MgsUserTraining.user_id'      => $game_user_data['MgsUser']['id'],
				'MgsUserTraining.use_remain >'      => 0,
				)));
			$inventory_list = $this->Manygirls->get_user_training_details($inventory_list);

		} elseif($category == 'present') {
			$inventory_list = $this->MgsUserPresent->find('all', array('conditions' => array(
				'MgsUserPresent.user_id'      => $game_user_data['MgsUser']['id'],
				'MgsUserPresent.sent_flg'   => 0,
				)));
			$inventory_list = $this->Manygirls->get_user_present_details($inventory_list);
		} else {
			$inventory_list = $this->MgsUserItem->find('all', array('conditions' => array(
				'MgsUserItem.user_id'       => $game_user_data['MgsUser']['id'],
				'MgsUserItem.use_remain >'  => 0,
				)));
			$inventory_list = $this->Manygirls->get_user_item_details($inventory_list);
		}

		$inventory_displayed = array();
		foreach($inventory_list as $inventory) {
			if($inventory['type'] != $type) {
				continue;
			}
			array_push($inventory_displayed, $inventory);
		}

		#Set values to be displayed on the page
		$this->set('inventory_list',$inventory_displayed);
		$this->set('category',$category);
		$this->set('type',$type);
	}

	function detail() {
		$user_id = $this->Auth->user('id');
		$inventory_id = $this->params['url']['id'];
		$category = $this->params['url']['category'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get item data
		if($category == 'training') {
			$inventory = $this->MgsUserTraining->find('first', array('conditions' => array(
				'MgsUserTraining.id'      => $inventory_id,
				)));
			$inventory = $this->Manygirls->get_user_training_detail($inventory);
		} elseif($category == 'present') {
			$inventory = $this->MgsUserPresent->find('first', array('conditions' => array(
				'MgsUserPresent.id'      => $inventory_id,
				)));
			$inventory = $this->Manygirls->get_user_present_detail($inventory);
		} else {
			$inventory = $this->MgsUserItem->find('first', array('conditions' => array(
				'MgsUserItem.id'       => $inventory_id,
				)));
			$inventory = $this->Manygirls->get_user_item_detail($inventory);
		}

		$this->set('inventory', $inventory);
		$this->set('category', $category);
	}

}
