
			<div class="container-fluid">
				<div class="col-md-3">
					<div class="row">
						<div class="sidebar">
							<ul>
								<li><div class="avatar"><a href=""><img src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a></div></li>
								<li><div class="info"><p>Total Points Earned:</p></div></li>
								<li><div class="menu"><a href="<?php echo base_url(); ?>/profile/user/1/">My Progress<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
								<li><div class="menu"><a href="">Leaderboard<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
						<div class="content">
							<?php foreach ($stages_list as $stages) { ?>
							<div class="row">
								<div class="stage-progress"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stages['STG_FILENAME']; ?>"/>
									<ul style="display:inline-flex;">
										<?php foreach ($levels_list as $levels) {?>
											<?php if ($levels['STAGE'] == $stages['STG_ID']) {?>
												<?php foreach ($progress_list as $progress) {?>
													<li style="background:#ffce12; border-radius:7px;width:25px;height: 25px;"><a href=""><?php echo $levels['LVL_NUM']; ?></a></li>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>
							</div>
							<?php } ?>
						</div>
				</div>
			</div>
