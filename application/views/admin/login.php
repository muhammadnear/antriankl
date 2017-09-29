<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page - Aplikasi Antrian KBRI KL</title>
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=0.8"/>

    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/lambang-pancasila.png">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }

      .form-signin {
        max-width: 350px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: rgba(250,250,250,0.5);
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

      .logo{
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10px;
        margin-top: 10px;
      }
    </style>
</head>

<body style="background-color:#f1f2f7">
	<div class="container">
  		<p class="text-center" style="margin-bottom: 50px;"> <img src="<?php echo base_url() ?>assets/img/logo-login.png" style="width:auto; height:100px;"> </p>
      <form class="form-signin" action="<?php echo base_url()?>index.php/admin/signin" method="POST" style="background-color:#1e8ad3">
	      <h4 class="form-signin-heading text-left text-info" style="color:#FFFFFF">Silakan Login</h4>
        <input id="username" name="username" type="text" class="form-control" placeholder="Nama Pengguna">
        <input id="password" name="password" type="password" class="form-control" placeholder="Kata Kunci">
        <input class="btn btn-large btn-success" type="submit" id="submit" name="submit" value="Masuk">	
      </form>
      <center>@Copyright 2017. <span>Kedutaan Besar Republik Indonesia</span> Kuala Lumpur</center>
      <?php 
          if($error)
            echo "<center><p class='bg-danger' style='padding:15px;'>$error</p></center>";
        ;?>
    </div>
</body>
</html>