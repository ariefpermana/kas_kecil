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

			$getLastinput = $this->Saldo_m->getLastinput();

			$intervalDay = intval(date('d')) - intval($getLastinput[0]['Day']);

			if($intervalDay < 11)
			{
				$data['intervalDay'] = 'disabled';
			}else{
				$data['intervalDay'] = '';
			}

			if($this->input->post('submit') == 'Save')
			{
				$saldo = str_replace(',', '', $this->input->post('saldo'));

				$totSaldo = (int)$lastSaldo + (int)$saldo;

				$data = array(
						'date' 			=> date('Y-m-d'),
						'no_akun' 		=> '1111',
						'keterangan' 	=> 'Tambahan Kas Kecil '.date('d M Y'),
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