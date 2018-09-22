<?php 
	
	/**
	* 
	*/
	class User extends MY_Controller
	{
		
		function index()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/user/index';

			$data['user'] = $this->User_m->getAllUser();

			$submit = $this->input->post('submit');

			if($submit)
			{
				if($submit == 'Edit')
				{

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
	}


 ?>