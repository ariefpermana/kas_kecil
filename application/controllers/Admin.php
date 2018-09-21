<?php 

	class Admin extends CI_Controller{

		public function index()
		{	
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/home/admin';

			$this->load->view('layout', $data);
		}
	}