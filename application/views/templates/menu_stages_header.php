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
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg fixed-top navbar-custom" id="mainNav">
				<a class="navbar-brand js-scroll-trigger" href="#page-top">
					<!-- <img class="img-responsive logo" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-XS.png"> -->
					<img class="img-responsive logo" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-XS.png">
				</a>
			</nav>
			<div class="music-control">
				<button id="playpausebtn" class="playpausebtn"><i class="fa fa-music"></i></button>
				<input id="volumeslider" class="volumeslider" type="range" min="0" max="100" value="100" step="1">
			</div>
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