<?php
class MgsUserItemsController extends AppController {

	var $name = 'MgsUserItems';

	function index() {
		$this->MgsUserItem->recursive = 0;
		$this->set('mgsUserItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs user item', true), array('action' => 'index'));
		}
		$this->set('mgsUserItem', $this->MgsUserItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsUserItem->create();
			if ($this->MgsUserItem->save($this->data)) {
				$this->flash(__('Mgsuseritem saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs user item', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsUserItem->save($this->data)) {
				$this->flash(__('The mgs user item has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsUserItem->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs user item', true)), array('action' => 'index'));
		}
		if ($this->MgsUserItem->delete($id)) {
			$this->flash(__('Mgs user item deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs user item was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
