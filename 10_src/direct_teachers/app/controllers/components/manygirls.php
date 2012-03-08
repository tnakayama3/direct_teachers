<?php
class ManygirlsComponent extends Object {
	function initialize(&$controller) {
		$this->controller =& $controller;
	}

	#Return game user data
	function get_game_user_data($user_id) {
		$game_user_data = array();
		$game_user_data = $this->controller->MgsUser->find('first', array('conditions' => array('MgsUser.user_id' => $user_id)));
		return $game_user_data;
	}

	#Return all of user's girls data
	function get_detail_girls_data_by_user_id($user_id, $stage_id, $user_name) {
		$girls_detail_data = array();
		$girls_data = $this->controller->MgsGirlsData->find('all', array(
				'conditions' => array(
					'MgsGirlsData.user_id' => $user_id,
					'MgsGirlsData.owner_flg' => 1,
					'MgsGirlsData.closed_flg' => 0, 
				)));
		foreach($girls_data as $girl_data) {
			$girl_detail_data = array();
			$girl_detail_data = $this->get_girl_detail_data_from_data($girl_data, $user_name);
			array_push($girls_detail_data, $girl_detail_data);
		}
		usort($girls_detail_data, array($this, "_comp_girl_by_point"));
		return $girls_detail_data;
	}

	function _comp_girl_by_point($a, $b) {
		if($a['point'] > $b['point']) {
			return 1;
		}elseif($a['point'] < $b['point']) {
			return -1;
		} else {
			return 0;
		}
		return 0;
	}

	#Return face type of the girl based on point percentage
	function get_girl_face_type($point_percent) {
		$face_type;
		$girl_face_types = array();
 		$girl_face_types =  Configure::read('GirlFaceType');
		ksort($girl_face_types);
		$buttom_value = -1;
		foreach($girl_face_types as $key => $value) {
			if($buttom_value < $point_percent && $point_percent <= $value) {
				$face_type = $key;
				$buttom_value = $value;
			}
		}
		return $face_type;
	}

	#Return top point girls of each types of girls
	#It would be used on top page
	function get_top_girls_data($girls_detail_data) {
		$top_girls_data = array();
		for($i=1; $i<= Configure::read('girls_type_num'); $i++) {
			foreach($girls_detail_data as $girl_detail_data) {
				if($girl_detail_data['type'] == $i) {
					$top_girls_data[$i] = $girl_detail_data;	
				}
			}
		}
		return $top_girls_data;
	}

	#Return girl data using girl_data_id
	function get_girl_detail_data_from_id_by_user_id($girl_id, $user_id, $user_name) {
		$girl_data = array();
		$girl_detail_data = array();
		$count = $this->controller->MgsGirlsData->find('count', array('conditions' => array(
			'MgsGirlsData.girl_id' => $girl_id, 
			'MgsGirlsData.user_id' => $user_id)));
		if($count > 0) {
			$girl_data = $this->controller->MgsGirlsData->find('first', array('conditions' => array(
				'MgsGirlsData.girl_id' => $girl_id, 
				'MgsGirlsData.user_id' => $user_id)));
		} else {
			$girl_data = array();
			$girl_data['MgsGirlsData']['girl_id'] = $girl_id;
			$girl_data['MgsGirlsData']['user_id'] = $user_id;
			$girl_data['MgsGirlsData']['current_date_id'] = $girl_id;
			$girl_data['MgsGirlsData']['current_date_id'] = $girl_id;
			$this->controller->MgsGirlsData->save($girl_data);
			$girl_data['MgsGirlsData']['id'] = $this->controller->MgsGirlsData->getLastInsertId();
		}
		$girl_detail_data = $this->get_girl_detail_data_from_data($girl_data, $user_name);
		return $girl_detail_data;
	}

	function get_girl_list_for_listing($actual_girl_data_list) {
		$girls_list = array();
		foreach($actual_girl_data_list as $actual_girl) {
			$girl_master = $this->controller->MgsGirlMaster->find('first', array('conditions' => array(
				'MgsGirlMaster.id' => $actual_girl['MgsActualGirlsData']['girl_master_id'],
			)));
			$girl_data = $this->controller->MgsGirlsData->find('first', array('conditions' => array(
				'MgsGirlsData.girl_id'   => $actual_girl['MgsActualGirlsData']['id'],
				'MgsGirlsData.owner_flg' => 1,
			)));
			$girl_detail_data = $this->_combine_girl_master_and_data($girl_data, $girl_master);
			array_push($girls_list, $girl_detail_data);
		}
		return $girls_list;

	}

