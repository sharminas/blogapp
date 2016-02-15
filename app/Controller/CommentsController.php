<?php
App::uses('AppController', 'Controller');
class CommentsController extends AppController {
	public $components = array('Paginator', 'Flash', 'Session');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view','index');  
    }
	public function index() {
	   	$this->Comment->recursive = 0;
		 $this->set('comments', $this->Paginator->paginate());
	}
	  public function isAuthorized($user) {
    	if ($this->action === 'add') {
	        return true;
        }
	    if (in_array($this->action, array('edit','delete'))) {
	        $articleId = (int) $this->request->params['pass'][0];	
	        if($this->Article->isOwnedBy($articleId,$user['id'])) {
	           return true;
	       }	
	    }
	    return parent::isAuthorized($user);
	}
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
        $this->set('articles',$this->Comment->findAllById($id));
	    $comment=$this->Comment->Article->find('all');
	    $this->set(compact('comment'));
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}
    public function all_comment($id= null){
		$this->Comment->id = $id;
		if (!$this->Comment->exists($id)) {
		}
	    // $this->set('articles',$this->Comment->findAllById($id));
	    $comment=$this->Comment->Article->find('all');
	    $this->set(compact('comment'));
	}
	public function filter_commentbyId(){
	//	if(!empty($this->params->query['art_id']) && isset($this->params->query['art_id'])){
	// 		$where['Comment.article_id'] = $this->params->query['art_id'];
	// 	}
	//     $comment = $this->Comment->find('all');
	// 	$this->set(compact('comment'));
	// }
	  $comments = $this->Comment->find('all', array(
		        'conditions' => array('Comment.created >' => date('Y-m-d', strtotime("-1 weeks"))),
		        'order' => array('Comment.created' => 'desc'),
		        'limit' => 5));  
		$this->set(compact('comments'));
	}
	public function add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('The comment has been saved.','success');
			    $this->redirect('/articles/index');
			} else {
				$this->Session->setFlash('The comment could not be saved. Please, try again.','error');
			}
		}
		$articles = $this->Comment->Article->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('articles', 'users'));
	}
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))){
			if($this->Comment->save($this->request->data)){
				$this->Flash->success(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}else{
				$this->Flash->error(__('The comment could not be saved. Please, try again.'));
			}
		}else{
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$articles = $this->Comment->Article->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('articles', 'users'));
	}
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Flash->success(__('The comment has been deleted.'));
		} else {
			$this->Flash->error(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
