<?php

require_once dirname(__FILE__) . DS . 'models.php';
App::uses('LikeableBehavior', 'Like.Model/Behavior');
App::load('LikeableBehavior');

class LikeableBehaviorTest extends CakeTestCase{
	
	public $fixtures = array(
		'plugin.like.like',
		'plugin.like.article',
		'plugin.like.user'
	);
	
	/**
	 * Method executed before each test
	 *
	 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
		$this->Article = ClassRegistry::init('Article');
		
		$this->User->bindModel(array(
			'hasMany' => array('Article')
		), false);
		
		$this->Article->bindModel(array(
			'belongsTo' => array('User')
		), false);
		
		$this->Article->Behaviors->attach('Likeable');
	}
	
	/**
	 * Method executed after each test
	 *
	 */
	public function tearDown() {
		unset($this->Article);
		unset($this->User);
		parent::tearDown();
	}
	
	public function testIsLikedByWithNotExistingPost(){
		$this->expectException('NotFoundException');
		$user_id = 1;
		$article_id = 99;
		$this->Article->isLikedBy($article_id, $user_id);
	}
	
	public function testIsLikedBy(){
		$article_id = 1;
		$this->assertEquals($this->Article->isLikedBy($article_id, 1), true);		
		$this->assertEquals($this->Article->isLikedBy($article_id, 2), false);
	}
	
	public function testLikeWithNotExistingPost(){
		$this->expectException('NotFoundException');
		$user_id = 1;
		$article_id = 99;
		$this->Article->like($article_id, $user_id);
	}
	
	public function testLikeWithAlreadyLikedPost(){
		$this->expectException('AlreadyLikedException');
		$user_id = 1;
		$article_id = 1;
		$this->Article->like($article_id, $user_id);
	}
	
	public function testLike(){
		$user_id = 2;
		$article_id = 1;
		$this->assertEquals($this->Article->Like->find('count'), 2);
		$this->Article->like($article_id, $user_id);
		$this->assertEquals($this->Article->Like->find('count'), 3);
	}
	
	public function testDislikeWithNotExistingPost(){
		$this->expectException('NotFoundException');
		$user_id = 1;
		$article_id = 99;
		$this->Article->dislike($article_id, $user_id);
	}
	
	public function testDislikeWithNotLikedPost(){
		$this->expectException('NotLikedException');
		$user_id = 1;
		$article_id = 2;
		$this->Article->dislike($article_id, $user_id);
	}
	
	public function testDislike(){
		$user_id = 1;
		$article_id = 1;
		$this->assertEquals($this->Article->Like->find('count'), 2);
		$this->Article->dislike($article_id, $user_id);
		$this->assertEquals($this->Article->Like->find('count'), 1);
	}
	
	public function testCounterCache(){
		$article_id = 1;
		$user_id = 2;
		$this->assertEquals(intval($this->Article->field('like_count', array('Article.id'=>$article_id))), 1);
		$this->Article->like($article_id, $user_id);
		$this->assertEquals(intval($this->Article->field('like_count', array('Article.id'=>$article_id))), 2);
		$this->Article->dislike($article_id, $user_id);
		$this->assertEquals(intval($this->Article->field('like_count', array('Article.id'=>$article_id))), 1);
	}
	
	public function testFindLikedPost(){
		$this->assertEquals(count($this->Article->find('liked')), 1);
		$this->Article->like(2, 2);
		$this->assertEquals(count($this->Article->find('liked')), 2);
		$this->Article->dislike(2, 2);
		$this->Article->dislike(1, 1);
		$this->assertEquals(count($this->Article->find('liked')), 0);
	}
	
	public function testFindMostLikedPost(){
		$this->Article->like(2, 2);
		$this->Article->like(1, 2);
		
		$result = $this->Article->find('mostLiked');
		
		$this->assertEquals(count($result), 2);
		$this->assertEquals($result[0]['Article']['id'], 1);
		$this->assertEquals($result[1]['Article']['id'], 2);
	}
	
	public function testFindLikedPostByUser(){
		$user_id = 1;
		$result = $this->Article->findLikedBy($user_id);
		$this->assertEquals(count($result), 1);
		$this->assertEquals($result[0]['Article']['id'], 1);
	}
	
	public function testFindLikedPostByUserWithoutLikedPost(){
		$user_id = 2;
		$result = $this->Article->findLikedBy($user_id);
		$this->assertEquals(count($result), 0);
	}
	
	public function testFindWithIsLikedByCurrentUserField(){
		$article_id = 1;
		$this->Article->recursive = 0;
		$result = $this->Article->findById($article_id);
		//$this->assertEqual(key_exists('is_liked_by_current_user', $result['Article']), true);
	}

	public function testDeleteLikesByDeletingPost(){
		$this->assertEquals($this->Article->find('count'), 2);
		$this->assertEquals($this->Article->Like->find('count'), 2);

		$this->Article->delete(1);

		$this->assertEquals($this->Article->Like->find('count'), 1);
		$this->assertEquals($this->Article->find('count'), 1);
	}
	
}