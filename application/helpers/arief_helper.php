<?php 
	function ind_date($date)
	{
		return date('d/M/Y', strtotime($date));
	}

	function hashpassword($password = '')
		{
			//$password = '#41213FP312#';

			//HASH adalah enkripsi manual dari php
			return hash('sha512', $password . config_item('encryption_key'));
		}


	function wordlimiter($string, $limit = 1)
	{
		return str_replace('&#8230;', '', word_limiter($string, $limit));
	}

	function month_name($month)
	{
		switch ($month) 
		{
			case 1: return 'Jan'; break;
			case 2: return 'Feb'; break;
			case 3: return 'Mar'; break;
			case 4: return 'Apr'; break;
			case 5: return 'Mei'; break;
			case 6: return 'Jun'; break;
			case 7: return 'Jul'; break;
			case 8: return 'Agt'; break;
			case 9: return 'Sep'; break;
			case 10: return 'Okt'; break;
			case 11: return 'Nov'; break;
			case 12: return 'Des'; break;
		}
	}

	function rupiah($number)
	{
		return 'Rp '. number_format($number, 0, ',', '.');
	}	
 ?>