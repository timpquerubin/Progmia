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
				<div class="row changing">
					<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="main-menu">
							<!-- <div class="row">
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
													<h2 style="margin:0 !important;font-family:'ArcadeAlternate';font-size:30px;color:#ffce12;text-align:left;"><?php echo $this->session->userdata('username'); ?></h2>
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
							</div> -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profile-summary">
								<div class="row">
									<div class="avatar">
										<?php foreach($avatar as $avtr){ ?>
											<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avtr['AVTR_THUMBNAIL_FILENAME'];?>">
										<?php } ?>
									</div>
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
								<div class="row" style="margin-top:-20px;">
								</div>
							</div>
							<div class="row">
								<div class="menu-container">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									
							        <ul>
							            <li>
							            	<button id="play"><a class="nav-link js-scroll-trigger">Play</a></button>
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
							            <!-- <li>
							            	<button><a class="nav-link js-scroll-trigger" href="<?php echo base_url(); ?>users/logout">Log Out</a></button>
							            </li> -->
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
								<?php if ($stage1 == true){$stage1 = false;$exist = true;} ?>
								<?php if ($exist == true){ ?>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
									<div class="popup unlocked-stage">
										<span class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></span>
												<h2><?php echo "STAGE ".$ctr; ?></h2>
												<p><?php echo $stage['STG_DESCRIPTION']; ?></p>
										<button><a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">Enter</a></button>
									</div>
								</div>
								

								<?php } else { ?>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
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
							<h1>PROGRESS</h1>
							<div class="row">
								<div class="col-md-12">
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
							</div>

						</div>

				    	<div id="leaderboard" class="leaderboard">
							<h1>LEADERBOARD</h1>
							<div class="row">
								<div class="col-md-12">
									<table class="table" id="data">
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
													<div style="display: inline-flex;align-items: center;">
														<img style="height: 30px;width: 30px;margin-right: 10px;" src="<?php echo base_url();?>assets/images/avatars/THUMBNAIL/<?php echo $leaderboard['AVTR_THUMBNAIL_FILENAME'];?>">
													<?php echo $leaderboard['USER']; ?>
													</div>
												</td>
												<td>
													<?php echo $leaderboard['TOTAL GAME SCORE']; ?>
												</td>
												<?php $ranking++; ?>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</div>
						<div id="badges" class="badges">
							<h1>BADGES</h1>
							<div class="row">
								<div class="col-md-12">
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
							</div>
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
				      $(".changing > div:first-child").removeClass("col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4");
				      $(".changing > div:first-child").addClass("col-xs-4 col-sm-4 col-md-3 col-lg-3");
				      $("button").removeClass("active");
				      // add class to the one we clicked
				      $(this).addClass("active");
				   });
				   /* */
				   $("div.main-menu ul li button#play").click(function() {
				    $('div#play').css({
				   		'display':'block',
				   		'transition':'5s'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				   });


				   $("div.main-menu ul li button#profile").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#profile').css({
				   		'display':'block',
				   		'transition':'5s'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				   });


				   $("div.main-menu ul li button#leaderboard").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#leaderboard').css({
				   		'display':'block',
				   		'transition':'5s'
				    });
				    $('div#badges').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				   });


				   $("div.main-menu ul li button#badges").click(function() {
				    $('div#play').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#profile').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#leaderboard').css({
				   		'display':'none',
				   		'transition':'5s'
				    });
				    $('div#badges').css({
				   		'display':'block',
				   		'transition':'5s'
				    });
				   });
				});




				$(document).ready(function(){
				    $('#data').after('<div id="pages"></div>');
				    var rowsShown = 5;
				    var rowsTotal = $('#data tbody tr').length;
				    var numPages = rowsTotal/rowsShown;
				    for(i = 0;i < numPages;i++) {
				        var pageNum = i + 1;
				        $('#pages').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
				    }
				    $('#data tbody tr').hide();
				    $('#data tbody tr').slice(0, rowsShown).show();
				    $('#pages a:first').addClass('active');
				    $('#pages a').bind('click', function(){

				        $('#pages a').removeClass('active');
				        $(this).addClass('active');
				        var currPage = $(this).attr('rel');
				        var startItem = currPage * rowsShown;
				        var endItem = startItem + rowsShown;
				        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
				        css('display','table-row').animate({opacity:1}, 300);
				    });
				});
		</script>
	</div>
