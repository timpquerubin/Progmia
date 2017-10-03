<html>
	<head>
		<title>Progmia</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>
		<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js""></script> -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-modal.js""></script> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap_superhero.min.css"> -->
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
		<link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
	</head>
	<body>
		<nav id="navbar" class="navbar navbar-default">
  			<div class="container">
    			<div class="navbar-header">
      				<a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
    			</div>
    			<ul class="nav navbar-nav">
      				<li><a href="<?php echo base_url(); ?>home">Home</a></li>
      				<li><a href="<?php echo base_url(); ?>about">About</a></li>
      				<?php if($this->session->userdata('logged_in')): ?>
      					<li><a href="<?php echo base_url(); ?>Game/stages">Game</a></li>
      				<?php  endif; ?>
    			</ul>
    			<ul class="nav navbar-nav navbar-right">
    				<?php if($this->session->userdata('logged_in')): ?>
    					<li class="dropdown">
    						<a class="dropbtn dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
    						<ul class="dropdown-menu">
    							<li class="text-center"><span class="user-level">1</span><a href="#"><img src="" class="img-circle"></a><h5><?php echo $this->session->userdata('username'); ?></h5></li>
    							<li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
    							<li><a href="#">Settings</a></li>
    							<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
    						</ul>
    					</li>
    				<?php endif; ?>
    			</ul>
  			</div>
		</nav>
		
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<?php if($this->session->flashdata('user_registered')) : ?>
				<?php echo '<p class="alert alert-success" >'.$this->session->flashdata('user_registered').'</p>'; ?>
			<?php endif; ?>
			
			<?php if($this->session->flashdata('user_loggedin')) : ?>
				<?php echo '<p class="alert alert-success" >'.$this->session->flashdata('user_loggedin').'</p>'; ?>
			<?php endif; ?>
			
			<?php if($this->session->flashdata('user_loggedout')) : ?>
				<?php echo '<p class="alert alert-success" >'.$this->session->flashdata('user_loggedout').'</p>'; ?>
			<?php endif; ?>
			
			<?php if($this->session->flashdata('user_loggedfailed')) : ?>
				<?php echo '<p class="alert alert-success alert-danger" >'.$this->session->flashdata('user_loggedfailed').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_notloggedin')) : ?>
				<?php echo '<p class="alert alert-success alert-danger" >'.$this->session->flashdata('user_notloggedin').'</p>'; ?>
			<?php endif; ?>