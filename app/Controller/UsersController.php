<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {
     
    public $helpers = array(
    	'Html',
		'Time',
		'Text',
	); 
	public $components = array(
		'Auth',
		'Session',
		'Cookie',
		'Paginator',
		'Security',
		'RememberMe',
	);
	protected function _pluginDot() {
		if (is_string($this->plugin)) {
			return $this->plugin . '.';
		}
		return $this->plugin;
	}
    public function beforeFilter() {
        parent::beforeFilter();
         $this->Auth->allow('add','edit','reset','profile');
         $this->_setDefaultEmail(); 
         $this->_setupAuth();
 		 $this->set('User', $this->modelClass);
    }
    protected function _setupAuth() {
		if (Configure::read('Users.disableDefaultAuth') === true) {
			return;
		}
		$this->Auth->allow('add','reset', 'verify', 'logout', 'reset_password', 'login', 'resend_verification');
		if (!is_null(Configure::read('Users.allowRegistration')) && !Configure::read('Users.allowRegistration')) {
			$this->Auth->deny('add');
		}
		if ($this->request->action == 'register'){
			$this->Components->disable('Auth');
		}
		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array(
					'username' => 'email',
					'password' => 'password'),
				'userModel' => $this->_pluginDot() . $this->modelClass,
				'scope' => array(
					$this->modelClass . '.active' => 1,
					$this->modelClass . '.email_verified' => 1
				)
			)
		);
	}
	protected function _setDefaultEmail() {
		if (!Configure::read('App.defaultEmail')) {
			$config = $this->_getMailInstance()->config();
			if (!empty($config['from'])) {
				Configure::write('App.defaultEmail', $config['from']);
			} else {
				Configure::write('App.defaultEmail', 'noreply@' . env('HTTP_HOST'));
			}
		}
	}
    public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	public function login() {
		$Event = new CakeEvent(
			'Users.Controller.Users.beforeLogin',
			$this,
			array(
				'data' => $this->request->data,
			)
		);
		$this->getEventManager()->dispatch($Event);
		if ($Event->isStopped()){
			return;
		}
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$Event = new CakeEvent(
					'Users.Controller.Users.afterLogin',
					$this, array(
						'data' => $this->request->data,
						'isFirstLogin' => !$this->Auth->user('last_login')
					)
				);
				$this->getEventManager()->dispatch($Event);
				$this->{$this->modelClass}->id = $this->Auth->user('id');
				$this->{$this->modelClass}->saveField('last_login', date('Y-m-d H:i:s'));

				if ($this->here == $this->Auth->loginRedirect) {
					$this->Auth->loginRedirect = '/';
				}
				$this->Session->setFlash('You have successfully logged in','success');
				if (!empty($this->request->data)) {
					$data = $this->request->data[$this->modelClass];
					if (empty($this->request->data[$this->modelClass]['remember_me'])) {
						$this->RememberMe->destroyCookie();
					} else {
						$this->_setCookie();
					}
				}
				if (empty($data[$this->modelClass]['return_to'])) {
					$data[$this->modelClass]['return_to'] = null;
				}
				// Checking for 2.3 but keeping a fallback for older versions
				if (method_exists($this->Auth, 'redirectUrl')) {
					$this->redirect($this->Auth->redirectUrl($data[$this->modelClass]['return_to']));
				} else {
					$this->redirect($this->Auth->redirect($data[$this->modelClass]['return_to']));
				}
			} else {
				$this->Session->setFlash('Invalid e-mail / password combination. Please try again','error');
			}
		}
		if (isset($this->request->params['named']['return_to'])) {
			$this->set('return_to', urldecode($this->request->params['named']['return_to']));
		} elseif (isset($this->request->query['return_to'])) {
			$this->set('return_to', $this->request->query['return_to']);
		} else {
			$this->set('return_to', false);
		}
		$allowRegistration = Configure::read('Users.allowRegistration');
		$this->set('allowRegistration', (is_null($allowRegistration) ? true : $allowRegistration));
	}
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			 throw new NotFoundException(__('This User is not existing'));
		}
	    $this->set('user', $this->User->read());
	}
	public function profile($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			 throw new NotFoundException(__('This User is not existing'));
		}
	    $this->set('user', $this->User->read());
	}
	public function add() {
 		if ($this->Auth->user()) {
			$this->Session->setFlash(__('You are already registered and logged in!','success'));
			$this->redirect('/');
		}
		if (!empty($this->request->data)) {
			$user = $this->{$this->modelClass} -> register1($this->request->data);
			if ($user !== false) {
				$Event = new CakeEvent(
					'Users.Controller.Users.afterRegistration',
					$this,
					array(
						'data' => $this->request->data,
					)
				);
				$this->getEventManager()->dispatch($Event);
				if ($Event->isStopped()) {
					$this->redirect(array('action' => 'login'));
				}

				$this->_sendVerificationEmail($this->{$this->modelClass}->data);
				$this->Session->setFlash('Your account has been created. You should receive an e-mail shortly to authenticate your account. Once validated you will be able to login.','success');
				$this->redirect(array('action' => 'login'));
			} else {
				unset($this->request->data[$this->modelClass]['password']);
				unset($this->request->data[$this->modelClass]['password2']);
				$this->Session->setFlash('Your account could not be created. Please, try again.','error');
			}
		}
	}
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('This User is not existing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your profile has been saved. Login again','success');
				return $this->redirect(array('action' => 'logout'));
			} 
	     	else{ $this->Session->setFlash('The user could not be saved. Please, try again.','error'); }
		} 
		else{
			$condition = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $condition);
		}
	}
	public function delete($id = null) {
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('This User is not existing'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->User->delete()) {
			    $this->Session->setFlash('The user has been deleted.','success');
			} 
			else {
				$this->Session->setFlash('The user could not be deleted. Please, try again.','error');
			}
			return $this->redirect(
			   $this->referer(array('action' => 'index'))
		    );
	}
	public function reset($token = null, $user = null) {
		if (empty($token)) {
			$head = false;
			if ($user) {
				$this->request->data = $user;
			}
		$this->_sendPasswordReset($head);
		}else{
			$this->_resetPassword($token);
		}
	}
    protected function _sendPasswordReset($userData, $head= null, $options = array()) {
		$defaults = array(
			'template' => $this->_pluginDot() . 'password_reset_request',
			'emailFormat' => CakeEmail::MESSAGE_TEXT,
			'layout' => 'default'
		);
		$options = array_merge($defaults, $options);
		if (!empty($this->request->data)) {
			$user = $this->{$this->modelClass}->passwordReset($this->request->data);
			if (!empty($user)){
				$Email = new CakeEmail('gmail');
				$Email->to($user[$this->modelClass]['email'])
				      ->from(Configure::read('App.defaultEmail'))					
				      ->emailFormat($options['emailFormat'])
					  ->subject('Request for reset password')
					  ->template($options['template'], $options['layout'])
					  ->viewVars(array(
					'model' => $this->modelClass,
					'firstname' => $this->{$this->modelClass}->data,
						'token' => $this->{$this->modelClass}->data[$this->modelClass]['password_token']))
					->send();
					$this->Session->setFlash('Email was sent to you in order to change your password.','success');
					$this->redirect('login');
			}else {
				$this->Session->setFlash('No user was found with that email.','error3');
				$this->redirect($this->referer('/'));
			}
		}
		$this->render('request_password_change');
	}
	protected function _resetPassword($token) {
			$user = $this->{$this->modelClass}->checkPasswordToken($token);
			if (empty($user)) {
				$this->Session->setFlash('Invalid password reset token try again.','error');
				$this->redirect(array('action' => 'reset'));
				return;
			}

			if (!empty($this->request->data) && $this->{$this->modelClass}->resetPassword(Hash::merge($user, $this->request->data))) {
				if ($this->RememberMe->cookieIsSet()) {
					$this->Session->setFlash( 'Password changed.','success');
					$this->_setCookie();
				} else {
					$this->Session->setFlash( 'Password changed, you can now login with your new password.','success');
					$this->redirect('login');
				}
			}
			$this->set('token', $token);
	}
	protected function _setCookie($options = array(), $cookieKey = 'rememberMe') {
			$this->RememberMe->settings['cookieKey'] = $cookieKey;
			$this->RememberMe->configureCookie($options);
			$this->RememberMe->setCookie();
	}
	protected function _sendVerificationEmail($userData, $options = array()) {
			$defaults = array(
				'template' => $this->_pluginDot() . 'account_verification',
				'layout' => 'default',
				'emailFormat' => CakeEmail::MESSAGE_TEXT
			);
			$options = array_merge($defaults, $options);
      		$Email = new CakeEmail('gmail');
			$Email->to($userData[$this->modelClass]['email'])			     
				  ->from(Configure::read('App.defaultEmail'))
				  ->emailFormat($options['emailFormat'])
				  ->subject('Account verification')
				  ->viewVars(array(
					    'model' => $this->modelClass,
						'user' => $userData))
				  ->template($options['template'], $options['layout'])
		          ->send(); 
	}
	public function resend_verification() {
		if ($this->request->is('post')) {
			try {
				if ($this->{$this->modelClass}->checkEmailVerification($this->request->data)) {
					$this->_sendVerificationEmail($this->{$this->modelClass}->data);
					$this->Session->setFlash( 'The email was resent. Please check your inbox.','success');
					return $this->redirect('login');
				} else {
					$this->Session->setFlash( 'The email could not be sent.','error3');
				}
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
	}
	public function verify($type = 'email', $token = null) {
		if ($type == 'reset') {
			// Backward compatiblity
			$this->request_new_password($token);
		}

		try {
			$this->{$this->modelClass}->verifyEmail($token);
			$this->Session->setFlash('Your e-mail has been validated!','success');
			return $this->redirect(array('action' => 'login'));
		} catch (RuntimeException $e) {
			$this->Session->setFlash($e->getMessage());
			return $this->redirect('/');
		}
	}
	public function request_new_password($token = null) {
		if (Configure::read('Users.sendPassword') !== true) {
			throw new NotFoundException();
		}
		$data = $this->{$this->modelClass}->verifyEmail($token);
		if (!$data) {
			$this->Session->setFlash( 'The url you accessed is no longer valid');
			return $this->redirect('/');
		}
		if ($this->{$this->modelClass}->save($data, array('validate' => false))) {
			$this->_sendNewPassword($data);
			$this->Session->setFlash('Your password was sent to your registered email account','success');
			$this->redirect(array('action' => 'login'));
		}
		$this->Session->setFlash( 'There was an error verifying your account. Please check the email you were sent, and retry the verification link.','error');
		$this->redirect('/');
	}
	protected function _sendNewPassword($userData) {
		$Email->from(Configure::read('App.defaultEmail'))
			->to($userData[$this->modelClass]['email'])
			->replyTo(Configure::read('App.defaultEmail'))
			->return(Configure::read('App.defaultEmail'))
			->subject(env('HTTP_HOST') . ' ' . 'Password Reset')
			->template($this->_pluginDot() . 'new_password')
			->viewVars(array(
				'model' => $this->modelClass,
				'userData' => $userData))
			->send();
	}
	public function change_password() {
		if ($this->request->is('post')) {
			$this->request->data[$this->modelClass]['id'] = $this->Auth->user('id');
			if ($this->{$this->modelClass}->changePassword($this->request->data)) {
				$this->Session->setFlash( 'Password changed.');
				$this->RememberMe->destroyCookie();
				$this->redirect('/');
			}
		}
	}
   	protected function _getMailInstance() {
		return $this->{$this->modelClass}->getMailInstance();
	}
    public function isAuthorized($user) {
	    if ($this->action === 'add') {
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'view','delete'))) {
	        $userId = (int)$this->request->params['pass'][0];	        
	        if ($this->User->isOwnedBy($userId, $user['id'])) {
	            return true;
	        }	     
	    }
	    return parent::isAuthorized($user);
	}
	public function users_article($id= null){
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			 throw new NotFoundException(__('This User is not existing'));
		}
	    $this->set('user', $this->User->read());
	}
	
	public function users_category($id= null){
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			 throw new NotFoundException(__('This User is not existing'));
		}
	    $this->set('user', $this->User->read());
	}
}