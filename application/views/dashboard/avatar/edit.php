
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Edit Avatar</h4></div>
		<div class="panel-body">
			<form class="form-horizontal" id="edit_level_form" name="edit_level_form" method="post" action="<?php echo base_url(); ?>dashboard/save_edit_level" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label col-sm-2">Avatar Name:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="level-name" id="level-name" placeholder="Level Name" value="<?php echo $avtr['AVTR_NAME']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Avatar Sprite Image:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="imgSprite" id="imgSprite">
					</div>
					<div class="col-sm-12">
						<div class="level-img-prev" id="imgPrev" name="imgPrev"></div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Avatar Thumbnail Image:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="imgThumb" id="imgThumb">
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

			var avtr_filename = "<?php echo $avtr['AVTR_SPRT_FILENAME']; ?>";

			$("#imgPrev").css("background-image", "url(<?php echo base_url()."assets/images/avatars/sprites/".$avtr['AVTR_SPRT_FILENAME']; ?>)");

			$("#imgSprite").change(function() {
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

	<script type="text/javascript">
		$(document).ready(function() {

			var avtr_sprt_filename = "<?php echo $avtr['AVTR_SPRT_FILENAME']; ?>";

			$("#imgPrev").css("background-image", "url(<?php echo base_url()."assets/images/levels/".$avtr['AVTR_SPRT_FILENAME']; ?>)");

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