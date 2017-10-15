<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading"><h4>Edit Level</h4></div>
		<div class="panel-body">
			<form class="form-horizontal" id="edit_level_form" name="edit_level_form" method="post" action="<?php echo base_url(); ?>dashboard/save_edit_level" enctype="multipart/form-data">

				<div class="form-group">
					<label class="control-label col-sm-2">Stage:</label>
					<div class="col-sm-4">
						<select class="form-control" id="stage" name="stage">
							<?php foreach($stage_list as $s) { ?>
								<option class="stage-option" value="<?php echo $s['STG_ID']; ?>" <?php echo $lvl['STAGE'] === $s['STG_ID'] ? 'selected' : '' ?>><?php echo $s['STG_NAME']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Level Name:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="level-name" id="level-name" placeholder="Level Name" value="<?php echo $lvl['LVL_NAME']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Level Description:</label>
					<div class="col-sm-6">
						<textarea class="form-control" style="resize: none;" rows="5" name="level-description" id="level-description" placeholder="Level Description"><?php echo $lvl['LVL_DESC']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Map Photo:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="imgMap" id="imgMap">
					</div>
					<div class="col-sm-12">
						<div class="level-img-prev" id="imgPrev" name="imgPrev"></div>
					</div>
				</div>
				
			</form>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {

			var map_filename = "<?php echo $lvl['LVL_FILENAME']; ?>";

			$("#imgPrev").css("background-image", "url(<?php echo base_url()."assets/images/levels/".$lvl['LVL_FILENAME']; ?>)");

			$("#imgMap").change(function() {
				if(this.files && this.files[0])
		        {
		        	console.log(this.files[0]);
		        	var reader = new FileReader();
		        	reader.onload = function(e)
		        	{
		        		$("#imgPrev").css("background-image", "url("+ e.target.result +")");
		        		$("#imgPrev").show();
		        	}

		        	reader.readAsDataURL(this.files[0]);
		        }
			});

		});
	</script>
</div>