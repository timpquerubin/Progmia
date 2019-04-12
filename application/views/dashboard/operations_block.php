<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Save To</th>
			<th>Variable 1</th>
			<th>Operation</th>
			<th>Variable 2</th>
		</thead>
		<tbody>
			<?php if(sizeof($operation_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($operation_list as $o) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $o["save_to"] ?></td>
						<td><?php echo $o["var_1"] ?></td>
						<td><?php echo $o["operation"] ?></td>
						<td><?php echo $o["var_2"] ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="5" style="text-align: center;">No Operations</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>