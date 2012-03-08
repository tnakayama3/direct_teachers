<?php
class MgsGirlsIntroductionsController extends AppController {

	var $name = 'MgsGirlsIntroductions';

	function index() {
		$this->MgsGirlsIntroduction->recursive = 0;
		$this->set('mgsGirlsIntroductions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs girls introduction', true), array('action' => 'index'));
		}
		$this->set('mgsGirlsIntroduction', $this->MgsGirlsIntroduction->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsGirlsIntroduction->create();
			if ($this->MgsGirlsIntroduction->save($this->data)) {
				$this->flash(__('Mgsgirlsintroduction saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs girls introduction', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsGirlsIntroduction->save($this->data)) {
				$this->flash(__('The mgs girls introduction has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsGirlsIntroduction->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs girls introduction', true)), array('action' => 'index'));
		}
		if ($this->MgsGirlsIntroduction->delete($id)) {
			$this->flash(__('Mgs girls introduction deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs girls introduction was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
