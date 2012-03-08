<?php
class MgsPurchaseLogsController extends AppController {

	var $name = 'MgsPurchaseLogs';

	function index() {
		$this->MgsPurchaseLog->recursive = 0;
		$this->set('mgsPurchaseLogs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs purchase log', true), array('action' => 'index'));
		}
		$this->set('mgsPurchaseLog', $this->MgsPurchaseLog->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsPurchaseLog->create();
			if ($this->MgsPurchaseLog->save($this->data)) {
				$this->flash(__('Mgspurchaselog saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs purchase log', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsPurchaseLog->save($this->data)) {
				$this->flash(__('The mgs purchase log has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsPurchaseLog->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs purchase log', true)), array('action' => 'index'));
		}
		if ($this->MgsPurchaseLog->delete($id)) {
			$this->flash(__('Mgs purchase log deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs purchase log was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
