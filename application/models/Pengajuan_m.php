<?php 

	/**
	* 
	*/
	class Pengajuan_m extends CI_Model
	{
		
		public function getAllData()
		{
			return $this->db->get('pengajuan')->result();
		}


		public function getDataByNik($nik)
		{
			return $this->db->get_where('pengajuan', array('nik' => $nik))->result();
		}

		public function getDataByAkses($akses)
		{
			return $this->db->get_where('pengajuan', array('status' => $akses))->result();
		}

		public function verifyPengajuan($nopengajuan, $status, $action, $reason = null)
		{
			if($action == 'Approve')
			{
				$this->db->where('no_pengajuan', $nopengajuan);
			
				return $this->db->update('pengajuan',array('status' => $status));
			}else{
				$this->db->where('no_pengajuan', $nopengajuan);
			
				return $this->db->update('pengajuan',array('status' => $status, 'reason' => $reason));
			}
		}

		// public function getDataCetak()
		// {
		// 	return $this->db->get_where('pengajuan', array('status' => 4))->result();
		// }

		public function getDataByNB($nb)
		{
			$query = $this->db->get_where('pengajuan', array('no_pengajuan' => $nb));

			if($query->num_rows() > 0) 
			{
		    	$result = $query->result(); 
			   
			    foreach($result as $row)
			    {
			        $data = array(
			        		'nik'			=> $row->nik,
			        		'date' 			=> $row->tgl_pengajuan,
			        		'no_bukti'		=> $row->no_pengajuan,
			        		'no_akun'		=> $row->kode_kategori,
			        		'keterangan' 	=> $row->keterangan,
			        		'kredit'		=> $row->harga,
			        	);
			    }

			    return $data;
			}

		}

		public function getKategori()
		{
			return $this->db->get('kategori')->result();
		}

		public function getDataByStatus($status)
		{
			return $query = $this->db->get_where('pengajuan', array('status' => $status))->result();
		}
	}


 ?>