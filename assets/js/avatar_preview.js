
$(document).ready(function() {
	var ctx = document.getElementById("ctx-avatar-prev").getContext("2d");
	var canvas = document.getElementById("ctx-avatar-prev");

	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

	var avatars;
	var currAvt = ""

	$.ajax({
		async: false,
		type: 'json',
		url: "get_avatar_list",
		data: { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
		success: function(res) {
			var avatars_json = res;
			avatars = JSON.parse(avatars_json);
			// console.log(avatars);
		},
	});

	document.getElementById("avtr_" + avatars[0]["CHAR_NAME"]).setAttribute("checked", "true");

	changeAvtImg = function(radio) {
		Avatar.list[currAvt].dirMod = 0;
		currAvt = radio.value;
	}

	Avatar = function(avtId, name, height, width, imgSrc) {

		var self = {
			id: avtId,
			name: name,
			height: height,
			width, width,
			img: new Image(),
			dirMod: 0,
		};

		self.img.src = imgSrc;

		self.draw = function() {
			var x = canvas.width/2 - self.width*3/2;
			var y = canvas.height/2 - self.height*3/2;
			
			var frameWidth = self.img.width/4;
			var frameHeight = self.img.height/4;

			

			ctx.drawImage(self.img, 0, frameHeight * self.dirMod, self.img.width/4, self.img.height/4, x, y, self.width*3, self.height*3);

			// self.dirMod++;
			if(self.dirMod == 0){
				self.dirMod = 1;
			} else if(self.dirMod == 1){
				self.dirMod = 3;
			} else if(self.dirMod == 3){
				self.dirMod = 2;
			} else if(self.dirMod == 2){
				self.dirMod = 0;
			} else {
				console.log(self.dirMod);
			}

		}

		Avatar.list[avtId] = self;
	}

	Avatar.list = {};

	Avatar.init = function() {
		
		for(var key in avatars) {
			Avatar(avatars[key].CHAR_ID,avatars[key].CHAR_NAME, parseFloat(avatars[key].CHAR_HEIGHT), parseFloat(avatars[key].CHAR_WIDTH), base_url + "/assets/images/avatars/" + avatars[key].CHAR_SPRITEFILENAME);
		}

		currAvt = avatars[0].CHAR_ID;
		console.log(currAvt);

	}

	update = function() {
		ctx.clearRect(0,0,canvas.width,canvas.height);
		Avatar.list[currAvt].draw();
	}

	Avatar.init();

	update();

	setInterval(update,800);
});