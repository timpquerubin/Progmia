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

		public function get_levels($stage = null)
		{
			if($stage === null) {
				$levels = $this->db->query('SELECT * FROM LEVEL ORDER BY STAGE, LVL_NUM;');
			} else {
				$this->db->order_by("LVL_NUM", "asc");
				$levels = $this->db->get_where('LEVEL', $stage);
			}

			return $levels->result_array();
		}

		public function get_current_level($lvl_ID)
		{
			$levels = $this->db->query('SELECT * FROM LEVEL WHERE LVL_ID=\''.$lvl_ID.'\';');
	        return $result=$levels->row(0);	
		}
		public function get_level_stage($stage = null) {

			$level_stage = $this->db->query('SELECT * FROM STAGE WHERE STG_ID=\''.$stage.'\';');

			return $level_stage->result_array();

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
			$max_level = $this->db->query('SELECT `level`.`LVL_NUM`,`level`.`STAGE`,`level`.`LVL_ID` FROM `level` WHERE (`level`.`LVL_NUM`,`level`.`STAGE`) in (SELECT MAX(`level`.`LVL_NUM`),`level`.`STAGE` FROM `level` group by `level`.`STAGE`)');
			return $max_level->result_array();
		}

		public function get_progress($params = null)
		{
			if($params === null) {
				$progress = $this->db->query('SELECT * FROM PROGRESS');
			} else if(isset($params['user']) && isset($params['stage'])) {
				$progress = $this->db->query('SELECT P.PROG_ID, P.USER_ID, P.LVL_ID, L.STAGE, P.POINTS_SCORED, L.MAX_POINTS FROM PROGRESS P, LEVEL L WHERE P.USER_ID=\''.$params['user'].'\' AND L.STAGE=\''.$params['stage'].'\' AND P.LVL_ID=L.LVL_ID;');
			} else if(isset($params['user'])) {
				$progress = $this->db->query('SELECT * FROM PROGRESS WHERE USER_ID=\''.$params['user'].'\';');
			} else if(isset($params['stage'])) {
				$progress = $this->db->query('SELECT * FROM PROGRESS P, LEVEL L WHERE P.LVL_ID=L.LVL_ID AND L.STAGE=\''.$params['stage'].'\';');
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

		public function add_objective($params)
		{
			return $this->db->insert('OBJECTIVE', $params);
		}

		public function delete_objective($params)
		{
			return $this->db->delete('OBJECTIVE', $params);
		}

		public function get_objectives($params = null)
		{
			if($params === null) {
				$objectives = $this->db->get("objective");
			} else {
				$objectives = $this->db->get_where("objective", $params);
			}

			return $objectives->result_array();
		}

		public function count_objectives($params = null)
		{
			if($params === null) {
				$objectives = $this->db->get("objective");
			} else {
				$objectives = $this->db->get_where("objective", $params);
			}

			return $objectives->num_rows();
		}
	}
?>