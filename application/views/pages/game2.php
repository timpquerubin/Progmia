<style type="text/css">
	div.code_area {
		font-family: "Courier New";
	}
	textarea.code_area {
		resize:none; 
		width:100%; 
		margin: 0; 
		padding: 0;
	}
</style>
<div class="container">
	<input type="hidden" name="mapId" id="mapId" value="<?php echo isset($map[0]['MAP_ID']) ? $map[0]['MAP_ID'] : '' ?>" />
	<input type="hidden" name="mapGRID" id="mapGRID" value="<?php echo isset($map[0]['MAP_GRID']) ? $map[0]['MAP_GRID'] : '' ?>" />
	<input type="hidden" name="startPt" id="startPt" value="<?php echo $map[0]['MAP_STARTPOINT']?>">
	<input type="hidden" name="map_filename" id="map_filename" value="<?php echo isset($map[0]['MAP_FILENAME']) ? $map[0]['MAP_FILENAME'] : '' ?>">
	<input type="hidden" name="map_width" id="map_width" value="<?php echo isset($map[0]['MAP_NUMCOLS']) ? $map[0]['MAP_NUMCOLS'] : '' ?>">

	<div style="width: 100%; background-color: #000000;">
		<center><div class="">
			<canvas id="ctx" width="<?php echo $map[0]['MAP_IMGWIDTH']; ?>" height="<?php echo $map[0]['MAP_IMGHEIGHT']; ?>" style="border:1px solid #000000;"></canvas>
		</div></center>
	</div>
	<div id="test" class="col-sm-2"></div>
	<div>
		<center><button class="btn btn-default" onclick="executeCommand(0);">RUN</button></center>
		<div class="row code_area">
			<div class="col-sm-1" style="width: 40px;">
				<textarea style="overflow:hidden; resize: none; width: 40px; background-color: inherit; color: b0b0b0; text-align: right; margin: 0; padding: 0;" rows="20" id="textarea1" disabled></textarea>
			</div>
			<div class="col-sm-6" style="">
				<textarea class="code_area col-sm-6" id="code_area" name="code_area" rows="20" onscroll="document.getElementById('textarea1').scrollTop = this.scrollTop;"></textarea>
			</div>	
		</div>
		<!-- <textarea onscroll="this.form.elements.textarea1.scrollTop = this.scrollTop;" name="textarea2" ></textarea> -->
	</div>
