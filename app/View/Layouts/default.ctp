<!DOCTYPE html>
<html>
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
    <?php echo $this->element('sidebar'); ?>

    <?php echo $this->fetch('content'); ?>

    <div class="row">
      <div class="col-md-9 text-right">
        <?php echo $this->html->link(__('ESP'),
                                    array('controller' => 'Users', 'action' => 'cambioIdioma',
                                    '?' => array('lang' => 'esp')));?>
        <?php echo $this->html->link(__('ENG'),
                                    array('controller' => 'Users', 'action' => 'cambioIdioma',
                                    '?' => array('lang' => 'eng')));?>
      </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min.js');?>
  </body>
</html>
