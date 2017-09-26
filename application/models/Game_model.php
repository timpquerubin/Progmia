<?php
	class Game_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function add_level($params)
		{
			return $this->db->insert('LEVEL', $params);
		}

		public function get_levels()
		{
			$maps = $this->db->query('SELECT * FROM LEVEL;');

			return $maps->result_array();
		}

		public function get_level_details($params)
		{
			$map_details = $this->db->get_where('LEVEL', $params);

			return $map_details->result_array();
		}

		public function get_stages($params = null)
		{
			if(isset($params['STG_ID']))
			{
				$stages = $this->db->get_where('STAGE', $params);
			} else {
				$stages = $this->db->query('SELECT * FROM STAGE;');
			}

			return $stages->result_array();
		}
	}
?>