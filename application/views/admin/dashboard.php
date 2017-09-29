        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Pengaturan Dasar</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
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
                                <h3 class="panel-title"><i class="fa fa-gear fa-fw"></i> Konfigurasi</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url()?>index.php/admin/submit_config">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Jam Buka</label>
                                            <input class="form-control" name="jam_mulai" placeholder="jam 8 pagi cukup tulis: 8" type="number" max="23" min="0" value="<?php echo $jam_mulai;?>">
                                            <p class="help-block">Dalam satuan jam (nilai: 0-23)</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Jam Tutup</label>
                                            <input class="form-control" name="jam_selesai" placeholder="jam 5 sore cukup tulis: 17" type="number" max="23" min="0" value="<?php echo $jam_selesai;?>">
                                            <p class="help-block">Dalam satuan jam (nilai: 0-23)</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Quota per Jam</label>
                                            <input class="form-control" name="quota_perjam" value="<?php echo $config->quota_perjam;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 25px;">
                                        <input class="btn btn-success" type="submit" value="Submit">
                                    </div>
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
    <script src="<?php echo base_url()?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris-data.js"></script>