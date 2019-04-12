<?php

	class Benchmark extends CI_Controller {



		public function __init() 

		{

			$this->load->model('Game_model');

		}



		public function testview()

		{



			// $this->load->view('templates/load_init_links');

			$this->load->view('pages/test');

		}



		public function tryJSON ()

		{

			$sample = array(

				'col1' => 'val1',

				'col2' => 'val2',

			);



			echo "<pre>";

			var_dump($sample);

			echo "</pre>";



			$json_sample = json_encode($sample);



			echo $json_sample;



			$json_decoded = json_decode($json_sample);



			echo "<pre>";

			var_dump($json_decoded);

			echo "</pre>";

		}



		public function transferRows() 

		{

			$this->__init();



			$maps = $this->Game_model->get_all_maps();



			$ctr = 1;



			foreach ($maps as $m) {

				

				$map_params = array(

					'LVL_ID' => md5('STG_BS' + $ctr + $m['MAP_FILENAME']),

					'LVL_GRID' => $m['MAP_GRID'],

					'LVL_NAME' => $m['MAP_FILENAME'],

					'LVL_SPOINT' => $m['MAP_STARTPOINT'],

					'LVL_COLS' => $m['MAP_NUMCOLS'],

					'LVL_MAP_HEIGHT' => $m['MAP_IMGHEIGHT'],

					'LVL_MAP_WIDTH' => $m['MAP_IMGWIDTH'],

					'STAGE' => 'STG_BS',

					'LVL_NUM' => $ctr,

				);



				$this->Game_model->add_map($map_params);



				$ctr++;



			}

		}

		public function transferGoals() {

			$this->__init();

			$levels = $this->Game_model->get_levels();

			$goal_count = 0;

			// echo "<pre>";
			// var_dump($levels);
			// echo "</pre>";

			foreach ($levels as $lvl) {

				$goals = explode(',', $lvl['LVL_DESC']);
				$g_index = 1;

				foreach ($goals as $g) {
					
					$goal_info = array(
						"G_ID" => md5($lvl['LVL_ID']."_".$g_index),
						"LVL_ID" => $lvl['LVL_ID'],
						"G_NUM" => $g_index,
						"G_DESC" => trim($g),
					);

					echo "<pre>";
					var_dump($goal_info);
					echo "</pre>";

					$goal_count++;
					echo $goal_count;

					// echo $this->Game_model->insert_goal($goal_info);

					$g_index++;
				}
				
				// echo "<pre>";
				// var_dump(explode(',', $lvl['LVL_DESC']));
				// echo "</pre>";
			}
		}

	}

?>