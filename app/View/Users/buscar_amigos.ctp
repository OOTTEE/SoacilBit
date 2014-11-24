<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
    <!--Incluimos la plantilla muroHeader-->
    <?php echo $this->element('buscarAmigosHeader'); ?>
    <!-- Muro del usuario-->
    <?php //debug($usuarios);?>
    <section class="container-fluid" id="muro">
      <?php foreach($usuarios as $user){?>
            <div class="col-lg-6 media" id="usuario">
              <div class="pull-right" id="addUser">
                <span class="glyphicon glyphicon-plus"></span>
              </div>
              <a class="pull-left" href="#">
                <img class="media-object img-rounded" src="./image/imgperfil.jpg" alt="imagen de perfil">
              </a>
              <article class="media-body">
                <h4 class="media-heading"><?php echo $user['u']['nombre']?></h4>
                <p>Amigos en comun <?php echo $user[0]['amigosComun']?></p>
              </article>
            </div>
      <?php }?>
    </section>
</section>
