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

			$maps = $this->Game_model->get_levels();
			$data['map_list'] = $maps;

			$this->load->view('templates/game_header');
			$this->load->view('game/menu/menu_stages', $data);
			$this->load->view('templates/game_footer');
		}

		public function levels()
		{
			$this->_init();

			$maps = $this->Game_model->get_levels();
			$data['map_list'] = $maps;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('game/menu/menu_levels', $data);
			$this->load->view('templates/footer');
		}

		public function play($lvlId)
		{
			$this->_init();

			$map_params = array(
				'LVL_ID' => $lvlId,
			);

			$mdetails = $this->Game_model->get_level_details($map_params);

			
			
			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);

			$data['map'] = $mdetails;

			$this->load->view('templates/game_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('pages/game2', $data);
			$this->load->view('templates/footer');
		}
	}
?>