<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Manage Objectives</h4></div>
		<div class="panel-body">
			<?php echo $lvl_info->LVL_NUM ?>
			<div class="objective-block"></div>

			<form class="form-horizontal" id="add_objective_form" name="add_objective_form" method="post" action="<?php base_url(); ?>dashboard/save_objectives">

				<div class="form-group">
					<label class="control-label col-sm-2">Objective:</label>
					<div class="col-sm-3">
						<!-- <input type="text" class="form-control" id="type" name="type" placeholder="Objective Type"> -->
						<select class="form-control" id="type" name="type">
							<option value="Finish">Finish</option>
							<option value="Defeat Bullies">Defeat Bullies</option>
							<option value="Use Command">Use Command</option>
							<option value="Collect Coins">Collect Coins</option>
							<option value="Health">Health</option>
						</select>
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

				<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5" value="Add">

			</form>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		var lvlId = "<?php echo isset($lvlId) ? $lvlId : '' ?>";
		// var map_filename = "<?php // echo $lvl_info['LVL_FILENAME']; ?>";
		var objective_list = {};

		// $("#imgPrev").css("background-image", "url(<?php // echo base_url()."assets/images/levels/".$lvl_info['LVL_FILENAME']; ?>)");

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

		load_objectives_block = function() {

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
		}

		deleteObjective = function(objNum) {

			var data = {};
			data['lvlId'] = lvlId;
			data['objNum'] = objNum;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>" + "dashboard/delete_objective",
				data: data,
				success: function(res) {
					window.location = "<?php echo base_url(); ?>dashboard/manage_objectives/" + lvlId;
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
					document.getElementById("add_objective_form").reset();
					load_objectives_block();
				},
			});

			evt.preventDefault();
		});

		load_objectives_block();
	});
</script>

