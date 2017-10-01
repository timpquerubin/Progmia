<html>
<head>
	<title>Progmia</title>
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/icon_jFd_icon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/drag-on.js"></script>
</head>
<body>
	<nav>
		<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		<ul>
			<li>
				<a href="#">Menu 1</a>
			</li>
			<li>
				<a href="#">Menu 2</a>
			</li>
			<li>
				<a class="volume" href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
			</li>
		</ul>
		</div>
	</nav>
	<div class="container-fluid">	
		<div class="" style="max-height: 400px !important;">
			<div class="dragon"><!--<span><?php echo $this->session->userdata('username'); ?></span>-->
				<div class="bg-stage">
					<div class="row">
						<ul style="list-style: none;display: inline-flex;vertical-align:middle;margin:0 auto;">
						<?php $stage1 = true; ?>
						<?php $i = 0; ?>
						<?php $ctr = 1; ?>
						<?php $exist = true ?>
						<?php foreach ($stage_list as $stage) { ?>
							<?php if ($exist == true){ ?>
							<li style="position:relative;"><div class="popup unlocked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#"><span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
							<img class="" src="<?php echo base_url(); ?>assets/images/<?php echo $stage['STG_FILENAME']; ?>"/><span class="popuptext" id="myPopup-<?php echo $i+1; ?>"><h2><?php echo $stage['STG_NAME']; ?></h2><p><?php echo $stage['STG_DESCRIPTION']; ?></p><p>
							<a class="level-btn btn btn-default" href="<?php echo base_url(); ?>game/levels/<?php echo $stage['STG_ID'] ?>">Enter</a>
							<?php } else { ?>
							<li style="position:relative;"><div class="popup locked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#"><span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span>
							<img class="" src="<?php echo base_url(); ?>assets/images/<?php echo $stage['STG_FILENAME']; ?>"/><span class="popuptext" id="myPopup-<?php echo $i+1; ?>"><h2><?php echo $stage['STG_NAME']; ?></h2><p><?php echo $stage['STG_DESCRIPTION']; ?></p><p>
							<a class="level-btn btn btn-default" href="<?php echo base_url(); ?>game/levels/<?php echo $stage['STG_ID'] ?>">Enter</a>
							<?php } ?>
							<?php $exist = false; ?>
							<?php if ($stage1 == true){$stage1 = false;$exist = true;} ?>
							<?php foreach ($maxlevel_list as $maxlevel) { ?>
								<?php if ($maxlevel['STAGE'] == $stage['STG_ID']){ ?>
								<?php if ($exist == true){break;} ?>
								<?php foreach ($progress_list as $progress) {?>
								<?php if ($exist == true){break;} ?>
										<?php if($progress['LVL_ID'] == $maxlevel['LVL_ID']) {
										$exist = true;
										break;} ?> 
								<?php } ?>
								<?php } ?>
								<?php if ($exist == true){break;} ?>
							<?php } ?>
							<!-- <form action="<?php echo base_url(); ?>game/levels" method="post">
							   <input type='hidden' id='stage' name='stage' value='<?php echo $stage['STG_ID']; ?>' />
							   <input type='hidden' id='user' name='user' value='<?php echo $h->USER_ID; ?>' />
							   <button class="level-btn" onClick='submit();'>
							      <h3>Enter</h3>
							   </button>
							</form> -->
							<?php echo "<script>function myFunction".$ctr,"() {var popup = document.getElementById(\"myPopup-".$ctr,"\");popup.classList.toggle(\"show\");}</script>"; ?>
							<?php $i++; ?>
							<?php $ctr++; ?>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="options">
		<div class="hexrow">
		    <div class="hexagon">
		        <span><i style="color:#ffce15;font-size:25px !important;" class="fa fa-star" aria-hidden="true"></i></span>
		        <div class="first"></div>
		        <div class="second"></div>
		    </div>
		    <div class="hexagon">
		        <span><i style="color:#ffce15;font-size:25px !important;" class="fa fa-star" aria-hidden="true"></i></span>
		        <div class="first"></div>
		        <div class="second"></div>
		    </div>
		    <div class="hexagon">
		        <span><i style="color:#ffce15;font-size:25px !important;" class="fa fa-star" aria-hidden="true"></i></span>
		        <div class="first"></div>
		        <div class="second"></div>
		    </div>
	    </div>
    </div>
	</body>
	<script>
		$(function(){
			$(div).dragOn()
		});
	</script>
	<footer>
		<div class="footer"><p>Copyright Progmia &copy; 2017</p></div>
	</footer>
</html>