        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Akses <small>Edit Akses</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Akses
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Tulisan Penting</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div> value="<?php echo $quota;?>"-->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-gear fa-fw"></i> Edit Hak Akses</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url()?>index.php/admin/update_akses/">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" placeholder="Username" value="<?php echo $user->username;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input class="form-control" id="password" name="password" type="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Ulangi Password Baru</label>
                                            <input class="form-control" id="confirm_password" name="password2" type="password">
                                            <span id="message"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 25px;">
                                        <input class="btn btn-success" type="submit" value="Submit">
                                    </div>
                                    <input type="hidden" name="id_login" value="<?php echo $user->id_login;?>">
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Morris Charts JavaScript -->  
    <script type="text/javascript">
        $('#password, #confirm_password').on('keyup', function () 
        {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Sama').css('color', 'green');
          } else 
            $('#message').html('Tidak sama').css('color', 'red');
        });
    </script>