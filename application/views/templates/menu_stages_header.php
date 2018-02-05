<html>
<head>
	<title>Progmia | Game Menu</title>
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stages.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/drag-on.js"></script>
</head>
<body>
	<div class="container-fluid" style="position: relative;max-width:1555px;">
		<nav>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/FINALEST_LOGO2.png"></a>
			<div class="center">
			<h1>MAP</h1>
			</div>
			<!-- <ul class="right">
				<li>
					<a class="volume" href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
				</li>
				<li>
					<a class="volume" href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
				</li>
				<li>
					<a class="volume" href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
				</li>
			</ul> -->
			<ul class="nav navbar-nav navbar-right" style="position:absolute !important; top:0px;right:20px;">
				<?php if($this->session->userdata('logged_in')): ?>
					<li class="dropdown">
						<a class="hvr-icon-hang dropbtn dropdown-toggle" data-toggle="dropdown">My Account</a>
						<ul class="dropdown-menu">
							<li class="text-center"><a href="#"><img src="<?php echo base_url(); ?>assets/images/avatar-1.png" class="img-circle"></a></li>
							<li class="text-center username"><?php echo $this->session->userdata('username'); ?></li>
							<li><a href="<?php echo base_url(); ?>profile/user/<?php echo $this->session->userdata('user_id'); ?>">Profile</a></li>
							<li><a href="#">Settings</a></li>
							<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>