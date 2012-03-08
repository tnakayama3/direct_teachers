<?php
class MgsCommentsController extends AppController {

	var $name = 'MgsComments';
	var $needAuth = true;
	function index() {
		$this->MgsComment->recursive = 0;
		$this->set('mgsComments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs comment', true), array('action' => 'index'));
		}
		$this->set('mgsComment', $this->MgsComment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsComment->create();
			if ($this->MgsComment->save($this->data)) {
				$this->flash(__('Mgscomment saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs comment', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsComment->save($this->data)) {
				$this->flash(__('The mgs comment has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsComment->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs comment', true)), array('action' => 'index'));
		}
		if ($this->MgsComment->delete($id)) {
			$this->flash(__('Mgs comment deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs comment was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
