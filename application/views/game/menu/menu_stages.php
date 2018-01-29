
	<div class="container-fluid" style="padding: 0 !important;">	
		<div class="dragon"><!--<span><?php echo $this->session->userdata('username'); ?></span>-->
			<div class="wrapper">
				<div class="bg-stage">
					<div class="row">
						<ul style="list-style: none;display: inline-flex;vertical-align:middle;margin:0 auto;">
						
						<?php $stage1 = true; ?>
						<?php $i = 0; ?>
						<?php $ctr = 1; ?>
						<?php $exist = true ?>

						<?php foreach ($stage_list as $stage) { ?>
							<?php if ($stage1 == true){$stage1 = false;$exist = true;} ?>
							<?php if ($exist == true){ ?>
							<li style="position:relative;">
								<div class="popup unlocked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#">
									<span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
									<img class="" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stage['STG_FILENAME']; ?>"/>
									<span class="popuptext" id="myPopup-<?php echo $i+1; ?>">
											<h2><?php echo $stage['STG_NAME']; ?></h2>
											<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
							<!-- <p> -->
									<a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" class="level-btn btn btn-default" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">Enter</a>
							</li>
							

							<?php } else { ?>
							<li style="position:relative;" attribute="dis"><div class="popup locked-stage" onclick="myFunction<?php echo $i+1; ?>()" href="#"><span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span>
							<img class="" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stage['STG_FILENAME']; ?>"/><span class="popuptext" id="myPopup-<?php echo $i+1; ?>"><h2><?php echo $stage['STG_NAME']; ?></h2><p><?php echo $stage['STG_DESCRIPTION']; ?></p>
							</li>
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
			<div class="wrapper-2">
					<div class="options">
						<div class="hexrow">
						    <div class="hexagon">
						        <span><a style="font-size:35px;" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></span>
						        <div class="first"></div>
						        <div class="second"></div>
						    </div>
						    <div class="hexagon">
						        <span><a style="font-size:35px;" href="#"><i class="fa fa fa-trophy" aria-hidden="true"></i></a></span>
						        <div class="first"></div>
						        <div class="second"></div>
						    </div>
						    <div class="hexagon">
						        <span><a style="font-size:35px;" href="#"><i class="fa fa-cog" aria-hidden="true"></i></a></span>
						        <div class="first"></div>
						        <div class="second"></div>
						    </div>
					    </div>
				    </div>
				</div>
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