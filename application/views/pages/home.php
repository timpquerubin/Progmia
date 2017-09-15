

<div class="home-bg">
	<div class="container-fluid" style="margin: 0px; padding: 0px;">
		<div class="row">
			<div class="col-md-8" >
				<h1>Learn Programming<br> while you play.</h1>
			</div>
			<div class="login-panel col-sm-4 col-sm-offset-7 col-lg-3 col-lg-offset-7 col-xs-8 col-xs-offset-2">
				<div class="login-form" style="margin: 100px auto;">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="<?php echo base_url(); ?>Users/login" method="post">
						<center><h2 style="font-family: AdventPro;"><strong>Login</strong></h2></center>
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
		<div class="row" >
			<div class="col-xs-12 text-center">
				<h3><a href="#">Learn More<br><i class="fa fa-chevron-down" aria-hidden="true"></i></a></h3>
			</div>
		</div>
	</div>
</div>