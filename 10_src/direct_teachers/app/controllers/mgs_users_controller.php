<?php
class MgsUsersController extends AppController {

	var $name = 'MgsUsers';

	function index() {
		$this->MgsUser->recursive = 0;
		$this->set('mgsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs user', true), array('action' => 'index'));
		}
		$this->set('mgsUser', $this->MgsUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsUser->create();
			if ($this->MgsUser->save($this->data)) {
				$this->flash(__('Mgsuser saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs user', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsUser->save($this->data)) {
				$this->flash(__('The mgs user has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsUser->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs user', true)), array('action' => 'index'));
		}
		if ($this->MgsUser->delete($id)) {
			$this->flash(__('Mgs user deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs user was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
