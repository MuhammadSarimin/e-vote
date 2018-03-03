<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/dolanan2.png" sizes="16x16">
    <title>PPRU | e-Vote</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url()?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
    
?>
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
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/c_ppru');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-user"></i> Report
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    if($KLASEMEN != null){
                ?>
                <div class="row">
                    PRESMA TPS <?php echo '1';?>
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
                            ?>
                                <tr>
                                    <td><?php echo $rank->kode_kddt;?></td>
                                    <td><?php echo $rank->nama_kddt;?></td>
                                    <td><?php echo $rank->total_suara;?></td>
                                </tr>
                            <?php
                                $entry = $entry + $rank->total_suara;
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
                    }
                ?>


                <?php
                    if($RANKING != null){
                ?>
                <div class="row">
                    DPM TPS <?php echo '1';?>
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
                                foreach ($RANKING as $pole){
                            ?>
                                <tr>
                                    <td><?php echo $pole->kode_kddt;?></td>
                                    <td><?php echo $pole->nama_kddt;?></td>
                                    <td><?php echo $pole->total_suara;?></td>
                                </tr>
                            <?php
                                $entry = $entry + $pole->total_suara;
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
