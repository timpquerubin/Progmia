<div class="container-fluid">
	<div class="badge-list">
		<ul>
			<?php foreach($achieved_badges as $ab) { ?>
				<li>
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/BADGES/<?php echo $ab['BDG_IMG_FILENAME'] ?>">
				</li>
			<?php } ?>
		</ul>
	</div>
</div>