<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Spawn Point</th>
			<th>Max Hp</th>
		</thead>
		<tbody>
			<?php if(sizeof($bully_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($bully_list as $bully) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $bully["type"] ?></td>
						<td><?php echo json_encode($bully["spawnPt"]) ?></td>
						<td><?php echo $bully["maxHp"] ?></td>
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