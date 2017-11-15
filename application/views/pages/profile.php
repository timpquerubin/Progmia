		<div class="bg">
			<div class="container-fluid">
				<div class="col-md-3">
					<div id="sidebar" class="sidebar">
						<div class="row">
								<div class="avatar">
									<a href=""><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a>
								</div>
						</div>
						<div class="row">
								<div class="info">
									<p>Total Points Earned:</p>
									<p>[<?php echo $total_points; ?>]</p>
								</div>
						</div>
						<div class="row">
								<div class="nav">
									<ul>
										<li><div class="menu"><a href="<?php echo base_url(); ?>/profile/user/1/">Progress<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
										<li><div class="menu"><a href="">Leaderboard<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
									</ul>
								</div>
						</div>
					</div>
				</div>

				<div class="col-md-9">
					<div class="content">
					<h1>bold 700</h1>
					<?php $ctr = 0; ?>
					<?php foreach ($stages_list as $stages) { ?>
						<div class="row">
							<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> -->
								<?php $ctr++; ?>
								<?php $totalLevels=0; ?>
								<?php $finishedLevels=0; ?>
									<?php foreach ($levels_list as $levels) {// foreach levels
									if($stages['STG_ID']== $levels['STAGE'])
									{
									foreach ($progress_list as $progress){
									if($progress['POINTS_SCORED'] != 0 && $progress['LVL_ID'] == $levels['LVL_ID']){
									$finishedLevels++;
									}
									}
									$totalLevels++;
									}
									} ?> <!-- foreach levels -->
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
										<div class="row">
											<div class="stage-progress"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stages['STG_FILENAME']; ?>"/>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
										<div class="row">
												<p>
													<h2 style="text-align: center;"><?php echo $stages['STG_NAME']; ?></h2>
													<h2 style="text-align: center;"><?php echo $stages['STG_DESCRIPTION']; ?></h2>
													<h3 style="text-align: center;"></h3>
												</p>
										</div>
											<div class="row">
												<?php $percentage = 0;
												if ($totalLevels != 0){
												$percentage = ($finishedLevels / $totalLevels) * 100;} ?>
												<p style="text-align: center;"><?php echo $finishedLevels; ?>/<?php echo $totalLevels; ?>(<?php echo $percentage; ?>%)
												</p>
											</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
										
											<div class="levels">
												<?php foreach ($levels_list as $levels) { ?>
												<?php $finished = false; ?>
													<?php if ($levels['STAGE'] == $stages['STG_ID']) { ?>
														<?php foreach ($progress_list as $progress) { ?>
															<?php if ($progress['LVL_ID'] == $levels['LVL_ID']) { ?>
															<div><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div class="finished"><?php echo $levels['LVL_NUM']; ?></div></a></div>
															<?php $finished=true; ?>
															<?php } ?>
														<?php } ?>
														<?php if ($finished != true) { ?>
														<div><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div class="unlocked"><?php echo $levels['LVL_NUM']; ?></div></a>
														</div>
														<?php } ?>
													<?php } ?>
												<?php } ?>
											</div>
									</div>
								</div><!-- 2ndary row -->
							<!-- </div>col-md-6 -->
						</div>
						<?php } ?> <!-- foreach stages -->
					</div>
				</div><!-- col-md-9 -->
			</div>
		</div>
<script>
  $(document).ready(function(){
    $("#sidebar").sticky({topSpacing:0});
  });
</script>