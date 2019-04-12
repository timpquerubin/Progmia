

<div class="u-badges-style">
<!-- <?php var_dump($user_badges);?> -->
	<!-- <ul style="list-style: none;padding:0px;">
<?php foreach($user_badges as $u_bdg){?>
	<li>
		<img class="img-responsive" src="<?php echo base_url()?>assets/images/BADGES/<?php echo $u_bdg['BDG_IMG_FILENAME'];?>"/>
		<p><?php echo $u_bdg['BDG_DESCRIPTION'];?></p>
	</li>
<?php } ?>
	</ul> -->


<?php foreach($user_badges as $u_bdg){?>
	<div class="row">
		<div class="col-md-5">
			<img class="img-responsive" src="<?php echo base_url()?>assets/images/BADGES/<?php echo $u_bdg['BDG_IMG_FILENAME'];?>"/>
		</div>
		<div class="col-md-7">
			<p><?php echo $u_bdg['BDG_DESCRIPTION'];?></p>
		</div>
	</div>
<?php } ?>
</div>