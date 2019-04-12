<div class="container-fluid">

	<!-- <?php echo "<pre>"; ?>
	<?php var_dump($goals); ?>
	<?php echo "</pre>"; ?> -->

	<table class="table table-striped">

		<thead>

			<th>#</th>

			<!-- <th>Question Type</th> -->

			<th>Dialog</th>

			<th>Answer</th>

			<?php if(isset($page)) { ?>
				<?php if($page == "assign-questions") { ?>
					<th>Goal</th>
				<?php } ?>
			<?php } ?>

		</thead>

		<tbody>

			<?php if(sizeof($question_list) > 0) { ?>

				<?php echo $ctr = 1; ?>
				<?php foreach($question_list as $q) { ?>

					<tr>

						<td><?php echo $ctr ?></td>

						<!-- <td><?php // echo  $q["qstn_type"] ?></td> -->

						<td><?php echo $q["qstn_dialog"] ?></td>

						<td><?php echo json_encode($q["qstn_ans"]) ?></td>

						<?php if(isset($page)) { ?>
							<?php if($page == "assign-questions") { ?>
								<td>
									<div class="" id="select_cont">
										<select name="goal_id" class="goal_id" id="<?php echo $q['bully_id'].'_'.$q['qstn_num'] ?>">
												<option value="null" >None</option>
											<?php foreach ($goals as $g) { ?>
												<option value="<?php echo $g['G_ID'] ?>"><?php echo $g['G_NUM'] ?></option>
											<?php } ?>
										</select>
									</div>
								</td>
							<?php } ?>
						<?php } ?>
					</tr>

					<?php $ctr++; ?>
				<?php } ?>

			<?php } else { ?>

				<tr>

					<td colspan="3" style="text-align: center;">No Questions</td>

				</tr>

			<?php } ?>

		</tbody>

	</table>

</div>