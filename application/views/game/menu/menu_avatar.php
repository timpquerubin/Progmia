
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
				<button id="btn" class="btn btn-basic btn-block"><a style="display:block;" class="hvr-reveal" href="<?php echo base_url(); ?>Game/stages">SELECT</a></button>
			</div>
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