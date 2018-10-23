<?php 

	/**
	* 
	*/
	class Pengajuan extends MY_Controller
	{
		
		function index()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/pengajuan/index';

			$data['kategori'] = $this->Pengajuan_m->getKategori();

			$this->form_validation->set_rules('keterangan', 'Keterangan Permintaan', 'min_length[15]|max_length[80]');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$nik 			= $this->session->userdata('nik');
				$tglPermintaan 	= /*$this->input->post('tglpermintaan')*/ date('Y-m-d');
				$kategori	 	= $this->input->post('kategori');
				$keterangan 	= $this->input->post('keterangan');
				$harga			= str_replace(',', '', $this->input->post('jumlah'));
				$nopengajuan	= 'NB'.date('Ymd').rand(1, 999);

				if($kategori == 0)
				{
					$this->session->set_flashdata('failed', 'Kategori Belum Dipilih.');
					
					redirect('pengajuan');
				}

				if(strlen($nopengajuan) == 12)
				{
					$nopengajuan	= 'NB'.date('Ymd').'0'.rand(1, 99);	
				}elseif (strlen($nopengajuan) == 11) {
					$nopengajuan	= 'NB'.date('Ymd').'00'.rand(1, 9);	
				}

				$upload = $this->Upload_m->upload_image();

				$data = array(
						'nik'				=> $nik,
						'tgl_pengajuan'		=> $tglPermintaan,
						'no_pengajuan'		=> $nopengajuan,
						'kode_kategori'		=> $kategori,
						'keterangan'		=> $keterangan,
						'harga'				=> $harga,
						'doc_upload'		=> $upload['file_name'],
						'status'			=> 1,
						'kode_dept'			=> $this->session->userdata('kode'),

					);

				$insert = $this->db->insert('pengajuan', $data);

				if($insert == TRUE)
				{
					$this->session->set_flashdata('success', 'Pengajuan berhasil diinput dengan Nomor Bukti '.$nopengajuan);

					redirect('pengajuan');
				}else{
					$this->session->set_flashdata('failed', 'Pengajuan gagal diinput harap coba lagi');

					redirect('pengajuan');
				}
			}
		}

		public function proses_pengajuan()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/pengajuan/proses';

			$nik = $this->session->userdata('nik');

			$data['pengajuan']	= $this->Pengajuan_m->getDataByNik($nik);

			$this->load->view('layout', $data);
		}

		public function pending()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/pengajuan/pending';

			$status = '8';//status pending

			$data['pengajuan']	= $this->Pengajuan_m->getDataByStatus($status);

			$nopengajuan = $this->input->post('no_pengajuan');

			$action = $this->input->post('submit');

			if($action == 'Approve'){
				foreach ($data['pengajuan'] as $key => $value) {
					$harga = (int)$value->harga;
				}

				$getDataPengajuan	= $this->Pengajuan_m->getDataByNB($nopengajuan);

				$cekUser = $this->User_m->getUserByNik($getDataPengajuan['nik']);

				if($cekUser == NULL)
				{
					$this->session->set_flashdata('failed', 'Maaf Pengajuan dengan Nomor Bukti '.$nopengajuan.' Tidak Valid dan NIK '.$getDataPengajuan['nik'].' Tidak Terdaftar!');

					redirect('verifikasi');
				}

				$lastSaldo = $this->Saldo_m->getLastSaldo();

				if((int)$harga > (int)$lastSaldo)
				{
					$this->session->set_flashdata('failed', 'Maaf Saldo Tidak Cukup Untuk Melakukan Approval Pengajuan. Saldo : '.rupiah($lastSaldo));

					redirect('pengajuan/pending');
				}

				$status = 3;

				$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action);

				if($update == TRUE)
				{	

					$saldo['saldo'] = (int)$lastSaldo - (int)$harga;

					$dataInsert = array_merge($getDataPengajuan, $saldo);

					unset($dataInsert['nik']);

					$insertSaldo = $this->db->insert('saldo', $dataInsert);

					$this->session->set_flashdata('success', 'Pengajuan Berhasil di Approve');

					redirect('pengajuan/pending');
				}
			}

			$this->load->view('layout', $data);
		}
	}

 ?>