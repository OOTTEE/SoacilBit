<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class User extends AppModel{
  public $validate = array(
    'username' => array(
      'requiredIsUnique' => array(
        'rule' => 'isUnique',
        'message' => 'El nombre de usuario se encuentra en uso.'
      ),
      'requiredAlphaNumeric' => array(
        'rule' => 'alphaNumeric',
        'required' => true,
        'message' => 'El nombre de usuario solo puede contener letras y caracteres'
      )
    ),
		'nombre' => array(
      'rule' =>'/[.]*/i',
      'required' => true,
      'allowEmpty' => false,
      'message' => 'Campo Vacio'
		),
    'password' => array(
      'rule' => array('minLength', 8),
      'required' => true,
      'allowEmpty' => false,
      'message' => 'minimo 8 caracteres/digitos'
    )
  );

  public function beforeSave($options = array()) {
      if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
        $this->data[$this->alias]['password']
      );
    }
    return true;
  }

}
