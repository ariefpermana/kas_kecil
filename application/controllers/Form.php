<?php 

	/**
	* 
	*/
	class Form extends MY_Controller
	{
		
		public function index()
		{
			if(!$this->session->userdata('id')) redirect(base_url());
			
			$data['content'] = 'page/form/index';

			//untuk data jenis product dropdown
			$data['ormawa'] = $this->Ormawa_m->get_all();

			$data_barang = $this->session->userdata('id_barang');
			$privilege = $this->session->userdata('privilege');

			$data['barang'] = $this->Barang_m->get_spec_barang($data_barang);
			//$this->load->view('layout', $data);

			$jumlah = $this->input->post('jumlah');

			$this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
			$this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|numeric');
			$this->form_validation->set_rules('group', 'Group', 'required');
			$this->form_validation->set_rules('tgl_peminjaman', 'Tanggal Peminjaman', 'required');
			$this->form_validation->set_rules('tgl_pengembalian', 'Tanggal Pengembalian', 'required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				if(isset($_POST['submit']) && $this->input->post('group') == 0)
				{
					$this->session->set_flashdata('failed', 'Ormawa Belum Dipilih.');
					redirect('form');
				}else{		
					if (empty($_FILES['doc']['name']))
					{
					    $this->form_validation->set_rules('doc', 'Document', 'required');

					    redirect('form');
					}		

					//upload Gambar
					// memanggil model gallery upload_m
					$upload = $this->Upload_m->upload_doc();

					if($privilege != 0){
						foreach ($data['barang'] as $key => $value) {
							$idBarang = $value->id_barang;
							
							$jmlInput = $jumlah[$idBarang];

							$data = array(
							'id_peminjam' 			=> $this->session->userdata('id'),
							'id_barang' 			=> $idBarang,
							'group' 				=> $this->input->post('group'),
							'jumlah_barang' 		=> intval($jmlInput),
							'tgl_pengajuan' 		=> unix_to_human(time()),
							'tgl_peminjaman' 		=> $this->input->post('tgl_peminjaman'),
							'tgl_pengembalian' 		=> $this->input->post('tgl_pengembalian'),
							'upload_doc' 			=> $upload['file_name'],
							'keterangan' 			=> $this->input->post('keterangan'),//revisi
							'status' 				=> 3
							);

							$this->Peminjaman_m->updatePriority($data);

							$this->db->insert('peminjaman', $data);

							$this->Barang_m->update_barang($idBarang, intval($jmlInput));
						}
						
					}else{
						foreach ($data['barang'] as $key => $value) {
							$idBarang = $value->id_barang;
							
							$jmlInput = $jumlah[$idBarang];

							$data = array(
							'id_peminjam' 			=> $this->session->userdata('id'),
							'id_barang' 			=> $idBarang,
							'group' 				=> $this->input->post('group'),
							'jumlah_barang' 		=> intval($jmlInput),
							'tgl_pengajuan' 		=> unix_to_human(time()),
							'tgl_peminjaman' 		=> $this->input->post('tgl_peminjaman'),
							'tgl_pengembalian' 		=> $this->input->post('tgl_pengembalian'),
							'upload_doc' 			=> $upload['file_name'],
							'keterangan' 			=> $this->input->post('keterangan'),//revisi
							'status' 				=> 1
							);

							$this->db->insert('peminjaman', $data);

							$this->Barang_m->update_barang($idBarang, intval($jmlInput));
						}
					}


					$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

					redirect('barang');

				}	
			}
		}

		// public function waiting()
		// {
		// 	if(!$this->session->userdata('id')) redirect(base_url());
			
		// 	$data['content'] = 'page/form/index';

		// 	//untuk data jenis product dropdown
		// 	$data['ormawa'] = $this->Ormawa_m->get_all();

		// 	$data_barang = $this->session->userdata('id_barang');
		// 	$privilege = $this->session->userdata('privilege');

		// 	$data['barang'] = $this->Barang_m->get_spec_barang($data_barang);
		// 	//$this->load->view('layout', $data);

		// 	$jumlah = $this->input->post('jumlah');

		// 	$this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
		// 	$this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|numeric');
		// 	$this->form_validation->set_rules('group', 'Group', 'required');
		// 	$this->form_validation->set_rules('tgl_peminjaman', 'Tanggal Peminjaman', 'required');
		// 	$this->form_validation->set_rules('tgl_pengembalian', 'Tanggal Pengembalian', 'required');
		// 	$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

			
		// 	if($this->form_validation->run() == FALSE)
		// 	{
		// 		$this->load->view('layout', $data);
		// 	}else{
		// 		if(isset($_POST['submit']) && $this->input->post('group') == 0)
		// 		{
		// 			$this->session->set_flashdata('failed', 'Ormawa Belum Dipilih.');
		// 			redirect('form');
		// 		}else{		
		// 			if (empty($_FILES['doc']['name']))
		// 			{
		// 			    $this->form_validation->set_rules('doc', 'Document', 'required');

		// 			    redirect('form');
		// 			}		

		// 			//upload Gambar
		// 			// memanggil model gallery upload_m
		// 			$upload = $this->Upload_m->upload_doc();

		// 			if($privilege != 0){
		// 				foreach ($data['barang'] as $key => $value) {
		// 					$idBarang = $value->id_barang;
							
		// 					$jmlInput = $jumlah[$idBarang];

		// 					$data = array(
		// 					'id_peminjam' 			=> $this->session->userdata('id'),
		// 					'id_barang' 			=> $idBarang,
		// 					'jumlah_barang' 		=> intval($jmlInput),
		// 					'tgl_pengajuan' 		=> unix_to_human(time()),
		// 					'tgl_peminjaman' 		=> $this->input->post('tgl_peminjaman'),
		// 					'tgl_pengembalian' 		=> $this->input->post('tgl_pengembalian'),
		// 					'upload_doc' 			=> $upload['file_name'],
		// 					'keterangan' 			=> $this->input->post('keterangan'),//revisi
		// 					'status' 				=> 0
		// 					);

		// 					$this->db->insert('peminjaman', $data);

		// 					//$this->Barang_m->update_barang($idBarang, intval($jmlInput));
		// 				}
						
		// 			}else{
		// 				foreach ($data['barang'] as $key => $value) {
		// 					$idBarang = $value->id_barang;
							
		// 					$jmlInput = $jumlah[$idBarang];

		// 					$data = array(
		// 					'id_peminjam' 			=> $this->session->userdata('id'),
		// 					'id_barang' 			=> $idBarang,
		// 					'jumlah_barang' 		=> intval($jmlInput),
		// 					'tgl_pengajuan' 		=> unix_to_human(time()),
		// 					'tgl_peminjaman' 		=> $this->input->post('tgl_peminjaman'),
		// 					'tgl_pengembalian' 		=> $this->input->post('tgl_pengembalian'),
		// 					'upload_doc' 			=> $upload['file_name'],
		// 					'keterangan' 			=> $this->input->post('keterangan'),//revisi
		// 					'status' 				=> 0
		// 					);

		// 					$this->db->insert('peminjaman', $data);

		// 					//$this->Barang_m->update_barang($idBarang, intval($jmlInput));
		// 				}
		// 			}


		// 			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

		// 			redirect('barang');

		// 		}	
		// 	}
		// }
	}
 ?>