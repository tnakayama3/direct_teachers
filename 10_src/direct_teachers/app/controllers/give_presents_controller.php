<?php
class GivePresentsController extends AppController {
	var $uses = array('MgsUser', 'MgsPresentMaster', 'MgsUserPresent', 'MgsGirlsPresent', 'MgsGirlsData', 'MgsGirlMaster', 'MgsGirlCommentMaster', 'MgsActualGirlsData');
	var $helpers = array('Html', 'Form');

	function index() {
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$girl_id = $this->params['url']['girl_id'];
		$type = $this->params['url']['type'];
		$inventory_list = array();
		$inventory_list = $this->MgsUserPresent->find('all', array('conditions' => array(
			'MgsUserPresent.user_id'      => $game_user_data['MgsUser']['id'],
			'MgsUserPresent.sent_flg'   => 0,
			)));
		$inventory_list = $this->Manygirls->get_user_present_details($inventory_list);

		$inventory_displayed = array();
		foreach($inventory_list as $inventory) {
			if($inventory['type'] != $type) {
				continue;
			}
			array_push($inventory_displayed, $inventory);
		}

		#Set values to be displayed on the page
		$this->set('inventory_list',$inventory_displayed);
		$this->set('girl_id',$girl_id);
		$this->set('type',$type);
	}

	function confirm() {
		$user_id = $this->Auth->user('id');
		$present_data_id = $this->params['url']['present_data_id'];
		$girl_id = $this->params['url']['girl_id'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$present = $this->MgsUserPresent->find('first', array('conditions' => array(
			'MgsUserPresent.id'      => $present_data_id,
			)));
		$present = $this->Manygirls->get_user_present_detail($present);

		$this->set('present', $present);
		$this->set('girl_id', $girl_id);
	}

	function finish() {
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$present_data_id = $this->params['url']['present_data_id'];
		$present = $this->MgsUserPresent->find('first', array('conditions' => array(
			'MgsUserPresent.id'      => $present_data_id,
			)));
		$present = $this->Manygirls->get_user_present_detail($present);
		$girl_id = $this->params['url']['girl_id'];
		$girl_data = $this->Manygirls->get_girl_detail_data_from_id_by_user_id($girl_id, $game_user_data['MgsUser']['id'], $game_user_data['MgsUser']['name']);
		$this->MgsUserPresent->begin();
		$given_present_data = array();
		$given_present_data['girl_id'] = $girl_id;
		$given_present_data['present_id'] = $present['present_id'];
		$given_present_data['user_id'] = $game_user_data['MgsUser']['id'];

		$user_present_updated = array();
		$user_present_updated['MgsUserPresent']['id'] = $present_data_id;
		$user_present_updated['MgsUserPresent']['sent_flg'] = 1;

		$girl_data_updated = array();
		$girl_data_updated['id'] = $girl_data['id'];
		$give_present_effect = $this->Manygirls->get_present_effect($present['effect'],$girl_data);
		$updated_girl_point = $girl_data['point'] + $give_present_effect;
		$girl_data_updated['point'] = min($girl_data['required_point'], $updated_girl_point);
		$this->MgsUserPresent->begin();
		$given_present_result = $this->MgsGirlsPresent->save($given_present_data);
		$girl_data_updated_result = $this->MgsGirlsData->save($girl_data_updated);
		$user_present_updated_result = $this->MgsUserPresent->save($user_present_updated);
		if($given_present_result && $girl_data_updated_result && $user_present_updated_result) {
			$this->MgsUserPresent->commit();
		} else {
			$this->MgsUserPresent->rollback();
			$this->cakeError('invalidAccess');
		}
		$this->set('girl_id', $girl_id);
	}

}
