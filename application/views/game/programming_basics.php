<div id="page">
<div class="container-fluid">
	<div class="margin-top">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="canvas-container">
					<div class="game-area">
						<div class="hp-bar-container" style="">
							<div class="player-status">
								<div class="row">
									<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
										<div class="avatar">
											<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avatar['AVTR_THUMBNAIL_FILENAME']?>">
										</div>
									</div>
									<!-- <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
										<label class="hp-lbl">HP:</label>
									</div> -->
									<div class="col-sm-10 col-xs-10 col-md-9 col-lg-9" style="margin-left:-30px;">
										<div class="row" style="display:flex;flex-direction: column;">
											<?php $user = $this->session->userdata('username');?>
											<label class="user"><?php echo $user;?></label>
											<div class="progress" style="padding: 0px;">
											 	<div class="progress-bar progress-bar-danger player-hp-bar" id="hp-bar" role="progressbar" style="width: 100%">
											 	</div>
											</div>
										</div>
										
									</div>
										
								</div>
							</div>
						</div>
						<canvas id="ctx" height="200" width="500"></canvas>
					</div>

					<div class="dialog-container"></div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="code-area-container wrapper-1">
					<div class="row"><h1 class="title">Type Here</h1></div>
					<div class="row code_area">
						<div class="line-number col-md-1 col-sm-1 col-xs-1">
							<textarea rows="15" id="textarea1" disabled></textarea>
						</div>
						<div class="code-area-container border-custom col-md-11 col-sm-11 col-xs-11">
							<textarea class="code_area" style="white-space: nowrap;" id="code_area" name="code_area" rows="15" onscroll="document.getElementById('textarea1').scrollTop = this.scrollTop;"></textarea>
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
									<!-- <label class="objective-container">
									<input id="obj_<?php echo $obj['OBJ_NUM']; ?>_status" class="checkmark" type="checkbox" name="obj_status"></label> -->
									<input id="obj_<?php echo $obj['OBJ_NUM']; ?>_status" class="checkmark" type="checkbox" name="obj_status">
								</div>
							</div>
						</li>	
					<?php endforeach ?>
				</ul>
				<!-- <style type="text/css">
					label.objective-container {
					    display: block;
					    position: relative;
					    padding-left: 35px;
					    margin-bottom: 12px;
					    cursor: pointer;
					    font-size: 22px;
					    -webkit-user-select: none;
					    -moz-user-select: none;
					    -ms-user-select: none;
					    user-select: none;
					}

					/* Hide the browser's default checkbox */
					label.objective-container input {
					    position: absolute;
					    opacity: 0;
					    cursor: pointer;
					}

					/* Create a custom checkbox */
					.checkmark {
					    position: absolute;
					    top: 0;
					    left: 0;
					    height: 25px;
					    width: 25px;
					    background-color: #eee;
					}

					/* On mouse-over, add a grey background color */
					.container:hover input ~ .checkmark {
					    background-color: #ccc;
					}

					/* When the checkbox is checked, add a blue background */
					.container input:checked ~ .checkmark {
					    background-color: #2196F3;
					}

					/* Create the checkmark/indicator (hidden when not checked) */
					.checkmark:after {
					    content: "";
					    position: absolute;
					    display: none;
					}

					/* Show the checkmark when checked */
					.container input:checked ~ .checkmark:after {
					    display: block;
					}

					/* Style the checkmark/indicator */
					.container .checkmark:after {
					    left: 9px;
					    top: 5px;
					    width: 5px;
					    height: 10px;
					    border: solid white;
					    border-width: 0 3px 3px 0;
					    -webkit-transform: rotate(45deg);
					    -ms-transform: rotate(45deg);
					    transform: rotate(45deg);
					}
				</style> -->
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
</div>

