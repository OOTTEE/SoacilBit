<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

App::import('model','Friend');
App::import('model','User');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array(
    'Session',
    'Auth' => array(
      'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
      'logoutRedirect' => array('controller' => 'pages','action' => 'display','home'),
      'loginAction' => array('controller' => 'pages', 'action' => 'display'),

      //'authorize' => array('Controller'),
      //Autenticacion de password codificada
      'authenticate' => array(
        'Form' => array(
          'passwordHasher' => 'Blowfish'
        )
      )
    )
  );

  //IDIOMAS DE LA APLICACION
  //En este array hay que añadir los idiomas definidos en el sistema
  public $idiomas =array('esp', 'eng');

  public function beforeFilter() {
    //añadimos al ambiente publico acciones para que usuarios no registrados puedan usarlo
    $this->Auth->allow('display', 'login');
    //$this->set('user',$this->Auth->user());
    $userPerfil = new User();
    $res = $userPerfil->find('first',array(
      'conditions' => array('username' => $this->Auth->user()['username'])
    ));
    if(count($res) != 0)
      $this->set('user',$res['User']);

    //Comprobación de que el metodo llamado existen en el contralador
    //de lo contrario se realiza una redireccion al index
    if (!in_array($this->action, $this->methods)) {
      $this->redirect(array('controller' => 'pages' , 'action' => 'display'));
    }


    //Se verifica que el usuario este logueado en la aplicación
    //Y se consulta si tiene solicitudes pendientes de aceptacion
    if($this->Auth->loggedIn()){
      $friend = new Friend();
      $resultado = $friend->find('count' , array(
        'conditions' => array('friend.user_id_friend' => $this->Auth->user()['id'],
                              'friend.solicitud' => true),
      ));
      $this->set('numSolicitudes',$resultado );
    }

    //Cambio de idioma
    //Se verifica que el idioma almacenado en la variable este definido en el sistema
    // de lo contrario se pone el idioma por defecto
    if(!in_array($this->Session->read('lang'), $this->idiomas)){
      $this->Session->write('lang','esp');
    }
    Configure::write('Config.language', $this->Session->read('lang'));

  }

}
