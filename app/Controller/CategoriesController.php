<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $components = array('Paginator');
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','view','add');  
    }
    public function isAuthorized($user) {
	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $categoryId = (int) $this->request->params['pass'][0];	        
	        if ($this->Category->isOwnedBy($categoryId, $user['id'])) {
	            return true;
	       }	
	    }
	    return parent::isAuthorized($user);
	}
	public function index(){
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}
	public function view($id = null){
		$this->Category->id = $id;
		if (!$this->Category->exists($id)){
			throw new NotFoundException(__('Invalid category'));
		}
	    $this->set('category',$this->Category->read());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Category']['user_id'] = $this->Auth->user('id');
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('The category could not be saved. Please, try again.','error2');
			}
		}
		$users = $this->Category->User->find('list');
		$this->set(compact('users'));
	}
	public function edit($id = null){
         

		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash('The category could not be saved. Please, try again.','error2');
			}
		} 
		else {
			$options = array('conditions' => array('Category.'.$this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$users = $this->Category->User->find('list');
		$this->set(compact('users'));
	}
	public function delete($id = null){
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash('The category has been deleted.','success');
		} 
		else {
			$this->Session->setFlash('The category could not be deleted. Please, try again.','error2');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
