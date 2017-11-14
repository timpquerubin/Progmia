<?php
	class Profile extends CI_Controller
	{

		public function __init()
		{
			$this->load->model('Profile_model');
		}
		public function user()
		{
			$this->__init();

			$userID = $this->session->userdata('user_id');
			$user = $this->session->userdata('username');

			$progress = $this->Profile_model->get_progress($user);
			$stages = $this->Profile_model->get_stages($user);
			$levels = $this->Profile_model->get_levels($user);

			$data['levels_list'] = $levels;
			$data['stages_list'] = $stages;
			$data['progress_list'] = $progress;
			$this->load->view('templates/profile_header');
			$this->load->view('pages/profile.php', $data);
			$this->load->view('templates/profile_footer');
		}
		/*
		public function profile_list()
		{
			$this->__init();

			$userID = $this->session->userdata('user_id');
			$user = $this->session->userdata('username');
			$progress = $this->Game_model->get_progress(array('user' => $userID));
			$leaderboard = $this->Profile_model->get_leaderboard(array('user' => $userID));
			$user_profile = $this->Profile_model->get_user_profile(array('user' => $userID));

			$data['leaderboard_list'] = $leaderboard;
			$data['progress_list'] = $progress;
			$data['user_profile_list'] = $user_profile;
			$this->load->view('templates/profile_header');
			$this->load->view('game/game_list', $data);
			$this->load->view('templates/profile_footer');
		}
		*/
	}
?>