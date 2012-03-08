<?php
class MgsGirlsPresentsController extends AppController {

	var $name = 'MgsGirlsPresents';

	function index() {
		$this->MgsGirlsPresent->recursive = 0;
		$this->set('mgsGirlsPresents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs girls present', true), array('action' => 'index'));
		}
		$this->set('mgsGirlsPresent', $this->MgsGirlsPresent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsGirlsPresent->create();
			if ($this->MgsGirlsPresent->save($this->data)) {
				$this->flash(__('Mgsgirlspresent saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs girls present', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsGirlsPresent->save($this->data)) {
				$this->flash(__('The mgs girls present has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsGirlsPresent->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs girls present', true)), array('action' => 'index'));
		}
		if ($this->MgsGirlsPresent->delete($id)) {
			$this->flash(__('Mgs girls present deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs girls present was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
