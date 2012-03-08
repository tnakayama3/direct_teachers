<?php
class GirlsController extends AppController {
	var $uses = array('MgsUser', 'MgsGirlMaster', 'MgsGirlsData', 'MgsGirlCommentMaster', 'MgsDateMaster', 'MgsActualGirlsData');
	var $helpers = array('Html', 'Form');

	function top() {
		$girl_id = $this->params['url']['girl_id'];
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$girl_data_updated = array();
		$girl_data_updated['id'] = $girl_id;
		$girl_data_update_flg = 0;
		$girl_detail_data = array();
		$girl_detail_data = $this->Manygirls->get_girl_detail_data_from_id_by_user_id($girl_id, $game_user_data['MgsUser']['id'], $game_user_data['MgsUser']['name']);

		#If there is no date set for the girl, init date data will be set.
		if(!$girl_detail_data['current_date_id']) {
			$new_date_data = array();
			$new_date_data = $this->Manygirls->get_new_date_data($stage_id);
			$girl_data_updated['current_date_id'] = $new_date_data['MgsDateMaster']['id'];
			$girl_data_updated['current_date_percent'] = 0;
			$girl_detail_data['MgsGirlsData']['current_date_id'] = $new_date_data['MgsDateMaster']['id'];
			$girl_detail_data['current_date_percent'] = 0;
			$girl_data_update_flg = 1;
			$this->MgsGirlsData->save($girl_data_updated);
		}

		#Get detail date data 
		$date_data = $this->Manygirls->get_date_master_from_id($girl_detail_data['current_date_id']);
		$this->set('girl_detail_data', $girl_detail_data);
		$this->set('date_data', $date_data);

		#Get girl's comment
		$girl_comment; 
		$girl_comment = $girl_detail_data['comment'];
		if(empty($this->params['url']['d_exec'])) {
		#In case that user didn't executed date command

		} elseif(!empty($this->params['url']['e_lack'])) {
			$this->set('energy_lack_flg', 1);

		} elseif(!empty($this->params['url']['g_lack'])) {
			$this->set('gold_lack_flg', 1);

		} else {
			$executed_date_id = $this->params['url']['d_id'];
			$executed_date_data = $this->Manygirls->get_date_master_from_id($executed_date_id);
			$girl_comment = $this->Manygirls->get_date_comment($this->params['url']['d_out'], $executed_date_data['MgsDateMaster']['name'], $game_user_data['MgsUser']['name']);
			$date_result = array();
			$date_result['output'] = $this->params['url']['d_out'];
			$date_result['point_up'] = $this->params['url']['point_up'];
			$date_result['ex_up'] = $this->params['url']['ex_up'];
			$date_result['energy_spent'] = $this->params['url']['energy_spent'];
			$date_result['gold_spent'] = $this->params['url']['gold_spent'];
			$this->set('date_result', $date_result);
		}
		$date_clear_flg = (!empty($this->params['url']['d_clear'])) ? 1 : 0;
		$level_up_flg = (!empty($this->params['url']['lv_up'])) ? 1 : 0;

		$this->set('date_clear_flg',  $date_clear_flg);
		$this->set('level_up_flg', $level_up_flg);

		$this->set('girl_comment', $girl_comment);
		if($girl_data_update_flg) {
			$this->MgsGirlsData->save($girl_data_updated);
		}
	}

	function date_execute() {
		$this->MgsUser->begin();
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$girl_id = $this->params['url']['girl_id'];
		$now = time();
		$girl_detail_data = $this->Manygirls->get_girl_detail_data_from_id_by_user_id($girl_id, $game_user_data['MgsUser']['id'], $game_user_data['MgsUser']['name']);
		$date_result = $this->Manygirls->get_date_result($girl_detail_data);		
		$girl_data_updated = array();
		$girl_data_updated['id'] = $girl_detail_data['id'];
		$energy_lack_flg = 0;
		$level_up_flg = 0;
		#In case that energy isn't enough
		$query_params = array();
		If($date_result['energy_spent'] > $game_user_data['MgsUser']['energy_remain']) {
			$query_params['id']    = $girl_data_id;
			$query_params['d_exec']  = 1;
			$query_params['e_lack']  = 1;
		}

		#In case that money isn't enough
		If($date_result['gold_spent'] > $game_user_data['MgsUser']['gold']) {
			$query_params['girl_id']    = $girl_data_id;
			$query_params['d_exec']  = 1;
			$query_params['g_lack']  = 1;
		}

		#In case money or energy is not enough
		if(!empty($query_params['e_lack']) || !empty($query_params['g_lack'])) {
			$this->redirect(array('controller' => 'girls', 'action' => 'top','?' => $query_params));
		}

		#If the date is cleared, then set up new date data
		if($date_result['clear_flg']) {
			$girl_data_updated['current_date_percent'] = 0;
			$new_date_data = $this->Manygirls->get_new_date_data($stage_id);
			$girl_data_updated['current_date_id'] = $new_date_data['MgsDateMaster']['id'];
		} else {
			$girl_data_updated['current_date_percent'] = $girl_detail_data['current_date_percent'] +$date_result['date_percent_obtained'];
		}

		$girl_data_updated['point'] = min($girl_detail_data['required_point'], $girl_detail_data['point'] + $date_result['girl_point_obtained']);
		$girl_data_updated['point_updated'] = $now;

		#See if user get level up
		$is_level_up = $this->Manygirls->is_level_up($game_user_data['MgsUser']['exp'], $date_result['exp_obtained']);

		#Update user data
		$game_user_data['MgsUser']['energy_remain'] -= $date_result['energy_spent'];
		$game_user_data['MgsUser']['exp'] += $date_result['exp_obtained'];

		#If user get level up, then get some skill points, and his energy recovered fully.
		if($is_level_up) {
			$game_user_data['MgsUser']['energy_remain'] = $game_user_data['MgsUser']['energy_max'];
			$game_user_data['MgsUser']['skill_remain'] += Configure::read('level_up_skill_num'); 
		}

		#If user clear date, then get some skill points, and his energy recovered fully.
		if($date_result['clear_flg']) {
			$game_user_data['MgsUser']['energy_remain'] = $game_user_data['MgsUser']['energy_max'];
			$game_user_data['MgsUser']['skill_remain'] += Configure::read('date_clear_skill_num'); 
		}


		#Save data
		$this->MgsGirlsData->save($girl_data_updated);
		$this->MgsUser->save($game_user_data);
		$this->MgsUser->commit();

		#Create query parameters
		$query_params['girl_id']           = $girl_id;
		$query_params['d_id']         = $date_result['id'];
		$query_params['d_out']        = $date_result['output'];
		$query_params['lv_up']        = $is_level_up;
		$query_params['d_clear']      = $date_result['clear_flg'];
		$query_params['d_exec']       = 1;
		$query_params['point_up']     = $date_result['girl_point_obtained'];
		$query_params['ex_up']        = $date_result['exp_obtained'];
		$query_params['energy_spent']  = $date_result['energy_spent'];
		$query_params['gold_spent']    = $date_result['gold_spent'];
		$this->redirect(array('controller' => 'girls', 'action' => 'top','?' => $query_params));
	}

