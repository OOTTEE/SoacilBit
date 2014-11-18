
		<div class="jumbotron row" id="login">
		<div  class="col-md-offset-2 col-md-8">
			<?php echo $this->Html->image('LOGO.png', array('alt' => 'SocialBit'));?>
		</div>
		<div class="col-md-offset-2 col-md-8" id="form_login">
			<?php
				echo $this->Form->create('user', array(
					'action' => 'add',
					'class' => 'form-horizontal',
					'role' => 'form',
					'inputDefaults' => array(
							'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
							'div' => array('class' => 'form-group'),
							'label' => array('class' => 'control-label'),
							'between' => '<div class="col-sm-6">',
							'after' => '</div>',
							'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
					)));

					echo $this->Form->input('user.alias', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Usuario'), 'placeholder' => 'Usuario','class'=>'form-control'));
					echo $this->Form->input('user.nombre', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Nombre Completo'), 'placeholder' => 'Nombre Completo','class'=>'form-control'));
					echo $this->Form->input('user.pass', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Contraseña'), 'placeholder' => 'Password','class'=>'form-control'));
					//echo $this->Form->input('user.pass2', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Repite Contraseña'), 'placeholder' => 'Repite Password','class'=>'form-control'));
			?>
					<div class="form-group">
						<?php	echo $this->Form->end(array( 'label' => 'Registro','div' => array( 'class' => 'col-sm-offset-3 col-sm-6',), 'class'=>'btn btn-default' ));?>
					</div>

		</div>
		<div class="col-md-offset-2 col-md-8" id="form_login">
			<?php
				echo $this->Form->create('user', array(
					'action' => 'login',
					'class' => 'form-horizontal',
					'role' => 'form',
					'inputDefaults' => array(
							'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
							'div' => array('class' => 'form-group'),
							'label' => array('class' => 'control-label'),
							'between' => '<div class="col-sm-6">',
							'after' => '</div>',
							'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
					)));

					echo $this->Form->input('user.alias', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Usuario'), 'placeholder' => 'Usuario','class'=>'form-control'));
					echo $this->Form->input('user.pass', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Contraseña'), 'placeholder' => 'Password','class'=>'form-control'));
			?>
			<div class="form-group">
					<?php	echo $this->Form->end(array( 'label' => 'Acceso','div' => array( 'class' => 'col-sm-offset-3 col-sm-6',), 'class'=>'btn btn-default' ));?>
			</div>

		</div>


	</div>
