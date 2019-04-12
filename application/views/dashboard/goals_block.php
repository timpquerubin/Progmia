<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Goal</th>
			<th>Questions</th>
			<?php if(isset($page)) {?>
				<?php if($page == 'level-goals') { ?>
					<th>Action</th>
				<?php } ?>
			<?php } ?>
		</thead>
		<tbody>
			<?php if(sizeof($goals) > 0) { ?>
				<?php foreach($goals as $g) { ?>
					<tr>
						<td><?php echo $g['G_NUM'] ?></td>
						<td><?php echo $g['G_DESC'] ?></td>
						<td>None</td>
						<?php if(isset($page)) { ?>
							<?php if($page == 'level-goals') { ?>
								<td><button class="btn btn-danger remove-goal" id="<?php echo $g['G_ID']; ?>"><span class="glyphicon glyphicon-remove"></span></button></td>
							<?php } ?>
						<?php } ?>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="3" style="text-align: center;">No Goals</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		$(".remove-goal").click(function() {
			// console.log("remove this goal - " + this.id);

			var conf_result = confirm("Are you sure you want to remove this goal? - " + this.id);

			if(conf_result) {

				var data = {};
				data['G_ID'] = this.id;

				var promise = new Promise(function(resolve, reject) {

					$.ajax({
						type: 'post',
						url: "<?php echo base_url(); ?>dashboard/delete_goal",
						data: data,
						dataType: "json",
						success: function(res) {
							console.log(res);
							document.getElementById("goal-description") = "";
							resolve(res);

							//console.log("goal has been removed");
						},
						error: function(err) {
							console.log("failed to delete goal due to some error");
						}
					});
				}).then(function(res) {

					get_goal_list();
				});
				
			} else {
				console.log("goal has not been removed");
			}
		});
	});

</script>