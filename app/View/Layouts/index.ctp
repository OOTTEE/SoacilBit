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

    <div class="row">
      <div class="col-md-12 text-right">
        <?php echo $this->html->link(__('ESP'),
        array('controller' => 'Users', 'action' => 'cambioIdioma',
        '?' => array('lang' => 'esp')));?>
        <?php echo $this->html->link(__('ENG'),
        array('controller' => 'Users', 'action' => 'cambioIdioma',
        '?' => array('lang' => 'eng')));?>
      </div>
    </div>
    <div id="cuerpo">
      <!--CONTENIDO-->
      <div class="jumbotron row" id="login">
        <div class="col-md-offset-2 col-md-8">
          <?php echo $this->fetch('content'); ?>
        </div>
      </div>
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min.js');?>
  </body>
</html>
