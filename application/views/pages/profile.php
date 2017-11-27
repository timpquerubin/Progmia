					<div id="profile" class="profile">
						<div class="row">
							<div class="col-md-4"><div>Total Points Earned <div><?php if ($total_points == 0){ ?>0<?php } ?>
								<?php echo $total_points; ?></div></div></div>
							<div class="col-md-4"><p>Joined </p></div>
							<div class="col-md-4"><p>Date Registered:</p></div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="row">
									<div class="avatar">
										<a href=""><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a>
									</div>
								</div>
								<div class="row">
									<?php foreach($user_info as $userinfo){ ?>
									<div class="username">
										<h2><?php echo $this->session->userdata('username'); ?></h2>
									</div>
									<div class="email-address">
										<h3><?php echo $userinfo['USER_EMAIL'] ?></h3>
									</div>
									<div class="joined">
										<h4>Joined Month Year</h4>
									</div>
									<?php } ?>
								</div>

							</div>
							<div class="col-md-9">
								<?php foreach($user_info as $userinfo){ ?>
								<div class="col-md-6">
									<div class=""><label>Username: </label><?php echo $userinfo['USER_USERNAME'] ?></div>
									<div class=""><label>Firstname: </label><?php echo $userinfo['USER_FNAME'] ?></div>
									<p>First name: <?php echo $userinfo['USER_FNAME'] ?>	</p>
									<p>Middle name: <?php echo $userinfo['USER_MNAME'] ?>	</p>
									<p>Last name: <?php echo $userinfo['USER_LNAME'] ?>	</p>
									<p>Gender: <?php if($userinfo['USER_GENDER'] == 'M') { ?>M<?php } ?>
										<?php if($userinfo['USER_GENDER'] == 'F') { ?>F<?php } ?>
									</p>
									<p>Birthdate: <?php echo $userinfo['USER_BDAY'] ?>	</p>
									
								</div>

								<div class="col-md-6">
									<p>Email Address: <?php echo $userinfo['USER_EMAIL'] ?>	</p>
									<p>Firstname:</p>
									<p>Lastname:</p>
									<p>Middlename:</p>
									<p>Email Address:</p>
									<p>Last played on:</p>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div id="badges" class="badges">
						<div class="row">
							<div class="col-md-3">
								<div class="row">
									<h1>badges</h1>
								</div>
							</div>
						</div>
						<!-- -->
							<?php foreach ($badges_list as $badges) { ?>

						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4"><img class="badge-img" src="<?php echo base_url(); ?>assets/images/badges/<?php echo $badges['BDG_FILENAME']; ?>" /></div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
						</div>
							<?php } ?>



						<!-- -->
					</div>
					<div id="leaderboard" class="leaderboard">
						<div class="row">
							<div class="col-md-3">
								<div class="row">
									<h1>LEADERBOARD</h1>
								</div>
								<div class="row">

								</div>
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