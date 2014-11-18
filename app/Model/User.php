<?php
class User extends AppModel{
  public $validate = array(
    'alias' => array(
        'rule' => 'alphaNumeric',
        'required' => true,
        'allowEmpty' => false,
        'message' => 'Campo Vacio'
      ),
		'nombre' => array(
			'rule' => 'alphaNumeric',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Campo Vacio'
		),
    'pass' => array(
      'rule' => 'alphaNumeric',
      'required' => true,
      'allowEmpty' => false,
      'message' => 'Campo Vacio'
    ),
    /*'pass2' => array(
      'rule' => 'alphaNumeric',
      'required' => true,
      'allowEmpty' => false,
      'message' => 'Campo Vacio'
    )*/
  );
}
