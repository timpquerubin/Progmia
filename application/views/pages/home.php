

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
<div class="bg-color" style="background-color: #66b9bf;padding:0 80px;">
	<div class="container">
		<div class="header" style="margin:0;">
			<h1 style="color:#fff !important;background-color: #33a2aa;margin:0;padding:20px 40px;text-align: center;">About</h1>
		</div>
		<div class="content" style="background-color: #fff;padding:60px 90px;">
			<div class="row">
				<div class="" style="height:150px;float:left;margin:30px 20px 20px 10px;width:150px;height:150px;background: #11baae;border-radius: 100%;padding:20px;">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" >
				</div>
				<p style="color:#000 !important;font-size:21px;clear:unset;text-align: justify;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin purus a purus tincidunt vestibulum. Morbi eleifend venenatis leo eu commodo. Duis tristique neque nec ligula feugiat, at semper odio blandit. Sed lacinia turpis sed mauris tincidunt, ut convallis enim rhoncus. Curabitur egestas magna a nisl dapibus imperdiet. Donec cursus ut nibh quis mollis. Ut luctus tincidunt eros. Mauris pellentesque egestas metus eget scelerisque. Aenean volutpat quam non enim pulvinar pellentesque. Fusce iaculis hendrerit molestie. Aenean et vehicula orci.
				</p>
				<p style="color:#000 !important;font-size:21px;text-align: justify;">
					Fusce fermentum est eget erat mollis molestie. Aliquam erat volutpat. Aliquam vel dolor sed orci iaculis consequat et nec velit. Integer sit amet neque pharetra, porta neque eu, porta nulla. Aenean egestas auctor ligula. In non purus dignissim, hendrerit tortor sed, aliquam est. Curabitur ullamcorper massa erat, et suscipit erat commodo vel. Duis ac orci mauris. Maecenas molestie eleifend bibendum. Nunc ante purus, tristique nec porttitor non, porta ultrices erat. Nullam euismod sem ante, vel imperdiet diam volutpat ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris volutpat ultricies fermentum.
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="header" style="margin:0;">
			<h1 style="color:#fff !important;background-color: #971e23;margin:0;padding:20px 40px;text-align: center;">About</h1>
		</div>
		<div class="content" style="background-color: #fff;padding:60px 90px;">
			<div class="row">
				<div class="" style="height:150px;float:left;margin:30px 20px 20px 10px;width:150px;height:150px;background: #11baae;border-radius: 100%;padding:20px;">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" >
				</div>
				<p style="color:#000 !important;font-size:21px;clear:unset;text-align: justify;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin purus a purus tincidunt vestibulum. Morbi eleifend venenatis leo eu commodo. Duis tristique neque nec ligula feugiat, at semper odio blandit. Sed lacinia turpis sed mauris tincidunt, ut convallis enim rhoncus. Curabitur egestas magna a nisl dapibus imperdiet. Donec cursus ut nibh quis mollis. Ut luctus tincidunt eros. Mauris pellentesque egestas metus eget scelerisque. Aenean volutpat quam non enim pulvinar pellentesque. Fusce iaculis hendrerit molestie. Aenean et vehicula orci.
				</p>
				<p style="color:#000 !important;font-size:21px;text-align: justify;">
					Fusce fermentum est eget erat mollis molestie. Aliquam erat volutpat. Aliquam vel dolor sed orci iaculis consequat et nec velit. Integer sit amet neque pharetra, porta neque eu, porta nulla. Aenean egestas auctor ligula. In non purus dignissim, hendrerit tortor sed, aliquam est. Curabitur ullamcorper massa erat, et suscipit erat commodo vel. Duis ac orci mauris. Maecenas molestie eleifend bibendum. Nunc ante purus, tristique nec porttitor non, porta ultrices erat. Nullam euismod sem ante, vel imperdiet diam volutpat ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris volutpat ultricies fermentum.
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="header" style="margin:0;">
			<h1 style="color:#fff !important;background-color: #33a2aa;margin:0;padding:20px 40px;text-align: center;">About</h1>
		</div>
		<div class="content" style="background-color: #fff;padding:60px 90px;">
			<div class="row">
				<div class="" style="height:150px;float:left;margin:30px 20px 20px 10px;width:150px;height:150px;background: #11baae;border-radius: 100%;padding:20px;">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" >
				</div>
				<p style="color:#000 !important;font-size:21px;clear:unset;text-align: justify;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin purus a purus tincidunt vestibulum. Morbi eleifend venenatis leo eu commodo. Duis tristique neque nec ligula feugiat, at semper odio blandit. Sed lacinia turpis sed mauris tincidunt, ut convallis enim rhoncus. Curabitur egestas magna a nisl dapibus imperdiet. Donec cursus ut nibh quis mollis. Ut luctus tincidunt eros. Mauris pellentesque egestas metus eget scelerisque. Aenean volutpat quam non enim pulvinar pellentesque. Fusce iaculis hendrerit molestie. Aenean et vehicula orci.
				</p>
				<p style="color:#000 !important;font-size:21px;text-align: justify;">
					Fusce fermentum est eget erat mollis molestie. Aliquam erat volutpat. Aliquam vel dolor sed orci iaculis consequat et nec velit. Integer sit amet neque pharetra, porta neque eu, porta nulla. Aenean egestas auctor ligula. In non purus dignissim, hendrerit tortor sed, aliquam est. Curabitur ullamcorper massa erat, et suscipit erat commodo vel. Duis ac orci mauris. Maecenas molestie eleifend bibendum. Nunc ante purus, tristique nec porttitor non, porta ultrices erat. Nullam euismod sem ante, vel imperdiet diam volutpat ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris volutpat ultricies fermentum.
				</p>
			</div>
		</div>
	</div>
</div>