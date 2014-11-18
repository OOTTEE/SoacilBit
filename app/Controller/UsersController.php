<?php
class UsersController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){

	}
	public function add(){
			if ($this->request->is('post')) {
					$count = $this->User->find('count' , array('conditions' => array('User.alias' => $this->request->data['user']['alias'])));
					debug($this->request->data);
					if($count == 0){
						if($this->User->save($this->request->data)){
								$this->Session->setFlash('Usuario Registrado');
						}else
							$this->Session->setFlash('Error en el registro');
					}else
						$this->Session->setFlash('Error Usuario ya existe');
			}
			//$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
	}
	public function login(){

	}
}
