<?php
class MgsPresentMastersController extends AppController {

	var $name = 'MgsPresentMasters';

	function index() {
		$this->MgsPresentMaster->recursive = 0;
		$this->set('mgsPresentMasters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs present master', true), array('action' => 'index'));
		}
		$this->set('mgsPresentMaster', $this->MgsPresentMaster->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsPresentMaster->create();
			if ($this->MgsPresentMaster->save($this->data)) {
				$this->flash(__('Mgspresentmaster saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs present master', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsPresentMaster->save($this->data)) {
				$this->flash(__('The mgs present master has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsPresentMaster->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs present master', true)), array('action' => 'index'));
		}
		if ($this->MgsPresentMaster->delete($id)) {
			$this->flash(__('Mgs present master deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs present master was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
