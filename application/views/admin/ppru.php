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
                                <i class="fa fa-fw fa-user"></i> Data PPRU
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <button class="btn btn-info" id="tambah-data" onclick="add_person()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button>
                </div>
                
                <!-- Modal -->
                <div id="add" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        <form action="<?php echo base_url('index.php/c_admin/add_ppru');?>" role="form" enctype="multipart/form-data" method="post">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data PPRU</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                                
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="user" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Nama PPRU</label>
                                <input class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label>TPS</label>
                                <select name="tps" class="form-control">
                                    <option value=1>1 - Fakultas Teknik</option>
                                    <option value=2>2 - Fakultas Ilmu Kelautan dan Perikanan</option>
                                    <option value=3>3 - Fakultas Keguruan dan Ilmu Pendidikan</option>
                                    <option value=4>4 - Fakultas Ekonomi</option>
                                    <option value=5>5 - Fakultas Ilmu Sosial dan Politik</option>
                                </select>
                            </div>

                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div><!-- Modal -->

                <!-- Modal -->
                <div id="edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        <form action="<?php echo base_url('index.php/c_admin/edit_ppru');?>" role="form" enctype="multipart/form-data" method="post">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Data PPRU</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                                
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="user" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Nama PPRU</label>
                                <input class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label>TPS</label>
                                <select name="tps" class="form-control">
                                    <option value=1>1 - Fakultas Teknik</option>
                                    <option value=2>2 - Fakultas Ilmu Kelautan dan Perikanan</option>
                                    <option value=3>3 - Fakultas Keguruan dan Ilmu Pendidikan</option>
                                    <option value=4>4 - Fakultas Ekonomi</option>
                                    <option value=5>5 - Fakultas Ilmu Sosial dan Politik</option>
                                </select>
                            </div>

                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div><!-- Modal -->
                
                <br>
                <?php
                    if($PPRU != null){
                        
                ?>
                <div class="row">
                    <div class="table-responsive">

                        <form role="form" enctype="multipart/form-data" method="post">

                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>Username</th>
                                <th>Nama PPRU</th>
                                <th>TPS</th>
                                <th width=20%>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($PPRU as $panitia){
                            ?>
                                <tr>
                                    <td><?php echo $panitia->nim;?></td>
                                    <td><?php echo $panitia->nama;?></td>
                                    <td><?php echo $panitia->no_tps;?></td>
                                    <td>
                                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('<?php echo $panitia->nim;?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/c_admin/delete/').$panitia->nim;?>"><i class="glyphicon"></i> Hapus</a>
                                    <!--a class="btn btn-sm btn-primary" href="<?php echo base_url();?>index.php/c_admin/update/<?php echo $panitia->nim;?>">Update</td-->
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

    <script type="text/javascript">
        function edit_person(id){
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
 
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('c_admin/ajax_edit/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('[name="user"]').val(data.nim);
                    $('[name="nama"]').val(data.nama);
                    $('[name="no_tps"]').val(data.no_tps);
                    $('#edit').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Error get data from ajax');
                }
            });
        }

        function add_person(){
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#add').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Data'); // Set Title to Bootstrap modal title
        }
    </script>

</body>

</html>
