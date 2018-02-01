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
					
				</li>
			</ul>
		</nav>
	</div>

	<div class="canvas-container">
		<div class="" style="margin: 0px; padding: 10px; background-color: #000">
			<canvas id="ctx" height="200" width="500" style="width:100%;margin: 0px auto; padding: 0px;"></canvas>
		</div>
	</div>

	<div class="dialog-container"></div>
	
	<!-- <div class="console-container">
		<div class="console">
			<textarea rows="5" id="console-area" style="margin: 0px; padding: 0px; width: 100%; resize: none;" disabled></textarea>
		</div>
	</div> -->

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

<script type="text/javascript">
	
	var ctx = document.getElementById("ctx").getContext("2d");
	var canvas = document.getElementById("ctx");
	code_area = document.getElementById("code_area");

	ctx.font = '30px Arial';

	var ctxWidth = canvas.width;
	var ctxHeight = canvas.height;

	var cmdNum = 0;
	var vrbls = [];
	var zoomMultiplier = 0.75;

	var img = {};
	img.map = new Image();
	img.dialog = new Image();
	img.dialog.src = "<?php echo base_url(); ?>assets/images/BORDER-1.png";
	img.map.src = "<?php echo base_url(); ?>assets/images/levels/<?php echo $level_info['LVL_FILENAME'] ?>";
	img.player = new Image();
	img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/PLAYER-04.png";
	img.bully = new Image();
	img.bully.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/BULLY-10.png";
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
			} else if(/^(int|double|char|String|bool)\s+[A-Za-z][A-Za-z0-9]*\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				tempLine = tempLine.replace(/\s+/g, " ");
				tempLine = tempLine.trim();

				var declareLine = tempLine.split(' ');

				vrbls.push({
					dataType: declareLine[0],
					var_identifier: declareLine[1],
				});

				console.log(vrbls);
			} else if(/^(int|double|char|String|bool)\s+[A-Za-z][A-Za-z0-9]*\s*=\s*[A-Za-z0-9_\W]+\s*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");

				var declareLine = tempLine.split(/=/i);
				declareLine[0] = declareLine[0].trim();
				
				var value = declareLine[1].trim();
				var var_info = declareLine[0].split(/\s+/g);
				if(value) {

					if(parseValue(var_info[0], value)) {

						var tempValue = parseValue(var_info[0], value);

						vrbls.push({
							dataType: var_info[0],
							var_identifier: var_info[1],
							var_value: tempValue,
						});

						console.log(vrbls);
					} else {
						console.log("error: data type missmatch");
						return {status: false, message: "error: data type missmatch"};
					}
				} else {
					console.log("error: no value assigned");
					return {status: false, message: "error: no value assigned"};
				}
			} else if(/^(int|double|char|String|bool)\[\]\s+[A-Za-z][A-Za-z0-9]*;$/g.test(cmdLine)) {

				var tempLine = cmdLine.replace(";", "");
				tempLine = tempLine.replace(/\s+/g, " ");
				tempLine = tempLine.trim();

				var declareLine = tempLine.split(' ');

				vrbls.push({
					dataType: declareLine[0],
					var_identifier: declareLine[1],
				});

				console.log(vrbls);
			} else if(/^(int|double|char|String|bool)\[\]\s+[A-Za-z][A-Za-z0-9]*\s*=\s*\{[A-Za-z0-9,\"\'\s\.]*\}\s*;$/g.test(cmdLine)) {

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

						if(parseValue(arrInfo[0].replace(/[\[\]]/g, ""), arr_val[key].toString()) == false) {
							isMismatch = true;
							break;
						} else {
							arr_val[key] = parseValue(arrInfo[0].replace(/[\[\]]/g, ""), arr_val[key].toString());
						}
					}

					if(isMismatch) {
						console.log("error: dataType missmatch");
						return {status: false, message: "error: dataType missmatch"};
					} else {
						vrbls.push({
							dataType: arrInfo[0],
							var_identifier: arrInfo[1],
							var_value: arr_val,
						});

						console.log(vrbls);
					}
				} catch(err) {
					console.log("error: value assigned invalid");
					return {status: false, message: "error: value assigned invalid"};
				}

			} else if(/^([A-Za-z][A-Za-z0-9]*|[A-Za-z][A-Za-z0-9]*\[[0-9]+\])\s*=\s*([A-Za-z][A-Za-z0-9]*|[A-Za-z][A-Za-z0-9]*\[[0-9]+\])\s*;$/g.test(cmdLine)) {

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
						valToTrans = var2.var_value[var2_arrIndex]
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


			} else {
				console.log("error");
				return {status: false, message: "syntax error"};
			}

			return {status: true, message: "execution was successful"};
		}
	}

	runCode = function() {

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

			} while(!isEndOfCode);

			for(var key in Question.list) {

				if(Question.list[key].bully == bullyId) {
					console.log(Question.list[key].isAsked);
					if(Question.list[key].isAsked) {
						if(Question.list[key].status == "not answered") {
							// console.log("here");
							// console.log(vrbls);
							// console.log(Question.list[key].answer)
							if(!hasErrors) {

								var answers = Question.list[key].answer;
								var ansCount = answers.length;
								var correctAns = 0;

								for(var akey in answers) {

									for(var vkey in vrbls) {

										if(answers[akey].dataType == vrbls[vkey].dataType && answers[akey].var_identifier == vrbls[vkey].var_identifier && answers[akey].var_value == vrbls[vkey].var_value) {

											correctAns++;
										}
									}
								}

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
				value = value.replace(/\"/g, "");
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
		}

		self.img.src = imgSrc;

		self.pressingUp = false;
		self.pressingDown = false;
		self.pressingRight = false;
		self.pressingLeft = false;

		self.spriteAnimCtr = 0;

		self.update = function() {

			if (self.pressingRight || self.pressingLeft || self.pressingDown || self.pressingUp) 
			{
				self.spriteAnimCtr += 0.25;
				self.moveCtr += 6 * zoomMultiplier;
			} else {
				self.spriteAnimCtr = 0;
			}

			if(self.isEnemyInRange()) {

				var bullyId = self.isEnemyInRange();

				for(var key in Question.list) {

					if(Question.list[key].bully == bullyId) {

						if(!Question.list[key].isAsked) {
							if(Question.list[key].status == "not answered") {

								Question.list[key].showQuestion();

								// document.getElementById("console-area").value += ("\nProgmia> Bully: " + Question.list[key].dialog);
								Question.list[key].isAsked = true;
							}
						}
					}
				}
			} else {

				self.pressingRight = true;
			}

			self.updatePosition();
			self.draw();

			
		}

		self.updatePosition = function() {

			if(self.moveCtr <= (96 * zoomMultiplier)) {
				
				if(self.pressingUp)
					self.y -= (6);
				if(self.pressingDown)
					self.y += (6);
				if(self.pressingLeft)
					self.x -= (6);
				if(self.pressingRight)
					self.x += (6);
			} else {

				self.pressingUp = false;
				self.pressingDown = false;
				self.pressingRight = false;
				self.pressingLeft = false;

				self.moveCtr = 0;
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

	Bully = function(id, imgSrc, height, width, x, y, hpMax) {

		var self = {
			id: id,
			img: new Image(),
			height: height,
			width: width,
			x: x,
			y: y,
			hpMax: hpMax,
			hp: hpMax,
			type: "bully",
			toRemove: false,
		}

		self.img.src = imgSrc;

		self.update = function() {

			self.draw();

			if(self.hp <= 0) {
				self.toRemove = true;
			}
		}

		self.draw = function() {

			// var x = ((ctxWidth/2 - self.x) - self.width/2) - 80;
			// var y = (ctxHeight/2 - self.y) - self.height/2;

			var x = (ctxWidth/2 - player.x) - 80;
			var y = ctxHeight/2 - player.y;

			// x += (self.x - self.width/2);
			// y += (self.y - self.height/2);

			x += self.x - self.width/2;
			y += self.y - self.height/2;

			ctx.drawImage(self.img, 0, 0, self.img.width/4, self.img.height/4, x, y, self.width  * zoomMultiplier, self.height  * zoomMultiplier);
			ctx.fillStyle = 'red';
			ctx.fillRect((x + self.width/2), (y + self.height/2), 2, 2);
			ctx.save();

			// var HPx = ((ctxWidth/2 - player.x) - 80) + self.x - self.width/2;
			// var HPy = (ctxHeight/2 - player.y) + self.y - self.height/2;

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

		Bully.list[id] = self;
	}

	Bully.list = {};

	Bully.generate = function(id,imgSrc, height, width, x, y, hpMax) {

		// var newId = "Bully_" + Math.random();

		Bully(id, imgSrc, height, width, x, y, hpMax);
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

						Bully.generate(bully_list[key].BLY_ID,img.bully.src, img.bully.height/4, img.bully.width/4, bully_spawn[0], bully_spawn[1], parseInt(bully_list[key].BLY_MAXHP));
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

					// $(".player-hp-bar").css("width", hpPercent + "%");
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

	Question = function(id, qstnNum, bullyId, dialog, answer) {

		// id, qstnNum, bullyId, dialog, answer

		var self = {
			id: id,
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
				data: {dialog: self.dialog},
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

						if(question_list[key].QSTN_TYPE == "variable") {

							var answers = JSON.parse(question_list[key].QSTN_ANSWER);

							for(var key in answers) {
								answers[key].var_value = parseValue(answers[key].dataType, answers[key].var_value);
							}

							console.log(answers);
						}

						Question(questionId, parseInt(question_list[key].QSTN_NUM), question_list[key].BLY_ID, question_list[key].QSTN_DIALOG, answers);
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

	Question.isAllAnswered = function(bullyId) {

		var qCtr = 0;
		var qAns = 0;
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

		return self;
	}

	startNewGame = function() {

		Bully.list = {};
		Question.list = {};
		Projectile.list = {};

		Bully.init();
		Question.init();


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

		ctx.clearRect(0,0,canvas.width,canvas.height);
		currentMap.update();
		player.update();
		Bully.update();
		Projectile.update();
		// ctx.drawImage(img.dialog,0,0,img.dialog.width,img.dialog.height, 10, 90,40,40);

	}

	var map_grid = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];

	var currentMap = new Maps('currentmap', img.map.src, img.map.height, img.map.width, map_grid);
	var player = new Player('myPlayer1', img.player.src, img.player.width/4, img.player.height/4, 56, 56, 10); //[72,56]
	var question = new Question();
	startNewGame();

	setInterval(update, 40);
</script>