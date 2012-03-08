<?php
class MgsDateMastersController extends AppController {

	var $name = 'MgsDateMasters';

	function index() {
		$this->MgsDateMaster->recursive = 0;
		$this->set('mgsDateMasters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs date master', true), array('action' => 'index'));
		}
		$this->set('mgsDateMaster', $this->MgsDateMaster->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsDateMaster->create();
			if ($this->MgsDateMaster->save($this->data)) {
				$this->flash(__('Mgsdatemaster saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs date master', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsDateMaster->save($this->data)) {
				$this->flash(__('The mgs date master has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsDateMaster->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs date master', true)), array('action' => 'index'));
		}
		if ($this->MgsDateMaster->delete($id)) {
			$this->flash(__('Mgs date master deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs date master was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
