
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
					<input type="hidden" name="input-bully-id" id="input-bully-id">

					<div class="form-group">
						<label class="control-label col-sm-2">Question Dialog:</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="qstn_dialog" name="qstn_dialog" style="resize: none;" rows="5" placeholder="Question"></textarea>
						</div>
					</div>

					<div class="codes-block"></div>

					<div class="code-type-container">
						<label class="radio-inline"><input type="radio" name="code_type" id="code_type_varop" value="var_and_opp" checked>Variables and Operations</label>
						<label class="radio-inline"><input type="radio" name="code_type" id="code_type_cmd" value="cmd">Commands</label>
						<!-- <input type="radio" name="code_type_else" id="code_type" value="cmd">
						<input type="radio" name="code_type_else" id="code_type" value="cmd"> -->
					</div>

					<div class="var-op-block-container" style="display: block;">
						<div class="print-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							
							<div class="form-group">
								<label class="control-label col-sm-2">Print Text:</label>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-10">
											<input class="form-control" type="text" name="print_txt" id="print_txt">
										</div>
										<div class="col-sm-2">
											<div class="add-print-btn">
												<input class="btn btn-default" type="button" name="add_print" onclick="append_print();" value="Add Print">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="print-block" style="padding: 0px 20px"></div>
						</div>

						<div class="answer-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<label class="control-label col-sm-5">Storage Type:</label>
										<div class="col-sm-5">
											<select class="form-control" id="qstn_type" name="qstn_type">
												<option value="variable">Variable</option>
												<option value="array">Array</option>
												<option value="command">Command</option>
											</select>
										</div>
									</div>

									<div class="variable-info-block" style="border: 1px solid #d9d9d9; padding: 20px; display: block;">
										<div class="form-group">
											<label class="control-label col-sm-5">Data Type:</label>
											<div class="col-sm-5">
												<select class="form-control" id="var_dataType" name="var_dataType">
													<option value="int">Integer</option>
													<option value="double">Double</option>
													<option value="char">Character</option>
													<option value="String">String</option>
													<option value="Boolean">Boolean</option>
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

										<div class="row">
											<input type="button" class="btn btn-default col-sm-12" value="Add Variable" onclick="append_variable()">
										</div>
									</div>

									<div class="array-info-block" style="border: 1px solid #d9d9d9; padding: 20px; display: none;">
										<div class="form-group">
											<label class="control-label col-sm-5">Data Type:</label>
											<div class="col-sm-5">
												<select class="form-control" id="arr_dataType" name="arr_dataType">
													<option value="int[]">Integer</option>
													<option value="double[]">Double</option>
													<option value="char[]">Character</option>
													<option value="String[]">String</option>
													<option value="Boolean[]">Boolean</option>
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

										<div class="row">
											<input type="button" class="btn btn-default col-sm-12" value="Add Array" onclick="append_array()">
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="variables-block"></div>
								</div>
							</div>
						</div>

						<div class="operations-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							<div class="opp-header" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 10px; margin-bottom: 20px;">
								<h4 style="padding: 0px 0px 0px 15px;">Operations</h4>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="operation-info">
										<div class="form-group">
											<label class="control-label col-sm-5">Save To:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="opp_saveTo" id="opp_saveTo">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Variable 1:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="opp_var1" id="opp_var1">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Operation:</label>
											<div class="col-sm-7">
												<select class="form-control" id="opp_operation" name="opp_operation">
													<option value="add">+</option>
													<option value="subtract">-</option>
													<option value="multiply">*</option>
													<option value="divide">/</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Variable 2:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="opp_var2" id="opp_var2">
											</div>
										</div>

										<input type="button" class="btn btn-default col-sm-12" value="Add Operation" onclick="append_operation()">
									</div>
								</div>
								<div class="col-sm-7">
									<div class="operations-block"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="commands-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin-top: 20px; padding-bottom: 10px; display: none;">
						<div class="cmd-header" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 10px; margin-bottom: 20px;">
							<h4 style="padding: 0px 0px 0px 15px;">Commands</h4>
						</div>

						<div class="commands-block" style="padding: 0px 10px;"></div>

						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label col-sm-5">Type: </label>
									<div class="col-sm-7">
										<select class="form-control" id="cmd_type" name="cmd_type">
											<!-- <option value="none" selected>None</option> -->
											<option value="cmd-if">If</option>
											<option value="cmd-while">While</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-5">Condition: </label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="cmd_cond" id="cmd_cond">
									</div>
								</div>
							</div>
						</div>

						<div class="cmdprint-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							
							<div class="form-group">
								<label class="control-label col-sm-2">Print Text:</label>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-10">
											<input class="form-control" type="text" name="cmdprint_txt" id="cmdprint_txt">
										</div>
										<div class="col-sm-2">
											<div class="add-print-btn">
												<input class="btn btn-default" type="button" name="add_print" onclick="append_print();" value="Add Print">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="cmdprint-block" style="padding: 0px 20px"></div>
						</div>

						<div class="cmdvar-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<label class="control-label col-sm-5">Storage Type:</label>
										<div class="col-sm-5">
											<select class="form-control" id="cmdvar_type" name="cmdvar_type">
												<option value="variable">Variable</option>
												<option value="array">Array</option>
												<option value="command">Command</option>
											</select>
										</div>
									</div>

									<div class="cmdvariable-info-block" style="border: 1px solid #d9d9d9; padding: 20px; display: block;">
										<div class="form-group">
											<label class="control-label col-sm-5">Data Type:</label>
											<div class="col-sm-5">
												<select class="form-control" id="cmdvar_dataType" name="cmdvar_dataType">
													<option value="int">Integer</option>
													<option value="double">Double</option>
													<option value="char">Character</option>
													<option value="String">String</option>
													<option value="Boolean">Boolean</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Identifier:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdvar_identifier" id="cmdvar_identifier">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Value:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdvar_value" id="cmdvar_value">
											</div>
										</div>

										<div class="row">
											<input type="button" class="btn btn-default col-sm-12" value="Add Variable" onclick="append_variable()">
										</div>
									</div>

									<div class="cmdarray-info-block" style="border: 1px solid #d9d9d9; padding: 20px; display: none;">
										<div class="form-group">
											<label class="control-label col-sm-5">Data Type:</label>
											<div class="col-sm-5">
												<select class="form-control" id="cmdarr_dataType" name="cmdarr_dataType">
													<option value="int[]">Integer</option>
													<option value="double[]">Double</option>
													<option value="char[]">Character</option>
													<option value="String[]">String</option>
													<option value="Boolean[]">Boolean</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Identifier:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdarr_identifier" id="cmdarr_identifier">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Value:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdarr_value" id="cmdarr_value">
											</div>
										</div>

										<div class="row">
											<input type="button" class="btn btn-default col-sm-12" value="Add Array" onclick="append_array()">
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="cmd_variables-block"></div>
								</div>
							</div>
						</div>

						<div class="cmdoperations-info-block" style="border: 1px solid #d9d9d9; padding-top: 10px; margin: 20px 15px; padding-bottom: 10px;">
							<div class="opp-header" style="border-bottom: 1px solid #d9d9d9; padding-bottom: 10px; margin-bottom: 20px;">
								<h4 style="padding: 0px 0px 0px 15px;">Operations</h4>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="cmdoperation-info">
										<div class="form-group">
											<label class="control-label col-sm-5">Save To:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdopp_saveTo" id="cmdopp_saveTo">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Variable 1:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdopp_var1" id="cmdopp_var1">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Operation:</label>
											<div class="col-sm-7">
												<select class="form-control" id="cmdopp_operation" name="cmdopp_operation">
													<option value="add">+</option>
													<option value="subtract">-</option>
													<option value="multiply">*</option>
													<option value="divide">/</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-5">Variable 2:</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="cmdopp_var2" id="cmdopp_var2">
											</div>
										</div>

										<input type="button" class="btn btn-default col-sm-12" value="Add Operation" onclick="append_operation()">
									</div>
								</div>
								<div class="col-sm-7">
									<div class="cmdoperations-block"></div>
								</div>
							</div>
						</div>

						<div class="add-command-button row" style="padding-top: 15px; padding-bottom: 15px; display: block;">
							<input type="button" class="btn btn-default col-sm-4 col-sm-offset-4" id="add_cmd_btn" value="Add Command" onclick="append_command()">
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

		var code_type = "varop";

		var bully_list = {};
		var question_list = {};
		var command_list = {};
		var variable_list = {};
		var operation_list = {};
		var print_list = {};

		var code_list = [];

		var varCtr = 0;
		var opCtr = 0;
		var cmdCtr = 0;
		var printCtr = 0;

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

		load_commands_block = function() {

			var data = {};
			data["command_list"] = command_list;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_commands_block",
				data: data,
				success: function(res) {
					$(".commands-block").html(res);
				},
				error: function(err) {
					console.log("failed to load command table due to some error");
				}
			});
		}

		load_operations_block = function() {

			var curr_codeType = code_type;
			var data = {};
			data["operation_list"] = {};

			for(var key in operation_list) {

				if(operation_list[key].code_type == curr_codeType) {
					data["operation_list"][key] = operation_list[key];
				}
			}

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_operations_block",
				data: data,
				success: function(res) {
					
					if(curr_codeType == "varop") {
						$(".operations-block").html(res);
					} else if(curr_codeType == "cmd") {
						$(".cmdoperations-block").html(res);
					}
				},
				error: function(err) {
					console.log("failed to load operation table due to some error");
				}
			});
		}

		load_print_block = function() {

			var curr_codeType = code_type;
			var data = {};
			data["print_list"] = {};

			for(var key in print_list) {

				if(print_list[key].code_type == curr_codeType) {

					data["print_list"][key] = print_list[key];
				}
			}

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_print_block",
				data: data,
				success: function(res) {
					
					if(curr_codeType == "varop") {
						$(".print-block").html(res);
					} else if(curr_codeType == "cmd") {
						$(".cmdprint-block").html(res);
					}
				},
				error: function(err) {
					console.log("failed to load print table due to some error");
				}
			});
		}

		append_command = function() {

			var cmd_type = document.getElementById("cmd_type").value;
			var cmd_cond = document.getElementById("cmd_cond").value;

			var cmd_obj = {type: cmd_type, condition: cmd_cond, statements: [],};

			for(var key in variable_list) {

				if(variable_list[key].code_type == "cmd") {
					variable_list[key].type = "dec-var";
					cmd_obj.statements.push(variable_list[key]);
					delete variable_list[key];
				}
			}

			for(var key in operation_list) {

				if(operation_list[key].code_type == "cmd") {
					operation_list[key].type = "op";
					cmd_obj.statements.push(operation_list[key]);
					delete operation_list[key];
				}
			}

			command_list[cmdCtr] = cmd_obj;
			code_list.push(command_list[cmdCtr]);

			console.log(command_list);
			console.log(code_list);

			cmdCtr++;

			load_codes_block();
			load_commands_block();
			load_operations_block();
			load_variables_block();
		}

		append_print = function() {

			var curr_codeType = code_type;

			var print_txt;

			if(curr_codeType == "varop") {
				print_txt = document.getElementById("print_txt").value;
			} else if(curr_codeType == "cmd") {
				print_txt = document.getElementById("cmdprint_txt").value;
			}

			print_list[printCtr] = {txt: print_txt, code_type: curr_codeType, type: "print"};

			code_list.push(print_list[printCtr]);

			printCtr++;

			console.log(print_list);

			document.getElementById("print_txt").value = "";
			document.getElementById("cmdprint_txt").value = "";

			load_codes_block();
			load_print_block();
		}

		append_variable = function() {

			var curr_codeType = code_type

			var dataType;
			var identifier;
			var value;

			if(curr_codeType == "varop") {

				dataType = document.getElementById("var_dataType").value;
				identifier = document.getElementById("var_identifier").value;
				value = document.getElementById("var_value").value;
			} else if(curr_codeType == "cmd") {

				dataType = document.getElementById("cmdvar_dataType").value;
				identifier = document.getElementById("cmdvar_identifier").value;
				value = document.getElementById("cmdvar_value").value;
			}

			var checkVarVal = parseValue(dataType, value);

			if(checkVarVal.status) {

				var valObj = parseValue(dataType, value);

				variable_list[varCtr] = {dataType: dataType, var_identifier: identifier, var_value: valObj.value, code_type: curr_codeType, type: "dec-var"};

				if(curr_codeType == "varop") {

					code_list.push(variable_list[varCtr]);
					// console.log(variable_list);
					console.log(code_list);
				}

				varCtr++;
			} else {
				console.log("datatype missmatch");
			}

			document.getElementById("var_dataType").value = "int";
			document.getElementById("var_identifier").value = "";
			document.getElementById("var_value").value = "";
			document.getElementById("cmdvar_dataType").value = "int";
			document.getElementById("cmdvar_identifier").value = "";
			document.getElementById("cmdvar_value").value = "";

			load_variables_block();
			load_codes_block();
		}



		append_array = function() {

			var curr_codeType = code_type;
			var isMismatch = false;

			var dataType;
			var identifier;
			var value;

			if(curr_codeType == "varop") {
				dataType = document.getElementById("arr_dataType").value;
				identifier = document.getElementById("arr_identifier").value;
				value = document.getElementById("arr_value").value;
			} else if(curr_codeType == "cmd") {
				dataType = document.getElementById("cmdarr_dataType").value;
				identifier = document.getElementById("cmdarr_identifier").value;
				value = document.getElementById("cmdarr_value").value;
			}

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

				var checkVarVal = parseValue(dataType.replace(/[\[\]]/g, ""), value[key].toString());

				if(checkVarVal.status == false) {
					isMismatch = true;
					break;
				} else {

					var valObj = parseValue(dataType.replace(/[\[\]]/g, ""), value[key].toString());
					value[key] = valObj.value;
				}
			}

			if(isMismatch) {
				console.log("error: dataType missmatch");
			} else {
				variable_list[varCtr] = {dataType: dataType, var_identifier: identifier, var_value: value, code_type: curr_codeType, type: "dec-arr"};
				
				if(curr_codeType == "varop") {

					code_list.push(variable_list[varCtr]);
					// console.log(variable_list);
					console.log(code_list);
				}

				document.getElementById("arr_dataType").value = "int[]";
				document.getElementById("arr_identifier").value = "";
				document.getElementById("arr_value").value = "";
				document.getElementById("cmdarr_dataType").value = "int[]";
				document.getElementById("cmdarr_identifier").value = "";
				document.getElementById("cmdarr_value").value = "";


				varCtr++;
			}

			load_variables_block();
			load_codes_block();
		}

		append_operation = function() {

			var curr_codeType = code_type;

			var save_to;
			var var_1;
			var var_2;
			var operation;

			if(curr_codeType == "varop") {

				save_to = document.getElementById("opp_saveTo").value;
				var_1 = document.getElementById("opp_var1").value;
				var_2 = document.getElementById("opp_var2").value;
				operation = document.getElementById("opp_operation").value;
			} else if(curr_codeType == "cmd") {

				save_to = document.getElementById("cmdopp_saveTo").value;
				var_1 = document.getElementById("cmdopp_var1").value;
				var_2 = document.getElementById("cmdopp_var2").value;
				operation = document.getElementById("cmdopp_operation").value;
			}

			operation_list[opCtr] = {save_to: save_to, operation: operation, var_1: var_1, var_2: var_2, code_type: curr_codeType, type: "op"};

			if(curr_codeType == "varop") {
				code_list.push(operation_list[opCtr]);
				console.log(code_list);
			}

			opCtr++;

			document.getElementById("opp_saveTo").value = "";
			document.getElementById("opp_var1").value = "";
			document.getElementById("opp_var2").value = "";
			document.getElementById("opp_operation").value = "add";

			document.getElementById("cmdopp_saveTo").value = "";
			document.getElementById("cmdopp_var1").value = "";
			document.getElementById("cmdopp_var2").value = "";
			document.getElementById("cmdopp_operation").value = "add";

			load_operations_block();
			load_codes_block();
		}

		parseValue = function(dataType, value) {

			// console.log(value);

			if(dataType == "int") {
				
				if(/^[0-9]+$/i.test(value)) {

					return {status: true, value: parseInt(value)};
				} else {
					return {status: false, message: "value is not an integer"};
				}
			} else if(dataType == "double") {

				if(/^[0-9\.]+$/i.test(value)) {
					return {status: true, value: parseFloat(value)};
				} else {
					return {status: false, message: "value is not a double"};
				}
			} else if(dataType == "char") {

				if(/^\'\w\'$/i.test(value)) {
					// value = value.replace(/\'/g, "");
					return {status: true, value: value};
				} else {
					return {status: false, message: "value is not a character"};
				}
			} else if(dataType == "String") {

				if(/^\".*\"$/i.test(value)) {
					// value = value.replace(/\"/g, "");
					return {status: true, value: value};
				} else {
					return {status: false, message: "value is not a String"};
				}
			} else if(dataType == "Boolean") {

				value = value.toLowerCase();
				if(/^true$/i.test(value)) {
					return {status: true, value: true};
				} else if(/^false$/i.test(value)) {
					return {status: true, value: false};
				} else {
					return {status: false, message: "value is not a Boolean"};
				}
			}
		}

		load_variables_block = function() {

			var curr_codeType = code_type;
			var data = {};
			data['variables'] = {};

			for(var key in variable_list) {

				if(variable_list[key].code_type == curr_codeType) {

					data['variables'][key] = variable_list[key];
				}
			}

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_variables_block",
				data: data,
				success: function(data) {
					
					if(curr_codeType == "varop") {
						$(".variables-block").html(data);
					} else if(curr_codeType == "cmd") {
						$(".cmd_variables-block").html(data);
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		load_codes_block = function() {

			var data = {};
			data["code_list"] = code_list;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_codes_block",
				data: data,
				success: function(res) {
					$(".codes-block").html(res);
				},
				error: function(err) {
					console.log("failed to load code table due to some error");
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
				// qstn_type: document.getElementById("qstn_type").value,
				qstn_dialog: document.getElementById("qstn_dialog").value,
				qstn_ans: {variables: variable_list, operations: operation_list, commands: command_list, prints: print_list},
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
					operation_list = {};
					command_list = {};
					print_list = {};
					varCtr = 0;
					opCtr = 0;
					cmdCtr = 0;
					printCtr = 0;
					load_variables_block();
					load_operations_block();
					load_commands_block();
					load_codes_block();
					load_print_block();

					document.getElementById("qstn_dialog").value = "";
				} else {
					console.log(result.message);
				}
			});

			e.preventDefault();
		});

		$("#bully-form").submit(function(e) {

			var lvlId = "<?php echo $lvl_Id ?>";
			
			var bully_thumb = "";
			var bully_type = document.getElementById("bly_type").value;

			if(bully_type == "BULLY-07.png") {
				bully_thumb = "BULLY_THUMB-07.png";
			} else if(bully_type == "BULLY-08.png") {
				bully_thumb = "BULLY_THUMB-08.png";
			} else if(bully_type == "BULLY-09.png") {
				bully_thumb = "BULLY_THUMB-09.png";
			} else if(bully_type == "BULLY-10.png") {
				bully_thumb = "BULLY_THUMB-10.png";
			}

			var bully_info = {
				lvl_Id: lvlId,
				bly_maxHp: document.getElementById("bly_max_hp").value,
				bly_spawn_x: document.getElementById("bly_spawn_x").value,
				bly_spawn_y: document.getElementById("bly_spawn_y").value,
				bly_name: document.getElementById("bly_name").value,
				bly_type: document.getElementById("bly_type").value,
				bly_thumb: bully_thumb,
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

	    $("#cmdvar_type").change(function() {

	    	if($("#cmdvar_type").val() == "variable") {
	    		$(".cmdvariable-info-block").css("display", "block");
	    		$(".cmdarray-info-block").css("display", "none");
	    	} else if($("#cmdvar_type").val() == "array") {
	    		$(".cmdvariable-info-block").css("display", "none");
	    		$(".cmdarray-info-block").css("display", "block");
	    	}
	    });

	    $("#cmd_type").change(function() {

	    	if(this.value == "none") {
	    		$(".add-command-button").css("display", "none");
	    	} else if(this.value == "cmd-if" || this.value == "cmd-while") {
	    		$(".add-command-button").css("display", "block");
	    	}
	    });

	    $("#code_type_varop").click(function() {

	    	code_type = "varop";

	    	$(".var-op-block-container").css("display", "block");
	    	$(".commands-info-block").css("display", "none");

	    	load_variables_block();
	    	load_operations_block();
	    	load_print_block();
	    });

	    $("#code_type_cmd").click(function() {

	    	code_type = "cmd";

	    	$(".var-op-block-container").css("display", "none");
	    	$(".commands-info-block").css("display", "block");

	    	load_variables_block();
	    	load_operations_block();
	    	load_commands_block();
	    	load_print_block();
	    });

		get_question_list();
		get_bully_list();

		//modal
		load_codes_block();
		load_variables_block();
		load_operations_block();
		load_commands_block();
		load_print_block();
	});

</script>