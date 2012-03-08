<?php
class MgsGirlsDatasController extends AppController {

	var $name = 'MgsGirlsDatas';

	function index() {
		$this->MgsGirlsData->recursive = 0;
		$this->set('mgsGirlsDatas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs girls data', true), array('action' => 'index'));
		}
		$this->set('mgsGirlsData', $this->MgsGirlsData->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsGirlsData->create();
			if ($this->MgsGirlsData->save($this->data)) {
				$this->flash(__('Mgsgirlsdata saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs girls data', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsGirlsData->save($this->data)) {
				$this->flash(__('The mgs girls data has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsGirlsData->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs girls data', true)), array('action' => 'index'));
		}
		if ($this->MgsGirlsData->delete($id)) {
			$this->flash(__('Mgs girls data deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs girls data was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
