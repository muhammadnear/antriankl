<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('Page_model');
	}

	public function index()
	{
		$this->load->view('kiosk');
	}

	public function submit()
	{
		$today = date('Y-m-d');
		$flag = 0; // 1 jika terlambat 2 jika terlalu cepat
		$kode = $this->input->get('kode');
		$pemohon = $this->Page_model->get_pemohon_byKode($kode);
		if(!empty($pemohon))
		{
			$param1 = explode('-', $today);
			$param2 = explode('-', $pemohon[0]->jadwal_hari);

			if($param1[0] > $param2[0])
				$flag = 1;
			else if($param1[0] < $param2[0])
				$flag = 2;
			else
			{
				if($param1[1] > $param2[1])
					$flag = 1;
				else if($param1[1] < $param2[1])
					$flag = 2;
				else
				{
					if($param1[2] > $param2[2])
						$flag = 1;
					else if($param1[2] < $param2[2])
						$flag = 2;
					else
					{
						$jam_dtg = intval(explode('.', $pemohon[0]->jadwal_jam)[0]);
						date_default_timezone_set('Asia/Kuala_Lumpur');
						$jam_skr = date("H",time());
						if($jam_dtg < $jam_skr)
							$flag = 1;
						else if($jam_dtg > $jam_skr)
							$flag = 2;
					}
				}
			}
			if($flag == 1)
				$kirim['error'] = "Maaf, antrian anda sudah gugur. silakan antri manual atau booking antri online lagi.";
			else if($flag == 2)
				$kirim['error'] = "Kedatangan anda tidak sesuai dengan jadwal. silakan datang lagi pada <br>tanggal ".$param2[2]."-".$param2[1]."-".$param2[0]." jam ".$pemohon[0]->jadwal_jam;
			else
				$kirim['pemohon'] = $pemohon[0];
		}
		else
			$kirim['error'] = "Maaf, kode tidak dikenali.";
		$this->load->view('kiosk',$kirim);
	}

	public function get_info()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$today = date('Y-m-d');
		$flag = 0; // 1 jika terlambat 2 jika terlalu cepat
		$kode = $this->input->get('kode');
		$pemohon = $this->Page_model->get_pemohon_byKode($kode);
		if(!empty($pemohon))
		{
			$param1 = explode('-', $today);
			$param2 = explode('-', $pemohon[0]->jadwal_hari);

			if($param1[0] > $param2[0])
				$flag = 1;
			else if($param1[0] < $param2[0])
				$flag = 2;
			else
			{
				if($param1[1] > $param2[1])
					$flag = 1;
				else if($param1[1] < $param2[1])
					$flag = 2;
				else
				{
					if($param1[2] > $param2[2])
						$flag = 1;
					else if($param1[2] < $param2[2])
						$flag = 2;
					else
					{
						$jam_dtg = intval(explode('.', $pemohon[0]->jadwal_jam)[0]);
						date_default_timezone_set('Asia/Kuala_Lumpur');
						$jam_skr = date("H",time());
						if($jam_dtg < $jam_skr)
							$flag = 1;
						else if($jam_dtg > $jam_skr)
							$flag = 2;
					}
				}
			}
			if($flag == 1)
				$kirim['error'] = "Maaf, antrian anda expired. Silakan booking online ulang atau antri manual.";
			else if($flag == 2)
				$kirim['error'] = "Kedatangan anda tidak sesuai dengan jadwal. silakan datang lagi pada <br>tanggal ".$param2[2]."-".$param2[1]."-".$param2[0]." jam ".$pemohon[0]->jadwal_jam;
			else
				$kirim['pemohon'] = $pemohon[0];
		}
		else
			$kirim['error'] = "Maaf, kode tidak dikenali.";

		//echo var_dump($kirim);

		echo json_encode($kirim);
	}

	public function send_image()
	{
		//echo exec('whoami');
		//echo exec('dir',$out);
		
		$get_file = "profileku-koboy.jpg";
		$no_urut = "L0001.jpg";

		echo exec('python haha.py '.$get_file.' '.$no_urut.' 2>&1', $out);
		echo var_dump($out);
	}

	public function submit_edit()
	{

	}

	public function delete()
	{

	}

	public function submit_delete()
	{
		
	}
}	
