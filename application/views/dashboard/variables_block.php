<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Data Type</th>
			<th>Identifier</th>
			<th>Value</th>
			<th>Statement Type</th>
		</thead>
		<tbody>
			<?php if(sizeof($var_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($var_list as $v) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $v["dataType"] ?></td>
						<td><?php echo $v["var_identifier"] ?></td>
						<?php if($v["dataType"] == "String" || $v["dataType"] == "char" || $v["dataType"] == "int" || $v["dataType"] == "double" || $v["dataType"] == "bool") { ?>
							<td><?php echo $v["var_value"] ?></td>
						<?php } else { ?>
							<td><?php echo json_encode($v["var_value"]) ?></td>
						<?php } ?>
						<td><?php echo ($v["stmnt_type"] != "") ? ($v["stmnt_type"]) : "N.A."; ?></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="5" style="text-align: center;">No Variables</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>