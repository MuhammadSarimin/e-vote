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
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url();?>index.php/c_admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Data DPT
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <?php
                        echo form_open_multipart('c_admin/add_dpt');
                    ?>

                    <div class="col-lg-6">

                        <form role="form" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Upload Data</label>
                                <input type="file" name="excel">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->

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
