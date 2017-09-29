        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hari Libur
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Pengaturan Hari Libur
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
                                <h3 class="panel-title"><i class="fa fa-plus fa-fw"></i> Tambah Hari Libur</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url()?>index.php/admin/submit_libur">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" id="datepicker" name="tanggal">
                                            <p class="help-block">Anda bisa mengetik manual dengan format dd-mm-yyyy.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Keterangan Libur</label>
                                            <input class="form-control" placeholder="contoh: Hari raya Idul Fitri." name="keterangan">
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
                        <h2>Hari Libur</h2>
                        <div class="table-responsive">
                            <br><table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($libur as $key) 
                                    { 
                                        $a = explode('-', $key->hari_libur);
                                        ?>
                                        <tr>
                                            <td><?php echo $a[2]."-".$a[1]."-".$a[0];?></td>
                                            <td><?php echo $key->keterangan;?></td>
                                            <td><a href="<?php echo base_url()?>index.php/admin/hapus_libur/<?php echo $key->id_hari_libur?>" class="btn btn-danger">hapus</a></td>
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
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $( function() {
            $( "#datepicker").datepicker({
                dateFormat: "dd-mm-yy"
                });
            });
    </script>
