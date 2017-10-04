
		<div class="bg">
		<div class="container-fluid">
			<div class="wrapper">
				<ol class="breadcrumb">
					<li>
						<a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a>
					</li>
					<li data-i18n="nav.profile" class="active">Profile
					</li>
				</ol>
				<div class="row">
					<div class="col-md-4">
						<div class="profile-wrapper">
							<img src="img-responsive" alt=""/>
							<div class="profile-info">
								<h3 class="name">
									<?php echo $userID = $this->session->userdata('username'); ?>
								</h3>
								<div class="extra-info">
									<span data-i18n="general.player_level" class="spr">Points</span><strong>1</strong>
								</div>
								<div class="extra-info">
									<span data-i18n="general.player_level" class="spr">Gold</span><strong>1</strong>
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
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		</div>

		<!--

			<div class="container">

				<h1>yow</h1>
				<ol class="breadcrumb"><li><a href="/"><span class="glyphicon glyphicon-home"></span></a></li><li><a href="/account" data-i18n="nav.account">Account</a></li><li data-i18n="nav.profile" class="active">Profile</li></ol>
			
				<div class="row">
					<div class="col-md-6">
						<div class="profile-wrapper">
							<img src="/db/user/59ce8288fe9141003f224439/avatar?s=150" alt="" class="picture">
							<div class="profile-info"><h3 class="name"><?php echo 
				$userID = $this->session->userdata('username'); ?></h3>
								<div class="extra-info">
									<span data-i18n="general.player_level" class="spr">Points</span><strong>1</strong>
								</div>
								<div class="extra-info">
									<span data-i18n="general.player_level" class="spr">Gold</span><strong>1</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 data-i18n="user.achievements_title" class="panel-title">Achievements</h3>
							</div>
							<div class="panel-body">
								<p data-i18n="user.no_achievements">No Achievements earned yet.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			-->
