<!-- <audio src="/assets/sounds/01 Space Cruise (Title).mp3" autoplay>
<p>If you are reading this, it is because your browser does not support the audio element.     </p>
<embed src="/assets/sounds/01 Space Cruise (Title).mp3" width="180" height="90" hidden="true" />
</audio> -->
		<div class="container-fluid">
			<div class="main-content">
		    	<!-- <div class="profile-summary">
		    		<div class="row">
						<div class="avatar">
							<?php foreach($avatar as $avtr){ ?>
								<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avtr['AVTR_THUMBNAIL_FILENAME'];?>">
							<?php } ?>
						</div>
					</div>
		    	</div> -->
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
						<div class="main-menu">
							<div class="row">
								<div class="profile-summary">
										<div class="col-md-6">
											<div class="avatar">
												<?php foreach($avatar as $avtr){ ?>
													<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avtr['AVTR_THUMBNAIL_FILENAME'];?>">
												<?php } ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="username">
													<h2 style="margin:0 !important;font-family:'Barlow';font-size:30px;color:#ffce12;text-align:left;"><?php echo $this->session->userdata('username'); ?></h2>
												</div>
											</div>
											<div class="row">
												<h3 style="font-family: 'ArcadeClassic';font-size:20px;margin:10px auto 0 auto;color:#ffce12;">Total Points:</h3>
												<div class="coin">
													<?php if ($total_points == 0){ ?>0<?php } ?><h4 style="margin:0 !important;"><?php echo $total_points; ?></h4>
												</div>
											</div>
											<div class="row">
												
											</div>
										</div>
						    	</div>
							</div>
							<div class="row">
								<div class="menu-container">
							        <ul>
							            <li>
							            	<button id="play" class="active"><a class="nav-link js-scroll-trigger">Play</a></button>
							            </li>
							            <li>
							            	<button id="profile"><a class="nav-link js-scroll-trigger">Profile</a></button>
							            </li>
							            <li>
							            	<button id="leaderboard"><a class="nav-link js-scroll-trigger">Leaderboard</a></button>
							            </li>
							            <li>
							            	<button id="badges"><a class="nav-link js-scroll-trigger">Badges</a></button>
							            </li>
							            <li>
							            	<button><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>users/logout">Log Out</a></button>
							            </li>
							        </ul>
							    </div>
							</div>
						</div>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
				    	<div id="play" class="play">
							<h1>Stages</h1>
							<?php $stage1 = true; ?>
							<?php $i = 0; ?>
							<?php $ctr = 1; ?>
							<?php $exist = true ?>
							<div class="row stages">
							<?php foreach ($stage_list as $stage) { ?>
								<?php if ($stage1 == true){$stage1 = false;$exist = true;} ?>
								<?php if ($exist == true){ ?>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
									<div class="popup unlocked-stage">
										<span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
												<h2><?php echo "STAGE ".$ctr; ?></h2>
												<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
										<button><a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">Enter</a></button>
									</div>
								</div>
								

								<?php } else { ?>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="popup locked-stage">
										<span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span>
										<h2><?php echo "STAGE ".$ctr; ?></h2>
										<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
									</div>
								</div>
								<?php } ?>
								<?php $ctr++;} ?>
							</div>
						</div>

						<div id="profile" class="profile">
						</div>

				    	<div id="leaderboard" class="leaderboard">
							<h1>LEADERBOARD</h1>
							<table class="table">
								<th>Ranking</th>
								<th>User</th>
								<th>Total Score</th>
									<?php $ranking = 1; ?>
									<?php foreach ($leaderboard_list as $leaderboard){ ?>
									<tr class="<?php switch($ranking) {
													case 1:?>rank-1"
													<?php break; 
													case 2:?>rank-2"
													<?php break;
													case 3:?>rank-3"
													<?php break;
													default:?>rank-n"
													<?php 
													break; } ?>>
										<td>
											<?php echo $ranking; ?>
										</td>
										<td>
											<?php echo $leaderboard['USER']; ?>
										</td>
										<td>
											<?php echo $leaderboard['TOTAL GAME SCORE']; ?>
										</td>
										<?php $ranking++; ?>
									</tr>
								<?php } ?>
							</table>
						</div>
						<div id="badges" class="badges">
						</div>
					</div>
				</div>
	    	</div>
		</div>
		<script type="text/javascript">
			$("button.playpausebtn").click(function() {
				if(jQuery('#playpausebtn').hasClass('paused')){

				      $("button").removeClass("paused");
				}
				else
				{
				      $(this).addClass("paused");
				}
			   });
		</script>
		<script type="text/javascript">
				$(function() {
				   $("div.main-menu ul li button").click(function() {
				      // remove classes from all
				      $("button").removeClass("active");
				      // add class to the one we clicked
				      $(this).addClass("active");
				   });
				   /* */
				   $("div.main-menu ul li button#play").click(function() {
				    $('div#play').css({
				   		'display':'block',
				   		'transition':'.5s',
				   		'margin-right':'0px'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				   });


				   $("div.main-menu ul li button#profile").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#profile').css({
				   		'display':'block',
				   		'transition':'.5s',
				   		'margin-right':'0px'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				   });


				   $("div.main-menu ul li button#leaderboard").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#leaderboard').css({
				   		'display':'block',
				   		'transition':'.5s',
				   		'margin-right':'0px'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				   });


				   $("div.main-menu ul li button#badges").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'.5s',
				   		'margin-right':'-999999px'
				    });
				    $('div#badges').css({
				   		'display':'block',
				   		'transition':'.5s',
				   		'margin-right':'0px'
				    });
				   });
				});
		</script>
	</div>
