<style type="text/css">
	@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

	/*fieldset, label {margin: 0px; padding: 0px;}*/
	/*.rating {border: none; float: left;}
	.rating input {display: none;}
	.rating label:before {margin: 5px; font-size: 1.25em; font-family: FontAwesome; display: inline-block; content: "\f005";}
	.rating .half:before {content: "\f089"; position: absolute;}
	.rating label {color: #ddd; float: right;}

	.rating input:checked ~ label,
	.rating:not(:checked) label:hover,
	.rating:not(:checked) label:hover ~ label {color: #FFD700;}

	.rating input:checked + label:hover,
	.rating input:checked ~ label:hover,
	.rating label:hover ~ input:checked ~ label,
	.rating input:checked ~ label:hover ~ label { color: #FFED85;  }*/

	/*input#test {display: none;}
	label.rate:before { margin: 5px; font-size: 3em; font-family: FontAwesome; color: #FFD700; display: inline-block; content: "\f005";}*/

	div.level {
		background-color: #f2f2f2;
		margin : 20px;
		padding: 0px;
	}

	div.level:hover {
		background-color: #d9d9d9;
	}

	div.level-info h2 {
		padding: 0px;
		margin: auto;
	}

	div.level-info {
		display: block;
		padding: 0px;
		/*background-color: #000;*/
		/*color: blue;*/
	}

	fieldset label { margin: 0; padding: 0;}
	.stage-rating { border: none;}
	.stage-rating input {display: none;}
	.stage-rating label:before {margin: 5px; font-size: 3em; font-family: FontAwesome; display: inline-block; content: "\f005"; color: #FFD700};



</style>

<div class="container">
	<!-- <ul>
		<?php foreach ($map_list as $m) { ?>

			<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $m['MAP_ID']; ?>"><?php echo $m['MAP_FILENAME']; ?></a><input type="radio" name="test" id="test" value="5" /><label class="rate" title="Sample" for="test">Sample</label></li>
			
		<?php } ?>
	</ul> -->

	<div class="row">
		<?php $i = 0; ?>
		<?php foreach ($map_list as $m) { ?>
			<a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $m['MAP_ID']; ?>">
				<div class="col-md-2 level"	 style="display: block; height: 200px">
					<div class="level-info text-center">
						<h2>Level <?php echo $i+1; ?></h2>
						<fieldset class="stage-rating">
							<input type="radio" name="rating_stage<?php echo $i+1; ?>" id="stage_<?php echo $i+1; ?>_star1" value="1"><label for="stage_<?php echo $i+1; ?>_star1" title="Good"></label>
							<input type="radio" name="rating_stage<?php echo $i+1; ?>" id="stage_<?php echo $i+1; ?>_star1" value="2"><label for="stage_<?php echo $i+1; ?>_star2" title="Excellent"></label>
							<input type="radio" name="rating_stage<?php echo $i+1; ?>" id="stage_<?php echo $i+1; ?>_star1" value="3"><label for="stage_<?php echo $i+1; ?>_star3" title="Perfect"></label>
						</fieldset>
					</div>
				</div>
			</a>
			<?php $i++; ?>
		<?php } ?>
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
</div>