<?php
	class Profile_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}


		public function get_progress($user)
		{
			$progress = $this->db->query('SELECT `user`.`USER_USERNAME`, `stage`.`STG_NAME`, `stage`.`STG_DESCRIPTION`, `level`.`LVL_ID`, `progress`.`GAME_SCORE`, `progress`.`DATE_PLAYED` FROM `user`, `stage`, `level`, `progress` WHERE `progress`.`LVL_ID` = `level`.`LVL_ID` AND `USER`.`USER_USERNAME` = \''.$user.'\' AND (`progress`.`GAME_SCORE` != 0 OR `progress`.`GAME_SCORE` != null) group by `level`.`LVL_NUM` order by `progress`.`DATE_PLAYED` DESC;');
			return $progress->result_array();
		}

		public function get_leaderboard()
		{
			$leaderboard = $this->db->query('SELECT `user`.`USER_USERNAME` as `USER`, MAX(`TOTAL GAME SCORE`) as `TOTAL GAME SCORE` FROM (SELECT `user`.`USER_USERNAME`, SUM(`progress`.`GAME_SCORE`) as `TOTAL GAME SCORE` FROM `user`,`progress` WHERE `user`.`user_id` = `progress`.`user_id` GROUP BY `progress`.`GAME_SCORE`) `user`,`progress` GROUP BY `USER` ORDER BY `TOTAL GAME SCORE` DESC;');

			return $leaderboard->result_array();
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
			$query = $this->db->query('SELECT SUM(GAME_SCORE) AS value_sum FROM `progress` WHERE `progress`.`USER_ID` = \''.$userID.'\';');
			$row = $query->row();
	        return $row->value_sum;	
		}
		public function get_badges($userID)
		{
			$badges = $this->db->query('SELECT * FROM `badges` order by BDG_ORDER ASC;');

			return $badges->result_array();
		}
	}
