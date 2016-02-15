<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $validate = array(
		'email' => array(	 
   			'required' => array(
   				'rule' => 'notBlank',
				'message' => 'This field cannot be  left blank'),
   			'email' => array(
   				'rule' => 'email',
				'message' => 'This is not a valid email'),
   			'unique' => array(
   				'rule' => array('isUnique'),
   				'message' => 'The email is already taken.'),
   		),
   		'email2' => array(
   			'required' => array(
   				'rule' => 'notBlank',
				'message' => 'This field cannot be  left blank'),
   			'email' => array(
   				'rule' => 'email',
				'message' => 'This is not a valid email'),
   			'confirm' => array(
   				'rule' => array('confirmEmail'),
   				'message' => 'Email address is not match, Try again'),
   		),
		'password' => array(
			 'required' => array(
             	 'rule' => 'notBlank',
             	 'message' => 'This field cannot be left blank'),
             'length' => array(
		        'rule' => array('between', 8, 20),
		        'message'=> 'Your password must be between 8 and 20 characters.'),
        ),
	    'password2' => array(
	    	 'required' => array(
             	 'rule' => 'notBlank',
             	 'message' => 'This field cannot be left blank'),
		    'length' => array(
		        'rule' => array('between', 8, 20),
		        'message'   => 'Your password must be between 8 and 20 characters.'),
		    'confirm'  => array(
		        'rule' => array('confirmPassword'),
		        'message' => 'The passwords you entered do not match.'),
	    ),
        'firstname' => array(
            'required' => array(
                 'rule' => 'notBlank',
                 'message' => 'This field cannot be left blank.'),  
        ),
        'lastname' => array(
             'required' => array(
                 'rule' => 'notBlank',
                 'message' => 'This field cannot be left blank.'),
        )
	);

    public $hasMany = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'user_id',
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
 
    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	          $passwordHasher = new BlowfishPasswordHasher();
	          $this->data[$this->alias]['password'] = $passwordHasher->hash(
	          $this->data[$this->alias]['password'] );
	          $this->data[$this->alias]['password2'] = $passwordHasher->hash(
	          $this->data[$this->alias]['password2'] );
	         }
            return true;
            }
	//token receive
	protected function _setupValidation() {
		$this->validatePasswordChange = array(
			'new_password' => $this->validate['password'],
			'confirm_password' => array(
				'required' => array('rule' => array('compareFields', 'password2', 'confirm_password'), 'required' => true, 'message' => ('The passwords are not equal.'))),
			'old_password' => array(
				'to_short' => array('rule' => 'validateOldPassword', 'required' => true, 'message' => __d('users', 'Invalid password.'))
			)
		);
	}
	public function hash($string, $type = null, $salt = false) {
		return Security::hash($string, $type, $salt);
	}
   public function register1($postData = array(), $options = array()) {
		$Event = new CakeEvent(
			'Users.Model.User.beforeRegister',
			$this,
			array(
				'data' => $postData,
				'options' => $options
			)
		);

		$this->getEventManager()->dispatch($Event);
		if ($Event->isStopped()) {
			return $Event->result;
		}

		if (is_bool($options)) {
			$options = array('emailVerification' => $options);
		}

		$defaults = array(
			'emailVerification' => true,
			'removeExpiredRegistrations' => true,
			'returnData' => true);
		extract(array_merge($defaults, $options));

		$postData = $this->_beforeRegistration($postData, $emailVerification);

		if ($removeExpiredRegistrations) {
			$this->_removeExpiredRegistrations1();
		}

		$this->set($postData);
		if ($this->validates()) {
			$postData[$this->alias]['password'] = $this->hash($postData[$this->alias]['password'], 'sha1', true);
			$this->create();
			$this->data = $this->save($postData, false);
			$this->data[$this->alias]['id'] = $this->id;

			$Event = new CakeEvent(
				'Users.Model.User.afterRegister',
				$this,
				array(
					'data' => $this->data,
					'options' => $options
				)
			);

			$this->getEventManager()->dispatch($Event);

			if ($Event->isStopped()) {
				return $Event->result;
			}

			if ($returnData) {
				return $this->data;
			}
			return true;
		}
		return false;
	}
	public function confirmPassword($password = null) {
		if ((isset($this->data[$this->alias]['password']) && isset($password['password2']))
			&& !empty($password['password2'])
			&& ($this->data[$this->alias]['password'] === $password['password2'])) {
			return true;
		}
		return false;
	}
	public function passwordReset($postData = array()) {
		$user = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.active' => 1,
				$this->alias . '.email' => $postData[$this->alias]['email'])));

		if (!empty($user) && $user[$this->alias]['email_verified'] == 1) {
			$sixtyMins = time() + 43000;
			$token = $this->generateToken();
			$user[$this->alias]['password_token'] = $token;
			$user[$this->alias]['email_token_expires'] = date('Y-m-d H:i:s', $sixtyMins);
			$user = $this->save($user, false);
			$this->data = $user;
			return $user;
		} elseif (!empty($user) && $user[$this->alias]['email_verified'] == 0) {
			$this->invalidate('email', __d('users', 'This Email Address exists but was never validated.'));
		} else {
			$this->invalidate('email', __d('users', 'This Email Address does not exist in the system.'));
		}

		return false;
	}
	public function setUpResetPasswordValidationRules() {
		return array(
			'new_password' => $this->validate['password'],
			'confirm_password' => array(
				'required' => array(
					'rule' => array('compareFields', 'new_password', 'confirm_password'),
					'message' => __d('users', 'The passwords are not equal.')
				)
			)
		);
	}
	public function resetPassword($postData = array()) {
		$result = false;
		$tmp = $this->validate;
		$this->validate = $this->setUpResetPasswordValidationRules();
		$this->set($postData);
		if ($this->validates()) {
			$this->data[$this->alias]['password'] = $this->hash($this->data[$this->alias]['new_password'], null, true);
			$this->data[$this->alias]['password_token'] = null;
			$result = $this->save($this->data, array(
				'validate' => false,
				'callbacks' => $this->enableCallbacks)
			);
		}
		$this->validate = $tmp;
		return $result;
	}
    public function changePassword($postData = array()) {
		$this->validate = $this->validatePasswordChange;
		$this->set($postData);
		if ($this->validates()) {
			$this->data[$this->alias]['password'] = $this->hash($this->data[$this->alias]['new_password'], null, true);
			$this->save($postData, array(
				'validate' => false,
				'callbacks' => $this->enableCallbacks));
			return true;
		}
		return false;
	}
	public function validateOldPassword($password) {
		if (!isset($this->data[$this->alias]['id']) || empty($this->data[$this->alias]['id'])) {
			if (Configure::read('debug') > 0) {
				throw new OutOfBoundsException('$this->data[\'' . $this->alias . '\'][\'id\'] has to be set and not empty');
			}
		}

		$currentPassword = $this->field('password', array($this->alias . '.id' => $this->data[$this->alias]['id']));
		return $currentPassword === $this->hash($password['old_password'], null, true);
	}
	public function compareFields($field1, $field2) {
		if (is_array($field1)) {
			$field1 = key($field1);
		}

		if (isset($this->data[$this->alias][$field1]) && isset($this->data[$this->alias][$field2]) &&
			$this->data[$this->alias][$field1] == $this->data[$this->alias][$field2]) {
			return true;
		}
		return false;
	}
	public function confirmEmail($email = null) {
		if ((isset($this->data[$this->alias]['email']) && isset($email['email2']))
			&& !empty($email['email2'])
			&& (strtolower($this->data[$this->alias]['email']) === strtolower($email['email2']))) {
				return true;
		}
		return false;
	}
	public function checkEmailVerificationToken($token = null) {
		$result = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.email_verified' => 0,
				$this->alias . '.email_token' => $token),
			'fields' => array(
				'id', 'email', 'email_token_expires')
			)
		);
		if (empty($result)) {
			return false;
		}
		return $result;
	}
	public function verifyEmail($token = null) {
		$user = $this->checkEmailVerificationToken($token);

		if ($user === false) {
			throw new RuntimeException( 'Invalid token, please check the email you were sent, and retry the verification link.');
		}

		$expires = strtotime($user[$this->alias]['email_token_expires']);
		if ($expires < time()) {
			throw new RuntimeException(( 'The token has expired.'));
		}

		$data[$this->alias]['active'] = 1;
		$user[$this->alias]['email_verified'] = 1;
		$user[$this->alias]['email_token'] = null;
		$user[$this->alias]['email_token_expires'] = null;

		$user = $this->save($user, array(
			'validate' => false,
			'callbacks' => $this->enableCallbacks
		));
		$this->data = $user;
		return $user;
	}
	public function checkEmailVerification($postData = array(), $renew = true) {
		$user = $this->findByEmail($postData[$this->alias]['email']);

		if (empty($user)) {
			$this->invalidate('email',( 'Invalid Email address.'));
			return false;
		}

		if ($user[$this->alias]['email_verified'] == 1) {
			$this->invalidate('email', ('This email is already verified.'));
			return false;
		}

		if ($user[$this->alias]['email_verified'] == 0) {
			if ($renew === true) {
				$user[$this->alias]['email_token_expires'] = $this->emailTokenExpirationTime();
				$this->save($user, array(
					'validate' => false,
					'callbacks' => $this->enableCallbacks,
				));
			}
			$this->data = $user;
			return true;
		}
	}
	public function resendVerification($postData = array()) {
		if (!isset($postData[$this->alias]['email']) || empty($postData[$this->alias]['email'])) {
			$this->invalidate('email',('Please enter your email address.'));
			return false;
		}

		$user = $this->findByEmail($postData[$this->alias]['email']);

		if (empty($user)) {
			$this->invalidate('email',('The email address does not exist in the system'));
			return false;
		}

		if ($user[$this->alias]['email_verified'] == 1) {
			$this->invalidate('email',('Your account is already authenticated.'));
			return false;
		}

		if ($user[$this->alias]['active'] == 0) {
			$this->invalidate('email',( 'Your account is disabled.'));
			return false;
		}

		$user[$this->alias]['email_token'] = $this->generateToken();
		$user[$this->alias]['email_token_expires'] = $this->emailTokenExpirationTime();

		return $this->save($user, false);
	}
	public function checkPasswordToken($token = null) {
		$user = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.active' => 1,
				$this->alias . '.password_token' => $token,
				$this->alias . '.email_token_expires >=' => date('Y-m-d H:i:s'))));
		if (empty($user)) {
			return false;
		}
		return $user;
	}
	public function emailTokenExpirationTime() {
		return date('Y-m-d H:i:s', time() + $this->emailTokenExpirationTime);
	}
	public function generatePassword($length = 10) {
		srand((double)microtime() * 1000000);
		$password = '';
		$vowels = array("a", "e", "i", "o", "u");
	     $cons = array("b", "c", "d", "g", "h", "j", "k", "l", "m", "n", "p", "r", "s", "t", "u", "v", "w", "tr",
							"cr", "br", "fr", "th", "dr", "ch", "ph", "wr", "st", "sp", "sw", "pr", "sl", "cl");
		for ($i = 0; $i < $length; $i++) {
			$password .= $cons[mt_rand(0, 31)] . $vowels[mt_rand(0, 4)];
		}
		return substr($password, 0, $length);
	}
	public function generateToken($length = 10) {
		$possible = '0123456789abcdefghijklmnopqrstuvwxyz';
		$token = "";
		$i = 0;

		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
			if (!stristr($token, $char)) {
				$token .= $char;
				$i++;
			}
		}
		return $token;
	}
	protected function _beforeRegistration($postData = array(), $useEmailVerification = true) {
		if ($useEmailVerification == true) {
			$postData[$this->alias]['email_token'] = $this->generateToken();
			$postData[$this->alias]['email_token_expires'] = date('Y-m-d H:i:s', time() + 86400);
		} else {
			$postData[$this->alias]['email_verified'] = 1;
		}
		$postData[$this->alias]['active'] = 1;
		return $postData;
	}
	protected function _removeExpiredRegistrations1() {
		$this->deleteAll(array(
			$this->alias . '.email_verified' => 0,
			$this->alias . '.email_token_expires <' => date('Y-m-d H:i:s'))
		);
	}
	public function getMailInstance() {
		$emailConfig = Configure::read('Users.emailConfig');
		if ($emailConfig) {
			return new CakeEmail($emailConfig);
		}
		return new CakeEmail('default');
	}
	public function isOwnedBy($user, $user) {
	    return $this->field('id', array('id' => $user, 'id' => $user)) !== false;
	}
}
