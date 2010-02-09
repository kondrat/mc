<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Javascript');
	var $components = array( 'Security','Cookie','userReg','kcaptcha');
	var $pageTitle = 'Users data';
	var $paginate = array('limit' => 5);
	
//--------------------------------------------------------------------
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow( 'logout','login', 'reg','kcaptcha', 'reset', 'acoset','aroset','permset','buildAcl');
          
        //to Del:
        //$this->Auth->allowedActions = array('*');

        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
        
        // swiching off Security component for ajax call
			if( isset($this->Security) && $this->RequestHandler->isAjax() ) {
     			$this->Security->enabled = false; 
     		}
    }
//--------------------------------------------------------------------
//--------------------------------------------------------------------	
	function reg() {
		
		if($this->Auth->user('id')) {
			$this->redirect('/',null,true);
		}
		
		$this->pageTitle = __('SignUp',true);
		
		if ( !empty($this->data) ) {
						
			$this->data['User']['captcha2'] = $this->Session->read('captcha');

			if ( $this->User->save( $this->data) ) {
				
    		$this->Session->delete('guestKey');
    		//$this->Cookie->delete('IniVars');
    		//$this->Cookie->delete('guestKey');				
							
				$a = $this->User->read();
				$this->Auth->login($a);
				$this->Session->setFlash(__('New user\'s accout has been created',true));
				$this->redirect(array('controller' => 'intervals','action'=>'index'),null,true);
         	} else {
				$this->data['User']['captcha'] = null;
				$this->Session->setFlash(__('New user\'s accout hasn\'t been created',true) , 'default', array('class' => 'er') );
			}
		}
		
		

	}	
//--------------------------------------------------------------------	
//ajax staff
	//----------------------------------------------------------------
		function userNameCheck() {

			$errors = array();
			Configure::write('debug', 0);
			$this->autoRender = false;
			//don't foreget about santization and trimm
			if (!empty($this->data) && $this->data['User']['username'] != null) {
				if ($this->RequestHandler->isAjax()) {
					$this->User->set( $this->data );
					$errors = $this->User->invalidFields();
					if($errors == array()) {
						$type = 1;
						$errors['username'] = __('Login is free',true);
					} else {
						$type = 0;
					}
					echo json_encode(array('hi'=> $errors['username'], 'typ'=> $type));
					
							Configure::write('debug', 0);
							$this->autoRender = false;
				 			exit();						
						
				}
			} else {
					echo json_encode(array('hi'=> __('This field cannot be left blank',true), 'typ'=> 0));
					
							Configure::write('debug', 0);
							$this->autoRender = false;
				 			exit();	
			}		
		}
		//kcaptcha stuff
		//----------------------------------------------------------------
    function kcaptcha() {
        $this->kcaptcha->render(); 
    } 
    function kcaptchaReset() {
    	Configure::write('debug', 0);
    	$this->autoRender = false;
     	$this->kcaptcha->render(); 
     	exit();
    } 
//--------------------------------------------------------------------
	function login() {
		$this->pageTitle = __('Login',true);

		if( !empty($this->data) ) {

			if( $this->Auth->login() ) {
					
    		$this->Session->delete('guestKey');
    		//$this->Cookie->delete('IniVars');
    		//$this->Cookie->delete('guestKey');


					if ($this->referer()=='/') {
						$this->redirect( $this->Auth->redirect() );
					} else {

						$this->redirect( $this->Auth->redirect() );
					}
			
			} else {

				$this->data['User']['password'] = null;
				$this->Session->setFlash(__('Check your login and password',true),'default', array('class' => 'er'));
			}
		} else {
			if( !is_null( $this->Session->read('Auth.User.username') ) ){

				$this->redirect( $this->Auth->redirect() );			
			}
		}
		
	}

//--------------------------------------------------------------------	
    function logout() {
    	    	
    		$tempUserName = __('Good bay, ',true).$this->Session->read('Auth.User.username');
    		
    		$this->Session->delete('guestKey');
    		$this->Cookie->delete('IniVars');
    		$this->Cookie->delete('guestKey');
    		
    		
    		
        $this->Auth->logout();
        $this->Session->setFlash( $tempUserName, 'default', array('class' => '') );
        $this->redirect( '/',null,true);        
    }
//--------------------------------------------------------------------	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
