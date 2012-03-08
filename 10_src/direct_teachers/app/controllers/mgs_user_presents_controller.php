<?php
class MgsUserPresentsController extends AppController {

	var $name = 'MgsUserPresents';

	function index() {
		$this->MgsUserPresent->recursive = 0;
		$this->set('mgsUserPresents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs user present', true), array('action' => 'index'));
		}
		$this->set('mgsUserPresent', $this->MgsUserPresent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsUserPresent->create();
			if ($this->MgsUserPresent->save($this->data)) {
				$this->flash(__('Mgsuserpresent saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs user present', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsUserPresent->save($this->data)) {
				$this->flash(__('The mgs user present has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsUserPresent->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs user present', true)), array('action' => 'index'));
		}
		if ($this->MgsUserPresent->delete($id)) {
			$this->flash(__('Mgs user present deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs user present was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
