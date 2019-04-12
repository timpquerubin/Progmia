



		<div class="container-fluid">

			<div class="main-content">

				<div class="row row-eq-height changing">

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

										<h2 onclick="RevealHiddenOverflow(this)"><?php echo $this->session->userdata('username'); ?></h2>

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

								            	<button id="progress-tab">Progress</button>

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



					<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9" style="position: relative;" >

				    	<div id="play" class="play">

							<h1>Stages</h1>

							<?php $stage1 = true; ?>

							<?php $i = 0; ?>

							<?php $ctr = 1; ?>

							<?php $exist = true ?>

							<div class="multiple-items">

							<?php foreach ($stage_list as $stage) { ?>

								<div id="slide-<?php echo $ctr;?>">

									<?php if (!($stage['isLocked'])) {?><a onkeydown="success()" onkeyup="success()" onfocus="success()" onclick="success()" href="<?php echo base_url(); ?>Game/Levels/<?php echo $stage['STG_ID'] ?>">

									<div class="popup unlocked-stage">

											<div class="unlocked"><i class="fa fa-unlock" aria-hidden="true"></i></div>

												<img class="img-responsive" src="<?php echo base_url();?>assets/images/STAGES/<?php echo $stage['STG_FILENAME'];?>" alt="slide <?php echo $ctr;?>">

												<div>

											

													

												</div>

									</div></a>

								<?php } else {?>

									<div class="popup locked-stage">

											<div class="locked"><i class="fa fa-lock" aria-hidden="true"></i></div>

												<img class="img-responsive" src="<?php echo base_url();?>assets/images/STAGES/<?php echo $stage['STG_FILENAME'];?>" alt="slide <?php echo $ctr;?>">

									</div>

								<?php }?>

								</div>

								<?php $ctr++;} ?>

							</div>

						</div>



						<div id="profile" class="profile">

							<div class="row">

								<h1>Profile</h1>

							</div>

							<div class="row profile-margin" style="background-color: #00222f;margin-right:0px !important;margin-left:0px !important;padding: 35px;">

									<div class="col-md-3 col-xs-12">

										<div class="avatar">

										<?php foreach($avatar as $avtr){ ?>

											<img class="img-responsive avtr-thumb" style="padding: 35px;

    border: outset 7px #ffffff;

    border-radius: 22px;

    background-color: #22455f;" src="<?php echo base_url(); ?>assets/images/avatars/FRONTVIEW/<?php echo $avtr['AVTR_FRONTVIEW_FILENAME'];?>">

										<?php } ?>

										</div>

									</div>

									<div class="col-md-9 col-xs-12">

									<?php foreach($userinfo as $user){ ?>

									<p style="background-color: #22455f;

    padding: 5px 5%;

    margin: 30px 15px;

    font-size: 2.5vw;

    color: #ffffff;

    font-family: 'ArcadeClassic';

    border: solid 3px #ffffff;">First name:<?php echo $user['USER_FNAME'];?></p>

									<p style="background-color: #22455f;

    padding: 5px 5%;

    margin: 15px;

    font-size: 2.5vw;

    color: #ffffff;

    font-family: 'ArcadeClassic';

    border: solid 3px #ffffff;">Last name:<?php echo $user['USER_LNAME'];?></p>

										<?php } ?>

    								</div>

    								

							</div>

						</div>





						<div id="progress-tab" class="progress-tab">

							<div class="row">

								<h1>PROGRESS</h1>

							</div>

							<div class="row">

								<div class="col-md-12">

									<table class="table table-container" id="data-progress">

										<thead>

											<th>Activity</th>

											<th>Last Earned</th>

											<th>Score</th>

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

										<th>Rank</th>

										<th>Name</th>

										<th>Score</th>

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

												<td><div style="display: inline-flex;"><img style="height: 4vw;margin-right: 10px;margin-top:1.5vh;" src="<?php echo base_url();?>assets/images/avatars/THUMBNAIL/<?php echo $leaderboard['AVTR_THUMBNAIL_FILENAME'];?>"><h3 onclick="RevealHiddenOverflow(this)"><?php echo $leaderboard['USER']; ?></h3></div><div class="bg-td"></div></td>

												<td style="position:relative;"><?php echo $leaderboard['TOTAL GAME SCORE']; ?><button class="" onclick="load_user_badges('<?php echo $leaderboard["USER_ID"]?>');" id="user-badges myDiv" data-toggle="modal" data-target="#badges-modal" style="position:absolute;right:15px;background-color:#333;">view</button></td>

												<?php $ranking++; ?>

											</tr>

										<?php } ?></tbody>

									</table>

								</div>

							</div>

						</div>

						<script>

						function load_user_badges(userID){

							var data = {userID: userID};

							$.ajax({

								type: 'post',

								url: '<?php echo base_url();?>Game/load_user_badges',

								data: data,

								// dataType: 'json',

								success: function(result){

									$(".modal-body").html(result);

									// console.log(result);

								},

								error: function(err){console.log(err);}

							});

						}

						</script>



					    <div id="badges-modal" class="modal fade" style="display: none;padding:50px;padding-left:50px !important;padding-right:50px !important">

					        <div class="modal-content">

					            <div class="modal-header">

					                    <h2 class="modal-title" style="

    padding: 0px 20px;"><i class="fa fa-certificate"></i> Badges</h2>

					                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

					                            <i class="fa fa-close" style="position:absolute; top:20px;right:30px;"></i>

					                        </button>

					            </div>

					            <div class="modal-body">

					                <ul class="badges-content" style="list-style:none;display:flex;">

					                </ul>

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

								<div class="col-md-12">

									<ul class="badge-option">

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

							<div class="row badges-all" id="badges-all" style="display: block;">

								<div class="wrapper">

									<div class="row">

										<div class="multiple-items">

										<?php foreach ($badges_list as $badges) {?>

											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0 30px;display: inline-flex !important;align-items: center;">

												<div class="badge">

												<img class="img-responsive" src="<?php echo base_url()?>assets/images/BADGES/<?php echo $badges['BDG_IMG_FILENAME'];?>"/>

												</div>

												<p class="bdg-desc"><?php echo $badges['BDG_DESCRIPTION'];?></p>

											</div>

										<?php }?>

										</div>

									</div>

								</div>

							</div>

							<div class="row badges-acquired" id="badges-acquired" style="display: none;">

								<div class="wrapper">

									<div class="row">



										<div class="multiple-items">

										<?php if(isset($user_badges)) { ?>

											<?php foreach($user_badges as $ub) { ?>

											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0 30px;display: inline-flex;align-items: center;">

														<i class="fa fa-check" style="position: absolute;top:0;left:0;color:#ffce12;font-size:3vw;background-color:#777;padding:5px;border-radius:5px;"></i>

													<div class="badge">

														<img class="img-responsive" src="<?php echo base_url()?>assets/images/BADGES/<?php echo $ub['BDG_IMG_FILENAME'];?>"/>

													</div>

													<p class="bdg-desc"><?php echo $ub['BDG_DESCRIPTION'];?></p>

												</div>

											<?php } ?>

										<?php } ?>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

	    	</div>

		</div>

<script type="text/javascript">

function RevealHiddenOverflow(d)

{

   if( d.style.overflow == "hidden" ) { d.style.overflow = "visible"; }

   else { d.style.overflow = "hidden"; }

}

$(document).ready(function(){
   var myVar;
 $( "#myDiv" ).click(function() {
  	myFunction(this);
});

 function myFunction(div) {
 $("#loader").toggle();
 $(div).toggle();

 }

</script>