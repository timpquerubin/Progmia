<!-- <div style="background:#ffffff;border-radius:20px;box-shadow:0px 0px 20px #ffce15; min-width:250px; padding:20px 40px;width:96%;margin:20px auto;height:100px;border:solid 5px #000000;"><p style="font-family:ArcadeClassic;font-size: 30px;color:#000000;"><?php echo isset($dialog) ? $dialog : '' ?></p></div>
 -->
<div class="box" id="box">		<div class="head">
			<!-- <img src="<?php  // echo base_url();?>assets/images/avatars/THUMBNAIL/AVATAR_THUMBNAIL-01.png"> -->
			<img src="<?php echo $thumb;?>">
			<label>BULLY: <?php echo $bully_name ?></label>
		</div>
		<p class="dialog">
			<?php echo isset($dialog) ? $dialog : '' ?>
		</p>
		<div class="dialog-arrow"></div>
</div>