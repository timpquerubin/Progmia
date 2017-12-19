<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Value</th>
			<th>Points</th>
			<th></th>
		</thead>
		<tbody>
			<?php if(sizeof($objectives) > 0) { ?>
				<?php $rowCtr = 1; ?>
				<?php foreach ($objectives as $obj) { ?>
					<tr>
						<td><?php echo $rowCtr  ?></td>
						<td><?php echo $obj['type']  ?></td>
						<td><?php echo $obj['value'] ?></td>
						<td><?php echo $obj['points'] ?></td>
						<td><button type="button" onclick="deleteObjective(<?php echo $obj['objNum']; ?>)">Delete</button></td>
					</tr>
					<?php $rowCtr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="5" style="text-align: center;">No Objectives</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
</div>