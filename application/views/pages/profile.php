
			<div class="container-fluid">
				<div class="col-md-2">
					<div class="row">
						<div class="sidebar">
							<ul>
								<li><div class="avatar"><a href=""><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a></div></li>
								<li><div class="info"><p>Total Points Earned:</p><p>[<?php echo $total_points; ?>]</p></div></li>
								<li><div class="menu"><a href="<?php echo base_url(); ?>/profile/user/1/">Progress<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
								<li><div class="menu"><a href="">Leaderboard<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
								<li><div class="img-responsivestyle=""></div></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-10">
					<div class="content">
						<h1>Progress</h1>
						<?php foreach ($stages_list as $stages) { ?>
						<div class="row">
							<?php $totalLevels=0; ?>
							<?php $finishedLevels=0; ?>
							<?php foreach ($levels_list as $levels) {
								if($stages['STG_ID']== $levels['STAGE'])
									{
										foreach ($progress_list as $progress){
											if($progress['POINTS_SCORED'] != 0 && $progress['LVL_ID'] == $levels['LVL_ID']){
												$finishedLevels++;
											}
										}
										$totalLevels++;
									}
								}?>
								<h2><?php echo $stages['STG_DESCRIPTION']; ?></h1>
									<?php $percentage = 0;
									if ($totalLevels != 0){
									$percentage = ($finishedLevels / $totalLevels) * 100;} ?>
								<h3><?php echo $finishedLevels; ?>/<?php echo $totalLevels; ?>(<?php echo $percentage; ?>%)</h2>
								
								<div class="col-md-4">
									<div class="stage-progress"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stages['STG_FILENAME']; ?>"/>
									</div>
								</div>
								<div class="col-md-8">
									<ul style="display:inline-flex;list-style: none;">
										<?php foreach ($levels_list as $levels) { ?>
										<?php $finished = false; ?>
											<?php if ($levels['STAGE'] == $stages['STG_ID']) { ?>
												<?php foreach ($progress_list as $progress){ ?>
													<?php if ($progress['LVL_ID'] == $levels['LVL_ID']) { ?>
														<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div style="border-bottom:3px solid #ffff00;background:#ffce12; border-radius:7px;width:40px;height: 40px;margin:5px;text-align: center;"><?php echo $levels['LVL_NUM']; ?></div></a></li>
													<?php $finished=true;} ?>
												<?php } if ($finished != true){?>
														<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div style="border-bottom:3px solid #fff;background:#555; border-radius:7px;width:40px;height: 40px;margin:5px;text-align: center;"><?php echo $levels['LVL_NUM']; ?></div></a></li>
											<?php }} ?>
										<?php } ?>
									</ul>
								</div>	
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
