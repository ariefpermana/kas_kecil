<?php 
	
	/**
	* 
	*/
	class User extends MY_Controller
	{
		
		function index()
		{
			if(!$this->session->userdata('emp_id')) redirect('login');

			$data['content'] = 'page/user/index';

			$data['user'] = $this->User_m->getAllUser();

			$submit = $this->input->post('submit');

			if($submit)
			{
				if($submit == 'Edit')
				{
					$nik = $this->input->post('nik');

					$this->session->set_userdata('nik', $nik);

					redirect('user/edit');

				}elseif($submit == 'Reset Password')
				{
					$nik = $this->input->post('nik');
					
					$getUpdatePass =  $this->User_m->getByNik($nik);

					if($getUpdatePass == TRUE){
						$resetPass = $this->User_m->reset($nik);

						if($resetPass == TRUE)
						{
							$this->session->set_flashdata('success', 'Password NIK '.$nik.' berhasil direset');
						}else{
							$this->session->set_flashdata('failed', 'Password NIK '.$nik.' gagal direset');
						}
					}else{
						$this->session->set_flashdata('failed', 'Gagal Reset Password NIK '.$nik.'. Harap Menunggu User Mengganti Passwordnya');
					}

					redirect('user');
				}
			}else{

				$this->load->view('layout', $data);
			}
		}

		public function add()
		{
			if(!$this->session->userdata('id')) redirect('login');

			$data['content'] = 'page/user/add';

			$data['department'] = $this->User_m->getDepartment();

			$this->form_validation->set_rules('notelepon', 'No. Telepon', 'required|numeric|min_length[10]|max_length[13]');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$bagian = $this->input->post('bagian');

				if($bagian == 0)
				{
					$this->session->set_flashdata('failed', 'Field Bagian Belum Dipilih');

					redirect('user/add');
				}

				$nik = 'ATU'.date('Ymd').$bagian.'0'.rand(1,99);

				if($bagian == 10)
				{
					$nik = 'ATU'.date('Ymd').$bagian.rand(1,99);

					if(strlen($nik) == 14)
					{
						$nik = 'ATU'.date('Ymd').$bagian.'0'.rand(1,9);
					}
				}else{
					if(strlen($nik) == 14)
					{
						$nik = 'ATU'.date('Ymd').$bagian.'00'.rand(1,9);
					}
				}

				$akses = $this->User_m->getAkses($bagian);

				$data = array(
						'nik' 				=> $nik,
						'password' 			=> hashpassword($nik),
						'nama_lengkap'		=> $this->input->post('name'),
						'kode_department' 	=> $bagian,
						'gsm'				=> $this->input->post('notelepon'),
						'email'			 	=> $this->input->post('email'),
						'akses'			 	=> $akses,
						'update_password'	=> 0,
					);

				$insert = $this->db->insert('karyawan', $data);

				if($insert == TRUE)
				{
					$this->session->set_flashdata('success', 'User Berhasil Ditambahkan');
				}else{
					$this->session->set_flashdata('failed', 'User Gagal Ditambahkan');
				}

				redirect('user');
			}
		}

		public function edit()
		{
			if(!$this->session->userdata('id')) redirect('login');

			$data['content'] = 'page/user/edit';

			$data['department'] = $this->User_m->getDepartment();

			$nik = $this->session->userdata('nik');

			$getUser = $this->User_m->getUserByNik($nik);

			$data['user'] = $getUser;

			$this->form_validation->set_rules('notelepon', 'No. Telepon', 'required|numeric|min_length[10]|max_length[13]');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$bagian = $this->input->post('bagian');
				
				if($bagian == 0)
				{
					$this->session->set_flashdata('failed', 'Field Bagian Belum Dipilih');

					redirect('user/edit');
				}else{
					$nama 		= $this->input->post('name');
					$notelepon 	= $this->input->post('notelepon');
					$email		= $this->input->post('email');

					$akses = $this->User_m->getAkses($bagian);

					$data = array(
						'nama_lengkap' 		=> $nama,
						'kode_department'	=> $bagian,
						'gsm'				=> $notelepon,
						'email'				=> $email,
						'akses'				=> $akses
					);

					$update = $this->User_m->updateUser($nik,$data);

					if($update == TRUE)
					{
						$this->session->set_flashdata('success', 'Data User NIK '.$nik.' berhasil di Update');

						redirect('user');
					}else{
						$this->session->set_flashdata('failed', 'Data User NIK '.$nik.' gagal di Update');

						redirect('user');
					}
				}
			}
		}

		public function ubahPassword()
		{
			if(!$this->session->userdata('id')) redirect('login');

			$data['content'] = 'page/user/ubah';

			$this->form_validation->set_rules('new', 'New Password', 'min_length[5]');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'min_length[5]|matches[new]');
			

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{
				$nik = $this->session->userdata('nik');
				$confirm = $this->input->post('confirm');

				$update = $this->User_m->reset($nik, $confirm);

				if($update == TRUE)
				{
					$this->session->set_flashdata('success', 'Password berhasil di Ubah');

					redirect('admin');
				}else{
					$this->session->set_flashdata('failed', 'Password gagal di Ubah');

					redirect('admin');
				}
			}
		}
	}


 ?>