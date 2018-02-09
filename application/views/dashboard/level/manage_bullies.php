
	<div id="question_modal" class="modal" style="display: none;">
		<div class="modal-content" style=" width: auto !important; max-width: 1000px;">
			<div>
				<div>
					<button style="float: right;" type="button" id="question_modal_close" onclick="close_modal()"><span>&times;</span></button>
				</div>
			</div>
			<div class="questions-container" style="margin-top: 30; padding: 0px 20px">
				<div class="view-questions-block"></div>

				<form class="form-horizontal" id="question-form" name="question-form" method="post" action="add_question">
					<input type="text" name="input-bully-id" id="input-bully-id">
					<div class="form-group">
						<label class="control-label col-sm-2">Question Type:</label>
						<div class="col-sm-2">
							<select class="form-control" id="qstn_type" name="qstn_type">
								<option value="variable">Variable</option>
								<option value="array">Array</option>
								<option value="command">Command</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Question Dialog:</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="qstn_dialog" name="qstn_dialog" style="resize: none;" rows="5" placeholder="Question"></textarea>
						</div>
					</div>

					<div class="variable-info-block" style="border: 1px solid #d9d9d9; padding-top: 20px; padding-bottom: 10px; display: none;">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label col-sm-5">Data Type:</label>
									<div class="col-sm-5">
										<select class="form-control" id="var_dataType" name="var_dataType">
											<option value="int">Integer</option>
											<option value="double">Double</option>
											<option value="char">Character</option>
											<option value="String">String</option>
											<option value="bool">Boolean</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5">Identifier:</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="var_identifier" id="var_identifier">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5">Value:</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="var_value" id="var_value">
									</div>
								</div>

								<input type="button" class="btn btn-default col-sm-12" value="Add Variable" onclick="append_variable()">
							</div>
							<div class="col-sm-7">
								<div class="variables-block"></div>
							</div>
						</div>
					</div>

					<div class="array-info-block" style="border: 1px solid #d9d9d9; padding-top: 20px; padding-bottom: 10px;">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label col-sm-5">Data Type:</label>
									<div class="col-sm-5">
										<select class="form-control" id="arr_dataType" name="arr_dataType">
											<option value="int[]">Integer</option>
											<option value="double[]">Double</option>
											<option value="char[]">Character</option>
											<option value="String[]">String</option>
											<option value="bool[]">Boolean</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5">Identifier:</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="arr_identifier" id="arr_identifier">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5">Value:</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="arr_value" id="arr_value">
									</div>
								</div>

								<input type="button" class="btn btn-default col-sm-12" value="Add Array" onclick="append_array()">
							</div>
							<div class="col-sm-7">
								<div class="variables-block"></div>
							</div>
						</div>
					</div>





					<div class="add-question-button row" style="padding-top: 15px; padding-bottom: 15px;">
						<input type="submit" class="btn btn-default col-sm-4 col-sm-offset-4" value="Add Question">
					</div>
				</form>
			</div>
			
		</div>
		
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo $title ?></h4></div>
		<div class="panel-body">
			<div class="bully-list-container"></div>
			<div class="bully-form">
				<form class="form-horizontal" id="bully-form" name="bully-form" method="post" action="add_bully" enctype="multipart/form-data">

					<div class="bullies-block"></div>

					<!-- <input type="text" name="level-id" id="level-id" value="<?php // echo $lvl_Id ?>"> -->

					<div class="row">

						<div class="col-sm-4 col-sm-offset-2">
							<div class="form-group">
								<label class="control-label col-sm-5">Bully Type:</label>
								<div class="col-sm-7">
									<select class="form-control"  id="bly_type" name="bly_type">
										<option value="BULLY-07.png" selected>Green Bully</option>
										<option value="BULLY-08.png" >Yellow Bully</option>
										<option value="BULLY-10.png" >Red Bully</option>
										<option value="BULLY-09.png" >Blue Bully</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-5">Bully Name:</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="bly_name" id="bly_name">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-5">Max HP:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="bly_max_hp" id="bly_max_hp" value="1" disabled>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-5">Spawn Point x:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="bly_spawn_x" id="bly_spawn_x">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-5">Spawn Point y:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="bly_spawn_y" id="bly_spawn_y">
								</div>
							</div>

							<input class="btn btn-submit col-sm-12" type="submit" name="bully-form-submit">
						</div>

						<div class="col-sm-4">
							<div class="bly-img-prev" style="height: 250px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center; background-image: url('<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-07.png')" id="BlyImgPrev" name="BlyImgPrev"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		var bully_list = {};
		var question_list = {};
		var variable_list = {};

		var varCtr = 0;

		get_bully_list = function() {

			var lvlId = "<?php echo $lvl_Id ?>";

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_bully_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					success: function(res) {
						bully_list = res.bully_list;
						console.log(bully_list);
						resolve(bully_list);
					},
					error: function() {
						console.log("cannot retreive bully list due to some error");
					}
				});
			}).then(function(bullies) {

				load_bullies_block();
			});
		}

		get_question_list = function() {

			var lvlId = "<?php echo $lvl_Id ?>";

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_question_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					success: function(res) {
						question_list = res.question_list;
						console.log(question_list);
						resolve(question_list);
					},
					error: function() {
						console.log("cannot retreive bully list due to some error");
					}
				});
			}).then(function(questions) {

				// load_questions_block();
			});
		}

		load_bullies_block = function() {

			var data = {};
			data['bully_list'] = {};

			for(var key in bully_list) {

				var bly_type = "";

				if(bully_list[key].BLY_IMAGEURL == "BULLY-07.png") {
					bly_type = "Green Bully";
				} else if(bully_list[key].BLY_IMAGEURL == "BULLY-08.png") {
					bly_type = "Yellow Bully";
				} else if(bully_list[key].BLY_IMAGEURL == "BULLY-10.png") {
					bly_type = "Red Bully";
				} else if(bully_list[key].BLY_IMAGEURL == "BULLY-09.png") {
					bly_type = "Blue Bully";
				}


				data['bully_list'][key] = {};

				data['bully_list'][key].id = bully_list[key].BLY_ID;
				data['bully_list'][key].type = bly_type;
				data['bully_list'][key].spawnPt = bully_list[key].BLY_SPAWNPOINT;
				data['bully_list'][key].maxHp = bully_list[key].BLY_MAXHP;
			}

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_bullies_block",
				data: data,
				success: function(data) {
					$(".bullies-block").html(data);
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		append_variable = function() {

			var dataType = document.getElementById("var_dataType").value;
			var identifier = document.getElementById("var_identifier").value;
			var value = document.getElementById("var_value").value;

			if(parseValue(dataType, value)) {

				variable_list[varCtr] = {dataType: dataType, var_identifier: identifier, var_value: parseValue(dataType, value)};
				console.log(variable_list);
				varCtr++;
			} else {
				console.log("datatype missmatch");
			}

			document.getElementById("var_dataType").value = "int";
			document.getElementById("var_identifier").value = "";
			document.getElementById("var_value").value = "";

			load_variables_block();
		}

		append_array = function() {

			var isMismatch = false;

			var dataType = document.getElementById("arr_dataType").value;
			var identifier = document.getElementById("arr_identifier").value;
			var value = document.getElementById("arr_value").value;

			value = value.replace(/\{/g, "[");
			value = value.replace(/\}/g, "]");
			value = value.replace(/\'/g, "\"");

			value = JSON.parse(value);

			for(var key in value) {

				if(dataType == "String[]") {
					value[key] = "\"" + value[key] + "\"";
				} else if(dataType == "char[]") {
					value[key] = "\'" + value[key] + "\'";
				}

				if(parseValue(dataType.replace(/[\[\]]/g, ""), value[key].toString()) == false) {
					isMismatch = true;
					break;
				} else {
					value[key] = parseValue(dataType.replace(/[\[\]]/g, ""), value[key].toString());
				}
			}

			if(isMismatch) {
				console.log("error: dataType missmatch");
			} else {
				variable_list[varCtr] = {dataType: dataType, var_identifier: identifier, var_value: value};
				console.log(variable_list);
				varCtr++;
			}

			load_variables_block();
		}

		parseValue = function(dataType, value) {

		// console.log(value);

			if(dataType == "int") {
				
				if(/^[0-9]+$/i.test(value)) {
					return parseInt(value);
				} else {
					return false;
				}
			} else if(dataType == "double") {

				if(/^[0-9\.]+$/i.test(value)) {
					return parseFloat(value);
				} else {
					return false;
				}
			} else if(dataType == "char") {

				if(/^\'\w\'$/i.test(value)) {
					value = value.replace(/\'/g, "");
					return value;
				} else {
					return false;
				}
			} else if(dataType == "String") {

				if(/^\".*\"$/i.test(value)) {
					// value = value.replace(/\"/g, "");
					return value;
				} else {
					return false;
				}
			} else if(dataType == "bool") {

				value = value.toLowerCase();
				if(/^(true|false)$/i.test(value)) {
					return value;
				} else {
					return false;
				}
			}
		}

		load_variables_block = function() {

			var data = {};
			data['variables'] = variable_list;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_variables_block",
				data: data,
				success: function(data) {
					$(".variables-block").html(data);
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		// append_variable = function() {

		// 	var dataType = document.getElementById("var_dataType").value;
		// 	var identifier = document.getElementById("var_identifier").value;
		// 	var value = document.getElementById("var_value").value;

		// 	if(parseValue(dataType, value)) {

		// 		variable_list[varCtr] = {dataType: dataType, var_identifier: identifier, var_value: parseValue(dataType, value)};
		// 		console.log(variable_list);
		// 		varCtr++;
		// 	} else {
		// 		console.log("datatype missmatch");
		// 	}

		// 	document.getElementById("var_dataType").value = "int";
		// 	document.getElementById("var_identifier").value = "";
		// 	document.getElementById("var_value").value = "";

		// 	load_variables_block();
		// }

		$("#question-form").submit(function(e) {

			var data = {};
			data["question_info"] = {
				bullyId: document.getElementById("input-bully-id").value,
				qstn_type: document.getElementById("qstn_type").value,
				qstn_dialog: document.getElementById("qstn_dialog").value,
				qstn_ans: variable_list,
			};

			console.log(variable_list);

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/save_add_question",
					data: data,
					dataType: 'json',
					success: function(res) {
						console.log(res);
						resolve(res);
					},
					error: function(err) {
						console.log("failed to add question due to some error");
					}
				});
			}).then(function(result) {

				if(result.status) {
					load_questions(document.getElementById("input-bully-id").value);
					variable_list = {};
					varCtr = 0;
					load_variables_block();
				} else {
					console.log(result.message);
				}
			});

			e.preventDefault();
		});

		$("#bully-form").submit(function(e) {

			var lvlId = "<?php echo $lvl_Id ?>";

			var bully_info = {
				lvl_Id: lvlId,
				bly_maxHp: document.getElementById("bly_max_hp").value,
				bly_spawn_x: document.getElementById("bly_spawn_x").value,
				bly_spawn_y: document.getElementById("bly_spawn_y").value,
				bly_name: document.getElementById("bly_name").value,
				bly_type: document.getElementById("bly_type").value,
			}

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/save_add_bully",
					data: {lvlId: lvlId, bully_info: bully_info},
					dataType: 'json',
					success: function(res) {
						console.log(res);
						resolve(res);
					},
					error: function(err) {
						console.log("failed to add bully due to some error");
					}
				});

			}).then(function(result) {

				if(result.status) {
					get_bully_list();
				} else {
					console.log(result.message);
				}
			});

			e.preventDefault();
		});

		$("#bly_type").change(function(){

			var bullyHp = 0;
			
			if(this.value) {
				$("#BlyImgPrev").css("background-image", "url(<?php echo base_url(); ?>assets/images/avatars/sprites/"+ this.value +")");
			}

			if(this.value == "BULLY-10.png") {
				bullyHp = 3;
			} else if(this.value == "BULLY-09.png") {
				bullyHp = 4;
			} else if(this.value == "BULLY-08.png") {
				bullyHp = 2;
			} else if(this.value == "BULLY-07.png") {
				bullyHp = 1;
			}

			$("#bly_max_hp").val(bullyHp);

	    });

	    $("#qstn_type").change(function() {

	    	if($("#qstn_type").val() == "variable") {
	    		$(".variable-info-block").css("display", "block");
	    		$(".array-info-block").css("display", "none");
	    	} else if($("#qstn_type").val() == "array") {
	    		$(".variable-info-block").css("display", "none");
	    		$(".array-info-block").css("display", "block");
	    	}
	    });

		get_question_list();
		get_bully_list();

		//modal
		load_variables_block();
	});

</script>