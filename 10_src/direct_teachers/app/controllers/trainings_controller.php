<?php
class TrainingsController extends AppController {
	var $uses = array('MgsUser', 'MgsTrainingMaster', 'MgsUserTraining', 'MgsRealcoin');
	var $helpers = array('Html', 'Form');

	function index() {
		$user_id = $this->Auth->user('id');
		$category = $this->params['url']['category'];
		$type = $this->params['url']['type'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$stage_id = $game_user_data['MgsUser']['stage_id'];
		#Get all of trainings
		$training_list= array();
		$training_list = $this->MgsTrainingMaster->find('all', array('conditions' => array(
			'MgsTrainingMaster.category'         => $category,
			'MgsTrainingMaster.type'             => $type,
			'MgsTrainingMaster.stage_id_from <=' => "$stage_id",
			'MgsTrainingMaster.stage_id_to >='   => "$stage_id",
			)));
		#Set values to be displayed on the page
		$this->set('training_list',$training_list);
		$this->set('category',$category);
		$this->set('type',$type);
		$this->set('my_gold',$game_user_data['MgsUser']['gold']);
		$this->set('my_coin',$real_coin['MgsRealcoin']['amount']);
	}

	function confirm1() {
		$user_id = $this->Auth->user('id');
		$training_id = $this->params['url']['id'];
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get training data
		$training = array();
		$training = $this->MgsTrainingMaster->find('first', array('conditions' => array(
			'MgsTrainingMaster.id'         => $training_id,
			)));
		if($training['MgsTrainingMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('training', $training);
	}

	function buy1() {
		$training_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get training data
		$training = $this->MgsTrainingMaster->find('first', array('conditions' => array(
			'MgsTrainingMaster.id'         => $training_id,
			)));

		if($training['MgsTrainingMaster']['price'] > $game_user_data['MgsUser']['gold']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$game_user_data_updated = array();
		$game_user_data_updated['id'] = $game_user_data['MgsUser']['id'];
		$game_user_data_updated['gold'] = $game_user_data['MgsUser']['gold'] - $training['MgsTrainingMaster']['price'];

		#new training data
		$user_training_data = array();
		$user_training_data['user_id'] = $game_user_data['MgsUser']['id'];
		$user_training_data['training_id'] = $training['MgsTrainingMaster']['id'];
		$user_training_data['use_remain'] = $training['MgsTrainingMaster']['use_num'];
	
		#Start trunsaction
		$this->MgsUser->begin();

		#Save training data
		$result_training_data = $this->MgsUserTraining->save($user_training_data);

		#Re-calculate user's charm
		$game_user_data_updated['charm'] = $this->Manygirls->cal_user_charm($game_user_data);

		#Save updated user data
		$result_user_data = $this->MgsUser->save($game_user_data_updated);

		#Commit saved data
		if($result_user_data && $result_training_data) {
			$this->MgsUser->commit();
		} else {
			$this->MgsUser->rollback();
		}
	}

	function confirm2() {
		$user_id = $this->Auth->user('id');
		$training_id = $this->params['url']['id'];
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		#Get training data
		$training = array();
		$training = $this->MgsTrainingMaster->find('first', array('conditions' => array(
			'MgsTrainingMaster.id'         => $training_id,
			)));
		if($training['MgsTrainingMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}
		$this->set('training', $training);
	}

	function buy2() {
		$training_id = $this->params['url']['id'];
		$user_id = $this->Auth->user('id');
		$real_coin = $this->MgsRealcoin->find('first', array('conditions' => array('MgsRealcoin.user_id' => $user_id)));
		$game_user_data = $this->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		#Get training data
		$training = $this->MgsTrainingMaster->find('first', array('conditions' => array(
			'MgsTrainingMaster.id'         => $training_id,
			)));

		if($training['MgsTrainingMaster']['price'] > $real_coin['MgsRealcoin']['amount']) {
			$this->cakeError('invalidAccess');
		}

		#Spend money
		$realcoin_updated = array();
		$realcoin_updated['id'] = $user_id;
		$realcoin_updated['amount'] = $real_coin['MgsRealcoin']['amount'] - $training['MgsTrainingMaster']['price'];

		#new training data
		$user_training_data = array();
		$user_training_data['user_id'] = $game_user_data['MgsUser']['id'];
		$user_training_data['training_id'] = $training['MgsTrainingMaster']['id'];
		$user_training_data['use_remain'] = $training['MgsTrainingMaster']['use_num'];
	
		#Start trunsaction
		$this->MgsUser->begin();
		$this->MgsRealcoin->begin();

		#Save training data
		$result_training_data = $this->MgsUserTraining->save($user_training_data);

		#Re-calculate user's charm
		$game_user_data_updated['charm'] = $this->Manygirls->cal_user_charm($game_user_data);

		#Save updated user data
		$result_user_data = $this->MgsUser->save($game_user_data_updated);
		$result_realcoin = $this->MgsRealcoin->save($realcoin_updated);

		#Commit saved data
		if($result_user_data && $result_training_data && $result_realcoin) {
			$this->MgsUser->commit();
			$this->MgsRealcoin->commit();
		} else {
			$this->MgsUser->rollback();
			$this->MgsRealcoin->rollback();
		}
	}


}
