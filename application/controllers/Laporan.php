<?php 
	
	/**
	* 
	*/
	class Laporan extends MY_Controller
	{
		public function perbagian()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content']	= 'page/laporan/perbagian';

			$data['bagian'] 	= $this->User_m->getDepartment();

			if($this->input->post('submit') == 'Submit')
			{
				$kode_dept = $this->input->post('bagian');

				$data['kode_dept'] = $kode_dept;

				$data['saldo'] = $this->Saldo_m->getSaldoByDept($kode_dept);
			}else{
				$data['saldo'] = $this->Saldo_m->getSaldoByDept();
			}
			
			$total = 0;

			foreach ($data['saldo'] as $key => $value) {
				if(($value->kredit) != '0')
				{
					$total += $value->kredit;
				}

				$getKode = $this->User_m->getDepartmentByKode($value->kode_dept);

				$dataDept[$value->kode_dept] = $getKode[0];
			}
				
			if(isset($dataDept))
			{
				$data['dept'] = $dataDept;
			}

			$data['total'] = $total;

			if($this->input->post('submit') == 'print'){

				if($this->input->post('bagian') != NULL)
				{
					$this->printpdfperbagian($this->input->post('bagian'));
				}else{
					$this->printpdfperbagian();
				}
			}

			$this->load->view('layout', $data);
		}

		public function bulanan()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content']	= 'page/laporan/bulanan';

			if($this->input->post('submit') == 'Submit')
			{
				$month = $this->input->post('month');

				$data['month'] = $month;

				$data['saldo'] = $this->Saldo_m->getSaldoBulanan($month);
					
				$monthBefore = $month - 1;

				$saldoBefore = $this->Saldo_m->getSaldoBefore($monthBefore);

				if(!empty($saldoBefore)){
					if($monthBefore == 0)
					{
						$keterangan = 'Saldo Tahun '.date('Y')-1;

					}else{
						$keterangan = 'Saldo Bulan '.month_name($monthBefore);
					}

					$LastSaldo 				= new stdClass();
					$LastSaldo->debet 		= $saldoBefore[0]->saldo;
					$LastSaldo->saldo 		= $saldoBefore[0]->saldo;
					$LastSaldo->keterangan 	= $keterangan;

					$dataSaldo[] = $LastSaldo;

					$data['saldo'] = array_merge($data['saldo'],$dataSaldo);
				}
			}else
			{
				$data['saldo'] = $this->Saldo_m->getSaldoBulanan(date('m'));

				$monthBefore = date('m') - 1;

				$saldoBefore = $this->Saldo_m->getSaldoBefore($monthBefore);

				if(!empty($saldoBefore)){
					if($monthBefore == 0)
					{
						$keterangan = 'Saldo Tahun '.date('Y')-1;

					}else{
						$keterangan = 'Saldo Bulan '.month_name($monthBefore);
					}

					$LastSaldo 				= new stdClass();
					$LastSaldo->debet 		= $saldoBefore[0]->saldo;
					$LastSaldo->saldo 		= $saldoBefore[0]->saldo;
					$LastSaldo->keterangan 	= $keterangan;

					$dataSaldo[] = $LastSaldo;
					
					$data['saldo'] = array_merge($data['saldo'],$dataSaldo);
				}
			}

			$data['saldo'] = array_reverse($data['saldo']);

			foreach ($data['saldo'] as $key => $value) {
				if(($value->debet) != '0')
				{	
					if(empty($debet))
					{
						$debet = $value->debet;
					}else{
						$debet += $value->debet;
					}
				}elseif(($value->kredit) != '0')
				{
					if(empty($kredit))
					{
						$kredit = $value->kredit;
					}else{
						$kredit += $value->kredit;
					}
				}
			}
			
			if(isset($debet)){
				$data['totdebet'] = $debet;	
			}
			if(isset($kredit)){
				$data['totkredit'] = $kredit;	
			}
			if(isset($kredit) && isset($debet)){		
				$data['totsaldo'] = $debet-$kredit;
			}	

			if($this->input->post('submit') == 'print'){
				$this->printpdfbulanan($this->input->post('month'));
			}

			$this->load->view('layout', $data);
		}

		public function jurnal()
		{
			if(!$this->session->userdata('nik')) redirect('login');

			$data['content']	= 'page/laporan/jurnal';

			$data['saldo'] = $this->Saldo_m->getSaldo();

			foreach ($data['saldo'] as $key => $value) {
				if(($value->debet) != '0')
				{	
					if(empty($debet))
					{
						$debet = $value->debet;
					}else{
						$debet += $value->debet;
					}
				}elseif(($value->kredit) != '0')
				{
					if(empty($kredit))
					{
						$kredit = $value->kredit;
					}else{
						$kredit += $value->kredit;
					}
				}
			}
			
			if(isset($debet)){
				$data['totdebet'] = $debet;	
			}
			if(isset($kredit)){
				$data['totkredit'] = $kredit;	
			}
			if(isset($kredit) && isset($debet)){		
				$data['totsaldo'] = $debet-$kredit;
			}	

			if($this->input->post('submit') == 'print'){
				$this->printpdfjurnal();
			}

			$this->load->view('layout', $data);
		}

		public function printpdfperbagian($kode_dept)
		{
			$data['content']	= 'page/laporan/perbagian';

			$data['bagian'] 	= $this->User_m->getDepartment();

			if($kode_dept != 0)
			{
				$data['kode_dept'] = $kode_dept;

				$data['saldo'] = $this->Saldo_m->getSaldoByDept($kode_dept);
			}else{
				$data['saldo'] = $this->Saldo_m->getSaldoByDept();
			}

			$total = 0;

			foreach ($data['saldo'] as $key => $value) {
				if(($value->kredit) != '0')
				{
					$total += $value->kredit;
				}

				$getKode = $this->User_m->getDepartmentByKode($value->kode_dept);

				$dataDept[$value->kode_dept] = $getKode[0];
			}
			
			if(isset($dataDept))
			{
				$data['dept'] = $dataDept;
			}

			$data['total'] = $total;

			$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
	        // Buat HTML atau load dari view
	        $html = $this->load->view('page/laporan/pdfperbagian', $data, true);
	        //dump($html);die;
	        // Lakukan pengerjaan PDF
			$mpdf->WriteHTML('<table width="50%" style="left-align: bottom; font-family: serif; 
		    font-size: 9pt; color: #000000;">
		    <tr>
		        <td width="33%"><img style="width:120px;" src="'. base_url().'img/logo_header.png"></td>
		        <td width="100%" align="left"> <p style="font-size:13pt; font-weight:bold;">PT. AZZAHRA TRANS UTAMA</p><br>
		                    <p>GRAHA AZKA : Jl. Mayjen HE. Sukma</p>
		                    <p>(Raya Sukabumi) Km. 1 No. 45</p>
		                    <p>Kota Bogor Indonesia 16138</p></td>
		    </tr>
			</table>');
	        $mpdf->WriteHTML($html);
	        $mpdf->Output("laporanperbagian".date('dFY'), 'I');
		}

		public function printpdfbulanan($month)
	    {	    	
	    	$data['saldo'] = $this->Saldo_m->getSaldoBulanan($month);

	    	$monthBefore = $month - 1;

			$saldoBefore = $this->Saldo_m->getSaldoBefore($monthBefore);

			if(!empty($saldoBefore)){
				if($monthBefore == 0)
				{
					$keterangan = 'Saldo Tahun '.date('Y')-1;

				}else{
					$keterangan = 'Saldo Bulan '.month_name($monthBefore);
				}

				$LastSaldo 				= new stdClass();
				$LastSaldo->debet 		= $saldoBefore[0]->saldo;
				$LastSaldo->saldo 		= $saldoBefore[0]->saldo;
				$LastSaldo->keterangan 	= $keterangan;

				$dataSaldo[] = $LastSaldo;

				$data['saldo'] = array_merge($data['saldo'],$dataSaldo);
			}

			$data['saldo'] = array_reverse($data['saldo']);

			foreach ($data['saldo'] as $key => $value) {
				if(($value->debet) != '0')
				{
					
					if(empty($debet))
					{
						$debet = $value->debet;
					}else{
						$debet += $value->debet;
					}

				}elseif(($value->kredit) != '0')
				{
					if(empty($kredit))
					{
						$kredit = $value->kredit;
					}else{
						$kredit += $value->kredit;
					}
				}
			}
			if(isset($debet)){
				$data['totdebet'] = $debet;	
			}
			if(isset($kredit)){
				$data['totkredit'] = $kredit;	
			}
			if(isset($kredit) && isset($debet)){		
				$data['totsaldo'] = $debet-$kredit;
			}	

			$data['month'] = month_name($month);

	       	$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
	       	
	       	//ADD PASSWORD WHEN OPEN IT
	       	//$mpdf->SetProtection(array(), 'UserPassword', 'MyPassword');

	        // Buat HTML atau load dari view
	        $html = $this->load->view('page/laporan/pdfbulanan', $data, true);
	        //dump($html);die;
	        // Lakukan pengerjaan PDF
			$mpdf->WriteHTML('<table width="50%" style="left-align: bottom; font-family: serif; 
		    font-size: 9pt; color: #000000;">
		    <tr>
		        <td width="33%"><img style="width:120px;" src="'. base_url().'img/logo_header.png"></td>
		        <td width="100%" align="left"> <p style="font-size:13pt; font-weight:bold;">PT. AZZAHRA TRANS UTAMA</p><br>
		                    <p>GRAHA AZKA : Jl. Mayjen HE. Sukma</p>
		                    <p>(Raya Sukabumi) Km. 1 No. 45</p>
		                    <p>Kota Bogor Indonesia 16138</p></td>
		    </tr>
			</table>');
	        $mpdf->WriteHTML($html);
	        $mpdf->Output("laporanbulan".month_name($month).date('Y'), 'I');
	    }

	    public function printpdfjurnal()
	    {	    	
	    	$data['saldo'] = $this->Saldo_m->getSaldo();

			foreach ($data['saldo'] as $key => $value) {
				if(($value->debet) != '0')
				{	
					if(empty($debet))
					{
						$debet = $value->debet;
					}else{
						$debet += $value->debet;
					}
				}elseif(($value->kredit) != '0')
				{
					if(empty($kredit))
					{
						$kredit = $value->kredit;
					}else{
						$kredit += $value->kredit;
					}
				}
			}
			
			if(isset($debet)){
				$data['totdebet'] = $debet;	
			}
			if(isset($kredit)){
				$data['totkredit'] = $kredit;	
			}
			if(isset($kredit) && isset($debet)){		
				$data['totsaldo'] = $debet-$kredit;
			}	

	       	$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
	        // Buat HTML atau load dari view
	        $html = $this->load->view('page/laporan/pdfjurnal', $data, true);
	        //dump($html);die;
	        // Lakukan pengerjaan PDF
			$mpdf->WriteHTML('<table width="50%" style="left-align: bottom; font-family: serif; 
		    font-size: 9pt; color: #000000;">
		    <tr>
		        <td width="33%"><img style="width:120px;" src="'. base_url().'img/logo_header.png"></td>
		        <td width="100%" align="left"> <p style="font-size:13pt; font-weight:bold;">PT. AZZAHRA TRANS UTAMA</p><br>
		                    <p>GRAHA AZKA : Jl. Mayjen HE. Sukma</p>
		                    <p>(Raya Sukabumi) Km. 1 No. 45</p>
		                    <p>Kota Bogor Indonesia 16138</p></td>
		    </tr>
			</table>');
	        $mpdf->WriteHTML($html);
	        $mpdf->Output("laporanJurnal".date('Y'), 'I');
	    }
	}
	
 ?>