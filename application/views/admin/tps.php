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
                                <i class="fa fa-fw fa-user"></i> Data TPS
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <div class="row">
                    <button class="btn btn-info" id="tambah-data"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
                </div>
                
                <br>

                <?php
                    if($TPS != null){
                        
                ?>
                <div class="row">
                    <div class="table-responsive">

                        <form role="form" enctype="multipart/form-data" method="post">

                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>TPS</th>
                                <th>Fakultas</th>
                                <!--th>Aksi</th-->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($TPS as $wilayah){
                            ?>
                                <tr>
                                    <td><?php echo $wilayah->no_tps;?></td>
                                    <td><?php echo $wilayah->fakultas;?></td>
                                    <!--td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>index.php/c_admin/update/<?php echo $wilayah->no_tps;?>">Update</td-->
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
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
