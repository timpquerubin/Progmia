<?php
	class Avatar extends CI_Controller
	{
		public function _init()
		{
			$this->load->model('Avatar_model');
		}

		public function add_avatar()
		{
			$this->_init();

			$avatars = $this->Avatar_model->get_all_avatar();

			$data['avatars'] = $avatars;

			$this->load->view('avatar/add', $data);
		}

		public function get_avatar_list() {

			$this->_init();

			$avatars = $this->Avatar_model->get_all_avatar();

			$data['avatars'] = json_encode($avatars);

			echo json_encode($avatars);
		}

		public function update()
		{
			$this->_init();
			$avatars = $this->Avatar_model->update_user_avatar($_POST["avatarId"],$_POST["userID"]);

			echo json_encode($avatars);

		}

	}
?>