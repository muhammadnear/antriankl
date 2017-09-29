<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Page_model');
	}
	public function index()
	{
		//$kirim["error"] = "";
		//$this->load->view('login',$kirim);
	}
	function check_day($day)
	{
		$conf = $this->Page_model->get_konfig()[0];
		$a = explode(':', $conf->jam_mulai);
		$b = explode(':', $conf->jam_selesai);
		$jam_mulai = intval($a[0]);
		$jam_selesai = intval($b[0]);
		$hari = explode('-', $day);
		$tanggal = $hari[2].'-'.$hari[1].'-'.$hari[0];
		$available = array();
		$index = 0;
		for ($i=$jam_mulai; $i < $jam_selesai ; $i++) 
		{ 
			$h = str_pad($i, 2, '0', STR_PAD_LEFT);
			$j = str_pad($i+1, 2, '0', STR_PAD_LEFT);
			$times = "$h.00 - $j.00";
			//check di database nilai dari masing-masing times berapa. kemudian masukkan di jml;
			$juml = $this->Page_model->hitung_jam($tanggal, $times);
			//echo var_dump($juml);
			if($i == 13)
			{
				$available[$index] = array(
				'jam' => $times,
				'juml' => $conf->quota_perjam
				);
			}
			else
			{
				$available[$index] = array(
				'jam' => $times,
				'juml' => $juml
				);
			}
			$index++;
		}
		return $available;
	}
	public function get_day($tgl)
	{
		$conf = $this->Page_model->get_konfig()[0];
		$libur = $this->Page_model->get_libur();
		$timestamp = strtotime($tgl);

		$day = date('D',$timestamp);
		$maks_sehari = $conf->quota_perjam;
		//$string = "";
		
		if($day == 'Sun' || $day == 'Sat')
		{
			$string = "libur";
		}
		else if(date('d-m-Y') > date('d-m-Y',$timestamp))
		{
			$string = "lewat";
		}
		else
		{
			$flag = 0;
			foreach ($libur as $key) 
			{
				$b = explode('-', $key->hari_libur);
				$tgllibur = $b[2].'-'.$b[1].'-'.$b[0];
				if($tgl == $tgllibur)
				{
					$flag = 1;
					break;
				}
			}

			$chk = $this->check_day($tgl);
			$available = array();
			
			foreach ($chk as $key) 
			{
				if($key['juml'] < $maks_sehari)
					array_push($available, $key['jam']);
			}

			if(empty($available))
				$flag = 2;

			if($flag == 1)
				$string = "libur";
			if($flag == 2) 
				$string = "penuh";
			if($flag == 0)
			{
				$string = array();
				$string[0] = "bisa";
				$string[1] = $available;
			}
		}
		echo json_encode($string);
	}
}