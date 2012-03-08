<?php
class MgsGirlMastersController extends AppController {

	var $name = 'MgsGirlMasters';

	function index() {
		$this->MgsGirlMaster->recursive = 0;
		$this->set('mgsGirlMasters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs girl master', true), array('action' => 'index'));
		}
		$this->set('mgsGirlMaster', $this->MgsGirlMaster->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsGirlMaster->create();
			if ($this->MgsGirlMaster->save($this->data)) {
				$this->flash(__('Mgsgirlmaster saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs girl master', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsGirlMaster->save($this->data)) {
				$this->flash(__('The mgs girl master has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsGirlMaster->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs girl master', true)), array('action' => 'index'));
		}
		if ($this->MgsGirlMaster->delete($id)) {
			$this->flash(__('Mgs girl master deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs girl master was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
