<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('NotLikedException', 'Like.Exception');
App::uses('AlreadyLikedException', 'Like.Exception');

class LikeableBehavior extends ModelBehavior{
	
	private $defaultSettings = array(
		'counterCache' => true
	);
	
	public $mapMethods = array(
		'/^_findLiked$/' => '_findLiked',
		'/^_findMostLiked$/' => '_findMostLiked'
	);
	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = $this->defaultSettings;
		}	
		$this->settings[$Model->alias] = array_merge(
			$this->settings[$Model->alias], 
			(array)$settings
		);
		$Model->findMethods['liked'] = true;
		$Model->findMethods['mostLiked'] = true;
		
		// bind the Like model to the current model
		$Model->bindModel(array(
			'hasMany' => array(
				'Like' => array(
					'className' => 'Like.Like',
					'foreignKey' => 'article_id',
				//	'conditions' => array('Like.model' => $Model->alias)
				)
			)
		), false);
	
		// bind the current model with Like model
		$Model->Like->bindModel(array(
			'belongsTo' => array(
				$Model->alias => array(
					'className' => $Model->alias,
					'foreignKey' => 'article_id',
					'counterCache' => $this->settings[$Model->alias]['counterCache'],
					'conditions' => array('Like.model' => $Model->alias),
					'counterScope' => array('Like.model' => $Model->alias)
				)
			)
		), false);
	}
	
	
	public function afterFind(Model $Model, $results, $primary = false){
		foreach($results as $k => $result){
			if(!empty($result['Like']) && AuthComponent::user('id')){
				$results[$k][$Model->alias]['is_liked_by_current_user'] = in_array(AuthComponent::user('id'),Set::classicExtract($result['Like'], '{n}.user_id'));
			}	
		}
		return $results;
	}
	public function afterDelete(Model $Model){
		$likesToDelete = $Model->Like->find('list', array(
			'conditions' => array(
				'model' => $Model->alias,
				'article_id' => $Model->id
			)
		));

		if($likesToDelete != false){
			$likesId = array_keys($likesToDelete);
			$Model->Like->deleteAll(array('Like.id'=>$likesId));
			$Model->getEventManager()->dispatch(new CakeEvent('Plugin.Like.delete', $Model->Like, $likesId));
		}
	}
	public function like(Model $Model, $article_id, $user_id){
		// If the item does not exist
		if(!$Model->exists($article_id)){
			throw new NotFoundException();
		}
	
		// If the user already like this item
		if($Model->isLikedBy($article_id, $user_id)){
			throw new AlreadyLikedException();
		}
		
		$Model->Like->create();
		$Model->Like->save(array(
			'Like' => array(
				'article_id' => $article_id,
				'user_id' => $user_id
			)	
		));	
		$Model->getEventManager()->dispatch(new CakeEvent('Plugin.Like.like', $Model->Like));
	}
	public function dislike(Model $Model, $article_id, $user_id){
		if(!$Model->exists($article_id)){
			throw new NotFoundException();
		}
		
		if(!$Model->isLikedBy($article_id, $user_id)){
			throw new NotLikedException();
		}
		
		$like = $Model->Like->find('first', array('conditions' => array(
			'Like.article_id' => $article_id,
			'Like.user_id' => $user_id
		)));
		
		$Model->Like->delete($like['Like']['id']);
		
		$Model->getEventManager()->dispatch(new CakeEvent('Plugin.Like.dislike', $like));
	}
	public function isLikedBy(Model $Model, $article_id, $user_id){
		// If the item does not exist
		if(!$Model->exists($article_id)){
			throw new NotFoundException();
		}

		$count = $Model->Like->find('count', array(
			'conditions' => array(			
				'Like.article_id' => $article_id,
				'Like.user_id' => $user_id
			)
		));
		return $count == 1;
	}
	public function _findLiked(Model $Model, $method, $state, $query, $results = array()){
		if ($state == 'before') {
			$query['conditions'][$Model->alias.'.like_count >'] = 0;
			return $query;
		}
		return $results;
	}
	public function _findMostLiked(Model $Model, $method, $state, $query, $results = array()){
		if ($state == 'before') {
			$query['order'][$Model->alias.'.like_count '] = 'DESC';
			return $query;
		}
		return $results;
	}
	public function findLikedBy(Model $Model, $user_id){
		$Model->Like->recursive = -1;
		$likedItem = $Model->Like->find('all', array(
			'fields' => array('Like.article_id'),
			'conditions' => array(
				'Like.user_id' => $user_id
			)
		));
		
		if(empty($likedItem)){
			return array();
		}
			
		$likedItemIds = Set::classicExtract($likedItem, '{n}.Like.article_id');
		return $Model->findAllById($likedItemIds);
	}
}