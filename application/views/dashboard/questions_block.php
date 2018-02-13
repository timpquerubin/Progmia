<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<!-- <th>Question Type</th> -->
			<th>Dialog</th>
			<th>Answer</th>
		</thead>
		<tbody>
			<?php if(sizeof($question_list) > 0) { ?>
				<?php foreach($question_list as $q) { ?>
					<tr>
						<td><?php echo $q["qstn_num"] ?></td>
						<!-- <td><?php // echo  $q["qstn_type"] ?></td> -->
						<td><?php echo $q["qstn_dialog"] ?></td>
						<td><?php echo json_encode($q["qstn_ans"]) ?></td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="3" style="text-align: center;">No Questions</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>