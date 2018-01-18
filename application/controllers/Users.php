<?php
	class Users extends CI_Controller
	{
		public function register()
		{
			$this->load->model('User_model');

			$errors = array();
			$data = array();

			if(empty($_POST["firstname"]))
			{
				$errors["firstname"] = "Firstname is required";
			}

			if(empty($_POST["lastname"]))
			{
				$errors["lastname"] = "Lastname is required";
			}

			if(empty($_POST["gender"]))
			{
				$errors["gender"] = "Gender is required";
			}

			if(empty($_POST["gender"]))
			{
				$errors["gender"] = "Gender is required";
			}

			if(empty($_POST["address"]))
			{
				$errors["address"] = "Address is required";
			}

			if(empty($_POST["username"]))
			{
				$errors["username"] = "Username is required";
			} else if(!$this->check_username_exists($_POST["username"]))
			{
				$errors["username"] = "Username already exists";
			}

			if(empty($_POST["password"]))
			{
				$errors["password"] = "Password is required";
			}

			if($_POST['password'] != $_POST['confirm_password'])
			{
				$errors["confirm_password"] = "Password and Confirm Password does not match";
			}

			if(empty($_POST["email"]))
			{
				$errors["email"] = "Email is required";
			} else if(!$this->check_email_exists($_POST["email"]))
			{
				$errors["email"] = "Email already exists";
			}

			if(!empty($errors))
			{
				$data["success"] = false;
				$data["errors"] = $errors;
			} else {

				$this->User_model->register($this->User_model->gen_id());
				$data["success"] = true;
				$data["message"] = 'Success!';
				$this->session->set_flashdata('user_registered', 'You are now registered and can now log in');
			}

			echo json_encode($data);
			
			// $data['title'] = 'Sign Up';
			
			// $this->form_validation->set_rules('fname', 'Firstname', 'required');
			// $this->form_validation->set_rules('lname', 'Lastname', 'required');
			// $this->form_validation->set_rules('bday', 'Birthday', 'required');
			// $this->form_validation->set_rules('gender', 'Gender', 'required');
			// $this->form_validation->set_rules('address', 'Address', 'required');
			// $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			// $this->form_validation->set_rules('password', 'Password', 'required');
			// $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
			// $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			
			// if($this->form_validation->run() === FALSE)
			// {
			// 	$this->load->view('templates/header');
			// 	$this->load->view('users/register',$data);
			// 	$this->load->view('templates/footer');
			// }
			// else 
			// {
			// 	$this->User_model->register($this->User_model->gen_id());
			// 	$this->session->set_flashdata('user_registered', 'You are now registered and can now log in');
			// 	redirect('home');
			// }

			// session_start();

			// if(isset($_POST))
			// {
			// 	if(empty($_POST['firstname']))
			// 	{
			// 		$_SESSION['errors']['firstname'] = 'Firstname is required';
			// 	}

			// 	if(empty($_POST['lastname']))
			// 	{
			// 		$_SESSION['errors']['lastname'] = 'Lastname is required';
			// 	}

			// 	if(empty($_POST['address']))
			// 	{
			// 		$_SESSION['errors']['address'] = 'Address is required';
			// 	}

			// 	if(empty($_POST['username']))
			// 	{
			// 		$_SESSION['errors']['username'] = 'Username is required';
			// 	}

			// 	if(empty($_POST['password']))
			// 	{
			// 		$_SESSION['errors']['password'] = 'Password is required';
			// 	} 
			// 	else if ($_POST['confirm_password'] != $_POST['password'])
			// 	{
			// 		$_SESSION['errors']['confirm_password'] = 'Confirm Password is required';
			// 	}

			// 	if(empty($_POST['email']))
			// 	{
			// 		$_SESSION['errors']['email'] = 'Email is required';
			// 	}

			// 	if(count($_SESSION['errors']) > 0)
			// 	{
			// 		if(!empty($_SERVER['HTTP_X_REQUEST_WITH']) && strtolower($_SERVER['HTTP_X_REQUEST_WITH']) === 'xmlhttprequest')
			// 		{
			// 			echo json_encode($_SESSION['errors']);
			// 			exit();
			// 		}

			// 		echo "<ul>";
			// 			foreach($_SESSION['errors'] as $key => $val)
			// 			{
			// 				echo "<li>" . $val . "</li>";
			// 			}
			// 		echo "</ul>"
			// 		exit();
			// 	}
			// } else {
				// $this->session->set_flashdata('user_registered', 'You are now registered and can now log in');
				// redirect('home');
			// }
		}

		public function login()
		{
			$this->load->model('User_model');
			
			$data['title'] = 'Sign in';

			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			
			$user_info = $this->User_model->login($user,$pass);
			if(count($user_info) > 0)
			{

				$user_data = array(
					'user_id' => $user_info->USER_ID,
					'username' => $this->input->post('username'),
					'logged_in' => TRUE,
					'has_avatar' => isset($user_info->AVTR_ID)
				);
				$data["user_info"] = $user_info;
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				redirect('home');
			}
			else 
			{
				$this->session->set_flashdata('user_loggedfailed', 'Invalid Username or Password'.$user_info->USER_ID);
				redirect('home');
			}
		}
		/* TESTING
		public function account()
		{
			$this->load->model('User_model');
			
			$id = $this->User_model->account($user);
			
			$user_data = array(
				'PROG_ID' => $id,
				'USER_ID' => 1
			);
			
			$this->session->set_userdata($user_data);
			redirect('home');
		}
		*/
		public function logout()
		{
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('has_avatar');
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('home');
		}

		public function check_username_exists($username)
		{
			$this->load->model('User_model');
			
			// $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one.');
			
			if($this->User_model->check_username_exists($username))
			{
				return TRUE;
			}
			else 
			{
				return FALSE;
			}
		}
	
		public function check_email_exists($email)
		{
			$this->load->model('User_model');
			
			// $this->form_validation->set_message('check_email_exists', 'Email has aleady been used by another user. Please use different one.');
			
			if($this->User_model->check_email_exists($email))
			{
				return TRUE;
			}
			else 
			{
				return FALSE;
			}
		}
	}