<!--COLUMNA IZQUIERDA-->
<section class="col-md-2 col-sm-2" id="columnaIzquierda">
  <!--Perfil del usuario-->
  <header class="jumbotron text-center" id="perfil" >
    <div>
      <?php echo $this->Html->image( ($user['image'] == '')? 'imgperfil.jpg' : $user['image'] , array('alt' => 'Imagen de perfil', 'width' => '75', 'height' => '75', 'class' => 'img-circle'));?>
    </div>
    <div>
      <?php echo $this->html->link('<span class="glyphicon glyphicon-camera"></span>',
      array('controller' => 'Users', 'action' => 'editPerfil'),
      array('escape' => false));?>
    </div>
    <div>
      <h1 id="nombre"> <?php echo $user['nombre']?></h1>
    <div>
    </div>
      <?php echo $this->html->link('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>', array('controller' => 'Users', 'action' => 'logout'), array('escape' => false));?>
    </div>

  </header>
  <!--Menu vertical de navegacion-->
  <nav class="navbar navbar-default  text-center"  role="navigation">
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
      <ul  class="nav nav-pills nav-stacked" id="sidebar" >
        <li <?php if($menuActivo == 'inicio'){ echo 'class="active"'; }?>>
          <?php echo $this->html->link(__('index'), array('controller' => 'Users', 'action' => 'index'));?>
        </li>
        <li <?php if($menuActivo == 'buscarAmigos'){ echo 'class="active"'; }?>>
          <?php echo $this->html->link(__('findFriends'), array('controller' => 'Users', 'action' => 'buscarAmigos'));?>
        </li>
        <li <?php if($menuActivo == 'amigos' ){ echo 'class="active"';}?>>
          <?php echo $this->html->link(__('friends'), array('controller' => 'Friends', 'action' => 'friends'));?>
        </li>
        <li <?php if($menuActivo == 'solicitudes'){ echo 'class="active"';}?>>
          <?php echo $this->html->link(__('Solicitudes').'  <span class="badge pull-right">'.$numSolicitudes.'</span>', array('controller' => 'Friends', 'action' => 'showSolicitudes'), array('escape' => false));?>

        </li>
        <li <?php if($menuActivo == 'perfil'){echo  'class="active"';}?>>
          <?php echo $this->html->link(__('profile'), array('controller' => 'Users', 'action' => 'perfil'));?>
        </li>
      </ul>
    </div>
  </nav>

</section>
