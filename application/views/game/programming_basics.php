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
			<canvas id="ctx" height="125" width="1000" style="width:100%;margin: 0px auto; padding: 0px;"></canvas>
		</div>
	</div>
	<div style="background:#ffffff;border-radius:20px;box-shadow:0px 0px 20px #ffce15;m min-width:250px; padding:20px 40px;width:96%;margin:20px auto;height:100px;border:solid 5px #000000;"><p style="font-family:ArcadeClassic;font-size: 30px;color:#000000;">Text Here!</p></div>
	<div class="console-container">
		<div class="console">
			<textarea rows="5" id="console-area" style="margin: 0px; padding: 0px; width: 100%; resize: none;" disabled></textarea>
		</div>
	</div>

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
				<button class="btn btn-basic btn-block" onclick="start();">RUN</button>
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
	img.map.src = "<?php echo base_url(); ?>assets/images/levels/level_1_temp.png";
	img.player = new Image();
	img.player.src = "<?php echo base_url(); ?>assets/images/avatars/sprites/FINAL_SPRITE_BODY.png";
	img.bully = new Image();
	img.bully.src = "<?php echo base_url(); ?>assets/images/bully.png";

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
					}
				} else {
					console.log("error: no value assigned");
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
				}


			} else {
				console.log("error");
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

	document.onkeydown = function(event){
		if(event.keyCode === 68)	//d
			player.pressingRight = true;
		else if(event.keyCode === 83)	//s
			player.pressingDown = true;
		else if(event.keyCode === 65) //a
			player.pressingLeft = true;
		else if(event.keyCode === 87) // w
			player.pressingUp = true;
			
		else if(event.keyCode === 80) //p
			paused = !paused;
	}

	document.onkeyup = function(event){
		if(event.keyCode === 68)	//d
			player.pressingRight = false;
		else if(event.keyCode === 83)	//s
			player.pressingDown = false;
		else if(event.keyCode === 65) //a
			player.pressingLeft = false;
		else if(event.keyCode === 87) // w
			player.pressingUp = false;
	}

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
			currentQuestion: [],
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

				if(self.currentQuestion[0]) {

				} else {
					console.log("no current question");
					Bully.list[bullyId].questions[0].status = true;
					self.currentQuestion = Bully.list[bullyId].questions;
					self.currentQuestion[0].result = false;
				}
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

			ctx.drawImage(self.img, walkingMod * frameWidth, directionMod * frameHeight, self.img.width/4, self.img.height/4, x, y, self.width * zoomMultiplier, self.height * zoomMultiplier);
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
			questions: [
				{qNum: 1, qDialog: "Declare an int variable x with a value of 10", qAnswer: {dataType: "int", var_identifier: "x", var_value: 10}, status: false},
			],
		}

		self.img.src = imgSrc;

		self.update = function() {

			self.draw();
		}

		self.draw = function() {

			// var x = ((ctxWidth/2 - self.x) - self.width/2) - 80;
			// var y = (ctxHeight/2 - self.y) - self.height/2;

			var x = (ctxWidth/2 - player.x) - 80;
			var y = ctxHeight/2 - player.y;

			x += (self.x - self.width/2);
			y += (self.y - self.height/2);

			ctx.drawImage(self.img, 0, 0, self.img.width/4, self.img.height/4, x, y, self.width, self.height);
		}

		Bully.list[id] = self;
	}

	Bully.list = {};

	Bully.generate = function(imgSrc, height, width, x, y, hpMax) {

		var newId = "Bully_" + Math.random();

		Bully(newId, imgSrc, height, width, x, y, hpMax);
	}

	Bully.update = function() {

		for(var key in Bully.list) {

			Bully.list[key].update();
		}
	}

	Question = function() {

		// id, qstnNum, bullyId, dialog, answer

		// var self = {
		// 	id: id,
		// 	qstnNum: qstnNum,
		// 	bully: bullyId,
		// 	dialog: dialog,
		// 	answer: answer,
		// }

		self.draw = function() {
			//DIALOG
			// ctx.drawImage(img.dialog,0,0,img.dialog.width,img.dialog.height, 10, 10,img.dialog.width,img.dialog.height);
			Console.log(img.dialog);
		}
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

			ctx.drawImage(self.img,0,0,self.img.width,self.img.height, x, y,self.width * zoomMultiplier,self.height * zoomMultiplier);
		}

		return self;
	}

	startNewGame = function() {

		Bully.list = {};

		// cmdNum = 0;
		// vrbls = [];

		// while(isEndOfCode(cmdNum)) {
		// 	executeCommand(cmdNum);
		// 	cmdNum++;
		// }

		player.hp = player.hpMax;

		Bully.generate(img.bully.src, (img.bully.height/4) * zoomMultiplier, (img.bully.width/4) * zoomMultiplier, 168, 56, 1);
		Bully.generate(img.bully.src, (img.bully.height/4) * zoomMultiplier, (img.bully.width/4) * zoomMultiplier, 360, 56, 1);
	}

	update = function() {

		ctx.clearRect(0,0,canvas.width,canvas.height);
		currentMap.update();
		player.update();
		Bully.update();
		ctx.drawImage(img.dialog,0,0,img.dialog.width,img.dialog.height, 10, 90,40,40);

	}

	var map_grid = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];

	var currentMap = new Maps('currentmap', img.map.src, img.map.height, img.map.width, map_grid);
	var player = new Player('myPlayer1', img.player.src, img.player.width/4, img.player.height/4, 72, 56, 10); //[72,56]
	var question = new Question();
	startNewGame();

	setInterval(update, 40);
</script>