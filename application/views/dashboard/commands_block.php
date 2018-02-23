<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Condition</th>
			<th>Statements</th>
		</thead>
		<tbody>
			<?php if(sizeof($command_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($command_list as $c) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $c["type"] ?></td>
						<td><?php echo $c["condition"] ?></td>
						<td><?php echo json_encode($c["statements"]) ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="4" style="text-align: center;">No Commands</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>