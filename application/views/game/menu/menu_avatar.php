
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
      <ul style="list-style:none;display: flex;flex-wrap: wrap;justify-content: space-around;margin:0 auto !important;padding:30px !important;">
        <?php foreach ($avatar_list as $avatar) { ?>
        <li class="avatar" style="margin-bottom:40px;position: relative;">
              <input id="avatar-input" type="text" style="display:none" name="fb" value="<?php echo $avatar["AVTR_ID"]; ?>" />
              <img class="avatar" src="<?php echo base_url(); ?>assets/images/avatars/FRONTVIEW/<?php echo $avatar["AVTR_FRONTVIEW_FILENAME"]; ?>" >
              <div class="glow-wrap">
                <i class="glow"></i>
              </div>
        </li>
        <?php } ?>
      </ul>
		</div>
		<div class="row button-select-container">
			<div class="button-select col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
				<!--<button><a href="#" onclick="bad(document.querySelector('label.slick-active #avatar-input').value)">button</a></button>-->
				<button id="btn" class="btn btn-basic btn-block"><a style="text-decoration:none;color:#ffce12;display:block;" onclick="insert_avatar();" class="hvr-reveal">SELECT</a></button>

        
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
      $('li.avatar').click(function(){
      $('.selected').removeClass('selected');
      $(this).addClass('selected');
  });
</script>
<script type="text/javascript">
  document.getElementById("submit-avtr").onclick = function () { }
    function insert_avatar(){
          var test = {avatarId : document.querySelector('li.selected #avatar-input').value, userID : '<?php echo $userID; ?>'};
          $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>Avatar/update',
          data: test,
          encode: true,
          success: function(res){
            console.log(res);
            },
            error: function(err) {
              console.log(err);
            }
          });
          if (avatarId==null){
            alert("Please Select Avatar");
          }
          else
          {
            return window.location.href = "<?php echo base_url()?>Game/Stages";
          }
  }
</script>
<script type="text/javascript">
	$(document).ready(function(){
					$("#btn").click(function(){
						$.ajax({
						type: 'POST',
						url: '<?php echo base_url(); ?>Character/update',
						data: {avatarId : document.querySelector('li.selected #avatar-input').value, userID : '<?php echo $userID; ?>'},
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