<?php
App::uses('AppModel', 'Model');

class Article extends AppModel {

    public $displayField = 'title';
    public $actsAs = array('Like.Likeable');

    // public $actas = array(
    // 	    'translate' => array(
    // 	    	'title',
    // 	    	'body'
    // 	)
    // );
    // public $locale ="por";
    // public $translateModel = "ArticleI18n";
    // public $translateTable = 'article_i18ns';
	public $validate = array(
			'title' => array(
				 'required' => array(
			     'rule' => 'notBlank',
			     'message' => 'give it a try'),
			),
			'body' => array(
				'notBlank' => array(
	                'rule' => 'notBlank',
				    'message' => 'Tell what is your title all about, Dont leave it blank.'),
			),
   	);
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'article_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    public function isOwnedBy($article, $user) {
	    return $this->field('id', array('id' => $article, 'user_id' => $user)) !== false;
	}
	 // public function beforeFilter(){
  //        Configure::write('Config.language', 'por');
  //    }
}
