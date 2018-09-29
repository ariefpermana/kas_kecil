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

			$this->form_validation->set_rules('nik', 'NIK', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('layout', $data);
			}
			else
			{
				//proses login
				$nik = $this->input->post('nik');
				$password = $this->input->post('password');

				// dapatkan data berdasarkan email dan password
				$dataUser 		= $this->User_m->check_account($nik, $password);

				if($dataUser)
				{
					if ($dataUser->emp_id) 
					{
					
						$emp_id = $dataUser->emp_id;

						//buat session
						$data_sess = array(
								'id' 		=> $dataUser->id,
								'emp_id'	=> $emp_id,
								'is_login'	=> TRUE
							);
						
						$this->session->set_userdata($data_sess);

						redirect('admin');
					}else
					{
						//buat session
						$data_sess = array(
								'id'		 	=> $dataUser->id,
								'nik' 			=> $dataUser->nik,
								'nama' 			=> $dataUser->nama_lengkap,
								'kode' 			=> $dataUser->kode_department,
								'phone'		 	=> $dataUser->gsm,
								'email'		 	=> $dataUser->email,
								'akses'		 	=> $dataUser->akses,
								'is_login' 		=> TRUE
							);

						$this->session->set_userdata($data_sess);

						redirect('admin');
					}
				}
				else
				{	
					//Buat Pesan gagal Login
					$this->session->set_flashdata('failed', 'NIK or Password invalid, please fill correctly.');

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