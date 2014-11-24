<?php
//Importamos el modelo Post para poder hacer uso de el en este otro modelo.
App::import('model','Post');

class UsersController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){
			$Post = new Post();
			debug($this->Auth->user());

			$resultado=$this->User->query("SELECT p.id as id ,p.post as post ,u.nombre as nombre ,p.fecha as fecha FROM posts p, users u WHERE p.user_id=u.id AND ( p.user_id=".$this->Auth->user()['id']." OR p.user_id IN (
			SELECT f.user_id_friend FROM friends f WHERE f.user_id_user=".$this->Auth->user()['id']."))");
			$this->set('posts',$resultado);
			debug($resultado);
			//PENDIENTE EL LISTADO DE POST DEL MURO DEL USUARIO
			//debug($Post->find('all'));

	}

	public function beforeFilter(){
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->set('user',$this->Auth->user());
		$this->Auth->allow('add');
	}

	public function add(){
			if ($this->request->is('post')) {
					if($this->User->save($this->request->data)){
							$this->Session->setFlash('Usuario Registrado');
							$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
					}else{
							if(isset($this->User->validationErrors['username'][0])){
								$this->Session->setFlash($this->User->validationErrors['username'][0]);
							}
							if(isset($this->User->validationErrors['password'][0])){
								$this->Session->setFlash($this->User->validationErrors['password'][0]);
							}
							if(isset($this->User->validationErrors['nombre'][0])){
								$this->Session->setFlash($this->User->validationErrors['nombre'][0]);
							}
					}
			}
			$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
	}

	/**
	*	Login del usuario.
	*/
	public function login(){
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}
	/**
	*	Logout del usuario
	*/
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function buscarAmigos(){
		//SELECT * FROM users u WHERE u.id not in ( SELECT f.user_id_friend FROM friends f WHERE f.user_id_user = '.$this->Auth->user()['id'].' )
		debug($this->User->query('SELECT * FROM users u WHERE u.id not in ( SELECT f.user_id_friend FROM friends f WHERE f.user_id_user = '.$this->Auth->user()['id'].' )'));
	}
}
