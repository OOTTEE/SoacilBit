<section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
  <div class="container-fluid" >
    <!--Incluimos la plantilla muroHeader-->
    <?php echo $this->element('muroHeader'); ?>
    <!-- Muro del usuario-->
    <section class="container-fluid" id="editPerfil" >
      <?php
        echo $this->Form->create('User', array(
          'enctype'=>'multipart/form-data',
          'action' => 'upImagePerfil',
          'class' => 'form-horizontal',
          'role' => 'form',
          'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group'),
            'between' => '<div class="col-sm-12">',
            'after' => '</div>',
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
          )));
          ?>
        <div class="form-group">
          <div class="col-sm-12">
            <label for="imagenInput" class="control-label">Imagen de Perfil</label>
            <?php
              echo $this->Form->file('image',array('id'=>'imagenInput', 'class'=>'form-control'));
            ?>
          </div>
        </div>
        <div class="form-group">
          <?php	echo $this->Form->end(array( 'label' => 'Guardar','div' => array( 'class' => 'col-sm-12'), 'class'=>'btn btn-default' ));?>
        </div>
    </section>
</section>
