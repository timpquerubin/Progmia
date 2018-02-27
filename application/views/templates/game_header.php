<html>
	<head>
		<title>Progmia | Game</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/game.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stars.css">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
		<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stars.css">
	</head>
	<body>
        <nav id="mainNav">
            <div class="container-fluid">
                <ul class="pull-left">
                    <li>
                        <a class="navbar-brand" href="<?php echo base_url();?>Game/Stages">
                            <img src="<?php echo base_url();?>assets/images/PROGMIA LOGO SIZES-XXS.png">
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Game/Levels/<?php echo $stgId;?>">Level Selection</a>
                    </li>
                </ul>
                <ul class="pull-right">
                    <li><i class="fa fa-question"></i></li>
                    <li><i class="fa fa-cog"></i></li>
                    <li>
                        <a class="logout" href="<?php echo base_url()?>users/logout">Log Out</a>
                    </li>
                </ul>
                    
                </div>
        </nav>
       <!--  <div class="modal-settings">
            <div class="modal-content">
                <button id="playpausebtn" class="playpausebtn"><i class="fa fa-music"></i></button>
                <input id="volumeslider" class="volumeslider" type="range" min="0" max="100" value="100" step="1">
            </div>
        </div> -->
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
		<div id="loading">
    		<div class="test">
    		<img src="<?php echo base_url();?>assets/images/loading-image-logo.png" style="text-align: center;display:block;margin:0 auto;">
            <div class="laman">
                <div id="load" class="progress-bar load-bar progress-bar-danger player-hp-bar" role="progressbar" style="width: 0%">
                </div>
            </div>
    		</div>
    	</div>
<style type="text/css">
.laman {width:50%;margin:0 auto;}
#load{height: 40px;}
	#page {
    display: none;
}
.test {position: relative;
    margin: 0 auto;
    width:  100%;
    height:  100%;}
#loading {
    display: block;
    position: absolute;/*
    position: relative;
    margin: 0 auto;*/
    top: 0;
    left: 0;
    right:0;
    bottom: 0;
    padding-top:5%;
    z-index: 100;
    width: 100vw;
    height: 100vh;
    width: 100%;
    height: 100%;
    background-color: #004e55;
    /*
    background-color: rgba(192, 192, 192, 0.5);
    background-image: url("http://i.stack.imgur.com/MnyxU.gif");
    background-repeat: no-repeat;
    background-position: center;*/
}
.test {display:block;
}
progress#progressBar {border:solid 3px #33accc;background-color: #003333;border-radius: 30px;}
</style>
<script type="text/javascript">
// 	function onReady(callback) {
//     var intervalID = window.setInterval(checkReady, 1000);
// window.addEventListener("load", draw, true);
//     function checkReady() {
//         if (document.getElementsByTagName('canvas')[0] !== undefined) {
//             window.clearInterval(intervalID);
//             callback.call(this);
//         }
//     }
// }
// function show(id, value) {
// 	document.getElementById(id).style.transition = value ? '' : '.5s';
//     document.getElementById(id).style.display = value ? 'block' : 'none';
// }
// onReady(function () {
//     show('page', true);
//     show('loading', false);
// });
</script>