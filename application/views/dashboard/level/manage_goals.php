<div class="panel panel-default">
	<div class="panel-heading"><h4>Manage Goals</h4></div>
	<div class="panel-body">
		
		<div class="goals-block"></div>

		<form class="form-horizontal" id="manage-goals-form" method="post" action="<?php echo base_url(); ?>dashboard/save_goal">

			<input type="text" style="display: none;" name="lvl-id" id="lvl-id" value="<?php echo $lvlId ?>">
			
			<div class="form-group">
				<label class="control-label col-sm-2">Goal:</label>
				<div class="col-sm-9">
					<textarea class="form-control" style="resize: none;" rows="5" name="goal-description" id="goal-description" placeholder="Goal Description"></textarea>
				</div>
			</div>
			<div class="row">
				<input type="submit" class="btn btn-submit col-sm-2 col-sm-offset-5" value="Add">
			</div>

			<!-- <div class="panel panel-default">
				<div class="panel-heading"><h4>Assign Questions</h4></div>
				<div class="panel-body">
					
				</div>
			</div> -->
		</form>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		var goal_list = {};

		$("#manage-goals-form").submit(function(evt) {

			var data = {};

			data["goal_info"] = {
				LVL_ID: document.getElementById("lvl-id").value,
				G_NUM: goal_list.length + 1,
				G_DESC: document.getElementById("goal-description").value
			};

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/add_goal",
					data: data,
					dataType: "json",
					success: function(res) {
						console.log(res);
						resolve(res);
					},
					error: function(err) {
						console.log("failed to add goal due to some error.");
					}
				});
			}).then(function(res) {
				get_goal_list();
			});

			evt.preventDefault();
		});

		reset_form = function() {
			// document.getElementById("manage-goals-form").reset();
			document.getElementById("goal-description") = "";
		}

		get_goal_list = function() {

			var lvl_id = "<?php echo $lvlId ?>";

			// console.log(lvl_id);

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Game/get_goal_list',
					data: {lvl_id: lvl_id},
					dataType: "json",
					success: function(res) {
						goal_list = res.goal_list;
						console.log(goal_list);
						resolve(goal_list);
					},
					error: function(err) {
						console.log("failed to retreive goals due to some error");
					}
				});
			}).then(function(goals) {
				load_goals_block();
			});
		}
	
		load_goals_block = function() {

			var data = {};
			data['goals'] = goal_list;
			data['page'] = '<?php echo $page; ?>';

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_goals_block",
				data: data,
				success: function(res) {
					// console.log()
					$(".goals-block").html(res);
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		get_goal_list();
	});
</script>