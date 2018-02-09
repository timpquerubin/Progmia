<?php
	class Pages extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Game_model');
			$this->load->model('User_model');
			$this->load->model('Avatar_model');
			$this->load->model('Profile_model');
		}
		public function view($page = 'home')
		{
			$this->_init();

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
			}
			
			$this->isLoggedIn();

			$data['title'] = ucfirst($page);
			
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page.'.php', $data);
			$this->load->view('templates/footer');
		}

		public function isLoggedIn()
		{
			if($this->User_model->is_logged_in())
			{
				redirect('Game/Stages');
			}

		}
	}
