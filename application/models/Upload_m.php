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

		public function upload_image()
		{
			// upload Gambar
			//1.konfigurasi
			$config['upload_path'] = $this->image_path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']    = '2000';//kb
			// $config['max_width'] = '2000';
			// $config['max_height'] = '1000';

			//2. inisialisasi
			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);

			//3. upload //revisi
			if($this->upload->do_upload('bukti'))
			{
				$image = $this->upload->data();
				return $image;// return img data
			}else//revisi
			{
				$this->session->set_flashdata('image', $this->upload->display_errors('<p class="alert alert-danger">', '</p>'));

				redirect('pengajuan');
			}
		}
	}