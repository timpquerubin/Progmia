<div id="page">
	<div class="container-fluid">
	<!-- <div class="menu collapse in" id="menu">
	    <div class="row">
	        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	            <ul class="page-navigation">
	                <li>
	                    <a class="navbar-brand" href="<?php echo base_url(); ?>Game/MainMenu"><img class="img-responsive" src="<?php echo base_url();?>assets/images/PROGMIA LOGO SIZES-XXS.png"/></a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url(); ?>Game/Levels/<?php echo $level_info['STG_ID'] ?>"><i class="fa fa-arrow-left"></i></a>
	                </li>
	            </ul>
	        </div>
	        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	            <div class="title">
	                <h1>Level X</h1>
	                <p>Topic XXX</p>
	            </div>
	        </div>
	        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	            <ul class="" style="list-style:none;display:flex;justify-content: space-around;padding:0px !important;font-size: 30px;padding-top:20px;">
	                <li><button id="tutorial" data-toggle="modal" data-target="#tutorial-modal"><i class="fa fa-question"></i></button></li>
	                <li><button data-toggle="modal" data-target="#settings-modal"><i class="fa fa-sliders"></i></button></li>
	            </ul>
	        </div>
	    </div>
	</div> -->
	<div class="menu collapse in" id="menu">
		<div class="row">
			<nav class="main-nav">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<ul class="page-navigation">
						<li>
							<button class="back"><a href="<?php echo base_url(); ?>Game/Levels/<?php echo $level_info['STG_ID'] ?>"><i class="fa fa-arrow-left"></i></a></button>
						</li>
					</ul>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <ul class="settings-ul">
		                <li>
							<button data-toggle="modal" data-target="#goal-modal" id="goal"><i class="fa fa-check"></i>Goal</button>
						</li>
		                <li><button id="settings" data-toggle="modal" data-target="#settings-modal"><i class="fa fa-sliders"></i>Settings</button>
		                </li>
						<li>
						<button onclick="startNewGame();" id="restart"><i class="fa fa-repeat"></i>Restart</button>
						</li>
		            </ul>
		        </div>
		    </nav>
		</div>
	</div>
	<input type="hidden" name="mapId" id="mapId" value="<?php echo isset($level[0]['LVL_ID']) ? $level[0]['LVL_ID'] : '' ?>" />
	<input type="hidden" name="mapGRID" id="mapGRID" value="<?php echo isset($level[0]['LVL_GRID']) ? $level[0]['LVL_GRID'] : '' ?>" />
	<input type="hidden" name="startPt" id="startPt" value="<?php echo $level[0]['LVL_STARTPOINT']?>">
	<input type="hidden" name="map_filename" id="map_filename" value="<?php echo isset($level[0]['LVL_FILENAME']) ? $level[0]['LVL_FILENAME'] : '' ?>">
	<input type="hidden" name="map_width" id="map_width" value="<?php echo isset($level[0]['LVL_NUMCOLS']) ? $level[0]['LVL_NUMCOLS'] : '' ?>">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="canvas-container">
					<div class="game-area">
						
						<div class="player-status">
							<div class="avatar">
								<img class="img-responsive avtr-thumb" src="<?php echo base_url(); ?>assets/images/avatars/THUMBNAIL/<?php echo $avatar['AVTR_THUMBNAIL_FILENAME']?>">
							</div>
							<div class="hp-bar">
								<?php $user = $this->session->userdata('username');?>
								<label class="user"><?php echo $user;?></label>
								<div class="progress" style="padding: 0px;">
								 	<div class="progress-bar progress-bar-danger player-hp-bar" id="hp-bar" role="progressbar" style="width: 100%">
								 	</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="game-menu" style="height: <?php echo $level[0]['LVL_IMGHEIGHT']/2; ?>;">
						<div class="player-hp">
							<label class="col-sm-1 col-xs-2 col-md-2 col-lg-2" style="color: #FFF;">HP:</label>
							<div class="progress col-sm-3 col-xs-5" style="padding: 0px;">
							 	<div class="progress-bar progress-bar-danger player-hp-bar" role="progressbar" style="width: 100%"></div>
							</div>
						</div>
					</div> -->
						<div class="">
						<canvas id="ctx" width="<?php echo $level[0]['LVL_IMGWIDTH']*1.25; ?>" height="<?php echo $level[0]['LVL_IMGHEIGHT']*1.25; ?>" style="border:1px solid #000000;"></canvas>
						</div>
				</div>
			</div>
				<!-- <div id="test" class="col-sm-2"></div> -->
			
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">			
				<div class="code-area-container wrapper-1">

					<div class="row"><h1 class="title">Code Area</h1><button id="tutorial" data-toggle="modal" data-target="#tutorial-modal"><i class="fa fa-book"></i></button></div>
					<!-- <center><button class="btn btn-default" onclick="executeCommand(0);">RUN</button></center> -->
					<div class="row code_area">
						<div class="line-number col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<textarea rows="10" id="textarea1" disabled></textarea>
						</div>
						<div class="code-area-container border-custom col-lg-11 col-md-11 col-sm-11 col-xs-11">
							<textarea class="code_area" id="code_area" name="code_area" rows="10" onscroll="document.getElementById('textarea1').scrollTop = this.scrollTop;"></textarea>
						</div>
					</div>
					<div class="row button-run-container">
						<div class="button-run col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
							<button class="btn btn-basic btn-block" onclick="executeCommand(0);"><i class="fa fa-play" style="margin-right:10px;"></i>Execute</button>
						</div>
					</div>
					<!-- <textarea onscroll="this.form.elements.textarea1.scrollTop = this.scrollTop;" name="textarea2" ></textarea> -->
				</div>
			</div>
		</div>
		<div id="tutorial">
			<div id="tutorial-modal" class="modal fade multi-step" style="display: none;">
				<div class="tutorial-container">
				</div>
			</div>
		</div>
		<!-- <div id="obj_modal" class="modal" style="display: none;">
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
									<div class="obj-description col-md-8">
										<p><?php echo isset($obj['OBJ_DESC']) ? $obj['OBJ_DESC'] : "" ?></p>
									</div>
									<div class="obj-status col-md-4">
										<input id="obj_<?php echo $obj['OBJ_NUM']; ?>_status" type="checkbox" name="obj_status">
									</div>
								</div>
							</li>	
						<?php endforeach ?>
					</ul>
				</div>
				
			</div>
		</div> -->

		
		<div id="goal-modal" class="modal fade multi-step" style="display: none;">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Goal</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
					</div>
					<div class="modal-body">
						<div id="steps">
							<?php $goal = $level_info['LVL_DESC'];
							$goalarray = explode(",", $goal);?>
							<h3></h3>
						    <section>
								<div class="tutorialDescription">
								    <?php foreach($goalarray as $goaldesc){?>
								    <p style="display:inline-flex;align-items: center;"><i style="margin-right: 10px;" class="fa fa-check"></i><?php echo $goaldesc;?>.</p>
								    <?php }?>
								</div>
						    </section>
						    <h3></h3>
						    <section>
								<div class="tutorialDescription">
								    <h2>How to play</h2>
								    <ul>
								    	<li>
										    <p>The bully instructs you to code something:</p>
										    <img class="img-responsive" src="<?php echo base_url();?>assets/images/Screenshot-2018-3-18 Progmia Game.png" alt="dialog" />
										</li>
								    	<li>
										    <p>Type the correct code on <strong>Code Area</strong></p>
										    <img class="img-responsive" src="<?php echo base_url();?>assets/images/code-area.png" alt="dialog" />
								    	</li>
								    </ul>
								</div>
							</section>
						    <h3></h3>
						    <section>
								<div class="tutorialDescription">
								    <h2>How to play (continuation...)</h2>
								    <ul>
								    	<li>
									    <p>After typing your code, hit Execute button to run code</p>
									    <img class="img-responsive" src="<?php echo base_url();?>assets/images/execute button.png" alt="execute button" />
								    	</li>
								    	<li>
									    <p>Defeat more bullies until you reach the checkpoint.</p>
									    <img class="img-responsive" src="<?php echo base_url();?>assets/images/checkpoint.png" alt="execute button" />
								    	</li>
								    </ul>
									    <p style="display:inline-flex;align-items: center;">Tip: you can read the<img class="img-responsive" style="margin:0 10px;" src="<?php echo base_url();?>assets/images/guide button.png" alt="guide button" /> as guide for coding.</p>
								</div>
							</section>
						</div>

						<div class="badges-block" style="margin: 0px; padding: 0px; width: 100%;"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="finish-modal" class="modal" style="display: none;">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<ul class="star">
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
					<div class="modal-header">
						<h5 class="modal-title" id="resultTitle">Level Completed!!!</h5>
					</div>
					<div class="modal-body">
						<div class="objectives">
						<h3 class="goal">Goal</h3>
							<ul class="objectives" id="objectives">
								    <?php foreach($goalarray as $goaldesc){?>
									<li><i style="margin-right: 10px;" class="fa fa-check"></i><p><?php echo $goaldesc;?>.</p></p>
									</li>	
								    <?php }?>
							</ul>
							<div class="objective-progress">
								<div class="progress" style="padding: 0px;">
								 	<div class="progress-bar progress-bar-danger player-objective-bar" id="objective-bar" role="progressbar" style="width: 100%">
								 	</div>
								</div>
							</div>
						</div>

						<div class="badges-block" style="margin: 0px; padding: 0px; width: 100%;"></div>
					</div>
					<div class="modal-footer">
					<div class="modal-footer">
							<ul class="finish-ul">
								
								<li>
									<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/Levels/<?php echo $level_info['STG_ID'] ?>">Level Menu</a>
								</li>
								<li>
									<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/play_basics/<?php echo $level_info['LVL_ID'] ?>">Repeat Level</a>
								</li>
								<li>
									<?php if(isset($next_level_info["LVL_ID"])) { ?>
										<a class="btn btn-default" style="display: inline-block;" href="<?php echo base_url(); ?>Game/play_basics/<?php echo $next_level_info['LVL_ID'] ?>">Next Level</a>
									<?php } ?>
								</li>
							</ul>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){



		load_tutorial = function(){

			var tutorial_filename = "<?php echo isset($level_info['LVL_TUTORIAL']) ? $level_info['LVL_TUTORIAL'] : "" ?>";

			if(tutorial_filename != "") {

				var data = {
					link:"game/tutorial/" + "<?php echo $level_info['LVL_TUTORIAL'] ?>"
				}

				$.ajax({
					type:"POST",
					url: "<?php echo base_url();?>Game/load_tutorial",
					data: data,
					success: function(res){	
						$("#tutorial-modal").html(res);
                $('div#goal').appendTo('.tutorial-container #steps');
						setTimeout(function()
						{
							// $('#tutorial-modal').modal('show');
							// load_tutorial();
						}, 1500);
					},
					error: function(res){
						console.log(res);
					}	
				});
			}
			else{
				
				$("button#tutorial").hide();
			}
		}
				
		load_tutorial();

	var success = new Audio();
	success.src = "<?php echo base_url(); ?>assets/sounds/sfx/success.ogg";
	var ctx = document.getElementById("ctx").getContext("2d");
	var canvas = document.getElementById("ctx");
	var code_area = document.getElementById('code_area');
	var map_grid = document.getElementById('mapGRID').value;
	var start_point = document.getElementById('startPt').value;
	var map_filename = document.getElementById('map_filename').value;
	var map_numcols = parseInt(document.getElementById('map_width').value);

	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	$("#obj_modal_btn").click(function() {
		document.getElementById('obj_modal').style.display = "block";
	});

	$("#obj_modal_close").click(function() {
		document.getElementById('obj_modal').style.display = "none";
	});

	document.getElementById('textarea1').value = '1';

	ctx.font = '30px Arial';
	
	var TILE_SIZE = 20;
	var cmdNum = 0;
	var bumpWallCtr = 0;
	var moveCtr = 0;
	var isloop = false;
	var startloop = 0;
	var bullyCount = 0;
	var KilledBullies = 0;
	var coinCount = 0;
	var collectedCoins = 0;
	var code_stack = [];
	var code_var = [];

	var used_loop = false;
	var used_if = false;

	var isFinished = false;
	var isPaused = true;

	var preloadProgCtr = 0;
	var gameImgArr = [
		"<?php echo base_url(); ?>assets/images/avatars/sprites/bully-07.png",
		"<?php echo base_url(); ?>assets/images/levels/" + map_filename,
		"<?php echo base_url(); ?>assets/images/key.png",
		"<?php echo base_url(); ?>assets/images/coin_spritesheet.png",
		"<?php echo base_url(); ?>assets/images/projectile.png",
	];

	var img = {};
	img.player = new Image();
	// img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/FINAL_SPRITE_BODY.png";
	img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/PLAYER-06.png";
	img.bully = new Image();
	img.bully.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/bully-07.png";
	img.map = new Image();
	img.map.src = "<?php echo base_url(); ?>assets/images/levels/" + map_filename;
	img.key = new Image();
	img.key.src = "<?php echo base_url(); ?>assets/images/key.png";
	img.coin = new Image();
	img.coin.src = "<?php echo base_url(); ?>assets/images/coin_spritesheet.png";
	img.projectile = new Image();
	img.projectile.src = "<?php echo base_url(); ?>assets/images/projectile.png";

	updateLoadProgBar = function() {

		var loadPercent = (preloadProgCtr/(gameImgArr.length))*100;
		$(".load-bar").css("width", loadPercent + "%");
	}

	preloadGameData = function() {

		var newImages = [];
		var loadedImages = 0;

		postAction = function() {
			startNewGame();
			setInterval(update, 40);
			// setTimeout(function() 
			// {
			// 	$('#tutorial-modal').modal('show');
			// 	load_tutorial();
			// }, 1500);
		}

		imageLoadPost = function() {

			loadedImages++;
			preloadProgCtr++;
			updateLoadProgBar();

			$('#goal-modal').modal('show');

			console.log(preloadProgCtr);

			if(loadedImages >= gameImgArr.length) {

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
		}
	}

	check_badges = function() {

		var stage_id = "<?php echo $level_info['STG_ID'] ?>";

		var promise = new Promise(function(resolve, reject) {

			var badge_data = {
				stage_id: stage_id,
			};

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Game/check_badges",
				data: badge_data,
				dataType: 'json',
				// success: function(res) {
				// 	return res;
				// },
				error: function(err) {
					console.log("failed to check badges due to connection error");
				},
				complete: function(comp) {
					resolve(comp);
				}
			});
		}).then(function(badge_list) {

			var list = {
				badge_list: badge_list,
			}

			console.log(badge_list);

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Game/load_badge_block",
				data: list,
				success: function(badge_html) {
					$(".badges-block").html(badge_html);
				},
				error: function(err) {
					console.log("failed to load badges due to connection error");
				}
			});
		});
	}

	$("#code_area").keyup(function(event) {
	    // if (event.which == 13 || event.which == 8) {
	        var code = code_area.value.split("\n");
	        document.getElementById('textarea1').value = '';
	        for(var i = 0; i < code.length; i++)
	        {
	        	document.getElementById('textarea1').value += (i+1) + "\n";
	        }
	        event.preventDefault();
	    // } 
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

	testCollisionRectRect = function(rect1,rect2){
	return rect1.x <= rect2.x+rect2.width 
		&& rect2.x <= rect1.x+rect1.width
		&& rect1.y <= rect2.y + rect2.height
		&& rect2.y <= rect1.y + rect1.height;
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

	executeCommand = function(commandNum)
	{
		var code_whole = code_area.value;
		var code = code_area.value.split("\n");
		var toNextCmd = true;
		var cmdLine = "";

		if(commandNum == 0 && isloop == false)
		{
			startNewGame();
		}
		
		if(commandNum < code.length)
		{
			cmdLine = code[commandNum].trim();

			if(/^}$/g.test(cmdLine)) {
				if(code_stack[code_stack.length - 1].command == "while") {
					cmdNum = startloop;
					// isloop = false;
				} else if(code_stack[code_stack.length - 1].command == "if") {

				}

				moveCtr = 97*1.25;
				code_stack.pop();
				console.log("pop");
			} else if((code_stack.length > 0) && (code_stack[code_stack.length - 1].cond_result == false)) {
				moveCtr = 97*1.25;
			} else if(/^student\.moveRight\(\);$/g.test(cmdLine)) {
				player.isPressingRight = true;
			} else if(/^student\.moveUp\(\);$/g.test(cmdLine)) {
				player.isPressingUp = true;
			} else if(/^student\.moveDown\(\);$/g.test(cmdLine)) {
				player.isPressingDown = true;
			} else if(/^student\.moveLeft\(\);$/g.test(cmdLine)) {
				player.isPressingLeft = true;
			} else if(/^student\.throw/g.test(cmdLine)) {
				if(player.atkCtr == 100) {

					var dir =  cmdLine.substring(cmdLine.indexOf("(") + 1, cmdLine.indexOf(")"));
					dir = dir.split("\"");

					player.throwProjectile(dir[1]);
					player.atkCtr = 0;
					moveCtr = 97*1.25;
				} else {
					toNextCmd = false;
				}
			} else if(/^while\([A-Za-z0-9=<>()\s]*\)\s*{$/g.test(cmdLine)) {
				used_loop = true;
				isloop = true;
				startloop = commandNum - 1;
				moveCtr = 97*1.25;
				code_stack.push({
					command: "while", 
					param: cmdLine.substr((cmdLine.indexOf("(") + 1), cmdLine.indexOf(")") - (cmdLine.indexOf("(") + 1)),
					cond_result: true
				});
				console.log(getConditions(cmdLine, "(", ")"));
			} else if(/^if\([A-Za-z0-9=<>()\s]*\)\s*{$/g.test(cmdLine)) {

				var result = false;

				used_if = true;

				if(/^isEnemyInRange\(\)$/g.test(getConditions(cmdLine, "(", ")"))) {
					if(player.isEnemyInRange() != false) {
						result = true;
					} else {
						result = false;
					}
				} else if(/^false$/g.test(getConditions(cmdLine, "(", ")"))) {
					result = false;
				} else if(/^true$/g.test(getConditions(cmdLine, "(", ")"))) {
					result = true;
				}

				moveCtr = 97*1.25;
				code_stack.push({
					command: "if", 
					param: cmdLine.substr((cmdLine.indexOf("(") + 1), cmdLine.indexOf(")") - (cmdLine.indexOf("(") + 1)),
					cond_result: result
				});
				console.log(getConditions(cmdLine, "(", ")"));
			} else if(/^System\.out\.println\([A-Za-z0-9"+()\s]*\);$/g.test(cmdLine)) {
				player.say("hello");
			} else {
				console.log('error: invalid command: ' + cmdLine);
				moveCtr = 97*1.25;
			}

			console.log('execute line '+ commandNum +':' + code[commandNum]);

			if(!toNextCmd) {
				moveCtr = 97*1.25;
			} else {
				cmdNum++;
			}

		} else {
			console.log("end of code");
		}
	}

	// document.onkeydown = function(event){
	// 	if(event.keyCode === 68)	//d
	// 		player.isPressingRight = true;
	// 	else if(event.keyCode === 83)	//s
	// 		player.isPressingDown = true;
	// 	else if(event.keyCode === 65) //a
	// 		player.isPressingLeft = true;
	// 	else if(event.keyCode === 87) // w
	// 		player.isPressingUp = true;
		
	// // else if(event.keyCode === 80) //p
	// // 	paused = !paused;
	// }

	// document.onkeyup = function(event){
	// 	if(event.keyCode === 68)	//d
	// 		player.isPressingRight = false;
	// 	else if(event.keyCode === 83)	//s
	// 		player.isPressingDown = false;
	// 	else if(event.keyCode === 65) //a
	// 		player.isPressingLeft = false;
	// 	else if(event.keyCode === 87) // w
	// 		player.isPressingUp = false;
	// }



	Maps = function(id, imgSrc, grid, startPt)
	{
		var self = {
			id: id,
			image: new Image(),
			width: 0,
			height: 0,
			grid: grid,
			startPt: startPt,
			// objectives: objectives,
		};
		
		self.image.src = imgSrc;
		self.height = self.image.height;
		self.width = self.image.width;

		self.update = function()
		{
			self.draw();
		}
		
		self.draw = function()
		{
			ctx.drawImage(self.image, 0, 0, self.image.width, self.image.height, 0, 0, self.image.width*1.25, self.image.height*1.25);
		};

		self.isPossitionWall = function(pt)
		{
			gridX = Math.floor(pt.x / TILE_SIZE);
			gridY = Math.floor(pt.y / TILE_SIZE);

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

		return self;
	}

	Maps.current = {};

	Maps.init = function(id, imgSrc, rowTiles, collArray, startPt)
	{
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

		Maps.current = Maps(id, imgSrc, mapGrid2d, startPt);
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

	Objective.init = function() {

		var promise = new Promise(function(resolve, reject) {

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>Game/get_objectives',
				data: {lvlId: document.getElementById("mapId").value},
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

						} else if(objKey[0] == 'Use Command') {

							taskObj = {use_command: jsonObj['Use Command']};
							// console.log(taskObj);

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

				var hpPerc = player.hp / player.hpMax;
				
				if(hpPerc >= Objective.list[key].task.health) {
					Objective.list[key].status = true;
					// document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
						// console.log("#" + Objective.list[key].id + "_status");
						$("#" + Objective.list[key].id + "_status").addClass("checked");
				} else {
					Objective.list[key].status = true;
					$("#" + Objective.list[key].id + "_status").removeClass("checked");
				}
			} else if(objKey == 'collect_coins') {

				if(collectedCoins == Objective.list[key].task.collect_coins) {
					Objective.list[key].status = true;
					// document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");

						// console.log("#" + Objective.list[key].id + "_status");
						$("#" + Objective.list[key].id + "_status").addClass("checked");
				}
			} else if(objKey == 'defeat_bullies') {

				if(KilledBullies >= Objective.list[key].task.defeat_bullies) {
					Objective.list[key].status = true;
					// document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");

						// console.log("#" + Objective.list[key].id + "_status");
						$("#" + Objective.list[key].id + "_status").addClass("checked");
				}
			} else if(objKey == 'use_command') {

				if(Objective.list[key].task.use_command == 'Loop') {
					if(used_loop) {
						Objective.list[key].status = true;
						// document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");

						// console.log("#" + Objective.list[key].id + "_status");
						$("#" + Objective.list[key].id + "_status").addClass("checked");
					}
				}

				if(Objective.list[key].task.use_command == 'If') {
					if(used_if) {
						Objective.list[key].status = true;
						$("#" + Objective.list[key].id + "_status").addClass("checked");
						document.getElementById(Objective.list[key].id + "_status").setAttribute("checked", "true");
					}
				}
			} else if(objKey == 'finish') {
				if(isFinished) {
					Objective.list[key].status = true;
					$("#" + Objective.list[key].id + "_status").addClass("checked");
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
					$("#resultTitle").text("You Lose");
					$("ul#objectives").addClass("lose");
					$("ul#objectives i").removeClass("fa-check");
					$("#star1").addClass("no-score u1");
					$("#star2").addClass("no-score u2");
					$("#star3").addClass("no-score u3");
				}

		return totalScore;
	}

	Objective.recordScore = function() {

		var aquiredScore = Objective.computeScore();

		var promise = new Promise(function(resolve, reject) {

			var data = {
				lvl_id: document.getElementById("mapId").value,
				total_score: aquiredScore
			}

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>Game/record_progress',
				data: data,
				dataType: 'json',
				success: function(res) {
					resolve(res);
				},
				error: function(err) {
					console.log(err);
				}
			});
		}).then(function(record_res) {
			check_badges();
		});
	}

	Objective.list = {};

	Player = function(id, x, y, width, height, image)
	{
		var self = {
			id: id,
			x: x,
			y: y,
			img: new Image(),
			width: width,
			height: height,
			type: "player",
			atkSpd: 5,
			atkCtr: 100,
			hp: 4,
			hpMax: 4,
		};

		self.isPressingUp = false;
		self.isPressingDown = false;
		self.isPressingLeft = false;
		self.isPressingRight = false;

		self.spriteAnimCounter = 0;


		self.img.src = image.src;

		self.update = function()
		{
			if(self.atkCtr < 100)
				self.atkCtr += self.atkSpd;

			if(player.hp <= 0) {
				// alert("error: player is dead");

				// startNewGame();
				isPaused = true;
				Objective.computeScore();
				Objective.recordScore();
				$("#resultTitle").html("You Lost");
				$("#finish-modal").css("display", "block");
			}

			if (self.isPressingRight || self.isPressingLeft || self.isPressingDown || self.isPressingUp) 
			{
				self.spriteAnimCounter += 0.25;
				moveCtr += 6;
				// document.getElementById('test').innerHTML = "moveCtr: " + moveCtr;
			} else {
				// executeCommand(cmdNum);
			}


			self.updatePosition();
			self.draw();
		};

		self.draw = function()
		{
			var x = self.x - self.width/2;
			var y = self.y - self.height/2;

			var frameWidth = self.img.width/4;
			var frameHeight = self.img.height/4;

			// var frameWidth = self.img.width/3;
			// var frameHeight = self.img.height/4;

			var directionMod = 0;
			var walkingMod = Math.floor(self.spriteAnimCounter) % 4;

			if(self.isPressingUp)
				directionMod = 3;
			if(self.isPressingLeft)
				directionMod = 1;
			if(self.isPressingRight)
				directionMod = 2;

			ctx.drawImage(self.img, walkingMod * frameWidth, directionMod * frameHeight, self.img.width/4, self.img.height/4, x, y, self.width, self.height);
			// ctx.fillStyle = "#FF0000";
			// ctx.fillRect(self.x, self.y, 5,5);
		};

		self.updatePosition = function()
		{
			var isError = false;
			oldX = self.x;
			oldY = self.y;

			topBumper = {x: self.x, y: self.y - self.height/2};
			bottomBumper = {x: self.x, y: self.y + self.height/2};
			leftBumper = {x: self.x - self.width/2, y: self.y};
			rightBumper = {x: self.x + self.width/2, y: self.y};

			// ctx.fillStyle = "#FF0000";
			// ctx.fillRect(topBumper.x, topBumper.y, 5,5);
			// ctx.fillRect(bottomBumper.x, bottomBumper.y, 5,5);
			// ctx.fillRect(leftBumper.x, leftBumper.y, 5,5);
			// ctx.fillRect(rightBumper.x, rightBumper.y, 5,5);

			if( (Maps.current.isPossitionWall(topBumper) === 4) || (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(bottomBumper) === 4) || (Maps.current.isPossitionWall(rightBumper) === 4))
			{
				console.log(bullyCount > 0);
				// key.status != true && 
				if(key.status != true)
				{
					alert('error: door locked');
					startNewGame();

				} else {	

					isFinished = true;
					Objective.update();
					// console.log(Objective.list);
					// Objective.recordScore();

					
					sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/success.ogg";
					sfxAudio.play();
                    bgmAudio.pause();
    				// modal.style.display = "block";
					// startNewGame();
    			}
			}

			if(moveCtr <= 96*1.25)
			{
				if(Maps.current.isPossitionWall(topBumper) === 5)
				{
					self.y += 6;
					isError = true;

				} else {
					if(self.isPressingUp)
						self.y -= 6;
				}
				if(Maps.current.isPossitionWall(bottomBumper) === 5)
				{
					self.y -= 6;
					isError = true;
					
				} else {
					if(self.isPressingDown)
						self.y += 6;
				}
				if(Maps.current.isPossitionWall(leftBumper) === 5)
				{
					
					self.x += 6;
					isError = true;
				} else {
					if(self.isPressingLeft)
						self.x -= 6;
				}
				if(Maps.current.isPossitionWall(rightBumper) === 5)
				{
						
					self.x -= 6;
					isError = true;
				} else {
					if(self.isPressingRight)
						self.x += 6;
				}
			} else {
				self.isPressingUp = false;
				self.isPressingDown = false;
				self.isPressingRight = false;
				self.isPressingLeft = false;
				moveCtr = 0;
				executeCommand(cmdNum);
			}

			if(isError)
			{
				isPaused = true;
                bgmAudio.pause();
				Objective.computeScore();
				Objective.recordScore();
				$("#finish-modal").css("display", "block");
				isPaused = true;
				console.log(isPaused);
				// alert('error: Dead End');
			}
			
			// for(var key in Maps.current.objectives)
			// {
			// 	checkptDiffX = Maps.current.objectives[key].checkPt.x - player.x;
			// 	checkptDiffY = Maps.current.objectives[key].checkPt.y - player.y;

			// 	if(checkptDiffY == 0 && checkptDiffX == 0)
			// 	{
			// 		Maps.current.objectives[key].status = true;
			// 		self.isPressingUp = false;
			// 		self.isPressingDown = false;
			// 		self.isPressingRight = false;
			// 		self.isPressingLeft = false;

			// 		executeCommand(cmdNum);
			// 	}
			// }

			// for(var key in Maps.current.objectives)
			// {
			// 	if(!Maps.current.objectives[key].status)
			// 	{
			// 		checkptDiffX = Maps.current.objectives[key].chkptEnd.x - Maps.current.objectives[key].chkptStart.x;
			// 		checkptDiffY = Maps.current.objectives[key].chkptEnd.y - Maps.current.objectives[key].chkptStart.y;

			// 		if(checkptDiffX == 0)
			// 		{
			// 			for(var i = Maps.current.objectives[key].chkptStart.y; i < Maps.current.objectives[key].chkptEnd.y; i++)
			// 			{
			// 				if(self.x == Maps.current.objectives[key].chkptStart.x && self.y == i)
			// 				{
			// 					Maps.current.objectives[key].status = true;
			// 					player.isPressingUp = false;
			// 					player.isPressingDown = false;
			// 					player.isPressingRight = false;
			// 					player.isPressingLeft = false;

			// 					executeCommand(cmdNum);
			// 				}
			// 			}
			// 		}
			// 		if(checkptDiffY == 0)
			// 		{
			// 			for(var i = Maps.current.objectives[key].chkptStart.x; i < Maps.current.objectives[key].chkptEnd.x; i++)
			// 			{
			// 				if(self.y == Maps.current.objectives[key].chkptStart.y && self.x == i)
			// 				{
			// 					Maps.current.objectives[key].status = true;
			// 					player.isPressingUp = false;
			// 					player.isPressingDown = false;
			// 					player.isPressingRight = false;
			// 					player.isPressingLeft = false;

			// 					executeCommand(cmdNum);
			// 				}
			// 			}
			// 		}
			// 	}
			// }
		};

		self.say = function(strSay) {

			Dialog.generate("testing", "player");
		}

		self.isEnemyInRange = function() {
			
			for(var key in Bully.list) {

				if(Bully.list[key].x === self.x) {
					if(((self.y - Bully.list[key].y) <= 120) && ((self.y - Bully.list[key].y) > 0)) {
						return "up";
					} else if(((self.y - Bully.list[key].y) >= -120) && ((self.y - Bully.list[key].y) < 0)) {
						return "down";
					}
				} else if(Bully.list[key].y === self.y) {
					if(((self.x - Bully.list[key].x) <= 120) && ((self.x - Bully.list[key].x) > 0)) {
						return "left";
					} else if(((self.x - Bully.list[key].x) >= -120) && ((self.x - Bully.list[key].x) < 0)) {
						return "right";
					}
				} else {
					return false;
				}
			}

			return false;
		}

		self.throwProjectile = function(direction) {
			Projectile.generate(self, direction);
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

		return self;
	}

	Dialog = function(id, x, y, textString, dialogType) {

		var self = {
			id: id,
			x: x,
			y: y,
			duration: 30,
			type: dialogType,
			text: textString,
			toRemove: false,
		};

		self.update = function() {

			self.duration--;

			if(self.duration <= 0) {
				self.toRemove = true;
			}

			self.draw();

		}

		self.draw = function() {

			ctx.save();

			if(self.type == "player")
			
			ctx.font = "15px Arial";
			ctx.fillText("\"" + textString + "\"", player.x + 25 , player.y + 7);

			ctx.restore();
		}

		Dialog.list[id] = self;
	}

	Dialog.list = {};

	Dialog.update = function() {

		for(var key in Dialog.list) {
			Dialog.list[key].update();

			if(Dialog.list[key].toRemove) {
				delete Dialog.list[key];
			}
		}
	}

	Dialog.generate = function(textSay, type) {

		var id = Math.random();

		Dialog("dlg_" + id, 0, 0, textSay, type);
	}

	Bully = function(id, x, y, height, width, imgSrc) 
	{
		var self = {
			id: id,
			x: x,
			y: y,
			hp: 2,
			hpMax: 2,
			atkSpd: 2,
			atkCtr: 100,
			type: "bully",
			height: height,
			width: width,
			img: new Image(),
			toRemove: false,
		};

		self.img.src = imgSrc;

		self.update = function() {

			if(self.atkCtr < 100)
				self.atkCtr += self.atkSpd;

			if(self.hp <= 0) {
				self.toRemove = true;
			}

			self.updatePosition();
			self.draw();
			self.throw();
		}

		self.draw = function() {

			var x = self.x - self.width/2;
			var y = self.y - self.height/2;

			var frameWidth = self.img.width/4;
			var frameHeight = self.img.height/4;

			var directionMod = 0;

			var diffX = player.x - self.x;
			var diffY = player.y - self.y;
			
			var angleToUser = Math.atan2(diffY,diffX) / Math.PI * 180

			if(angleToUser < 0)
				angleToUser = 360 + angleToUser;

			var directionMod = 2; // right

			if(angleToUser >= 45 && angleToUser < 135) // down
				directionMod = 0;
			if(angleToUser >= 135 && angleToUser < 225) // left
				directionMod = 1;
			if(angleToUser >= 225 && angleToUser < 315) // up
				directionMod = 3;

			ctx.drawImage(self.img, 0, directionMod * frameHeight, self.img.width/4, self.img.height/4, x, y, self.width, self.height);
			ctx.save();

			var x = self.x;
			var y = self.y - self.height/2;

			ctx.fillStyle = 'red';
			var width = 50 * (self.hp / self.hpMax);

			if(width < 0)
			{
				width = 0;
			}

			ctx.fillRect(x-25, y-10, width, 8);
			ctx.strokeStyle = 'black';
			ctx.strokeRect(x-25, y-10, 50, 8);

			ctx.restore();
		}

		self.updatePosition = function() {}

		self.throw = function() {
			if(self.atkCtr >= 100) {

				var direction = "";

				if(player.x === self.x) {
					if(((self.y - player.y) > 0) && ((self.y - player.y) < 97*1.25)) {
						direction = "up";
					} else if(((self.y - player.y) < 0) && ((self.y - player.y) > -97*1.25)) {
						direction = "down";
					}

					// if(player.y > self.y) {
					// 	direction = "down";
					// } else {
					// 	direction = "up";
					// }
				}

				if(player.y === self.y) {
					if(((self.x - player.x) > 0) && ((self.x - player.x) < 97*1.25)) {
						direction = "left";
					} else if(((self.x - player.x) < 0) && ((self.x - player.x) > -97*1.25)) {
						direction = "right";
					}

					// if(player.x > self.x) {
					// 	direction = "right";
					// } else {
					// 	direction = "left"
					// }
				}

				if(direction != "") {
					Projectile.generate(self, direction);
					self.atkCtr = 0;
				}
			}
		}

		Bully.list[id] = self;
	}

	Bully.init = function() {
		var bullyX = 0;
		var bullyY = 0;
		var bullyId = "";
		var startPoint = 0;

		for(var i = 0; i < Maps.current.grid.length; i++)
		{
			startPoint = 0;
			
			do{
				if(Maps.current.grid[i].indexOf(7, startPoint) != -1)
				{
					bullyX = (Maps.current.grid[i].indexOf(7, startPoint) * TILE_SIZE) + TILE_SIZE/2;
					bullyY = (i  * TILE_SIZE) + TILE_SIZE/2;
					bullyId = "bully_" + Math.random();
				
					Bully(bullyId, bullyX, bullyY, img.bully.height/4, img.bully.width/4, img.bully.src);
					bullyCount++;
				}

				startPoint = Maps.current.grid[i].indexOf(7, startPoint) + 1;

			} while(startPoint != 0);
		}

		console.log("bullies: " + bullyCount);
	}

	Bully.update = function() {
		for(var key in Bully.list) {
			Bully.list[key].update();
		}

		for(var key in Bully.list) {
			if(Bully.list[key].toRemove === true)
			{
				delete Bully.list[key];
				// bullyCount--;
				KilledBullies++;

				console.log("Defeated Bullies: " + KilledBullies);
			}
		}
	}

	Bully.list = {};

	Key = function(id, status, imgSrc, height, width)
	{
		var self = {
			id: id,
			status: status,
			img: new Image(),
			x: 0,
			y: 0,
			height: height,
			width: width,
		};

		self.img.src = imgSrc;

		self.locate = function()
		{
			for(var i = 0; i < Maps.current.grid.length; i++)
			{
				if(Maps.current.grid[i].indexOf(3) != -1)
				{
					self.x = (Maps.current.grid[i].indexOf(3) * TILE_SIZE) + TILE_SIZE/2;
					self.y = (i  * TILE_SIZE) + TILE_SIZE/2;
					return;
				}
			}
		}

		self.update = function()
		{
			if(self.status != true)
			{
				if(player.testCollision(self) || (self.x == 0 && self.y == 0))
				{
					self.status = true;
				} else {
					self.draw();
				}
			}
		}

		self.draw = function()
		{
			ctx.drawImage(self.img, 0, 0, self.img.width, self.img.height, self.x - self.width/2, self.y - self.height/2, self.width, self.height);
		}

		return self;
	}

	Coin = function(id, imgSrc, height, width, x, y)
	{
		var self = {
			id: id,
			img: new Image(),
			x: x,
			y: y,
			height: height,
			width: width,
		};

		self.img.src = imgSrc;
		self.spriteAnimCounter = 0;

		self.draw = function()
		{
			var x = self.x - self.width/2;
			var y = self.y - self.height/2;

			var spinningMod = 0;
			var frameWidth = self.img.width/6;

			spinningMod = Math.floor(self.spriteAnimCounter) % 6;

			ctx.drawImage(self.img, spinningMod * frameWidth, 0, self.img.width/6, self.img.height, x, y, self.width, self.height);
		}

		Coin.list[id] = self;
	}

	Coin.Init = function()
	{
		var coinX = 0;
		var coinY = 0;
		var coinId = "";
		var startPoint = 0;

		for(var i = 0; i < Maps.current.grid.length; i++)
		{
			startPoint = 0;
			
			do{
				if(Maps.current.grid[i].indexOf(6, startPoint) != -1)
				{
					coinX = (Maps.current.grid[i].indexOf(6, startPoint) * TILE_SIZE) + TILE_SIZE/2;
					coinY = (i  * TILE_SIZE) + TILE_SIZE/2;
					coinId = "coin_" + Math.random();
				
					Coin(coinId, img.coin.src, 50, 25, coinX, coinY);
					coinCount++;
				}

				startPoint = Maps.current.grid[i].indexOf(6, startPoint) + 1;

			} while(startPoint != 0);
		}

		console.log("coins: " + coinCount);
	}

	Coin.update = function()
	{
		for(var key in Coin.list)
		{
			Coin.list[key].spriteAnimCounter += 0.25;
			Coin.list[key].draw();

			if(player.testCollision(Coin.list[key]))
			{
				delete Coin.list[key];
				collectedCoins++;

				console.log("collected coins: " +collectedCoins);
			}
		}
	}

	Coin.list = {};

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
			if(Maps.current.isPossitionWall(self) === 5)
				self.toRemove = true;

		}

		self.draw = function() {
			
			var x = self.x - self.width/2;
			var y = self.y - self.height/2;

			ctx.drawImage(self.img, 0, 0, self.img.width, self.img.height, x, y, self.width, self.height);
		}

		self.updatePosition = function() {
			if(self.direction === "up")
				self.y -= 5;
			if(self.direction === "down")
				self.y += 5;
			if(self.direction === "left")
				self.x -= 5;
			if(self.direction === "right")
				self.x += 5;
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



	startNewGame = function()
	{
		$(".player-hp-bar").css("width", "100%");

		bullyCount = 0;
		KilledBullies = 0;
		coinCount = 0;
		collectedCoins = 0;
		cmdNum = 0;
		bumpWallCtr = 0;
		moveCtr = 0;
		isloop = false;
		startloop = 0;

		used_loop = false;
		used_if = false;

		isFinished = false;
		isPaused = false;

		var code_stack = [];
		var code_var = [];

		Projectile.list = {};
		Coin.list = {};
		Bully.list = {};
		Objective.list = {};
		Dialog.list = {};

		code_stack = [];
		code_var = [];

		player = new Player('plyr1', Maps.current.startPt.x*1.25, Maps.current.startPt.y*1.25, img.player.width/5, img.player.height/5, img.player);
		key = new Key('key', false,img.key.src, img.key.height/5, img.key.width/5);
		key.locate();
		Coin.Init();
		Bully.init();
		Objective.init();

		// do{
		// 	canvas.width = Maps.current.width;
		// 	canvas.height = Maps.current.height;
		// } while(canvas.width != Maps.current.width && canvas.height != Maps.current.height);

		// if(Maps.current.objectives.length > 0)
		// {
		// 	for( var key in Maps.current.objectives)
		// 	{
		// 		Maps.current.objectives[key].status = false;
		// 	}
		// }

		cmdNum = 0;
		moveCtr = 0;
	}

	update = function()
	{
		if(!isPaused) {
			ctx.clearRect(0,0,canvas.width,canvas.height);
			Maps.current.update();
			key.update();
			Coin.update();
			player.update();
			Bully.update();
			Dialog.update();
			Projectile.update();
			Objective.update();
			
			if (isFinished) { 
					sfxAudio.src = "<?php echo base_url();?>assets/sounds/sfx/success.ogg";
					sfxAudio.play();
                    bgmAudio.pause();
					Objective.computeScore();
					Objective.recordScore();
					$("#finish-modal").css("display", "block");
					isPaused = true;
					console.log(isPaused);
			}
		}
	}

	start_point = JSON.parse(start_point);
	var mapGrid2d = [];

	Maps.init('cMap', img.map.src, map_numcols, JSON.parse(map_grid), {x: start_point[0], y: start_point[1]});

	// Objective('obj_1', false, 'Reach Checkpoint 1', {x: 155, y: 72});
	// Objective('start_point', false, 'Level 1 start point', {x: 50, y: 72});

	// startNewGame();
	// setInterval(update,40);

	preloadGameData();

	});
	

</script>
</div>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/Entities.js" ></script> -->