<?php
class MgsFriendRequestsController extends AppController {

	var $name = 'MgsFriendRequests';

	function index() {
		$this->MgsFriendRequest->recursive = 0;
		$this->set('mgsFriendRequests', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid mgs friend request', true), array('action' => 'index'));
		}
		$this->set('mgsFriendRequest', $this->MgsFriendRequest->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MgsFriendRequest->create();
			if ($this->MgsFriendRequest->save($this->data)) {
				$this->flash(__('Mgsfriendrequest saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid mgs friend request', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MgsFriendRequest->save($this->data)) {
				$this->flash(__('The mgs friend request has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MgsFriendRequest->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid mgs friend request', true)), array('action' => 'index'));
		}
		if ($this->MgsFriendRequest->delete($id)) {
			$this->flash(__('Mgs friend request deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Mgs friend request was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