	#Add master data to girl detail data
	function get_girl_detail_data_from_data($girl_data, $user_name) {
		$girl_detail_data = array();
		$actual_girl_data = $this->controller->MgsActualGirlsData->find('first', array('conditions' => array(
			'MgsActualGirlsData.id' => $girl_data['MgsGirlsData']['girl_id'],
		)));
		$girl_master = $this->controller->MgsGirlMaster->find('first', array('conditions' => array(
			'MgsGirlMaster.id' => $actual_girl_data['MgsActualGirlsData']['girl_master_id'],
		)));
		$girl_detail_data = $this->_combine_girl_master_and_data($girl_data, $girl_master);
		$girl_comments = $this->controller->MgsGirlCommentMaster->find('all', array('conditions' => array(
			'MgsGirlCommentMaster.girl_id' => $girl_detail_data['girl_id'],
			'MgsGirlCommentMaster.face_id' => $girl_detail_data['face_id'],
		)));
		$girl_comment_rand_key = array_rand($girl_comments);
		$girl_detail_data['comment'] = str_replace('##user_name##', $user_name, $girl_comments[$girl_comment_rand_key]['MgsGirlCommentMaster']['comment']);
		return $girl_detail_data;
	}

	#Return girl type name using type and stage_id
	function get_girl_type_name($type, $stage_id) {
		$type_name;
		$girl_types = array();
 		$girl_types =  Configure::read('GirlTypeName');
		$girl_types_current = $girl_types[$stage_id];
		foreach($girl_types_current as $key => $value) {
			if($key == $type) {
				return $value;
			}
		}
	}

	function get_new_date_data($stage_id) {
		$date_masters = $this->controller->MgsDateMaster->find('all', array('conditions' => array('MgsDateMaster.stage_id' => $stage_id)));
		$date_master_rand_key = array_rand($date_masters);
		return $date_masters[$date_master_rand_key];
	}

	function get_date_master_from_id($date_id) {
		$date_master = $this->controller->MgsDateMaster->find('first', array('conditions' => array('MgsDateMaster.id' => $date_id)));
		return $date_master;
	}

	function get_date_result($girl_detail_data) {
		#Values to be calculated on this method
		$date_percent_obtained;
		$girl_point_obtained;
		$exp_obtained;
		$enegy_spent;
		$gold_spent;
		$output = 3; # 3->成功 2->普通 1->失敗
		$clear_flg = 0;

		#Caluculate clear percent of the date obatined in this execution
		$current_date_master = $this->get_date_master_from_id($girl_detail_data['current_date_id']);
		if($output == 3) {
			$date_percent_obtained = max(1,floor(100/$current_date_master['MgsDateMaster']['clear_count']) * 1.5);
		} elseif($output == 2) {
			$date_percent_obtained = max(1,floor(100/$current_date_master['MgsDateMaster']['clear_count']) * 1.0);
		} else {
			$date_percent_obtained = 0;
		}

		#See if the date was cleared
		if($date_percent_obtained + $girl_detail_data['current_date_percent'] >= 100) {
			$clear_flg = 1;
		}

		#Calculate girl satisfaction point obtained in this execution
		$girl_point_obtained = $this->get_girl_point_obtained_in_date($current_date_master);;

		#Set other attributes
		$exp_obtained = $current_date_master['MgsDateMaster']['exp_up'];
		$energy_spent = $current_date_master['MgsDateMaster']['energy_spent'];
		$gold_spent = $current_date_master['MgsDateMaster']['gold_spent'];

		#Set up result hash
		$result = array();
		$result['id']                    = $girl_detail_data['current_date_id'];
		$result['date_percent_obtained'] = $date_percent_obtained;
		$result['girl_point_obtained']   = $girl_point_obtained;
		$result['exp_obtained']          = $exp_obtained;
		$result['energy_spent']          = $energy_spent;
		$result['gold_spent']            = $gold_spent;
		$result['clear_flg']             = $clear_flg;
		$result['output']                = $output;
		return $result;

	}
	function get_girl_point_obtained_in_date($date_master) {
		$girl_point_obtained = max(1, floor($date_master['MgsDateMaster']['point_up_max'] * rand(50, 100)/100));
		return $girl_point_obtained;
	}

