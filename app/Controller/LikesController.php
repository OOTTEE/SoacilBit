<?php

class LikesController extends AppController{
  public function addLike(){
    if($this->request->is('post')){

        $num = $this->Like->find('first', array( 'conditions' => array(
              'post_id' => $this->request->data['post_id'],
              'user_id' => $this->Auth->user()['id']
        )));

        if(count($num) == 1){
          $c = $this->Like->deleteAll( array(
            'post_id' => $this->request->data['post_id'],
            'user_id' => $this->Auth->user()['id']
          ));

        }else{
          $this->Like->save(array( 'Like' => array('post_id' => $this->request->data['post_id'],
                                                          'user_id' => $this->Auth->user()['id'])));

        }
        $this->redirect(array('controller' => 'pages' , 'action' => 'display'));

    }
  }

}
