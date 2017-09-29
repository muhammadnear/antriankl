<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Kedutaan Besar Republik Indonesia Kuala Lumpur</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/responsive/css/base.css"> 
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/responsive/css/vendor.css"> 
	    <link rel="stylesheet" href="<?php echo base_url()?>assets/responsive/css/main.css">
	    <script src="<?php echo base_url()?>assets/responsive/js/modernizr.js"></script>
		<script src="<?php echo base_url()?>assets/responsive/js/pace.min.js"></script>
		<link rel="icon" href="<?php echo base_url()?>assets/img/lambang-pancasila.png">

		<?php echo $script_captcha; // javascript recaptcha ?>		
		<style type="text/css">
			.stepwizard-step p {
			    margin-top: 10px;
			    color:rgb(200,200,200);
			}
			.stepwizard-row {
			    display: table-row;
			}
			.stepwizard {
			    display: table;
			    width: 50%;
			    position: relative;
			}
			.stepwizard-step button[disabled] {
			    opacity: 1 !important;
			    filter: alpha(opacity=100) !important;
			}
			.stepwizard-row:before {
			    top: 14px;
			    bottom: 0;
			    position: absolute;
			    content: " ";
			    width: 100%;
			    height: 1px;
			    background-color: #ccc;
			    z-order: 0;
			}
			.stepwizard-step {
			    display: table-cell;
			    text-align: center;
			    position: relative;
			}
			.btn-circle {
			    width: 30px;
			    height: 30px;
			    text-align: center;
			    padding: 6px 0;
			    font-size: 12px;
			    line-height: 1.428571429;
			    border-radius: 15px;
			}
			.disable-click{
				pointer-events: none;
			}
		</style>
	</head>
	<body id="top">
		<header class="main-header">
			<div class="logo">
		      <a href="<?php echo base_url()?>">KBRI Kuala Lumpur</a>
		   </div> 
		   <a class="menu-toggle" href="#"><span>Menu</span></a>   	
	   </header>

	   <nav id="menu-nav-wrap">

	   	<h3>Navigasi</h3>   	
			<ul class="nav-list">
				<li><a class="smoothscroll" href="#intro" title="">Antrian</a></li>
				<li><a class="smoothscroll" href="#features" title="">Syarat Pembuatan Paspor</a></li>
				<li><a class="smoothscroll" href="#download" title="">Download</a></li>	
			</ul>
		</nav>

		<div id="main-content-wrap">
			<section id="intro">   
			   <div class="row intro-content">
			   		<div class="col-twelve">
			   				<?php 
								if(!empty($submitted))
								{
									if(!empty($error))
									{
										echo "<div style='margin: auto; padding: 2%;'>";
										echo "<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>$error</p></center>";
										echo "</div>";
									}
									else
									{
							?>
								<div style="margin: auto; padding: 2%;">
									<center><p class='bg-success' style='padding:15px; font-family: sans-serif;'> <?php echo $sukses; ?></p></center>
									<center><p class='bg-warning' style='padding:15px; font-family: sans-serif;'> Perhatian : Nomor antrian ini akan <b>gugur</b> jika data yang dimasukkan pemohon tidak sesuai atau berkas tidak memenuhi persyaratan.</p></center>
									<div style="vertical-align: center; text-align: center; margin-top: auto; margin-bottom: 5%; margin-right: auto; margin-left: -40%; position: relative;">
										<label class="control-label" style="text-align: left; display: inline-block; color: rgb(180,180,180); margin-right: 7%;">
										     Nama Lengkap : <?php echo $nama;?>
										<br> Email : <?php echo $email;?>
										<br> No HP : <?php echo $hp;?>
										<br> No Paspor : <?php echo $paspor;?>
										<br> Tanggal : <?php echo $tanggal;?>
										<br> Jam Kedatangan : <?php echo $jam;?>
										<br> Kode QR : <?php echo $kode;?>
										</label>
										<?php if(!empty($gambar)) { ?><img style="position: absolute; display: inline-block; width: 200px; max-height: 230px;" src="<?php echo base_url()?>tmp/images/<?php echo $gambar?>"> <?php } ?>
									</div>
										<img style="width: 250px;" src="<?php echo $qr_code_image_url?>"> 
								</div><br>
							<?php 
									}
								}
							?>
				   		<h3 class="animate-intro" style="margin-left: 5%; margin-bottom: 5%">Mendaftar Antrian Online</h3>
							<div class="container">
								<div class="stepwizard" style="margin: auto; width:70%;">
								    <div class="stepwizard-row setup-panel">
								      <div class="stepwizard-step">
								        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
								        <p>Step 1</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-2" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">2</a>
								        <p>Step 2</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-3" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">3</a>
								        <p>Step 3</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-4" type="button" class="btn btn-default btn-circle disable-click" disabled="disabled">4</a>
								        <p>Step 4</p>
								      </div>
								    </div>
							  	</div>
							  </div>
					  	<form name="form_" id="form_" enctype="multipart/form-data" role="form" action="<?php echo base_url()?>index.php/page/register" method="post">
						    <div class="row setup-content" id="step-1">
						        <div class="col-md-12" style="margin: auto; width: 100%;">
						          <h3> Data Diri</h3>
						          <div class="form-group">
						            <label class="control-label" style="color: rgb(180,180,180);">Nama Lengkap</label>
						            <input  maxlength="100" name="nama" type="text" style="color: rgb(200,200,200);" required="required" class="form-control" placeholder="Masukkan Nama Lengkap"  />
						          </div>
						          <div class="form-group">
						            <label class="control-label" style="color: rgb(180,180,180);">Nomor HP</label>
						            <input maxlength="100" name="no_hp" type="text" style="color: rgb(200,200,200);" required="required" class="form-control" placeholder="Masukkan Nomor HP" />
						          </div>
						          <div class="form-group">
						            <label class="control-label" style="color: rgb(180,180,180);">Email</label>
						            <input maxlength="100" name="email" type="text" style="color: rgb(200,200,200);" required="required" class="form-control" placeholder="Masukkan Email" />
						          </div>
						          <div class="form-group">
						            <label class="control-label" style="color: rgb(180,180,180);">No Paspor / Working Permit</label>
						            <input maxlength="100" name="no_paspor" type="text" style="color: rgb(200,200,200);" required="required" class="form-control" placeholder="Masukkan No Paspor / Working Permit" />
						          </div>
						          <div>
						          	<input type="checkbox"  id="chck_1" required="required" class="pull-left" style="height: 25px;"><p style="text-align: left; color: rgb(180,180,180);"> &nbsp;&nbsp;Saya telah membaca <a href="#features">persyaratan dan ketentuan</a> membuat paspor baru.</p>
						          </div>
						          <div id="error-step-1">
						          	<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>Mohon isi semua atribut dan centang pernyataan diatas.</p></center>
						          </div>						          
						          <button id="next-1" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Lanjutkan</button>
						        </div>
						    </div>

						    <div class="row setup-content" id="step-2">
						        <div class="col-md-12" style="margin: auto; width: 100%;">
						          <h3> Upload Foto</h3>
						          <div class="form-group">
						          	<label class="control-label" style="color: rgb(180,180,180);">Masukkan Foto Anda (berbentuk jpg, jpeg atau png. maks 2 MB)</label>
						            <center><input type="file" id="files" name="files" /></center>
									<img id="image" />
									<div>
										<button id='buttoni' onclick="rotateFunc()" type='button' style="display: none;">Rotate</button>
										<input type="hidden" id="rotate_val" name="rotate_val" value="0"/>
									</div>
									
						          </div>
						          <br>
						          <div id="error-step-2">
						          	<center><p id="photoLabel" class='bg-danger' style='padding:15px; font-family: sans-serif;'>Mohon upload foto terbaru wajah anda.</p></center>
						          </div>
						          <br>
						          <button id="next-2" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Lanjutkan</button>
						        </div>
						    </div>	

						    <div class="row setup-content" id="step-3">
						      <div class="col-md-12" style="margin: auto; width: 100%;">
						          <h3> Pilih Jadwal</h3>
						          <div class="form-group">
						            <label class="control-label" style="color: rgb(180,180,180);">Pilih Tanggal</label>
						            <input type="text" name="tanggal" style="color: rgb(200,200,200);" required="required" class="form-control" id="datepicker" />
						          </div>
						          <div class="form-group">
							          <div id="wrap">
							          	
							          </div>
						          </div>
						          <div id="error-step-3">
						          	<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>Mohon pilih tanggal dan jam diatas.</p></center>
						          </div>
						          <button id="next-3" class="btn btn-primary nextBtn btn-lg pull-right" type="button">Lanjutkan</button>
						        </div>
						    </div>

						    <div class="row setup-content" id="step-4">
						      <div class="col-md-12" style="margin: auto; width: 100%;">
						          <h3> Konfirmasi</h3>
						          <div>
						          	<input onchange="this.setCustomValidity(validity.valueMissing ? 'Mohon centang pernyataan ini untuk melanjutkan' : '');"  type="checkbox"  id="chck_2" required="required" class="pull-left" style="height: 25px;"><p style="text-align: justify; color: rgb(180,180,180);"> &nbsp;&nbsp;Dengan ini Saya menyatakan bahwa semua data yang telah saya cantumkan adalah benar dan tidak mengada-ada. Apabila dikemudian hari data yang saya masukkan tidak benar, maka saya siap menanggung resiko dan diproses sesuai dengan hukum yang berlaku.</p>
						          </div>
						          <div id="error-step-4">
						          	<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>Mohon centang pernyataan diatas.</p></center>
						          </div>
						          <div class="g-recaptcha" data-sitekey="6Ldm3zAUAAAAAHAH8TVUCBvvqq-pbPIFYi4CWDn6" data-theme="light" data-type="image" data-size="normal"></div>
						          <input type="hidden" name="recaptcha" data-rule-recaptcha="true">
						          <button class="btn btn-success btn-lg pull-right" type="submit">Daftar</button>
						      </div>
						    </div>
						  </form>
					</div>
			   </div>
			</section> 
					
			<section id="features">
				<div class="row section-intro group animate-this">	
			   		<div class="col-twelve with-bottom-line">

			   			<h2 class="">Persyaratan dan Ketentuan Membuat Paspor</h2>

			   		</div>   		
			   	</div>

				<div class="row features-wrap">
								     		
					<div class="features-list block-1-3 block-s-1-2 block-tab-full">

						<div class="bgrid feature animate-this">	

							<span class="feature-count">01.</span>            

						    <div class="feature-content">

			              	   	<h3>Paspor Asli</h3>
								<p>Pemohon harus membawa paspor asli untuk membuat paspor baru.</p>
							</div> 	         	 

						</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">02.</span>            

							   <div class="feature-content">

			              	   	<h3>Fotocopy Identitas</h3>

									<p>Pemohon juga harus membawa fotokopi halaman depan identitas dan halaman visa/permit kerja/tinggal yang masih berlaku.
								   </p>
									         		
								</div> 	         	 

							</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">03.</span>            

							   <div class="feature-content">

			              	   	<h3>Tuliskan Alamat</h3>

									<p>Menulis alamat tempat tinggal di Indonesia dan Malaysia, serta nomor telepon yang bisa dihubungi. (dituliskan pada lembar fotokopi paspor)
								   </p>
									         		
								</div> 	         	 

							</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">04.</span>            

							   <div class="feature-content">

		              	   		<h3>Jika Paspor Hilang</h3>

									<p>Untuk paspor hilang, anda akan dimintai keterangan dalam bentuk BAP (Berita Acara Pemeriksaan) dan sertakan Surat Laporan Polisi.
								   </p>
								         		
								</div> 	         	 

							</div> <!-- /bgrid -->

						<div class="bgrid feature animate-this">	

							<span class="feature-count">05.</span>            

						    <div class="feature-content">

			              	   	<h3>Untuk Pemilik IC Merah</h3>

								<p>Untuk pemohon yang memiliki IC Merah, harap sertakan juga fotokopi IC Merah dan fotokopi permit masuk.
							   </p>
									         		
							</div> 	         	 

						</div> <!-- /bgrid -->

					</div> <!-- /features-list --> 				

				</div> <!-- /features-wrap -->
				
				<div class="row section-intro group animate-this">	
			   		<div class="col-twelve with-bottom-line">

			   			<h2 class="">Persyaratan Penggantian Paspor di KBRI KL</h2>

			   		</div>   		
			   	</div>
			   	<div class="row features-wrap">
								     		
					<div class="features-list block-1-3 block-s-1-2 block-tab-full">

						<div class="bgrid feature animate-this">	

							<span class="feature-count">A.</span>            

						    <div class="feature-content">

			              	   	<h3>Bagi WNI dewasa Pemegang Visa</h3>
								<p> Pemohon harus membawa :<br>
									1.	Paspor lama;<br>
									2.	Foto kopi Permit/Izin Tinggal di Malaysia yang sah dan masih berlaku;<br>
									3.	Surat Kehilangan dari Polisi (jika paspor lama hilang)
								</p>
							</div> 	         	 

						</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">B.</span>            

							   <div class="feature-content">

			              	   	<h3>Bagi WNI Dewasa Pemegang IC Merah</h3>

									<p> 1.	Paspor terakhir atau bukti yang menunjukan pemohon adalah WNI Indonesia; <br>
										2.	IC Merah;<br>
										3.	Permit Masuk.<br>
								   </p>
									         		
								</div> 	         	 

							</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">C.</span>            

							   <div class="feature-content">

			              	   	<h3>Bagi anak WNI yang belum pernah memiliki paspor sebelumnya</h3>

									<p> 1.	Paspor ayah atau ibu;<br>
										2.	Permit/Izin Tinggal ayah atau ibu di Malaysia yang sah dan masih berlaku;<br>
										3.	Buku Nikah Orang tua;<br>
										4.	Akte Lahir;<br>
										5.	Surat pengangkatan anak (jika pemohon adalah anak angkat)<br>
								   </p>
									         		
								</div> 	         	 

							</div> <!-- /bgrid -->

							<div class="bgrid feature animate-this">	

								<span class="feature-count">D.</span>            

							   <div class="feature-content">

		              	   		<h3>Bagi anak WNI yang sudah pernah memiliki paspor sebelumnya</h3>

									<p> 1.	Paspor lama;<br>
										2.	Paspor ayah atau ibu;<br>
										3.	Permit/Izin Tinggal ayah atau ibu di Malaysia yang sah dan masih berlaku;<br>
										4.	Buku Nikah Orang tua;<br>
										5.	Akte Lahir;<br>
										6.	Surat pengangkatan anak (jika pemohon adalah anak angkat)<br>

								   </p>
								         		
								</div> 	         	 

							</div> <!-- /bgrid -->

					</div> <!-- /features-list --> 				

				</div> <!-- /features-wrap -->
			</section> <!-- /features -->

			<section id="download">

			   	<div class="overlay"></div>

			   	<div class="row download-content" >
			   		<div class="col-twelve">

							<div class="text-part">
								<h2 class="animate-this">Download apk untuk Android</h2>

					   		<p class="lead animate-this">Untuk pengguna Android, anda bisa mendownload apk sehingga tidak perlu lagi mengakses lewat browser anda. Untuk mendownload apk silakan tekan tombol dibawah.</p>
							</div>   			

					   	<a class="button large animate-this" href="#">                               
					         Download apk
					      </a>  			

			   		</div>
			   	</div>
		   	</section> <!-- /download -->
		</div>


		<footer id="main-footer">

	   	<div class="footer-social-wrap">  
	   		<div class="row">
						
		         <ul class="footer-social-list">
		            <li><a href="https://www.facebook.com/IndonesianEmbassyKL/">
		             	<i class="fa fa-facebook-square"></i>
		            </a></li>
		            <li><a href="https://www.facebook.com/IndonesianEmbassyKL/">
		              	<i class="fa fa-twitter"></i>
		            </a></li>
	              <li><a href="#">
		              	<i class="fa fa-google-plus"></i>
		            </a></li>
		            <li><a href="#">
		              	<i class="fa fa-pinterest"></i>
		            </a></li>
		            <li><a href="#">
		              	<i class="fa fa-instagram"></i>
		            </a></li>
		            <li><a href="#">
		              	<i class="fa fa-dribbble"></i>
		            </a></li>
		         </ul>
			         
				</div> 
	   	</div> <!-- /footer-social-wrap -->

		   <div class="footer-info-wrap">

		   	<div class="row footer-info">

		  		<div class="col-four tab-full">
		  			<h4><i class="icon-location-map-1"></i> Alamat KBRI Kuala Lumpur</h4>

		  			<p>
		         <div style="color: rgb(180,180,180);">No. 233 Jalan Tun Razak, Kuala Lumpur,<br>
		         50400 Malaysia<br></div>
		         </p>
		  		</div>

		   		<div class="col-four tab-full">
		   			<h4><i class="icon-organization-hierarchy-3"></i> Kontak Kami</h4>

					   <ul class="footer-link-list">
					   	<li><div style="color: rgb(180,180,180);">Email : info@kbrikualalumpur.org</div></li>
					   	<li><div style="color: rgb(180,180,180);">Telefon: 03-2116-4000</div></li>
					   	<li><div style="color: rgb(180,180,180);">Faks: +603-2141-7908</div></li>
					   </ul>
		   		</div>
			   		
			  	</div>
		   </div> <!-- /footer-info-wrap -->
		   	
		   <div class="footer-bottom"> 

		   	<div class="copyright">
			     	<span>© Copyright <a href="#">Kedutaan Besar Republik Indonesia Kuala Lumpur</a> 2017.</span>			     	
			   </div>  		
	   	</div>
		   	
	   </footer>   

	   <div id="go-top">
			<a id="go-top-button" class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
		</div>

		<div id="preloader"> 
	    	<div id="loader"></div>
	   </div> 

	</body>
	<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery_rotate.js"></script>
	<script src="<?php echo base_url()?>assets/responsive/js/plugins.js"></script>
    <script src="<?php echo base_url()?>assets/responsive/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script>
        window.onload = function() {
          var recaptcha = document.forms["form_"]["g-recaptcha-response"];
          recaptcha.required = true;
          recaptcha.oninvalid = function(e) {
            // do something
            
            alert("Mohon centang captcha!");
          }
        }
    </script>
	<script type="text/javascript">
		$( function() {
		    $( "#datepicker").datepicker({
		    	dateFormat: "dd-mm-yy",
		    	onSelect: function(dateText){
		    		$.get("<?php echo base_url()?>index.php/ajax/get_day/"+dateText, function(data, status){
				        //console.log("Data: " + data + "\nStatus: " + status);
				        $("#wrap").empty();
				        result = JSON.parse(data);
				        if(result[0] == "bisa" && result.length == 2)
				        {
				        	var pembuka = "<label class='control-label' style='color: rgb(180,180,180);'>Pilih jam yang tersedia</label>				          	<select id='jam' name='jam' style='color: rgb(180,180,180); width: 100%;'>";
				          	var isi = "";
			          		for (i = 0; i < result[1].length; i++) 
			          		{
			          			isi += "<option value='"+result[1][i]+"'>"+result[1][i]+"</option>";
			          		}
				          	var penutup = "</select>"
				        	$("#wrap").append(pembuka+isi+penutup);
				        	$("#next-3").show();
				        }
				        else
				        {
				        	if(result == "libur")
				        	{
				        		$("#next-3").hide();
				        		$("#wrap").append("<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>Maaf, hari tersebut hari libur. Mohon pilih tanggal lain.</p></center>");
				        	}
				        	else if(result == "lewat")
				        	{
				        		$("#next-3").hide();
				        		$("#wrap").append("<center><p class='bg-danger' style='padding:15px; font-family: sans-serif;'>Maaf, hari tersebut sudah lewat. Mohon pilih tanggal lain.</p></center>");
				        	}
				        	else if(result == "penuh")
				        	{
				        		$("#next-3").hide();
				        		$("#wrap").append("<center><p class='bg-danger' style='padding:15px; font-family: sans-serif; '>Maaf, jam layanan pada hari tersebut telah penuh. Mohon pilih tanggal lain.</p></center>");
				        	}
				        }
				    });
		    	}
		    });
		} );

		document.getElementById("files").onchange = function () {
		    if(this.files[0].type.split("/")[1] != "png" && this.files[0].type.split("/")[1] != "jpg" && this.files[0].type.split("/")[1] != "jpeg")
		    {
				document.getElementById("photoLabel").innerHTML = "File tidak didukung (harus .jpeg, .jpg atau .png)";		    	
				$("#error-step-2").fadeIn("slow");
  				$("#error-step-2").fadeOut(3000);
		    }
		    else if(this.files[0].size > 2048000)
		    {
		    	 document.getElementById("photoLabel").innerHTML = "Gambar terlalu besar (max 2 MB)";
		    	 $("#error-step-2").fadeIn("slow");
  				 $("#error-step-2").fadeOut(3000);
		    }
		    else
		    {
		    	var reader = new FileReader();

			    reader.onload = function (e) {
			        // get loaded data and render thumbnail.
			        document.getElementById("image").src = e.target.result;
			        $("#buttoni").show();
			    };

			    // read the image file as a data URL.
			    reader.readAsDataURL(this.files[0]);
		    }
		};

		var angle = 0;
		function rotateFunc()
		{
		    angle += 90;
		    $("#image").rotate(angle);
		    $("#rotate_val").val(angle);
		}

		$(document).ready(function () {
  		 
	
  		  document.getElementById('chck_2').setCustomValidity('Mohon centang pernyataan ini untuk melanjutkan');

		  $("#next-3").hide();
		  $("#error-step-1").hide();
		  $("#error-step-2").hide();
		  $("#error-step-3").hide();
		  $("#error-step-4").hide();
		  
		  window.location = $('#go-top-button').attr('href');
		  var navListItems = $('div.setup-panel div a'),
		          allWells = $('.setup-content'),
		          allNextBtn = $('.nextBtn');

		  allWells.hide();

		  navListItems.click(function (e) {
		      e.preventDefault();

		      var $target = $($(this).attr('href')),
		              $item = $(this);

		      if (!$item.hasClass('disabled')) {
		          navListItems.removeClass('btn-primary').addClass('btn-default');
		          $item.addClass('btn-primary');
		          allWells.hide();
		          $target.show();
		          $target.find('input:eq(0)').focus();
		      }
		  });

		  allNextBtn.click(function(){
		      var curStep = $(this).closest(".setup-content"),
		          curStepBtn = curStep.attr("id"),
		          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		          curInputs = curStep.find("input[type='text'],input[type='url']"),
		          isValid = true;

		      $(".form-group").removeClass("has-error");

		      flag_error = "tidak";

		      for(var i=0; i<curInputs.length; i++){
		          if (!curInputs[i].validity.valid){
		              isValid = false;
		              $(curInputs[i]).closest(".form-group").addClass("has-error");
		              flag_error = curStep.attr("id");
		          }
		      }

			  if(curStep.attr("id") == "step-1")
			  {
			  	 if(!($('#chck_1').is(":checked")))
  			  	 {
  					isValid = false;
  					flag_error = curStep.attr("id");
  			  	 }
  		  	  }
	  		  
  		  	  if(curStep.attr("id") == "step-2")
			  {
			  	var ext = $("#files").val().split('.').pop().toLowerCase();
			  	 if( !($("#files").val()) || (ext != "png" && ext != "jpg" && ext != "jpeg"))
			  	 {
			  	 	document.getElementById("photoLabel").innerHTML = "Mohon upload foto terbaru wajah anda.";
			  	 	isValid = false;
  					flag_error = curStep.attr("id");
			  	 }
  		  	  }

  		  	  if(curStep.attr("id") == "step-3")
			  {
			  	 if( !($("#datepicker").val()) || !($("#jam").val()))
			  	 {
			  	 	isValid = false;
  					flag_error = curStep.attr("id");
			  	 }
  		  	  }

  		  	  if(curStep.attr("id") == "step-4")
			  {
			  	 if(!($('#chck_2').is(":checked")))
  			  	 {
  					isValid = false;
  					flag_error = curStep.attr("id");
  			  	 }
  		  	  }

  		  	  if(flag_error != "tidak")
  		  	  {
  		  	  	 $("#error-"+flag_error).fadeIn("slow");
  				 $("#error-"+flag_error).fadeOut(3000);
  		  	  }

		      if (isValid)
		      {
		          nextStepWizard.removeAttr('disabled').trigger('click');
		          nextStepWizard.removeClass('disable-click').trigger('click');
		      }
		  });

		  $('div.setup-panel div a.btn-primary').trigger('click');
		});
	</script>

</html>
