<?php
class FriendsController extends AppController{

  public function addSolicitudAmistad(){

    if($this->request->is('post')){
      $this->Friend->saveField('fecha', date("Y-m-d H:i:s"));
      $this->Friend->save($this->request->data);


    }
    $this->redirect(array( 'controller' => 'Users', 'action' => 'buscarAmigos'));
  }


  public function showSolicitudes(){
    $res = $this->Friend->find('all',array(
      'conditions' => array('user_id_friend' => $this->Auth->user()['id'],
                            'solicitud' => 1)
    ));
    $this->set('menuActivo', 'buscarAmigos');
  }

}
