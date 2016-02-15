<?php
App::uses('AppController', 'Controller');

class ArticlesController extends AppController {
	public $helpers = array('Like.like');
	public $components = array('Paginator');
	public function beforeFilter() {
    	parent::beforeFilter();
        $this->Auth->allow('index','view','index_filter','search'); 
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
	public function index() {
        $this->paginate = array(
		'order' => array('Article.created' => 'desc'),
        'limit' => 5);
	     $pagiArticle = $this->paginate('Article');
	     $this->set('articles', $pagiArticle);	
    }
    public function index_filter() {
		$where['status'] = 0;
		if(!empty($this->params->query['month']) && isset($this->params->query['month'])){
			$where['month(Article.created)'] = $this->params->query['month'];
		}
		if(!empty($this->params->query['cat_id']) && isset($this->params->query['cat_id'])){
			$where['Article.category_id'] = $this->params->query['cat_id'];
		}
		$articles = $this->Article->find('all', array(
		        'conditions' => $where,
		        'order' => array('Article.created' => 'desc'),
		        'limit' => 5));  
        $this->set('articles', $articles);

    }
	public function recent(){
	   $articles = $this->Article->find('all', array(
		        'conditions' => array('Article.created >' => date('Y-m-d', strtotime("+1 weeks"))),
		        'order' => array('Article.created' => 'desc'),
		        'limit' => 5));  
		$this->set(compact('articles'));
	}
	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists($id)) {
			 throw new NotFoundException(__('Invalid article'));
		}
		 $comments = $this->Article->Comment->find('all', array(
		        'conditions' => array('Comment.article_id' == 'Article.id'),
		        'order' => array('Comment.created' => 'asc'),
		        'limit' => 6));  
		$this->set(compact('comments'));
		$articles = $this->Article->find('all');  
        $this->set('articles', $articles);
		$this->set('article', $this->Article->read());	
	}
	public function add(){
		if ($this->request->is('post')) {
		    $this->request->data['Article']['user_id']= $this->Auth->user('id');
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('The article has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The article could not be saved. Please, try again.','error2');
			}
		}
		$users = $this->Article->User->find('list');
	    $categories = $this->Article->Category->find('list');
		$this->set(compact('users', 'categories'));
	}	
	public function edit($id = null) {
      	$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('The article has been saved.','success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The article could not be saved. Please, try again.','error2');
			}
		}
		$categories = $this->Article->Category->find('list');		
		$this->set(compact('categories'));
		$this->request->data = $this->Article->read();
	}
	public function delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Article->delete()) {
			$this->Session->setFlash('The article has been deleted.', 'success');
		} 
		else {
			$this->Session->setFlash('The article could not be deleted. Please, try again.','error2');
		}
		return $this->redirect(array('action' => 'index'));
	} 
    public function search(){
        $articles = $this->Article->find('all');  
        $this->set('articles', $articles);
    }
}
