<style>
	div.player-activity {padding: 0px 0px 0px 25px;}
</style>

<div class="container">
	<div class="player-activity">
		<h1>Players' Activity</h1>
		<div class="player-activity-block"></div>
		<table class="table table-striped" style="display: none;">
			<thead>
				<th><strong>Username</strong></th>
				<th><strong>Stage</strong></th>
				<th><strong>Level</strong></th>
				<th><strong>Points Scored</strong></th>
				<th><strong>Date Finished</strong></th>
			</thead>
			<tbody>
			<!--<?php foreach ($variable as $key => $value) { ?>-->
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<!--<?php }?>-->
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>Dashboard/get_player_activity",
			data: {
				limit: {
					start: 0,
					rows: 10,
				}
			},
			dataType: 'json',
			success: function(res) {
				// console.log(res);
			},
			complete: function(res) {
				// console.log(res);
				load_player_activity_block(res.responseJSON);
			},
			error: function(err) {
				console.log(err);
			}
		});

		function load_player_activity_block(prog_list) {

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>Dashboard/load_progress_block",
				data: {
					progress: prog_list
				},
				success: function(res) {
					// console.log(res);
					$(".player-activity-block").html(res);
				},
				complete: function(res) {
					// $(".player-activity-block").html(res);
				},
				error: function(err) {
					console.log(err);
					$(".player-activity-block").html(err.responseText);
				}
			});
		}


	});
</script>
