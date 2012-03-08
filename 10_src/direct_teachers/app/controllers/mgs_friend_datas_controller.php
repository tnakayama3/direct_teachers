<?php
class MgsFriendDatasController extends AppController {

	var $name = 'MgsFriendDatas';

	function index() {
		$this->MgsFriendData->recursive = 0;
		$this->set('mgsFriendDatas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs friend data', true), array('action' => 'index'));
		}
		$this->set('mgsFriendData', $this->MgsFriendData->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsFriendData->create();
			if ($this->MgsFriendData->save($this->data)) {
				$this->flash(__('Mgsfrienddata saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs friend data', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsFriendData->save($this->data)) {
				$this->flash(__('The mgs friend data has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsFriendData->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs friend data', true)), array('action' => 'index'));
		}
		if ($this->MgsFriendData->delete($id)) {
			$this->flash(__('Mgs friend data deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs friend data was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
