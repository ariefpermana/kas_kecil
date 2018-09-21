<?php
	/**
	* 
	*/
	class Signup extends MY_Controller
	{
		
		public function index()
		{
			$data['content'] = 'page/signup/index';

			//$this->load->view('layout', $data);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_checkUserExist');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('nocontact', 'Contact', 'required|min_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('konfirmasi_pass', 'Password Confirm', 'required|min_length[5]|matches[password]');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layout', $data);
			}else{

				$data = array(
						'nama_peminjam' 		=> $this->input->post('name'), 
						'username_peminjam' 	=> $this->input->post('username'),
						'password_peminjam' 	=> hashpassword($this->input->post('password')),
						'no_contact' 			=> $this->input->post('nocontact'),
						'email' 				=> $this->input->post('email'),

				);

				$insert = $this->db->insert('peminjam', $data);
				
				if($insert == FALSE)
				{
					$this->session->set_flashdata('failed', 'Akun anda Salah, Silahkan Coba Lagi.');

				}else{
					$this->session->set_flashdata('success', 'Akun berhasil di simpan.');
				}

				redirect('signup/index');

			}
		}

		//Check username agar tidak dobel
		public function checkUserExist($key)
		{
    		$checking = $this->User_m->user_exists($key);

    		if($checking == FALSE)
    		{
    			$this->form_validation->set_message('checkUserExist', 'Username already exist!');
    			return FALSE;
    		}
		}
	}
?>