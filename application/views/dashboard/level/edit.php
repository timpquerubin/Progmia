	
	<style type="text/css">
		
		div.manage-objective-container {
			margin: 0px;	
		}

		div.manage-objectives {
			margin: 0px 20px;
			padding: 20px;
			border: 1px solid #d9d9d9;
		}

		div.manage-objective-container div h4 {
			font-family:BebasNeue;
		}

	</style>

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

		<div class="manage-objective-container">

			<div class="manage-objectives">
			
				<div class="manage-objectives-header"><h4>Objectives</h4></div>

				<div class="objective-block"></div>

				
				<form class="form-horizontal" id="add_objective_form" name="add_objective_form" method="post" action="<?php base_url(); ?>dashboard/save_objectives">

					<div class="form-group">
						<label class="control-label col-sm-2">Objective:</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="type" name="type" placeholder="Objective Type">
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="obj_val" name="obj_val" placeholder="Value">
						</div>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="obj_val" name="obj_points" placeholder="Points">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Description:</label>
						<div class="col-sm-9">
							<textarea class="form-control" style="resize: none;" rows="5" name="objective-description" id="objective-description" placeholder="Objective Description"></textarea>
						</div>
					</div>

					<div class="row">
						<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5" value="Add">
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

<script type="text/javascript">
	$(document).ready(function() {

		var lvlId = "<?php echo isset($lvlId) ? $lvlId : '' ?>"
		var objective_list = {};

		load_obj_blk();

		function load_obj_blk(){

			var promise = new Promise(function(resolve, reject) {
			
				var data = {};
				data['lvlId'] = lvlId;

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/get_objectives",
					data: data,
					dataType: 'json',
					success: function(res) {
						objective_list = res;
						resolve(res);
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			}).then(function() {
				var data = {};

				for(var key in objective_list) {

					var jsonval = JSON.parse(objective_list[key]['OBJ_JSONVAL']);
					objective_list[key]['type'] = Object.keys(jsonval)[0];
					objective_list[key]['value'] = jsonval[objective_list[key]['type']];
					objective_list[key]['objNum'] = objective_list[key]['OBJ_NUM'];
					objective_list[key]['desc'] = objective_list[key]['OBJ_DESC'];
					objective_list[key]['points'] = objective_list[key]['OBJ_POINTS'];

				}

				data['objectives'] = objective_list;

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>" + "dashboard/load_objectives_block",
					data: data,
					success: function(data) {
						$(".objective-block").html(data);
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			});
		};

		deleteObjective = function(objNum) {

			var data = {};
			data['lvlId'] = lvlId;
			data['objNum'] = objNum;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>" + "dashboard/delete_objective",
				data: data,
				success: function(res) {
					//window.location = "<?php //echo base_url(); ?>dashboard/edit_level/" + lvlId;
					load_obj_blk();
				},
				error: function(err) {
					console.log("cannot delete objective");
				}
			})

		}

		$("#add_objective_form").submit(function(evt) {

			var formData = {};
			var data = {};

			$.each($('#add_objective_form').serializeArray(), function(_, kv) {
			  formData[kv.name] = kv.value;
			});

			
			var new_objective = [];
			new_objective.push({'type': formData['type'], 'value': formData['obj_val'], 'points': formData['obj_points'], 'desc': formData['objective-description']});
			
			data['lvlId'] = lvlId;
			data['objectives'] = new_objective;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>" + "dashboard/save_objectives",
				data: data,
				dataType: 'json',
				success: function(res) {
					// if(res['status']) {
					// 	window.location = "<?php //echo base_url(); ?>dashboard/manage_objectives/" + lvlId;
					// }
					load_obj_blk();
				},
			});

			evt.preventDefault();
		});

	});
</script>

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