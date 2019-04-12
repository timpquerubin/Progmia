<?php
	class Game extends CI_Controller
	{
		//testing FTP
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
				redirect('login');
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

		public function MainMenu()
		{
			$this->_init();
			$this->isLoggedIn();

			$userID = $this->session->userdata('user_id');

			$user = $this->session->userdata('username');

			$prog_params = array(
				'user' => $userID,
				'type' => 'max_points',
			);

			// $progress = $this->Game_model->get_progress(array('user' => $userID));
			$progress = $this->Game_model->get_progress($prog_params);
			$stages = $this->Game_model->get_stages($user);
			
			$profile = $this->Game_model->get_profileprogress($userID);
			$user1 = $this->session->userdata('username');
			$userinfo = $this->Profile_model->get_user_info($user);
			// $progress = $this->Profile_model->get_progress($user1);
			$stages = $this->Profile_model->get_stages($user1);
			$levels = $this->Profile_model->get_levels($user1);
			$total_points = $this->Profile_model->get_total_points($userID);
			$badges = $this->Profile_model->get_badges($userID);
			$avatar = $this->Game_model->get_user_avatar($userID);
			$badges = $this->Game_model->get_badges();
			$user_badges = $this->Game_model->get_user_badges(array("user" => $userID));
			$stg_max_lvls = $this->Game_model->get_max_level();
// 			echo "<pre>";
// // 			var_dump($this->Game_model->get_max_level());
// 			echo "</pre>";
// 			echo "<pre>";
// 			var_dump($levels);
// 			echo "</pre>";
// 			exit();

			$isNxtStglocked = false;

			foreach ($stages as $stg_key => $stg_val) {
				
				foreach ($stg_max_lvls as $mlvl) {
					
					if($stages[$stg_key]['STG_ID'] == $mlvl['STG_ID']) {

				// 		echo "<pre>";
				// 		var_dump($this->Game_model->get_progress(array('user' => $userID, 'lvl' => $mlvl['LVL_ID'])));
				// 		echo "</pre>";
						// exit();
						$stages[$stg_key]['isLocked'] = $isNxtStglocked;
						$stg_prog = $this->Game_model->get_progress(array('user' => $userID, 'lvl' => $mlvl['LVL_ID']));
						// echo "<pre>";
				// 		var_dump(array('user' => $userID, 'lvl' => $mlvl['LVL_ID']));
						// var_dump($stg_prog);
						// echo "</pre>";

						if(count($stg_prog) > 0 && $stg_prog[0]["PROG_ID"]) {

							$best_score = floatval($stg_prog[0]['BEST_SCORE']);
				// 			var_dump($best_score);
							if($best_score > 0) {
								$isNxtStglocked = false;
								// $stages[$stg_key]['isLocked'] = false;
								// echo $stg;
								// var_dump($stg);
							} else {
								$isNxtStglocked = true;
								// $stages[$stg_key]['isLocked'] = true;
							}
						} else {
							$isNxtStglocked = true;
							// $stages[$stg_key]['isLocked'] = true;
						}
					} 
					// else if($stages[$stg_key]['STG_NUM'] == '1') {
					// 	$stages[$stg_key]['isLocked'] = false;
					// }
				}
			}

			// echo "<pre>";
			// var_dump($stages);
			// echo "</pre>";
			// exit();

			$data['avatar'] = $avatar;
			$data['leaderboard_list'] = $this->Profile_model->get_leaderboard();
			$data['rank_list'] = $this->Profile_model->get_rank();
			$data['badges_list'] = $badges;
			$data['user_badges'] = $user_badges;
			$data['user_info'] = $userinfo;
        	$data['total_points'] = $total_points;
			$data['levels_list'] = $levels;
			$data['stages_list'] = $stages;
			$data['progress_list'] = $progress;
			
			$data['userinfo'] = $userinfo;
	        $data['h']=$this->Game_model->get_user($user);
	        $data['maxlevel_list']=$this->Game_model->get_max_level($user);
			$data['stage_list'] = $stages;
			// $data['progress_list'] = $progress;

			$data['profileprogress'] = $profile;
			// var_dump($profile);
			// exit();
			$this->load->view('templates/main_menu_header', $data);
			// $this->load->view('templates/load_init_links');
			$this->load->view('game/menu/main_menu', $data);
			$this->load->view('templates/main_menu_footer');
			 //echo "<pre>";

			 //var_dump($userinfo);

			 //echo "</pre>";

			 //exit();
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
				$progress = $this->Game_model->get_progress(array('user' => $userID, 'stage' => $stage, 'type' => 'max_points'));
				$lvl_max_pts = $this->Game_model->get_lvl_max_points();
			}

			// echo "<pre>";
			// var_dump($levels);
			// echo "</pre>";
			// exit();

			// echo "<pre>";
			// var_dump($lvl_max_pts);
			// echo "</pre>";
			// exit();

			$next_lvl_isUnlocked = true;

			foreach ($levels as $key_lvl => $lvl_val) {
				// echo $key_lvl;

				$levels[$key_lvl]['isUnlocked'] = $next_lvl_isUnlocked;

				$lvl_prog = $this->Game_model->get_progress(array('user' => $userID, 'lvl' => $lvl_val['LVL_ID']));

				if($lvl_prog[0]['PROG_ID']) {
					$next_lvl_isUnlocked = true;
				} else {
					$next_lvl_isUnlocked = false;
				}
			}

			// echo "<pre>";
			// var_dump($levels);
			// echo "</pre>";
			// exit();

			$avatar = $this->Game_model->get_user_avatar($userID);
			$data['avatar'] = $avatar[0];
			// var_dump($level_stage);
			// exit();
	        $data['h']=$this->Game_model->get_user($user);
			$data['level_list'] = $levels;
			$data['level_stages'] = $level_stage;
			$data['progress_list'] = $progress;
			$data['lvl_max_pts'] = $lvl_max_pts;

			$this->load->view('templates/menu_levels_header');
			// $this->load->view('templates/load_init_links');
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
			$userID = $this->session->userdata('user_id');
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
			$avatar = $this->Game_model->get_user_avatar($userID);
			$level_info = $this->Game_model->get_level_details($level_params);

			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);
			$data['level_info'] = $level_info[0];
			$data['avatar'] = $avatar[0];
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
			$goals = $this->Game_model->get_goal_list($level_params);

			$next_level_params = array(
				"STG_ID" => $level_info[0]["STG_ID"],
				"LVL_NUM" => (((int) $level_info[0]["LVL_NUM"]) + 1),
			);

			// $next_stage_params = array(
			// 	"STG_ID" => $level_info[0]["STG_ID"],
			// 	"STG_NUM" => (((int) $stage_info[0]["STG_NUM"]) + 1),
			// );
			// $next_stage_info = $this->Game_model->get_next_stage($next_stage_params);

			$next_level_info = $this->Game_model->get_next_level($next_level_params);
			$avatar = $this->Game_model->get_user_avatar($userID);
			$data['level_title'] =  $this->Game_model->get_level_title($lvlId);
			$data['avatar'] = $avatar[0];
			$data['level_info'] = $level_info[0];
			$data['objectives_list'] = $objectives;
			$data['goal_list'] = $goals;

			// if (sizeof($prev_stage_info) > 0)
			// {
			// 	$data['prev_stage_info'] = $prev_stage_info[0];
			// }
			// else
			// {
			// 	$data['prev_stage_info'] = array();
			// }

			if (sizeof($next_level_info) > 0)
			{
				$data['next_level_info'] = $next_level_info[0];
			}
			else
			{
				$data['next_level_info'] = array();
				// if (sizeof($next_stage_info) > 0)
				// {
				// 	$data['next_stage_info'] = $next_stage_info[0];
				// }
				// else
				// {
				// 	$data['next_stage_info'] = array();
				// }
			}

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

		public function get_goal_list() {

			$this->_init();

			if(isset($_POST)) {

				$goal_params = array(
					"LVL_ID" => $_POST["lvl_id"],
				);

				// echo json_encode(array("status" => true, "message" => $_POST["lvl_id"]));

				$goal_list = $this->Game_model->get_goal_list($goal_params);
				
				echo json_encode(array("status" => true, "goal_list" => $goal_list));
			
			} else {
				echo json_encode(array("status" => true, "message" => "lvl_id parameter is required"));
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
				$data["tag"] = $_POST["tag"];

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

		public function testing() {

			$this->_init();
			$userID = $this->session->userdata('user_id');

			$user_badge_params = array(
				'user' => $userID,
			);

			$user_badge_list = $this->Game_model->get_user_badges($user_badge_params);
			var_dump($user_badge_list);
		}

		public function load_user_badges(){

			$this->_init();
			$user_badges = $this->Game_model->get_user_badges(array("user" => $_POST["userID"]));
			// echo var_dump($user_badges);
			$data["user_badges"] = $user_badges;
			$this->load->view('game/user_badges_block.php', $data);
		}

		public function check_badges() {

			$this->_init();

			if(isset($_POST)) {

				$userID = $this->session->userdata('user_id');
				$stage_id = $_POST['stage_id'];
				$finishCtr = 0;
				$twoStrCtr = 0;
				$perfectCtr = 0;
				$achieved_badges = array();

				$badge_params = array(
					'stage_id' => $stage_id,
				);

				$badge_list = $this->Game_model->get_badges($badge_params);
				// echo json_encode($badge_list);

				$user_badge_params = array(
					'user' => $userID,
				);

				$user_badge_list = $this->Game_model->get_user_badges($user_badge_params);
				// echo json_encode($user_badge_list);

				$prog_params = array(
					'user' => $userID,
					'stage' => $stage_id,
					'type' => 'max_points',
				);

				$progress_list = $this->Game_model->get_progress($prog_params);
				// echo json_encode($progress_list);

				$level_list = $this->Game_model->get_levels(array('STG_ID' => $stage_id));
				// echo json_encode($level_list);
				foreach ($level_list as $lvl) {

					foreach ($progress_list as $prog) {
						
						if($lvl['LVL_ID'] == $prog['LVL_ID']) {

							$max_pts = $this->Game_model->get_lvl_max_points(array('level' => $lvl['LVL_ID']));

							$score_perc = floatval(($prog['BEST_SCORE']/$max_pts[0]['MAX_PTS'])*100);

							if($prog['BEST_SCORE'] >= $max_pts[0]['MAX_PTS']) {
								$perfectCtr++;
							}

							// if($prog['BEST_SCORE'] > 0) {
							// 	$finishCtr++;
							// }

							if($score_perc > 0) {
								$finishCtr++;
							}

							if($score_perc >= 50) {
								$twoStrCtr++;
							}
						}
					}
				}

				// echo json_encode($scores);

				if(count($level_list) == $finishCtr) {

					foreach ($badge_list as $bdg) {
						
						if($bdg['TYPE'] == "finish") {
							$achieved_badges['finish_badge'] = $bdg;
						}
					}
				}

				if(count($level_list) == $twoStrCtr) {

					foreach ($badge_list as $bdg) {
						
						if($bdg['TYPE'] == "2-star") {
							$achieved_badges['twoStr_badge'] = $bdg;
						}
					}
				}


				if(count($level_list) == $perfectCtr) {

					foreach ($badge_list as $bdg) {
						
						if($bdg['TYPE'] == "perfect") {
							$achieved_badges['perfect_badge'] = $bdg;
						}
					}
				}

				
				

				

				foreach ($achieved_badges as $ab_key => $ab_val) {
					foreach ($user_badge_list as $ub) {
						
						if($ab_val['BDG_ID'] == $ub['BDG_ID']) {
							unset($achieved_badges[$ab_key]);
						}
					}
				}

				foreach ($achieved_badges as $b) {
					
					$rec_badge_param = array(
						"USER_ID" => $userID,
						"BDG_ID" => $b["BDG_ID"],
					);

					$rec_result = $this->Game_model->record_user_badge($rec_badge_param);
				}

				echo json_encode($achieved_badges);

				// if(count($badge_list) > 0) {


				// } else {
				// 	echo json_encode(array("status" => false, "message" => "there are no badges for this stage"));
				// }
			} else {
				echo json_encode(array("status" => false, "message" => "failed to check badges due to lack of parameters"));
			}
		}

		public function load_badge_block() {

			$this->_init();

			if(isset($_POST)) {

				if(isset($_POST["badge_list"])) {
					if(count($_POST["badge_list"])) {
						$data['achieved_badges'] = $_POST['badge_list'];
					} else {
						$data['achieved_badges'] = [];
					}
				} else {
					$data['achieved_badges'] = array();
				}

				$this->load->view('game/badge_block.php', $data);
			}
		}
	}
?>