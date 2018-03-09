<!DOCTYPE html>
<html>
<head>
	<title>Progmia | Game | Main Menu</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main-menu.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
		<div class="sky-bg">
			<div class="moving-1">
				<?php foreach($avatar as $avtr){ ?>
		        <?php $sprite = $avtr['AVTR_SPRITE_FILENAME'];?>
				<div class="user-avtr" style="background-image:url('<?php echo base_url();?>assets/images/avatars/sprites/<?php echo $sprite;?>');">
				</div>
				<?php } ?>
			</div>
			<div class="moving-2">
		        <div class="bully">
				</div>
			</div>
			<div class="land-bg">
			</div>
		</div>
		<nav id="primary-nav" class="primary-nav">
			<div class="container-fluid">
				<div class="row" style="display: flex;align-items: center;">
					<div class="col-md-3 col-lg-3 col-xs-4 col-sm-4">
						<div class="logo">
							<img src="<?php echo base_url();?>assets/images/PROGMIA LOGO SIZES-XXS.png">
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-xs-4 col-sm-4">
					</div>
					<div class="col-md-3 col-lg-3 col-xs-4 col-sm-4">
						<ul class="nav-left">
							<li class="music-control">
								<button id="playpausebtn" class="playpausebtn"><i class="fa fa-music"></i></button>
								<input id="volumeslider" class="volumeslider" type="range" min="0" max="100" value="100" step="1">
							</li>
							<li>
								<button id="logout"><i class="fa fa-sign-out"></i></button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>