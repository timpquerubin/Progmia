<div class="container">
	<ul>
		<?php foreach ($map_list as $m) { ?>
			<li><a href="<?php echo base_url(); ?>index.php/Game/play/<?php echo $m['MAP_ID']; ?>"><?php echo $m['MAP_FILENAME']; ?></a></li>
		<?php } ?>
	</ul>
</div>