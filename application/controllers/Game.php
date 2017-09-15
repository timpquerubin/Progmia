<?php
	class Game extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
		}

		public function menu()
		{
			$this->_init();

			$maps = $this->Game_model->get_all_maps();

			$data['map_list'] = $maps;

			$this->load->view('templates/header');
			$this->load->view('game/game_menu', $data);
			$this->load->view('templates/footer');
		}

		public function play($mapId)
		{
			$this->_init();

			$map_params = array(
				'MAP_ID' => $mapId,
			);

			$mdetails = $this->Game_model->get_map_details($map_params);

			
			
			// $mdetails[0]['MAP_GRID'] = json_decode($mdetails[0]['MAP_GRID'], true);
			// $mdetails[0]['MAP_STARTPOINT'] = json_decode($mdetails[0]['MAP_STARTPOINT']);

			$data['map'] = $mdetails;

			$this->load->view('templates/header');
			$this->load->view('pages/game2', $data);
			$this->load->view('templates/footer');
		}

		public function create_character()
		{
			$this->_init();

			$this->load->view('templates/header');
			$this->load->view('character/create');
			$this->load->view('templates/footer');
		}
	}
?>