<?php
	
	class login extends CI_Model
	{
		private $id;
		
		public function login_process($username,$password)
		{
			$flag = false;
			
			$query = $this->db->get_where("admins",array("a_user"=>$username,"a_password"=>$password));
		
			if($query->num_rows() == 1)
			{
				//$data = $query->row();
				
				//$this->id = $data->u_id;
					
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