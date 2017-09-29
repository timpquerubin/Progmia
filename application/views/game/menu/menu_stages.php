
	<!--<div class="row">
		<ul>
			<li><a href=""><img src=""></a></li>
		</ul>
	</div>
	<div class="container">
		<div class="row">
			<ul>
				<li><a href=""><img src=""></a></li>
			</ul>
		</div>
	</div>
	-->
	<div class="dragon">
		<div class="" style="max-height: 400px !important;">
	<h3><?php echo $this->session->userdata('username'); ?></h3>
		<div class="container-fluid">	
			<div class="bg-stage">
				<div class="row">
				<!--
					<ul style="list-style: none;display: inline-flex;vertical-align:middle;margin:0 auto;">
						<li><div class="popup-1 unlocked-stage" onclick="myFunction1()" href="#"><span style="position:absolute;top:0;right:0;margin:30px 50px;font-size:40px;color:#ebea70 !important;text-shadow:1px 1px #242423;text-align:center;color:#ffce12;"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span><img class="" src="<?php echo base_url(); ?>assets/images/stages-01.png"/><span class="popuptext-1" id="myPopup-1"><h2>Stage-1</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nunc, sagittis nec enim id, viverra placerat nibh. Nam cursus metus at imperdiet fringilla.</p><p><a href="#">Enter</a></p></span></a></li>

						<li><div class="popup-2 unlocked-stage" onclick="myFunction2()" href="#"><span style="position:absolute;top:0;right:0;margin:30px 50px;font-size:40px;color:#ebea70 !important;text-shadow:1px 1px #242423;text-align:center;color:#ffce12;"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span><img class="" src="<?php echo base_url(); ?>assets/images/stages-02.png"/><span class="popuptext-2" id="myPopup-2"><h2>Stage-2</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nunc, sagittis nec enim id, viverra placerat nibh. Nam cursus metus at imperdiet fringilla.</p><p><a href="#">Enter</a></p></span></a></li>

						<li><div class="popup-3 locked-stage" onclick="myFunction3()" href="#"><span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span><img class="" src="<?php echo base_url(); ?>assets/images/stages-03.png"/><span class="popuptext-3" id="myPopup-3"><h2>Stage-3</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nunc, sagittis nec enim id, viverra placerat nibh. Nam cursus metus at imperdiet fringilla.</p><p><a href="#">Enter</a></p></span></a></li>

						<li><div class="popup-4 locked-stage" onclick="myFunction4()" href="#"><span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span><img class="" src="<?php echo base_url(); ?>assets/images/stages-04.png"/><span class="popuptext-4" id="myPopup-4"><h2>Stage-4</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nunc, sagittis nec enim id, viverra placerat nibh. Nam cursus metus at imperdiet fringilla.</p><p><a href="#">Enter</a></p></span></a></li>

						<li><div class="popup-5 locked-stage" onclick="myFunction5()" href="#"><span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span><img class="" src="<?php echo base_url(); ?>assets/images/stages-05.png"/><span class="popuptext-5" id="myPopup-5"><h2>Stage-5</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nunc, sagittis nec enim id, viverra placerat nibh. Nam cursus metus at imperdiet fringilla.</p><p><a href="#">Enter</a></p></span></a></li>
					
					</ul>
					-->
					<!--
					-->
					<ul style="list-style: none;display: inline-flex;vertical-align:middle;margin:0 auto;">
						
					<?php $i = 0; ?>
					<?php $ctr = 1; ?>
					<?php foreach ($stage_list as $stage) { ?>
						<li style="position:relative;"><div class="popup unlocked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#"><span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
						<img class="" src="<?php echo base_url(); ?>assets/images/<?php echo $stage['STG_FILENAME']; ?>"/><span class="popuptext" id="myPopup-<?php echo $i+1; ?>"><h2><?php echo $stage['STG_NAME']; ?></h2><p><?php echo $stage['STG_DESCRIPTION']; ?></p><p>
						<form action="<?php echo base_url(); ?>game/levels" method="post">
						   <input type='hidden' id='stage' name='stage' value='<?php echo $stage['STG_ID']; ?>' />
						   <button class="level-btn" onClick='submit();'>
						      <h3>Enter</h3>
						   </button>
						</form>
						<?php echo "<script>function myFunction".$ctr,"() {var popup = document.getElementById(\"myPopup-".$ctr,"\");popup.classList.toggle(\"show\");}</script>"; ?>
						<?php $i++; ?>
						<?php $ctr++; ?>
					<?php } ?>
					</ul>
					<!--
					-->
				</div>
			</div>
		</div></div>
	</div>


			<!--<div class="bg-stage-2">
			</div>--><!--
				<div class="wrapper-1">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div class="stage">
							<a id="a" href="#" style="z-index: 5;"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/stages-01.png"/>
							</a></div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div class="stage">
							<a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/stages-02.png"/></a></div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div class="stage">
							<a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/stages-03.png"/></a></div>
						</div>
					</div>
				</div>
				<div class="wrapper-2">
					<div class="row">
						<div class="col-xs-offset-1 col-xs-5 col-sm-5 col-md-5 col-lg-5"><div class="stage">
							<a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/stages-04.png"/></a></div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div class="stage">
							<a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/stages-05.png"/></a></div>
						</div>
					</div>
				</div>-->
			<!--<div class="bg-stage-3">
			</div>-->