<?php
App::uses('AppModel', 'Model');

class Category extends AppModel {

	public $validate = array(
        'title' => array(
            'required' => array(
	   			'rule' => 'notBlank',
				'message' => 'Please dont leave it blank.'),
             ),
        'description' => array(
            'notBlank' => array(
	   			'rule' => 'notBlank',
				'message' => 'Provide description for the category.'),
             ),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			   ),
		    ),
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'category_id',
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
   public function isOwnedBy($category, $user) {
	    return $this->field('id', array('id' => $category, 'user_id' => $user)) !== false;
	}
}
