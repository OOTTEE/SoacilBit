<?php
class FriendsController extends AppController{

  public function addSolicitudAmistad(){

    if($this->request->is('post')){
      $this->Friend->saveField('fecha', date("Y-m-d H:i:s"));
      $this->Friend->save($this->request->data);


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

  public function showSolicitudes(){
    $res = $this->Friend->find('all',array(
      'conditions' => array('user_id_user' => $this->Auth->user()['id'],
      'solicitud' => 1)
    ));
    $this->set('usuarios', $res);
    $this->set('menuActivo', 'solicitudes');
  }

  public function acceptSolicitud(){
    $friend = $this->Friend->find('first', array(
          'conditions' => array('Friend.id' => $this->data['Friend']['id'])
          ));
    $this->Friend->create();
    $this->Friend->saveField('id', $this->data['Friend']['id']);
    $this->Friend->saveField('solicitud', 0);
    $this->Friend->save(array('Friend' => array(
        'Friend.id' => $this->data['Friend']['id'],
        'Friend.solicitud' => 0
      )));
    $this->redirect(array('controller' => 'Friends', 'action' => 'showSolicitudes'));
  }


}
