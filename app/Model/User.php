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

  public function getPostFriends(){
    return $this->query("SELECT p.id as id ,p.post as post ,u.nombre as nombre, u.image  ,p.fecha as fecha ,
                    (SELECT count(l.post_id) as numLikes FROM likes l WHERE l.post_id = p.id) as numLikes,
                    (SELECT count(*) FROM likes WHERE user_id = $this->id AND post_id = p.id) AS likeMe
                  FROM posts p, users u
                  WHERE p.user_id=u.id
                    AND ( p.user_id=$this->id
                    OR p.user_id IN ( SELECT f.user_id_friend
                                      FROM friends f
                                      WHERE f.user_id_user=$this->id
                                        AND f.solicitud = 0))
                  Order by p.fecha desc");
  }

  public function buscarAmigos( $f){

    $filtro = (isset($f)) ? " AND u.nombre LIKE '%$f%'" : "";

    return $this->query("SELECT * , (SELECT COUNT(f1.user_id_user)
                                      FROM friends f1 LEFT JOIN friends f2 ON f1.user_id_friend=f2.user_id_friend
                                      WHERE f1.user_id_user=$this->id AND f2.user_id_user=u.id ) as amigosComun
                        FROM users u
                        WHERE u.id <> $this->id
                          AND	u.id not in ( SELECT f.user_id_friend
                                            FROM friends f
                                            WHERE f.user_id_user = $this->id )
                          $filtro"
    );
  }

  public function getPerfil(){
    return $this->query("SELECT p.id as id_post, p.post, u.nombre, p.fecha, u.image,
                  (SELECT count(l.post_id) as numLikes
                    FROM likes l
                    WHERE l.post_id = p.id) as numLikes
                  FROM posts p, users u
                  WHERE u.id=$this->id
                    AND p.user_id=$this->id Order by p.fecha desc ");
  }

}
