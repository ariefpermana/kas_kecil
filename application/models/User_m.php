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

			$this->db->set('last_login', date('Y-m-d'));
			$this->db->where('nik', $nik);
			$this->db->update('karyawan');

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

		public function getAllUser()
		{
			$query = $this->db->query('SELECT k.*, d.dept FROM karyawan as k LEFT JOIN department as d ON k.kode_department = d.kode_department');
		
			return $query->result();
		}

		public function getUserByNik($nik)
		{
			$query = $this->db->get_where('karyawan', array('nik' => $nik));
		
			return $query->row();
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

		public function reset($nik)
		{
			$this->db->set(array(
					'password' => hashpassword($nik),
					'update_password' => 0
					));
			$this->db->where('nik', $nik);
			
			return $this->db->update('karyawan');
		}

		public function getByNik($nik)
		{
			$query = $this->db->get_where('karyawan', array('nik' => $nik));

			$data = $query->row();
			
			if($data->update_password == '0')
			{
				return FALSE;
			}else
			{
				return TRUE;
			}
		}

		public function getDepartment()
		{
			return $this->db->get('department')->result();
		}

		public function updateUser($nik, $data)
		{
		
			$this->db->where('nik', $nik);
			
			return $this->db->update('karyawan',$data);
		}
	}
 ?>