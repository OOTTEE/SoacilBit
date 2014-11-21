<?php
class PostsController extends AppController{
  public $helpers = array('html', 'Form');


  public function index(){


  }

  public function add(){
    debug($this->Auth->user());
    debug($this->request->data);
    if($this->request->is('post')){
      $this->Post->saveField('user_id', $this->Auth->user()['id']);
      $this->Post->saveField('fecha', date("Y-m-d H:i:s"));
      if($this->Post->save($this->request->data)){
          echo "post guardado";
      }else{
        //PENDIENTE MOSTRAR UN MENSAJE DE ERROR EN CASO DE QUE NO SE PUEDA GUARDAR EL POST
        debug($this->Post->validationErrors);
      }
    }
    $this->redirect(array('controller' => 'Users', 'action' => 'index'));
  }



}
