<?php
	class Game extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
			$this->load->model('Character_model');
		}

		public function stages()
		{
			$this->_init();

			$userID = $this->input->post('USER_ID');
			$user = $this->session->userdata('username');
			$stages = $this->Game_model->get_stages();
	        $data['h']=$this->Game_model->get_user($user);
			$data['stage_list'] = $stages;

			$this->load->view('templates/game_header');
			$this->load->view('game/menu/menu_stages', $data);
			$this->load->view('templates/game_footer');
		}
		public function levels()
		{
			$this->_init();

			$stage = $this->input->post('stage');
			$userID = $this->input->post('USER_ID');
			$user = $this->session->userdata('username');

			if($stage == null) {
				$levels = $this->Game_model->get_levels($stage);
			} else {
				$levels = $this->Game_model->get_levels(array('STAGE' => $stage ));
				$progress = $this->Game_model->get_progress(array('USER_ID' => $user ));
			}
	        $data['h']=$this->Game_model->get_user($user);
			$data['level_list'] = $levels;
			$data['progress_list'] = $progress;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('game/menu/menu_levels', $data);
			$this->load->view('templates/footer');
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
			$level_params = array(
				'LVL_ID' => $lvlId,
			);

			$level_details = $this->Game_model->get_level_details($level_params);

			// echo "<pre>";
			// var_dump($level_details);
			// echo "</pre>";
			// exit();
			
			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);



			$data['level'] = $level_details;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('pages/game2', $data);
			$this->load->view('templates/footer');
		}
	}
?>