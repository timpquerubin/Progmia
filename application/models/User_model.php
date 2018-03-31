<?php
	class User_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function register($id)
		{
			$data = array(
				'user_id' => $id,
				'user_username' => $this->input->post('username'),
				'user_password' => md5($this->input->post('password')),
				'user_fname' => $this->input->post('firstname'),
				'user_mname' => $this->input->post('mname'),
				'user_lname' => $this->input->post('lastname'),
				'user_bday' => $this->input->post('bday'),
				'user_gender' => $this->input->post('gender'),
				'user_address' => $this->input->post('address'),
				'user_email' => $this->input->post('email')
			);
			
			return $this->db->insert('user', $data);
		}
		
		public function login($uname, $pass)
		{
			$query = $this->db->query('SELECT * FROM USER WHERE BINARY USER_USERNAME=\''.$uname.'\' AND BINARY USER_PASSWORD=\''.$pass.'\';');
			
			if(empty($query->row_array()))
			{
				return FALSE;
			} 
			else
			{
				return $query->row(0);	
			}
		}

		public function get_avatars()
		{
			$avatars = $this->db->query('SELECT * FROM AVATAR;');

			return $avatars->result_array();
		}
		/* TESTING
		public function account($USER_ID = 1)
		{
			$query = $this->db->query('SELECT PROG_ID FROM PROGRESS WHERE USER_ID=\''.$USER_ID.'\';');
			
			if(empty($query->row_array()))
			{
				return FALSE;
			} 
			else
			{
				return $query->row(0)->PROG_ID;
			}
		}
		*/
		public function gen_id()
		{
			$query = $this->db->get('user');
			
			if($query->num_rows() == 0)
			{
				return 1;
			}
			else 
			{
				$rs = $this->db->query('SELECT MAX(USER_ID) AS MAXID FROM USER');
				$row = $rs->row(0)->MAXID;
				
				return ($row[0] + 1);
			}
		}
		
		public function check_username_exists($username)
		{
			$query = $this->db->get_where('user', array('user_username' => $username));
			
			if(empty($query->row_array()))
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
			$query = $this->db->get_where('user', array('user_email' => $email));
			
			if(empty($query->row_array()))
			{
				return TRUE;
			}
			else 
			{
				return FALSE;	
			}
		}

		public function is_logged_in()
		{
			if($this->session->userdata('logged_in')) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
