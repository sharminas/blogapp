<?php
App::uses('AppController', 'Controller');

class LanguagesController extends AppController {
    public function beforeFilter() {
	    parent::beforeFilter();
        $this->Auth->allow('fra','eng','por','afr'); 
    }
    public function eng() {
    $this->Session->write('Config.language', 'eng');
    $this->redirect($this->referer());
    }
	public function por() {
	    $this->Session->write('Config.language', 'por');
	    $this->redirect($this->referer());
	}
	public function fra() {
	    $this->Session->write('Config.language', 'fra');
	    $this->redirect($this->referer());
	}
	public function afr() {
	    $this->Session->write('Config.language', 'afr');
	    $this->redirect($this->referer());
	}

}