	function insert_new_girl_data($game_user_id, $stage_id) {
		$girl_masters = $this->controller->MgsGirlMaster->find('all', array('conditions' => array('MgsGirlMaster.stage_id' => 1,'MgsGirlMaster.princess_flg' => 0)));
		$rand_key = array_rand($girl_masters);
		$girl_given = $girl_masters[$rand_key];
		$new_actual_girl_data = array();
		$new_actual_girl_data['girl_master_id'] = $girl_given['MgsGirlMaster']['id'];
		$new_actual_girl_data['stage_id'] = $girl_given['MgsGirlMaster']['stage_id'];
		$this->controller->MgsActualGirlsData->save($new_actual_girl_data);
		$new_girl_id = $this->controller->MgsActualGirlsData->getLastInsertId();

		$new_date_data = $this->get_new_date_data($stage_id);
		$new_girl_data = array();
		$new_girl_data["girl_id"]              = $new_girl_id;
		$new_girl_data["user_id"]              = $game_user_id;
		$new_girl_data["owner_flg"]            = 1;
		$new_girl_data["current_date_id"]      = $new_date_data['MgsDateMaster']['id'];
		$new_girl_data["current_date_percent"] = 0;
		$init_girl_data = $this->controller->MgsGirlsData->save($new_girl_data);
		return $init_girl_data;
	}

	function get_date_comment($output, $date_name, $user_name) {
 		$girl_date_comments =  Configure::read('GirlDateComment');
		$girl_date_comments_output = $girl_date_comments[$output];
		$girl_comment_rand_key = array_rand($girl_date_comments_output);
		$comment = $girl_date_comments_output[$girl_comment_rand_key];
		$comment = str_replace('##user_name##', $user_name, $comment);
		$comment = str_replace('##date_name##', $date_name, $comment);
		return $comment;
	}

	#ToDo logic to calculate level
	function get_level_from_xp($exp) {
		return floor($exp/20);
	}

	#TODO level up logic
	function is_level_up($exp_before, $exp_obtained) {
		$level_before = $this->get_level_from_xp($exp_before);
		$level_after  = $this->get_level_from_xp($exp_before + $exp_obtained);
		if($level_after > $level_before) {
			return 1;
		}
		return 0;
	}

	function cal_user_charm($game_user_data) {
		$charm = 0;
		$user_trainings = $this->controller->MgsUserTraining->find('all', array('conditions' => array(
				'MgsUserTraining.user_id' => $game_user_data['MgsUser']['id'],
				'MgsUserTraining.use_remain >' => 0,
				)));
		$user_training_detail_list = $this->get_training_detail_list($user_trainings);
		usort($user_training_detail_list, array($this, "_comp_training_by_effect"));
		$count1 = 0;
		$count2 = 0;
		$count3 = 0;
		foreach($user_training_detail_list as $training) {
			if($count1 == $game_user_data['MgsUser']['skill1'] && $count2 == $game_user_data['MgsUser']['skill2'] && 
				$count2 == $game_user_data['MgsUser']['skill2']) {
					break;
			}

			if($training['category'] == 1) {
				if($count1 == $game_user_data['MgsUser']['skill1']) {
					continue;
				}
				$charm += $training['effect'];
				$count1++;
			} elseif($training['catrgory'] == 2) {
				if($count2 == $game_user_data['MgsUser']['skill2']) {
					continue;
				}
				$charm += $training['effect'];
				$count2++;
			} else {
				if($count3 == $game_user_data['MgsUser']['skill3']) {
					continue;
				}
				$charm += $training['effect'];
				$count3++;
			}


		}
		return $charm;
	}

	function _comp_training_by_effect($a, $b) {
		if($a['effect'] > $b['effect']) {
			return 1;
		}elseif($a['effect'] < $b['effect']) {
			return -1;
		} else {
			return 0;
		}
		return 0;
	}

