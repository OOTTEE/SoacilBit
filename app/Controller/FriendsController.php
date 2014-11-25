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

  public function friends(){
    $friends=$this->Friend->find('all', array(
      'conditions' => array('user_id_user' => $this->Auth->user()['id'],'solicitud'=>0),
    ));

    $this->set('misAmigos', $friends);
    $this->set('menuActivo', 'amigos');


  }





}
