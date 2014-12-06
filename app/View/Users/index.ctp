<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
  <!--Incluimos la plantilla muroHeader-->
  <?php echo $this->element('muroHeader'); ?>
  <!-- Muro del usuario-->
  <section class="container-fluid" id="muro">
    <ul class="media-list">
      <!--posts que se muestran en el muro del usuario-->
      <?php

      foreach ($posts as $value) {
      ?><li class="media" id="post">
        <div class="pull-right" id="ilike">

              <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-heart" id="'.(($value[0]['likeMe'] == '1')? 'likeMe': '').'" ></span>',
              array( 'controller' => 'Likes', 'action' => 'addLike'),
              array( 'data' => array('post_id' => $value['p']['id']),
                      'escape' => false ));
              ?>
        </div>
        <span id="numLikes"><?php echo $value[0]['numLikes'];?></span>
        <a class="pull-left" href="#">
          <?php echo $this->Html->image(($value['u']['image'] != '') ? $value['u']['image'] : 'imgperfil.jpg', array('alt' => 'imagen de perfil', 'class' => 'media-object img-rounded'));?>
        </a>
        <article class="media-body">
          <h4 class="media-heading"><?php echo $value['u']['nombre'];?> <span id="hora"><?php echo $value['p']['fecha'];?></span></h4>
          <p> <?php echo $value['p']['post'];?> </p>
        </article>
      </li>
    <?php } ?>
    </ul>
  </section>
</section>
