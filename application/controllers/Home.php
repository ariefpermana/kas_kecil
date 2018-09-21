<?php 

/**
* 
*/
class Home extends My_Controller
{
	

	public function index()
	{
		$data['content'] = 'page/home/index';
		
		$this->load->view('layout', $data);

		if($this->input->post())
		{
			redirect('login');
		}
	}
}

 ?>