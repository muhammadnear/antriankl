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
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
		$kirim['captcha'] = $this->recaptcha->getWidget();
		$kirim['script_captcha'] = $this->recaptcha->getScriptTag();
		$this->load->view('dashboard',$kirim);
	}
	public function register()
	{
		$recaptcha = $_POST['g-recaptcha-response'];
		$response = $this->recaptcha->verifyResponse($recaptcha);
		if (!isset($response['success']) || $response['success'] <> true) {
            $kirim['error'] = "Maaf, captcha anda bermasalah. Mohon ulangi registerasi";
            $kirim['captcha'] = $this->recaptcha->getWidget();
			$kirim['script_captcha'] = $this->recaptcha->getScriptTag();
			$this->load->view('dashboard',$kirim);
        }
        else
        {
        	if(empty($_POST))
				$this->index();
			else
			{
				$check = $this->Page_model->get_pemohon_byPaspor($_POST['no_paspor']);
				if(empty($check))
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

							$rotation = $_POST['rotate_val']%360;
							if($rotation == 90)
								$rotation = 270;
							else if($rotation == 270)
								$rotation = 90;

							$configs['image_library'] = 'gd2';
							$configs['source_image'] = $uploaded_file['full_path'];
							$configs['maintain_ratio'] = TRUE;
							$configs['rotation_angle'] = $rotation;
							$this->load->library('image_lib',$configs);
							if(!$this->image_lib->rotate())
								$kirim['error'] = ($this->image_lib->display_errors());

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
					$kirim['script_captcha'] = $this->recaptcha->getScriptTag();
					$kirim['captcha'] = $this->recaptcha->getWidget();
					$this->load->view('dashboard', $kirim); 
				}
				else
				{
					$a = explode('-', $check[0]->jadwal_hari);
					$tgl = $a[2].'-'.$a[1].'-'.$a[0];
					$kirim['error'] = "Maaf, anda sudah terjadwal pada tanggal ".$tgl." jam ".$check[0]->jadwal_jam;
					$kirim['submitted'] = 1;
					$kirim['script_captcha'] = $this->recaptcha->getScriptTag();
					$kirim['captcha'] = $this->recaptcha->getWidget();
					$this->load->view('dashboard', $kirim);
				}
			}
        }
		
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
		    'smtp_user' => 'kbriklantri@gmail.com',
		    'smtp_pass' => 'iayehmktupndnkzi',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1',
		    'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('kbriklantri@gmail.com', 'Kedutaan Besar Republik Indonesia Kuala Lumpur');
        $this->email->to($receiver); 

        $this->email->subject('Data antrian anda di KBRI Kuala Lumpur');
        $this->email->message($message); 
        $this->email->attach($path_png);
		$result = $this->email->send();

		//echo $this->email->print_debugger();
		return $result;
	}

	public function testing()
	{
		$kirim['captcha'] = $this->recaptcha->getWidget();
		$kirim['script_captcha'] = $this->recaptcha->getScriptTag();
		
		$this->load->view('test',$kirim);
	}

	public function policy()
	{
		$this->load->view('policy');
	}

	public function submit()
	{
		$recaptcha = $_POST['g-recaptcha-response'];
		echo var_dump($recaptcha);
		$response = $this->recaptcha->verifyResponse($recaptcha);
		echo var_dump($response);
		if (!isset($response['success']) || $response['success'] <> true) {
            echo "gagal";
        } else {
            // lakukan proses validasi login disini
            // pada contoh ini saya anggap login berhasil dan saya hanya menampilkan pesan berhasil
            // tapi ini jangan di contoh ya menulis echo di controller hahahaha
            echo 'Berhasil';
        }
		
	}
}
