
		<div class="jumbotron row" id="login">
			<div class="col-md-offset-2 col-md-8">
			<?php echo $this->Html->image('LOGO.png', array('alt' => 'SocialBi'));?>
				<div class="jumbotron" id="form_login">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="user" class="col-sm-3 control-label">Usuario</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="user" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group">
							<label for="pass" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="pass" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<div class="checkbox">
									<label class="control-label">
										<input type="checkbox"> Requerdame
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
