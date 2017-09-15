
$(document).ready(function() {
	var ctx = document.getElementById("ctx-avatar-prev").getContext("2d");

	var l = window.location;
	var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

	var avatars;

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

	Avatar = function(avtId, name, height, width, imgSrc) {

		var self = {
			id: avtId,
			name: name,
			height: height,
			width, width,
			img: new Image(),
		};

		self.img.src = imgSrc;

		Avatar.list[avtId] = self;
	}

	Avatar.list = {};

	Avatar.init = function() {
		
		for(var key in avatars) {
			Avatar(avatars[key].CHAR_ID,avatars[key].CHAR_NAME, avatars[key].CHAR_HEIGHT, avatars[key].CHAR_WIDTH, base_url + "/assets/images/avatars/" + avatars[key].CHAR_SPRITEFILENAME);
		}

	}

	Avatar.init();
});