<div class="panel panel-default">
	<div class="panel-heading"><h4>Assign Questions</h4></div>
	<div class="panel-body">
		<div class="goals-block"></div>
		<div class="questions-block" style="margin-top: 15px;"></div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		var goal_list = {};
		var question_list = {};

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

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/load_goals_block",
					data: data,
					success: function(res) {
						// console.log()
						$(".goals-block").html(res);
						resolve(true);
					},
					error: function(err) {
						console.log(err);
					}
				});

			}).then(function(res) {
				get_question_list();
			});
		}

		get_question_list = function() {

			var lvlId = "<?php echo $lvlId ?>";

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_question_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					success: function(res) {
						question_list = res.question_list;
						console.log(question_list);
						resolve(question_list);
					},
					error: function() {
						console.log("cannot retreive bully list due to some error");
					}
				});
			}).then(function(questions) {
				load_questions_block();
			});

		}

		load_questions_block = function() {
			var data = {};
			data['questions'] = {};
			data['goals'] = goal_list;
			data['page'] = "assign-questions";

			console.log(data);
			
			for(var key in question_list) {
				var q = {
					bully_id: question_list[key].BLY_ID,
					qstn_num: question_list[key].QSTN_NUM,
					// qstn_type: question_list[key].QSTN_TYPE,
					qstn_dialog: question_list[key].QSTN_DIALOG,
					qstn_ans: JSON.parse(question_list[key].QSTN_ANSWER),
					qstn_gid: question_list[key].G_ID,
				};

				data['questions'][question_list[key].BLY_ID + "_" + question_list[key].QSTN_NUM] = q;
			}

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>dashboard/load_questions_block",
					data: data,
					success: function(res) {
						// console.log()
						$(".questions-block").html(res);
						resolve(true);
					},
					error: function(err) {
						console.log(err);
					}
				});

			}).then(function(res) {

				for(var key in question_list) {
					
					if(question_list[key].G_ID == null) {
						$("#" + question_list[key].BLY_ID + "_" + question_list[key].QSTN_NUM).val("null");
					} else {
						$("#" + question_list[key].BLY_ID + "_" + question_list[key].QSTN_NUM).val(question_list[key].G_ID);
					}
				}
			});
		}

		// $("#goal_id").on("change", function() {
		// 	console.log("changed");
		// });

		$(document).on("change", ".goal_id", function() {
			
			// console.log(this.id);

			var qstn_info = this.id.split('_');
			// console.log(qstn_info[0]);
			
			var update_param = {
				BLY_ID: qstn_info[0],
				QSTN_NUM: qstn_info[1],
				G_ID: this.value,
			};

			// console.log(update_param);

			var data = {};
			data['update_param'] = update_param;

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/update_question_goal",
				data: data,
				dataType: "json",
				success: function(res) {
					console.log(res);
				},
				error: function(err) {
					console.log("failed to update question due to some error");
				}
			});
		});

		get_goal_list();
	});
</script>