<?php 

	/**
	* 
	*/
	class Login extends MY_Controller
	{
		public function index()
		{
			if($this->session->userdata('id_peminjam')) redirect('admin');

			$data['content'] = 'page/login/index';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('layout', $data);
			}
			else
			{
				//proses login
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				// dapatkan data berdasarkan email dan password
				$peminjam = $this->User_m->check_account_peminjam($username, $password);
				$bmap	  = $this->User_m->check_account_bmap($username, $password);

				//mengecek apakah email dan pass ada
				if($peminjam)
				{	
					//buat session
					$data_sess = array(
							'id' 		=> $peminjam->id_peminjam,
							'nama' 		=> $peminjam->nama_peminjam,
							'username'	=> $peminjam->username_peminjam,
							'contact' 	=> $peminjam->no_contact,
							'email' 	=> $peminjam->email,
							'privilege' => $peminjam->privilege,
							'is_login'	=> TRUE
						);

					$this->session->set_userdata($data_sess);

					redirect('admin');
				}elseif($bmap)
				{
					//buat session
					$data_sess = array(
							'id'		 	=> $bmap->id_admin,
							'username' 		=> $bmap->user_nama,
							'nama' 			=> $bmap->nama,
							'kode' 			=> $bmap->kode_admin,
							'privilege' 	=> $bmap->privilege,
							'is_login' 		=> TRUE
						);

					$this->session->set_userdata($data_sess);

					redirect('admin');
				}
				else
				{	
					//Buat Pesan gagal Login
					$this->session->set_flashdata('failed', 'Username or Password invalid, please fill correctly.');

					redirect(base_url());

				}
			}
		}

		public function logout()
		{
			
			$this->session->sess_destroy();

			redirect(base_url());
		}
	}