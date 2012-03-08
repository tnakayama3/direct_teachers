<?php
class MgsGirlCommentMastersController extends AppController {

	var $name = 'MgsGirlCommentMasters';

	function index() {
		$this->MgsGirlCommentMaster->recursive = 0;
		$this->set('mgsGirlCommentMasters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs girl comment master', true), array('action' => 'index'));
		}
		$this->set('mgsGirlCommentMaster', $this->MgsGirlCommentMaster->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsGirlCommentMaster->create();
			if ($this->MgsGirlCommentMaster->save($this->data)) {
				$this->flash(__('Mgsgirlcommentmaster saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs girl comment master', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsGirlCommentMaster->save($this->data)) {
				$this->flash(__('The mgs girl comment master has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsGirlCommentMaster->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs girl comment master', true)), array('action' => 'index'));
		}
		if ($this->MgsGirlCommentMaster->delete($id)) {
			$this->flash(__('Mgs girl comment master deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs girl comment master was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
