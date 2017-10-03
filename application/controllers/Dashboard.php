<?php
	class Dashboard extends CI_Controller
	{

		public function __init()
		{
			$this->load->model('Game_model');
		}

		public function level_list()
		{
			$this->__init();

			$levels = $this->Game_model->get_levels();

			$data['levels'] = $levels;

			$this->load->view('templates/dashboard_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('dashboard/game_list', $data);
			$this->load->view('templates/dashboard_footer');
		}

		public function add_level()
		{
			$this->__init();

			$data['title'] = 'Add New Level';

			$stages = $this->Game_model->get_stages();

			$data['stage_list'] = $stages;

			$this->load->view('templates/dashboard_header');
			$this->load->view('templates/load_init_links');
			$this->load->view('dashboard/add_level',$data);
			$this->load->view('templates/dashboard_footer');
		}

		public function save_add_level()
		{
			$this->__init();

			echo "<pre>";
			var_dump($_POST);
			echo "</pre>";
			exit();

			$count_levels_params['STAGE'] = $_POST['stage'];

			$level_count = count($this->Game_model->get_levels($count_levels_params));
			$level_count++;

			$map_size = getimagesize($_FILES['imgMap']['tmp_name']);
			$startPt = array((int)$_POST['startPtX'],(int)$_POST['startPtY']);
			$lvlId = md5($_POST['stage'] + $level_count + $_POST['level-name']);

			$level_params = array(
				'LVL_ID' => $lvlId,
				'LVL_GRID' => $_POST['mapCol'],
				'LVL_NAME' => $_POST['level-name'],
				'LVL_STARTPOINT' => json_encode($startPt),
				'LVL_NUMCOLS' => (int)$_POST['numCols'],
				'LVL_IMGHEIGHT' => $map_size[1],
				'LVL_IMGWIDTH' => $map_size[0],
				'STAGE' => $_POST['stage'],
				'LVL_NUM' => $level_count,
			);
			
			// $params['MAP_ID'] = md5($_FILES['imgMap']['name']);
			// $params['MAP_NUMCOLS'] = (int)$_POST['numCols'];
			// $params['MAP_GRID'] = $_POST['mapCol'];
			// $params['MAP_STARTPOINT'] = json_encode($startPt);
			// $params['MAP_IMGHEIGHT'] = $map_size[1];
			// $params['MAP_IMGWIDTH'] = $map_size[0];

			// $test = json_decode($mapCol, true);
			
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

			$this->Game_model->add_level($level_params);
			redirect('Dashboard/level_list');

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