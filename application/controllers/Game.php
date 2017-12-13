<?php
	class Game extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
			$this->load->model('User_model');
			$this->load->model('Character_model');
		}

		public function isLoggedIn()
		{
			if(!$this->User_model->is_logged_in())
			{
				$this->session->set_flashdata('user_notloggedin', 'Please login first');
				redirect('Home');
			}
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

		public function avatar()
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
			$this->load->view('game/menu/menu_avatar', $data);
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
			// echo "<pre>";
			// var_dump($level_details);
			// echo "</pre>";
			// exit();
			
			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);
			$data['stage_list'] = $stages;
	        $data['maxlevel_list']=$this->Game_model->get_max_level();
			$data['level_list'] = $levels;
			$data['current_level'] = $current_level;
			$data['level'] = $level_details;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('pages/game2', $data);
			$this->load->view('templates/game_footer');
		}
	}
?>