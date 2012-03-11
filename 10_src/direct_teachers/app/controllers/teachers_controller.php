<?php
class TeachersController extends AppController {

	var $name = 'Teachers';
	var $helpers = array('Formhidden');
	function add1() {
		$my_teacher = $this->Teacher->find('first', array('conditions' => array('Teacher.fb_id' => $this->me['id'])));
		if($my_teacher['Teacher']['fb_id'] > 0) {
			$this->render('registered');
		}

	}
	function add2() {
		$my_teacher = $this->Teacher->find('first', array('conditions' => array('Teacher.fb_id' => $this->me['id'])));
		if($my_teacher['Teacher']['fb_id'] > 0) {
			$this->render('registered');
		}
	}

	function add3() {
		if (!empty($this->data['submit_back'])) {
			$this->redirect(array('action' => 'add1'));
			return;
		}
		$my_teacher = $this->Teacher->find('first', array('conditions' => array('Teacher.fb_id' => $this->me['id'])));
		if($my_teacher['Teacher']['fb_id'] > 0) {
			$this->render('registered');
		}

		#Validation
		$this->Teacher->set($this->data);
		#Validation for checkbox
		$errorMessages = array();
		if(!array_key_exists('elementary', $this->data['Teacher']) &&
		   !array_key_exists('junior', $this->data['Teacher']) &&
		   !array_key_exists('high', $this->data['Teacher'])) {
			$errorMessages['subjects'] = '最低１つは選択してください';
		}
		if(!array_key_exists('day', $this->data['Teacher'])) { 
			$errorMessages['day'] = '最低１つは選択してください';
		}

		if(!$this->Teacher->validates() || count($errorMessages)) {
			$errorMessages = array_merge($errorMessages, $this->Teacher->invalidFields());
			if(array_key_exists('start_year', $errorMessages) ||
			   array_key_exists('start_month', $errorMessages) ||
			   array_key_exists('start_day', $errorMessages)) { 
				$errorMessages['start_date'] = '必須項目です';
				unset($errorMessages['start_year']);
				unset($errorMessages['start_month']);
				unset($errorMessages['start_day']);
			}
			$this->set('errorMessages', $errorMessages);
			$this->setAction('add2');
		}
		#Send back the data to view
		$this->set('data', $this->data);
	}

