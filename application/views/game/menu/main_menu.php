
		<div class="container-fluid">
			<div class="main-content">
				<div class="row changing">
					<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="main-menu">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profile-summary">
								<div class="row">
									<div class="avatar">
										<?php foreach($avatar as $avtr){ ?>
											<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avtr['AVTR_THUMBNAIL_FILENAME'];?>">
										<?php } ?>
									</div>
								</div>
								<div class="row">
									<div class="username">
										<h2><?php echo $this->session->userdata('username'); ?></h2>
									</div>
								</div>
								<svg height="0">
								    <filter id="drop-shadow">
								        <feGaussianBlur in="SourceAlpha" stdDeviation="4"/>
								        <feOffset dx="4" dy="4" result="offsetblur"/>
								        <feFlood flood-color="rgba(0,0,0,0.5)"/>
								        <feComposite in2="offsetblur" operator="in"/>
								        <feMerge>
								            <feMergeNode/>
								            <feMergeNode in="SourceGraphic"/>
								        </feMerge>
								    </filter>
								</svg>
							</div>
							<div class="row">
								<div class="menu-container">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								        <ul>
								            <li>
								            	<button id="play">Play</button>
								            </li>
								            <li>
								            	<button id="profile">Profile</button>
								            </li>
								            <li>
								            	<button id="leaderboard">Leaderboard</button>
								            </li>
								            <li>
								            	<button id="badges">Badges</button>
								            </li>
								        </ul>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9" style="position: relative;">
				    	<div id="play" class="play">
							<h1>Stages</h1>
							<?php $stage1 = true; ?>
							<?php $i = 0; ?>
							<?php $ctr = 1; ?>
							<?php $exist = true ?>
							<div class="row stages">
							<?php foreach ($stage_list as $stage) { ?>
								<?php  if ($stage1 == true){$stage1 = false;$exist = true;} ?>
								<!-- <?php if ($exist == true){ ?> -->
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
									<div class="popup unlocked-stage">
										<div class="row">
											<div class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></div>
												<img class="img-responsive" src="<?php echo base_url();?>assets/images/stages/<?php echo $stage['STG_FILENAME'];?>">
										</div>
										<div class="row">
											<button><a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">Enter</a></button>
										</div>
									</div>
								</div>
								

								<!-- <?php } else { ?> -->
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
									<div class="popup locked-stage">
										<span class="locked"><i class="fa fa-lock" aria-hidden="true"></i></span>
												<img class="img-responsive" src="<?php echo base_url();?>assets/images/stages/<?php echo $stage['STG_FILENAME'];?>">
									</div>
								</div>
								<!-- <?php } ?> -->


								<!-- <?php $exist = false; ?>
								<?php  foreach ($maxlevel_list as $maxlevel) { ?>
									<?php  if ($maxlevel['STG_ID'] == $stage['STG_ID']){ ?>
										<?php  if ($exist == true){break;} ?>
										<?php  foreach ($progress_list as $progress) {?>
											<?php  if ($exist == true){break;} ?>
												<?php  if($progress['LVL_ID'] == $maxlevel['LVL_ID'] && $progress['USER_ID'] == $h->USER_ID) {
												 $exist = true;
												 break;} ?> 
										<?php } ?>
									<?php  } ?>
									<?php  if ($exist == true){break;} ?>
								<?php } ?>
 -->
								<?php $ctr++;} ?>
							</div>
						</div>

						<div id="profile" class="profile">
							<div class="row">
								<h1>PROGRESS</h1>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-container" id="data-achievements">
										<thead>
											<th>Achievements</th>
											<th>Last Earned</th>
											<th style="border-top-right-radius: 19px;">Score</th>
										</thead>
										<tbody>
											<?php if (isset($profileprogress[0])){?>
												<?php foreach ($profileprogress as $progress){ ?>
												<tr>
													<td>
														<?php if($progress['GAME_SCORE']==0){echo "Failed";} 
														else{echo "Completed";}
														?>
														<?php echo $progress['STG_DESCRIPTION'];?> LEVEL<?php echo $progress['LVL_NUM'];?>
													</td>
													<td>
														<?php $newDate = date("d-m-Y", strtotime($progress['DATE_PLAYED']));?>
														<?php echo $newDate;?>
													</td>
													<td>
														<?php echo $progress['GAME_SCORE']; ?>
													</td>
												</tr>
											<?php }?>
										<?php } else {echo 
										'<style type="text/css">
										.profile .table>tbody>tr>th:first-child{
											border-bottom-left-radius:19px !important;
										}
										.profile .table>tbody>tr>th:last-child{
											border-bottom-right-radius:19px !important;
										}
								        </style>';
								    }?></tbody>
									</table>
								</div>
							</div>
						</div>

				    	<div id="leaderboard" class="leaderboard">
							<h1>LEADERBOARD</h1>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-container" id="data-leaderboard">
										<thead>
										<th>Ranking</th>
										<th>User</th>
										<th>Total Score</th>
										</thead>
										<tbody>
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
												<td><?php echo $ranking; ?></td>
												<td><div style="display: inline-flex;align-items: flex-start;"><img style="height: 50px;width: 50px;margin-right: 10px;" src="<?php echo base_url();?>assets/images/avatars/THUMBNAIL/<?php echo $leaderboard['AVTR_THUMBNAIL_FILENAME'];?>"><h3 style="word-wrap: break-word;"><?php echo $leaderboard['USER']; ?></h3></div><div class="bg-td"></div></td>
												<td><?php echo $leaderboard['TOTAL GAME SCORE']; ?><div class="bg-td"></div></td>
												<?php $ranking++; ?>
											</tr>
										<?php } ?></tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="badges" class="badges">
							<div class="row">
								<div class="col-md-12">
									<h1>BADGES</h1>
								</div>
							</div>
							<div class="row">
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
							<div class="row">
								<div class="wrapper">
									<div class="row">
									<?php foreach ($badges_list as $badges) {?>
										<div class="col-md-6">
											<div class="badge">
											<img class="img-responsive" src="<?php echo base_url()?>assets/images/badges/<?php echo $badges['BDG_IMG_FILENAME'];?>">
											</div>
										</div>
									<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	    	</div>
		</div>