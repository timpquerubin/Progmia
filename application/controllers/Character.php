<?php
	class Character extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Character_model');
		}

		public function create()
		{
			$this->_init();

			$avatars = $this->Character_model->get_all_avatar();

			$data['avatars'] = $avatars;

			$this->load->view('character/create', $data);
		}

		public function get_avatar_list() {

			$this->_init();

			$avatars = $this->Character_model->get_all_avatar();

			$data['avatars'] = json_encode($avatars);

			echo json_encode($avatars);
		}

		public function update()
		{
			$this->_init();
			$avatars = $this->Character_model->update_user_avatar($_POST["avatarId"],$_POST["userID"]);

		}

	}
?>