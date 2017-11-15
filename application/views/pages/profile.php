		<div class="bg">
			<div class="container-fluid">
				<div class="col-md-2">
						<div id="sidebar" class="sidebar">
							<div class="row">
								<div class="col-md-12">
									<div class="avatar">
										<a href=""><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/avatar-1.png" ></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="info">
										<p>Total Points Earned:</p>
										<p>[<?php echo $total_points; ?>]</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="nav">
										<ul>
											<li><div class="menu"><a href="<?php echo base_url(); ?>/profile/user/1/">Progress<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
											<li><div class="menu"><a href="">Leaderboard<i class="fa fa-tasks" aria-hidden="true"></i></a></div></li>
											<li><div class="img-responsivestyle=""></div></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
				</div>

				<div class="col-md-10">
	<div class="content">
	<h1>Progress</h1>
	<?php $ctr = 0; ?>
	<?php foreach ($stages_list as $stages) { ?>
		<?php if ($ctr== 0){ ?> 
		<div class="row">
		<?php } ?>
			<div class="col-md-6">
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
					<h2 style="text-align: center;"><?php echo $stages['STG_DESCRIPTION']; ?></h2>
					<?php $percentage = 0;
					if ($totalLevels != 0){
					$percentage = ($finishedLevels / $totalLevels) * 100;} ?>
					<h3 style="text-align: center;"><?php echo $finishedLevels; ?>/<?php echo $totalLevels; ?>(<?php echo $percentage; ?>%)</h3>
				</div>
				<div class="row">
					<div class="stage-progress"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $stages['STG_FILENAME']; ?>"/>
					</div>
				</div>
				<div class="row">
					<ul>
					<?php foreach ($levels_list as $levels) { ?>
					<?php $finished = false; ?>
					<?php if ($levels['STAGE'] == $stages['STG_ID']) { ?>
					<?php foreach ($progress_list as $progress){ ?>
					<?php if ($progress['LVL_ID'] == $levels['LVL_ID']) { ?>
					<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div style="border-bottom:3px solid #ffff00;background:#ffce12; border-radius:7px;width:50px;height: 50px;margin:10px;text-align: center;"><?php echo $levels['LVL_NUM']; ?></div></a></li>
					<?php $finished=true;} ?>
					<?php } if ($finished != true){?>
					<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $levels['LVL_ID']; ?>"><div style="border-bottom:3px solid #fff;background:#555; border-radius:7px;width:50px;height: 50px;margin:10px;text-align: center;"><?php echo $levels['LVL_NUM']; ?></div></a></li>
					<?php } ?>
					<?php } ?>
					<?php } ?>
					</ul>
				</div>
			</div><!-- col-md-6 -->
		<?php if ($ctr == 2){ ?>
		</div><!-- main row -->
		<?php $ctr=0;} ?>
		<?php } ?> <!-- foreach stages -->
	</div>
</div><!-- col-md-10 -->
			</div>
		</div>
<script>
  $(document).ready(function(){
    $("#sidebar").sticky({topSpacing:0});
  });
</script>