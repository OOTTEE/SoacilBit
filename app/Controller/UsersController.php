<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
//Importamos el modelo Post para poder hacer uso de el en este otro modelo.
App::import('model','Post');

class UsersController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){
			$Post = new Post();
			//debug($this->Auth->user());


			$resultado=$this->User->query("SELECT p.id as id ,p.post as post ,u.nombre as nombre, u.image  ,p.fecha as fecha ,
				(SELECT count(l.post_id) as numLikes FROM likes l WHERE l.post_id = p.id) as numLikes,
				(SELECT count(*) FROM likes WHERE user_id = ".$this->Auth->user()['id']." AND post_id = p.id) AS likeMe
				FROM posts p, users u WHERE p.user_id=u.id AND ( p.user_id=".$this->Auth->user()['id']." OR p.user_id IN (
			SELECT f.user_id_friend FROM friends f WHERE f.user_id_user=".$this->Auth->user()['id']."))Order by p.fecha desc");
			$this->set('posts',$resultado);

			$this->set('menuActivo', 'inicio');

			//debug($resultado);
			//PENDIENTE EL LISTADO DE POST DEL MURO DEL USUARIO
			//debug($Post->find('all'));

	}

	public function beforeFilter(){
		parent::beforeFilter();
		//Añadimos la accion add al ambiente publico
		$this->Auth->allow('add','cambioIdioma');


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
		if($this->request->is('get') AND isset($this->request->query['search']) ){
			$filtro = "AND u.nombre LIKE '%".$this->request->query['search']."%'";
		}else{
			$filtro='';
		}
		//SELECT * FROM users u WHERE u.id not in ( SELECT f.user_id_friend FROM friends f WHERE f.user_id_user = '.$this->Auth->user()['id'].' )
		$this->set('usuarios',$this->User->query("SELECT * , (SELECT COUNT(f1.user_id_user)
																													FROM friends f1 LEFT JOIN friends f2 ON f1.user_id_friend=f2.user_id_friend
																													WHERE f1.user_id_user=".$this->Auth->user()['id']." AND f2.user_id_user=u.id ) as amigosComun
																						 FROM users u
																						 WHERE u.id <> ".$this->Auth->user()['id']."
																							AND	u.id not in ( SELECT f.user_id_friend
																																FROM friends f
																																WHERE f.user_id_user = ".$this->Auth->user()['id'].")".$filtro
		));
		$this->set('menuActivo', 'buscarAmigos');
	}

	public function perfil(){

		$this->set('misPosts',$this->User->query("SELECT p.id as id_post,p.post,u.nombre,p.fecha , u.image, 
																							(SELECT count(l.post_id) as numLikes FROM likes l WHERE l.post_id = p.id) as numLikes
		 																					FROM posts p, users u
																							WHERE u.id=".$this->Auth->user()['id']." and p.user_id=".$this->Auth->user()['id']." Order by p.fecha desc "));
		$this->set('menuActivo', 'perfil');
	}

	public function upImagePerfil(){
		if($this->request->is('post')){
			$dir = new Folder(APP.'webroot/img/imagenes', true, 0755);
			$newName = 'imagenes/'.$this->Auth->user()['id'].'-'.$this->data['User']['image']['name'];
			move_uploaded_file($this->data['User']['image']['tmp_name'],APP.'webroot/img/'.$newName);

			$this->User->create();
			$this->User->saveField('id', $this->Auth->user()['id']);
			$this->User->saveField('image', $newName);
			$this->User->save();
			$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
		}
	}

	public function editPerfil(){
		$this->set('menuActivo', 'inicio');
	}

	public function cambioIdioma(){
		if($this->request->is('get')){
			if(in_array($this->request->query['lang'], $this->idiomas)){
				$this->Session->write('lang',$this->request->query['lang']);
			}
		}
		$this->redirect('/');
	}
}
