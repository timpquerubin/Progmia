<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo $title ?></h4></div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="save_add_level" enctype="multipart/form-data">
				<input type="hidden" name="mapCol" id="mapCol">
				<!-- <textarea name="mapCol" id="mapCol"></textarea> -->
				<!-- <div class="">
					
				</div> -->
				<div class="form-group">
					<label class="control-label col-sm-2">Stage:</label>
					<div class="col-sm-4">
						<select class="form-control" id="stage" name="stage">
							<option selected="true">N.A.</option>
							<?php foreach($stage_list as $s) { ?>
								<option class="stage-option" value="<?php echo $s['STG_ID']; ?>"><?php echo $s['STG_NAME']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Level Name:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="level-name" id="level-name" placeholder="Level Name">
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
				<div class="form-group">
					<label class="control-label col-sm-2">Collision Grid:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="collGrid" id="collGrid">
					</div>
					<div class="col-sm-6">
						<label class="control-label col-sm-2">Columns:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="numCols" name="numCols">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Start Point x:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="startPtX" name="startPtX">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Start Point y:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="startPtY" name="startPtY">
					</div>
				</div>
				<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5">
			</form>
		</div>
	</div>

	
</div>

<script type="text/javascript">
	$(document).ready(function(){
	    $("#imgMap").change(function(){
	        if(this.files && this.files[0])
	        {
	        	console.log(this.files[0]);
	        	var reader = new FileReader();
	        	reader.onload = function(e)
	        	{
	        		var img = new Image();
	        		img.src = e.target.result;
	        		console.log(img.height + "," + img.width);

	        		$("#imgPrev").css("background-image", "url("+ e.target.result +")");
	        		// $("#imgPrev").css("height", img.height);
	        		// $("#imgPrev").css("width", img.width);
	        		$("#imgPrev").show();
	        		// var img = $('<img>').attr('src', e.target.result);
           //  		$('#imgPrev').html(img);
	        	}

	        	reader.readAsDataURL(this.files[0]);
	        }
	    });

	    $("#collGrid").change(function(){
	    	if(this.files && this.files[0])
	    	{
	    		var reader = new FileReader();
	    		reader.onload = function(e)
	        	{
	        		$("#mapCol").attr("value", e.target.result);
	        		// $("#mapCol").text(e.target.result);
	        		console.log(e.target.result);
	        	}

	       		reader.readAsText(this.files[0]);
	    	}
	    });
	});
</script>