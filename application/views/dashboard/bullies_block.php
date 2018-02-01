<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Spawn Point</th>
			<th>Max Hp</th>
			<th>Questions</th>
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
						<td><button class="btn btn-default" type="button" onclick="load_questions('<?php echo $bully['id'] ?>')">Q</button></td>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="5" style="text-align: center;">No Bullies</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		load_questions = function(bullyId) {
			console.log(bullyId);
		}
	});

</script>