<div class="container">
	
	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo $title ?></h4></div>
		<div class="panel-body">
			<div class="bully-list-container"></div>
			<div class="bully-form">
				<form class="form-horizontal" id="bully-form" name="bully-form" method="post" action="add_bully" enctype="multipart/form-data">

					<div class="bullies-block"></div>

					<div class="form-group">
						<div class="from-label col-sm-2">Spawn Point X:</div>
						<div class="col-sm-4">
							<input type="text" name="bly_spawn_x" id="bly_spawn_x">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {

		var bully_list = {};
		var question_list = {};

		get_bully_list = function() {

			var lvlId = "<?php echo $lvl_Id ?>";

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_bully_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					success: function(res) {
						bully_list = res.bully_list;
						console.log(bully_list);
						resolve(bully_list);
					},
					error: function() {
						console.log("cannot retreive bully list due to some error");
					}
				});
			}).then(function(bullies) {

				load_bullies_block();
			});
		}

		get_question_list = function() {

			var lvlId = "<?php echo $lvl_Id ?>";

			var promise = new Promise(function(resolve, reject) {

				$.ajax({
					type: 'post',
					url: "<?php echo base_url(); ?>Game/get_question_list",
					data: {lvlId: lvlId},
					dataType: 'json',
					success: function(res) {
						question_list = res.question_list;
						console.log(question_list);
						resolve(question_list)
					},
					error: function() {
						console.log("cannot retreive bully list due to some error");
					}
				});
			}).then(function(questions) {

				// load_questions_block();
			});
		}

		load_bullies_block = function() {

			var data = {};
			data['bully_list'] = {};

			for(var key in bully_list) {

				data['bully_list'][key] = {};

				data['bully_list'][key].id = bully_list[key].BLY_ID;
				data['bully_list'][key].type = "bully type 1";
				data['bully_list'][key].spawnPt = bully_list[key].BLY_SPAWNPOINT;
				data['bully_list'][key].maxHp = bully_list[key].BLY_MAXHP;
			}

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>dashboard/load_bullies_block",
				data: data,
				success: function(data) {
					$(".bullies-block").html(data);
				},
				error: function(err) {
					console.log(err);
				}
			});
		}

		get_bully_list();
		get_question_list();
	});

</script>