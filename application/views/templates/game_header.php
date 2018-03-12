<html>
	<head>
		<title>Progmia | Game</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/typewriter.css">
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
        <div id="loading" class="container-fluid"">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img class="img-responsive" src="<?php echo base_url();?>assets/images/loading-image-logo.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="loading-container">
                                <div id="load" class="progress-bar load-bar progress-bar-danger player-hp-bar" role="progressbar" style="width: 0%">
                                </div>
                            </div>
                    </div>
                </div>
            </div>  
        </div>
        <nav id="mainNav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <ul style="list-style: none;display: flex;align-items: center;">
                            <li>
                                <a class="font-1" href="<?php echo base_url();?>Game/Levels/<?php echo $stgId;?>"><i class="fa fa-arrow-left" style="font-size: 30px !important;padding-top:20px !important;"></i></a></li>
                            <li>
                                <a class="navbar-brand" href="<?php echo base_url();?>Game/MainMenu">
                                    <img src="<?php echo base_url();?>assets/images/PROGMIA LOGO SIZES-XXS.png">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="title">
                            <h1>Level X</h1>
                            <p>Topic XXX</p>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <ul class="" style="display:flex;justify-content: space-around;padding:0px;font-size: 30px;padding-top:20px;">
                            <li><button data-toggle="modal" data-target="#tutorial-modal"><i class="fa fa-question"></i></button></li>
                            <li><button data-toggle="modal" data-target="#settings-modal"><i class="fa fa-sliders"></i></button></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>


    <div id="settings-modal" class="modal fade" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                    <h2 class="modal-title"><i class="fa fa-sliders"></i>  Volume Settings</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <ul class="settings-content">
                    <li>
                        <h4>Music Volume</h4>
                        <div id="bgmvolume" class="slider">
                          <output class="slider-output">100</output>
                          <div class="slider-track">
                            <div class="slider-thumb"></div>
                            <div class="slider-level"></div>
                          </div>
                          <input id="bgm_volumeslider" class="slider-input" type="range" value="100" min="0" max="100" />
                        </div>
                    </li>
                    <li>
                        <h4>Sound Volume</h4>
                        <div id="sfxvolume" class="slider">
                          <output class="slider-output">100</output>
                          <div class="slider-track">
                            <div class="slider-thumb"></div>
                            <div class="slider-level"></div>
                          </div>
                          <input id="sfx_volumeslider" class="slider-input" type="range" value="100" min="0" max="100" />
                        </div>
                    </li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>  
        <script>
            $("#tutorial").click(function() {
                document.getElementById('tutorial-modal').style.display = "block";
            });
            var sfxvolumeSlider = document.getElementById('sfxvolume');
            var bgmvolumeSlider = document.getElementById('bgmvolume');
            var sliders = [sfxvolumeSlider,bgmvolumeSlider];
            function Slider(slider) {
              this.slider = slider;
              slider.addEventListener('input', function() {
                this.updateSliderOutput();
                this.updateSliderLevel();
              }.bind(this), false);
              
              this.level = function() {
                var level = this.slider.querySelector('.slider-input');
                return level.value;
              }
              
              this.levelString = function() {
                return parseInt(this.level());
              }
              
              this.remaining = function() {
                return 100 - this.level();
              }
              
              this.remainingString = function() {
                return parseInt(this.remaining());
              }
              
              this.updateSliderOutput = function() {
                var output = this.slider.querySelector('.slider-output');
                var remaining = this.slider.querySelector('.slider-remaining');
                var thumb = this.slider.querySelector('.slider-thumb');
                output.value = this.levelString();
                output.style.left = this.levelString() + '%';
                thumb.style.left = this.levelString() + '%';
                if (remaining) { 
                  remaining.style.width = this.remainingString() + '%';
                }
              }
              
              this.updateSlider = function(num) {
                var input = this.slider.querySelector('.slider-input');
                input.value = num;
                alert(num);
              }
              
              this.updateSliderLevel =function() {
                var level = this.slider.querySelector('.slider-level');
                level.style.width = this.levelString() + '%';
              }
            }

            sliders.forEach(function(slider) {
              new Slider(slider);
            });
            var bgmAudio, sfxAudio, bgmplaybtn, bgmmutebtn, bgmvolumeslider, seeking=false, seekto,sfxplaybtn, sfxmutebtn, sfxvolumeslider;
            function initBgmAudioPlayer(){
                bgmAudio = new Audio();
                bgmAudio.src = "<?php echo base_url();?>/assets/sounds/bgm/02 MilkyWay (Explore).mp3";
                bgmAudio.loop = true;
                bgmAudio.play();
                // Set object references
                bgmplaybtn = document.getElementById("bgm_playpausebtn");
                bgmvolumeslider = document.getElementById("bgm_volumeslider");
                // Add Event Handling
                bgmvolumeslider.addEventListener("mousemove", setvolume);
                // Functions
                    function setvolume(){
                        bgmAudio.volume = bgm_volumeslider.value / 100;
                    }
                }
            window.addEventListener("load", initBgmAudioPlayer);
            function initSfxAudioPlayer(){
                sfxAudio = new Audio();
                // audio.src = "<?php echo base_url();?>/assets/sounds/bgm/02 MilkyWay (Explore).mp3";
                // Set object references
                sfxplaybtn = document.getElementById("sfx_playpausebtn");
                sfxvolumeslider = document.getElementById("sfx_volumeslider");
                // Add Event Handling
                sfxvolumeslider.addEventListener("mousemove", setvolume);
                // Functions
                    function setvolume(){
                        sfxAudio.volume = sfx_volumeslider.value / 100;
                    }
                }
            window.addEventListener("load", initSfxAudioPlayer);
        </script>