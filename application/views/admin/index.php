<!DOCTYPE html>
<html lang="en">
<?php
    include('head.php');
?>
<body>

            <?php
                include('header.php'); //panggil header
           ?>
           <?php
                include('sidebar.php'); //panggil sidebar
           ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Selamat Datang Administrator Pemira</strong>. <strong class="alert-link">Selamat Bekerja!</strong> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    if($PERCENT != null){
                        foreach ($PERCENT as $persentase) {
                ?>

                <!-- PERTAMA -->
                <?php
                            if($persentase->no_tps == 1){
                ?>

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-ft">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3><?php echo $persentase->persentase_masuk.'%'?></h3></div>
                                        <div><?php echo $persentase->suara_masuk.' dari '.$persentase->total_dpt;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"><center>TPS 01 (FT)</center></div>
                        </div>
                    </div>
                <?php
                            }
                            
                            if($persentase->no_tps == 2){
                
                ?>

                <!-- KEDUA -->
                    <div class="col-lg-2 col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3><?php echo $persentase->persentase_masuk.'%'?></h3></div>
                                        <div><?php echo $persentase->suara_masuk.' dari '.$persentase->total_dpt;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"><center>TPS 02 (FIKP)</center></div>
                        </div>
                    </div>
                <?php
                            }
                            
                            if($persentase->no_tps == 3){
                
                ?>

                    
                <!-- KETIGA -->
                    <div class="col-lg-2 col-md-3">
                        <div class="panel panel-fkip">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3><?php echo $persentase->persentase_masuk.'%'?></h3></div>
                                        <div><?php echo $persentase->suara_masuk.' dari '.$persentase->total_dpt;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"><center>TPS 03 (FKIP)</center></div>
                        </div>
                    </div>
                <?php
                            }
                            
                            if($persentase->no_tps == 4){
                
                ?>


                    
                <!-- KEEMPAT -->
                    <div class="col-lg-2 col-md-3">
                        <div class="panel panel-fe">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3><?php echo $persentase->persentase_masuk.'%'?></h3></div>
                                        <div><?php echo $persentase->suara_masuk.' dari '.$persentase->total_dpt;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"><center>TPS 04 (FE)</center></div>
                        </div>
                    </div>
                <?php
                            }
                            
                            if($persentase->no_tps == 5){
                
                ?>
                    

                <!-- KELIMA -->
                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-fisip">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3><?php echo $persentase->persentase_masuk.'%'?></h3></div>
                                        <div><?php echo $persentase->suara_masuk.' dari '.$persentase->total_dpt;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer"><center>TPS 05 (FISIP)</center></div>
                        </div>
                    </div>
                <?php
                            }
                        }
                    }
                ?>


                <!-- HASIL PEMILIHAN -->
                <div class="row">
                    <!--div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Hasil Pemilihan</h3>
                            </div-->
                            <?php
                                include('chart.php');
                            ?>
                            
                        <!--/div>
                    </div-->
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/morris/morris-data.js"></script>

</body>

</html>
