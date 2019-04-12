<?php

	class Dashboard extends CI_Controller

	{



		public function __init()

		{

			$this->load->model('Game_model');

			$this->load->model('Avatar_model');

		}



		public function index() {



			$header_data = array(

				'title' => 'Dashboard',

				'tab_active' => 'HOME',

				'page' => 'dash-home',

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/index');

			$this->load->view('templates/dashboard_footer');

		}



		public function edit_avatar($avtrId)

		{

			$this->__init();



			$avatar = $this->Game_model->get_avatar_details(array('AVTR_ID' => $avtrId));

			$data['avtrId'] = $avtrId;

			$data['avtr'] = $avatar[0];



			$header_data = array(

				'title' => 'Edit Avatar',

				'tab_active' => 'avatar',

				'page' => 'avatar-edit',

				'avtrId' => $avtrId

			);

			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/avatar/edit', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function edit_stage($stgId)

		{

			$this->__init();



			$stage = $this->Game_model->get_stage_details(array('STG_ID' => $stgId));



			$data['stage_info'] = $stage;



			// echo "<pre>";

			// var_dump($lvl);

			// echo "</pre>";

			// exit();



			$header_data = array(

				'title' => 'Edit Stage',

				'tab_active' => 'stage',

				'page' => 'stage-edit',

				'stgId' => $stgId

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/stage/edit', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function edit_level($lvlId)

		{

			$this->__init();



			$lvl = $this->Game_model->get_level_details(array('LVL_ID' => $lvlId));

			$stages = $this->Game_model->get_stages();



			$data['stage_list'] = $stages;

			$data['lvl'] = $lvl[0];



			// echo "<pre>";

			// var_dump($lvl);

			// echo "</pre>";

			// exit();



			$header_data = array(

				'title' => 'Edit Level',

				'tab_active' => 'levels',

				'page' => 'level-edit',

				'lvlId' => $lvlId

			);



			$data['lvl_info'] = $this->Game_model->get_current_level($lvlId);

			$data['lvlId'] = $lvlId;



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/level/edit', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function manage_objectives($lvlId)

		{

			$this->__init();

			$header_data = array(

				'title' => 'Edit Level',

				'tab_active' => 'levels',

				'page' => 'level-objectives',

				'lvlId' => $lvlId

			);



			$data['lvl_info'] = $this->Game_model->get_current_level($lvlId);

			$data['lvlId'] = $lvlId;



			// echo "<pre>";

			// var_dump($data);

			// echo "</pre>";



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/level/manage_objectives', $data);

			$this->load->view('templates/dashboard_footer');

		}

		public function manage_goals($lvlId) {

			$this->__init();

			$header_data = array(
				'title' => 'Edit Level',
				'tab_active' => 'levels',
				'page' => 'level-goals',
				'lvlId' => $lvlId,
			);

			$data['lvl_info'] = $this->Game_model->get_current_level($lvlId);
			$data['lvlId'] = $lvlId;

			$this->load->view('templates/dashboard_header', $header_data);
			$this->load->view('templates/load_init_links');
			$this->load->view('dashboard/level/manage_goals', $data);
			$this->load->view('templates/dashboard_footer');
		}

		public function add_goal() {

			$this->__init();

			if(isset($_POST)) {

				$goal_params = array(
					"G_ID" => md5($_POST['goal_info']['LVL_ID'].'_'.$_POST['goal_info']['G_NUM']),
					"LVL_ID" => $_POST['goal_info']['LVL_ID'],
					"G_NUM" => $_POST['goal_info']['G_NUM'],
					"G_DESC" => $_POST['goal_info']['G_DESC']
				);

				$res = $this->Game_model->add_goal($goal_params);

				if($res) {
					echo json_encode(array(
						"status" => true,
						"message" => "successfully added goal",
					));
				} else {
					echo json_encode(array(
						"status" => false,
						"message" => "failed to add goal",
					));
				}

			} else {

				echo json_encode(array(
					"status" => false,
					"message" => "failed to add goal",
				));
			}
		}

		public function delete_goal() {

			// array("BLY_ID" => $_POST['update_param']['BLY_ID'], "QSTN_NUM" => $_POST['update_param']['QSTN_NUM']), 
			// 		array("G_ID" => $_POST['update_param']['G_ID'])

			$this->__init();

			if(isset($_POST)) {

				$question_list = $this->Game_model->get_question_list(array("G_ID" => $_POST['G_ID']));
				// echo json_encode($question_list);

				if(count($question_list) > 0) {

					foreach ($question_list as $q) {
						
						$res = $this->Game_model->update_question_goal(
							array("BLY_ID" => $q['BLY_ID'], "QSTN_NUM" => $q['QSTN_NUM']), 
							array("G_ID" => null)
						);
					}
				}

				$res = $this->Game_model->delete_goal(array("G_ID" => $_POST['G_ID']));

				// echo $res;

				if($res) {
					echo json_encode(array(
						"status" => true,
						"message" => "successfully deleted goal",
					));
				} else {
					echo json_encode(array(
						"status" => false,
						"message" => "failed to delete goal",
					));
				} 

				// echo json_encode($question_list);
			}
		}

		public function assign_questions($lvlId) {

			$this->__init();

			if(isset($_POST)) {

				$header_data = array(
					'title' => 'Edit Level',
					'tab_active' => 'levels',
					'page' => 'level-manage-questions',
					'lvlId' => $lvlId,
				);

				$data['lvlId'] = $lvlId;
				$data['page'] = 'level-manage-questions';

				$this->load->view('templates/dashboard_header', $header_data);
				$this->load->view('templates/load_init_links');
				$this->load->view('dashboard/level/assign_questions', $data);
				$this->load->view('templates/dashboard_footer');
			}
		}

		public function update_question_goal() {

			$this->__init();

			if(isset($_POST)) {

				// echo json_encode($_POST);

				$res = $this->Game_model->update_question_goal(
					array("BLY_ID" => $_POST['update_param']['BLY_ID'], "QSTN_NUM" => $_POST['update_param']['QSTN_NUM']), 
					array("G_ID" => $_POST['update_param']['G_ID'])
				);

				echo json_encode(array("res" => $res));
			}
		}

		public function avatar_list()

		{

			$this->__init();



			$avatars = $this->Avatar_model->get_all_avatars();

			$data['avatars'] = $avatars;



			$header_data = array(

				'title' => 'Avatars',

				'tab_active' => 'avatars',

				'page' => 'avatar-list'

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/avatar/list', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function level_list()

		{

			$this->__init();



			$levels = $this->Game_model->get_levels();

			$stages = $this->Game_model->get_stages();



			$data['stages'] = $stages;

			$data['levels'] = $levels;



			$header_data = array(

				'title' => 'Levels',

				'tab_active' => 'levels',

				'page' => 'level-list'

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/level/list', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function stage_list()

		{

			$this->__init();



			$stages = $this->Game_model->get_stages();



			$data['stages'] = $stages;



			$header_data = array(

				'title' => 'Stages',

				'tab_active' => 'stages',

				'page' => 'stage-list'

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/stage/list', $data);

			$this->load->view('templates/dashboard_footer');

		}

		public function add_avatar()

		{

			$this->__init();



			$data['title'] = 'Add New Avatar';



			$avatars = $this->Avatar_model->get_avatars();



			$data['avatar_list'] = $avatars;



			$header_data = array(

				'title' => 'Add Avatar',

				'tab_active' => 'avatars',

				'page' => 'avatar-add'

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/avatar/add',$data);

			$this->load->view('templates/dashboard_footer');

		}



		public function add_level()

		{

			$this->__init();



			$data['title'] = 'Add New Level';



			$stages = $this->Game_model->get_stages();



			$data['stage_list'] = $stages;



			$header_data = array(

				'title' => 'Add Level',

				'tab_active' => 'levels',

				'page' => 'level-add'

			);



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/level/add',$data);

			$this->load->view('templates/dashboard_footer');

		}



		public function save_bullies() {



			$this->__init();



			if(isset($_POST)) {



				if(isset($_POST["bullies"])) {



					$bully_list = $_POST["bullies"];

					$lvl_id = $_POST["lvlId"];

					$bly_ctr = 0;

					$date_today = date('Y-m-d');



					foreach ($bully_list as $b) {



						$bly_id = md5($lvl_id.$bly_ctr.$date_today);

						$spawnPt = array(

							(int)$b["spawnPt"][0],

							(int)$b["spawnPt"][1],

						);

						

						$bully_params = array(

							"BLY_ID" => $bly_id,

							"LVL_ID" => $lvl_id,

							"BLY_IMAGEURL" => "bully.png",

							"BLY_SPAWNPOINT" => json_encode($spawnPt),

							"BLY_MAXHP" => $b["maxHp"],

						);



						$this->Game_model->insert_bully($bully_params);



						if(isset($b["questions"])) {



							foreach($b["questions"] as $q) {



								$question_params = array(

									"BLY_ID" => $bly_id,

									"QSTN_NUM" => $q["qstn_num"],

									"QSTN_DIALOG" => $q["qstn_dialog"],

									"QSTN_ANSWER" => json_encode($q["qstn_ans"]),

									"QSTN_TYPE" => $q["qstn_type"],

								);



								$this->Game_model->insert_question($question_params);

							}

						}



						$bly_ctr++;

					}



					echo json_encode(array(

						"status" => true,

						"message" => "bullies have successfully added",

					));



				} else {

					echo json_encode(array(

						"status" => false,

						"message" => "no bullies",

					));

				}



			} else {

				echo json_encode(array(

					"status" => false,

					"message" => "failed to save bullies",

				));

			}

		}



		public function save_add_question() {



			$this->__init();



			if(isset($_POST)) {



				$question_info = $_POST["question_info"];



				$count_params = array(

					"BLY_ID" => $question_info["bullyId"],

				);



				$qstnList = $this->Game_model->get_question_list($count_params);



				// var_dump($qstnList);



				$qstn_count = count($qstnList) + 1;



				$question_params = array(

					"BLY_ID" => $question_info["bullyId"],

					"QSTN_NUM" => $qstn_count,

					"QSTN_DIALOG" => $question_info["qstn_dialog"],

					"QSTN_ANSWER" => json_encode($question_info["qstn_ans"]),

					// "QSTN_TYPE" => $question_info["qstn_type"],

				);



				$this->Game_model->insert_question($question_params);



				echo json_encode(array("status" => true, "message" => "successfully added question"));

			} else {

				echo json_encode(array("status" => false, "message" => "failed to add question, parameter is required"));

			}

		}



		public function save_add_bully() {



			$this->__init();



			// echo "<pre>";

			// var_dump($_POST);

			// echo "</pre>";



			if(isset($_POST)) {



				$date_today = date('Y-m-d');

				$bully_info = $_POST["bully_info"];



				$get_bully_params = array(

					"LVL_ID" => $_POST["lvlId"]

				);



				$bly_list = $this->Game_model->get_bully_list($get_bully_params);

				$bly_ctr = count($bly_list) + 1;



				$bly_id = md5($_POST["lvlId"].$bly_ctr.$date_today);

				$spawnPt = array(

						(int)$bully_info["bly_spawn_x"],

						(int)$bully_info["bly_spawn_y"],

				);



				$bully_params = array(

					"BLY_ID" => $bly_id,

					"LVL_ID" => $_POST["lvlId"],

					"BLY_IMAGEURL" => $bully_info["bly_type"],

					"BLY_THUMB_FILENAME" => $bully_info["bly_thumb"],

					"BLY_SPAWNPOINT" => json_encode($spawnPt),

					"BLY_MAXHP" => $bully_info["bly_maxHp"],

					"BLY_NAME" => $bully_info["bly_name"],

				);



				$this->Game_model->insert_bully($bully_params);



				echo json_encode(array("status" => true, "message" => "succesfully inserted bully"));

			} else {

				echo json_encode(array("status" => false, "message" => "failed to insert bully due to lack of parameter"));

			}

		}



		public function manage_bullies($lvlId) {



			$this->__init();



			$header_data = array(

				'title' => 'Manage Bullies',

				'tab_active' => 'levels',

				'page' => 'level-bullies',

				'lvlId' => $lvlId

			);



			$data['lvl_Id'] = $lvlId;



			$this->load->view('templates/dashboard_header', $header_data);

			$this->load->view('templates/load_init_links');

			$this->load->view('dashboard/level/manage_bullies', $data);

			$this->load->view('templates/dashboard_footer');

		}



		public function load_objectives_block() 

		{

			if(count($_POST) > 0) {

				$data['objectives'] = $_POST['objectives'];

			} else {

				$data['objectives'] = [];

			}



			$this->load->view('dashboard/objectives_block', $data);

		}

		public function load_goals_block() {

			if(count($_POST) > 0) {
				$data['goals'] = $_POST['goals'];
				$data['page'] = $_POST['page'];
			} else {
				$data['goals'] = [];
			}

			$this->load->view('dashboard/goals_block', $data);
		}



		public function load_questions_block() {



			if(count($_POST) > 0) {

				$data['question_list'] = $_POST['questions'];

				if(isset($_POST['page']))
					$data['page'] = $_POST['page'];
				if(isset($_POST['goals']))
					$data['goals'] = $_POST['goals'];
			} else {

				$data['question_list'] = [];

			}



			$this->load->view('dashboard/questions_block', $data);

		}



		public function load_commands_block() {



			if(count($_POST) > 0) {

				$data['command_list'] = $_POST['command_list'];

			} else {

				$data['command_list'] = [];

			}



			$this->load->view('dashboard/commands_block', $data);

		}



		public function load_codes_block() {



			if(count($_POST) > 0) {

				$data['code_list'] = $_POST['code_list'];

			} else {

				$data['code_list'] = [];

			}



			$this->load->view('dashboard/codes_block', $data);

		}



		public function load_print_block() {

			if(count($_POST) > 0) {

				$data['print_list'] = $_POST['print_list'];

			} else {

				$data['print_list'] = [];

			}



			$this->load->view('dashboard/print_block', $data);

		}



		public function load_variables_block() {



			if(count($_POST) > 0) {

				$data['var_list'] = $_POST['variables'];

			} else {

				$data['var_list'] = [];

			}



			$this->load->view('dashboard/variables_block', $data);

		}



		public function load_bullies_block() {



			if(count($_POST) > 0) {

				$data['bully_list'] = $_POST['bully_list'];

			} else {

				$data['bully_list'] = [];

			}



			$this->load->view('dashboard/bullies_block', $data);

		}



		public function load_operations_block() {



			if(count($_POST) > 0) {

				$data['operation_list'] = $_POST['operation_list'];

			} else {

				$data['operation_list'] = [];

			}



			$this->load->view('dashboard/operations_block', $data);

		}




		public function save_add_avatar()

		{

			$this->__init();



			echo "<pre>";

			var_dump($_POST);

			var_dump($_FILES);

			echo "</pre>";



			$avtrId = $this->Avatar_model->gen_avatar_id($_POST['avatar-name']);



			// $avatar_count = count($this->Avatar_model->get_avatars($count_levels_params));

			// $avatar_count++;



			// $avtrId = md5($_POST['stage'].$level_count.$_POST['level-name']);

			// $avtrId = $avatarcount;

			// echo $avatarId;

			// exit();

			$avatar_params = array(

				'AVTR_ID' => $avtrId,

				'AVTR_NAME' => $_POST['avatar-name'],

				'AVTR_SPRITE_FILENAME' => $_FILES['imgSprite']['name'],

				'AVTR_FRONTVIEW_FILENAME' => $_FILES['imgFront']['name'],

				'AVTR_THUMBNAIL_FILENAME' => $_FILES['imgThumb']['name']

			);

			// $upload_params = array(

			// 	''=>

			// );

			// $this->upload_img();

			if($_FILES['imgFront']['name'] != '')

			{

				$config1['upload_path'] = './assets/images/avatars/FRONTVIEW';

				$config1['allowed_types'] = 'png';

				$config1['max_size'] = '2048';

				$config1['max_width'] = '2000';

				$config1['max_height'] = '2000';

				$config1['file_name'] = $avtrId;

				$this->load->library('upload', $config1);

				$this->upload->initialize($config1);

				if(!$this->upload->do_upload('imgFront'))

				{

					$errors = array('error' => $this->upload->display_errors());

				}

				else {

					$data = array('upload_data' => $this->upload->data());

					$avatar_params['AVTR_FRONTVIEW_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

				}

			}

			if($_FILES['imgSprite']['name'] != '')

			{

				$config2['upload_path'] = './assets/images/avatars/SPRITES';

				$config2['allowed_types'] = 'png';

				$config2['max_size'] = '2048';

				$config2['max_width'] = '2000';

				$config2['max_height'] = '2000';

				$config2['file_name'] = $avtrId;

				

				$this->load->library('upload', $config2);

				$this->upload->initialize($config2);

				if(!$this->upload->do_upload('imgSprite'))

				{

					$errors = array('error' => $this->upload->display_errors());

				}

				else {

					$data = array('upload_data' => $this->upload->data());

					$avatar_params['AVTR_SPRITE_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

				}

			}

			if($_FILES['imgThumb']['name'] != '')

			{

				$config3['upload_path'] = './assets/images/avatars/THUMBNAIL';

				$config3['allowed_types'] = 'png';

				$config3['max_size'] = '2048';

				$config3['max_width'] = '2000';

				$config3['max_height'] = '2000';

				$config3['file_name'] = $avtrId;

				

				$this->load->library('upload', $config3);

				$this->upload->initialize($config3);

				if(!$this->upload->do_upload('imgThumb') )

				{

					$errors = array('error' => $this->upload->display_errors());

				}

				else {

					$data = array('upload_data' => $this->upload->data());

					$avatar_params['AVTR_THUMBNAIL_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

				}

			}





			$new_avatar = $this->Avatar_model->add_avatar($avatar_params);



			// $return['avtr'] = $avtrId;



			// echo "<pre>";

			// echo json_encode($return);

			// echo "</pre>";

			// exit();



			// redirect('Dashboard/level_list');



		}



		// public function upload_img($params){

		// 	if($_FILES['imgSprite']['name'] != '' && $_FILES['imgFront']['name'] != '' && $_FILES['imgThumb']['name'] != '')

		// 	{

		// 		$config['upload_path'] = './assets/images/avatars/sprites';

		// 		$config['allowed_types'] = 'png';

		// 		$config['max_size'] = '2048';

		// 		$config['max_width'] = '2000';

		// 		$config['max_height'] = '2000';

		// 		$config['file_name'] = $avtrId;

				

		// 		$this->load->library('upload', $config);

				

		// 		if(!$this->upload->do_upload('imgSprite') && !$this->upload->do_upload('imgFront') && !$this->upload->do_upload('imgThumb') )

		// 		{

		// 			$errors = array('error' => $this->upload->display_errors());

		// 		}

		// 		else {

		// 			$data = array('upload_data' => $this->upload->data());



		// 			$avatar_params['AVTR_SPRITE_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

		// 			$avatar_params['AVTR_FRONTVIEW_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

		// 			$avatar_params['AVTR_THUMBNAIL_FILENAME'] =  $avtrId.$data['upload_data']['file_ext'];

		// 		}

		// 	}

		// }



		public function save_add_level()

		{

			$this->__init();



			// echo "<pre>";

			// var_dump($_POST);

			// echo "</pre>";

			// exit();



			$count_levels_params['STG_ID'] = $_POST['stage'];



			$level_count = count($this->Game_model->get_levels($count_levels_params));

			$level_count++;



			$map_size = getimagesize($_FILES['imgMap']['tmp_name']);

			$startPt = array((int)$_POST['startPtX'],(int)$_POST['startPtY']);

			$lvlId = md5($_POST['stage'].$level_count.$_POST['level-name']);



			$level_params = array(

				'LVL_ID' => $lvlId,

				'LVL_GRID' => $_POST['mapCol'],

				'LVL_NAME' => $_POST['level-name'],

				'LVL_STARTPOINT' => json_encode($startPt),

				'LVL_NUMCOLS' => (int)$_POST['numCols'],

				'LVL_IMGHEIGHT' => $map_size[1],

				'LVL_IMGWIDTH' => $map_size[0],

				'STG_ID' => $_POST['stage'],

				'LVL_NUM' => $level_count,

				'LVL_DESC' => $_POST['level-description'],

			);

			

			if($_FILES['imgMap']['tmp_name'] != '')

			{

				$config['upload_path'] = './assets/images/levels';

				$config['allowed_types'] = 'gif|jpg|png';

				$config['max_size'] = '2048';

				$config['max_width'] = '2000';

				$config['max_height'] = '2000';

				$config['file_name'] = $lvlId;

				

				$this->load->library('upload', $config);

				

				if(!$this->upload->do_upload('imgMap'))

				{

					$errors = array('error' => $this->upload->display_errors());

				}

				else {

					$data = array('upload_data' => $this->upload->data());



					$level_params['LVL_FILENAME'] =  $lvlId.$data['upload_data']['file_ext'];

				}

			}



			$new_level = $this->Game_model->add_level($level_params);



			$return['lvlId'] = $lvlId;



			// echo "<pre>";

			echo json_encode($return);

			// echo "</pre>";

			// exit();



			// redirect('Dashboard/level_list');



		}



		public function delete_objective()

		{

			$this->__init();

			

			if(isset($_POST))

			{

				$delete_params = array(

					'LVL_ID' => $_POST['lvlId'],

					'OBJ_NUM' => $_POST['objNum']

				);



				$res = $this->Game_model->delete_objective($delete_params);



				echo "<pre>";

				var_dump($res);

				echo "</pre>";

				exit();

			}

		}



		public function delete_level()

		{

			$this->__init();

			

			if(isset($_POST))

			{

				$lvlId = $_POST['lvlId'];

				$array = array(

					'LVL_ID' => $_POST['lvlId']

				);

				$res = $this->Game_model->delete_objective($array);

				$res = $this->Game_model->delete_level($array);

			}

		}

		public function delete_bully() {

			$this->__init();

			if(isset($_POST)) 
			{
				$blyId = $_POST['bly_id'];

				$array = array(
					'BLY_ID' => $blyId
				);

				$res_bly = $this->Game_model->delete_question($array);
				$res_qtn = $this->Game_model->delete_bully($array);
			}
		}



		public function get_objectives()

		{

			$this->__init();



			if(!isset($_POST['lvlId'])) {

				$objectives = $this->Game_model->get_objectives();

			} else {

				$obj_params = array(

					'LVL_ID' => $_POST['lvlId']

				);



				$objectives = $this->Game_model->get_objectives($obj_params);

			}



			echo json_encode($objectives);

		}



		public function save_objectives()

		{



			$this->__init();

			if(count($_POST) > 0) {

				$objectives = $_POST['objectives'];

				$lvlId = $_POST['lvlId'];



				$count_params['LVL_ID'] = $lvlId;

				$obj_count = $this->Game_model->count_objectives($count_params);



				if($obj_count === 0) {

					$objCtr = 1;

				} else {



					$curr_obj_params['LVL_ID'] = $lvlId;

					$curr_obj = $this->Game_model->get_objectives($curr_obj_params);



					$objCtr = $curr_obj[$obj_count - 1]['OBJ_NUM'] + 1;

				}



				foreach ($objectives as $obj) {



					$jsonVal = array();

					$jsonVal[$obj['type']] = $obj['value'];

					

					$obj_params = array(

						'LVL_ID' => $lvlId,

						'OBJ_NUM' => $objCtr,

						'OBJ_DESC' => $obj['desc'],

						'OBJ_POINTS' => $obj['points'],

						'OBJ_JSONVAL' => json_encode($jsonVal),

					);



					$this->Game_model->add_objective($obj_params);



					$objCtr++;



				}

			}



			echo json_encode(array('status' => true));

		}



		public function temp_insert_char()

		{

			$this->__init();



			$avtName = 'red_girl';

			$avtId = $this->Game_model->gen_avatar_id($avtName);

			$sprite_fname = $avtId.".png";



			$params = array(

				'CHAR_ID' => $avtId,

				'CHAR_NAME' => $avtName,

				'CHAR_SPRITEFILENAME' => $sprite_fname,

			);



			$this->Game_model->insert_avatar($params);

		}

	}

?>