<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo $title ?></h4></div>
		<div class="panel-body">
			<form class="form-horizontal" id="add_level_form" name="add_level_form" method="post" action="save_add_level" enctype="multipart/form-data">
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
					<label class="control-label col-sm-2">Level Description:</label>
					<div class="col-sm-6">
						<!-- <input type="text" class="form-control" name="level-description" id="level-description" placeholder="Level Description"> -->
						<textarea class="form-control" style="resize: none;" rows="5" name="level-description" id="level-description" placeholder="Level Description"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Map Image:</label>
					<div class="col-sm-4">
						<input class="form-control" type="file" name="imgMap" id="imgMap">
					</div>
					<div class="col-sm-12">
						<div class="level-img-prev" style="margin: 20px 0px; height: 500px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center;" id="imgPrev" name="imgPrev"></div>
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

				<div class="panel panel-default">
					<div class="panel-heading"><h4>Level Objectives</h4></div>
					<div class="panel-body">
						
						<div class="form-group">
							<div class="row">
								<label class="control-label col-sm-2">Objective:</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="type" name="type" placeholder="Objective Type"/>
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="obj_val" name="obj_val" placeholder="Objective Value"/>
								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="obj_points" name="obj_points" placeholder="Points"/>
								</div>
								<div class="col-sm-2">
									<button type="button" onclick="append_objective()">Add</button>
								</div>
							</div>
							<div class="row">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Description:</label>
							<div class="col-sm-9">
								<textarea class="form-control" style="resize: none;" rows="5" name="objective-description" id="objective-description" placeholder="Objective Description"></textarea>
							</div>
						</div>

						<div class="objective-block"></div>

					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h4>Bullies</h4></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-8 col-sm-8">
								<div class="form-group">
									<label class="control-label col-sm-3">Bully Type:</label>
									<div class="col-sm-4">
										<select class="form-control"  id="bly_type" name="bly_type">
											<option selected>Bully Type 1</option>
											<option>Bully Type 2</option>
											<option>Bully Type 3</option>
											<option>Bully Type 4</option>
										</select>
									</div>
								</div>
								<div class="bly-img-prev" style="margin: 20px 0px; height: 250px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center;" id="BlyImgPrev" name="BlyImgPrev"></div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="form-group">
									<label class="control-label col-sm-5">Spawn Point x:</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="bly_spawn_x" id="bly_spawn_x">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-5">Spawn Point y:</label>
									<div class="col-sm-7">
										<input class="form-control" type="text" name="bly_spawn_y" id="bly_spawn_y">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-5">Max HP:</label>
									<div class="col-sm-7">
										<!-- <input class="form-control" type="text" name="bly_max_hp" id="bly_max_hp"> -->
										<select class="form-control" id="bly_max_hp" name="bly_max_hp">
											<option selected="true" value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Question Type:</label>
							<div class="col-sm-2">
								<select class="form-control" id="qstn_type" name="qstn_type">
									<option>Variable</option>
									<option>Command</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Question Dialog:</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="qstn_dialog" name="qstn_dialog" style="resize: none;" rows="5" placeholder="Question"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Data Type:</label>
							<div class="col-sm-2">
								<select class="form-control" id="var_dataType" name="var_dataType">
									<option value="int">Integer</option>
									<option value="double">Double</option>
									<option value="char">Character</option>
									<option value="String">String</option>
									<option class="bool">Boolean</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Identifier:</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="var_identifier" id="var_identifier">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2">Value:</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="var_value" id="var_value">
							</div>
						</div>

					</div>
				</div>

				<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5">
			</form>
		</div>
	</div>

	
</div>

<script type="text/javascript">
	$(document).ready(function(){

		var objective_list = {};
		var objCtr = 0;

		append_objective = function() {
			var type = document.getElementById("type").value;
			var value = document.getElementById("obj_val").value;
			var desc = document.getElementById("objective-description").value;
			var points = document.getElementById("obj_points").value;

			objective_list[objCtr] = {objNum:objCtr, type: type, value: value, desc: desc, points: points};

			objCtr++;

			document.getElementById("type").value = "";
			document.getElementById("obj_val").value = "";
			document.getElementById("objective-description").value = "";
			document.getElementById("obj_points").value = "";

			load_objectives_block();
		}

		load_objectives_block = function() {

			var data = {};
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
		}

		deleteObjective = function(objIndex) {
			var index = parseInt(objIndex);
			console.log("index" + index);

			delete objective_list[objIndex];

			load_objectives_block();
		}

		load_objectives_block();

		$("#add_level_form").submit(function(e) {

			var formData = new FormData($("#add_avatar_form")[0]);
			var newLvlId = "";
			var list = {};
			list['objectives'] = objective_list;

			var promise = new Promise(function(resolve, reject) {
				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>" + "dashboard/save_add_level",
					data: formData,
					contentType: false,
					processData: false,
					dataType: 'json',
					success: function(data) {
						resolve(data['lvlId']);
						
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			}).then(function(lvlId) {
				
				list['lvlId'] = lvlId;

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>" + "dashboard/save_objectives",
					data: list,
					dataType: 'json',
					success: function(res) {
						if(res['status']) {
							window.location = "<?php echo base_url(); ?>dashboard/level_list";
						} else {
							window.location = "<?php echo base_url(); ?>dashboard/add_level";
						}
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			});

			e.preventDefault();
		});

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