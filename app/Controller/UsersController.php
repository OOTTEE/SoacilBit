<?php
//Importamos el modelo Post para poder hacer uso de el en este otro modelo.
App::import('model','Post');

class UsersController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){
			$Post = new Post();
			//debug($this->Auth->user());

			$resultado=$this->User->query("SELECT p.id as id ,p.post as post ,u.nombre as nombre ,p.fecha as fecha FROM posts p, users u WHERE p.user_id=u.id AND ( p.user_id=".$this->Auth->user()['id']." OR p.user_id IN (
			SELECT f.user_id_friend FROM friends f WHERE f.user_id_user=".$this->Auth->user()['id']."))");
			$this->set('posts',$resultado);

			$post_propio=$this->User->query('SELECT p.id as id_post,p.post,u.nombre,p.fecha FROM posts p, users u WHERE u.id='.$this->Auth->user()['id'].' and p.user_id='.$this->Auth->user()['id'].'');
			$this->set('posts_propio',$post_propio);

			$this->set('menuActivo', 'inicio');

			//debug($resultado);
			//PENDIENTE EL LISTADO DE POST DEL MURO DEL USUARIO
			//debug($Post->find('all'));

	}

	public function beforeFilter(){
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
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
			return $this->redirect($this->Auth->redirect());
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
		$this->set('usuarios',$this->User->query("SELECT * , (SELECT COUNT(f1.user_id_user)
																													FROM friends f1 LEFT JOIN friends f2 ON f1.user_id_friend=f2.user_id_friend
																													WHERE f1.user_id_user=".$this->Auth->user()['id']." AND f2.user_id_user=u.id ) as amigosComun
																						 FROM users u
																						 WHERE u.id <> ".$this->Auth->user()['id']." AND
																										u.id not in ( SELECT f.user_id_friend
																																FROM friends f
																																WHERE f.user_id_user = ".$this->Auth->user()['id'].")"
		));
		$this->set('menuActivo', 'buscarAmigos');
	}

	public function perfil(){

		$this->set('misPosts',$this->User->query("SELECT p.id as id_post,p.post,u.nombre,p.fecha
		 FROM posts p, users u
		WHERE u.id=".$this->Auth->user()['id']." and p.user_id=".$this->Auth->user()['id']));
		$this->set('menuActivo', 'perfil');
	}





}