	function get_training_detail_list($user_trainings) {
		$training_detail_list = array();
		foreach($user_trainings as $user_training) {
			$training_detail = $this->get_training_detail($user_training);
			array_push($training_detail_list, $training_detail);
		}
		return $training_detail_list;
	}
	function get_training_detail($user_training) {
		$training_id = $user_training['MgsUserTraining']['training_id'];
		$training_master = $this->controller->MgsTrainingMaster->find('first', array('conditions' => array(
				'MgsTrainingMaster.id' => $user_training['MgsUserTraining']['training_id'],
				)));
		$user_training_detail = array();
		$user_training_detail['name']       = $training_master['MgsTrainingMaster']['name'];
		$user_training_detail['category']   = $training_master['MgsTrainingMaster']['category'];
		$user_training_detail['type']       = $training_master['MgsTrainingMaster']['type'];
		$user_training_detail['price']      = $training_master['MgsTrainingMaster']['price'];
		$user_training_detail['effect']     = $training_master['MgsTrainingMaster']['effect'];
		$user_training_detail['use_num'] = $training_master['MgsTrainingMaster']['use_num'];
		$user_training_detail['use_remain'] = $user_training['MgsUserTraining']['use_remain'];
		return $user_training_detail;	
	}

	function get_user_training_details($user_trainings) {
		$user_training_details = array();
		$training_masters = $this->controller->MgsTrainingMaster->find('all');
		foreach($user_trainings as $training) {
			$training_detail;
			foreach($training_masters as $master) {
				if($master['MgsTrainingMaster']['id'] == $training['MgsUserTraining']['training_id']) {
					$training_detail['id']              = $training['MgsUserTraining']['id'];
					$training_detail['training_id']     = $master['MgsTrainingMaster']['id'];
					$training_detail['type']            = $master['MgsTrainingMaster']['type'];
					$training_detail['name']            = $master['MgsTrainingMaster']['name'];
					$training_detail['description']     = $master['MgsTrainingMaster']['description'];
					$training_detail['effect']          = $master['MgsTrainingMaster']['effect'];
					$training_detail['use_num']         = $master['MgsTrainingMaster']['use_num'];
					$training_detail['stage_id_from']   = $master['MgsTrainingMaster']['stage_id_from'];
					$training_detail['stage_id_to']     = $master['MgsTrainingMaster']['stage_id_to'];
					$training_detail['use_remain']      = $training['MgsUserTraining']['use_remain'];
					array_push($user_training_details, $training_detail);
				}
			}
		}
		return $user_training_details;
	}
	function get_user_item_details($user_items) {
		$user_item_details = array();
		$item_masters = $this->controller->MgsItemMaster->find('all');
		foreach($user_items as $item) {
			$item_detail;
			foreach($item_masters as $master) {
				if($master['MgsItemMaster']['id'] == $item['MgsUserItem']['item_id']) {
					$item_detail['id']          = $item['MgsUserItem']['id'];
					$item_detail['item_id']     = $master['MgsItemMaster']['id'];
					$item_detail['name']        = $master['MgsItemMaster']['name'];
					$item_detail['type']        = $master['MgsItemMaster']['type'];
					$item_detail['description'] = $master['MgsItemMaster']['description'];
					$item_detail['use_num']     = $master['MgsItemMaster']['use_num'];
					$item_detail['use_remain']  = $item['MgsUserItem']['use_remain'];
					array_push($user_item_details, $item_detail);
				}
			}
		}
		return $user_item_details;
	}

	function get_user_present_details($user_presents) {
		$user_present_details = array();
		$present_masters = $this->controller->MgsPresentMaster->find('all');
		foreach($user_presents as $present) {
			$present_detail;
			foreach($present_masters as  $master) {
				if($master['MgsPresentMaster']['id'] == $present['MgsUserPresent']['present_id']) {
					$present_detail['id']          = $present['MgsUserPresent']['id'];
					$present_detail['present_id']  = $master['MgsPresentMaster']['id'];
					$present_detail['name']        = $master['MgsPresentMaster']['name'];
					$present_detail['effect']      = $master['MgsPresentMaster']['effect'];
					$present_detail['type']        = $master['MgsPresentMaster']['type'];
					$present_detail['description'] = $master['MgsPresentMaster']['description'];
					array_push($user_present_details, $present_detail);
				}
			}
		}
		return $user_present_details;
	}

