<?php
	class Game extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
			$this->load->model('User_model');
			$this->load->model('Avatar_model');
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
			$avatars = $this->Avatar_model->get_all_avatar();

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


	        $data['h']=$this->Game_model->get_user($user);
	        $data['maxlevel_list']=$this->Game_model->get_max_level($user);
			$data['stage_list'] = $stages;
			$data['progress_list'] = $progress;

			$this->load->view('templates/menu_stages_header');
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
				$levels = $this->Game_model->get_levels(array('STAGE' => $stage ));
				$level_stage = $this->Game_model->get_level_stage($stage);
				$progress = $this->Game_model->get_progress(array('user' => $userID, 'stage' => $stage));
			}
	        $data['h']=$this->Game_model->get_user($user);
			$data['level_list'] = $levels;
			$data['level_stages'] = $level_stage;
			$data['progress_list'] = $progress;

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

			$stages = $this->Game_model->get_stages();
			$current_level = $this->Game_model->get_current_level($lvlId);
			$level_details = $this->Game_model->get_level_details($level_params);
			$levels = $this->Game_model->get_levels();
			$objectives = $this->Game_model->get_objectives($level_params);
			
			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);
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
	}
?>