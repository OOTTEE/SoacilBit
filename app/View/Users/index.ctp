<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
  <!--Incluimos la plantilla muroHeader-->
  <?php echo $this->element('muroHeader'); ?>
  <!-- Muro del usuario-->
  <section class="container-fluid" id="muro">
    <ul class="media-list">
      <!--posts que se muestran en el muro del usuario-->
      <li class="media" id="post">
        <div class="pull-right" id="ilike">
          <span class="glyphicon glyphicon-heart"></span>
        </div>
        <span id="numLikes">1</span>
        <a class="pull-left" href="#">
          <?php echo $this->Html->image('imgperfil.jpg', array('alt' => 'imagen de perfil', 'class' => 'media-object img-rounded'));?>
        </a>
        <article class="media-body">
          <h4 class="media-heading">Usuario <span id="hora">10/10/2014</span></h4>
          <p> El perro de San roque no te tiene rabo por que juaquin ramirez se lo ha cortado </p>
        </article>
      </li>
    </ul>
  </section>
</section>
