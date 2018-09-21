<?php /**
* 
*/
class Barang extends MY_Controller
{
	
	public function index()
	{
		if(!$this->session->userdata('id')) redirect(base_url());
		//membuat pagination
		//1. kofigurasi
		$config['base_url'] = site_url('barang/index');
		$config['total_rows'] = $this->Barang_m->get_total_rows();
		$config['per_page'] = $per_page = 20; //limit
		$config['use_page_numbers'] = TRUE;

		//cinfigurasi style
		$config['full_tag_open'] =  '<ul class="pagination" style="float: right;">';
		$config['full_tag_close'] = '</ul>';
		//first
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//last
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		//next page
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		//previous page
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//current Page/nomor aktif
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		//nomor tidak aktif
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//2. initialisasi
		$this->pagination->initialize($config);

		//3. buat link pagination
		$data['pagination'] = $this->pagination->create_links();
		// kalau nomor halaman yang dibutuhkan tidak tampil pada url, di set 0
		$offset = $this->uri->segment(3) ? $this->uri->segment (3) : 0;

		$data['content'] = 'page/barang/index';
		$data['barang'] = $this->Barang_m->getAllBarang($per_page, $offset);

		$this->form_validation->set_rules('checklist[]', 'Checkbox', 'required');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('layout', $data);
			}
			else
			{
				$privilege = $this->session->userdata('privilege');
				//proses login
				$check = $this->input->post('checklist[]');

				if($privilege != 1 && $privilege != 3)
				{
					foreach ($check as $key => $value) {
						$getJumlah =  $this->Barang_m->get_jumlah($value);

						if($getJumlah == 0 && $this->input->post('submit') == 'submit')
						{
							$this->session->set_flashdata('failed', 'Quantity Barang Yang Dipilih Tidak Ada.');

							redirect('barang');
						}
					}
				}

				$data_sess = array(
							'id_barang'		 	=> $check,
						);

				$this->session->set_userdata($data_sess);

				if ($this->input->post('submit') == 'submit') 
				{	
					redirect('form');
				}else{
					$id = $this->session->userdata('id');
					$data_barang = $check;
					$privilege = $this->session->userdata('privilege');

					$getBarang = $this->Barang_m->get_spec_barang($data_barang);

					if($privilege == 0){
							foreach ($getBarang as $key => $value) {
								
								$idBarang = $value->id_barang;

								$data = array(
									'id_peminjam' 			=> $id,
									'id_barang' 			=> $idBarang,
									'status' 				=> 0
								);

								$this->db->insert('waiting_list', $data);
							}
						}

						$this->session->set_flashdata('success', 'Barang berhasil ditambah ke waiting list.');

						redirect('barang');
				}
			}


	}

	public function search()
	{

		if(!$this->session->userdata('id')) redirect(base_url());

		$cari = $this->input->post('cari');

		$data['barang']=$this->Search_m->search_barang($cari);

		$config['base_url'] = site_url('barang/index');
		$config['total_rows'] = $this->Barang_m->get_total_rows();
		$config['per_page'] = $per_page = 20; //limit
		$config['use_page_numbers'] = TRUE;

		//cinfigurasi style
		$config['full_tag_open'] =  '<ul class="pagination" style="float: right;">';
		$config['full_tag_close'] = '</ul>';
		//first
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//last
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		//next page
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		//previous page
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//current Page/nomor aktif
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		//nomor tidak aktif
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//2. initialisasi
		$this->pagination->initialize($config);

		//3. buat link pagination
		$data['pagination'] = $this->pagination->create_links();
		// kalau nomor halaman yang dibutuhkan tidak tampil pada url, di set 0
		$offset = $this->uri->segment(3) ? $this->uri->segment (3) : 0;

		$data['content'] = 'page/barang/index';
		
		$this->load->view('layout', $data);
	}

	public function DataBarang()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/barang/master';

		$data['barang'] = $this->Barang_m->getAllBarang();

		$this->load->view('layout', $data);

		if ($this->input->post('submit'))
		{
			$id_barang = $this->input->post('submit');

			$this->session->set_userdata('id_barang', $id_barang);

			redirect('barang/edit');
		}
	}

	public function edit()
	{
		if(!$this->session->userdata('id')) redirect(base_url());

		$data['content'] = 'page/barang/edit';
		$id_barang = $this->session->userdata('id_barang');

		$data['barang'] = $this->Barang_m->get_detail_barang($id_barang);

		$this->form_validation->set_rules('kualitas', 'Kualitas Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required|numeric');

			
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout', $data);
		}else{				

			if ($this->input->post('submit'))
			{
				$dataEmail = $this->Barang_m->getEmail($id_barang);

				$data = array(
					'id_barang' 	=> $this->input->post('submit'),
					'quality_barang' 	=> $this->input->post('kualitas'),
					'jumlah_barang' => $this->input->post('jumlah'),
					);

				$updateBarang = $this->Barang_m->update_jumlah_barang($data);

				$dataWaiting = array(
					'id_barang' 	=> $this->input->post('submit'),
					'status' 		=> 1,
					);

				$updateWaiting = $this->Barang_m->update_waiting($dataWaiting);

				if($updateWaiting == TRUE)
				{
					$sendEmail = $this->sendEmail($dataEmail);
				}

				$this->session->set_flashdata('success', 'Barang berhasil diubah.');

				redirect('barang/dataBarang');
			}
		}
	}

	public function sendEmail($email)
	{
		foreach ($email as $key => $value) {
			$emailTo = $value->email;

			$ci = get_instance();

	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "ssl://smtp.gmail.com";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "ariefpermana94@gmail.com";
	        $config['smtp_pass'] = "sekatamafia";
	        $config['charset'] = "utf-8";
	        $config['mailtype'] = "html";
	        $config['newline'] = "\r\n";
	        
	        
	        $ci->email->initialize($config);
	 
	        $ci->email->from('ariefpermana94@gmail', 'Your Name');
	        //$list = array('recipient_email@domain.com');
	        $ci->email->to($emailTo);
	        $ci->email->subject('Notifikasi Ketersediaan Barang');
	        $ci->email->message('
	        	Dear all,
	        	Untuk Barang yg anda masukkan ke waiting list sudah tersedia kembali.

	        	Terima Kasih
	        	BMAP
	        ');
	        if ($this->email->send()) {
	            echo 'Email sent.';
	        } else {
	            show_error($this->email->print_debugger());
	        }
		}
       
	}
} 
?>