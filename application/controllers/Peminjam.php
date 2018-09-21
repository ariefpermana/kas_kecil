<?php 
	/**
	* 
	*/
	class Peminjam extends MY_Controller
	{
		
		public function index()
		{
			$data['content'] = 'page/peminjam/index';

			$this->load->view('layout', $data);
		}
		public function waitingList()
		{
			if(!$this->session->userdata('id')) redirect(base_url());

			$data['content'] = 'page/waitingList/index';
			$id = $this->session->userdata('id');

			$data['waiting'] = $this->Barang_m->getWaiting($id);

			$this->load->view('layout', $data);

		}
	}
 ?>