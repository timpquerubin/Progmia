<?php
	class Game_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function add_map($params)
		{
			return $this->db->insert('MAP', $params);
		}

		public function get_all_maps()
		{
			$maps = $this->db->query('SELECT * FROM MAP;');

			return $maps->result_array();
		}

		public function get_map_details($params)
		{
			$map_details = $this->db->get_where('MAP', $params);

			return $map_details->result_array();
		}
	}
?>