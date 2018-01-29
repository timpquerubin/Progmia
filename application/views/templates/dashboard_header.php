<html>
	<head>
		<title>Progmia | <?php echo isset($title) ? $title : '' ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css" />
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>
		<!-- <script src="<?php echo base_url();?>assets/js/jquery.js"></script> -->
		<script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>
	</head>
	<body>

	<input type="hidden" name="tab-active" id="tab-active" value="<?php echo isset($tab_active) ? $tab_active : '' ?>" >

	<div class="dash-navbar">
		<ul class="nav nav-tabs">
			<li id="nav-pill-home"><a href="<?php echo base_url(); ?>Dashboard/index">Home</a></li>
			<li id="nav-pill-stages"><a href="#">Stages</a></li>
			<li id="nav-pill-levels"><a href="<?php echo base_url(); ?>Dashboard/level_list">Levels</a></li>
		</ul>
	</div>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
				
		<div id="sticker" class="sticker">
					
			<div class="col-md-2 sidebar">
				<div class="row top">
					<div class="col-md-8"><a class="navbar-brand" href="<?php echo base_url(); ?>Dashboard/index"><img class="img-responsive logo" src="<?php echo base_url(); ?>assets/images/final_logo.png"></a></div>
					<div class="col-md-4"><i class="fa fa-bars" aria-hidden="true"></i></div>
				</div>
				<div class="row bottom">
					<ul>
						<li><a href="#">DASHBOARD</a></li>
						<li><button class="game-editor">GAME EDITOR<div class="expand"></div></button>
								<ul class="accordion-panel">
									<li><a href=""><a href="<?php echo base_url(); ?>Dashboard/avatar_list">Avatars</a></a></li>
									<li><a href=""><a href="<?php echo base_url(); ?>Dashboard/stage_list">Stages</a></a></li>
									<li><a href=""><a href="<?php echo base_url(); ?>Dashboard/level_list">Levels</a></a></li>
								</ul>

							<script>

							var acc = document.getElementsByClassName("game-editor");
							var i;

							for (i = 0; i < acc.length; i++) {
							  acc[i].addEventListener("click", function() {
							    this.classList.toggle("active");
							    var panel = this.nextElementSibling;
							    if (panel.style.maxHeight){
							      panel.style.maxHeight = null;
							    } else {
							      panel.style.maxHeight = panel.scrollHeight + "px";
							    } 
							  });
							}

							// $("button.game-editor").click(function() {
							//    	$('.expand:after').css({
							//    		'color':'#ff0000 !important',
							//    		'transition':'.5s'
							//     });
							//     $('div#profile').css({
							//    		'display':'block',
							//    		'transition':'.5s'
							//     });
							//     $('#badges').css({
							//    		'display':'none',
							//    		'transition':'.5s'
							//     });
							//     $('#leaderboard').css({
							//    		'display':'none',
							//    		'transition':'.5s'
							//     });
							//    });
							</script>
						</li>
						<li><button class="statistics">STATISTICS</button></li>
						<li><a href="#"></a></li>
					</ul>
				</div>
			</div>

		</div>
		<script>
			  $(document).ready(function(){
			    $("#sticker").sticky({topSpacing:0});
			  });
		</script>


		<div class="col-md-10 col-sm-10 col-xs-10">
			<div class="row">
				<?php if(isset($page)) { ?>
					<div class="dash-button-container" style="padding-bottom: 20px;">

						<?php if($page === "level-list") { ?>
						<?php } ?>
						<?php if($page === "level-objectives") { ?>
							<a href="<?php echo base_url(); ?>Dashboard/edit_level/<?php echo $lvlId ?>" class="btn btn-default" >Edit Level</a>
						<?php } ?>
						<?php if($page === "level-add" || $page === "level-edit" || $page === "level-objectives") { ?>
							<a href="<?php echo base_url(); ?>Dashboard/level_list" class="btn btn-default" >Level List</a>

							<?php if($page != "level_objectives") { ?>
								<!-- <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/manage_bullies/<?php echo $lvlId ?>">Manage Bullies</a> -->
							<?php } ?>
						<?php } ?>
						<?php if($page === "level-edit" ) { ?>
							<a href="<?php echo base_url(); ?>Dashboard/manage_objectives/<?php echo $lvlId ?>" class="btn btn-default" >Objectives</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
