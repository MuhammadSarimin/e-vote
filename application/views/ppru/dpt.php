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
                                <i class="fa fa-fw fa-user"></i> Validasi
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-md-5 pull-right">
                    <form action="<?=base_url()?>index.php/c_ppru/load" method="post">
                    <div class="input-group">
                        <input type="search" name="key" class="form-control" placeholder="Keyword Pencarian ...">
                        <span class="input-group-btn">
                            <button name="keyword" class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div><!-- /input-group -->
                    </form>
                    </div>
                </div>

                <br>

                <div class="row">
                    
                    <div class="table-responsive">

                        <form role="form" enctype="multipart/form-data" method="post">

                            <?php
                                if($dpt == null){
                                    echo "Tidak ada data ditemukan";
                                }
                                else {
                                    if(!$jlhpage){ //ini untuk menangani penomoran agar otomatis menyesuaikan dengan paging
                                        $no=0;
                                    }else{
                                        $no=$jlhpage;
                                    }
                            ?>
                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th width="5%">No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($dpt as $pemilih){
                                    $no++;
                            ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $pemilih->nim;?></td>
                                    <td><?php echo $pemilih->nama;?></td>
                                    <td>
                                    <a class="btn btn-success" href="<?php echo base_url();?>index.php/c_ppru/validasi/<?php echo $pemilih->nim;?>">Validasi</td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                            </table>

                        </form>

                    </div>
                    
                    
                </div>
                <!-- /.row -->
                <div class="col-md-12">
                    <?php echo $paging; ?>
                </div>  <!-- /panel-footer-->

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
