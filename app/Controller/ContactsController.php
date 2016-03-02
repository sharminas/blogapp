<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {
		public $components = array('Paginator', 'Flash', 'Session');
     public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');  
    }

	public function index(){
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->Paginator->paginate());
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('Your message  has been saved.'),'success');
			    $this->redirect('/articles/index');
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'),'error');
			}
		}
	}
	public function edit($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Theres a problem, Sorry.'));
		}
		if ($this->request->is(array('post', 'put'))){
			if($this->Contact->save($this->request->data)){
				$this->Flash->success(__('Your message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}else{
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}else{
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
		}
	}
	public function delete($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid Contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Flash->success(__('The message has been deleted.'));
		} else {
			$this->Flash->error(__('The message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
