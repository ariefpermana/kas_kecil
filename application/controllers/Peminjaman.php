<?php 

	/**
	* 
	*/
	class Peminjaman extends MY_Controller
	{
		
		public function index()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/peminjaman/index';

			$this->load->view('layout', $data);
		}

		public function status()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/peminjaman/status';

			if($this->session->userdata('kode') != NULL){
				$id = $this->session->userdata('kode');

				$data['listPeminjaman'] = $this->Peminjaman_m->getPeminjaman($id);

				if($data['listPeminjaman'] == NULL){
					$id = $this->session->userdata('id');

					$data['listPeminjaman'] = $this->Peminjaman_m->getPeminjaman($id);
				}
			}else{
			//if($data['listPeminjaman'] == NULL){
				$id = $this->session->userdata('id');

				$data['listPeminjaman'] = $this->Peminjaman_m->getPeminjaman($id);
			}

			$this->load->view('layout', $data);

			$action = $this->input->post('submit');

			if ($action == 'approve') {
				
				$id = $this->input->post('id_peminjaman');

				$this->Peminjaman_m->updatePeminjaman($id, $action);

				$this->session->set_flashdata('success', 'Data Berhasil Di Approve.');

				redirect('peminjaman/status');
			}elseif($action == 'reject'){
				$id = $this->input->post('id_peminjaman');

				$this->Peminjaman_m->updatePeminjaman($id,$action);

				$this->session->set_flashdata('failed', 'Data Berhasil Di Reject.');

				redirect('peminjaman/status');
			}
		}

		public function pengajaun()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/pengajuan/index';

			if($this->session->userdata('kode') != NULL){
				$id = $this->session->userdata('kode');

				$data['listPengajuan'] = $this->Peminjaman_m->getPengajuan($id);
			}else{
				$id = $this->session->userdata('id');

				$data['listPengajuan'] = $this->Peminjaman_m->getPengajuan($id);
			}

			$this->load->view('layout', $data);

			$action = $this->input->post('submit');

			if ($action == 'approve') {
				
				$id = $this->input->post('id_peminjaman');

				$this->Peminjaman_m->updateStatus($id, $action);

				$this->session->set_flashdata('success', 'Data Berhasil Di Approve.');

				redirect('peminjaman/pengajaun');
			}elseif($action == 'reject'){
				$id = $this->input->post('id_peminjaman');

				$this->Peminjaman_m->updateStatus($id,$action);

				$this->session->set_flashdata('failed', 'Data Berhasil Di Reject.');

				redirect('peminjaman/pengajaun');
			}
		}

		public function laporan()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/peminjaman/laporan';
			
			$data['laporan'] = $this->Peminjaman_m->getLaporan();

			$this->load->view('layout', $data);
		}
	}


 ?>