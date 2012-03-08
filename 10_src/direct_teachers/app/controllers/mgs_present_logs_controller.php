<?php
class MgsPresentLogsController extends AppController {

	var $name = 'MgsPresentLogs';

	function index() {
		$this->MgsPresentLog->recursive = 0;
		$this->set('mgsPresentLogs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs present log', true), array('action' => 'index'));
		}
		$this->set('mgsPresentLog', $this->MgsPresentLog->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsPresentLog->create();
			if ($this->MgsPresentLog->save($this->data)) {
				$this->flash(__('Mgspresentlog saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs present log', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsPresentLog->save($this->data)) {
				$this->flash(__('The mgs present log has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsPresentLog->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs present log', true)), array('action' => 'index'));
		}
		if ($this->MgsPresentLog->delete($id)) {
			$this->flash(__('Mgs present log deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs present log was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
