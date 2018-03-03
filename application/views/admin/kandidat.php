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
                                <i class="fa fa-edit"></i> Data Kandidat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Modal-->
                <div id="add" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        <form action="<?php echo base_url('index.php/c_admin/tambah_kddt');?>" role="form" enctype="multipart/form-data" method="post">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Kandidat</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                                
                            <div class="form-group">
                                <label>Kode Kandidat</label>
                                <input class="form-control" name="kode_kddt" placeholder="Kode Kandidat (PRESxxx) / (DPMxxx)">
                            </div>

                            <div class="form-group">
                                <label>Nama Kandidat</label>
                                <input class="form-control" name="nama_kddt" placeholder="Nama Kandidat">
                                <br>
                                <input class="form-control" name="nama_psgn" placeholder="Nama Pasangan Kandidat">
                            </div>

                            <div class="form-group">
                                <label>NIM</label>
                                <input class="form-control" name="nim_kddt" placeholder="NIM Kandidat">
                                <br>
                                <input class="form-control" name="nim_psgn" placeholder="NIM Pasangan">
                            </div>

                            <div class="form-group">
                                <label>Upload Photo</label>
                                <input type="file" name="filefoto">
                            </div>

                            <!--div class="form-group">
                                <label>Fakultas</label>
                                <select name="fakultas" class="form-control">
                                    <option value="FT">Fakultas Teknik</option>
                                    <option value="FIKP">Fakultas Ilmu Kelautan dan Perikanan</option>
                                    <option value="FKIP">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                    <option value="FE">Fakultas Ekonomi</option>
                                    <option value="FISP">Fakultas Ilmu Sosial dan Politik</option>
                                </select>
                            </div-->

                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div><!-- Modal -->

                <div class="row">
                    <button class="btn btn-info" id="tambah-data" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
                </div>
                <br>

                <?php
                    if($KANDIDAT != null){
                        
                ?>

                <div class="row">
                    <div class="table-responsive">

                        <form role="form" enctype="multipart/form-data" method="post">

                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>Kode Kandidat</th>
                                <th>Nama Kandidat</th>
                                <th>NIM</th>
                                <th>Foto</th>
                                <!--th>Aksi</th-->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($KANDIDAT as $kddt){
                            ?>
                                <tr>
                                    <td><?php echo $kddt->kode_kddt;?></td>
                                    <td><?php echo $kddt->nama_kddt;?>
                                        <br>
                                    <?php echo $kddt->nama_psgn;?>
                                    </td>
                                    <td><?php echo $kddt->nim;?>
                                        <br>
                                    <?php echo $kddt->nim_psgn;?>
                                    </td>
                                    <td><img src="<?php echo base_url('assets/uploads/').$kddt->foto;?>" width=100px height=100px></td>
                                    <!--td>
                                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(<?php echo $kddt->kode_kddt;?>)"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>index.php/c_admin/update/<?php echo $panitia->nim;?>">Update</td-->
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
