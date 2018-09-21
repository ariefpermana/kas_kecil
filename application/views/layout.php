<?php 

//$this->load->view('component/menu_nav');
if($content == 'page/login/index' || $content == 'page/signup/index'){
	$this->load->view('component/header');
	$this->load->view($content);
	$this->load->view('component/footer');
}else if($content == 'page/home/index'){
	$this->load->view('component/header_home');
	$this->load->view($content);
	$this->load->view('component/footer_home');
}else{
	$this->load->view('component/header_admin');
	$this->load->view($content);
	$this->load->view('component/footer_admin');
}

 ?>