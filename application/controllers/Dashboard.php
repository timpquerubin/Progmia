<?php
	class Dashboard extends CI_Controller
	{

		public function __init()
		{
			$this->load->model('Game_model');
		}

		public function map_list()
		{
			$this->__init();

			$maps = $this->Game_model->get_all_maps();

			// echo '<pre>';
			// var_dump($maps);
			// echo '</pre>';
			// exit();

			$data['maps'] = $maps;

			$this->load->view('templates/header');
			$this->load->view('game/game_list', $data);
			$this->load->view('templates/footer');
		}

		public function add_Map()
		{
			$data['title'] = 'Create Map';

			$this->load->view('templates/header');
			$this->load->view('game/add_game',$data);
			$this->load->view('templates/footer');
		}

		public function save_add_map()
		{
			$this->__init();

			$map_size = getimagesize($_FILES['imgMap']['tmp_name']);

			// echo "<pre>";
			// var_dump(getimagesize($_FILES['imgMap']['tmp_name']));
			// echo "</pre>";
			// exit();

			$startPt = array((int)$_POST['startPtX'],(int)$_POST['startPtY']);
			
			$params['MAP_ID'] = md5($_FILES['imgMap']['name']);
			$params['MAP_NUMCOLS'] = (int)$_POST['numCols'];
			$params['MAP_GRID'] = $_POST['mapCol'];
			$params['MAP_STARTPOINT'] = json_encode($startPt);
			$params['MAP_IMGHEIGHT'] = $map_size[1];
			$params['MAP_IMGWIDTH'] = $map_size[0];

			// $test = json_decode($mapCol, true);
			
			if($_FILES['imgMap']['tmp_name'] != '')
			{
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				
				$this->load->library('upload', $config);
				
				if(!$this->upload->do_upload('imgMap'))
				{
					$errors = array('error' => $this->upload->display_errors());
					$params['MAP_FILENAME'] = 'noimage.jpg';
				}
				else {
					$data = array('upload_data' => $this->upload->data());
					$params['MAP_FILENAME'] = $_FILES['imgMap']['name'];
				}
			}

			$this->Game_model->add_map($params);
			redirect('Pages/view/home');

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