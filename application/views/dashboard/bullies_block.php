<div class="container-fluid">
	<table class="table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Spawn Point</th>
			<th>Max Hp</th>
		</thead>
		<tbody>
			<?php if(isset($bully_list)) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($bully_list as $bully) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $bully["BLY_TYPE"] ?></td>
						<td><?php echo $bully["BLY_SPAWNPOINT"] ?></td>
						<td><?php echo $bully["BLY_MAXHP"] ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="4" style="text-align: center;">No Bullies</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>