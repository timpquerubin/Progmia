<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>

<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/css/main.css"> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/create_character.css">

<div class="container">
	<!-- <input type="text" name="avatar-list" value="<?php echo isset($avatars) ? $avatars : "" ?>"> -->

	<div class="create-character-container">
		<div class="title-container">
			<h2>Character Creation</h2>
		</div>
		<div class="character-info">
			<div class="avatar-image-preview col-sm-4 col-xs-4 col-md-3 col-lg-3">
				<canvas class="avatar-ctx" id="ctx-avatar-prev"></canvas>
			</div> 
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/avatar_preview.js" ></script>