<?php
    date_default_timezone_set('Asia/Manila');
	class Game_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function add_level($params)
		{
			return $this->db->insert('level', $params);
		}

		public function get_levels($stage = null)
		{
			if($stage === null) {
				$levels = $this->db->query('SELECT * FROM level ORDER BY STG_ID, LVL_NUM;');
			} else {
				$this->db->order_by("LVL_NUM", "asc");
				$levels = $this->db->get_where('level', $stage);
			}

			return $levels->result_array();
		}

		public function get_user_avatar($user){
			$avatar = $this->db->query('SELECT `avatar`.*,`user`.`USER_ID` FROM `user`, `avatar` WHERE `user`.`USER_ID`=\''.$user.'\' AND `avatar`.`AVTR_ID`=`user`.`AVTR_ID`;');
			return $avatar->result_array();
		}
		// public function get_badges(){
		// 	$bdg = $this->db->query('SELECT * FROM BADGES ORDER BY BDG_ORDER;');
		// 	return $bdg->result_array();
		// }

		public function get_next_level($params) {

			$level_info = $this->db->query('SELECT * FROM level WHERE STG_ID=\''.$params['STG_ID'].'\' AND LVL_NUM=\''.$params['LVL_NUM'].'\';');

			return $level_info->result_array();
		}

		public function get_current_level($lvl_ID)
		{
			$levels = $this->db->query('SELECT * FROM level WHERE LVL_ID=\''.$lvl_ID.'\';');
	        return $result=$levels->row(0);
		}
		public function get_level_stage($stage = null) {

			$level_stage = $this->db->query('SELECT * FROM stage WHERE STG_ID=\''.$stage.'\';');

			return $level_stage->result_array();

		}

		public function get_user($user)
		{
			$this->db->select('column_name');
			$query = $this->db->query('SELECT USER_ID FROM user WHERE USER_USERNAME=\''.$user.'\';');
	        //return $query;
	        return $result=$query->row(0);
		}

		public function get_max_level($params = null)
		{
			$max_level = $this->db->query('SELECT `level`.`LVL_NUM`,`level`.`STG_ID`,`level`.`LVL_ID` FROM `level` WHERE (`level`.`LVL_NUM`,`level`.`STG_ID`) in (SELECT MAX(`level`.`LVL_NUM`),`level`.`STG_ID` FROM `level` group by `level`.`STG_ID`)');
			return $max_level->result_array();
		}

		public function get_progress($params = null)
		{
			if($params === null) {
				$progress = $this->db->query('SELECT * FROM progress');
               } else if(isset($params['limit']) && isset($params['order-by'])) {
                    $progress =   $this->db->query('SELECT U.USER_USERNAME, U.AVTR_ID, S.STG_NAME, S.STG_DESCRIPTION, S.STG_FILENAME, L.LVL_ID, L.LVL_NUM, L.LVL_NAME, P.GAME_SCORE, P.DATE_PLAYED FROM user U, stage S, progress P, level L WHERE U.USER_ID=P.USER_ID AND P.LVL_ID=L.LVL_ID AND S.STG_ID=L.STG_ID ORDER BY '. $params['order-by'] .' DESC LIMIT '. $params['limit']['start'] .', '. $params['limit']['rows'] .';');
			}  else if(isset($params['user']) && isset($params['type'])) {

				if($params['type'] == 'max_points' && isset($params['stage'])) {
					// $progress = $this->db->query('SELECT USER_ID, LVL_ID, MAX(GAME_SCORE) FROM progress WHERE USER_ID='.$params['user'].' GROUP BY LVL_ID');
					$progress = $this->db->query('SELECT P.USER_ID, P.LVL_ID,L.STG_ID, MAX(P.GAME_SCORE) AS BEST_SCORE FROM progress P, level L WHERE P.USER_ID='.$params['user'].' AND L.STG_ID=\''.$params['stage'].'\' AND P.LVL_ID=L.LVL_ID GROUP BY LVL_ID');
				} else if($params['type'] == 'max_points') {
					// echo $params['user'];
					$progress = $this->db->query('SELECT P.USER_ID, P.LVL_ID,L.STG_ID, MAX(P.GAME_SCORE) AS BEST_SCORE FROM progress P, level L WHERE P.USER_ID='.$params['user'].' AND P.LVL_ID=L.LVL_ID GROUP BY P.LVL_ID');
				}
			} else if(isset($params['user']) && isset($params['stage'])) {
				$progress = $this->db->query('SELECT P.PROG_ID, P.USER_ID, P.LVL_ID, L.STG_ID, P.GAME_SCORE FROM progress P, level L WHERE P.USER_ID=\''.$params['user'].'\' AND L.STG_ID=\''.$params['stage'].'\' AND P.LVL_ID=L.LVL_ID;');
			} else if(isset($params['user']) && isset($params['lvl'])) {
				$progress = $this->db->query('SELECT PROG_ID, USER_ID, LVL_ID, MAX(GAME_SCORE) AS BEST_SCORE FROM progress WHERE USER_ID=\''.$params['user'].'\' AND LVL_ID=\''.$params['lvl'].'\'');
				// echo "here";
			} else if(isset($params['user'])) {
				$progress = $this->db->query('SELECT * FROM progress WHERE USER_ID=\''.$params['user'].'\';');
			} else if(isset($params['stage'])) {
				$progress = $this->db->query('SELECT * FROM progress P, level L WHERE P.LVL_ID=L.LVL_ID AND L.STG_ID=\''.$params['STG_ID'].'\';');
			}

			return $progress->result_array();
		}

		public function get_badges($params = null) {

			if($params === null) {
				// $bdg = $this->db->query('SELECT * FROM BADGES ;');
				$badges = $this->db->query('SELECT * FROM badges ORDER BY BDG_ORDER');
			} else if(isset($params['stage_id'])) {
				$badges = $this->db->query('SELECT * FROM badges WHERE STG_ID=\''.$params['stage_id'].'\' ORDER BY BDG_ORDER');
			}

			return $badges->result_array();
		}

		public function record_user_badge($params) {
			return $this->db->insert('user_badges', $params);
		}

		public function get_user_badges($params = null) {

			if($params === null) {
				$user_badges = $this->db->query('SELECT * FROM user_badges ORDER BY AQUIRED_AT');
			} else if(isset($params['user'])) {
				// $user_badges = $this->db->query('SELECT * FROM USER_BADGES WHERE USER_ID=\''.$params['user'].'\' ORDER BY AQUIRED_AT');
				$user_badges = $this->db->query('SELECT U.USER_ID, U.BDG_ID, B.BDG_IMG_FILENAME, B.BDG_DESCRIPTION, U.AQUIRED_AT FROM user_badges U, badges B WHERE U.BDG_ID=B.BDG_ID AND USER_ID=\''.$params['user'].'\' ORDER BY AQUIRED_AT');
				// SELECT U.USER_ID, U.BDG_ID, B.BDG_IMG_FILENAME, U.AQUIRED_AT FROM USER_BADGES U, BADGES B WHERE U.BDG_ID=B.BDG_ID
			}

			return $user_badges->result_array();
		}

		public function get_profileprogress($user){
			// if($user === null) {
			// 	$profileprogress = $this->db->query('SELECT P.PROG_ID,L.LVL_NUM, P.USER_ID, P.LVL_ID, L.STG_ID, P.GAME_SCORE FROM PROGRESS P, LEVEL L WHERE P.USER_ID=\''.$user.'\' AND P.LVL_ID=L.LVL_ID;');
			// }
			// else if(isset($user)) {
				$profileprogress = $this->db->query('SELECT P.PROG_ID,P.DATE_PLAYED,L.LVL_NUM,S.STG_DESCRIPTION, P.USER_ID, P.LVL_ID, L.STG_ID, P.GAME_SCORE FROM progress P, level L, stage S WHERE P.USER_ID=\''.$user.'\' AND P.LVL_ID=L.LVL_ID AND L.STG_ID=S.STG_ID GROUP BY P.PROG_ID ORDER BY P.DATE_PLAYED DESC;');
			// }

			return $profileprogress->result_array();
		}

		public function insert_progress($params) {
			return $this->db->insert('progress', $params);
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
		public function get_avatar_details($params)
		{
			$avatar_details = $this->db->get_where('avatar', $params);

			return $avatar_details->result_array();
		}

		public function get_level_details($params)
		{
			$map_details = $this->db->get_where('level', $params);

			return $map_details->result_array();
		}

		public function get_level_title($params)
		{
		    $level_title = $this->db->query('SELECT `stage`.`STG_DESCRIPTION`, `level`.`LVL_NUM`
FROM `stage`
    LEFT JOIN `level` ON `level`.`STG_ID` = `stage`.`STG_ID` where `level`.`LVL_ID` = \''.$params.'\';');
    return $level_title->row(0);
		}

		public function get_stage_details($params)
		{
			$stage_details = $this->db->get_where('stage', $params);

			return $stage_details->result_array();
		}

		public function get_stages($params = null)
		{
			$stages = $this->db->query('SELECT * FROM stage;');

			return $stages->result_array();
		}

		public function get_bully_list($params) {

			$bullies = $this->db->get_where('bully', $params);

			return $bullies->result_array();
		}

		public function add_goal($params) {

			return $this->db->insert('goal', $params);
		}

		public function delete_goal($params) {

			return $this->db->delete('goal', $params);
		}

		public function get_goal_list($params) {

			if($params === null) {
				$goals = $this->db->get("goal");
			} else if(isset($params['LVL_ID'])) {
				// $goals = $this->db->get("goal");
				$goals = $this->db->query('SELECT * FROM goal WHERE LVL_ID=\''.$params['LVL_ID'].'\' ORDER BY G_NUM;');
			}

			return $goals->result_array();
		}

		public function update_question_goal($qstn_info, $goal_id) {

			return $this->db->update('question', $goal_id, $qstn_info);
		}

		public function add_objective($params)
		{
			return $this->db->insert('objective', $params);
		}

		public function delete_objective($params)
		{
			return $this->db->delete('objective', $params);
		}

		public function delete_level($params)
		{

			return $this->db->delete('level', $params);
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

		public function get_lvl_max_points($params = null) {

			if($params === null) {
				$lvl_max_pts = $this->db->query('SELECT LVL_ID, SUM(OBJ_POINTS) AS MAX_PTS FROM objective GROUP BY LVL_ID;');
			} else if(isset($params['level'])) {
				$lvl_max_pts = $this->db->query('SELECT LVL_ID, SUM(OBJ_POINTS) AS MAX_PTS FROM objective WHERE LVL_ID=\''.$params['level'].'\' GROUP BY LVL_ID;');
			}

			return $lvl_max_pts->result_array();
		}

		public function insert_bully($params) {
			return $this->db->insert('bully', $params);
		}

		public function insert_question($params) {
			return $this->db->insert('question', $params);
		}

		public function get_question_list($params = null) {

			if($params === null) {
				$question_list = $this->db->get("question");
			} else if(isset($params["LVL_ID"])) {
				$question_list = $this->db->query('SELECT B.BLY_ID, Q.QSTN_NUM, Q.QSTN_DIALOG, Q.QSTN_ANSWER, Q.QSTN_TYPE, Q.G_ID FROM level L, bully B, question Q WHERE L.LVL_ID=B.LVL_ID AND B.BLY_ID=Q.BLY_ID AND L.LVL_ID=\''.$params["LVL_ID"].'\';');
			} else if(isset($params["BLY_ID"])) {
				$question_list = $this->db->query('SELECT * FROM question WHERE BLY_ID=\''.$params["BLY_ID"].'\' ORDER BY QSTN_NUM;');
			} else if(isset($params["G_ID"])) {
				$question_list = $this->db->query('SELECT * FROM question WHERE G_ID=\''.$params['G_ID'].'\';');
			}

			return $question_list->result_array();
		}

		public function insert_goal($params) {
			return $this->db->insert('goal', $params);
		}

		public function delete_question($params) {
			return $this->db->delete('question', $params);
		}

		public function delete_bully($params) {
			return $this->db->delete('bully', $params);
		}
	}
?>
