

<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-9 col-xs-12" >
				<h1 style="font-family:'Open Sans'; font-weight: 600;">Learn Programming<br> while you play.</h1>
			</div>
			<?php if(!$this->session->userdata('logged_in')) { ?>
				<div class="col-sm-4 col-md-4 col-lg-3 col-xs-12">
					<div class="login-panel">
						<div class="row">
							<h2>Login</h2>
						</div>
						<div class="row">
							<div class="login-form">
								<form action="<?php echo base_url(); ?>Users/login" method="post">
									<div class="form-group">
										<label class="sr-only" for="username">Username:</label>
										<input type="text" name="username" id="username" class="form-control" placeholder="Username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="password">Password:</label>
										<input type="Password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
									<input type="submit" name="btn_login" id="btn_login" class="btn btn-primary btn-block" value="Login">
									<input type="button" name="btn_register" id="btn_register" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-register" value="Register">
								</form>
							</div>
						</div>
						
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<h3 class="learn-more"><a href="#">Learn More<br><i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i></a></h3>
			</div>
		</div>
	</div>
</div>