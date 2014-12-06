
	<div class="jumbotron row" id="login">
		<div class="container-fluid">
			<div  class="row">
				<div class="" id="logo">
					<?php echo $this->Html->image('LOGO.png', array('alt' => 'SocialBit', 'class' => 'img-responsive'));?>
				</div>
			</div>
			<div class="row">
				<div role="tabpanel">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#login_tab" id="login_tab-tab" role="tab" data-toggle="tab" aria-controls="login_tab" aria-expanded="true">Login</a></li>
						<li role="presentation" class=""><a href="#register" role="tab" id="register-tab" data-toggle="tab" aria-controls="register" aria-expanded="false">Registro</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="login_tab" aria-labelledby="login_tab-tab">
							<div class="col-md-offset-1 col-md-10" id="form_login">
								<?php
								echo $this->Form->create('User', array(
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

									echo $this->Form->input('username', array('label' => array('class' => 'control-label col-sm-3', 'text' => __('user')), 'placeholder' => 'Usuario','class'=>'form-control'));
									echo $this->Form->input('password', array('label' => array('class' => 'control-label col-sm-3', 'text' => __('pass')), 'placeholder' => 'Password','class'=>'form-control'));
									?>
									<div class="form-group">
										<?php	echo $this->Form->end(array( 'label' => __('enter'),'div' => array( 'class' => 'col-sm-offset-3 col-sm-6',), 'class'=>'btn btn-default' ));?>
									</div>

								</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="register" aria-labelledby="register-tab">
							<div class="col-md-offset-1 col-md-10" id="form_login">
								<?php
								echo $this->Form->create('User', array(
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

									echo $this->Form->input('username', array('label' => array('class' => 'control-label col-sm-3', 'text' => __('user')), 'placeholder' => 'Usuario','class'=>'form-control'));
									echo $this->Form->input('nombre', array('label' => array('class' => 'control-label col-sm-3', 'text' => __('name')), 'placeholder' => 'Nombre Completo','class'=>'form-control'));
									echo $this->Form->input('password', array('label' => array('class' => 'control-label col-sm-3', 'text' => __('pass')), 'placeholder' => 'Password','class'=>'form-control'));
									//echo $this->Form->input('AUX.pass2', array('label' => array('class' => 'control-label col-sm-3', 'text' => 'Repite Contraseña'), 'placeholder' => 'Repite Password','class'=>'form-control'));
									?>
									<div class="form-group">
										<?php	echo $this->Form->end(array( 'label' => __('register'),'div' => array( 'class' => 'col-sm-offset-3 col-sm-6',), 'class'=>'btn btn-default' ));?>
									</div>

								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
