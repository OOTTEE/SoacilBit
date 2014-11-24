<!DOCTYPE html>
<html  lang="es" >
  <head>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>SocialBit</title>
    <link rel="shortcut icon" href="./image/ico.png">
    <!-- Ficheros de estilo para el debug -->
    <?php echo $this->Html->css('style-debug');?>
    <!-- Fichero de estilo -->
    <?php echo $this->Html->css('bootstrap.min.css');?>
    <?php echo $this->Html->css('bootstrap-theme.min.css');?>
    <?php echo $this->Html->css('estilo.css');?>
  </head>
  <body>
    <?php echo $this->Session->flash(); ?>

    <div id="cuerpo">
      <!--CONTENIDO-->
      <section   class="col-sm-10 col-md-8 col-lg-7" id="columnaDerecha">
        <div class="container-fluid" >
          <!-- Muro del usuario-->
          <?php echo $this->fetch('content'); ?>
        </section>
      </div>
    <?php echo $this->element('sql_dump'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min.js');?>
  </body>
</html>