<script type="text/javascript">

	$(document).ready(function() {

		var ctx = document.getElementById("ctx").getContext("2d");
		var canvas = document.getElementById("ctx");
		code_area = document.getElementById("code_area");

		ctx.font = '30px Arial';

		var ctxWidth = canvas.width;
		var ctxHeight = canvas.height;

		var preloadProgCtr = 0;
		var gameData = {};
		
		var gameImgArr = [
			"<?php echo base_url(); ?>assets/images/levels/<?php echo $level_info['LVL_FILENAME'] ?>",
			"<?php echo base_url(); ?>assets/images/avatars/sprites/<?php echo $avatar['AVTR_SPRITE_FILENAME']?>",
			"<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-10.png",
			"<?php echo base_url(); ?>assets/images/projectile.png"
		];

		var cmdNum = 0;
		
		var vrbls = [];
		var operations = [];
		var code_log = [];
		var code_stack = [];

		var zoomMultiplier = 0.75;
		var TILE_SIZE = 16;
		var isPaused = true;

		var collectedCoins = 0;
		var KilledBullies = 0;
		var used_if = false;
		var used_loop = false;
		var isFinished = false;
		var img = {};
		img.map = new Image();
		img.map.src = "<?php echo base_url(); ?>assets/images/levels/<?php echo $level_info['LVL_FILENAME'] ?>";
		img.player = new Image();
		img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/<?php echo $avatar['AVTR_SPRITE_FILENAME']?>";

		img.bully = new Image();
		img.bully.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-10.png";
		img.bullyThumb = new Image();
		img.bullyThumb.src = "";
		img.projectile = new Image();
		img.projectile.src = "<?php echo base_url(); ?>assets/images/projectile.png";

		updateLoadProgBar = function() {

			// console.log(preloadProgCtr/(gameImgArr.length + 4));

			var loadPercent = (preloadProgCtr/(gameImgArr.length + 4))*100;
			$(".load-bar").css("width", loadPercent + "%");
		}

		preloadGameData = function() {

			var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

			var postAction = function() {

				startNewGame();
				setInterval(update, 40);
			};

			var promise = new Promise(function(resolve, reject) {

				return $.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_level_info",
					data: {lvlId: lvlId},
					dataType: 'json',
					error: function(err) {
						console.log("cannot retreive level info due to some error");
					},
					complete: function(comp) {
						preloadProgCtr++;
						console.log("progress: " + preloadProgCtr);
						// console.log(preloadProgCtr/(gameImgArr.length + 4));
						updateLoadProgBar();

						gameData.map_info = comp.responseJSON;
						console.log(gameData);

						if(gameData.map_info.status) {
							resolve({status: true});
						} else {
							alert("failed to retreive game data, reloading page");
							window.location = "<?php echo base_url(); ?>Game/play_basics/" + lvlId;
						}
					}
				})
			}).then(function(loadStatus) {
					
				 return $.ajax({
					type: 'POST',
					url: '<?php echo base_url(); ?>Game/get_objectives',
					data: {lvlId: lvlId},
					dataType: 'json',
					error: function(err) {
						console.log(err);
					},
					complete: function(comp) {
						preloadProgCtr++;
						console.log("progress: " + preloadProgCtr);
						// console.log(preloadProgCtr/(gameImgArr.length + 4));
						updateLoadProgBar();

						gameData.objectives_list = comp.responseJSON;
						console.log(gameData);

						if(gameData.objectives_list.status) {
							return {status: true};
						} else {
							alert("failed to retreive game data, reloading page");
							window.location = "<?php echo base_url(); ?>Game/play_basics/" + lvlId;
						}
					}
				});
			}).then(function(loadStatus) {

				return $.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_bully_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					error: function(err) {
						console.log("failed to retreive bully data");
					},
					complete: function(comp) {
						preloadProgCtr++;
						console.log("progress: " + preloadProgCtr);
						// console.log(preloadProgCtr/(gameImgArr.length + 4));
						updateLoadProgBar();

						gameData.bully_list = comp.responseJSON;
						console.log(gameData);

						if(gameData.bully_list.status) {
							return {status: true};
						} else {
							alert("failed to retreive game data, reloading page");
							window.location = "<?php echo base_url(); ?>Game/play_basics/" + lvlId;
						}
					}
				});
			}).then(function(loadStatus) {

				return $.ajax({
					type: 'post',
					url: "<?php echo base_url() ?>Game/get_question_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					error: function(err) {
						console.log("failed to retreive question list due to some error");
					},
					complete: function(comp) {
						preloadProgCtr++;
						console.log("progress: " + preloadProgCtr);
						// console.log(preloadProgCtr/(gameImgArr.length + 4));
						updateLoadProgBar();

						gameData.question_list = comp.responseJSON;
						console.log(gameData);

						if(gameData.question_list.status) {
							console.log("here");
							return {status: true};
						} else {
							alert("failed to retreive game data, reloading page");
							window.location = "<?php echo base_url(); ?>Game/play_basics/" + lvlId;
						}
					}
				});


			}).then(function(loadStatus) {

				console.log(loadStatus);

				if(loadStatus.status) {

					var newImages = [];
					var loadedImages = 0;

					imageLoadPost = function() {
					
						preloadProgCtr++;
						loadedImages++;
						updateLoadProgBar();



						if((loadedImages) >= (gameImgArr.length)) {
							function onReady(callback) {
						    	var intervalID = window.setInterval(checkReady, 1000);
								// window.addEventListener("load", draw, true);
							    function checkReady() {
							        if (document.getElementsByTagName('canvas')[0] !== undefined) {
							            window.clearInterval(intervalID);
							            callback.call(this);
							        }
							    }
							}
							function show(id, value) {
								document.getElementById(id).style.transition = value ? '' : '.5s';
							    document.getElementById(id).style.display = value ? 'block' : 'none';
							}
							onReady(function () {
							    show('page', true);
							    show('loading', false);
							    isPaused = false;
							});
							
							postAction();

							// return({status: true});
						}
					}

					for(var i = 0; i < gameImgArr.length; i++) {

						newImages[i] = new Image();
						newImages[i].src = gameImgArr[i];
						
						newImages[i].onload = function() {
							imageLoadPost();
						}

						newImages[i].onerror = function()  {
							imageLoadPost();
							console.log("errorloading image");
						}

						// preloadProgCtr++;
						// console.log("progress: " + preloadProgCtr);

						// loadedImages++;
						// updateLoadProgBar();
					}

					// return {
					// 	done: function(f) {
					// 		postAction = f || postAction;
					// 	}
					// }
				} 

			});
			// .then(function(loadStatus) {

			// 	// if(loadStatus.status) {
			// 		// console.log("here");
			// 		// startNewGame();
			// 		// setInterval(update, 40);

			// 	// } else {
			// 	// 	alert("failed to retreive game data, reloading page");
			// 	// 	window.location = "<?php echo base_url(); ?>Game/play_basics/" + lvlId;
			// 	// }

			// });
		}

		// preloadImages = function(imgArr) {

		// 	var newImages = [];
		// 	var loadedImages = 0;

		// 	var postAction = function() {};

		// 	imageLoadPost = function() {
				
		// 		preloadProgCtr++;
		// 		loadedImages++;
		// 		updateLoadProgBar();

		// 		if(loadedImages == imgArr.length) {
		// 			function onReady(callback) {
		// 		    	var intervalID = window.setInterval(checkReady, 0);
		// 				// window.addEventListener("load", draw, true);
		// 			    function checkReady() {
		// 			        if (document.getElementsByTagName('canvas')[0] !== undefined) {
		// 			            window.clearInterval(intervalID);
		// 			            callback.call(this);
		// 			            isPaused = false;
		// 			        }
		// 			    }
		// 			}
		// 			function show(id, value) {
		// 				document.getElementById(id).style.transition = value ? '' : '.5s';
		// 			    document.getElementById(id).style.display = value ? 'block' : 'none';
		// 			}
		// 			onReady(function () {
		// 			    show('page', true);
		// 			    show('loading', false);
		// 			});
		// 				postAction();
		// 		}
		// 	}

		// 	for(var i = 0; i < imgArr.length; i++) {

		// 		newImages[i] = new Image();
		// 		newImages[i].src = imgArr[i];
				
		// 		newImages[i].onload = function() {
		// 			imageLoadPost();
		// 		}

		// 		newImages[i].onerror = function()  {
		// 			imageLoadPost();
		// 		}
		// 	}

		// 	return {
		// 		done: function(f) {
		// 			postAction = f || postAction;
		// 		}
		// 	}
		// }

		

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
					// console.log("blank line");
				} else if(/^System\.out\.println\(\s*[A-Za-z0-9=<>()\[\]\+\-*/\s\W]*\s*\)\s*;$/g.test(cmdLine)) {

					//\"[A-Za-z0-9_\W]*\"

					var cond = getConditions(cmdLine, "(", ")");
					var display_txt = "";

					if(/^\s*(\"[A-Za-z0-9_\W]*\"|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*\+\s*(\"[A-Za-z0-9_\W]*\"|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*$/g.test(cond)) {

						var print_param = cond.split("+");

						console.log(print_param);

						var display_list = [];

						for(var key in print_param) {

							print_param[key] = print_param[key].trim();

							console.log(print_param[key]);

							if(/^\"[A-Za-z0-9_\W]*\"$/g.test(print_param[key])) {
								display_list.push(print_param[key]);
							} else if(/^[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\]$/g.test(print_param[key])) {

								if(isVarExisting(print_param[key].replace(/\[[0-9]+\]/g, ""))) {

									var var_obj = isVarExisting(print_param[key].replace(/\[[0-9]+\]/g, ""));

									if(/\[[0-9]+\]/g.test(print_param[key])) {
									
										var arrIndex = getConditions(print_param[key], "[", "]");
										
										if(Array.isArray(var_obj.var_value)) {

											// console.log(var_obj.var_value.length);

											if((var_obj.var_value.length > arrIndex) && (arrIndex >= 0)) {
												display_list.push(var_obj.var_value[arrIndex]);
											} else {
												return {status: false, message: "index out of range"};
											}
										} else {
											return {status: false, message: var_obj.var_identifier + " is not an array"};
										}
									} else {

										if(!Array.isArray(var_obj.var_value)) {

											display_list.push(var_obj.var_value);
										} else {
											return {status: false, message: var_obj.var_identifier + " is an array"};
										}
									}

								} else {
									return {status: false, message: "undefined variable" + print_param};
								}
							} else {
								return {status: false, message: "invalid parameter for print statement"};
							}
						}

						for(var key in display_list) {

							display_txt += display_list[key].toString().replace(/[\"\']/g, "");
							// .replace(/[\"\']/g, "")
						}

						console.log(display_txt);
					} else if(/^\s*(\"[A-Za-z0-9_\W]*\"|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*$/g.test(cond)) {
						
						if(/^\"[A-Za-z0-9_\W]*\"$/g.test(cond)) {
							display_txt = cond;
							console.log(display_txt);
						} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])$/g.test(cond)) {

							if(isVarExisting(cond.replace(/\[[0-9]+\]/g, ""))) {

								var var_obj = isVarExisting(cond.replace(/\[[0-9]+\]/g, ""));

								if(/\[[0-9]+\]/g.test(cond)) {
								
									var arrIndex = getConditions(cond, "[", "]");
									
									if(Array.isArray(var_obj.var_value)) {

										if((var_obj.var_value.length > arrIndex) && (arrIndex >= 0)) {
											display_txt = var_obj.var_value[arrIndex];
										} else {
											return {status: false, message: "index out of range"};
										}
									} else {
										return {status: false, message: var_obj.var_identifier + " is not an array"};
									}
								} else {

									if(!Array.isArray(var_obj.var_value)) {
										display_txt = var_obj.var_value;
									} else {
										return {status: false, message: var_obj.var_identifier + " is an array"};
									}
								}

							} else {
								return {status: false, message: "undefined variable" + print_param};
							}
						}
					} else {
						return {status: false, message: "invalid argument for print statement"};
					}

					code_log.push({
						type: "print",
						print_info: {
							txt: display_txt.toString(),
							param: cond,
						}
					});

				} else if(/^(int|double|char|String|Boolean)\s+[A-Za-z][A-Za-z0-9_]*\s*;$/g.test(cmdLine)) {

					var tempLine = cmdLine.replace(";", "");
					tempLine = tempLine.replace(/\s+/g, " ");
					tempLine = tempLine.trim();

					var declareLine = tempLine.split(' ');

					var varInfo = {
						dataType: declareLine[0],
						var_identifier: declareLine[1],
					};

					if(code_stack.length > 0) {

						code_stack[code_stack.length - 1].statements.push({
							type: "dec-var",
							var_info: {
								dataType: declareLine[0],
								var_identifier: declareLine[1],
							},
						});

						// code_log[code_stack[code_stack.length - 1].log_id].cmd_info.statements.push({
						// 	type: "dec-var",
						// 	var_info: {
						// 		dataType: declareLine[0],
						// 		var_identifier: declareLine[1],
						// 	},
						// });

						if(code_stack[code_stack.length - 1].status) {

							code_log.push({
								type: "dec-var",
								var_info: {
									dataType: declareLine[0],
									var_identifier: declareLine[1],
								},
							});

							vrbls.push(varInfo);
						}
					} else {

						code_log.push({
							type: "dec-var",
							var_info: {
								dataType: declareLine[0],
								var_identifier: declareLine[1],
							},
						});

						vrbls.push(varInfo);
					}

				} else if(/^(int|double|char|String|Boolean)\s+[A-Za-z][A-Za-z0-9_]*\s*=\s*[A-Za-z0-9_\W]+\s*;$/g.test(cmdLine)) {

					var tempLine = cmdLine.replace(";", "");

					var declareLine = tempLine.split(/=/i);
					declareLine[0] = declareLine[0].trim();
					
					var value = declareLine[1].trim();
					var var_info = declareLine[0].split(/\s+/g);

					// console.log(var_info + " " + value);

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

							if(code_stack.length > 0) {

								code_stack[code_stack.length - 1].statements.push({
									type: "dec-var",
									var_info: {
										dataType: var_info[0],
										var_identifier: var_info[1],
										var_value: tempValue,
									},
								});

								// code_log[code_stack[code_stack.length - 1].log_id].cmd_info.statements.push({
								// 	type: "dec-var",
								// 	var_info: {
								// 		dataType: var_info[0],
								// 		var_identifier: var_info[1],
								// 		var_value: tempValue,
								// 	},
								// });

								code_stack[code_stack.length - 1]

								if(code_stack[code_stack.length - 1].status) {

									code_log.push({
										type: "dec-var",
										var_info: {
											dataType: var_info[0],
											var_identifier: var_info[1],
											var_value: tempValue,
										},
									});

									vrbls.push(varInfo);
								}

							} else {

								code_log.push({
									type: "dec-var",
									var_info: {
										dataType: var_info[0],
										var_identifier: var_info[1],
										var_value: tempValue,
									},
								});

								vrbls.push(varInfo);
							}
							
						} else {
							// console.log("error: data type missmatch");
							return {status: false, message: "error: data type missmatch"};
						}
					} else {
						// console.log("error: no value assigned");
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

					if(code_stack.length > 0) {

						code_stack[code_stack.length - 1].statements.push({
							type: "dec-arr",
							var_info: {
								dataType: declareLine[0],
								var_identifier: declareLine[1],
							},
						});

						// code_log[code_stack[code_stack.length - 1].log_id].cmd_info.statements.push({
						// 	type: "dec-arr",
						// 	var_info: {
						// 		dataType: declareLine[0],
						// 		var_identifier: declareLine[1],
						// 	},
						// });

						if(code_stack[code_stack.length - 1].status) {

							code_log.push({
								type: "dec-arr",
								var_info: {
									dataType: declareLine[0],
									var_identifier: declareLine[1],
								},
							});

							vrbls.push(arrInfo);
						}
					} else {

						code_log.push({
							type: "dec-arr",
							var_info: {
								dataType: declareLine[0],
								var_identifier: declareLine[1],
							},
						});

						vrbls.push(arrInfo);
					}

				} else if(/^(int|double|char|String|Boolean)\[\]\s+[A-Za-z][A-Za-z0-9_]*\s*=\s*(\{[A-Za-z0-9,\"\'\s\.\-\_]*\}|new\s*(int|double|char|String|Boolean)\[[0-9]*\])\s*;$/g.test(cmdLine)) {

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
							// console.log("error: dataType missmatch");
							return {status: false, message: "error: dataType missmatch"};
						} else {

							var arrayInfo = {
								dataType: arrInfo[0],
								var_identifier: arrInfo[1],
								var_value: arr_val,
							};

							var passToLog = [];

							for(var key in arr_val) {

								passToLog.push(arr_val[key]);
							}

							if(code_stack.length > 0) {

								code_stack[code_stack.length - 1].statements.push({
									type: "dec-arr",
									var_info: {
										dataType: arrInfo[0],
										var_identifier: arrInfo[1],
										var_value: passToLog,
									},
								});

								// code_log[code_stack[code_stack.length - 1].log_id].cmd_info.statements.push({
								// 	type: "dec-arr",
								// 	var_info: {
								// 		dataType: arrInfo[0],
								// 		var_identifier: arrInfo[1],
								// 		var_value: arr_val,
								// 	},
								// });

								if(code_stack[code_stack.length - 1].status) {

									code_log.push({
										type: "dec-arr",
										var_info: {
											dataType: arrInfo[0],
											var_identifier: arrInfo[1],
											var_value: passToLog,
										},
									});

									vrbls.push(arrayInfo);
								}
							} else {

								code_log.push({
									type: "dec-arr",
									var_info: {
										dataType: arrInfo[0],
										var_identifier: arrInfo[1],
										var_value: passToLog,
									},
								});

								vrbls.push(arrayInfo);
							}
						}
					} catch(err) {
						console.log("error: value assigned invalid");
						return {status: false, message: "error: value assigned invalid"};
					}

				} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*=\s*(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\'|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])\s*;$/g.test(cmdLine)) {

					var tempLine = cmdLine.replace(";", "");
					var assignLine = tempLine.split(/=/i);

					var var1_identifier = assignLine[0].trim();
					var var2_identifier = assignLine[1].trim();

					var var1 = {};
					var var2 = {};

					var valToTrans;
					var assign_param = {};

					if(/^(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\')$/g.test(assignLine[1].trim())) {

						if(isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, ""))) {

							var1 = isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, ""));
							var parsedVal = parseValue(var1.dataType.replace(/[\[\]]/g, ""), assignLine[1].trim());

							if(parsedVal.status) {
								valToTrans = parsedVal.value;
							} else {
								return parsedVal;
							}

							if(/\[[0-9]*\]/g.test(var1_identifier)) {

								if(Array.isArray(var1.var_value)) {

									var var1_arrIndex = getConditions(var1_identifier, '[', ']');

									assign_param = {
										saveTo_index: var1_arrIndex,
										dataType: var1.dataType.replace(/[\[\]]/g, ""),
										value: valToTrans,
									};
								} else {
									return {status: false, message: var1.var_identifier + " is not an Array"};
								}
							} else {

								if(!Array.isArray(var1.var_value)) {

									assign_param = {
										dataType: var1.dataType.replace(/[\[\]]/g, ""),
										value: valToTrans,
									};
								} else {
									return {status: false, message: "specify array index of " + var1.var_identifier};
								}
							}
						}
					} else if(isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, "")) && isVarExisting(var2_identifier.replace(/\[[0-9]*\]/g, ""))) {
						
						var1 = isVarExisting(var1_identifier.replace(/\[[0-9]*\]/g, ""));
						var2 = isVarExisting(var2_identifier.replace(/\[[0-9]*\]/g, ""));

						// var valToTrans;
						// var assign_param = {};

						if(/\[[0-9]*\]/g.test(var2_identifier) && /\[\]/g.test(var2.dataType)) {

							if(Array.isArray(var2.var_value)) {
								var var2_arrIndex = getConditions(var2_identifier, '[', ']');
								valToTrans = var2.var_value[var2_arrIndex];
								// console.log(valToTrans);	
							} else {
								return {status: false, message: var2.var_identifier + " is not an Array"};
							}
						} else {

							if(!Array.isArray(var2.var_value)) {
								valToTrans = var2.var_value
								// console.log(valToTrans);
							} else {
								return {status: false, message: "specify array index of " + var2.var_identifier};
							}
						}

						if(/\[[0-9]*\]/g.test(var1_identifier) && /\[\]/g.test(var1.dataType)) {

							if(Array.isArray(var1.var_value)) {

								var var1_arrIndex = getConditions(var1_identifier, '[', ']');

								assign_param = {
									saveTo_index: var1_arrIndex,
									dataType: var2.dataType.replace(/[\[\]]/g, ""),
									value: valToTrans,
								};

								// var1.var_value[var1_arrIndex] = valToTrans;
							} else {
								return {status: false, message: var1.var_identifier + " is not an Array"};
							}
							
						} else {

							if(!Array.isArray(var1.var_value)) {
								assign_param = {
									dataType: var2.dataType,
									value: valToTrans,
								};

								// var1.var_value = valToTrans;
							} else {
								return {status: false, message: "specify array index of " + var1.var_identifier};
							}
						}
					} else {
						console.log(var1_identifier + " or " + var2_identifier + " variable does not exist");
						return {status: false, message: var1_identifier + " or " + var2_identifier + " variable does not exist"};
					}

					if(code_stack.length > 0) {

							code_stack[code_stack.length - 1].statements.push({
								type: "assign",
								ass_info: {
									var2_identifier: var2_identifier,
									valToTrans: valToTrans,
									var1_identifier: var1_identifier,
								}
							});

							if(code_stack[code_stack.length - 1].status) {

								var1 = assignValueToVar(var1, assign_param);

								if(var1.status == false) {
									return var1;
								} else {

									code_log.push({
										type: "assign",
										ass_info: {
											var2_identifier: var2_identifier,
											valToTrans: valToTrans,
											var1_identifier: var1_identifier,
										}
									});
								}
							}
						} else {

							var1 = assignValueToVar(var1, assign_param);

							if(var1.status == false) {
									return var1;
							} else {

								code_log.push({
									type: "assign",
									ass_info: {
										var2_identifier: var2_identifier,
										valToTrans: valToTrans,
										var1_identifier: var1_identifier,
									}
								});
							}
						}

						// console.log(var1);
						// console.log(var2);
						// console.log(vrbls);


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
						var assign_params = {};

						if(opRes.status) {

							if(Array.isArray(save_to_obj.var_value)) {

								if(/\[[0-9]*\]/g.test(save_to)) {

									var arrIndex = getConditions(save_to, '[', ']');
									if(save_to_obj.var_value[arrIndex]) {

											assign_param = {
												saveTo_index: arrIndex,
												dataType: opRes.dataType,
												value: opRes.value,
											};

											// save_to_obj = assignValueToVar(save_to_obj, assign_param);

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
									
									assign_param = {
										dataType: opRes.dataType,
										value: opRes.value,
									};

									// save_to_obj = assignValueToVar(save_to_obj, assign_param);
								}
							}

							// console.log(save_to_obj);

							if(code_stack.length > 0) {

								code_stack[code_stack.length - 1].statements.push({
									type: "op",
									op_info: {
										save_to: save_to,
										operation: op_operand,
										var_1: var_1,
										var_2: var_2,
									},
								});

								// code_log[code_stack[code_stack.length - 1].log_id].cmd_info.statements.push({
								// 	type: "op",
								// 	op_info: {
								// 		save_to: save_to,
								// 		operation: op_operand,
								// 		var_1: var_1,
								// 		var_2: var_2,
								// 	},
								// });

								if(code_stack[code_stack.length - 1].status) {

									save_to_obj = assignValueToVar(save_to_obj, assign_param);

									var op_operand = "";

									if(opp[0] == "+")
										op_operand = "add";
									if(opp[0] == "-")
										op_operand = "subtract";
									if(opp[0] == "/")
										op_operand = "divide";
									if(opp[0] == "*")
										op_operand = "multiply";

									code_log.push({
										type: "op",
										op_info: {
											save_to: save_to,
											operation: op_operand,
											var_1: var_1,
											var_2: var_2,
										},
									});
								}
							} else {

								save_to_obj = assignValueToVar(save_to_obj, assign_param);

								var op_operand = "";

								if(opp[0] == "+")
									op_operand = "add";
								if(opp[0] == "-")
									op_operand = "subtract";
								if(opp[0] == "/")
									op_operand = "divide";
								if(opp[0] == "*")
									op_operand = "multiply";

								code_log.push({
									type: "op",
									op_info: {
										save_to: save_to,
										operation: op_operand,
										var_1: var_1,
										var_2: var_2,
									},
								});
							}

							// console.log(vrbls);

						} else {
							return opRes;
						}

					} else {
						return {status: false, message: "variable does not exist"};
					}

				} else if(/^if\s*\(\s*[A-Za-z0-9=<>()\[\]\s\W]*\s*\)\s*{$/g.test(cmdLine)) {
					// console.log("used if statement");

					var if_condition = getConditions(cmdLine, "(", ")");
					var cond_result = testCondition(if_condition);

					// console.log(if_condition);
					// console.log(cond_result);

					if(cond_result.status) {

						code_stack.push({
							type: "if",
							condition: if_condition,
							status: cond_result.result,
							start: commandNum,
							log_id: code_log.length,
							statements: [],
						});

						code_log.push({
							type: "cmd-if",
							cmd_info: {
								condition: if_condition,
								status: cond_result.result,
								start: commandNum,
								statements: [],
							}
						});

						// console.log(code_stack);
						// console.log(code_log);
					} else {

						return cond_result;
					}

				} else if(/^while\s*\(\s*[A-Za-z0-9=<>()\[\]\s\W]*\s*\)\s*{$/g.test(cmdLine)) {

					var loop_condition = getConditions(cmdLine, "(", ")");
					var cond_result = testCondition(loop_condition);

					if(cond_result.status) {

						code_stack.push({
							type: "loop-while",
							condition: loop_condition,
							status: cond_result.result,
							start: commandNum,
							log_id: code_log.length,
							statements: [],
						});

						code_log.push({
							type: "cmd-loop-while",
							cmd_info: {
								condition: loop_condition,
								status: cond_result.result,
								start: commandNum,
								statements: [],
							},
						});
					} else {
						return cond_result;
					}

				} else if(/^\s*}\s*$/) {

					if(code_stack.length > 0) {

						var stack_lastIndex = code_stack.length - 1;
						var curr_cmd = code_stack[stack_lastIndex];

						if(curr_cmd.type == "if") {
							var cmd_info = code_stack.pop();

							code_log[cmd_info.log_id].cmd_info.end = commandNum;
							code_log[cmd_info.log_id].cmd_info.statements = cmd_info.statements;
						} else if(curr_cmd.type == "loop-while") {

							code_log[curr_cmd.log_id].cmd_info.end = commandNum;

							var cond_result = testCondition(curr_cmd.condition);

							if(cond_result.status) {

								if(cond_result.result) {
									cmdNum = curr_cmd.start;
								}
							} else {
								return cond_result;
							}
						}
					} else {
						return {status: false, message: "unexpected '}'"};
					}

					// var

				} else {
					// console.log("error");
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
				console.log(vrbls);

				for(var key in Question.list) {

					if(Question.list[key].bully == bullyId) {
						if(Question.list[key].isAsked) {
							if(Question.list[key].status == "current question") {
								
								if(!hasErrors) {

									var answers = Question.list[key].answer;
									var ansCount = 0;
									var correctAns = 0;

									// if(answers.variables && answers.operations) {
									// 	ansCount = answers.operations.length + answers.variables.length;
									// }
									if(answers.commands) {
										ansCount += answers.commands.length;
									}
									if(answers.variables) {
										ansCount += answers.variables.length;
									}
									if(answers.operations) {
										ansCount += answers.operations.length;
									}
									if(answers.prints) {
										ansCount += answers.prints.length;
									}

									if(answers.variables) {

										if(code_log.length > 0) {

											for(var akey in answers.variables) {

												for(var ckey in code_log) {

													if(code_log[ckey].type == "dec-var" || code_log[ckey].type == "dec-arr") {

														if(/\[\]/g.test(answers.variables[akey].dataType)) {

															// console.log(code_log[ckey].type);

															if(code_log[ckey].type == "dec-arr") {

																// console.log("check array val");

																if(code_log[ckey].var_info.dataType == answers.variables[akey].dataType && code_log[ckey].var_info.var_identifier == answers.variables[akey].var_identifier && code_log[ckey].var_info.var_value.length == answers.variables[akey].var_value.length) {

																	var arrVal = answers.variables[akey].var_value;

																	var isWrongVal = false;
																	var arrIndexCtr = 0;

																	do {

																		if(arrVal[arrIndexCtr] == code_log[ckey].var_info.var_value[arrIndexCtr]) {
																			arrIndexCtr++;
																			// console.log("correct value");
																		} else {
																			isWrongVal = true;
																			// console.log("wrong value");
																		}
																	} while((arrVal.length > arrIndexCtr) && !isWrongVal);

																	if(!isWrongVal) {
																		correctAns++;
																	}
																}
															}

														} else {

															if(answers.variables[akey].dataType == code_log[ckey].var_info.dataType && answers.variables[akey].var_identifier == code_log[ckey].var_info.var_identifier && answers.variables[akey].var_value == code_log[ckey].var_info.var_value) {
																// console.log("correct declaration");
																correctAns++;
															}
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
											}
										}
									}

									if(answers.operations) {

										if(code_log.length > 0) {

											for(var okey in answers.operations) {

												for(var ckey in code_log) {

													if(code_log[ckey].type == "op") {

														if(code_log[ckey].op_info.save_to == answers.operations[okey].save_to && code_log[ckey].op_info.operation == answers.operations[okey].operation) {

															if(answers.operations[okey].operation == "add") {

																// console.log(answers.operations[okey]);
																// console.log(code_log[ckey].op_info);

																// console.log(code_log[ckey].op_info.var_1 == answers.operations[okey].var_1);
																// console.log(code_log[ckey].op_info.var_2 == answers.operations[okey].var_2);

																if((code_log[ckey].op_info.var_1 == answers.operations[okey].var_1) && (code_log[ckey].op_info.var_2 == answers.operations[okey].var_2)) {
																	// console.log("correct operation");

																	correctAns++;
																}
															} else {

																if(code_log[ckey].op_info.var_1 == answers.operations[okey].var_1 && code_log[ckey].op_info.var_2 == answers.operations[okey].var_2) {

																	correctAns++;
																}
															}															
														}
													}
												}
											}
										}
									}

									// System.out.println("Hello World!");

									if(answers.prints) {
										if(code_log.length > 0) {

											for(var pkey in answers.prints) {

												for(var ckey in code_log) {

													if(code_log[ckey].type == "print") {
														// console.log(code_log[ckey].print_info.param + " - " + answers.prints[pkey].txt);
														if(code_log[ckey].print_info.param == answers.prints[pkey].txt) {
															correctAns++;
															// console.log("here");
														}
													}
												}
											}
										}
									}

									if(answers.commands) {
										if(code_log.length > 0) {

											for(var cmdKey in answers.commands) {

												for(var ckey in code_log) {

													if(code_log[ckey].type == answers.commands[cmdKey].type) {

														if(code_log[ckey].type == "cmd-if") {

															var compareCondArr = [code_log[ckey].cmd_info.condition, answers.commands[cmdKey].condition];
															var condCompObj = [];
															// console.log(compareCondArr);
															console.log(code_log[ckey].cmd_info);
															console.log(answers.commands[cmdKey]);

															for(var ctr = 0; ctr < compareCondArr.length; ctr++) {

																var condOp = /(==|!=|>=|<=|>|<)/i.exec(compareCondArr[ctr]);
																console.log(condOp);

																var condVal = compareCondArr[ctr].split(condOp[0]);

																var condObj = {
																	op: condOp[0],
																	values: condVal,
																};

																condCompObj.push(condObj);
															}




														}
													}
												}
											}
										}
									}

									if(ansCount <= correctAns) {
										Question.list[key].status = "correct";
										Projectile.generate(player, "right");
										sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/throw.wav";
										sfxAudio.play();

									} else {
										Question.list[key].status = "wrong";
										Projectile.generate(Bully.list[bullyId], "left");
										sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/throw.wav";
										sfxAudio.play();
									}

								} else {
									Question.list[key].status = "wrong";
									Projectile.generate(Bully.list[bullyId], "left");
									sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/throw.wav";
									sfxAudio.play();
								}

								Question.closeDialog();
								vrbls = [];
								code_log = [];
								code_stack = [];

								document.getElementById("code_area").value = "";
								document.getElementById("textarea1").value = "1";

								var questionStat = Question.statusCheck(bullyId);

								if(questionStat.total_questions == (questionStat.correct_ans + questionStat.wrong_ans)) {
									// console.log("here");
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

		testCondition = function(cond) {

			if(/^true$/g.test(cond)) {
				return {status: true, result: true};
			} else if(/^false$/g.test(cond)) {
				return {status: true, result: false};
			} else if(/^\s*(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\'|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\]|true|false)\s*(==|<|>|<=|>=|<|>|!=)\s*(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\'|[A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\]|true|false)\s*$/g.test(cond)) {

				var split_param = cond.replace(/(==|<=|>=|<|>|!=)/g, ",");
				var cond_arr = split_param.split(",");
				var opp = /(==|<=|>=|<|>|!=)/g.exec(cond);
				// console.log(opp[0]);
				// console.log(cond_arr);
				var cond_1 = cond_arr[0].trim();
				var cond_2 = cond_arr[1].trim();

				console.log(cond_1 + " - " + cond_2);

				var testVal_1 = 0;
				var testVal_2 = 0;

				if(/^(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\'|true|false)$/g.test(cond_1)) {

					if(/^[0-9]+$/g.test(cond_1)) {
						testVal_1 = parseValue("int", cond_1);
					} else if(/^[0-9]*\.?[0-9]*$/g.test(cond_1)) {
						testVal_1 = parseValue("double", cond_1);
					} else if(/^\'[A-Za-z0-9]\'$/g.test(cond_1)) {
						testVal_1 = parseValue("char", cond_1);
					} else if(/^\"[A-Za-z0-9_\W]*\"$/g.test(cond_1)) {
						testVal_1 = parseValue("String", cond_1);
					} else if(/^(true|false)$/g.test(cond_1)) {
						testVal_1 = parseValue("Boolean", cond_1);
					}
				} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])$/g.test(cond_1)) {

					if(isVarExisting(cond_1.replace(/\[[0-9]*\]/g, ""))) {

						var var_1 = isVarExisting(cond_1.replace(/\[[0-9]*\]/g, ""));

						if(/\[[0-9]*\]/g.test(cond_1)) {

							var arrIndex = getConditions(cond_1, "[", "]");

							if(Array.isArray(var_1.var_value)) {

								if(var_1.var_value.length > arrIndex) {

									if(var_1.dataType == "char[]") {
										testVal_1 = parseValue(var_1.dataType.replace(/[\[\]]/g, ""), var_1.var_value[arrIndex].replace(/\"/g, "\'"));
									} else {
										testVal_1 = parseValue(var_1.dataType.replace(/[\[\]]/g, ""), var_1.var_value[arrIndex]);
									}

								} else {
									return {status: false, message: "index out of range"};
								}
							} else {
								return {status: false, message: var_1.var_identifier + " is not an array"};
							}
						} else {

							if(!(Array.isArray(var_1.var_value))) {

								if(var_1.dataType == "char") {
									testVal_1 = parseValue(var_1.dataType.replace(/[\[\]]/g, ""), var_1.var_value.replace(/\"/g, "\'"));
								} else {
									testVal_1 = parseValue(var_1.dataType.replace(/[\[\]]/g, ""), var_1.var_value);
								}

							} else {
								return {status: false, message: "specify array index"};
							}
						}
					} else {

						return {status: false, message: "undefined variable " + cond_1.replace(/\[[0-9]*\]/g, "")};
					}

				}

				if(/^(\"[A-Za-z0-9_\W]*\"|[0-9]*\.?[0-9]*|\'[A-Za-z0-9]\'|true|false)$/g.test(cond_2)) {

					if(/^[0-9]+$/g.test(cond_2)) {
						testVal_2 = parseValue("int", cond_2);
					} else if(/^[0-9]*\.?[0-9]*$/g.test(cond_2)) {
						testVal_2 = parseValue("double", cond_2);
					} else if(/^\'[A-Za-z0-9]\'$/g.test(cond_2)) {
						testVal_2 = parseValue("char", cond_2);
					} else if(/^\"[A-Za-z0-9_\W]*\"$/g.test(cond_2)) {
						testVal_2 = parseValue("String", cond_2);
					} else if(/^(true|false)$/g.test(cond_2)) {
						testVal_2 = parseValue("Boolean", cond_2);
					}
				} else if(/^([A-Za-z][A-Za-z0-9_]*|[A-Za-z][A-Za-z0-9_]*\[[0-9]+\])$/g.test(cond_2)) {

					if(isVarExisting(cond_2.replace(/\[[0-9]*\]/g, ""))) {

						var var_2 = isVarExisting(cond_2.replace(/\[[0-9]*\]/g, ""));

						if(/\[[0-9]*\]/g.test(cond_2)) {

							var arrIndex = getConditions(cond_2, "[", "]");

							if(Array.isArray(var_2.var_value)) {

								if(var_2.var_value.length > arrIndex) {

									if(var_2.dataType == "char[]") {
										testVal_2 = parseValue(var_2.dataType.replace(/[\[\]]/g, ""), var_2.var_value[arrIndex].replace(/\"/g, "\'"));
									} else {
										testVal_2 = parseValue(var_2.dataType.replace(/[\[\]]/g, ""), var_2.var_value[arrIndex]);
									}
								} else {
									return {status: false, message: "index out of range"};
								}
							} else {
								return {status: false, message: var_2.var_identifier + " is not an array"};
							}
						} else {

							if(!(Array.isArray(var_2.var_value))) {

								if(var_2.dataType == "char") {
									testVal_2 = parseValue(var_2.dataType.replace(/[\[\]]/g, ""), var_2.var_value.replace(/\"/g, "\'"));
								} else {
									testVal_2 = parseValue(var_2.dataType.replace(/[\[\]]/g, ""), var_2.var_value);
								}
							} else {
								return {status: false, message: "specify array index"};
							}
						}
					} else {

						return {status: false, message: "undefined variable " + cond_2.replace(/\[[0-9]*\]/g, "")};
					}

				}

				// console.log(testVal_1);
				// console.log(testVal_2);

				if(testVal_1.status && testVal_2.status) {
					console.log(compareValues(testVal_1.value, testVal_2.value, opp[0]));
					return compareValues(testVal_1.value, testVal_2.value, opp[0]);
				} else {
					return {status: false, message: "incomparable types"}
				}
			}
		}

		compareValues = function(val1, val2, op) {

			try {

				if(op == "==") {
					if(val1 == val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				} else if(op == ">") {

					if(val1 > val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				} else if(op == "<") {

					if(val1 < val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				} else if(op == ">=") {

					if(val1 >= val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				} else if(op == "<=") {

					if(val1 <= val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				} else if(op == "!=") {

					if(val1 != val2) {
						return {status: true, result: true};
					} else {
						return {status: true, result: false};
					}
				}

			} catch(err) {
				console.log({status: false, message: "bad operand types for binary operator " + op});
				return {status: false, message: "bad operand types for binary operator " + op};
			}
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
				if(/^true$/i.test(value)) {
					return {status: true, value: true};
				} else if(/^false$/i.test(value)) {
					return {status: true, value: false};
				} else {
					return {status: false, message: "value is not a Boolean"};
				}
			}
		}

		assignValueToVar = function(saveTo_obj, assignParams) {

			var saveTo_dataType = saveTo_obj.dataType.replace(/[\[\]]/g, "");

			// if(Array.isArray(saveTo_obj.var_value)) {

				if(saveTo_dataType == "int" || saveTo_dataType == "String" || saveTo_dataType == "char" || saveTo_dataType == "Boolean") {

					if(assignParams.dataType.replace(/\[\]/g, "") == saveTo_dataType) {

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

					if(assignParams.dataType.replace(/\[\]/g, "") == "double") {

						if(Array.isArray(saveTo_obj.var_value)) {
							saveTo_obj.var_value[assignParams.saveTo_index] = assignParams.value;
						} else {
							saveTo_obj.var_value = assignParams.value;
						}

						return saveTo_obj;
					} else if(assignParams.dataType.replace(/\[\]/g, "") == "int") {
						
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

				// var lvlId = "<?php echo $level_info['LVL_ID'] ?>";

				// $.ajax({
				// 	type: 'POST',
				// 	url: '<?php echo base_url(); ?>Game/get_objectives',
				// 	data: {lvlId: lvlId},
				// 	dataType: 'json',
				// 	success: function(res) {
				// 		resolve(res);
				// 	},
				// 	error: function(err) {
				// 		console.log(err);
				// 	}
				// }).then(function(result) {

				// 	if(result.status) {
				// 		var objectives_list = result['objectives_list'];

				// 		for(var key in objectives_list) {

				// 			var taskObj = {};
				// 			var jsonObj = JSON.parse(objectives_list[key].OBJ_JSONVAL);
				// 			var objKey = Object.keys(jsonObj);

				// 			if(objKey[0] == "Finish") {

				// 				if(jsonObj['Finish'] == "True") {
				// 					taskObj = {finish: true};
				// 				} else {
				// 					taskObj = {finish: false};
				// 				}
				// 			} else if(objKey[0] == 'Defeat Bullies') {

				// 				taskObj = {defeat_bullies: parseInt(jsonObj['Defeat Bullies'])};

				// 			} else if(objKey[0] == 'Use command') {

				// 				taskObj = {use_command: jsonObj['Use command']};

				// 			} else if(objKey[0] == 'Collect Coins') {

				// 				taskObj = {collect_coins: parseInt(jsonObj['Collect Coins'])};

				// 			} else if(objKey[0] == 'Health') {

				// 				var healthPerc = parseFloat(parseInt(jsonObj['Health'])/100);
				// 				taskObj = {health: healthPerc};
				// 			}
							


				// 			Objective('obj_' + objectives_list[key].OBJ_NUM, false, objectives_list[key].OBJ_DESC, taskObj, parseInt(objectives_list[key].OBJ_POINTS));
				// 		}

				// 		console.log(Objective.list);
				// 	} else {
				// 		console.log(result.message);
				// 	}
				// });

				var objectives_list = gameData.objectives_list.objectives_list;
				console.log(gameData);

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

			self.img = imgSrc;

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
							sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/footsteps-2.wav";
							sfxAudio.play();

						}
					}

				} else if(!(self.pressingUp || self.pressingDown || self.pressingLeft || self.pressingRight)) {

					self.pressingRight = true;
					sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/footsteps-2.wav";
					sfxAudio.play();
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
						// alert(hpPercent);
						if(hpPercent >= 70)
						{
							document.getElementById('hp-bar').style.background = '#67c636';
						}
						else
						{
							document.getElementById('hp-bar').style.background = '#ffce12';

						}
							document.getElementById('hp-bar').style.content = hpPercent + '%';
						$(".player-hp-bar").css("width", hpPercent + "%");
						// $(".player-hp-bar:after").css("content", hpPercent + "%");
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
											// console.log(valObj);
										}

										answers.variables[akey].var_value = arrValue;

									} else {
										
										var valObj = parseValue(answers.variables[akey].dataType, answers.variables[akey].var_value);
										answers.variables[akey].var_value = valObj.value;
										// console.log(valObj);
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

			// isPaused = false;

			Bully.list = {};
			Objective.list = {};
			Question.list = {};
			Projectile.list = {};
			Maps.current = {};

			Maps.init();
			Objective.init();
			Bully.init();
			Question.init();

			player = new Player('myPlayer1', img.player, img.player.width/4, img.player.height/4, 56, 56, 10);


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
					sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/success.ogg";
					sfxAudio.play();
                    bgmAudio.pause();
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

		preloadGameData().done(function(images) {

			console.log("done preloading");
		});

		// preloadImages([
		// 	"<?php echo base_url(); ?>assets/images/levels/<?php echo $level_info['LVL_FILENAME'] ?>",
		// 	"<?php echo base_url(); ?>assets/images/avatars/sprites/<?php echo $avatar['AVTR_SPRITE_FILENAME']?>",
		// 	"<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-10.png",
		// 	"<?php echo base_url(); ?>assets/images/projectile.png"
		// ]).done(function(images) {

		// 	startNewGame();

		// 	setInterval(update, 40);
		// });

		// startNewGame();

		// setInterval(update, 40);

	});
</script>