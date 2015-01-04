<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
//Importamos el modelo Post para poder hacer uso de el en este otro modelo.
App::import('model','Post');

class UsersController extends AppController{
	public $helpers = array('Html','Form');
	public function index(){
			$Post = new Post();

			$this->User->id=$this->Auth->user()['id'];
			$this->set('posts',$this->User->getPostFriends());

			$this->set('menuActivo', 'inicio');

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
		$this->User->id=$this->Auth->user()['id'];
		if($this->request->is('get') AND isset($this->request->query['search']) ){
			$this->set('usuarios', $this->User->buscarAmigos($this->request->query['search']));
		}else{
			$this->set('usuarios', $this->User->buscarAmigos(null));
		}

		$this->set('menuActivo', 'buscarAmigos');
	}

	public function perfil(){
		$this->User->id=$this->Auth->user()['id'];
		$this->set('misPosts',$this->User->getPerfil());
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

	//Muestra el menu de editar el perfil
	public function editPerfil(){
		$this->set('menuActivo', 'inicio');
	}


	//Esta funcion cambia el idioma de la aplicación si existe en el sistema
	//de lo contrario no hace nada.
	public function cambioIdioma(){
		if($this->request->is('get')){
			if(in_array($this->request->query['lang'], $this->idiomas)){
				$this->Session->write('lang',$this->request->query['lang']);
			}
		}
		$this->redirect('/');
	}
}
