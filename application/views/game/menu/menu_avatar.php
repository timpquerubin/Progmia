
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
				<div class="selection-center">
					<div id="avatar" class="center">
					<?php foreach ($avatar_list as $avatar) { ?>
						<label>
						    <input id="avatar-input" type="text" style="display:none" name="fb" value="<?php echo $avatar["AVTR_ID"]; ?>" />
						    <img class="avatar" src="<?php echo base_url(); ?>assets/images/avatars/FRONTVIEW/<?php echo $avatar["AVTR_FRONTVIEW_FILENAME"]; ?>" >
						</label>
							
					<?php } ?>
					</div>
				</div>
		</div>
		<div class="row button-select-container">
			<div class="button-select col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
				<!--<button><a href="#" onclick="bad(document.querySelector('label.slick-active #avatar-input').value)">button</a></button>-->
				<button id="btn" class="btn btn-basic btn-block"><a style="display:block;" onclick="insert_avatar();" class="hvr-reveal">SELECT</a></button>
    <script type="text/javascript">

  document.getElementById("submit-avtr").onclick = function () { }
      function insert_avatar(){
            var test = {avatarId : document.querySelector('label.slick-active #avatar-input').value, userID : '<?php echo $userID; ?>'};
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

      return window.location.href = "<?php echo base_url()?>Game/Stages";
    }
    </script>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.center').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 2,
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '5px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 1224,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 1024,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '25px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 900,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '35px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '65px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '85px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 320,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '100px',
        slidesToShow: 3
      }
    }
  ]
});
</script>
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