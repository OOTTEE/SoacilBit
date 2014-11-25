<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
    <!--Incluimos la plantilla muroHeader-->
    <?php echo $this->element('buscarAmigosHeader'); ?>
    <!-- Muro del usuario-->
    <?php //debug($usuarios);?>
    <section class="container-fluid" id="muro">
      <?php foreach($usuarios as $usuario):?>
          <div class="col-lg-6 media" id="usuario">
            <div class="pull-right" id="addUser">
              <?php echo $this->Form->create('Friend', array('action' => 'addSolicitudAmistad'));
                    echo $this->Form->hidden('user_id_user',array('value'=>$user['id']));
                    echo $this->Form->hidden('user_id_friend',array('value'=>$usuario['u']['id']));
                    echo $this->Form->end('+');
              ?>
            </div>
            <a class="pull-left" href="#">
              <?php echo $this->Html->image('imgperfil.jpg', array('alt' => 'imagen de perfil', 'class' => 'media-object img-rounded'));?>
            </a>
            <article class="media-body">
              <h4 class="media-heading"><?php echo $usuario['u']['nombre']?></h4>
              <p>Amigos en comun <?php echo $usuario[0]['amigosComun']?></p>
            </article>
          </div>
      <?php endforeach; ?>
    </section>
</section>
