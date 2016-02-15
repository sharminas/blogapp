<?php

class LikesController extends AppController{
	
	public function like($model,$article_id){
		$Model = ClassRegistry::init(Inflector::classify($model_name));
		$referer = $this->referer('/');		
		$user_id = $this->Auth->user('id'); 
		
		if(!$user_id){
			$this->Session->setFlash(__d('like', 'You are not connected.'));
			return $this->redirect($referer);
		}
		
		if(!$Model->Behaviors->attached('Likeable')){
			$this->Session->setFlash(__d('like', 'You cannot like this element.'));
			return $this->redirect($referer);
		}
		
		if(!$Model->exists($article_id)){
			$this->Session->setFlash(__d('like', 'This element does not exist.'));
			return $this->redirect($referer);
		}
		
		$Model->like($article_id, $user_id);
		$this->Session->setFlash(__d('like', 'You view and automatically like this article.'));
		return $this->redirect($referer);
	}
	
	public function dislike($model, $article_id){
		$Model = ClassRegistry::init(Inflector::classify($model_name));
		$referer = $this->referer('/');
		$user_id = $this->Auth->user('user_id');
	
		if(!$user_id){
			$this->Session->setFlash(__d('like', 'You are not connected.'));
			return $this->redirect($referer);
		}
	
		if(!$Model->Behaviors->attached('Likeable')){
			$this->Session->setFlash(__d('like', 'You cannot like this element.'));
			return $this->redirect($referer);
		}
	
		if(!$Model->exists($article_id)){
			$this->Session->setFlash(__d('like', 'This element does not exist.'));
			return $this->redirect($referer);
		}
	
		$Model->dislike($article_id, $user_id);
		return $this->redirect($referer);
	}
	
}