<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/create_character.css">
<!-- <style type="text/css">
	@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

</style> -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="game-level-menu-container">
				<input type="hidden" name="level_num" id="level_num" value="<?php echo count($level_list); ?>">
				<!--<?php //$stage = $_GET["link"];?>-->
				<!--<?php //echo $h->USER_ID; ?>-->
				<?php $i = 0; ?>
				<?php $rowCtr = 0; ?>
				<!-- <div style="color:#000;margin:5px auto;text-align: center;"><?php foreach ($level_stages as $img) { ?>
					<img class="stage" style="height:150px;" src="<?php echo base_url(); ?>assets/images/updated_stages/<?php echo $img['STG_FILENAME']; ?>"/>
					<?php } ?>
				</div> -->
				<div class="row">
					<div class="title-header">
						<?php foreach ($level_stages as $info) { ?>
						<h1 id="title"><?php echo $info['STG_DESCRIPTION']; ?></h1><?php } ?>
					</div>
				</div>
				<?php $array = array(); ?>
				<?php $array = $level_list; ?>
				<?php foreach ($level_list as $level) { ?>
					<?php if($rowCtr == 0) { ?>
						<div class="row level-row text-center">
					<?php } ?>
						<?php if($level['isUnlocked']){?>
							<div class="level col-xs-12 col-sm-6 col-md-3 col-lg-3">
								<div class="level-info text-center">
									<a href="<?php echo ($level_stages[0]['STG_NUM'] != 4)? base_url().'Game/play_basics/'.$level['LVL_ID'] : base_url().'Game/play/'.$level['LVL_ID'] ?>">
										<div class="level-link">
											<h2>Level <?php echo $i+1; ?></h2>
											<?php $score = 0; ?>
											<?php foreach ($progress_list as $progress) { ?>
												<?php if($progress['LVL_ID'] == $level['LVL_ID'] && $progress['USER_ID'] == $h->USER_ID ) { ?>

													<?php foreach($lvl_max_pts as $max_pts) { ?>
														<?php if($max_pts['LVL_ID'] == $level['LVL_ID']) { ?>
															<?php $score = (int)($progress['BEST_SCORE']/$max_pts['MAX_PTS']*100); ?>
														<?php } ?>
													<?php } ?>
													<!-- <?php //echo $progress['POINTS_SCORED']; ?> / <?php //echo $progress['MAX_POINTS']; ?> -->
													<!-- <?php //echo $score ?>% -->
												<?php } ?>
											<?php } ?>
											<input type="hidden" name="level_<?php echo $i+1; ?>_score" id="level_<?php echo $i+1; ?>_score" value="<?php echo $score; ?>">
											<ul style="display:inline-flex;list-style: none;margin:20px auto !important;padding: 0px !important;">
												<!-- <?php // if($score == 0 || $score == null){ ?> -->
												<li id="level_<?php echo $i+1; ?>_star1">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Good"><div></div></label>
													
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star1" value="1" disabled><label class="" for="level_<?php echo $i+1; ?>_star1" title="Good"></label> -->
												</li>
												<li id="level_<?php echo $i+1; ?>_star2">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Excellent"><div></div></label>
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star2" value="2" disabled><label class="" for="level_<?php echo $i+1; ?>_star2" title="Excellent"></label> -->
												</li>
												<li id="level_<?php echo $i+1; ?>_star3">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Perfect"><div></div></label>
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star3" value="3" disabled><label class="" for="level_<?php echo $i+1; ?>_star3" title="Perfect"></label> -->
												</li>
											</ul>
											<label class="finish-description" id="description-<?php echo $i+1; ?>"></label>
										</div>
									</a>
								</div>
							</div>
							<?php } else {?>
							<div class="level col-xs-12 col-sm-6 col-md-3 col-lg-3 level-locked">
								<div style="font-size:10vw;color:#777;text-shadow:0px 2px 0px #000;z-index: 999;top:20%;position: absolute;left:0;right: 0;"><i class="fa fa-lock"></i></div>
									<div class="level-info text-center" style="filter:grayscale(100%);">
										<div class="level-link">
											<h2>Level <?php echo $i+1; ?></h2>
											<?php $score = 0; ?>
											<?php foreach ($progress_list as $progress) { ?>
												<?php if($progress['LVL_ID'] == $level['LVL_ID'] && $progress['USER_ID'] == $h->USER_ID ) { ?>

													<?php foreach($lvl_max_pts as $max_pts) { ?>
														<?php if($max_pts['LVL_ID'] == $level['LVL_ID']) { ?>
															<?php $score = (int)($progress['BEST_SCORE']/$max_pts['MAX_PTS']*100); ?>
														<?php } ?>
													<?php } ?>
													<!-- <?php //echo $progress['POINTS_SCORED']; ?> / <?php //echo $progress['MAX_POINTS']; ?> -->
													<!-- <?php //echo $score ?>% -->
												<?php } ?>
											<?php } ?>
											<input type="hidden" name="level_<?php echo $i+1; ?>_score" id="level_<?php echo $i+1; ?>_score" value="<?php echo $score; ?>">
											<ul style="display:inline-flex;list-style: none;margin:20px auto !important;padding: 0px !important;">
												<!-- <?php // if($score == 0 || $score == null){ ?> -->
												<li id="level_<?php echo $i+1; ?>_star1">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Good"><div></div></label>
													
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star1" value="1" disabled><label class="" for="level_<?php echo $i+1; ?>_star1" title="Good"></label> -->
												</li>
												<li id="level_<?php echo $i+1; ?>_star2">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Excellent"><div></div></label>
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star2" value="2" disabled><label class="" for="level_<?php echo $i+1; ?>_star2" title="Excellent"></label> -->
												</li>
												<li id="level_<?php echo $i+1; ?>_star3">
													<label class="" for="level_<?php echo $i+1; ?>_star1" title="Perfect"><div></div></label>
													<!-- <input type="radio" name="rating_stage<?php echo $i+1; ?>" id="level_<?php echo $i+1; ?>_star3" value="3" disabled><label class="" for="level_<?php echo $i+1; ?>_star3" title="Perfect"></label> -->
												</li>
											</ul>
											<label class="finish-description" id="description-<?php echo $i+1; ?>"></label>
										</div>
								</div>
							</div>
							<?php } ?>

					<?php $i++; ?>
					<?php if($rowCtr == 3) { ?>
						</div>
						<?php $rowCtr = 0; ?>
					<?php } else { $rowCtr++; } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

	<!-- <fieldset class="rating">
		<input type="radio" name="rating" id="star5" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
		<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
		<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
	    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
	    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
	    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
	    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
	    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
	    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
	    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	</fieldset> -->
<script type="text/javascript">
	$(document).ready(function() {
		var $level_desc
		var num_levels = document.getElementById("level_num").value;

		for(var i = 1; i <= num_levels; i++) {
			var level_score = parseInt(document.getElementById("level_"+ i +"_score").value);

			// if(level_score <= 33 && level_score > 0) {
			// 	$("#level_"+ i + "_star1").attr("checked", true);
			// } else if(level_score > 33 && level_score <= 66) {
			// 	$("#level_"+ i + "_star2").attr("checked", true);
			// } else if(level_score > 66 && level_score <= 100) {
			// 	$("#level_"+ i + "_star3").attr("checked", true);
			// } else {
			// 	$("#level_"+ i + "_star1").addClass("no-score");
			// 	$("#level_"+ i + "_star2").addClass("no-score");
			// 	$("#level_"+ i + "_star3").addClass("no-score");
			// }
			var level_desc; 
			if(level_score < 50 && level_score > 0) {
				$("#level_"+ i + "_star1").attr("checked", true);
				$("#level_"+ i + "_star1").addClass("s1");
				$("#level_"+ i + "_star2").addClass("no-score u2");
				$("#level_"+ i + "_star3").addClass("no-score u3");
				level_desc = "Good!";
			} else if(level_score >= 50 && level_score < 100) {
				$("#level_"+ i + "_star1").attr("checked", true);
				$("#level_"+ i + "_star1").addClass("s1");
				$("#level_"+ i + "_star2").attr("checked", true);
				$("#level_"+ i + "_star2").addClass("s2");
				$("#level_"+ i + "_star3").addClass("no-score u2");
				level_desc = "Excellent!!";

			} else if(level_score >= 100) {
				$("#level_"+ i + "_star1").attr("checked", true);
				$("#level_"+ i + "_star1").addClass("s1");
				$("#level_"+ i + "_star2").attr("checked", true);
				$("#level_"+ i + "_star2").addClass("s2");
				$("#level_"+ i + "_star3").attr("checked", true);
				$("#level_"+ i + "_star3").addClass("s3");
				level_desc = "Perfect!!!";
			} else {
				$("#level_"+ i + "_star1").addClass("no-score u1");
				$("#level_"+ i + "_star2").addClass("no-score u2");
				$("#level_"+ i + "_star3").addClass("no-score u3");
				level_desc = "";
			}

			document.getElementById("description-"+ i).innerHTML = level_desc;
			// document.getElementById("description-"+ i).value = level_desc;
		}
	});
</script>