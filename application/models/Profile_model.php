<?php
	class Profile_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}


		public function get_progress($user = null)
		{

			if($user === null) {
				$progress = $this->db->query('SELECT `user`.`USER_USERNAME`, `stage`.`STG_NAME`, `level`.`LVL_ID`, `progress`.`POINTS_SCORED` FROM `user`, `stage`, `level`, `progress` WHERE `progress`.`LVL_ID` = `level`.`LVL_ID` AND `USER`.`USER_USERNAME` = \'triston\' AND (`progress`.`POINTS_SCORED` != 0 OR `progress`.`POINTS_SCORED` != null) group by `level`.`LVL_NUM`');
			} else {
				$this->db->order_by("LVL_NUM", "asc");
				$progress = $this->db->get_where('LEVEL', $user);
			}

			return $progress->result_array();
		}
	}
