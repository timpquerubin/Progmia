
		<div class="bg">
			<div class="container-fluid">
				<div class="wrapper">
					<div class="row">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url(); ?>"><span class="fa fa-home"></span></a>
							</li>
							<li data-i18n="nav.profile" class="active">Profile
							</li>
						</ol>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="profile-wrapper">
								<img src="img-responsive" alt=""/>
								<div class="profile-info">
									<h3 class="name">
										<?php echo $userID = $this->session->userdata('username'); ?>
									</h3>
									<div class="extra-info">
										<span data-i18n="general.player_level" class="spr">Points<br></span>
										<strong>1</strong>
									</div>
									<div class="extra-info">
										<span data-i18n="general.player_level" class="spr">Gold<br></span>
										<strong>1</strong>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 data-i18n="user.achievements_title" class="panel-title">Achievements</h3>
								</div>
								<div class="panel-body">
									<p data-i18n="user.no_achievements">No Achievements earned yet.</p>
										<?php foreach ($progress_list as $progress) { ?>
											<div style="border:3px solid #253544;background:#333; color:#fff;margin:10px;padding:10px 30px;">
												<div class="row">
													<div class="col-md-12">
														<div class="row">
														<p><?php echo $progress['USER_USERNAME']; ?></p><p>Completed</p>
														</div>
														<div class="row">
															<p style="border:solid 1px #fff;">
																<h3 style="color:#ffce12;">POINTS:</h3>
																<?php echo $progress['POINTS_SCORED']; ?>
															</p>
															<p style="border:solid 1px #fff;">
																<h3 style="color:#ffce12;">PLAYED:</h3>
																<?php $date = $progress['DATE_PLAYED']; echo date('d-m-Y H:i:s', strtotime($date)); ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
