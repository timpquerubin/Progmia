<html>
	<head>
		<title>Progmia</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/profile.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	</head>
	<body>
	<div class="bg">
		<div class="area">
			<div class="container-fluid" style="padding:0px;">
				<div class="navbar-custom">
					<nav>
						<ul class="upper-nav">
							<li>
								<div class="logo">
									<a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/finalest_logo1.png"></a>
								</div>
							</li>
							<li>
								<ul>
									<li>
										<a href="">Welcome back, <span><?php echo $this->session->userdata('username'); ?></span>!</a>
									</li>
									<li>
										<div>Total Points Earned <div><?php if ($total_points == 0){ ?>0<?php } ?>
											<?php echo $total_points; ?></div></div>
									</li>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>users/logout">Logout</a>
							</li>
						</ul>
						<center class="align-center">
			    			<ul class="secondary-nav">
			    				<li class="active menu-1"><a href="#">PROFILE</a></li>
			    				<li class="menu-2"><a href="#">ACHIEVEMENTS</a></li>
			    				<li class="menu-3"><a href="#">LEADERBOARD</a></li>
			    				<div id="menu-active"></div>
			    			</ul>
			    		</center>
		    			<script type="text/javascript">
		    				$(function() {
							   $("ul.secondary-nav li").click(function() {
							      // remove classes from all
							      $("li").removeClass("active");
							      // add class to the one we clicked
							      $(this).addClass("active");
							   });
							   /* */
							   $("ul li.menu-1").click(function() {
							   	$('#menu-active').css({
							   		'left':'14%',
							   		'transition':'.5s'
							    });
							    $('div#profile').css({
							   		'display':'block',
							   		'transition':'.5s'
							    });
							    $('#achievements').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							    $('#leaderboard').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							   });
							   /* */
							   $("ul li.menu-2").click(function() {
							   	$('#menu-active').css({
							   		'left':'45%',
							   		'transition':'.5s'
							    });
							    $('#profile').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							    $('#achievements').css({
							   		'display':'block',
							   		'transition':'.5s'
							    });
							    $('#leaderboard').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							   });
							   /* */
							   $("ul li.menu-3").click(function() {
							   	$('#menu-active').css({
							   		'left':'77%',
							   		'transition':'.5s'
							    });
							    $('#profile').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							    $('#achievements').css({
							   		'display':'none',
							   		'transition':'.5s'
							    });
							    $('#leaderboard').css({
							   		'display':'block',
							   		'transition':'.5s'
							    });
							   });
							   /* */
							});
		    			</script>
					</nav>
				</div>