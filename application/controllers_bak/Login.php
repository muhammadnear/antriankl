<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('User');
	}
	public function index()
	{
		$kirim["error"] = "";
		$this->load->view('login',$kirim);
	}
	public function signin()
	{
		//echo var_dump($_POST);
		$kirim['header_db'] = 1;
		$this->load->view('header');
		$this->load->view('dashboard',$kirim);
		$this->load->view('footer');
		/*$flag = 0;
		$hasil = $this->User->getLogin();
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$kirim["error"] = "Masukkan Username dan Password Anda..";
			$this->load->view('login',$kirim);	
		}
		else
		{
			$flag = 0;
			$username = $_POST['username'];
			$password = $_POST['password'];
			foreach ($hasil as $key) 
			{
				if($username == $key->username)
				{
					if($password == $key->password)
					{
						$this->session->set_userdata('id_login',$key->id_login);
						$this->session->set_userdata('lastvisit_at',$key->lastvisit_at);
						$flag = 1;
						break;
					}
				}
			}
			if($flag == 1)
			{
				echo "hore";
			}
			else
			{
				$kirim["error"] = "Maaf, Username atau Password yang anda masukkan salah..";
				$this->load->view('login',$kirim);	
			}
		}*/
		
	}
	public function signout()
	{
		/*$data = array('lastvisit_at' => date('Y-m-d H:i:s'));
		$this->User->LastVisit($data, $this->session->userdata('id_login'));
		$kirim["error"] = "";
		$this->session->sess_destroy();*/
		$this->load->view("login", $kirim);
	}
}
