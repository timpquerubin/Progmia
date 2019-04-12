<?php
    date_default_timezone_set('Asia/Manila');
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
				// 'user_mname' => $this->input->post('mname'),
				'user_lname' => $this->input->post('lastname'),
				// 'user_bday' => $this->input->post('bday'),
				// 'user_gender' => $this->input->post('gender'),
				// 'user_address' => $this->input->post('address'),
				// 'user_email' => $this->input->post('email')
			);
			
			return $this->db->insert('user', $data);
		}
		
		public function login($uname, $pass)
		{
			$query = $this->db->query('SELECT * FROM user WHERE BINARY USER_USERNAME=\''.$uname.'\' AND BINARY USER_PASSWORD=\''.$pass.'\';');
// 			$row=mysqli_fetch_array($query,MYSQLI_NUM);
// printf ("%s (%s)\n",$row[0],$row[1]);
// 			var_dump(mysqli_fetch_array($query));
// 			var_dump($query);
//             var_dump($query->row_array());
// 			exit();
			if(empty($query->row_array()))
			{
				return FALSE;
			} 
			else
			{
				return $query->row(0);	
			}
// 			$query = $this->db->query('SELECT * FROM USER WHERE BINARY USER_USERNAME="'.$uname.'" AND BINARY USER_PASSWORD="'.$pass.'";');
// 			$query = $this->db->get('user');
//             $this->db->select("*");
//             $this->db->from("user");
//             $this->db->where('USER_USERNAME', $uname);
//             $this->db->where('USER_PASSWORD', $pass);
			
// 			$query = $this->db->get_where('user', array('user_username' => $uname));
			
// 			if(empty($query->row_array()))
// 			{
// 				return TRUE;
// 			}
// 			else 
// 			{
// 				return FALSE;	
// 			}
			
// 			if($query != false) {
// 			    return $query->row(0);
// 			 //   var_dump($query->row(0));
// 			 //   exit();
// 			} else {
// 			    return false;
// 			}
// 			if (!($query)){
// 			    echo $query;
// 			if($query->num_rows === 0)
// 			{
// 				return FALSE;
// 			} 
// 			else
// 			{
// 				return $query->row(0);	
// 			}
// 			}
		}

		public function get_avatars()
		{
			$avatars = $this->db->query('SELECT * FROM avatar;');

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
			    $user_count = $query->num_rows();
				// $rs = $this->db->query('SELECT MAX(USER_ID) AS MAXID FROM user');
				// $row = $rs->row(0)->MAXID;
				
				return ($user_count + 1);
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