	function approach() {
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$girl_id = $this->params['url']['girl_id'];
		$energy_spent = $this->params['url']['energy'];
		$exec = $this->params['url']['exec'];
		$now = time();
		$my_girl_data = $this->Manygirls->get_girl_detail_data_from_id_by_user_id($girl_id, $game_user_data['MgsUser']['id'], $game_user_data['MgsUser']['name']);
		$enemy_girl_data = $this->MgsGirlsData>find('first', array('conditions' => array(
						'MgsUser.girl_id'   => $my_girl_data['girl_id'],
						'MgsUser.owner_flg' => 1,
						)));
		$enemy_girl_data = $this->Manygirls->get_girl_detail_data_from_data($enemy_girl_data, $enemy_girl_data['MgsUser']['name']);
		$enemy_user_id = $my_girl_data['MgsGirlsData']['user_id'];
		$enemy_game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $enemy_user_id)));
		$result = $this->Manygirls->judge_approach($game_user_data, $enemy_game_user_data, $my_girl_data, $enemy_girl_data, $energy_spent);
		if($result['is_win']) {
			$my_girl_data_updated = array();
			$my_girl_data_updated['id'] = $my_girl_data['id'];
			$my_girl_data_updated['owner_flg'] = 1;

			$enemy_girl_data_updated = array();
			$enemy_girl_data_updated['id'] = $enemy_girl_data['id'];
			$enemy_girl_data_updated['owner_flg'] = 0;
			$enemy_girl_data_updated['point'] = 0;

			$game_user_data_updated = array();
			$game_user_data_updated['id']     = $game_user_data['MgsUser']['id'];
			$game_user_data_updated['energy'] = $game_user_data['MgsUser']['energy'] - $energy_spent;
			$this->MgsGirlsData->save($my_girl_data_updated);
			$this->MgsGirlsData->save($enemy_girl_data_updated);
			$this->MgsUser->save($game_user_data_updated);

		} else {
			$game_user_data_updated = array();
			$game_user_data_updated['id']     = $game_user_data['MgsUser']['id'];
			$game_user_data_updated['energy'] = $game_user_data['MgsUser']['energy'] - $energy_spent;
			$this->MgsUser->save($game_user_data_updated);
		}

		if($exec) {
			$this->set('result', $result);
		} 

	}

	function index() {
		$user_id = $this->Auth->user('id');
		$p = $this->params['url']['p'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$limit  = $p * Configure::read('listing_display_num'); 
		$offset = ($p - 1) * Configure::read('listing_display_num'); 
		$girls_data = $this->MgsGirlsData->find('all', array(
				'conditions' => array(
					'MgsGirlsData.user_id'   => $game_user_data['MgsUser']['id'],
					'MgsGirlsData.owner_flg' => 1,
				),
				'order'      => 'MgsGirlsData.point desc',
				'limit'      => $limit,
				'limit'      => $offset,
				)
				
				);
		$girls_displayed = array();
		foreach( $girls_data as $girl_data) {
			$girl_detail_data = $this->Manygirls->get_girl_detail_data_from_data($girl_data, $game_user_data['MgsUser']['name']);
			array_push($girls_displayed, $girl_detail_data);
		}
		$this->set('girls_displayed', $girls_displayed);
		$this->set('p', $p);
	}

	function favorite() {
		$user_id = $this->Auth->user('id');
		$p = $this->params['url']['p'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$limit  = $p * Configure::read('listing_display_num'); 
		$offset = ($p - 1) * Configure::read('listing_display_num'); 
		$girls_data = $this->MgsGirlsData->find('all', array(
				'conditions' => array(
					'MgsGirlsData.user_id'   => $game_user_data['MgsUser']['id'],
					'MgsGirlsData.owner_flg' => 0,
				),
				'order'      => 'MgsGirlsData.point desc',
				'limit'      => $limit,
				'limit'      => $offset,
				)
				
				);
		$girls_displayed = array();
		foreach( $girls_data as $girl_data) {
			$girl_detail_data = $this->Manygirls->get_girl_detail_data_from_data($girl_data, $game_user_data['MgsUser']['name']);
			array_push($girls_displayed, $girl_detail_data);
		}
		$this->set('girls_displayed', $girls_displayed);
		$this->set('p', $p);
	}

}
