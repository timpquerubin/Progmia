<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>Line #</th>
			<th>Type</th>
			<th>Statement</th>
		</thead>
		<tbody>
			<?php if(sizeof($code_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($code_list as $c) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $c["type"] ?></td>
						<td><?php echo json_encode($c) ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="3" style="text-align: center;">No Code</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>