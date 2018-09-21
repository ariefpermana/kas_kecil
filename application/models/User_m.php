<?php 

	Class User_m extends CI_Model {

		public function check_account($nik = '', $password = '')
		{
			//dump(hashpassword($password));die;
			
			$db = $this->db->get_where('karyawan', 
				array(
					'nik' 	=> $nik, 
					'password' 	=> hashpassword($password)
					)
				)->row();

			if(empty($db))
			{
				$db = $this->db->get_where('admin', 
				array(
					'emp_id' 	=> $nik, 
					'password' 	=> hashpassword($password)
					)
				)->row();
			}
			
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
	}
 ?>