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

		public function get_levels($stage)
		{

			if($stage === null) {
				$levels = $this->db->query('SELECT * FROM LEVEL WHERE STAGE=\''.$stage.'\' ORDER BY LVL_NUM;');
			} else {
				$this->db->order_by("LVL_NUM", "asc");
				$levels = $this->db->get_where('LEVEL', $stage);
			}

			return $levels->result_array();
		}
		public function get_user($user)
		{
			$this->db->select('column_name');
			$query = $this->db->query('SELECT USER_ID FROM USER WHERE USER_USERNAME=\''.$user.'\';');
	        //return $query;
	        return $result=$query->row(0);	
		}

		public function get_max_level($params = null)
		{
			$max_level = $this->db->query('SELECT `level`.`LVL_NUM`,`level`.`STAGE`,`level`.`LVL_ID` FROM `level` WHERE (`level`.`LVL_NUM`,`level`.`STAGE`)in (SELECT MAX(`level`.`LVL_NUM`),`level`.`STAGE` FROM `level` group by `level`.`STAGE`)');
			return $max_level->result_array();
		}

		public function get_progress($params = null)
		{
			if($params === null) {
				$progress = $this->db->query('SELECT * FROM PROGRESS');
			} else if(isset($params['user'])) {
				//$progress = $this->db->query('SELECT * FROM PROGRESS;');
				$progress = $this->db->query('SELECT * FROM PROGRESS WHERE USER_ID=\''.$params['user'].'\';');
			}
			
			return $progress->result_array();
		}

		/*
		public function get_levels($params = null)
		{

			if($params === null) {
				$levels = $this->db->query('SELECT * FROM LEVEL ORDER BY STAGE, LVL_NUM;');
			} else {
				$this->db->order_by("STAGE", "asc");
				$this->db->order_by("LVL_ID", "asc");
				$levels = $this->db->get_where('LEVEL', $params);
			}

			return $levels->result_array();
		}
		*/
		public function get_level_details($params)
		{
			$map_details = $this->db->get_where('LEVEL', $params);

			return $map_details->result_array();
		}

		public function get_stages($params = null)
		{
				$stages = $this->db->query('SELECT * FROM STAGE;');

			return $stages->result_array();
		}
	}
?>