<?php 
	class Character_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function gen_avatar_id($avtName)
		{
			$avt_rows = $this->db->get('AVATAR');

			$avt_arr = $avt_rows->result_array();

			$newId = md5(count($avt_arr) + $avtName);

			return $newId;
		}

		public function insert_avatar($params)
		{
			return $this->db->insert('AVATAR', $params);
		}

		public function get_all_avatar()
		{
			$avatars = $this->db->get('AVATAR');

			return $avatars->result_array();
		}
	} 
?>