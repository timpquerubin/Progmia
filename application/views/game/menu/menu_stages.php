	<div class="dragon">
		<div class="" style="max-height: 400px !important;">
			<!--<span><?php echo $this->session->userdata('username'); ?></span>-->
			<div class="container-fluid">	
				<div class="bg-stage">
					<div class="row">
						<ul style="list-style: none;display: inline-flex;vertical-align:middle;margin:0 auto;">
						<?php $i = 0; ?>
						<?php $ctr = 1; ?>
						<?php foreach ($stage_list as $stage) { ?>
							<li style="position:relative;"><div class="popup unlocked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#"><span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
							<img class="" src="<?php echo base_url(); ?>assets/images/<?php echo $stage['STG_FILENAME']; ?>"/><span class="popuptext" id="myPopup-<?php echo $i+1; ?>"><h2><?php echo $stage['STG_NAME']; ?></h2><p><?php echo $stage['STG_DESCRIPTION']; ?></p><p>
							<form action="<?php echo base_url(); ?>game/levels" method="post">
							   <input type='hidden' id='stage' name='stage' value='<?php echo $stage['STG_ID']; ?>' />
							   <input type='hidden' id='user' name='user' value='<?php echo $h->USER_ID; ?>' />
							   <button class="level-btn" onClick='submit();'>
							      <h3>Enter</h3>
							   </button>
							</form>
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