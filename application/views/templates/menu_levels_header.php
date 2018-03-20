<html>
<head>
	<title>Progmia | Game | Level Selection</title>
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/levels.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stars.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/drag-on.js"></script>
	
</head>
<body>
	<nav id="primary-nav" class="primary-nav">
		<div class="container-fluid">
			<div class="row" style="display: flex;align-items: center;">
				
				<div class="col-md-3 col-lg-3 col-xs-4 col-sm-4" style="text-align: center;">
					<a class="back" href="<?php echo base_url(); ?>Game/MainMenu"><i class="fa fa-arrow-left"></i></a>
				</div>
				<div class="col-md-6 col-lg-6 col-xs-4 col-sm-4">
				</div>
				<div class="col-md-3 col-lg-3 col-xs-4 col-sm-4">
					<ul class="nav-left">
						<li class="music-control">
							<button id="playpausebtn" class="playpausebtn"><i class="fa fa-music"></i></button>
							<input id="volumeslider" class="volumeslider" type="range" min="0" max="100" value="100" step="1">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
		<script>
			$(document).ready(function(){
				$("button.playpausebtn").click(function() {
					if(jQuery('#playpausebtn').hasClass('paused')){
					    $("button").removeClass("paused");
					}
					else
					{
					    $(this).addClass("paused");
					}
				   });

				$("button#back").click(function() {

				   });
			});
			var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto;
			function initAudioPlayer(){
				audio = new Audio();
				audio.src = "<?php echo base_url();?>/assets/sounds/bgm/03 Civil (Explore).mp3";
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