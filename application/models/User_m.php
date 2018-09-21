<?php 

	Class User_m extends CI_Model {

		public function check_account_peminjam($username = '', $password = '')
		{
			$db = $this->db->get_where('peminjam', 
				array(
					'username_peminjam' 	=> $username, 
					'password_peminjam' 	=> hashpassword($password)
					)
				)->row();
			
			return $db;
		}

		public function check_account_bmap($username = '', $password = '')
		{
			$db = $this->db->get_where('admin', 
				array(
					'user_nama' 	=> $username, 
					'password' 	=> hashpassword($password)
					)
				)->row();
			
			return $db;
		}

		public function user_exists($key)
		{
			 $query = $this->db->get_where('peminjam', array('username_peminjam' => $key)); 

                if ($query->num_rows() > 0 )
                {
                        return FALSE;
                }
                else
                {
			 		$query = $this->db->get_where('admin', array('user_nama' => $key));

			 		if ($query->num_rows() > 0 )
	                {
	                    return FALSE;
	                }else{
	                	return TRUE;
	                }
                }
		}

		public function get_member_by_id($member_id)
		{	
			return $this->db->get_where('member', array('id' => $member_id))->row();
		} 

	}
 ?>