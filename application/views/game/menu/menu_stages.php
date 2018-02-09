	<div class="col-md-3">
		<div class="sidebar">
			<div class="container-fluid">

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
		</div>
	</div>
	<div class="col-md-9">
	<div class="content">
		<div class="container-fluid">
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
			<div id="game" class="game">
				<?php $stage1 = true; ?>
				<?php $i = 0; ?>
				<?php $ctr = 1; ?>
				<?php $exist = true ?>

				<?php foreach ($stage_list as $stage) { ?>
					<?php if ($stage1 == true){$stage1 = false;$exist = true;} ?>
					<?php if ($exist == true){ ?>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="popup unlocked-stage">
							<span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
									<h2><?php echo "STAGE ".$ctr; ?></h2>
									<!-- <h2><?php echo $stage['STG_NAME']; ?></h2> -->
									<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
					<!-- <p> -->
							<a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" class="level-btn btn btn-default" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">Enter</a>
						</div>
					</div>
					

					<?php } else { ?>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="popup locked-stage">
							<span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span>
									<h2><?php echo "STAGE ".$ctr; ?></h2>
									<!-- <h2><?php echo $stage['STG_NAME']; ?></h2> -->
									<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
						</div>
					</div>
					<?php } ?>
				<?php $ctr++;} ?>
				<!--  -->
				
			</div>
			<div id="badges" class="badges">
				<div class="row">
					<div class="col-md-3">
						<h1>badges</h1>
					</div>
					<div class="col-md-9">
						<ul>
							<li>
								<input type="radio" id="all-option" value="All" checked="true" name="badges">
								<label for="all-option">All Badges</label>
								<div class="check"></div>
							</li>
							<li>
								<input type="radio" id="acquired-option" value="Acquired" name="badges">
								<label for="acquired-option">Acquired Badges</label>
								<div class="check"></div>	
							</li>
						</ul>
					</div>
				</div>
				<!-- -->
				<?php $ctr = 0 ;?>
				<?php foreach ($badges_list as $badges) { ?>
				<?php if ($ctr == 0) {?>
				<div class="row">
				<?php } ?>
					<?php $ctr++; ?>
							<div class="col-md-6"><img class="badge-img" src="<?php echo base_url(); ?>assets/images/badges/<?php echo $badges['BDG_IMG_FILENAME']; ?>" /></div>
				<?php if ($ctr == 2) { ?>
				</div>
				<?php $ctr = 0 ;?>
				<?php } ?>
				<?php } ?>
				<!-- -->
			</div>
			<div id="leaderboard" class="leaderboard">
				<div class="row">
					<div class="col-md-3">
						<h1>LEADERBOARD</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">Ranking</div>
					<div class="col-md-4">User</div>
					<div class="col-md-4">Total Game Score</div>
				</div>
				<?php $ranking = 1; ?>
				<?php foreach ($leaderboard_list as $leaderboard){ ?>
				<div class="row">
					<div class="col-md-4<?php switch($ranking) {
								case 1:?> rank-1"
								<?php break; 
								case 2:?> rank-2"
								<?php break;
								case 3:?> rank-3"
								<?php break;
								default:?> rank-n"
								<?php 
								break; } ?>>
							<?php echo $ranking; ?>
					</div>
					<div class="col-md-4"><?php echo $leaderboard['USER']; ?></div>
					<div class="col-md-4"><?php echo $leaderboard['TOTAL GAME SCORE']; ?></div>
					<?php $ranking++; ?>
				</div>
				<?php } ?>
			</div>
		
		</div>
	</div>
</div>
