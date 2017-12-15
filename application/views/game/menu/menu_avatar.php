
<div class="create-character-container">
	<div class="title-container">
		<h2>Character Creation</h2>
		</div>
		<div class="row">
		<div class="character-info" style="display: block;">
			<div class="avatar-image-preview col-sm-4 col-xs-4 col-md-3 col-lg-3">
				<canvas class="avatar-ctx" id="ctx-avatar-prev"></canvas>
			</div>
		</div></div>
		<div>
			<?php if(count($avatars) > 0) { ?>
				<?php foreach ($avatars as $a) { ?>
					<input type="radio" id="avtr_<?php echo $a['CHAR_NAME']; ?>" name="avatars" onclick="changeAvtImg(this);" value="<?php echo $a['CHAR_ID']; ?>">
					<label for="avtr_<?php echo $a['CHAR_NAME']; ?>"><?php echo $a['CHAR_NAME']; ?></label>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/avatar_preview.js" ></script>

<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div id="avatar" class="single-item">
					<?php foreach ($avatar_list as $avatar) { ?>
						<label>
						    <input id="avatar-input" type="text" style="display:none" name="fb" value="<?php echo $avatar["CHAR_ID"]; ?>" />
						    <img class="avatar img-responsive" src="<?php echo base_url(); ?>assets/images/avatars/FRONT_VIEW/<?php echo $avatar["CHAR_FRONTVIEW_FILENAME"]; ?>" >
						</label>
							
					<?php } ?>
					</div>
				</div>
		</div>
		<div class="row button-select-container">
			<div class="button-select col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
				<!--<button><a href="#" onclick="bad(document.querySelector('label.slick-active #avatar-input').value)">button</a></button>-->
				<button id="btn" class="btn btn-basic btn-block"><a style="display:block;" class="hvr-reveal" onclick="bad(document.querySelector('label.slick-active #avatar-input').value)" href="#">SELECT</a></button>
			</div>
<!--<script>
function bad($ter){
	var lava = $ter;
	alert(lava);
}
</script>-->
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
					$("#btn").click(function(){
						$.ajax({
						type: 'POST',
						url: '<?php echo base_url(); ?>Character/update',
						data: {avatarId : document.querySelector('label.slick-active #avatar-input').value, userID : '<?php echo $userID; ?>'},
						encode: true,
						success: function(res){
							console.log(res);
							},
							error: function(err) {
								console.log(err);
							}
						});
					});


			});
</script>