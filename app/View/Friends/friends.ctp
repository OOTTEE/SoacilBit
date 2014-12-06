<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
    <!--Incluimos la plantilla muroHeader-->
    <?php echo $this->element('buscarAmigosHeader'); ?>
    <!-- Muro del usuario-->
    <?php //debug($usuarios);?>
    <section class="container-fluid" id="muro">
      <?php foreach($misAmigos as $a):?>
        <div class="col-lg-6 media" id="usuario">
          <a class="pull-left" href="#">
            <?php echo $this->Html->image(($a['User']['image'] != '') ? $a['User']['image'] : 'imgperfil.jpg', array('alt' => 'imagen de perfil', 'class' => 'media-object img-rounded'));?>
          </a>
          <article class="media-body">
            <h4 class="media-heading"><?php echo $a['User']['nombre']?></h4>
          </article>
        </div>
      <?php endforeach; ?>
    </section>
  </section>
