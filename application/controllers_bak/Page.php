<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model');
		//$this->load->library('session');
		//$this->load->model('User');
	}

	function generateRandomString($length = 6) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    while(1)
	    {
	    	for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    $get = $this->Page_model->get_kode_booking($randomString);
		    if(empty($get))
		    	break;
	    }
	    
	    return $randomString;
	}

	public function index()
	{
		$kirim["error"] = "";
		$this->load->view('dashboard',$kirim);
	}
	public function register()
	{
		$a = explode('-',$_POST['tanggal']);
		$tanggal = $a[2].'-'.$a[1].'-'.$a[0];

		$kode_booking = $this->generateRandomString();

		$data = array(
			'nama' => $_POST['nama'], 
			'no_hp' => $_POST['no_hp'],
			'email' => $_POST['email'],
			'no_paspor_permit' => $_POST['no_paspor'],
			'jadwal_hari' => $tanggal,
			'jadwal_jam' => $_POST['jam'],
			'kode_booking' => $kode_booking
			);
		$id = $this->Page_model->insert_pemohon($data);
		//image
		$configu['upload_path']          = './tmp/images/';
		$configu['allowed_types']        = 'gif|jpg|png|jpeg';
		$configu['max_size']             = 2000;
		$configu['max_width']            = 10240;
		$configu['max_height']           = 10240;
 
		$this->load->library('upload', $configu);

 		$ext = strtolower(pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION));
		if($ext != "gif" && $ext != "jpg" && $ext != "png" && $ext != "jpeg")
		{
			$kirim['error'] = "File harus berupa jpg, png, jpeg atau gif.";
		}
		else
		{
			if ( ! $this->upload->do_upload('files')){
				$kirim['error'] = $this->upload->display_errors();
			}else{
				$uploaded_file = $this->upload->data();
				$data = array(
					'path_foto' => $uploaded_file['file_name']
					);
				$this->Page_model->update_pemohon($data, $id);
			}
		}
		
		//QR code
		$this->load->library('ci_qr_code');
		$this->config->load('qr_code');
		$qr_code_config = array(); 
		$qr_code_config['cacheable'] 	= $this->config->item('cacheable');
		$qr_code_config['cachedir'] 	= $this->config->item('cachedir');
		$qr_code_config['imagedir'] 	= $this->config->item('imagedir');
		$qr_code_config['errorlog'] 	= $this->config->item('errorlog');
		$qr_code_config['ciqrcodelib'] 	= $this->config->item('ciqrcodelib');
		$qr_code_config['quality'] 		= $this->config->item('quality');
		$qr_code_config['size'] 		= $this->config->item('size');
		$qr_code_config['black'] 		= $this->config->item('black');
		$qr_code_config['white'] 		= $this->config->item('white');

		$this->ci_qr_code->initialize($qr_code_config);

		$image_name = 'kode booking'.$kode_booking.'.png';

		$params['data'] = $kode_booking;
		$params['level'] = 'H';
		$params['size'] = 10;
		
		$params['savename'] = FCPATH.$qr_code_config['imagedir'].$image_name;
		$path_png = $params['savename'];

		$this->ci_qr_code->generate($params); 
		$kirim['qr_code_image_url'] = base_url().$qr_code_config['imagedir'].$image_name;
		$kirim['submitted'] = 1;
		$kirim['nama'] = $_POST['nama'];
		$kirim['hp'] = $_POST['no_hp'];
		$kirim['email'] = $_POST['email'];
		$kirim['paspor'] = $_POST['no_paspor'];
		$kirim['tanggal'] = $_POST['tanggal'];
		$kirim['jam'] = $_POST['jam'];
		if(!empty($uploaded_file))
			$kirim['gambar'] = $uploaded_file['file_name'];
		$kirim['kode'] = $kode_booking;
		$message = "Berikut adalah data antrian anda di KBRI Kuala Lumpur:<br>
		Tanggal Pendaftaran : ".date('d-m-Y h:i:s')."<br>
		Nama : ".$_POST['nama']."<br>
		No HP : ".$_POST['no_hp']."<br>
		Email : ".$_POST['email']."<br>
		No Paspor / Working Permit : ".$_POST['no_paspor']."<br>
		Tanggal Kedatangan : ".$_POST['tanggal']."<br>
		Jam Kedatangan : ".$_POST['jam']."<br>
		<br>Kode Booking : ".$kode_booking."<br>
		<br><br>
		Terima Kasih.
		";

		if($this->send_email($_POST['email'], $path_png, $message))
			$kirim['sukses'] = "Mendaftar antrian berhasil. Data juga dikirimkan di email anda.";
		else
			$kirim['sukses'] = "Mendaftar antrian berhasil.";

		$this->load->view('dashboard', $kirim); 
	}
	public function qr()
	{
		$this->load->view('qr_code');
	}
	public function send_email($receiver, $path_png, $message)
	{
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'irooyanalfi@gmail.com',
		    'smtp_pass' => 'dvygsklpgbjisbwm',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1',
		    'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('irooyanalfi@gmail.com', 'Kedutaan Besar Republik Indonesia Kuala Lumpur');
        $this->email->to($receiver); 

        $this->email->subject('Data antrian anda di KBRI Kuala Lumpur');
        $this->email->message($message); 
        $this->email->attach($path_png);
		$result = $this->email->send();

		//echo $this->email->print_debugger();
		return $result;
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
