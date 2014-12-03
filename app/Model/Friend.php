<?php
class Friend extends AppModel{
  public $primaryKey = 'id';
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'user_id_friend'
    )
  );

}
