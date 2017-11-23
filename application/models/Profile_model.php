<?php
	class Profile_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}


		public function get_progress($user)
		{
			$progress = $this->db->query('SELECT `user`.`USER_USERNAME`, `stage`.`STG_NAME`, `stage`.`STG_DESCRIPTION`, `level`.`LVL_ID`, `progress`.`POINTS_SCORED`, `progress`.`DATE_PLAYED` FROM `user`, `stage`, `level`, `progress` WHERE `progress`.`LVL_ID` = `level`.`LVL_ID` AND `USER`.`USER_USERNAME` = \''.$user.'\' AND (`progress`.`POINTS_SCORED` != 0 OR `progress`.`POINTS_SCORED` != null) group by `level`.`LVL_NUM` order by `progress`.`DATE_PLAYED` DESC;');
			return $progress->result_array();
		}
		public function get_stages($user = null)
		{
			$stages = $this->db->query('SELECT `stage`.* FROM `stage` order by STG_ID;');
			return $stages->result_array();
		}
		public function get_levels($user = null)
		{
			$levels = $this->db->query('SELECT `level`.* FROM `level` order by LVL_NUM ASC;');

			return $levels->result_array();
		}

		public function get_user_info($user)
		{
			$levels = $this->db->query('SELECT * FROM `user` where `user`.`user_username` = \''.$user.'\';');

			return $levels->result_array();
		}


		public function get_total_points($userID)
		{
			$query = $this->db->query('SELECT SUM(POINTS_SCORED) AS value_sum FROM `progress` WHERE `progress`.`USER_ID` = \''.$userID.'\';');
			$row = $query->row();
	        return $row->value_sum;	
		}
	}