	function get_user_training_detail($user_training) {
		$training_detail = array();
		$training_master = $this->controller->MgsTrainingMaster->find('first', array('conditions' => array(
				'MgsTrainingMaster.id'       => $user_training['MgsUserTraining']['training_id'],
			)));
		$training_detail['id']              = $user_training['MgsUserTraining']['id'];
		$training_detail['training_id']     = $training_master['MgsTrainingMaster']['id'];
		$training_detail['name']            = $training_master['MgsTrainingMaster']['name'];
		$training_detail['description']     = $training_master['MgsTrainingMaster']['description'];
		$training_detail['effect']          = $training_master['MgsTrainingMaster']['effect'];
		$training_detail['type']            = $training_master['MgsTrainingMaster']['type'];
		$training_detail['use_num']         = $training_master['MgsTrainingMaster']['use_num'];
		$training_detail['stage_id_from']   = $training_master['MgsTrainingMaster']['stage_id_from'];
		$training_detail['stage_id_to']     = $training_master['MgsTrainingMaster']['stage_id_to'];
		$training_detail['use_remain']      = $user_training['MgsUserTraining']['use_remain'];
		return $training_detail;
	}

	function get_user_present_detail($user_present) {
		$present_detail = array();
		$present_master = $this->controller->MgsPresentMaster->find('first', array('conditions' => array(
				'MgsPresentMaster.id'       => $user_present['MgsUserPresent']['present_id'],
			)));
		$present_detail['id']          = $user_present['MgsUserPresent']['id'];
		$present_detail['present_id']  = $present_master['MgsPresentMaster']['id'];
		$present_detail['name']        = $present_master['MgsPresentMaster']['name'];
		$present_detail['effect']      = $present_master['MgsPresentMaster']['effect'];
		$present_detail['type']      = $present_master['MgsPresentMaster']['type'];
		$present_detail['description'] = $present_master['MgsPresentMaster']['description'];

		return $present_detail;
	}

	function get_user_item_detail($user_item) {
		$item_detail = array();
		$item_master = $this->controller->MgsItemMaster->find('first', array('conditions' => array(
				'MgsItemMaster.id'       => $user_item['MgsUserItem']['item_id'],
			)));
		$item_detail['id']          = $user_item['MgsUserItem']['id'];
		$item_detail['item_id']     = $item_master['MgsItemMaster']['id'];
		$item_detail['name']        = $item_master['MgsItemMaster']['name'];
		$item_detail['type']        = $item_master['MgsItemMaster']['type'];
		$item_detail['description'] = $item_master['MgsItemMaster']['description'];
		$item_detail['use_num']     = $item_master['MgsItemMaster']['use_num'];
		$item_detail['use_remain']  = $user_item['MgsUserItem']['use_remain'];

		return $item_detail;
	}
	function get_present_effect($effect, $girl_data) {
		return $effect;
	}

	function _combine_girl_master_and_data($girl_data, $girl_master) {
		#Store master data
		$girl_detail_data['girl_master_id']           =  $girl_master['MgsGirlMaster']['id'];
		$girl_detail_data['stage_id']          =  $girl_master['MgsGirlMaster']['stage_id'];
		$girl_detail_data['princess_flg']      =  $girl_master['MgsGirlMaster']['princess_flg'];
		$girl_detail_data['name']              =  $girl_master['MgsGirlMaster']['name'];
		$girl_detail_data['type']              =  $girl_master['MgsGirlMaster']['type'];
		$girl_detail_data['type_name']         =  $this->get_girl_type_name($girl_master['MgsGirlMaster']['type'], $girl_master['MgsGirlMaster']['stage_id']);
		$girl_detail_data['required_point']    =  $girl_master['MgsGirlMaster']['required_point'];
		$girl_detail_data['favorite_item_id1'] =  $girl_master['MgsGirlMaster']['favorite_item_id1'];
		$girl_detail_data['favorite_item_id2'] =  $girl_master['MgsGirlMaster']['favorite_item_id2'];
		$girl_detail_data['favorite_item_id3'] =  $girl_master['MgsGirlMaster']['favorite_item_id3'];
		$girl_detail_data['favorite_item_id4'] =  $girl_master['MgsGirlMaster']['favorite_item_id4'];
		$girl_detail_data['favorite_item_id5'] =  $girl_master['MgsGirlMaster']['favorite_item_id5'];

		#Store living data
		$girl_detail_data['id']                    =  $girl_data['MgsGirlsData']['id'];
		$girl_detail_data['girl_id']               =  $girl_data['MgsGirlsData']['girl_id'];
		$girl_detail_data['user_id']               =  $girl_data['MgsGirlsData']['user_id'];
		$girl_detail_data['owner_flg']             =  $girl_data['MgsGirlsData']['owner_flg'];
		$girl_detail_data['current_date_id']       =  $girl_data['MgsGirlsData']['current_date_id'];
		$girl_detail_data['current_date_percent']  =  $girl_data['MgsGirlsData']['current_date_percent'];
		$girl_detail_data['point']                 =  $girl_data['MgsGirlsData']['point'];
		$girl_detail_data['point_updated']         =  $girl_data['MgsGirlsData']['point_updated'];
		$girl_detail_data['fav_item_given_date']   =  $girl_data['MgsGirlsData']['fav_item_given_date'];
		$girl_detail_data['fav_item_given_id']     =  $girl_data['MgsGirlsData']['fav_item_given_date'];
		$girl_detail_data['guard_num']             =  $girl_data['MgsGirlsData']['guard_num'];

		#Other detailed information
		$girl_detail_data['point_percent'] = floor($girl_detail_data['point'] / $girl_detail_data['required_point']);
		$girl_detail_data['face_id'] = $this->get_girl_face_type($girl_detail_data['point_percent']);
		return $girl_detail_data;
	}

