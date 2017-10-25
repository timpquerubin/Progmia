<html>
	<head>
		<title>Progmia</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/profile.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
		<link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
	</head>
	<body>
	<div class="navbar-custom">
		<nav>
				<ul class="nav navbar-nav">
				<li><a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png"></a></li>
      				<li><a class="hvr-reveal" href="<?php echo base_url(); ?>home">Home</a></li>
      				<li><a class="hvr-reveal" href="<?php echo base_url(); ?>about">About</a></li>
      				<?php if($this->session->userdata('logged_in')): ?>
      					<li><a class="hvr-reveal" href="<?php echo base_url(); ?>Game/stages">Game</a></li>
      				<?php  endif; ?>
    			</ul>
		</nav>
	</div>