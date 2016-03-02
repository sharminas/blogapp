<?php
App::uses('AppController', 'Controller');

class LanguagesController extends AppController {
    public function beforeFilter() {
	    	parent::beforeFilter();
        $this->Auth->allow('search'); 
    }
    public function search() {
    $results = $this->Article->find('all', array(
    'conditions' => array('Article.title LIKE' => "%". $text ."%")));
    $this->redirect('articles/search');
    }
}
