<?php
	class Character extends CI_Controller
	{
		public function create()
		{
			$this->_init();

			

			// $this->load->view('templates/header');
			$this->load->view('character/create');
			// $this->load->view('templates/footer');
		}
	}
?>