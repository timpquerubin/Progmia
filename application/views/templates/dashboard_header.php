<html>
	<head>

		<title>Progmia | <?php echo isset($title) ? $title : '' ?></title>

        	<!-- <link rel="stylesheet" href="<?php // echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
		<!-- <link rel="stylesheet" href="<?php // echo base_url(); ?>assets/css/dashboard.css" /> -->
		<!-- <link href="<?php // echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"> -->

		<!-- <script type="text/javascript" src="<?php // echo base_url();?>assets/js/bootstrap.min.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
		<!-- <script src="<?php // echo base_url();?>assets/js/jquery.js"></script> -->
		<script src="<?php echo base_url();?>assets/js/jquery.sticky.js"></script>

		<style>
			@font-face {
				font-family:BebasNeue;
				src: url("<?php echo base_url(); ?>assets/fonts/BebasNeue.otf");
			}

			body {margin: 0px;}
			div.content-wrapper {background-color: #08272b; color: #fff;}
			/* div.wrapper.main {position: absolute;} */
			/* div.content-wrapper {position: relative;} */
			/* div.content-wrapper > div {display: inline-block;} */
			div.sidebar {background-color: #202020; width: 20%; height: 100%; position: fixed; top: 0px; color: #ffffff; box-shadow: 5px 0px 8px rgba(0, 0, 0, 0.2)}
			div.sidebar > div.side-menu > ul {list-style-type: none; padding: 0px; font-family: "BebasNeue"; font-size: 1.5em;}
			div.sidebar > div.side-menu > ul > li > p {padding: 10px 0px 10px 25px;}
			div.sidebar > div.side-menu > ul > li > p {margin: 0px;}
			div.sidebar > div.side-menu > ul > li > p:hover {opacity: 0.5; background-color: #404040;}
			div.sidebar > div.side-menu > ul > li > p > span {margin-right: 10px;}
			div.sidebar > div.side-menu > ul > li > ul {list-style-type: none; display: none; padding: 0px; color: #000; background-color: #fff;}
			div.sidebar > div.side-menu > ul > li > ul > li:hover {background-color: #e6e6e6;}
			div.sidebar > div.side-menu > ul > li > ul > li > p {padding: 5px 0px 5px 20px; margin: 0px;}

			div.main-content {position: relative; width: 80%; left: 20%; padding: 0px 0px 0px 0px; font-family: "Barlow";}

			div.container.banner {background-color: #005e66; color: #ffffff; font-family: "BebasNeue";}
			div.container.banner > div > p {margin: 0px; padding: 10px 0px 10px 25px; font-size: 2em; box-shadow: 0px 5px 3px rgba(0, 0, 0, 0.2)}

			div.container.logo {background-color: #0094a2;}
			div.container.logo > div.wrapper.logo {margin: 0px; padding: 20px 20px 30px 20px;}
			div.container.logo > div.wrapper.logo > img.img-logo {width: 100%;}

		</style>
	</head>
	<body>

		<!-- <input type="hidden" name="tab-active" id="tab-active" value="<?php // echo isset($tab_active) ? $tab_active : '' ?>" > -->

		<!-- <div class="dash-navbar">
			<ul class="nav nav-tabs">
				<li id="nav-pill-home"><a href="<?php // echo base_url(); ?>Dashboard/index">Home</a></li>
				<li id="nav-pill-stages"><a href="#">Stages</a></li>
				<li id="nav-pill-levels"><a href="<?php // echo base_url(); ?>Dashboard/level_list">Levels</a></li>
			</ul>
		</div> -->

<div class="wrapper main">
	<div class="container-fluid">
		<div class="content-wrapper">
			<div class="sidebar">
				<div class="container logo">
					<div class="wrapper logo">
						<img class="img-logo" src="<?php echo base_url(); ?>assets/images/final_logo.png">
					</div>
					<!-- <div class="col-md-8"><a class="navbar-brand" href="<?php // echo base_url(); ?>Dashboard/index"><img class="img-responsive logo" src="<?php // echo base_url(); ?>assets/images/final_logo.png"></a></div> -->
					<!-- <div class="col-md-4"><i class="fa fa-bars" aria-hidden="true"></i></div> -->
				</div>
				<div class="side-menu">
					<!-- <ul>
						<li><a href="#">DASHBOARD</a></li>
						<li><button class="game-editor">GAME EDITOR<div class="expand"></div></button>
							<ul class="accordion-panel">
								<li><a href=""><a href="<?php // echo base_url(); ?>Dashboard/avatar_list">Avatars</a></a></li>
								<li><a href=""><a href="<?php // echo base_url(); ?>Dashboard/stage_list">Stages</a></a></li>
								<li><a href=""><a href="<?php // echo base_url(); ?>Dashboard/level_list">Levels</a></a></li>
							</ul>
						</li>
						<li><button class="statistics">STATISTICS</button></li>
						<li><a href="#"></a></li>
					</ul> -->
					<ul>
						<li>
							<p><span><i class="fas fa-caret-right"></i></span>Stages</p>
							<ul>
								<li><p>Add</p></li>
								<li><p>Edit</p></li>
								<li><p>Delete</p></li>
							</ul>
						</li>
						<li>
							<p><span><i class="fas fa-caret-right"></i></span>Levels</p>
							<ul>
								<li><p>Add</p></li>
								<li><p>Edit</p></li>
								<li><p>Delete</p></li>
							</ul>
						</li>
						<li>
							<p><span><i class="fas fa-caret-right"></i></span>avatars</p>
							<ul>
								<li><p>Add</p></li>
								<li><p>Edit</p></li>
								<li><p>Delete</p></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<script type="text/javascript">
				$(document).ready(function() {

					$("div.side-menu > ul > li > p").click(function() {

						if($(this).parent().children("ul").css("display") == "none") {
							$(this).parent().children("ul").css({"display": "block"});

						} else {
							$(this).parent().children("ul").css({"display": "none"});
							// $this.child("span").child("i").toogleClass("fas fa-caret-right");
							// $this.child("span").child("i").toogleClass("fas fa-caret-down");
						}

						$(this).children("span").children("i").toggleClass("fas fa-caret-right");
						$(this).children("span").children("i").toggleClass("fas fa-caret-down");
					});
				});
			</script>

			<div class="main-content">

				<div class="container banner">
					<div class="wrapper banner">
						<p>Dashboard</p>
					</div>
				</div>

				<div class="col-md-10 col-sm-10 col-xs-10" style="display: none;">
					<div class="row">
						<?php if(isset($page)) { ?>
							<div class="dash-button-container" style="padding-bottom: 20px;">
								<?php if($page === "level-list") { ?>
								<?php } ?>
								<?php if($page === "level-objectives" || $page === "level-bullies" || $page === "level-goals" || $page === "level-manage-questions") { ?>
									<a href="<?php echo base_url(); ?>Dashboard/edit_level/<?php echo $lvlId ?>" class="btn btn-default" >Edit Level</a>
								<?php } ?>
								<?php if($page === "level-add" || $page === "level-edit" || $page === "level-objectives" || $page === "level-goals" || $page === "level-manage-questions") { ?>
									<a href="<?php echo base_url(); ?>Dashboard/level_list" class="btn btn-default" >Level List</a>
									<?php if($page != "level_objectives") { ?>
										<!-- <a class="btn btn-default" href="<?php echo base_url(); ?>Dashboard/manage_bullies/<?php echo $lvlId ?>">Manage Bullies</a> -->
									<?php } ?>
								<?php } ?>

								<?php if($page === "level-goals") { ?>
									<a href="<?php echo base_url(); ?>Dashboard/assign_questions/<?php echo $lvlId ?>" class="btn btn-default">Assign Questions</a>
								<?php } ?>

								<?php if($page === "level-edit" ) { ?>
									<a href="<?php echo base_url(); ?>Dashboard/manage_objectives/<?php echo $lvlId ?>" class="btn btn-default" >Objectives</a>
									<a href="<?php echo base_url(); ?>Dashboard/manage_bullies/<?php echo $lvlId ?>" class="btn btn-default">Bullies</a>
								<?php } ?>

								<?php if($page === "level-edit" || $page === "level-manage-questions") { ?>
									<a href="<?php echo base_url(); ?>Dashboard/manage_goals/<?php echo $lvlId ?>" class="btn btn-default">Goals</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
