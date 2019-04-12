<ol class="breadcrumb"><li><a href="/">Dashboard<span class="glyphicon glyphicon-home"></span></a></li><li><a href="/account" data-i18n="nav.account">Game Editor</a></li><li data-i18n="nav.profile" class="active">Avatar</li></ol>
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Edit Avatar</h4></div>
		<div class="panel-body">
			<form class="form-horizontal" id="edit_level_form" name="edit_level_form" method="post" action="<?php echo base_url(); ?>dashboard/save_edit_level" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label col-sm-2">Avatar Name:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="level-name" id="level-name" placeholder="Level Name" value="<?php echo $avtr['AVTR_NAME']; ?>">
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

				
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {

			var avtr_sprt_filename = "<?php echo $avtr['AVTR_SPRT_FILENAME']; ?>";

			$("#imgPrev1").css("background-image", "url(<?php echo base_url()."assets/images/avatars/sprites/".$avtr['AVTR_SPRT_FILENAME']; ?>)");

			$("#imgSprite").change(function() {
				if(this.files && this.files[0])
		        {
		        	console.log(this.files[0]);
		        	var reader = new FileReader();
		        	reader.onload = function(e)
		        	{
		        		$("#imgPrev1").css("background-image", "url("+ e.target.result +")");
		        		$("#imgPrev1").show();
		        	}

		        	reader.readAsDataURL(this.files[0]);
		        }
			});

		});

		$(document).ready(function() {

			var avtr_frontview_filename = "<?php echo $avtr['AVTR_FRONTVIEW_FILENAME']; ?>";

			$("#imgPrev2").css("background-image", "url(<?php echo base_url()."assets/images/avatars/frontview/".$avtr['AVTR_FRONTVIEW_FILENAME']; ?>)");

			$("#imgFront").change(function() {
				if(this.files && this.files[0])
		        {
		        	console.log(this.files[0]);
		        	var reader = new FileReader();
		        	reader.onload = function(e)
		        	{
		        		$("#imgPrev2").css("background-image", "url("+ e.target.result +")");
		        		$("#imgPrev2").show();
		        	}

		        	reader.readAsDataURL(this.files[0]);
		        }
			});

		});

		$(document).ready(function() {

			var avtr_thumbnail_filename = "<?php echo $avtr['AVTR_THUMBNAIL_FILENAME']; ?>";

			$("#imgPrev3").css("background-image", "url(<?php echo base_url()."assets/images/avatars/frontview/".$avtr['AVTR_THUMBNAIL_FILENAME']; ?>)");

			$("#imgThumb").change(function() {
				if(this.files && this.files[0])
		        {
		        	console.log(this.files[0]);
		        	var reader = new FileReader();
		        	reader.onload = function(e)
		        	{
		        		$("#imgPrev3").css("background-image", "url("+ e.target.result +")");
		        		$("#imgPrev3").show();
		        	}

		        	reader.readAsDataURL(this.files[0]);
		        }
			});

		});
	</script>