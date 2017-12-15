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
		/*
		public function show_student_id($data){
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('student_id', $data);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		}*/

		// Update Query For Selected Student
		/*
		public function update_student_id1($userId,$data){
		$this->db->where('student_id', $id);
		$this->db->update('students', $data);
		}*/
		public function insert_avatar($params)
		{
			$this->db->where('USER_ID', $id);
			$this->db->update('CHAR_ID', $data);
			return $this->db->insert('AVATAR', $params);
		}

		public function get_all_avatar()
		{
			$avatars = $this->db->get('AVATAR');

			return $avatars->result_array();
		}

		public function update_user_avatar($charID,$userID)
		{
			echo $charID;
			$params = array(
				'CHAR_ID' => $charID
			);



			$this->db->set($params); 
			$this->db->where('USER_ID', $userID);
			return $this->db->update('user', $params);

		}
	} 
?>