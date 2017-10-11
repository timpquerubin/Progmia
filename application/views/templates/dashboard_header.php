<html>
	<head>
		<title>Dashboard | <?php echo isset($title) ? $title : '' ?></title>
	</head>
	<body>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css" />

		<div class="container-fluid">

			<input type="hidden" name="tab-active" id="tab-active" value="<?php echo isset($tab_active) ? $tab_active : '' ?>" >

			<div class="container dash-navbar">
				<ul class="nav nav-tabs">
					<li id="nav-pill-home"><a data-toggle="tab" href="<?php echo base_url(); ?>Dashboard/Home">Home</a></li>
					<li id="nav-pill-stages"><a data-toggle="tab" href="#">Stages</a></li>
					<li id="nav-pill-levels"><a data-toggle="tab" href="<?php echo base_url(); ?>Dashboard/level_list">Levels</a></li>
				</ul>
			</div>

			<?php if(isset($page)) { ?>
				<div class="container">
					<div class="dash-button-container" style="margin-bottom: 20px;">

						<?php if($page === "level-list") { ?>
							<a href="<?php echo base_url(); ?>Dashboard/add_level" class="btn btn-default" >Add Level</a>
						<?php } ?>
						<?php if($page === "level-objectives") { ?>
							<a href="<?php echo base_url(); ?>Dashboard/edit_level/<?php echo $lvlId ?>" class="btn btn-default" >Edit Level</a>
						<?php } ?>
						<?php if($page === "level-add" || $page === "level-edit" || $page === "level-objectives") { ?>
							<a href="<?php echo base_url(); ?>Dashboard/level_list" class="btn btn-default" >Level List</a>
						<?php } ?>
						<?php if($page === "level-edit" ) { ?>
							<a href="<?php echo base_url(); ?>Dashboard/manage_objectives/<?php echo $lvlId ?>" class="btn btn-default" >Objectives</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

