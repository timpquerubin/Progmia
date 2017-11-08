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
	}
