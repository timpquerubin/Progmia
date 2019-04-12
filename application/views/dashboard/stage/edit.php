<div class="panel panel-default">
		<div class="panel-heading"><h4>Edit Stage</h4></div>
		<div class="panel-body row">
			<form class="form-horizontal" id="edit_level_form" name="edit_level_form" method="post" action="<?php echo base_url(); ?>dashboard/save_edit_level" enctype="multipart/form-data">
				<?php foreach($stage_info as $stg_info) { ?>
				<div class="row"><label class="control-label col-sm-2">Stage ID</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="stage-name" id="stage-name" placeholder="Stage Name" value="<?php echo $stg_info['STG_ID']; ?>" disabled/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Stage Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="stage-name" id="stage-name" placeholder="Stage Name" value="<?php echo $stg_info['STG_NAME']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Stage Number</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="stage-num" id="stage-num" placeholder="Stage Num" value="<?php echo $stg_info['STG_NUM']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Description:</label>
					<div class="col-sm-6">
						<textarea class="form-control" style="resize: none;" rows="5" name="stage-description" id="stage-description" placeholder="Stage Description"></textarea>
					</div>
				</div>


				<div class="form-group row">
					<label class="control-label col-sm-2">Stage Image:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="imgMap" id="imgMap">
					</div>
					<div class="col-sm-12">
						<div class="level-img-prev" id="imgPrev" name="imgPrev"></div>
					</div>
				</div>
				<?php } ?>
				
			</form>
		</div>
		</div>
	<script type="text/javascript">
		$(document).ready(function() {

			var map_filename = "<?php echo $stg['STG_FILENAME']; ?>";

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
</div>
</div>