<?php
class FriendsController extends AppController{

  public function addSolicitudAmistad(){

    if($this->request->is('post')){
      debug($this->request->data);
      $this->Friend->saveField('fecha', date("Y-m-d H:i:s"));
      $this->Friend->save($this->request->data);
      debug($this->Friend->find('all'));

    }
    $this->redirect(array( 'controller' => 'Users', 'action' => 'buscarAmigos'));
  }

}
