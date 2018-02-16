<div class="container-fluid">
	<div class="game-header">
		<nav>
			<ul>
				<li>
					<div class="logo">
						<a class="navbar-brand" href="<?php echo base_url(); ?>">
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/finalest_logo2.png">
						</a>
					</div>
				</li>
				<li class="bg-volume">
					<h1><button id="obj_modal_btn" style="border: 1px solid #000; border-radius: 50%; width: 30px; height: 30px; background-color: #000; font-size: 20px; color: #fff"><span class="fa fa-question"></span></button></h1>
				</li>
				<li>
					<h1><button id="obj_modal_btn" style="border: 1px solid #000; border-radius: 50%; width: 30px; height: 30px; background-color: #000; font-size: 20px; color: #fff"><span class="fa fa-check"></span></button></h1>
				</li>
			</ul>
		</nav>
	</div>

	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="canvas-container">
				<div class="" style="margin: 0px; padding: 10px; background-color: #000">
					<div class="hp-bar-container" style="">
						<div class="player-hp" style="width: 50%;">
							<div class="row">
								<label class="col-sm-2 col-xs-2 col-md-2 col-lg-2" style="color: #FFF;">HP:</label>
								<div class="progress col-sm-3 col-xs-5" style="padding: 0px;">
								 	<div class="progress-bar progress-bar-danger player-hp-bar" role="progressbar" style="width: 100%"></div>
								</div>
							</div>
						</div>
					</div>

					<canvas id="ctx" height="200" width="500" style="width:100%;margin: 0px auto; padding: 0px;"></canvas>
				</div>

				<div class="dialog-container"></div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="code-area-container">
				<div class="row code_area">
					<div class="line-number col-md-1 col-sm-1 col-xs-1">
						<textarea rows="10" id="textarea1" disabled></textarea>
					</div>
					<div class="code-area-container col-md-11 col-sm-11 col-xs-11">
						<textarea class="code_area" id="code_area" name="code_area" rows="10" onscroll="document.getElementById('textarea1').scrollTop = this.scrollTop;"></textarea>
					</div>
				</div>
				<div class="row button-run-container">
					<div class="button-run col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
						<button class="btn btn-basic btn-block" onclick="runCode();">RUN</button>
					</div>
				</div>
				<!-- <textarea onscroll="this.form.elements.textarea1.scrollTop = this.scrollTop;" name="textarea2" ></textarea> -->
			</div>
		</div>
	</div>

	<div id="finish-modal" class="modal" style="display: none;">
		<div class="modal-content">
			<h1>Finish</h1>

			<ul style="display:flex;list-style: none;margin:0 auto !important;padding: 0px !important;justify-content: center;">
				<li id="star1">
					<label class="" for="star1" title="Good"><div></div></label>
				</li>
				<li id="star2">
					<label class="" for="star1" title="Excellent"><div></div></label>
				</li>
				<li id="star3">
					<label class="" for="star1" title="Perfect"><div></div></label>
				</li>
			</ul>
			<div class="objectives container" style="margin-top: 30;">
				<div class="goal">Goal</div>
				<ul style="list-style-type: none;">
					<?php foreach ($objectives_list as $obj): ?>
						<li>
							<div class="row">
								<div class="obj-description col-md-8 col-sm-8 col-xs-8">
									<p><?php echo isset($obj['OBJ_DESC']) ? $obj['OBJ_DESC'] : "" ?></p>
								</div>
								<div class="obj-status col-md-4 col-sm-4 col-xs-4">
									<input id="obj_<?php echo $obj['OBJ_NUM']; ?>_status" type="checkbox" name="obj_status">
								</div>
							</div>
						</li>	
					<?php endforeach ?>
				</ul>
			</div>

			<!-- <div class="stars" style="text-align: center;">
				<fieldset class="stage-rating" style="display: inline-block;">
					<input type="radio" name="rating_stage" id="star1" value="1" disabled><label class="" for="star1" title="Good"></label>
					<input type="radio" name="rating_stage" id="star2" value="2" disabled><label class="" for="star2" title="Excellent"></label>
					<input type="radio" name="rating_stage" id="star3" value="3" disabled><label class="" for="star3" title="Perfect"></label>
				</fieldset>
			</div> -->

			<div class="button-container" style="text-align: center; padding-top: 20px;">
				<div class="row">
					<ul class="button" style="display:flex;justify-content: center;list-style: none;padding:0px !important;">
						<li >
							<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/Levels/<?php echo $level_info['STG_ID'] ?>">Level Menu</a>
						</li>
						<li>
							<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/play_basics/<?php echo $level_info['LVL_ID'] ?>">Repeat Level</a>
						</li>
						<li>
							<?php if(isset($next_level_info["LVL_ID"])) { ?>
								<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/play_basics/<?php echo $next_level_info['LVL_ID'] ?>">Next Level</a>
							<?php } else { ?>
								<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/Stages">Stages</a>
							<?php } ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="lose-modal" class="modal" style="display: none;">
		<div class="modal-content">
			<h1>You Lost</h1>
		</div>
	</div>

	<div id="obj_modal" class="modal" style="display: none;">
	<div class="modal-content">
		<div>
			<div>
				<button style="float: right;" id="obj_modal_close"><span>&times;</span></button>
			</div>
		</div>
		<div class="objectives container" style="margin-top: 30;">
			<ul style="list-style-type: none;">
				<?php foreach ($objectives_list as $obj): ?>
					<li>
						<div class="row">
							<div class="obj-description col-md-8 col-sm-8 col-xs-8">
								<p><?php echo isset($obj['OBJ_DESC']) ? $obj['OBJ_DESC'] : "" ?></p>
							</div>
							<div class="obj-status col-md-4 col-sm-4 col-xs-4">
								<input id="obj_<?php echo $obj['OBJ_NUM']; ?>_status" type="checkbox" name="obj_status">
							</div>
						</div>
					</li>	
				<?php endforeach ?>
			</ul>
		</div>
		
	</div>
	
</div>
</div>

