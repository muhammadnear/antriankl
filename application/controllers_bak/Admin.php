<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');
		//$this->load->model('nama_model');
	}

	public function index()
	{
		$head['header_db'] = 1;
		$this->load->view('header',$head);
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function grafik()
	{
		$head['header_grafik'] = 1;
		$this->load->view('header',$head);
		$this->load->view('grafik');
		$this->load->view('footer');
	}

	public function member()
	{
		$head['header_member'] = 1;
		$this->load->view('header',$head);
		$this->load->view('member');
		$this->load->view('footer');
	}

	public function form()
	{
		$head['header_form'] = 1;
		$this->load->view('header',$head);
		$this->load->view('form');
		$this->load->view('footer');
	}

	public function delete()
	{

	}

	public function submit_delete()
	{
		
	}
}	
