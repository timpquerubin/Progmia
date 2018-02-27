<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Print Text</th>
		</thead>
		<tbody>
			<?php if(sizeof($print_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($print_list as $p) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $p["txt"] ?></td>
					</tr>
					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="2" style="text-align: center;">No Prints</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>