<!DOCTYPE html>
<html lang="en">
<?php
  include('header.php');
?>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<section id="home">
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <div class="container">                        
<?php
    echo form_open('c_pemilih/pilih_kddt');
  ?>

<div class="container" style="margin: auto;">
	<div class="row">
      <?php
        $n = 1;
        foreach ($KANDIDAT as $data) {
      ?>
		    <div class="col-md-4">
	        <div class="panel panel-primary">
                
                <div class="panel-heading text-center"><?php echo "PASLON NO. URUT ".$n;?></div>
                
                <div class="panel-body" style="height: 350px;">
                	<center><img class="card-img-top img-responsive" src="<?php echo base_url()?>assets/uploads/<?php echo $data->foto;?>" alt="Card image cap" style="max-height: 200px; min-height: 200px;"></center>
                	<h4 class="text-center"><?php echo $data->nama_kddt;?><br>-<br><?php echo $data->nama_psgn;?></h4>
                	<!--p class="textP">Identitas / Slogan PRESMA UMRAH</p-->
                    <div class="col-xs-14">
			                 <a class="btn btn-primary btn-block btn-flat" 
                       href="<?php echo base_url();?>index.php/c_pemilih/pilih_kddt/<?php echo $data->kode_kddt;?>">VOTE</a>
                       
			             </div>
                </div>
               
            </div>
	    </div>
	     <?php 
       $n++;
       } ?>
	</div>
	
	


</div>


  </div>
</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
</section>

<?php
  include('footer.php');
?>

</body>

</html>