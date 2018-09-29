<?php 
	/**
	* 
	*/
	class Saldo extends MY_Controller
	{
		
		function index()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/saldo/index';

			$lastSaldo = $this->Saldo_m->getLastSaldo();

			$data['saldo'] = $lastSaldo;

			if($this->input->post('submit') == 'Save')
			{
				$saldo = str_replace(',', '', $this->input->post('saldo'));

				$totSaldo = (int)$lastSaldo + (int)$saldo;

				$data = array(
						'date' 			=> date('Y-m-d'),
						'keterangan' 	=> 'Penambahan Saldo '.date('d-m-Y'),
						'debet'			=> $saldo,
						'saldo'			=> $totSaldo,
					);

				$insert = $this->db->insert('saldo', $data);

				if($insert == TRUE)
				{
					$this->session->set_flashdata('success', 'Saldo Berhasil Di Tambahkan.');

					redirect('saldo');
				}else{
					$this->session->set_flashdata('failed', 'Saldo Gagal Di Tambahkan.');

					redirect('saldo');
				}
			}

			$this->load->view('layout',$data);
		}
	}

 ?>