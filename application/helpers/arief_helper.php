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
			case 1: return 'Januari'; break;
			case 2: return 'Februari'; break;
			case 3: return 'Maret'; break;
			case 4: return 'April'; break;
			case 5: return 'Mei'; break;
			case 6: return 'Juni'; break;
			case 7: return 'Juli'; break;
			case 8: return 'Agtustus'; break;
			case 9: return 'September'; break;
			case 10: return 'Oktober'; break;
			case 11: return 'November'; break;
			case 12: return 'Desember'; break;
		}
	}

	function rupiah($number)
	{
		return 'Rp '. number_format($number, 0, '.', ',');
	}	
 ?>