<!--COLUMNA IZQUIERDA-->
<section class="col-md-2 col-sm-2" id="columnaIzquierda">
  <!--Perfil del usuario-->
  <header class="jumbotron text-center" id="perfil" >
    <?php echo $this->Html->image('imgperfil.jpg', array('alt' => 'Imagen de perfil', 'width' => '75', 'width' => '75', 'class' => 'img-circle'));?>
    <h1 id="nombre"> <?php echo $user['nombre']?></h1>
  </header>
  <!--Menu vertical de navegacion-->
  <nav class="navbar navbar-default  text-center"  role="navigation">
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
      <ul  class="nav nav-pills nav-stacked" id="sidebar" >
        <li class="active"><a href="#">Inicio</a></li>
        <li><a href="#">Buscar Amigos</a></li>
        <li><a href="#">Amigos</a></li>
        <li><a href="#">Solicitudes  <span class="badge pull-right">4</span></a></li>
        <li><a href="#">Perfil</a></li>
      </ul>
    </div>
  </nav>
</section>
