<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpdf {
 
	protected $CI;
 
	public function __construct()	{
 
		include_once APPPATH.'\vendor\autoload.php';
 
        $CI = &get_instance();
		$CI->pdf = new \Mpdf\Mpdf();

 
		log_message('Debug', 'mPDF class is loaded.'); 
	}
 
}