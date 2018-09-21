<?php 
	class Upload_m extends CI_Model
	{
		//UNTUK MENYESUAIKAN SEPARATOR DIREKTORY OS YG DIGUNAKAN
		//const DS = DIRECTORY_SEPARATOR;
		public $image_path;

		public function __construct(){
			parent::__construct();
			$this->image_path = realpath(APPPATH . '../uploads/');
			//$this->watermark_path = realpath(APPPATH . '../asset/');

		}
		public function upload_doc()
		{
			// upload Gambar
			//1.konfigurasi
			$config['upload_path'] = $this->image_path;
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size']    = '1000';//kb
			// $config['max_width'] = '2000';
			// $config['max_height'] = '1000';

			//2. inisialisasi
			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);

			//3. upload //revisi
			if($this->upload->do_upload('doc'))
			{
				$doc = $this->upload->data();
				return $doc;// return img data
			}
			else//revisi
			{
				$this->session->set_flashdata('failed', $this->upload->display_errors());

				redirect('form');
			}
		}

		public function upload_image_edit()
		{
			// upload Gambar
			//1.konfigurasi
			$config['upload_path'] = $this->image_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']    = '2000';//kb
			$config['max_width'] = '2000';
			$config['max_height'] = '1000';

			//2. inisialisasi
			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);

			//3. upload //revisi
			if($this->upload->do_upload('image'))
			{
				$image = $this->upload->data();
				return $image;// return img data
			}
			/*else//revisi
			{
				$id_product = $this->input->post('id');
				$this->session->set_flashdata('upload_error', $this->upload->display_errors());
				redirect('admin_mens/edit/'.$id_product);
			}*/

			// Reasize Gambar
			/*$config['source_image'] = $this->image_path.self::DS.$image['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 200;
			$config['height']       = 100;

			$this->image_lib->initialize($config);

			$this->image_lib->resize();*/
	}
}