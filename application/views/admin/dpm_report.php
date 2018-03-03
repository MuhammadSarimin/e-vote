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
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/c_admin');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-user"></i> Vote DPM
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    if($KLASEMEN != null){
                        $i = 1;
                        do{
                ?>
                <div class="row">
                    <div class="row" style="text-align:center"><h4>TPS <?php echo $i;?></h4></div>
                    <div class="table-responsive">

                        <form role="form" enctype="multipart/form-data" method="post">

                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>Kode Kandidat</th>
                                <th>Nama Kandidat</th>
                                <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $entry = 0;
                                foreach ($KLASEMEN as $rank){
                                    if($rank->no_tps == $i){
                            ?>
                                <tr>
                                    <td><?php echo $rank->kode_kddt;?></td>
                                    <td><?php echo $rank->nama_kddt;?></td>
                                    <td><?php echo $rank->total_suara;?></td>
                                </tr>
                            <?php
                                    $entry = $entry + $rank->total_suara;
                                    }
                                }
                            ?>
                            </tbody>
                            <thead>
                                <th colspan="2" style="text-align:right;"><b>Total Suara Masuk </b></th>
                                <th><b><?php echo $entry; ?></b></th>
                            </thead>
                            </table>

                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->
                <?php
                        $i++;
                        }while($i<=5);
                    }
                ?>

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
