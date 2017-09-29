        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hak Akses
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Pengaturan Hak Akses
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
                </div> -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-plus fa-fw"></i> Tambah Hak Akses</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url()?>index.php/admin/submit_akses">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="username" name="username" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" type="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="margin-top: 25px;">
                                        <input class="btn btn-success" type="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Daftar Hak Akses</h2>
                        <div class="table-responsive">
                            <br><table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($user as $key) 
                                    { 
                                        ?>
                                        <tr>
                                            <td><?php echo $key->username;?></td>
                                            <td>
                                                <a href="<?php echo base_url()?>index.php/admin/edit_akses/<?php echo $key->id_login?>" class="btn btn-primary">edit</a>
                                                <a href="<?php echo base_url()?>index.php/admin/hapus_akses/<?php echo $key->id_login?>" class="btn btn-danger">hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Morris Charts JavaScript -->