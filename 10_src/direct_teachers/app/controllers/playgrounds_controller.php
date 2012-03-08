<?php
class PlaygroundsController extends AppController {
	var $uses = array('MgsUser', 'MgsGirlMaster', 'MgsGirlsData', 'MgsGirlCommentMaster', 'MgsActualGirlsData');
	var $helpers = array('Html', 'Form');

	function top() {
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		$display_num = Configure::read('listing_display_num');
		$actual_girls_list = $this->MgsActualGirlsData->find('all', array('conditions' => array(
			'MgsActualGirlsData.stage_id' => $stage_id,), 'limit' => $display_num)); 
		$girl_data_list_displayed = $this->Manygirls->get_girl_list_for_listing($actual_girls_list);
		$this->set('girl_detail_data_list', $girl_data_list_displayed);
	}
}