	function add4() {
		if (!empty($this->data['submit_back'])) {
			$this->redirect(array('action' => 'add2'));
			return;
		}

		$my_teacher = $this->Teacher->find('first', array('conditions' => array('Teacher.fb_id' => $this->me['id'])));
		if($my_teacher['Teacher']['fb_id'] > 0) {
			$this->render('registered');
		}
		if (!empty($this->data)) {
			$new_data = array();
			$new_data['Teacher'] = array();
			$birthday = strtotime($this->me['birthday']);
			$new_data['Teacher']['fb_id']            = $this->me['id'];
			$new_data['Teacher']['email']            = $this->me['email'];
			$new_data['Teacher']['birthday']         = $this->me['birthday'];
			$new_data['Teacher']['first_name']       = $this->me['first_name'];
			$new_data['Teacher']['last_name']        = $this->me['last_name'];
			$new_data['Teacher']['gender']           = $this->me['gender'];
			$new_data['Teacher']['start_year']       = $this->data['Teacher']['start_year'];
			$new_data['Teacher']['start_month']      = $this->data['Teacher']['start_month'];
			$new_data['Teacher']['start_day']        = $this->data['Teacher']['start_day'];
			$new_data['Teacher']['university']       = $this->data['Teacher']['university'];
			$new_data['Teacher']['department']       = $this->data['Teacher']['department'];
			$new_data['Teacher']['study_status']     = $this->data['Teacher']['study_status'];
			$new_data['Teacher']['fee']              = $this->data['Teacher']['fee'];
			$new_data['Teacher']['prefecture']       = $this->data['Teacher']['prefecture'];
			$new_data['Teacher']['area_description'] = $this->data['Teacher']['area_description'];
			$new_data['Teacher']['spot']             = $this->data['Teacher']['spot'];
			$new_data['Teacher']['comment']          = $this->data['Teacher']['comment'];
			if(array_key_exists('elementary', $this->data['Teacher'])) {
				foreach($this->data['Teacher']['elementary'] as $value) {
					if($value == 'ele_math') {
						$new_data['Teacher']['ele_math'] = 1;
					}	
					if($value == 'ele_lang') {
						$new_data['Teacher']['ele_lang'] = 1;
					}	
					if($value == 'ele_science') {
						$new_data['Teacher']['ele_science'] = 1;
					}	
					if($value == 'ele_society') {
						$new_data['Teacher']['ele_society'] = 1;
					}	
					if($value == 'ele_english') {
						$new_data['Teacher']['ele_english'] = 1;
					}	
				}
			}
			if(array_key_exists('junior', $this->data['Teacher'])){
				foreach($this->data['Teacher']['junior'] as $value) {
					if($value == 'junior_math') {
						$new_data['Teacher']['junior_math'] = 1;
					}	
					if($value == 'junior_lang') {
						$new_data['Teacher']['junior_lang'] = 1;
					}	
					if($value == 'junior_science') {
						$new_data['Teacher']['junior_science'] = 1;
					}	
					if($value == 'junior_society') {
						$new_data['Teacher']['junior_society'] = 1;
					}	
					if($value == 'junior_english') {
						$new_data['Teacher']['junior_english'] = 1;
					}	
				}
			}
			if(array_key_exists('high', $this->data['Teacher'])) {
				foreach($this->data['Teacher']['high'] as $value) {
					if($value == 'high_math') {
						$new_data['Teacher']['high_math'] = 1;
					}	
					if($value == 'high_lang') {
						$new_data['Teacher']['high_lang'] = 1;
					}	
					if($value == 'high_english') {
						$new_data['Teacher']['high_english'] = 1;
					}	
					if($value == 'high_physics') {
						$new_data['Teacher']['high_physics'] = 1;
					}	
					if($value == 'high_chemistry') {
						$new_data['Teacher']['high_chemistry'] = 1;
					}	
					if($value == 'high_biology') {
						$new_data['Teacher']['high_biology'] = 1;
					}	
					if($value == 'high_geography') {
						$new_data['Teacher']['high_geography'] = 1;
					}	
					if($value == 'high_jp_history') {
						$new_data['Teacher']['high_jp_history'] = 1;
					}	
					if($value == 'high_world_history') {
						$new_data['Teacher']['high_world_history'] = 1;
					}	
				}
			}

			if(array_key_exists('juken', $this->data['Teacher'])) {
				foreach($this->data['Teacher']['juken'] as $value) {
					if($value == 'juken_junior') {
						$new_data['Teacher']['juken_junior'] = 1;
					}	
					if($value == 'juken_high') {
						$new_data['Teacher']['juken_high'] = 1;
					}	
					if($value == 'juken_univ') {
						$new_data['Teacher']['juken_univ'] = 1;
					}	
				}
			}
			foreach($this->data['Teacher']['day'] as $value) {
				if($value == 'monday') {
					$new_data['Teacher']['monday'] = 1;
				}	
				if($value == 'thuesday') {
					$new_data['Teacher']['thuesday'] = 1;
				}	
				if($value == 'wednesday') {
					$new_data['Teacher']['wednesday'] = 1;
				}	
				if($value == 'thursday') {
					$new_data['Teacher']['thursday'] = 1;
				}	
				if($value == 'friday') {
					$new_data['Teacher']['friday'] = 1;
				}	
				if($value == 'saturday') {
					$new_data['Teacher']['saturday'] = 1;
				}	
				if($value == 'sunday') {
					$new_data['Teacher']['sunday'] = 1;
				}	
			}
			#For testing 
			$this->Teacher->create();
			if ($this->Teacher->save($new_data)) {

			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.', true));
			}
		}


	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid teacher', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Teacher->save($this->data)) {
				$this->Session->setFlash(__('The teacher has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Teacher->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for teacher', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Teacher->delete($id)) {
			$this->Session->setFlash(__('Teacher deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Teacher was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
