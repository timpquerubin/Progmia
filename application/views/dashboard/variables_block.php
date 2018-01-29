<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Data Type</th>
			<th>Identifier</th>
			<th>Value</th>
		</thead>
		<tbody>
			<?php if(sizeof($var_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($var_list as $v) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $v["dataType"] ?></td>
						<td><?php echo $v["var_identifier"] ?></td>
						<td><?php echo $v["var_value"] ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="4" style="text-align: center;">No Variables</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>