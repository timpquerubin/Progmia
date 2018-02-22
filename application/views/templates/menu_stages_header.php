<!DOCTYPE html>
<html>
<head>
	<title>Progmia | Game Menu</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stages.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/drag-on.js"></script>
</head>
<body>
	<div class="cloud-bg">
		<div class="moving-1">
			<?php foreach($avatar as $avtr){ ?>
	        <?php $sprite = $avtr['AVTR_SPRITE_FILENAME'];?>
	        <!-- <img src="<?php echo base_url();?>assets/images/avatars/sprites/<?php echo $sprite;?>"> -->
			<div class="user-avtr" style="background-image:url('<?php echo base_url();?>assets/images/avatars/sprites/<?php echo $sprite;?>');">
			</div>
			<?php } ?>
		</div>
		<div class="moving-2">
	        <div class="bully">
			</div>
		</div>
	</div>
		<!-- <div class="container-fluid">
			<nav class="navbar navbar-expand-lg fixed-top navbar-custom" id="mainNav">
			</nav>
		</div> -->
		<div class="container-fluid">
			<nav id="mainNav">
				<div class="col-md-4">
					<div class="profile-summary">
						<div class="row">
							<div class="col-md-8">
								<div class="username">
									<h2><?php echo $this->session->userdata('username'); ?></h2>
								</div>
								<div class="avatar">
									<?php foreach($avatar as $avtr){ ?>
										<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avtr['AVTR_THUMBNAIL_FILENAME'];?>">
									<?php } ?>
								</div>
							</div>
							<!-- <div class="col-md-7">
								<div class="row">
									<div class="coin">
									<h3 style="font-family: 'ArcadeClassic';font-size:20px;margin:10px auto 0 auto;color:#ffce12;">Points</h3>
										<?php if ($total_points == 0){ ?>0<?php } ?><h4 style="font-family:'ArcadeClassic';margin:0 !important;"><?php echo $total_points; ?></h4>
									</div>
								</div>
								<div class="row">
									
								</div>
							</div> -->
						</div>
			    	</div>
				</div>
				<div class="col-md-4">
					<div class="logo">
						<img src="<?php echo base_url();?>assets/images/PROGMIA LOGO SIZES-XXS.png">
					</div>
				</div>
				<div class="col-md-4">
			<ul class="pull-right">
				<li class="music-control">
					<button id="playpausebtn" class="playpausebtn"><i class="fa fa-music"></i></button>
					<input id="volumeslider" class="volumeslider" type="range" min="0" max="100" value="100" step="1">
				</li>
				<li>
					<a class="logout" href="<?php echo base_url()?>users/logout">Log Out</a>
				</li>
			</ul>
					
				</div>
			<!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">
				<img class="img-responsive logo" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-XS.png">
			</a> -->
		</nav>
			</div>
		<script>
			var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto;
			function initAudioPlayer(){
				audio = new Audio();
				audio.src = "<?php echo base_url();?>/assets/sounds/01 Space Cruise (Title).mp3";
				audio.loop = true;
				audio.play();
				// Set object references
				playbtn = document.getElementById("playpausebtn");
				volumeslider = document.getElementById("volumeslider");
				// Add Event Handling
				playbtn.addEventListener("click",playPause);
				volumeslider.addEventListener("mousemove", setvolume);
				// Functions
					function playPause(){
						if(audio.paused){
						    audio.play();
					    } else {
						    audio.pause();
					    }
					}
					function setvolume(){
					    audio.volume = volumeslider.value / 100;
				    }
				}
			window.addEventListener("load", initAudioPlayer);
		</script>