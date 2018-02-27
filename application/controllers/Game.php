<?php
	class Game extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
			$this->load->model('User_model');
			$this->load->model('Avatar_model');
			$this->load->model('Profile_model');
		}

		public function isLoggedIn()
		{
			if(!$this->User_model->is_logged_in())
			{
				$this->session->set_flashdata('user_notloggedin', 'Please login first');
				redirect('Home');
			}
		}

		public function avatar()
		{
			$this->_init();
			$this->isLoggedIn();

			$userID = $this->session->userdata('user_id');
			$avatars = $this->Avatar_model->get_avatars();

			$data['avatar_list'] = $avatars;
			$data['userID'] = $userID;

			$this->load->view('templates/menu_avatar_header');
			$this->load->view('game/menu/menu_avatar', $data);
			$this->load->view('templates/menu_avatar_footer');
		}

		public function stages()
		{
			$this->_init();
			$this->isLoggedIn();

			$userID = $this->session->userdata('user_id');

			$user = $this->session->userdata('username');
			$progress = $this->Game_model->get_progress(array('user' => $userID));
			$stages = $this->Game_model->get_stages($user);

			$user1 = $this->session->userdata('username');
			$userinfo = $this->Profile_model->get_user_info($user1);
			$progress = $this->Profile_model->get_progress($user1);
			$stages = $this->Profile_model->get_stages($user1);
			$levels = $this->Profile_model->get_levels($user1);
			$total_points = $this->Profile_model->get_total_points($userID);
			$badges = $this->Profile_model->get_badges($userID);
			$avatar = $this->Game_model->get_user_avatar($userID);
			$badges = $this->Game_model->get_badges();
			$data['avatar'] = $avatar;
			$data['leaderboard_list'] = $this->Profile_model->get_leaderboard();
			$data['badges_list'] = $badges;
			$data['user_info'] = $userinfo; 
        	$data['total_points'] = $total_points;
			$data['levels_list'] = $levels;
			$data['stages_list'] = $stages;
			$data['progress_list'] = $progress;
			
	        $data['h']=$this->Game_model->get_user($user);
	        $data['maxlevel_list']=$this->Game_model->get_max_level($user);
			$data['stage_list'] = $stages;
			$data['progress_list'] = $progress;

			$this->load->view('templates/menu_stages_header', $data);
			$this->load->view('templates/load_init_links');
			$this->load->view('game/menu/menu_stages', $data);
			$this->load->view('templates/menu_stages_footer');
		}
		
		public function levels($stage = null)
		{
			$this->_init();
			$this->isLoggedIn();
			$userID = $this->session->userdata('user_id');
			$user = $this->session->userdata('username');
			if($stage == null) {
				$levels = $this->Game_model->get_levels();
				$progress = $this->Game_model->get_progress();
			} else {
				$levels = $this->Game_model->get_levels(array('STG_ID' => $stage ));
				$level_stage = $this->Game_model->get_level_stage($stage);
				$progress = $this->Game_model->get_progress(array('user' => $userID, 'stage' => $stage));
				$lvl_max_pts = $this->Game_model->get_lvl_max_points();
			}

			// var_dump($level_stage);
			// exit();

	        $data['h']=$this->Game_model->get_user($user);
			$data['level_list'] = $levels;
			$data['level_stages'] = $level_stage;
			$data['progress_list'] = $progress;
			$data['lvl_max_pts'] = $lvl_max_pts;

			$this->load->view('templates/menu_levels_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('game/menu/menu_levels', $data);
			$this->load->view('templates/menu_levels_footer');
		}

		public function index()  
	    {  
	    }  

		/*
		public function levels($stageId = null)
		{
			$this->_init();

			if($stageId == null) {
				$levels = $this->Game_model->get_levels();
			} else {
				$levels = $this->Game_model->get_levels(array('STAGE' => $stageId));
			}

			$data['level_list'] = $levels;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('game/menu/menu_levels', $data);
			$this->load->view('templates/footer');
		}
*/
		public function play($lvlId)
		{
			$this->_init();
			$this->isLoggedIn();
			$level_params = array(
				'LVL_ID' => $lvlId,
			);

			$user1 = $this->session->userdata('username');
			$stages = $this->Game_model->get_stages();
			$current_level = $this->Game_model->get_current_level($lvlId);
			$level_details = $this->Game_model->get_level_details($level_params);
			$levels = $this->Game_model->get_levels();
			$objectives = $this->Game_model->get_objectives($level_params);
			
			$userinfo = $this->Profile_model->get_user_info($user1);

			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);
			$data['userinfo'] = $userinfo;
			$data['stage_list'] = $stages;
	        $data['maxlevel_list']=$this->Game_model->get_max_level();
			$data['level_list'] = $levels;
			$data['current_level'] = $current_level;
			$data['level'] = $level_details;
			$data['objectives_list'] = $objectives;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('pages/game2', $data);
			$this->load->view('templates/game_footer');
		}

		public function play_basics($lvlId) {

			$this->_init();
			$this->isLoggedIn();


			$userID = $this->session->userdata('user_id');
			$level_params = array(
				"LVL_ID" => $lvlId
			);

			$level_info = $this->Game_model->get_level_details($level_params);
			$objectives = $this->Game_model->get_objectives($level_params);

			$next_level_params = array(
				"STG_ID" => $level_info[0]["STG_ID"],
				"LVL_NUM" => (((int) $level_info[0]["LVL_NUM"]) + 1),
			);
			
			$next_level_info = $this->Game_model->get_next_level($next_level_params);
			// echo "<pre>";
			// var_dump($next_level_info);
			// echo "</pre>";
			// exit();
			$avatar = $this->Game_model->get_user_avatar($userID);
			// echo "<pre>";
			// var_dump($level_info[0]);
			// echo "</pre>";
			// exit();
			$data['avatar'] = $avatar[0];
			$data['level_info'] = $level_info[0];
			$data['objectives_list'] = $objectives;
			$data['next_level_info'] = $next_level_info;
			$header_data['stgId'] = $level_info[0]['STG_ID'];
			// $$this->Game_model->get_tutorial($level_params);
			$this->load->view('templates/game_header',$header_data);
			$this->load->view('templates/load_init_links');
			$this->load->view('game/programming_basics.php', $data);
			$this->load->view('templates/game_footer');
		}
		public function load_tutorial(){
			$this->load->view($_POST['link']);
		}
		public function get_level_info() {

			$this->_init();

			if(isset($_POST)) {

				$level_params = array(
					"LVL_ID" => $_POST['lvlId'],
				);

				$level_info = $this->Game_model->get_level_details($level_params);

				if (sizeof($level_info) > 0) {
					echo json_encode(array("status" => true, "map_info" => $level_info[0]));
				} else {
					echo json_encode(array("status" => false, "message" => "level does not exist"));	
				}

			} else {
				echo json_encode(array("status" => false, "message" => "cannot retreive level info without the right parameter"));
			}
		}

		public function get_objectives() {

			$this->_init();

			

			if(isset($_POST)) {

				$obj_params = array(
					"LVL_ID" => $_POST['lvlId']
				);

				$objectives_list = $this->Game_model->get_objectives($obj_params);

				// echo json_encode(array("status" => true, "message" => "working"));
				// exit();

				if(sizeof($objectives_list) > 0) {
					echo json_encode(array("status" => true, "objectives_list" => $objectives_list));
				} else {
					echo json_encode(array("status" => false, "message" => "no objectives"));
				}



			} else {
				echo json_encode(array("status" => false, "message" => "failed to retreive objectives list"));
			}
		}

		public function get_bully_list() {

			$this->_init();

			if(isset($_POST)) {

				$bully_params = array(
					"LVL_ID" => $_POST["lvlId"],
				);

				$bully_list = $this->Game_model->get_bully_list($bully_params);

				echo json_encode(array("status" => true, "bully_list" => $bully_list));

			} else {
				echo json_encode(array("status" => false, "message" => "lvlid parameter is required"));
			}
		}

		public function get_question_list() {

			$this->_init();

			if(isset($_POST)) {

				if(isset($_POST["lvlId"])) {

					$question_params = array(
						"LVL_ID" => $_POST["lvlId"],
					);
				} else if(isset($_POST["bullyId"])) {

					$question_params = array(
						"BLY_ID" => $_POST["bullyId"],
					);
				}

				$question_list = $this->Game_model->get_question_list($question_params);

				echo json_encode(array("status" => true, "question_list" => $question_list));

			} else {
				echo json_encode(array("status" => false, "message" => "lvlid parameter is required"));
			}
		}

		public function display_dialog() {

			if(isset($_POST)) {

				$data["dialog"] = $_POST["dialog"];
				$data["thumb"] = $_POST["bully_thumb"];
				$data["bully_name"] = $_POST["bully_name"];

				$this->load->view('game/dialog.php', $data);

			} else {
				echo json_encode(array("status" => false, "message" => "parameter dialog is required"));
			}
		}

		public function record_progress() {

			$this->_init();

			if(isset($_POST)) {

				$userID = $this->session->userdata('user_id');
				$progress = $this->Game_model->get_progress();

				$prog_params = array(
					'PROG_ID' => (count($progress) + 1),
					'USER_ID' => $userID,
					'LVL_ID' => $_POST['lvl_id'],
					'GAME_SCORE' => $_POST['total_score']
				);

				$result = $this->Game_model->insert_progress($prog_params);

				echo json_encode(array("status" => true, "message" => "successfuly recorded progress"));
			} else {

				echo json_encode(array("status" => false, "message" => "failed to record progress"));
			}
		}
	}
?>