<?php
class MgsRealcoinsController extends AppController {

	var $name = 'MgsRealcoins';

	function index() {
		$this->MgsRealcoin->recursive = 0;
		$this->set('mgsRealcoins', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs realcoin', true), array('action' => 'index'));
		}
		$this->set('mgsRealcoin', $this->MgsRealcoin->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsRealcoin->create();
			if ($this->MgsRealcoin->save($this->data)) {
				$this->flash(__('Mgsrealcoin saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs realcoin', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsRealcoin->save($this->data)) {
				$this->flash(__('The mgs realcoin has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsRealcoin->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs realcoin', true)), array('action' => 'index'));
		}
		if ($this->MgsRealcoin->delete($id)) {
			$this->flash(__('Mgs realcoin deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs realcoin was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
