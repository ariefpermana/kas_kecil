<?php 
	
	/**
	* 
	*/
	class MY_Controller extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			//load mmodel
			$this->load->model(array());
		}

		public function kota()
		{
			$prov_id = $this->input->post('prov_id');

			$kota = $this->kota_m->get_kota_by_prov_id($prov_id);

			if($kota)
			{
				foreach ($kota as $result) 
				{
					$output .= '<option value="'.$result->id.'">';
					$output .= $result->nama_kota;
					$output .= '</option>';
				}
			}

			echo $output;
		}
	}
 ?>