<script type="text/javascript">
	
	var ctx = document.getElementById("ctx").getContext("2d");
	var canvas = document.getElementById("ctx");
	code_area = document.getElementById("code_area");

	ctx.font = '30px Arial';

	var ctxWidth = canvas.width;
	var ctxHeight = canvas.height;

	var cmdNum = 0;
	
	var vrbls = [];
	var operations = [];
	var code_log = [];

	var zoomMultiplier = 0.75;
	var TILE_SIZE = 16;
	var isPaused = false;

	var collectedCoins = 0;
	var KilledBullies = 0;
	var used_if = false;
	var used_loop = false;
	var isFinished = false;


	var img = {};
	img.map = new Image();
	img.dialog = new Image();
	img.dialog.src = "<?php echo base_url(); ?>assets/images/BORDER-1.png";
	img.map.src = "<?php echo base_url(); ?>assets/images/levels/<?php echo $level_info['LVL_FILENAME'] ?>";
	img.player = new Image();
	img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/<?php echo $avatar['AVTR_SPRITE_FILENAME']?>";

	img.bully = new Image();
	img.bully.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-10.png";
	img.bullyThumb = new Image();
	img.bullyThumb.src = "";
	img.projectile = new Image();
	img.projectile.src = "<?php echo base_url(); ?>assets/images/projectile.png";

	document.getElementById('textarea1').value = '1';

	$("#code_area").keyup(function(event) {
        var code = code_area.value.split("\n");
        document.getElementById('textarea1').value = '';
        for(var i = 0; i < code.length; i++)
        {
        	document.getElementById('textarea1').value += (i+1) + "\n";
        }
        event.preventDefault();
	});

	function enableTab(id) {
    	var el = document.getElementById(id);
	    el.onkeydown = function(e) {
	        if (e.keyCode === 9) { // tab was pressed

	            // get caret position/selection
	            var val = this.value,
	                start = this.selectionStart,
	                end = this.selectionEnd;

	            // set textarea value to: text before caret + tab + text after caret
	            this.value = val.substring(0, start) + '\t' + val.substring(end);

	            // put caret at right position again
	            this.selectionStart = this.selectionEnd = start + 1;

	            // prevent the focus lose
	            return false;

	        }
	    };
	}
	
	enableTab('code_area');

	$("#obj_modal_btn").click(function() {
		document.getElementById('obj_modal').style.display = "block";
	});

	$("#obj_modal_close").click(function() {
		document.getElementById('obj_modal').style.display = "none";
	});

	testCollisionRectRect = function(rect1,rect2){
	return rect1.x <= rect2.x+rect2.width 
		&& rect2.x <= rect1.x+rect1.width
		&& rect1.y <= rect2.y + rect2.height
		&& rect2.y <= rect1.y + rect1.height;
	}

	isEndOfCode = function(commandNum) {

		var code_whole = code_area.value;
		var code = code_whole.split('\n');

		if(commandNum < code.length) {
			return true;
		} else {
			console.log("end of code");
			return false;
		}
	}

	executeCommand = function(commandNum) {

		var code_whole = code_area.value;
		var code = code_whole.split('\n');

		if(commandNum < code.length) {

			cmdLine = code[commandNum].trim();
			if(cmdLine == "") {
				console.log("blank line");
			} else if(/^(int|double|char|String|Boolean)\s+[A-Za-z][A-Za-z0-9_]*\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				tempLine = tempLine.replace(/\s+/g, " ");
				tempLine = tempLine.trim();

				var declareLine = tempLine.split(' ');

				var varInfo = {
					dataType: declareLine[0],
					var_identifier: declareLine[1],
				};

				vrbls.push(varInfo);

				code_log.push({
					type: "dec-var",
					var_info: varInfo,
				});


			} else if(/^(int|double|char|String|Boolean)\s+[A-Za-z][A-Za-z0-9_]*\s*=\s*[A-Za-z0-9_\W]+\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");

				var declareLine = tempLine.split(/=/i);
				declareLine[0] = declareLine[0].trim();
				
				var value = declareLine[1].trim();
				var var_info = declareLine[0].split(/\s+/g);

				console.log(var_info + " " + value);

				if(value) {

					var checkValObj = parseValue(var_info[0], value);

					if(checkValObj.status) {

						var valObj = parseValue(var_info[0], value);
						var tempValue = valObj.value;

						var varInfo = {
							dataType: var_info[0],
							var_identifier: var_info[1],
							var_value: tempValue,
						};

						vrbls.push(varInfo);

						code_log.push({
							type: "dec-var",
							var_info: varInfo,
						});
						
					} else {
						console.log("error: data type missmatch");
						return {status: false, message: "error: data type missmatch"};
					}
				} else {
					console.log("error: no value assigned");
					return {status: false, message: "error: no value assigned"};
				}
			} else if(/^(int|double|char|String|Boolean)\[\]\s+[A-Za-z][A-Za-z0-9_]*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				tempLine = tempLine.replace(/\s+/g, " ");
				tempLine = tempLine.trim();

				var declareLine = tempLine.split(' ');

				var arrInfo = {
					dataType: declareLine[0],
					var_identifier: declareLine[1],
				};

				vrbls.push(arrInfo);

				code_log.push({
					type: "dec-arr",
					var_info: arrInfo,
				});

			} else if(/^(int|double|char|String|Boolean)\[\]\s+[A-Za-z][A-Za-z0-9_]*\s*=\s*(\{[A-Za-z0-9,\"\'\s\.]*\}|new\s*(int|double|char|String|Boolean)\[[0-9]*\])\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				var declareLine = tempLine.split(/=/i);
				var isMismatch = false;

				for(var key in declareLine) {
					declareLine[key] = declareLine[key].trim();
				}

				var arrInfo = declareLine[0].split(/\s+/g);
				declareLine[1] = declareLine[1].replace(/\{/g, "[");
				declareLine[1] = declareLine[1].replace(/\}/g, "]");
				declareLine[1] = declareLine[1].replace(/\'/g, "\"");

				try {
					var arr_val = JSON.parse(declareLine[1]);
					
					for(var key in arr_val) {

						// console.log(arrInfo[0].replace(/[\[\]]/g, "") + " - " + arr_val[key].toString());

						if(/^String/i.test(arrInfo[0]) && (typeof arr_val[key] == "string")) {
							arr_val[key] = "\"" + arr_val[key] + "\"";
						} else if(/^char/i.test(arrInfo[0])  && (typeof arr_val[key] == "string")) {
							arr_val[key] = "\'" + arr_val[key] + "\'";
						}

						var checkValObj = parseValue(arrInfo[0].replace(/[\[\]]/g, ""), arr_val[key].toString());

						if(checkValObj.status == false) {
							isMismatch = true;
							break;
						} else {

							var valObj = parseValue(arrInfo[0].replace(/[\[\]]/g, ""), arr_val[key].toString());
							arr_val[key] = valObj.value;
						}
					}

					if(isMismatch) {
						console.log("error: dataType missmatch");
						return {status: false, message: "error: dataType missmatch"};
					} else {

						var arrayInfo = {
							dataType: arrInfo[0],
							var_identifier: arrInfo[1],
							var_value: arr_val,
						};

						vrbls.push(arrayInfo);

						code_log.push({
							type: "dec-arr",
							var_info: arrayInfo,
						});
					}
				} catch(err) {
					console.log("error: value assigned invalid");
					return {status: false, message: "error: value assigned invalid"};
				}

			} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*=\s*([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				var assignLine = tempLine.split(/=/i);

				var var1_identifier = assignLine[0].trim();
				var var2_identifier = assignLine[1].trim();

				console.log(var1_identifier + ", " + var2_identifier);

				if(isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, "")) && isVarExisting(var2_identifier.replace(/\[[0-9]*\]/g, ""))) {

					// if(/^[A-Za-z0-9]*\[\]$/i.test(var1_identifier) && /^[A-Za-z0-9]*\[\]$/i.test(var2_identifier)) {
						
					// } else {
					// 	console.log("invalid");
					// }
					
					var var1 = isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, ""));
					var var2 = isVarExisting(var2_identifier.replace(/\[[0-9]*\]/g, ""));

					var valToTrans;

					if(/\[[0-9]*\]/g.test(var2_identifier) && /\[\]/g.test(var2.dataType)) {
						
						var var2_arrIndex = getConditions(var2_identifier, '[', ']');
						valToTrans = var2.var_value[var2_arrIndex];
						console.log(valToTrans);	
					} else {
						valToTrans = var2.var_value
						console.log(valToTrans);
					}

					if(/\[[0-9]*\]/g.test(var1_identifier) && /\[\]/g.test(var1.dataType)) {

						var var1_arrIndex = getConditions(var1_identifier, '[', ']');
						var1.var_value[var1_arrIndex] = valToTrans;
					} else {
						var1.var_value = valToTrans;
					}

					console.log(var1);
					console.log(var2);

					// if(var1.dataType == var2.dataType) {
					// 	var1.var_value = var2.var_value;

					// 	console.log(var1);
					// 	console.log(var2);
					// } else {
					// 	console.log("error: cannot implicitly convert " + var2.dataType + " value to " + var1.dataType);
					// }

				} else {
					console.log(var1_identifier + " or " + var2_identifier + " variable does not exist");
					return {status: false, message: var1_identifier + " or " + var2_identifier + " variable does not exist"};
				}


			} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*=\s*([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*[\+\-*/]\s*([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\]);$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				var opLine = tempLine.split(/=/i);
				
				var save_to = opLine[0].trim();
				var opp = /[\+\-*/]/g.exec(opLine[1]);

				var varList = opLine[1].split(/[\+\-*/]/g);

				var var_1 = varList[0].trim();
				var var_2 = varList[1].trim();

				// console.log(save_to + " = " + var_1 + " " + opp[0] + " " + var_2);

				if(isVarExisting(save_to.replace(/\[[0-9]*\]/g, "")) && isVarExisting(var_1.replace(/\[[0-9]*\]/g, "")) && isVarExisting(var_2.replace(/\[[0-9]*\]/g, ""))) {

					var var_1_obj = isVarExisting(var_1.replace(/\[[0-9]*\]/g, ""));
					var var_2_obj = isVarExisting(var_2.replace(/\[[0-9]*\]/g, ""));
					var save_to_obj = isVarExisting(save_to.replace(/\[[0-9]*\]/g, ""));

					var var_1_value = "";
					var var_2_value = "";

					// console.log(var_1_obj);
					// console.log(var_2_obj);
					// console.log(save_to_obj);

					if(Array.isArray(var_1_obj.var_value)) {

						if(/\[[0-9]*\]/g.test(var_1)) {

							var arrIndex = getConditions(var_1, '[', ']');
							if(var_1_obj.var_value[arrIndex]) {
								
								var_1_value = {dataType: var_1_obj.dataType.replace(/[\[\]]/g, ""), value: var_1_obj.var_value[arrIndex]};
							} else {
								return {status: false, message: "index out of range"};
							}

						} else {
							return {status: false, message: "indicate array index"};
						}
					} else {

						if(/\[[0-9]*\]/g.test(var_1)) {
							return {status: false, message: "variable is not an array"};
						} else {
							var_1_value = {dataType: var_1_obj.dataType, value: var_1_obj.var_value};
						}
					}

					if(Array.isArray(var_2_obj.var_value)) {

						if(/\[[0-9]*\]/g.test(var_2)) {

							var arrIndex = getConditions(var_2, '[', ']');
							if(var_2_obj.var_value[arrIndex]) {
								
								var_2_value = {dataType: var_2_obj.dataType.replace(/[\[\]]/g, ""), value: var_2_obj.var_value[arrIndex]};
							} else {
								return {status: false, message: "index out of range"};
							}

						} else {
							return {status: false, message: "indicate array index"};
						}
					} else {

						if(/\[[0-9]*\]/g.test(var_2)) {
							return {status: false, message: "variable is not an array"};
						} else {
							var_2_value = {dataType: var_2_obj.dataType, value: var_2_obj.var_value};
						}
					}

					// console.log(var_1_value);
					// console.log(var_2_value);

					// console.log(doOperation(opp, var_1_value, var_2_value));
					var opRes = doOperation(opp, var_1_value, var_2_value);

					if(opRes.status) {

						if(Array.isArray(save_to_obj.var_value)) {

							if(/\[[0-9]*\]/g.test(save_to)) {

								var arrIndex = getConditions(var_2, '[', ']');
								if(save_to_obj.var_value[arrIndex]) {

										var assign_param = {
											saveTo_index: arrIndex,
											dataType: opRes.dataType,
											value: opRes.value,
										};

										save_to_obj = assignValueToVar(save_to_obj, assign_param);

								} else {
									return {status: false, message: "index out of range"};
								}

							} else {
								return {status: false, message: "variable is not an array"};
							}

						} else {

							if(/\[[0-9]*\]/g.test(save_to)) {
								return {status: false, message: "variable is not an array"};
							} else {
								
								var assign_param = {
									dataType: opRes.dataType,
									value: opRes.value,
								};

								save_to_obj = assignValueToVar(save_to_obj, assign_param);
							}
						}

						console.log(save_to_obj);

						for(var key in vrbls) {

							if(vrbls[key].var_identifier == save_to_obj.var_identifier) {

								vrbls[key] = save_to_obj;
								break;
							}
						}

						code_log.push({
							type: "op",
							op_info: {
								save_to: save_to,
								operation: opp[0],
								var_1: var_1,
								var_2: var_2,
							},
						});

						console.log(vrbls);

					} else {
						return opRes;
					}

				} else {
					return {status: false, message: "variable does not exist"};
				}

			} else {
				console.log("error");
				return {status: false, message: "syntax error"};
			}

			return {status: true, message: "execution was successful"};
		}
	}

	runCode = function() {

		vrbls = [];
		var hasErrors = false;

		cmdNum = 0;

		if(player.isEnemyInRange()) {

			var bullyId = player.isEnemyInRange();

			do {
				
				var exec_status = executeCommand(cmdNum);

				if(!exec_status.status) {
					console.log(exec_status.message);
					hasErrors = true;
					break;
				} else {
					cmdNum++;
				}

			} while(isEndOfCode(cmdNum));

			console.log(code_log);

			for(var key in Question.list) {

				if(Question.list[key].bully == bullyId) {
					if(Question.list[key].isAsked) {
						if(Question.list[key].status == "current question") {
							
							if(!hasErrors) {

								var answers = Question.list[key].answer;
								var ansCount = 0;
								var correctAns = 0;

								if(answers.variables && answers.operations) {
									ansCount = answers.operations.length + answers.variables.length;
								} else if(answers.variables) {
									ansCount = answers.variables.length;
								} else if(answers.operations) {
									ansCount = answers.operations.length;
								}

								if(answers.variables) {

									for(var akey in answers.variables) {

										if(/\[\]/g.test(answers.variables[akey].dataType)) {

											if(code_log.length > 0) {

												for(var key in code_log) {

													if(code_log.type == "dec-var" || code_log.type == "dec-arr") {

														
													}
												}
											}

											// for(vkey in vrbls) {

											// 	if(answers.variables[akey].dataType == vrbls.variables[vkey].dataType && answers.variables[akey].var_identifier == vrbls[vkey].var_identifier && answers.variables[akey].var_value.length == vrbls[vkey].var_value.length) {

											// 		var arrVal = answers.variables[akey].var_value;

											// 		var isWrongVal = false;
											// 		var arrIndexCtr = 0;

											// 		do {

											// 			if(!(arrVal[arrIndexCtr] == vrbls[vkey].var_value[arrIndexCtr])) {
											// 				isWrongVal = true;
											// 			} else {
											// 				arrIndexCtr++;
											// 			}

											// 		} while((vrbls[vkey].var_value.length > arrIndexCtr) && !isWrongVal);

											// 		if(!isWrongVal) {
											// 			correctAns++;
											// 		}
											// 	}
											// }
										} else {

											for(var vkey in vrbls) {

												if(answers.variables[akey].dataType == vrbls[vkey].dataType && answers.variables[akey].var_identifier == vrbls[vkey].var_identifier && answers.variables[akey].var_value == vrbls[vkey].var_value) {

													correctAns++;
												}
											}
										}
									}

								}

								// if(answers.operations) {

								// 	for(var okey in answers.operations) {


								// 	}
								// }

								if(ansCount <= correctAns) {
									Question.list[key].status = "correct";
									Projectile.generate(player, "right");
								} else {
									Question.list[key].status = "wrong";
									Projectile.generate(Bully.list[bullyId], "left");
								}

							} else {
								Question.list[key].status = "wrong";
								Projectile.generate(Bully.list[bullyId], "left");
							}

							Question.closeDialog();
							vrbls = [];
							code_log = [];

							var questionStat = Question.statusCheck(bullyId);

							if(questionStat.total_questions == (questionStat.correct_ans + questionStat.wrong_ans)) {
								console.log("here");
								player.currentQuestion = {};
							} else {
								player.currentQuestion.questionNum++;
							}
						}
					}
				}
			}


		}		

	}

	getConditions = function(statement, terminator1, terminator2) {

		var startIndex = 0;
		var lastIndex = 0;

		do {
			
			if(statement.indexOf(terminator2, startIndex) != -1) {
				lastIndex = statement.indexOf(terminator2, startIndex);
			}

			startIndex = statement.indexOf(terminator2, startIndex) + 1;

		} while(startIndex != 0);

		return statement.substr(statement.indexOf(terminator1) + 1, lastIndex - (statement.indexOf(terminator1) + 1));
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
				value = value.replace(/\'/g, "");
				return {status: true, value: value};
			} else {
				return {status: false, message: "value is not a character"};
			}
		} else if(dataType == "String") {

			if(/^\".*\"$/i.test(value)) {
				value = value.replace(/\"/g, "");
				return {status: true, value: value};
			} else {
				return {status: false, message: "value is not a String"};
			}
		} else if(dataType == "Boolean") {

			value = value.toLowerCase();
			if(/^(true|false)$/i.test(value)) {
				return {status: true, value: value};
			} else {
				return {status: false, message: "value is not a Boolean"};
			}
		}
	}

	assignValueToVar = function(saveTo_obj, assignParams) {

		var saveTo_dataType = saveTo_obj.dataType.replace(/[\[\]]/g, "");

		// if(Array.isArray(saveTo_obj.var_value)) {

			if(saveTo_dataType == "int" || saveTo_dataType == "String" || saveTo_dataType == "char" || saveTo_dataType == "Boolean") {

				if(assignParams.dataType == saveTo_dataType) {

					if(Array.isArray(saveTo_obj.var_value)) {
						saveTo_obj.var_value[assignParams.saveTo_index] = assignParams.value;
					} else {
						saveTo_obj.var_value = assignParams.value;
					}

					return saveTo_obj;
				} else {
					return {status: false, message: "cannot convert " + assignParams.dataType + " to " + saveTo_dataType};
				}

			} else if(saveTo_dataType == "double") {

				if(assignParams.dataType == "double") {

					if(Array.isArray(saveTo_obj.var_value)) {
						saveTo_obj.var_value[assignParams.saveTo_index] = assignParams.value;
					} else {
						saveTo_obj.var_value = assignParams.value;
					}

					return saveTo_obj;
				} else if(assignParams.dataType == "int") {
					
					if(Array.isArray(saveTo_obj.var_value)) {
						saveTo_obj.var_value[assignParams.saveTo_index] = parseFloat(assignParams.value);
					} else {
						saveTo_obj.var_value = parseFloat(assignParams.value);
					}

					return saveTo_obj;
				} else {
					return {status: false, message: "cannot convert " + assignParams.dataType + " to " + saveTo_dataType};
				}
			}
		// }

	}

	isVarExisting = function(var_identifier) {

		for(var key in vrbls) {

			var cmp_identifier = "";

			// if(/\[\]$/g.test(vrbls[key].dataType)) {
			// 	cmp_identifier = vrbls[key].var_identifier + "[]";
			// } else {
			// 	cmp_identifier = vrbls[key].var_identifier;
			// }

			if(vrbls[key].var_identifier == var_identifier) {
				return vrbls[key];
			}
		}

		return false;
	}

	doOperation = function(operation, val1, val2) {

		if(operation == "+") {

			if(val1.dataType == "int") {

				if(val2.dataType == "int" || val2.dataType == "String" || val2.dataType == "double") {
					return {status: true, value: (val1.value + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value + val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "double") {

				if(val2.dataType == "int" || val2.dataType == "String" || val2.dataType == "double") {
					return {status: true, value: (val1.value + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value + val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "String") {
				return {status: true, value: (val1.value + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
			} else if(val1.dataType == "char") {

				if(val2.dataType == "String") {
					return {status: true, value: (val1.value + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "int" || val2.dataType == "double") {
					// return val1.value.charCodeAt(0);
					return {status: true, value: (val1.value.charCodeAt(0) + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value.charCodeAt(0) + val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "Boolean") {

				if(val2.dataType == "String") {
					return {status: true, value: (val1.value + val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			}

		} else if(operation == "-") {

			if(val1.dataType == "int") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value - val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value - val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "double") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value - val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value - val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "String") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			} else if(val1.dataType == "char") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value.charCodeAt(0) - val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value.charCodeAt(0) - val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "Boolean") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			}

		} else if(operation == "*") {

			if(val1.dataType == "int") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value * val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value * val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "double") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value * val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value * val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "String") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			} else if(val1.dataType == "char") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value.charCodeAt(0) * val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value.charCodeAt(0) * val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "Boolean") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			}

		} else if(operation == "/") {

			if(val1.dataType == "int") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value / val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value / val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "double") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value / val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value / val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "String") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			} else if(val1.dataType == "char") {

				if(val2.dataType == "int" || val2.dataType == "double") {
					return {status: true, value: (val1.value.charCodeAt(0) / val2.value), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else if(val2.dataType == "char") {
					return {status: true, value: (val1.value.charCodeAt(0) / val2.value.charCodeAt(0)), dataType: parseOpResult(val1.dataType, val2.dataType)};
				} else {
					return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
				}
			} else if(val1.dataType == "Boolean") {
				return {status: false, message: "datatype missmatch, invalid operation for datatypes " + val1.dataType + " and " + val2.dataType + "."};
			}

		}
	}

	parseOpResult = function(dataType_1, dataType_2) {

		if(dataType_1 == "int") {

			if(dataType_2 == "double") {
				return "double";
			} else if(dataType_2 == "String") {
				return "String";
			} else if(dataType_2 == "int") {
				return "int";
			} else if(dataType_2 == "char") {
				return "int";
			}
		} else if(dataType_1 == "double") {

			if(dataType_2 == "double") {
				return "double";
			} else if(dataType_2 == "String") {
				return "String";
			} else if(dataType_2 == "int") {
				return "double";
			} else if(dataType_2 == "char") {
				return "double";
			}
		} else if(dataType_1 == "String") {

			return "String";
		} else if(dataType_1 == "char") {

			if(dataType_2 == "String") {
				return "String";
			} else if(dataType_2 == "char") {
				return "int";
			} else if(dataType_2 == "int") {
				return "int";
			} else if(dataType_2 == "double") {
				return "double";
			}
		} else if(dataType_1 == "Boolean") {

			if(dataType_2 == "String") {
				return "String";
			}
		}

		return false;
	}

	// document.onkeydown = function(event){
	// 	if(event.keyCode === 68)	//d
	// 		player.pressingRight = true;
	// 	else if(event.keyCode === 83)	//s
	// 		player.pressingDown = true;
	// 	else if(event.keyCode === 65) //a
	// 		player.pressingLeft = true;
	// 	else if(event.keyCode === 87) // w
	// 		player.pressingUp = true;
			
	// 	else if(event.keyCode === 80) //p
	// 		paused = !paused;
	// }

	// document.onkeyup = function(event){
	// 	if(event.keyCode === 68)	//d
	// 		player.pressingRight = false;
	// 	else if(event.keyCode === 83)	//s
	// 		player.pressingDown = false;
	// 	else if(event.keyCode === 65) //a
	// 		player.pressingLeft = false;
	// 	else if(event.keyCode === 87) // w
	// 		player.pressingUp = false;
	// }

	// isEnemyInRange = function() {

	// 	for(var key in Bully.list) {

	// 		if((player.x))
	// 	}
	// }

	Objective = function(id, status, desc, task, points)
	{
		var self = {
			id: id,
			status: status,
			description: desc,
			task: task,
			points: points,
		};

		Objective.list[id] = self;
	}

	Objective.list = {};

	Objective.init = function() {

		var promise = new Promise(function(resolve, reject) {

			var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>Game/get_objectives',
				data: {lvlId: lvlId},
				dataType: 'json',
				success: function(res) {
					resolve(res);
				},
				error: function(err) {
					console.log(err);
				}
			}).then(function(result) {

				if(result.status) {
					var objectives_list = result['objectives_list'];

					for(var key in objectives_list) {

						var taskObj = {};
						var jsonObj = JSON.parse(objectives_list[key].OBJ_JSONVAL);
						var objKey = Object.keys(jsonObj);

						if(objKey[0] == "Finish") {

							if(jsonObj['Finish'] == "True") {
								taskObj = {finish: true};
							} else {
								taskObj = {finish: false};
							}
						} else if(objKey[0] == 'Defeat Bullies') {

							taskObj = {defeat_bullies: parseInt(jsonObj['Defeat Bullies'])};

						} else if(objKey[0] == 'Use command') {

							taskObj = {use_command: jsonObj['Use command']};

						} else if(objKey[0] == 'Collect Coins') {

							taskObj = {collect_coins: parseInt(jsonObj['Collect Coins'])};

						} else if(objKey[0] == 'Health') {

							var healthPerc = parseFloat(parseInt(jsonObj['Health'])/100);
							taskObj = {health: healthPerc};
						}
						


						Objective('obj_' + objectives_list[key].OBJ_NUM, false, objectives_list[key].OBJ_DESC, taskObj, parseInt(objectives_list[key].OBJ_POINTS));
					}

					console.log(Objective.list);
				} else {
					console.log(result.message);
				}
			});
		});
	}

	Objective.update = function() {

		for(var key in Objective.list) {

			var objKey = Object.keys(Objective.list[key].task);

			if(objKey == 'health') {

				var hpPerc = (player.hp / player.hpMax);

				// console.log(hpPerc + " - " + Objective.list[key].task.health);
				
				if(hpPerc >= Objective.list[key].task.health) {
					Objective.list[key].status = true;
					document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
				} else {
					Objective.list[key].status = false;
					$("#" + Objective.list[key].id + "_status").removeAttr('checked');
				}
			} else if(objKey == 'collect_coins') {

				if(collectedCoins == Objective.list[key].task.collect_coins) {
					Objective.list[key].status = true;
					document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
				}
			} else if(objKey == 'defeat_bullies') {

				if(KilledBullies >= Objective.list[key].task.defeat_bullies) {
					Objective.list[key].status = true;
					document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
				}
			} else if(objKey == 'use_command') {

				if(Objective.list[key].task.use_command == 'Loop') {
					if(used_loop) {
						Objective.list[key].status = true;
						document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
					}
				}

				if(Objective.list[key].task.use_command == 'If') {
					if(used_if) {
						Objective.list[key].status = true;
						document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
					}
				}
			} else if(objKey == 'finish') {
				if(isFinished) {
					Objective.list[key].status = true;
					document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
				}
			}
			
		}
	}

	Objective.computeScore = function() {

		var totalScore = 0;
		var perfect_score = 0;
		var score_perc = 0;

		for(var key in Objective.list) {

			perfect_score += Objective.list[key].points;

			if(Objective.list[key].status) {
				totalScore += Objective.list[key].points;
			}
		}

		score_perc = parseFloat((totalScore/perfect_score)*100);

		console.log("Perfect Score: " + perfect_score + ", Your Score: " + totalScore + ", Score Percent: " + score_perc);

		// if(score_perc < 50 && score_perc > 0) {
		// 	$("#star1").attr("checked", true);
		// } else if(score_perc >= 50 && score_perc < 100) {
		// 	$("#star2").attr("checked", true);
		// } else if(score_perc == 100) {
		// 	$("#star3").attr("checked", true);
		// } else {
		// 	$("#star1").addClass("no-score");
		// 	$("#star2").addClass("no-score");
		// 	$("#star3").addClass("no-score");
		// }


			if(score_perc < 50 && score_perc > 0) {
				$("#star1").attr("checked", true);
				$("#star1").addClass("s1");
				$("#star2").addClass("no-score u2");
				$("#star3").addClass("no-score u3");
			} else if(score_perc >= 50 && score_perc < 100) {
				$("#star1").attr("checked", true);
				$("#star1").addClass("s1");
				$("#star2").attr("checked", true);
				$("#star2").addClass("s2");
				$("#star3").addClass("no-score u2");

			} else if(score_perc == 100) {
				$("#star1").attr("checked", true);
				$("#star1").addClass("s1");
				$("#star2").attr("checked", true);
				$("#star2").addClass("s2");
				$("#star3").attr("checked", true);
				$("#star3").addClass("s3");
			} else {
				$("#star1").addClass("no-score u1");
				$("#star2").addClass("no-score u2");
				$("#star3").addClass("no-score u3");
			}

		return totalScore;
	}

	Objective.recordScore = function() {

		var aquiredScore = Objective.computeScore();
		var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

		var data = {
			lvl_id: lvlId,
			total_score: aquiredScore
		}

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url(); ?>Game/record_progress',
			data: data,
			dataType: 'json',
			success: function(res) {
				console.log(res);
			},
			error: function(err) {
				console.log(err);
			}
		});
	}

	Player = function(id, imgSrc, width, height, x, y, hpMax) {

		var self = {
			id: id,
			img: new Image(),
			width: width,
			height: height,
			x: x,
			y: y,
			hpMax: hpMax,
			hp: hpMax,
			moveCtr: 0,
			type: "player",
			currentQuestion: {},
		}

		self.img.src = imgSrc;

		self.pressingUp = false;
		self.pressingDown = false;
		self.pressingRight = false;
		self.pressingLeft = false;

		self.spriteAnimCtr = 0;

		self.update = function() {

			if(self.hp <= 0) {
				isPaused = true;
				$("#lose-modal").css("display", "block");
			}

			if (self.pressingRight || self.pressingLeft || self.pressingDown || self.pressingUp) 
			{
				self.spriteAnimCtr += 0.25;
				self.moveCtr += 3 * zoomMultiplier;
			} else {
				self.spriteAnimCtr = 0;
			}

			if(self.isEnemyInRange()) {

				var bullyId = self.isEnemyInRange();
				var question_id = "";

				if(self.currentQuestion.questionNum && self.currentQuestion.bully == bullyId) {
					question_id = self.currentQuestion.bully + "_" + self.currentQuestion.questionNum;
				} else {
					console.log("set new bully");
					self.currentQuestion = {bully: bullyId, questionNum: 1};
					question_id = self.currentQuestion.bully + "_" + self.currentQuestion.questionNum;
				}

				if (Question.list[self.currentQuestion.bully + "_" + self.currentQuestion.questionNum] && !Question.list[question_id].isAsked && Question.list[question_id].status == "not answered") {

					// var question_id = self.currentQuestion.bully + "_" + self.currentQuestion.questionNum;

					// if(!Question.list[question_id].isAsked) {
						
						// if(Question.list[question_id].status == "not answered") {
								
								Question.list[question_id].showQuestion();
								Question.list[question_id].isAsked = true;
								Question.list[question_id].status = "current question";
						// }
					// }
				} else if(Bully.list[bullyId].hp >= 0) {

					var questions_status = Question.statusCheck(bullyId);
					// console.log(questions_status);

					if((questions_status.total_questions == (questions_status.wrong_ans + questions_status.correct_ans)) && (questions_status.wrong_ans > 0)) {

						Bully.list[bullyId].exit();
					}
				}

			} else {

				self.pressingRight = true;
			}

			self.updatePosition();
			self.draw();

			
		}

		self.updatePosition = function() {

			var actHeight = self.height/2 * zoomMultiplier;
			var actWidth = self.width/2 * zoomMultiplier;

			var topBumper = {x: self.x, y: self.y - actHeight};
			var bottomBumper = {x: self.x, y: self.y + actHeight};
			var leftBumper = {x: self.x - actWidth, y: self.y};
			var rightBumper = {x: self.x + actWidth, y: self.y};

			if( (Maps.current.isPossitionWall(topBumper) === 4) || (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(bottomBumper) === 4) || (Maps.current.isPossitionWall(rightBumper) === 4)) {

				console.log("exit");
				isPaused = true;
				isFinished = true;

			} else {

				if(self.moveCtr <= (96 * zoomMultiplier)) {
				
					if(self.pressingUp)
						self.y -= (3);
					if(self.pressingDown)
						self.y += (3);
					if(self.pressingLeft)
						self.x -= (3);
					if(self.pressingRight)
						self.x += (3);
				} else {

					self.pressingUp = false;
					self.pressingDown = false;
					self.pressingRight = false;
					self.pressingLeft = false;

					self.moveCtr = 0;
				}
			}
		}

		self.draw = function() {

			var x = (ctxWidth/2 - self.width/2) - 80;
			var y = ctxHeight/2 - self.height/2;

			var frameWidth = self.img.width/4;
			var frameHeight = self.img.height/4;

			var directionMod = 0;
			var walkingMod = Math.floor(self.spriteAnimCtr) % 4;

			if(self.pressingUp)
				directionMod = 3;
			if(self.pressingLeft)
				directionMod = 1;
			if(self.pressingRight)
				directionMod = 2;

			ctx.drawImage(self.img, walkingMod * frameWidth, directionMod * frameHeight, self.img.width/4, self.img.height/4, x, y, self.width * zoomMultiplier, self.height  * zoomMultiplier);
		}

		self.isEnemyInRange = function() {
			
			for(var key in Bully.list) {

				if(Bully.list[key].x === self.x) {
					if(((self.y - Bully.list[key].y) <= 120) && ((self.y - Bully.list[key].y) > 0)) {
						return Bully.list[key].id;
					} else if(((self.y - Bully.list[key].y) >= -120) && ((self.y - Bully.list[key].y) < 0)) {
						return Bully.list[key].id;
					}
				} else if(Bully.list[key].y === self.y) {
					if(((self.x - Bully.list[key].x) <= 120) && ((self.x - Bully.list[key].x) > 0)) {
						return Bully.list[key].id;
					} else if(((self.x - Bully.list[key].x) >= -120) && ((self.x - Bully.list[key].x) < 0)) {
						return Bully.list[key].id;
					}
				} else {
					return false;
				}
			}

			return false;
		}

		self.interact = function() {

		}

		return self;
	}

	Bully = function(id, name, imgSrc, imgThumb, height, width, x, y, hpMax) {

		var self = {
			id: id,
			img: new Image(),
			thumb: new Image(),
			height: height,
			width: width,
			x: x,
			y: y,
			name: name,
			hpMax: hpMax,
			hp: hpMax,
			type: "bully",
			toRemove: false,
		}

		self.pressingUp = false;
		self.pressingDown = false;
		self.pressingRight = false;
		self.pressingLeft = false;

		self.spriteAnimCtr = 0;

		self.img.src = imgSrc;
		self.thumb.src = imgThumb;

		self.update = function() {

			if (self.pressingRight || self.pressingLeft || self.pressingDown || self.pressingUp) 
			{
				self.spriteAnimCtr += 0.25;
				self.moveCtr += 6 * zoomMultiplier;
			} else {
				self.spriteAnimCtr = 0;
			}

			self.updatePosition();
			self.draw();

			if(self.hp <= 0) {
				self.toRemove = true;
				KilledBullies++;
			}
		}


		self.draw = function() {

			var x = (ctxWidth/2 - player.x) - 80;
			var y = ctxHeight/2 - player.y;

			x += self.x - self.width/2;
			y += self.y - self.height/2;

			var frameWidth = self.img.width/4;
			var frameHeight = self.img.height/4;

			var directionMod = 0;
			var walkingMod = Math.floor(self.spriteAnimCtr) % 4;

			if(self.pressingUp) {
				directionMod = 3;
			} else if(self.pressingDown) {
				directionMod = 0;
			} else if(self.pressingRight) {
				directionMod = 2;
			} else if(self.pressingLeft) {
				directionMod = 1;
			} else {
				var diffX = player.x - self.x;
				var diffY = player.y - self.y;

				var angleToUser = Math.atan2(diffY,diffX) / Math.PI * 180;

				if(angleToUser < 0)
					angleToUser = 360 + angleToUser;

				var directionMod = 2; // right

				if(angleToUser >= 45 && angleToUser < 135) // down
					directionMod = 0;
				if(angleToUser >= 135 && angleToUser < 225) // left
					directionMod = 1;
				if(angleToUser >= 225 && angleToUser < 315) // up
					directionMod = 3;
			}

			ctx.drawImage(self.img, frameWidth * walkingMod, frameHeight * directionMod, frameWidth, frameHeight, x, y, self.width  * zoomMultiplier, self.height  * zoomMultiplier);

			var HPx = x + self.width/2;
			var HPy = y;

			ctx.fillStyle = 'red';
			var width = 50 * (self.hp / self.hpMax);

			if(width < 0)
			{
				width = 0;
			}

			ctx.fillRect(HPx-28, HPy-10, width, 6);
			ctx.strokeStyle = 'black';
			ctx.strokeRect(HPx-28, HPy-10, 50, 6);

			ctx.restore();
		}

		self.updatePosition = function() {

			var actHeight = self.height/2 * zoomMultiplier;
			var actWidth = self.width/2 * zoomMultiplier;

			var topBumper = {x: self.x, y: self.y - actHeight};
			var bottomBumper = {x: self.x, y: self.y + actHeight};
			var leftBumper = {x: self.x - actWidth, y: self.y};
			var rightBumper = {x: self.x + actWidth, y: self.y};

			if( (Maps.current.isPossitionWall(topBumper) === 4) || (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(bottomBumper) === 4) || (Maps.current.isPossitionWall(rightBumper) === 4)) {

				self.toRemove = true;
				// console.log("exit");
			}

				if(self.pressingUp)
					self.y -= (6);
				if(self.pressingDown)
					self.y += (6);
				if(self.pressingLeft)
					self.x -= (6);
				if(self.pressingRight)
					self.x += (6);
		}

		self.exit = function() {

			self.pressingRight = true;
		}

		Bully.list[id] = self;
	}

	Bully.list = {};

	Bully.generate = function(id, name, imgSrc, imgThumb, height, width, x, y, hpMax) {

		// var newId = "Bully_" + Math.random();

		Bully(id, name, imgSrc, imgThumb, height, width, x, y, hpMax);
	}

	Bully.init = function() {

		var promise = new Promise(function(resolve, reject) {

			var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Game/get_bully_list",
				data: {lvlId: lvlId},
				dataType: 'json',
				success: function(res) {
					resolve(res);
				},
				error: function(err) {
					console.log("failed to retreive bully data");
				}
			}).then(function(result) {

				if(result['status']) {
					// console.log(result['bully_list'][0].BLY_SPAWNPOINT);

					var bully_list = result['bully_list'];

					for(var key in bully_list) {

						var bully_spawn = JSON.parse(bully_list[key].BLY_SPAWNPOINT);

						img.bully.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/" + bully_list[key].BLY_IMAGEURL;
						img.bullyThumb.src = "<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/" + bully_list[key].BLY_THUMB_FILENAME;

						Bully.generate(bully_list[key].BLY_ID, bully_list[key].BLY_NAME, img.bully.src, img.bullyThumb.src, img.bully.height/4, img.bully.width/4, bully_spawn[0], bully_spawn[1], parseInt(bully_list[key].BLY_MAXHP));
					}

				} else {
					console.log(result['message']);
				}
			});
		});
	}

	Bully.update = function() {

		for(var key in Bully.list) {

			Bully.list[key].update();

			if(Bully.list[key].toRemove) {
				delete Bully.list[key];
			}
		}
	}

	Projectile = function(id, imgSrc, type, x, y, dir) {

		var self = {
			id: id,
			img: new Image(),
			type: type,
			x: x,
			y: y,
			direction: dir,
			timer: 0,
			toRemove: false,
			height: 20,
			width: 20,
		}

		self.img.src = imgSrc;

		self.update = function() {

			self.updatePosition();
			self.draw();

			if(self.type === "bully")
			{
				if(self.testCollision(player))
				{
					self.toRemove = true;
					player.hp -= 1;

					var hpPercent = (player.hp/player.hpMax)*100;

					$(".player-hp-bar").css("width", hpPercent + "%");
				}
			}

			if(self.type === "player")
			{
				for(var key in Bully.list)
				{
					if(self.testCollision(Bully.list[key]))
					{
						self.toRemove = true;
						Bully.list[key].hp -= 1;
					}
				}
			}

			self.timer++;

			if(self.timer > 20)
				self.toRemove = true;
			// if(Maps.current.isPossitionWall(self) === 5)
			// 	self.toRemove = true;
		}

		self.draw = function() {

			var x = (ctxWidth/2 - player.x) - 80;
			var y = ctxHeight/2 - player.y;

			x += (self.x - self.width/2);
			y += (self.y - self.height/2);

			ctx.drawImage(self.img, 0, 0, self.img.width, self.img.height, x, y, self.width * zoomMultiplier, self.height * zoomMultiplier);
		}

		self.updatePosition = function() {

			if(self.direction === "up")
				self.y -= 8;
			if(self.direction === "down")
				self.y += 8;
			if(self.direction === "left")
				self.x -= 8;
			if(self.direction === "right")
				self.x += 8;
		}

		self.testCollision = function(entity2){	//return if colliding (true/false)
			var rect1 = {
				x:self.x-self.width/2,
				y:self.y-self.height/2,
				width:self.width,
				height:self.height,
			}
			var rect2 = {
				x:entity2.x-entity2.width/2,
				y:entity2.y-entity2.height/2,
				width:entity2.width,
				height:entity2.height,
			}
			return testCollisionRectRect(rect1,rect2);
		}

		Projectile.list[id] = self;
	}

	Projectile.list = {};

	Projectile.update = function() {

		for(var key in Projectile.list)
		{
			Projectile.list[key].update();
			
			if(Projectile.list[key].toRemove == true)
				delete Projectile.list[key];
		}
	}

	Projectile.generate = function(actor, direction) {
		var x = actor.x;
		var y = actor.y;

		var id = Math.random();
		var type = actor.type;

		Projectile(id, img.projectile.src, type, x, y, direction);
	}

	Question = function(id, qstnType, qstnNum, bullyId, dialog, answer) {

		// id, qstnNum, bullyId, dialog, answer

		var self = {
			id: id,
			// thumb: new Image(),
			qstnType: qstnType,
			qstnNum: qstnNum,
			bully: bullyId,
			dialog: dialog,
			answer: answer,
			isAsked: false,
			status: "not answered",
		}

		self.draw = function() {
			//DIALOG
			// ctx.drawImage(img.dialog,0,0,img.dialog.width,img.dialog.height, 10, 10,img.dialog.width,img.dialog.height);
			// Console.log(img.dialog);
		}

		self.showQuestion = function() {

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Game/display_dialog",
				data: {dialog: self.dialog, bully_thumb: Bully.list[self.bully].thumb.src, bully_name: Bully.list[self.bully].name},
				success: function(res) {
					$('.dialog-container').html(res);
				},
				error: function(err) {
					console.log("cannot display dialog due to some error");
				}
			});
		}

		Question.list[id] = self;
	}

	Question.list = {};

	Question.init = function() {

		var promise = new Promise(function(resolve, reject) {

			var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

			$.ajax({
				type: 'post',
				url: "<?php echo base_url() ?>Game/get_question_list",
				data: {lvlId: lvlId},
				dataType: 'json',
				success: function(res) {
					// console.log(res),
					resolve(res);
				},
				error: function(err) {
					console.log("failed to retreive question list due to some error");
				}
			}).then(function(result) {

				if(result.status) {
					// console.log(result.question_list);

					var question_list = result.question_list;

					for(var key in question_list) {

						var questionId = question_list[key].BLY_ID + "_" + question_list[key].QSTN_NUM;

						var answers = JSON.parse(question_list[key].QSTN_ANSWER);

						// console.log(answers);

						if(answers.variables) {

							for(var akey in answers.variables) {

								if(/\[\]/g.test(answers.variables[akey].dataType)) {
									
									var arrValue = answers.variables[akey].var_value;

									for(var vkey in arrValue) {

										var valObj = parseValue(answers.variables[akey].dataType.replace(/[\[\]]/g, ""), arrValue[vkey]);

										arrValue[vkey] = valObj.value;
									}

									answers.variables[akey].var_value = arrValue;

								} else {
									
									var valObj = parseValue(answers.variables[akey].dataType, answers.variables[akey].var_value);
									answers.variables[akey].var_value = valObj.value;
								}
							}
						}

						// if(question_list[key].QSTN_TYPE == "variable") {

						// 	var answers = JSON.parse(question_list[key].QSTN_ANSWER);

						// 	for(var akey in answers) {
						// 		answers[akey].var_value = parseValue(answers[akey].dataType, answers[akey].var_value);
						// 	}

						// 	// console.log(answers);
						// } else if(question_list[key].QSTN_TYPE == "array") {

						// 	var answers = JSON.parse(question_list[key].QSTN_ANSWER);

						// 	for(var akey in answers) {

						// 		var arrValue = answers[akey].var_value;

						// 		for(var vkey in arrValue) {

						// 			arrValue[vkey] = parseValue(answers[akey].dataType.replace(/[\[\]]/g, ""), arrValue[vkey]);
						// 		}

						// 		answers[akey].var_value = arrValue;
						// 	}

						// 	// console.log(answers);
						// }

						Question(questionId, question_list[key].QSTN_TYPE, parseInt(question_list[key].QSTN_NUM), question_list[key].BLY_ID, question_list[key].QSTN_DIALOG, answers);
					}

					console.log(Question.list);
				}
			});
		});
	}

	Question.closeDialog = function() {
		$('.dialog-container').html('');
		// console.log("close dialog");
	}

	Question.statusCheck = function(bullyId) {

		var correct_ans = 0;
		var wrong_ans = 0;
		var total_questions = 0;

		for(var key in Question.list) {

			if(Question.list[key].bully == bullyId) {

				total_questions++;

				if(Question.list[key].isAsked) {

					if(Question.list[key].status == "correct") {

						correct_ans++;
					} else if(Question.list[key].status == "wrong") {

						wrong_ans++;
					}
				}
			}
		}

		return {total_questions: total_questions, correct_ans: correct_ans, wrong_ans: wrong_ans};
	}

	Maps = function(id, imgSrc, height, width, grid) {

		var self = {
			id: id,
			img: new Image(),
			height: height,
			width: width,
			grid: grid,
		};

		self.img.src = imgSrc;

		self.update = function() {
			self.draw();
		}

		self.draw = function() {

			var x = (ctxWidth/2 - player.x) - 80;
			var y = ctxHeight/2 - player.y;

			ctx.drawImage(self.img,0,0,self.img.width,self.img.height, x, y,self.width * 1,self.height * 1);
		}

		self.isPossitionWall = function(pt)
		{
			var gridX = Math.floor(pt.x / TILE_SIZE);
			var gridY = Math.floor(pt.y / TILE_SIZE);

			if(gridX < 0 || gridX >= self.grid[0].length)
			{
				return true;
			}
			if(gridY < 0 || gridY >= self.grid.length)
			{
				return true;
			}

			return self.grid[gridY][gridX];
		};

		Maps.current = self;
		// return self;
	}

	Maps.current = {};

	Maps.init = function() {

		var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

		var promise = new Promise(function(resolve, reject) {

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Game/get_level_info",
				data: {lvlId: lvlId},
				dataType: 'json',
				success: function(res) {
					resolve(res);
				},
				error: function(err) {
					console.log("cannot retreive level info due to some error");
				}
			});
		}).then(function(result) {

			if(result.status) {
				
				var collArray = JSON.parse(result.map_info['LVL_GRID']);
				var rowTiles = parseInt(result.map_info['LVL_NUMCOLS']);

				var mapGrid2d = [];

				var ctr = 0;
				var ctr2D = 0;
				mapGrid2d[ctr2D] = [];
				while(collArray[ctr] != null)
				{
					mapGrid2d[ctr2D][(ctr%rowTiles)] = collArray[ctr];

					ctr++;

					if(ctr%(rowTiles) == 0 && collArray[ctr] != null)
					{
						ctr2D++;
						mapGrid2d[ctr2D] = [];
					}
				}

				Maps('currentmap', img.map.src, img.map.height, img.map.width, mapGrid2d);
			} else {
				console.log(result.message);
			}
		});
	}

	startNewGame = function() {

		Bully.list = {};
		Objective.list = {};
		Question.list = {};
		Projectile.list = {};
		Maps.current = {};

		Maps.init();
		Objective.init();
		Bully.init();
		Question.init();

		player = new Player('myPlayer1', img.player.src, img.player.width/4, img.player.height/4, 56, 56, 10);



		// cmdNum = 0;
		// vrbls = [];

		// while(isEndOfCode(cmdNum)) {
		// 	executeCommand(cmdNum);
		// 	cmdNum++;
		// }

		player.hp = player.hpMax;

		// Bully.generate(img.bully.src, (img.bully.height/4) * zoomMultiplier, (img.bully.width/4) * zoomMultiplier, 168, 56, 1);
		// Bully.generate(img.bully.src, (img.bully.height/4) * zoomMultiplier, (img.bully.width/4) * zoomMultiplier, 360, 56, 1);
	}

	update = function() {

		if(!isPaused) {
			ctx.clearRect(0,0,canvas.width,canvas.height);
			Maps.current.update();
			player.update();
			Bully.update();
			Projectile.update();
			Objective.update();

			if(isFinished) {
				Objective.computeScore();
				Objective.recordScore();
				$("#finish-modal").css("display", "block");
			}
			// ctx.drawImage(img.dialog,0,0,img.dialog.width,img.dialog.height, 10, 90,40,40);
		}

	}

	// var map_grid = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];

	// var Maps = new Maps('currentmap', img.map.src, img.map.height, img.map.width, map_grid);
	var question = new Question();
	var player = {};

	startNewGame();

	setInterval(update, 40);
</script>