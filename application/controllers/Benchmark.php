<?php
	class Benchmark extends CI_Controller {

		public function __init() 
		{
			$this->load->model('Game_model');
		}

		public function transferRows() 
		{
			$this->__init();

			$maps = $this->Game_model->get_all_maps();

			echo "<pre>";
			var_dump($res);
			echo "</pre>";

			// foreach ($maps as $m) {
				
			// 	$map_params = array(
			// 		'LVL_ID' =>
			// 	);

			// }
		}
	}
?>