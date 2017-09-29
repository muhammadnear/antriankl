<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User');
		$this->load->model('Page_model');
	}

	public function index()
	{
		$kirim['error'] = "";
		$this->load->view('admin/login',$kirim);
	}
	public function signout()
	{
		/*$data = array('lastvisit_at' => date('Y-m-d H:i:s'));
		$this->User->LastVisit($data, $this->session->userdata('id_login'));*/
		$kirim["error"] = "";
		$this->session->sess_destroy();
		$this->load->view("admin/login", $kirim);
	}
	public function signin()
	{
		$users = $this->User->Getlogin();
		$flag = 0;
		foreach ($users as $key) 
		{
			if($key->username == $_POST['username'] && $key->password == md5($_POST['password']))
			{
				$this->session->set_userdata('username',$key->username);
				$this->session->set_userdata('id_login',$key->id_login);
				$flag = 1;
			}
		}
		if($flag == 0)
		{
			$kirim['error'] = "Masukkan username dan password dengan benar.";
			$this->load->view('admin/login',$kirim);
		}
		else
			$this->dashboard();
		
	}
	public function dashboard()
	{
		//echo "haha";
		$kirim['config'] = $this->Page_model->get_konfig()[0];

		$kirim['jam_mulai'] = intval(explode(':', $kirim['config']->jam_mulai)[0]);
		$kirim['jam_selesai'] = intval(explode(':', $kirim['config']->jam_selesai)[0]);
		$head['header_db'] = 1;
		$this->load->view('admin/header',$head);
		$this->load->view('admin/dashboard',$kirim);
		$this->load->view('admin/footer');
	}
	public function submit_config()
	{
		$masuk = str_pad($_POST['jam_mulai'], 2, '0', STR_PAD_LEFT).":00:00";
		$keluar = str_pad($_POST['jam_selesai'], 2, '0', STR_PAD_LEFT).":00:00";
		$data = array(
			'jam_mulai' => $masuk,
			'jam_selesai' => $keluar,
			'quota_perjam' => $_POST['quota_perjam']
			);
		$this->Page_model->update_konfig($data, 1);
		$this->dashboard();
	}
	public function libur()
	{
		$head['header_libur'] = 1;
		$kirim['libur'] =  $this->Page_model->get_libur();
		$this->load->view('admin/header',$head);
		$this->load->view('admin/libur',$kirim);
		$this->load->view('admin/footer');
	}
	public function hapus_libur($id_hari_libur)
	{
		$this->Page_model->delete_libur($id_hari_libur);
		$head['header_libur'] = 1;
		$kirim['libur'] =  $this->Page_model->get_libur();

		$this->load->view('admin/header',$head);
		$this->load->view('admin/libur',$kirim);
		$this->load->view('admin/footer');
	}
	public function submit_libur()
	{
		$a = explode('-', $_POST['tanggal']);
		$tanggal = $a[2].'-'.$a[1].'-'.$a[0];

		$data = array(
			'hari_libur' => $tanggal,
			'keterangan' => $_POST['keterangan']
			);
		$this->Page_model->insert_libur($data);
		$this->libur();
	}
	public function akses()
	{
		$kirim['user'] = $this->User->GetLogin();
		$head['header_akses'] = 1;
		$this->load->view('admin/header',$head);
		$this->load->view('admin/akses', $kirim);
		$this->load->view('admin/footer');
	}
	public function submit_akses()
	{
		$data = array(
			'username' => $_POST['username'],
			'password' => md5($_POST['password'])
			);
		$this->User->insertlogin($data);
		$this->akses();
	}
	public function edit_akses($id_login)
	{
		$login = $this->User->GetloginById($id_login);
		if(empty($login))
			$this->akses();
		else
		{
			$kirim['user'] = $login[0];
			$head['header_akses'] = 1;
			$this->load->view('admin/header',$head);
			$this->load->view('admin/edit_akses', $kirim);
			$this->load->view('admin/footer');
		}
	}
	public function hapus_akses($id_login)
	{
		$login = $this->User->GetloginById($id_login);
		if(empty($login))
			$this->akses();
		else
		{
			$this->User->hapuslogin($id_login);
			$this->akses();
		}
	}
	public function update_akses()
	{
		$id_login = $_POST['id_login'];
		$login = $this->User->GetloginById($id_login);
		if(empty($login))
			$this->akses();
		else
		{
			$data = array(
				'username' => $_POST['username'], 
				'password' => md5($_POST['password']) 
				);
			$this->User->updatelogin($data, $id_login);
			$this->akses();
		}
	}
}	