</div>
<!-- <script async src="//jsfiddle.net/2wAzx/13/embed/"></script> -->
<script type="text/javascript">

	$(document).ready(function(){


	
	var ctx = document.getElementById("ctx").getContext("2d");
	var canvas = document.getElementById("ctx");
	var code_area = document.getElementById('code_area');
	var map_grid = document.getElementById('mapGRID').value;
	var start_point = document.getElementById('startPt').value;
	var map_filename = document.getElementById('map_filename').value;
	var map_numcols = parseInt(document.getElementById('map_width').value);

	document.getElementById('textarea1').value = '1';

	ctx.font = '30px Arial';
	
	var TILE_SIZE = 16;
	var cmdNum = 0;
	var bumpWallCtr = 0;
	var moveCtr = 0;
	var isloop = false;
	var startloop = 0;

	var img = {};
	img.player = new Image();
	img.player.src = "<?php echo base_url(); ?>assets/images/avatars/cfcd208495d565ef66e7dff9f98764da.png";
	// img.map = new Image();
	// img.map.src = "<?php echo base_url(); ?>assets/images/" + "<?php echo isset($map[0]['MAP_FILENAME']) ? $map[0]['MAP_FILENAME'] : '' ?>";
	img.key = new Image();
	img.key.src = "<?php echo base_url(); ?>assets/images/key.png";
	img.coin = new Image();
	img.coin.src = "<?php echo base_url(); ?>assets/images/coin_spritesheet.png";
	img.projectile = new Image();
	img.projectile.src = "<?php echo base_url(); ?>assets/images/projectile.jpg";

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

	executeCommand = function(commandNum)
	{
		var code_whole = code_area.value;
		var code = code_area.value.split("\n");

		if(commandNum == 0 && isloop == false)
		{
			startNewGame();
		}
		
		if(commandNum < code.length)
		{
			if(code[commandNum].trim() === 'student.moveRight();') {
				player.isPressingRight = true;
			} else if(code[commandNum].trim() === 'student.moveUp();') {
				player.isPressingUp = true;
			} else if(code[commandNum].trim() === 'student.moveDown();') {
				player.isPressingDown = true;
			} else if(code[commandNum].trim() === 'student.moveLeft();') {
				player.isPressingLeft = true;
			} else if(code[commandNum].trim() === 'while(true) {') {
				isloop = true;
				startloop = commandNum;
				moveCtr = 97;
			} else if(code[commandNum].trim() === '}') {
				// cmdNum = startloop;
				cmdNum = startloop;
				moveCtr = 97;
			}else {
				console.log('error: invalid command');
				moveCtr = 97;
			}

			console.log('execute line '+ commandNum +':' + code[commandNum]);

			cmdNum++;

		} else {
			alert('end of code');
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

		for(var i = 0; i < Maps.current.grid.length; i++)
		{
			if(Maps.current.grid[i].indexOf(6) != -1)
			{
				coinX = (Maps.current.grid[i].indexOf(6) * TILE_SIZE) + TILE_SIZE/2;
				coinY = (i  * TILE_SIZE) + TILE_SIZE/2;
				coinId = "coin" + i;
				
				Coin(coinId, img.coin.src, 50, 25, coinX, coinY);
			}
		}
	}

	Coin.update = function()
	{
		for(var key in Coin.list)
		{
			Coin.list[key].spriteAnimCounter += 0.25;
			Coin.list[key].draw();

			if(player.testCollision(Coin.list[key]))
			{
				console.log('coins + 1');
				delete Coin.list[key];
			}
		}
	}

	Coin.list = {};

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
					console.log('aquired key');
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

	Objective = function(id, status, desc, checkPt)
	{
		var self = {
			id: id,
			status: status,
			description: desc,
			checkPt: checkPt,
		};

		Objective.list[id] = self;
	}

	Objective.list = {};

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

		
		self.draw = function()
		{
			ctx.drawImage(self.image, 0, 0, self.image.width, self.image.height, 0, 0, self.image.width, self.image.height);
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

	Maps.init = function(id, fileName, rowTiles, collArray, startPt)
	{
		var mapGrid2d = [];

		// for(var i = 0 ; i < rowTiles; i++){
		// 	mapGrid2d[i] = [];
		// 	for(var j = 0 ; j < rowTiles; j++){
		// 		mapGrid2d[i][j] = collArray[i * rowTiles + j];
		// 	}
		// }

		var ctr = 0;
		var ctr2D = 0;
		mapGrid2d[ctr2D] = [];
		while(collArray[ctr] != null)
		{
			// console.log(ctr%(rowTiles));

			mapGrid2d[ctr2D][(ctr%rowTiles)] = collArray[ctr];

			ctr++;

			if(ctr%(rowTiles) == 0 && collArray[ctr] != null)
			{
				ctr2D++;
				mapGrid2d[ctr2D] = [];
			}
		}

		Maps.current = Maps(id, "<?php echo base_url(); ?>assets/images/"+ fileName, mapGrid2d, startPt);
	}

	// Maps.list = {};

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
		};

		self.isPressingUp = false;
		self.isPressingDown = false;
		self.isPressingLeft = false;
		self.isPressingRight = false;

		self.spriteAnimCounter = 0;


		self.img.src = image.src;

		self.update = function()
		{
			if (self.isPressingRight || self.isPressingLeft || self.isPressingDown || self.isPressingUp) 
			{
				self.spriteAnimCounter += 0.25;
				moveCtr += 6;
				document.getElementById('test').innerHTML = "moveCtr: " + moveCtr;
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
			if(moveCtr <= 96)
			{
				if(Maps.current.isPossitionWall(topBumper) === 5)
				{
					self.y += 6;
					isError = true;
					// self.y = oldY;
				} else {
					if(self.isPressingUp)
						self.y -= 6;
				}
				if(Maps.current.isPossitionWall(bottomBumper) === 5)
				{
					self.y -= 6;
					isError = true;
					// self.y = oldY;
				} else {
					if(self.isPressingDown)
						self.y += 6;
				}
				if(Maps.current.isPossitionWall(leftBumper) === 5)
				{
					// self.x = oldX;
					self.x += 6;
					isError = true;
				} else {
					if(self.isPressingLeft)
						self.x -= 6;
				}
				if(Maps.current.isPossitionWall(rightBumper) === 5)
				{
					// self.x = oldX;
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
				alert('error: Dead End');
				startNewGame();
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

			if( (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(leftBumper) === 4) || (Maps.current.isPossitionWall(rightBumper) === 4))
			{
				if(key.status != true)
				{
					alert('error: door locked');
					startNewGame();

				} else
				{
					alert('goal');
					startNewGame();
				}
			}
		};

		self.throwProjectile = function() {
			Projectile.generate(self);
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

		img.src = imgSrc;

		self.update = function() {

			self.updatePosition();
			self.draw();


			self.timer++;

			if(self.timer > 97)
				self.toRemove = true;
			if(Maps.current.isPossitionWall(self) === 5)
				self.toRemove = true;

		}

		self.draw = function() {
			
			var x = self.x - self.width/2;
			var y = self.y - self.height/2;

			ctx.drawImage(self.img, 0, 0, self.img.width, self.img.height, x, y, self.width, self.height)
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

		Projectile.list[id] = self;
	}

	Projectile.list = {};

	Projectile.update = function() {

		for(var key in Projectile.list)
		{
			Projectile.list[key].update();
			
			if(Projectile.list[key] == true)
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
		player = new Player('plyr1', Maps.current.startPt.x, Maps.current.startPt.y, img.player.width/5, img.player.height/5, img.player);
		key = new Key('key', false,img.key.src, img.key.height/5, img.key.width/5);
		key.locate();
		Coin.Init();

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
		ctx.clearRect(0,0,canvas.width,canvas.height);
		Maps.current.draw();
		key.update();
		Coin.update();
		player.update();
	}

	start_point = JSON.parse(start_point);
	var mapGrid2d = [];

	Maps.init('cMap', map_filename, map_numcols, JSON.parse(map_grid), {x: start_point[0], y: start_point[1]});
	// key = new Key('key', false,img.key.src, img.key.height/5, img.key.width/5);
	// console.log(key.locate());
	// Maps.init('level_2', 'leve_2_temp_new', 31, mapGrid_level2_temp, {x: TILE_SIZE*4, y: img.map.height - img.map.height/4});

	// Maps.current = Maps.list[document.getElementById('mapId').value];
	

	// for(var i = 0 ; i < 31; i++){
	// 	mapGrid2d[i] = [];
	// 	for(var j = 0 ; j < 31; j++){
	// 		mapGrid2d[i][j] = mapGrid_level2_temp[i * 31 + j];
	// 	}
	// }

	// Objective('obj_1', false, 'Reach Checkpoint 1', {x: 155, y: 72});
	// Objective('start_point', false, 'Level 1 start point', {x: 50, y: 72});

	startNewGame();
	setInterval(update,40);

	});

</script>