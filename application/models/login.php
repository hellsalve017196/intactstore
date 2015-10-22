<?php
	
	class login extends CI_Model
	{
		private $id;
		
		public function login_process($username,$password)
		{
			$flag = false;
			
			$query = $this->db->query("SELECT u_id FROM users WHERE username = '".$username."' AND password = '".md5($password)."' ");
		
			if($query->num_rows() == 1)
			{
				$data = $query->row();
				
				$this->id = $data->u_id;	
					
				$flag = true;
			}
			
			return $flag;
		}
		
		public function session_creating()
		{
			return $this->id;
		}
	}
	
?>