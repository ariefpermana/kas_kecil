<?php 
	
	/**
	* 
	*/
	class Verifikasi extends MY_Controller
	{
		
		function index()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/verifikasi/index';

			$akses = $this->session->userdata('akses');

			$data['pengajuan']	= $this->Pengajuan_m->getDataByAkses($akses);

			$nopengajuan = $this->input->post('no_pengajuan');
			$action = $this->input->post('submit');

			if($action == 'Approve')
			{
				if($akses == 1)
				{
					$status = 2;

					$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action);

					if($update == TRUE)
					{
						$this->session->set_flashdata('success', 'Pengajuan Berhasil di Approve');

						redirect('verifikasi');
					}else{
						$this->session->set_flashdata('success', 'Pengajuan Gagal di Approve');

						redirect('verifikasi');
					}
				}elseif($akses == 2)
				{
					$status = 3;

					$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action);

					if($update == TRUE)
					{
						$this->session->set_flashdata('success', 'Pengajuan Berhasil di Approve');

						redirect('verifikasi');
					}else{
						$this->session->set_flashdata('success', 'Pengajuan Gagal di Approve');

						redirect('verifikasi');
					}
				}elseif($akses == 3)
				{	
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

						redirect('verifikasi');
					}

					$status = 4;

					$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action);

					if($update == TRUE)
					{	

						$saldo['saldo'] = (int)$lastSaldo - (int)$harga;

						$dataInsert = array_merge($getDataPengajuan, $saldo);

						unset($dataInsert['nik']);

						$insertSaldo = $this->db->insert('saldo', $dataInsert);

						$this->session->set_flashdata('success', 'Pengajuan Berhasil di Approve');

						redirect('verifikasi');
					}else{
						$this->session->set_flashdata('success', 'Pengajuan Gagal di Approve');

						redirect('verifikasi');
					}
				}
			}elseif($action == 'Reject'){

				$this->form_validation->set_rules('reason','Reason', 'required');

				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('layout', $data);
				}else{

					$reason = $this->input->post('reason');

					if($akses == 1)
					{
						$status = 5;

						$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action, $reason);

						if($update == TRUE)
						{
							$this->session->set_flashdata('success', 'Pengajuan Berhasil di Reject');

							redirect('verifikasi');
						}else{
							$this->session->set_flashdata('success', 'Pengajuan Gagal di Reject');

							redirect('verifikasi');
						}
					}elseif($akses == 2)
					{
						$status = 6;

						$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action, $reason);

						if($update == TRUE)
						{
							$this->session->set_flashdata('success', 'Pengajuan Berhasil di Reject');

							redirect('verifikasi');
						}else{
							$this->session->set_flashdata('success', 'Pengajuan Gagal di Reject');

							redirect('verifikasi');
						}
					}elseif($akses == 3)
					{
						$status = 7;

						$update = $this->Pengajuan_m->verifyPengajuan($nopengajuan, $status, $action, $reason);

						if($update == TRUE)
						{
							$this->session->set_flashdata('success', 'Pengajuan Berhasil di Reject');

							redirect('verifikasi');
						}else{
							$this->session->set_flashdata('success', 'Pengajuan Gagal di Reject');

							redirect('verifikasi');
						}
					}
				}
			}else{

				$this->load->view('layout', $data);

			}
		}

		public function bukti_dana_keluar()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content'] = 'page/verifikasi/cashout';

			$data['cetak'] = $this->Pengajuan_m->getDataCetak();

			if($this->input->post('submit') == 'print')
			{
				$nopengajuan = $this->input->post('no_pengajuan');

				$datapengajuan  = $this->Pengajuan_m->getDataByNB($nopengajuan);

				$dataUser = $this->User_m->getUserByNik($datapengajuan['nik']);

				if(empty($dataUser))
				{
					$this->session->set_flashdata('failed', 'Pengajuan Sudah Kadaluwarsa dan NIK '.$datapengajuan['nik'].'  sudah tidak terdaftar');

					redirect('verifikasi/bukti_dana_keluar');
				}

				$dataUser = (array) $dataUser;

				$data['merge']	= array_merge($dataUser, $datapengajuan);

				$this->verifikasipdf($data['merge']);
			}

			$this->load->view('layout', $data);
			
		}

		public function verifikasipdf($data)
		{
			$data['cetak'] = $data;

			$mpdf = new \Mpdf\Mpdf(['format' => 'A5-L']);
	        // Buat HTML atau load dari view
	        $html = $this->load->view('page/verifikasi/pdfcashout', $data, true);
	        //dump($html);die;
	        // Lakukan pengerjaan PDF
			$mpdf->WriteHTML('<table width="50%" style="left-align: bottom; font-family: serif; 
		    font-size: 9pt; color: #000000;">
		    <tr>
		        <td width="33%"><img style="width:120px;" src="'. base_url().'img/logo_header.png"></td>
		        <td width="100%" align="left"> <p style="font-size:13pt; font-weight:bold;">PT. AZZAHRA TRANS UTAMA</p><br>
		                    <p>GRAHA AZKA : Jl. Mayjen HE. Sukma</p>
		                    <p>(Raya Sukabumi) Km. 1 No. 45</p>
		                    <p>Kota Bogor Indonesia 16138</p></td>
		    </tr>
			</table>');
			//dump($html);die;
	        $mpdf->WriteHTML($html);
	        $mpdf->Output("tandaterima".$data['nik'], 'I');
		}
	}

 ?>