	function judge_approach($my_game_user_data, $enemy_game_user_data, $my_girl_data, $enemy_girl_data, $energy_spent) {
		$my_max_energy = $my_game_user_data['MgsUserData']['energy'];
		$my_charm1     = $my_game_user_data['MgsUserData']['charm1'];
		$my_charm2     = $my_game_user_data['MgsUserData']['charm2'];
		$my_charm3     = $my_game_user_data['MgsUserData']['dcharm3'];

		$enemy_charm1 = $enemy_game_user_data['MgsUserData']['charm1'];
		$enemy_charm2 = $enemy_game_user_data['MgsUserData']['charm2'];
		$enemy_charm3 = $enemy_game_user_data['MgsUserData']['dcharm3'];

		$my_girl_point    = $my_girl_data['point'];
		$enemy_girl_point = $enemy_girl_data['point'];
		$girl_max_point   = $my_girl_data['required_point'];

		#Calucult the result
		$energy_percent = $energy_spent/$my_max_energy;
		$point_percent  = $my_girl_point/$girl_max_point;
		$rand_value1  =rand(50, 150)/100
		$rand_value2  =rand(50, 150)/100
		$rand_value3  =rand(50, 150)/100
		$my_charm1_out = $my_charm1 * $energy_percent * $point_percent * $rand_value1;
		$my_charm2_out = $my_charm1 * $energy_percent * $point_percent * $rand_value2;
		$my_charm3_out = $my_charm1 * $energy_percent * $point_percent * $rand_value3;

		$enemy_charm1_out = $enemy_charm1 * $energy_percent * $point_percent;
		$enemy_charm2_out = $enemy_charm2 * $energy_percent * $point_percent;
		$enemy_charm3_out = $enemy_charm3 * $energy_percent * $point_percent;

		if($my_charm1_out == $enemy_charm1_out && $my_charm1_out == $enemy_charm1_out && $my_charm1_out == $enemy_charm1_out) {
			$my_charm1_out++;
		}

		$win_count = 0;
		if($my_charm1_out > $enemy_charm1_out) {
			$win_count++;
		}
		if($my_charm2_out > $enemy_charm2_out) {
			$win_count++;
		}
		if($my_charm3_out > $enemy_charm3_out) {
			$win_count++;
		}
		$is_win = 0;
		if($win_count > 1) {
			$is_win = 1;
		}

		$result = {
			'is_win'           => $is_win,
			'my_charm1_out'    => $my_charm1_out,
			'my_charm2_out'    => $my_charm2_out,
			'my_charm3_out'    => $my_charm3_out,
			'enemy_charm1_out' => $enemy_charm1_out,
			'enemy_charm2_out' => $enemy_charm2_out,
			'enemy_charm3_out' => $enemy_charm3_out,
		};

		return $result;
	}
}
?>
