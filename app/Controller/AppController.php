
<?php
App::uses('BlowfishPasswordHasher','Controller/Component/Auth');
App::uses('Controller', 'Controller');

class AppController extends Controller{
    public $helpers = array('Html','Form', 'Js','Tinymce');
	  public $components = array(
               'Session',
               'Auth' => array(
                    'authenticate' => array(
                        'Form' => array(
                          'fields' => array('username' => 'email'),
                          'passwordHasher' => 'Blowfish'
                             ), 
                        ),
                    // 'authError' => 'Not allowed to view the page.',
                    'authorize' => array('Controller'),
                   )
             ); 
    public function isAuthorized($user){
       $this->Session->setFlash('Sorry, you are not authorized to view that page.', 'error2');    
       return false;
    }
    public function beforeFilter(){
            // $this->Session->write('Config.language', 'eng'); 
       Configure::write('Config.language', $this->Session->read('Config.language'));
    } 
}
?>

<?Php
    //   if(isset($this->request->params['named']['lang'])){
    //      Configure::write('Config.language',$this->request->params['named']['lang']);
    //      $this->Article->locale= $this->request->params['named']['lang'];
    //   }else{
    //     Configure::write('Config.language', 'eng');
    //   }
    // }

?>