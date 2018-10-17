<?php 

	/**
	* 
	*/
	class Saldo_m extends CI_Model
	{
		
		public function getSaldo()
		{
			return $this->db->get('saldo')->result();
		}

		public function getSaldoBulanan($bulan)
		{
			return $query = $this->db->query("SELECT s.*, p.doc_upload FROM saldo as s LEFT JOIN pengajuan as p ON s.no_bukti = p.no_pengajuan where MONTH(date) = ".$bulan." ORDER BY id DESC")->result();
		}

		public function getSaldoBefore($month_before)
		{
			if($month_before == 0){

				$lastYear = date('Y') - 1;

				return $query = $this->db->query("SELECT saldo FROM saldo where MONTH(date) = 12 AND YEAR(date) =".$lastYear." ORDER BY id DESC LIMIT 1")->result();
			}else{
				return $query = $this->db->query("SELECT saldo FROM saldo where MONTH(date) = ".$month_before." ORDER BY id DESC LIMIT 1")->result();
			}
		}

		public function getLastSaldo()
		{
			$this->db->from('saldo');
			$this->db->order_by("id", "desc");
			$query = $this->db->get(); 
			return $query->row()->saldo;
		}

		public function getSaldoByDept($kode_dept = null)
		{
			if($kode_dept != null)
			{
				$query = $this->db->query("SELECT s.*, p.kode_dept FROM pengajuan as p LEFT JOIN saldo as s ON p.no_pengajuan=s.no_bukti WHERE kode_dept = ".$kode_dept." AND p.status = 3 AND s.no_bukti IS NOT NULL ORDER BY s.id DESC")->result();

				return $query;
			}else
			{
				$query = $this->db->query("SELECT s.*, p.kode_dept FROM pengajuan as p JOIN saldo as s ON p.no_pengajuan=s.no_bukti AND p.status = 3 AND s.no_bukti IS NOT NULL ORDER BY s.id DESC")->result();

				return $query;
			}
		}

		public function getLastInput()
		{
			$query = $this->db->query("SELECT DAY(date) AS Day FROM saldo WHERE no_akun = '1111' ORDER BY id DESC LIMIT 1");
			$result = $query->result_array();
			return $result;
		}

	}
 ?>