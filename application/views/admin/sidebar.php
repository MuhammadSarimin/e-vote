
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url();?>index.php/c_admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#kddt"><i class="fa fa-fw fa-user"></i> Master Data <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="kddt" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/hal_kddt">Data Kandidat</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/hal_ppru">Data PPRU</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/hal_tps">Data TPS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/hal_dpt">Data DPT</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#vote"><i class="fa fa-fw fa-bar-chart-o"></i> Data Vote <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="vote" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/report_pres">Vote Presma</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/c_admin/report_dpm">Vote DPM</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!--li>
                        <a href="<?php echo base_url();?>index.php/c_admin/chart"><i class="fa fa-fw fa-bar-chart-o"></i> Hasil Akhir Vote</a>
                    </li-->
                    
                    <li>
                        <!--a href="javascript:;" data-toggle="collapse" data-target="#ba"><i class="fa fa-fw fa-file"></i> Master Berita <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ba" class="collapse">
                            <li-->
                                <a href="<?php echo base_url('index.php/c_admin/cetak_ba');?>"><i class="fa fa-fw fa-desktop"></i> Cetak Berita Acara</a>
                            <!--/li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-desktop"></i> Cetak SK</a>
                            </li>
                        </ul-->
                    </li>


                    <li>
                        <a data-toggle="modal" data-target="#reset-pass"><i class="fa fa-fw fa-user"></i> Ubah Password</a>
                    </li>


                    <li>
                        <a href="<?php echo base_url();?>index.php/autentikasi/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <!-- Modal -->
                <div id="reset-pass" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        <form action="<?php echo base_url('index.php/autentikasi/reset_pass');?>" role="form" enctype="multipart/form-data" method="post">
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Reset Password</h4>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                                
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="password" placeholder="Password Baru ...">
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
