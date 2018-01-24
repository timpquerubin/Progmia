<div class="container-fluid">
	<table class="table-striped">
		<thead>
			<th>#</th>
			<th>Dialog</th>
			<th>Answer</th>
		</thead>
		<tbody>
			<?php if(isset($question_list)) { ?>
				<?php foreach($question_list as $q) { ?>
					<tr>
						<td><?php echo $q["QSTN_NUM"] ?></td>
						<td><?php echo $q["QSTN_DIALOG"] ?></td>
						<td><?php echo $q["QSTN_ANSWER"] ?></td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="3" style="text-align: center;">No Bullies</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>