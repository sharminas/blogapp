<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 * @property Article $Article
 * @property User $User
 */
class Comment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),),
		),
		 'name' => array(
            'required' => array(
	   			'rule' => 'notBlank',
				'message' => 'Please provide any/your name .'),
             ),
        'email' => array(
            'notBlank' => array(
	   			'rule' => 'notBlank',
				'message' => 'Provide your email for your comment.'),
             ),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'name',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
