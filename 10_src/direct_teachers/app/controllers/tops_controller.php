<?php
class TopsController extends AppController {
	var $uses = array('MgsUser', 'MgsGirlMaster', 'MgsGirlsData', 'MgsGirlCommentMaster','MgsDateMaster', 'MgsActualGirlsData');
	var $helpers = array('Html', 'Form');

	function top() {
		$user_id = $this->Auth->user('id');
		$my_own_girls = array();
		#Get my game user data
		$mgs_user_data = $this->Manygirls->get_game_user_data($user_id);

		#Get all of my own girls data
		$my_girls_detail_data = array();
		$my_girls_detail_data = $this->Manygirls->get_detail_girls_data_by_user_id($mgs_user_data['MgsUser']['id'], $mgs_user_data['MgsUser']['stage_id'], $mgs_user_data['MgsUser']['name']);

		#Get girls data to be displayed on top page
		$my_girls_displayed = array();
		$my_girls_displayed = $this->Manygirls->get_top_girls_data($my_girls_detail_data);

		#Set values to be displayed on the page
		$this->set('my_girls_displayed',$my_girls_displayed);
	}

	function register() {
		$user_id = $this->Auth->user('id');
		$game_user_count = $this->MgsUser->find('count', array('conditions' => array('MgsUser.user_id' => $user_id)));
		if($game_user_count > 0) {
			$this->cakeError('invalidAccess');
		}elseif (!empty($this->data)) {
			#Initial game data
			$now = time();
			$game_data = array();
			$game_data["name"] = $this->data["MgsUser"]["name"];
			$game_data["user_id"] = $this->Auth->user('id');
			$game_data["last_login_date"] = $now;
			$game_data["exp"] = 0;
			$game_data["gold"] = 100;
			$game_data["energy_max"] = 10;
			$game_data["energy_remain"] = 10;
			$game_data["skill_remain"] = 0;
			$game_data["skill_cloth"] = 10;
			$game_data["skill_social"] = 10;
			$game_data["skill_health"] = 10;
			$game_data["power_cloth"] = 10;
			$game_data["power_social"] = 10;
			$game_data["power_health"] = 10;
			$game_data["stage_id"] = 1;
			$this->MgsUser->begin();
			$game_user_created = $this->MgsUser->save($game_data);
			$game_user_id = $this->MgsUser->getLastInsertId();
			#Initial girl data
			$init_girl_data = array();
			$init_girl_data = $this->Manygirls->insert_new_girl_data($game_user_id, $game_user_created["MgsUser"]["stage_id"]);
			$this->MgsUser->commit();
			$this->redirect('/tops/top/');
		} else {
			#user hasn't registerd to he game, registration page is shown
		}

	}

}
