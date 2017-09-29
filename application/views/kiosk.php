<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url()?>assets/img/lambang-pancasila.png">

    <title>Aplikasi Kiosk Antrian KBRI Kuala Lumpur</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <!-- <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Project name</h3>
      </div> -->

      <div class="jumbotron" style="background-color: white; margin-bottom: -30px;">
        <img src="<?php echo base_url() ?>assets/img/logo-login.png" style="width:auto; height:60px; margin-bottom: 40px;"> 
        <h2>Aplikasi Kiosk Antrian <br>Kedutaan Besar Republik Indonesia <br>Kuala Lumpur</h2>
      </div>
      <div class="row marketing">
        <form action="<?php echo base_url()?>index.php/kiosk/submit" method="get" class="form-inline">
          <div class="col-lg-12">
            <center><h4>Silakan scan kode QR antrian anda atau ketikkan manual.</h4></center>
            <div class="form-group col-lg-11">
              <input type="text" name="kode" style="width:100%; text-transform: uppercase;" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Cari</button>
          </div>
        </form>
      </div>
      <div class="row col-lg-12" style="margin-bottom: 100px;">
        <?php 
          if(!empty($error))
            echo "<center><p class='bg-danger' style='padding:15px;'>$error</p></center>";
          else if(!empty($pemohon))
          { ?>
            <div style="vertical-align: center; text-align: center; margin-top: auto; margin-bottom: 5%; margin-right: auto; margin-left: -40%; position: relative;">
                    <label class="control-label" style="text-align: left; display: inline-block; color: rgb(0,0,0); margin-right: 7%;">
                         Nama Lengkap : <?php echo $pemohon->nama;?>
                    <br> Email : <?php echo $pemohon->email;?>
                    <br> No HP : <?php echo $pemohon->no_hp;?>
                    <br> No Paspor : <?php echo $pemohon->no_paspor_permit;?>
                    <br> Tanggal : <?php echo $pemohon->jadwal_hari;?>
                    <br> Jam Kedatangan : <?php echo $pemohon->jadwal_jam;?>
                    <br> Kode QR : <?php echo $pemohon->kode_booking;?>
                    </label>
                    <img style="position: absolute; display: inline-block; width: 200px; max-height: 230px;" src="<?php echo base_url()?>tmp/images/<?php echo $pemohon->path_foto?>">
                  </div>
         <?php }
        ?>
      </div>
      <footer class="footer" style="text-align: center;">
        <p>Kedutaan Besar Republik Indonesia Kuala Lumpur.</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
