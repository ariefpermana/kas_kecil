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

			$this->form_validation->set_rules('keterangan', 'Keterangan Permintaan', 'min_length[15]|max_length[80]');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$nik 			= $this->session->userdata('nik');
				$tglPermintaan 	= $this->input->post('tglpermintaan');
				$keterangan 	= $this->input->post('keterangan');
				$harga			= str_replace(',', '', $this->input->post('jumlah'));
				$nopengajuan	= 'NB'.date('Ymd').rand(1, 999);

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
	}

 ?>