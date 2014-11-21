<!--barra superior-->
<nav class="navbar navbar-default" id="barraSuperior" role="navigation">
  <!--Boton oculto, para expansion del menu de navegación en dispositivos moviles -->
  <div class="navbar-header pull-right">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!--Nombre Logo de la pagina-->
  <div class="navbar-header" id="logo">
    <a class="navbar-brand" href="#"><?php echo $this->Html->image('nombre.png', array('alt' => 'SocialBit', 'width' => '112'));?></a>
  </div>
  <!--barra multiproposito -->
  <div class="collapse navbar-collapse pull-right" id="multiBox" >
    <form class="navbar-form navbar-left " role="search"  id="textBox" >
      <div class="form-group">
        <label for="multiBox">¿Que Piensas?</label>
        <input type="text" class="form-control text-right" placeholder="+"></span><!--lupa -> &#xe003; -->
      </div>
    </form>
  </div>
</div>
</nav>