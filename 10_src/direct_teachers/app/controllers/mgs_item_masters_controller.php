<?php
class MgsItemMastersController extends AppController {

	var $name = 'MgsItemMasters';

	function index() {
		$this->MgsItemMaster->recursive = 0;
		$this->set('mgsItemMasters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs item master', true), array('action' => 'index'));
		}
		$this->set('mgsItemMaster', $this->MgsItemMaster->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsItemMaster->create();
			if ($this->MgsItemMaster->save($this->data)) {
				$this->flash(__('Mgsitemmaster saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs item master', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsItemMaster->save($this->data)) {
				$this->flash(__('The mgs item master has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsItemMaster->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs item master', true)), array('action' => 'index'));
		}
		if ($this->MgsItemMaster->delete($id)) {
			$this->flash(__('Mgs item master deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs item master was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
