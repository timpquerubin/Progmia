					<div id="profile">
						<div class="row">
							<div class="col-md-2">
								<div class="avatar">
									<a href=""><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a>
								</div>
							</div>
							<div class="col-md-10">
								<?php foreach($user_info as $userinfo){ ?>
									<p>Username: <?php echo $userinfo['USER_USERNAME'] ?>	</p>
									<p>First name: <?php echo $userinfo['USER_FNAME'] ?>	</p>
									<p>Middle name: <?php echo $userinfo['USER_MNAME'] ?>	</p>
									<p>Last name: <?php echo $userinfo['USER_LNAME'] ?>	</p>
									<p>Gender: <?php if($userinfo['USER_GENDER'] == 'M') { ?>M<?php } ?>
										<?php if($userinfo['USER_GENDER'] == 'F') { ?>F<?php } ?>
									</p>
									<p>Birthdate: <?php echo $userinfo['USER_BDAY'] ?>	</p>
									<p>Email Address: <?php echo $userinfo['USER_EMAIL'] ?>	</p>
								<?php } ?>
								<p>Firstname:</p>
								<p>Lastname:</p>
								<p>Middlename:</p>
								<p>Email Address:</p>
								<p>Last played on:</p>
								<p>Date Registered:</p>
							</div>
						</div>
					</div>
					<div id="achievements">
						<div class="col-md-3">
							<div class="row">
								<h1>ACHIEVEMENTS</h1>
							</div>
						</div>
					</div>
					<div id="leaderboard">
						<div class="col-md-3">
							<div class="row">
								<h1>LEADERBOARD</h1>
							</div>
							<div class="row">

							</div>
						</div>
					</div>

					
				</div><!-- area -->
			</div>
		</div>
<script>
  $(document).ready(function(){
    $("#sidebar").sticky({topSpacing:0});
  });
</script>