<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Type</th>
			<th>Spawn Point</th>
			<th>Max Hp</th>
			<th>Actions</th>
		</thead>
		<tbody>
			<?php if(sizeof($bully_list) > 0) { ?>
				<?php $ctr = 1; ?>
				<?php foreach($bully_list as $bully) { ?>
					<tr>
						<td><?php echo $ctr ?></td>
						<td><?php echo $bully["type"] ?></td>
						<td><?php echo $bully["spawnPt"] ?></td>
						<td><?php echo $bully["maxHp"] ?></td>
						<td>
							<button class="btn btn-default" type="button" onclick="load_questions('<?php echo $bully['id'] ?>')">Q</button>
							<button class="btn btn-default" type="button" onclick="">D</button>
						</td>
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

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>game/get_question_list",
					data: {bullyId: bullyId},
					dataType: 'json',
					success: function(result) {

						console.log(result);
						resolve(result);
					},
					error: function(err) {
						console.log("falied to load question list");
					}
				});
			}).then(function(result) {

				if(result.status) {

					var question_list = result.question_list;

					var data = {};
					data['questions'] = {};
				
					for(var key in question_list) {

						var q = {
							bully_id: question_list[key].BLY_ID,
							qstn_num: question_list[key].QSTN_NUM,
							qstn_type: question_list[key].QSTN_TYPE,
							qstn_dialog: question_list[key].QSTN_DIALOG,
							qstn_ans: JSON.parse(question_list[key].QSTN_ANSWER),
						};

						data['questions'][question_list[key].QSTN_NUM] = q;
					}

					$.ajax({
						type: 'post',
						url: "<?php echo base_url(); ?>dashboard/load_questions_block",
						data: data,
						success: function(data) {
							$(".view-questions-block").html(data);
							$("#input-bully-id").val(bullyId);
							document.getElementById('question_modal').style.display = "block";
						},
						error: function(err) {
							console.log(err);
						}
					});

				} else {
					console.log(result.message);
				}
			});

		// 	var data = {};
		// 	data['questions'] = question_list;

		// 	$.ajax({
		// 		type: 'post',
		// 		url: "<?php echo base_url(); ?>dashboard/load_questions_block",
		// 		data: data,
		// 		success: function(data) {
		// 			$(".questions-block").html(data);
		// 		},
		// 		error: function(err) {
		// 			console.log(err);
		// 		}
		// 	});
		}

		close_modal = function() {
			document.getElementById('question_modal').style.display = "none";
		}
	});

</script>