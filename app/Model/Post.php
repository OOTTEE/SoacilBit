<?php
class Post extends AppModel{
  public $belongsTo = array(
    'User' => array(
      'className'    => 'User',
      'foreignKey'   => 'user_id'
    )
  );
  public $validate = array(
    'post' => array(
      'maxLength' => array(
        'rule' => array('maxLength',512),
        'required' => true,
        'message' => 'Longitud maxima de un post 512 caracteres'
      ),
    )
  );

}
