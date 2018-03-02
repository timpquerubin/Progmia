		<?php if(!$this->session->userdata('logged_in')) { ?>
			<div style="margin:0 auto;">
				<div class="login-panel">
					<div class="row logo">
		  				<a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-M.png"></a>
					</div>
					<div class="row">
						<h2 class="greetings">Welcome!</h2>
					</div>
					<div class="row">
						<div class="login-form">
							<form action="<?php echo base_url(); ?>Users/login" method="post">
								<div class="form-group">
									<label class="sr-only" for="username">Username:</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group"><!-- <hr> -->
									<label class="sr-only" for="password">Password:</label>
									<input type="Password" name="password" id="password" class="form-control" placeholder="Password">
								</div>
								<input type="submit" name="btn_login" id="btn_login" class="btn btn-primary btn-block" value="Login">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="register"><p>Don't have an account?</p><input class="bounce" type="button" name="btn_register" id="btn_register" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-register" value="Register"></div>

		<?php } ?>
