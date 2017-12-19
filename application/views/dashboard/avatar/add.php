<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js""></script>

<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/css/main.css"> -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js""></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-modal.js""></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/create_character.css">

			<form class="form-horizontal" id="add_level_form" name="add_level_form" method="post" action="save_add_avatar" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-sm-2">Avatar Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="avatar-name" id="avatar-name" placeholder="Avatar Name">
							</div>
						</div>
					</div>
				</div>

				
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Avatar Sprite Image:</label>
									<p><small>Recommended size: (159x218)</small></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input class="form-control" type="file" name="imgSprite" id="imgSprite">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="level-img-prev1" id="imgPrev1" name="imgPrev1" style="margin: 20px 0px; height: 300px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Avatar Frontview Image:</label>
									<p><small>Recommended size: (215x325)</small></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input class="form-control" type="file" name="imgFront" id="imgFront">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="level-img-prev2" id="imgPrev2" name="imgPrev2" style="margin: 20px 0px; height: 300px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Avatar Thumbnail Image:</label>
									<p><small>Recommended size: (159x218)</small></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input class="form-control" type="file" name="imgThumb" id="imgThumb">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="level-img-prev" id="imgPrev" name="imgPrev"></div>
									<div class="level-img-prev3" id="imgPrev3" name="imgPrev3" style="margin: 20px 0px; height: 300px; width: 100%; background-color: #e6e6e6; background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
							<button type="button" onclick="add_avatar()">Add</button>
				<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5">
			</form>

<script type="text/javascript">
	$(document).ready(function(){

		var objective_list = {};
		var objCtr = 0;

		add_avatar = function() {
			var type = document.getElementById("type").value;
			var value = document.getElementById("obj_val").value;
			var desc = document.getElementById("objective-description").value;
			var points = document.getElementById("obj_points").value;

			objective_list[objCtr] = {objNum:objCtr, type: type, value: value, desc: desc, points: points};

			objCtr++;

			document.getElementById("type").value = "";
			document.getElementById("obj_val").value = "";
			document.getElementById("objective-description").value = "";
			document.getElementById("obj_points").value = "";

			load_objectives_block();
		}

		deleteObjective = function(objIndex) {
			var index = parseInt(objIndex);
			console.log("index" + index);

			delete objective_list[objIndex];

			load_objectives_block();
		}

		load_objectives_block();

		$("#add_avatar_form").submit(function(e) {

			var formData = new FormData($("#add_avatar_form")[0]);
			var newAvtrId = "";
			var list = {};
			list['avatar'] = avatar_list;

			var promise = new Promise(function(resolve, reject) {
				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>" + "dashboard/save_add_avatar",
					data: formData,
					contentType: false,
					processData: false,
					dataType: 'json',
					success: function(data) {
						resolve(data['avtrId']);
						
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			}).then(function(lvlId) {
				
				list['avtrId'] = avtrId;

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>" + "dashboard/save_avatar",
					data: list,
					dataType: 'json',
					success: function(res) {
						if(res['status']) {
							window.location = "<?php echo base_url(); ?>dashboard/avatar_list";
						} else {
							window.location = "<?php echo base_url(); ?>dashboard/add_avatar";
						}
					},
					error: function(xhr, status, err) {
						console.log(err);
					}
				});
			});

			e.preventDefault();
		});

	    $("#imgSprite").change(function(){
	        if(this.files && this.files[0])
	        {
	        	console.log(this.files[0]);
	        	var reader = new FileReader();
	        	reader.onload = function(e)
	        	{
	        		var img = new Image();
	        		img.src = e.target.result;
	        		console.log(img.height + "," + img.width);

	        		$("#imgPrev1").css("background-image", "url("+ e.target.result +")");
	        		$("#imgPrev1").show();
	        	}

	        	reader.readAsDataURL(this.files[0]);
	        }
	    });



	    $("#imgFront").change(function(){
	        if(this.files && this.files[0])
	        {
	        	console.log(this.files[0]);
	        	var reader = new FileReader();
	        	reader.onload = function(e)
	        	{
	        		var img = new Image();
	        		img.src = e.target.result;
	        		console.log(img.height + "," + img.width);

	        		$("#imgPrev2").css("background-image", "url("+ e.target.result +")");
	        		$("#imgPrev2").show();
	        	}

	        	reader.readAsDataURL(this.files[0]);
	        }
	    });



	    $("#imgThumb").change(function(){
	        if(this.files && this.files[0])
	        {
	        	console.log(this.files[0]);
	        	var reader = new FileReader();
	        	reader.onload = function(e)
	        	{
	        		var img = new Image();
	        		img.src = e.target.result;
	        		console.log(img.height + "," + img.width);

	        		$("#imgPrev3").css("background-image", "url("+ e.target.result +")");
	        		$("#imgPrev3").show();
	        	}

	        	reader.readAsDataURL(this.files[0]);
	        }
	    });
	});
</script>			