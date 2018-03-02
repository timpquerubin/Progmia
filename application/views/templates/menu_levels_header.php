<html>
<head>
	<title>Progmia | Game | Levels</title>
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
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
	<div class="container-fluid" style="position: relative;max-width:1555px;">
		<nav>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/PROGMIA LOGO SIZES-XS.png"></a>
			<a href="<?php echo base_url();?>Game/Stages"><i class="fa fa-long-arrow-left">Back</i></a>
		</nav>
	</div>
		<script>
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