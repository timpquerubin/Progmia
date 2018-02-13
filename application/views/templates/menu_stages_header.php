<html>
<head>
	<title>Progmia | Game Menu</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stages.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/drag-on.js"></script>
</head>
<body>
	<div class="navbar-custom">
		<nav>
			<ul class="upper-nav">
				<li>
					<div class="logo">
						<a class="navbar-brand" href="<?php echo base_url(); ?>/Game/Stages"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-XS.png"></a>
					</div>
				</li>
				<li class="greetings">
					<a href="">Welcome back, <span><?php echo $this->session->userdata('username'); ?></span>!</a>
				</li>

				<!-- <li><a href="">Play!</a></li> -->
				<li>
					<a href="<?php echo base_url(); ?>users/logout">Logout</a>
				</li>
			</ul>
			<center class="align-center">
    			<ul class="secondary-nav">
    				<li class="active menu-1"><a href="#">PROFILE</a></li>
    				<li class="menu-2"><a href="#">GAME</a></li>
    				<li class="menu-3"><a href="#">BADGES</a></li>
    				<li class="menu-4"><a href="#">LEADERBOARD</a></li>
    				<div id="menu-active"></div>
    			</ul>
				<hr>
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
				   		'left':'10%',
				   		'transition':'.5s'
				    });
				    $('div#profile').css({
				   		'display':'block',
				   		'transition':'.5s'
				    });
				    $('div#game').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#badges').css({
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
				   		'left':'34%',
				   		'transition':'.5s'
				    });
				    $('#profile').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#game').css({
				   		'display':'block',
				   		'transition':'.5s'
				    });
				    $('#badges').css({
				   		'display':'none',
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
				   		'left':'57.5%',
				   		'transition':'.5s'
				    });
				    $('#game').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#profile').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#badges').css({
				   		'display':'block',
				   		'transition':'.5s'
				    });
				    $('#leaderboard').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				   });
				   /* */$("ul li.menu-4").click(function() {
				   	$('#menu-active').css({
				   		'left':'81.5%',
				   		'transition':'.5s'
				    });
				    $('#game').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#profile').css({
				   		'display':'none',
				   		'transition':'.5s'
				    });
				    $('#badges').css({
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