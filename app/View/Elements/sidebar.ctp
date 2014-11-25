<!--COLUMNA IZQUIERDA-->
<section class="col-md-2 col-sm-2" id="columnaIzquierda">
  <!--Perfil del usuario-->
  <header class="jumbotron text-center" id="perfil" >
    <?php echo $this->Html->image('imgperfil.jpg', array('alt' => 'Imagen de perfil', 'width' => '75', 'width' => '75', 'class' => 'img-circle'));?>
    <h1 id="nombre"> <?php echo $user['nombre']?>
      <?php echo $this->html->link('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>', array('controller' => 'Users', 'action' => 'logout'), array('escape' => false));?>
    </h1>

  </header>
  <!--Menu vertical de navegacion-->
  <nav class="navbar navbar-default  text-center"  role="navigation">
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
      <ul  class="nav nav-pills nav-stacked" id="sidebar" >
        <li <?php if($menuActivo == 'inicio'){ echo 'class="active"'; }?>>
          <?php echo $this->html->link('Inicio', array('controller' => 'Users', 'action' => 'index'));?>
        </li>
        <li <?php if($menuActivo == 'buscarAmigos'){ echo 'class="active"'; }?>>
          <?php echo $this->html->link('Buscar de amigos', array('controller' => 'Users', 'action' => 'buscarAmigos'));?>
        </li>
        <li <?php if($menuActivo == 'amigos' ){ echo 'class="active"';}?>>
          <?php echo $this->html->link('Amigos', array('controller' => 'Friends', 'action' => 'friends'));?>
        </li>
        <li <?php if($menuActivo == 'solicitudes'){ echo 'class="active"';}?>>
          <?php echo $this->html->link('Solicitudes  <span class="badge pull-right">4</span>', array('controller' => 'Friends', 'action' => 'showSolicitudes'), array('escape' => false));?>

        </li>
        <li <?php if($menuActivo == 'perfil'){echo  'class="active"';}?>>
          <?php echo $this->html->link('Perfil', array('controller' => 'Users', 'action' => 'perfil'));?>
        </li>
      </ul>
    </div>
  </nav>

</section>
